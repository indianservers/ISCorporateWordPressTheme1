<?php
/**
 * SEO schema and social metadata.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_is_major_seo_plugin_active' ) ) {
	/**
	 * Detect common SEO plugins to avoid duplicate metadata.
	 *
	 * @return bool
	 */
	function iscp_is_major_seo_plugin_active() {
		return defined( 'WPSEO_VERSION' )
			|| defined( 'RANK_MATH_VERSION' )
			|| defined( 'AIOSEO_VERSION' )
			|| class_exists( 'WPSEO_Frontend' )
			|| class_exists( 'RankMath' )
			|| class_exists( 'AIOSEO\\Plugin\\AIOSEO' );
	}
}

if ( ! function_exists( 'iscp_get_meta_description' ) ) {
	/**
	 * Return a safe meta description.
	 *
	 * @return string
	 */
	function iscp_get_meta_description() {
		if ( is_singular() && has_excerpt() ) {
			return wp_strip_all_tags( get_the_excerpt() );
		}

		$description = get_bloginfo( 'description' );

		if ( ! $description ) {
			$description = iscp_get_theme_mod( 'iscp_footer_description' );
		}

		return wp_strip_all_tags( $description );
	}
}

if ( ! function_exists( 'iscp_get_social_image' ) ) {
	/**
	 * Return featured image or logo URL.
	 *
	 * @return string
	 */
	function iscp_get_social_image() {
		if ( is_singular() && has_post_thumbnail() ) {
			return get_the_post_thumbnail_url( get_the_ID(), 'large' );
		}

		$logo_id = get_theme_mod( 'custom_logo' );

		return $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : '';
	}
}

if ( ! function_exists( 'iscp_get_breadcrumb_schema_items' ) ) {
	/**
	 * Return breadcrumb schema items.
	 *
	 * @return array
	 */
	function iscp_get_breadcrumb_schema_items() {
		$items = array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => __( 'Home', 'iscp' ),
				'item'     => home_url( '/' ),
			),
		);

		if ( is_singular() ) {
			$post_type = get_post_type();

			if ( 'post' === $post_type ) {
				$blog_id = get_option( 'page_for_posts' );
				$items[] = array(
					'@type'    => 'ListItem',
					'position' => 2,
					'name'     => __( 'Blog', 'iscp' ),
					'item'     => $blog_id ? get_permalink( $blog_id ) : home_url( '/blog/' ),
				);
			} elseif ( 'page' !== $post_type ) {
				$archive = get_post_type_archive_link( $post_type );
				$obj     = get_post_type_object( $post_type );

				if ( $archive && $obj ) {
					$items[] = array(
						'@type'    => 'ListItem',
						'position' => 2,
						'name'     => $obj->labels->name,
						'item'     => $archive,
					);
				}
			}

			$items[] = array(
				'@type'    => 'ListItem',
				'position' => count( $items ) + 1,
				'name'     => get_the_title(),
				'item'     => get_permalink(),
			);
		} elseif ( is_archive() ) {
			$archive_url = '';

			if ( is_post_type_archive() ) {
				$archive_url = get_post_type_archive_link( get_post_type() );
			} elseif ( is_category() || is_tag() || is_tax() ) {
				$queried = get_queried_object();

				if ( $queried && ! is_wp_error( $queried ) ) {
					$term_link = get_term_link( $queried );

					if ( ! is_wp_error( $term_link ) ) {
						$archive_url = $term_link;
					}
				}
			}

			$items[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => wp_strip_all_tags( get_the_archive_title() ),
				'item'     => $archive_url,
			);
		} elseif ( is_search() ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => sprintf(
					/* translators: %s: search query. */
					__( 'Search: %s', 'iscp' ),
					get_search_query()
				),
				'item'     => get_search_link(),
			);
		}

		return $items;
	}
}

if ( ! function_exists( 'iscp_output_schema' ) ) {
	/**
	 * Output schema graph.
	 */
	function iscp_output_schema() {
		if ( is_admin() || ! iscp_get_theme_mod( 'iscp_schema_enabled', true ) || iscp_is_major_seo_plugin_active() ) {
			return;
		}

		$site_url    = home_url( '/' );
		$schema      = array();
		$logo_url    = iscp_get_social_image();
		$description = iscp_get_meta_description();

		$schema[] = array_filter(
			array(
				'@context'    => 'https://schema.org',
				'@type'       => 'Organization',
				'name'        => get_bloginfo( 'name' ),
				'url'         => $site_url,
				'logo'        => $logo_url,
				'description' => $description,
			)
		);

		$schema[] = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'WebSite',
			'name'            => get_bloginfo( 'name' ),
			'url'             => $site_url,
			'inLanguage'      => get_bloginfo( 'language' ),
			'potentialAction' => array(
				'@type'       => 'SearchAction',
				'target'      => home_url( '/?s={search_term_string}' ),
				'query-input' => 'required name=search_term_string',
			),
		);

		$schema[] = array_filter(
			array(
				'@context'    => 'https://schema.org',
				'@type'       => 'ProfessionalService',
				'name'        => get_bloginfo( 'name' ),
				'url'         => $site_url,
				'description' => $description,
			)
		);

		if ( ! is_front_page() ) {
			$schema[] = array(
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => iscp_get_breadcrumb_schema_items(),
			);
		}

		if ( is_singular( 'post' ) ) {
			$schema[] = array_filter(
				array(
					'@context'      => 'https://schema.org',
					'@type'         => 'Article',
					'headline'      => get_the_title(),
					'description'   => $description,
					'datePublished' => get_the_date( DATE_W3C ),
					'dateModified'  => get_the_modified_date( DATE_W3C ),
					'image'         => $logo_url,
					'url'           => get_permalink(),
					'author'        => array(
						'@type' => 'Person',
						'name'  => get_the_author(),
					),
				)
			);
		}

		if ( is_singular( 'iscp_service' ) ) {
			$schema[] = array_filter(
				array(
					'@context'    => 'https://schema.org',
					'@type'       => 'Service',
					'name'        => get_the_title(),
					'description' => $description,
					'url'         => get_permalink(),
				)
			);
		}

		if ( is_singular( 'iscp_solution' ) ) {
			$schema[] = array_filter(
				array(
					'@context'    => 'https://schema.org',
					'@type'       => 'Product',
					'name'        => get_the_title(),
					'description' => $description,
					'image'       => $logo_url,
					'url'         => get_permalink(),
				)
			);
		}

		echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'iscp_output_schema', 20 );

if ( ! function_exists( 'iscp_output_open_graph' ) ) {
	/**
	 * Output Open Graph and Twitter tags.
	 */
	function iscp_output_open_graph() {
		if ( is_admin() || ! iscp_get_theme_mod( 'iscp_open_graph_enabled', true ) || iscp_is_major_seo_plugin_active() ) {
			return;
		}

		$title       = is_singular() ? get_the_title() : get_bloginfo( 'name' );
		$description = iscp_get_meta_description();
		$url         = is_singular() ? get_permalink() : home_url( '/' );
		$image       = iscp_get_social_image();
		$type        = is_singular( 'post' ) ? 'article' : 'website';
		?>
		<meta property="og:title" content="<?php echo esc_attr( wp_strip_all_tags( $title ) ); ?>">
		<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
		<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
		<meta property="og:type" content="<?php echo esc_attr( $type ); ?>">
		<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		<?php if ( $image ) : ?>
			<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
		<?php endif; ?>
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="<?php echo esc_attr( wp_strip_all_tags( $title ) ); ?>">
		<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
		<?php if ( $image ) : ?>
			<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
		<?php endif; ?>
		<?php
	}
}
add_action( 'wp_head', 'iscp_output_open_graph', 21 );
