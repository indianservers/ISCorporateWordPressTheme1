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
		$context = function_exists( 'iscp_get_seo_context' ) ? iscp_get_seo_context() : array();

		if ( ! empty( $context['description'] ) ) {
			return iscp_trim_meta_description( $context['description'] );
		}

		if ( is_singular() && has_excerpt() ) {
			return iscp_trim_meta_description( get_the_excerpt() );
		}

		$description = get_bloginfo( 'description' );

		if ( ! $description ) {
			$description = iscp_get_theme_mod( 'iscp_footer_description' );
		}

		return iscp_trim_meta_description( $description );
	}
}

if ( ! function_exists( 'iscp_get_international_regions' ) ) {
	/**
	 * Return priority international markets.
	 *
	 * @return array
	 */
	function iscp_get_international_regions() {
		return array(
			'IN' => __( 'India', 'iscp' ),
			'US' => __( 'United States', 'iscp' ),
			'AE' => __( 'United Arab Emirates / Dubai', 'iscp' ),
			'ZA' => __( 'South Africa', 'iscp' ),
			'AU' => __( 'Australia', 'iscp' ),
			'GB' => __( 'United Kingdom', 'iscp' ),
			'EU' => __( 'Europe', 'iscp' ),
		);
	}
}

if ( ! function_exists( 'iscp_get_language_options' ) ) {
	/**
	 * Return planned language options. English remains the default content language.
	 *
	 * @return array
	 */
	function iscp_get_language_options() {
		return array(
			'en' => array( 'label' => __( 'English', 'iscp' ), 'native' => 'English', 'hreflang' => 'en', 'default' => true ),
			'ar' => array( 'label' => __( 'Arabic', 'iscp' ), 'native' => 'العربية', 'hreflang' => 'ar' ),
			'fr' => array( 'label' => __( 'French', 'iscp' ), 'native' => 'Français', 'hreflang' => 'fr' ),
			'de' => array( 'label' => __( 'German', 'iscp' ), 'native' => 'Deutsch', 'hreflang' => 'de' ),
			'es' => array( 'label' => __( 'Spanish', 'iscp' ), 'native' => 'Español', 'hreflang' => 'es' ),
			'af' => array( 'label' => __( 'Afrikaans', 'iscp' ), 'native' => 'Afrikaans', 'hreflang' => 'af' ),
		);
	}
}

if ( ! function_exists( 'iscp_get_current_url' ) ) {
	/**
	 * Return the current front-end URL.
	 *
	 * @return string
	 */
	function iscp_get_current_url() {
		if ( is_front_page() ) {
			return home_url( '/' );
		}

		if ( is_singular() ) {
			return get_permalink();
		}

		$context = function_exists( 'iscp_get_seo_context' ) ? iscp_get_seo_context() : array();

		if ( ! empty( $context['url'] ) ) {
			return $context['url'];
		}

		global $wp;

		$request = isset( $wp->request ) ? $wp->request : '';

		return trailingslashit( home_url( '/' . ltrim( $request, '/' ) ) );
	}
}

if ( ! function_exists( 'iscp_get_language_url' ) ) {
	/**
	 * Return a language URL for current page.
	 *
	 * @param string $language Language key.
	 * @return string
	 */
	function iscp_get_language_url( $language ) {
		$url = remove_query_arg( 'lang', iscp_get_current_url() );

		if ( 'en' === $language ) {
			return $url;
		}

		return add_query_arg( 'lang', sanitize_key( $language ), $url );
	}
}

if ( ! function_exists( 'iscp_output_language_alternates' ) ) {
	/**
	 * Output hreflang alternates for international discovery.
	 */
	function iscp_output_language_alternates() {
		if ( is_admin() || iscp_is_major_seo_plugin_active() ) {
			return;
		}

		foreach ( iscp_get_language_options() as $key => $language ) {
			printf(
				'<link rel="alternate" hreflang="%1$s" href="%2$s">' . "\n",
				esc_attr( $language['hreflang'] ),
				esc_url( iscp_get_language_url( $key ) )
			);
		}

		printf( '<link rel="alternate" hreflang="x-default" href="%s">' . "\n", esc_url( iscp_get_language_url( 'en' ) ) );
	}
}
add_action( 'wp_head', 'iscp_output_language_alternates', 2 );

if ( ! function_exists( 'iscp_render_language_selector' ) ) {
	/**
	 * Render a compact language selector. English is the current/default content.
	 */
	function iscp_render_language_selector() {
		$languages = iscp_get_language_options();
		$current   = isset( $_GET['lang'] ) ? sanitize_key( wp_unslash( $_GET['lang'] ) ) : 'en'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( ! isset( $languages[ $current ] ) ) {
			$current = 'en';
		}
		?>
		<div class="iscp-language-selector">
			<button type="button" aria-haspopup="true" aria-expanded="false">
				<span aria-hidden="true">EN</span>
				<?php echo esc_html( strtoupper( $current ) ); ?>
			</button>
			<ul aria-label="<?php esc_attr_e( 'Select language', 'iscp' ); ?>">
				<?php foreach ( $languages as $key => $language ) : ?>
					<li>
						<a href="<?php echo esc_url( iscp_get_language_url( $key ) ); ?>" lang="<?php echo esc_attr( $language['hreflang'] ); ?>" <?php echo $key === $current ? 'aria-current="true"' : ''; ?>>
							<strong><?php echo esc_html( strtoupper( $key ) ); ?></strong>
							<span><?php echo esc_html( $language['native'] ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_trim_meta_description' ) ) {
	/**
	 * Trim text for search/social descriptions.
	 *
	 * @param string $description Description text.
	 * @return string
	 */
	function iscp_trim_meta_description( $description ) {
		$description = preg_replace( '/\s+/', ' ', wp_strip_all_tags( (string) $description ) );
		$description = trim( $description );

		if ( function_exists( 'mb_strlen' ) && mb_strlen( $description ) > 158 ) {
			return rtrim( mb_substr( $description, 0, 155 ), ' .,;:-' ) . '...';
		}

		if ( strlen( $description ) > 158 ) {
			return rtrim( substr( $description, 0, 155 ), ' .,;:-' ) . '...';
		}

		return $description;
	}
}

if ( ! function_exists( 'iscp_get_seo_context' ) ) {
	/**
	 * Return page-specific SEO title, description and URL.
	 *
	 * @return array
	 */
	function iscp_get_seo_context() {
		$site_name = get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : __( 'Indian Servers', 'iscp' );
		$group     = get_query_var( 'iscp_offering_group' );
		$slug      = get_query_var( 'iscp_offering_slug' );

		if ( get_query_var( 'iscp_blog_index' ) ) {
			return array(
				'title'       => __( 'Indian Servers Blog | Software, AI, Cloud and Cyber Security Insights', 'iscp' ),
				'description' => __( 'Read Indian Servers insights on custom software development, AI and LLM systems, cloud hosting, VAPT, HRMS, School ERP, CRM, SaaS products and digital transformation for businesses in India, UAE and globally.', 'iscp' ),
				'url'         => home_url( '/blog/' ),
			);
		}

		if ( $group && function_exists( 'iscp_get_editable_offering_pages' ) ) {
			$pages = iscp_get_editable_offering_pages();

			if ( ! empty( $slug ) && function_exists( 'iscp_get_offering_page' ) ) {
				$item = iscp_get_offering_page( $group, $slug );

				if ( $item ) {
					$description_parts = array_filter(
						array(
							isset( $item['summary'] ) ? $item['summary'] : '',
							isset( $item['recommendation_summary'] ) ? $item['recommendation_summary'] : '',
							isset( $item['best_for'] ) ? $item['best_for'] : '',
							isset( $item['seo_terms'] ) ? $item['seo_terms'] : '',
						)
					);

					return array(
						'title'       => sprintf( '%s | %s', $item['title'], $site_name ),
						'description' => implode( ' ', $description_parts ),
						'url'         => ! empty( $item['url'] ) ? $item['url'] : home_url( '/' . $pages[ $group ]['base'] . '/' . $slug . '/' ),
					);
				}
			}

			if ( isset( $pages[ $group ] ) ) {
				return array(
					'title'       => 'products' === $group ? __( 'SaaS Products and Business Software | Indian Servers', 'iscp' ) : __( 'Software Development, Cloud and Cyber Security Services | Indian Servers', 'iscp' ),
					'description' => 'products' === $group
						? __( 'Explore Indian Servers SaaS products for HRMS, school ERP, CRM, inventory, restaurant POS, ERP, LMS, AI and managed cloud hosting.', 'iscp' )
						: __( 'Explore Indian Servers services for custom software, web apps, mobile apps, AI, AR/VR, cloud hosting, VAPT, cyber security and dedicated teams.', 'iscp' ),
					'url'         => home_url( '/' . $pages[ $group ]['base'] . '/' ),
				);
			}
		}

		if ( is_front_page() ) {
			return array(
				'title'       => __( 'Software Company in India & USA — SaaS, AI, Cloud, VAPT | Indian Servers', 'iscp' ),
				'description' => __( 'Indian Servers builds SaaS products, custom software, AI systems, cloud hosting, VAPT and managed technology solutions for India, USA, Dubai, South Africa, Australia and Europe.', 'iscp' ),
				'url'         => home_url( '/' ),
			);
		}

		if ( is_home() ) {
			$blog_id = get_option( 'page_for_posts' );

			return array(
				'title'       => __( 'Recent News and IT Insights | Indian Servers', 'iscp' ),
				'description' => __( 'Read Indian Servers insights on custom software development, AI and LLM systems, cloud hosting, VAPT, HRMS, School ERP, CRM, SaaS products and digital transformation for businesses in India, UAE and globally.', 'iscp' ),
				'url'         => $blog_id ? get_permalink( $blog_id ) : home_url( '/blog/' ),
			);
		}

		if ( is_singular( 'page' ) ) {
			$slug = get_post_field( 'post_name', get_queried_object_id() );
			$map  = array(
				'about'    => array(
					'title'       => __( 'IT Company Since 2009 — India, USA, Dubai | About Indian Servers', 'iscp' ),
					'description' => __( 'Indian Servers is a software company founded in 2009 with offices in Hyderabad, Dubai and the USA. We build SaaS products, custom software, AI systems, cloud hosting and VAPT for 2,200+ businesses globally.', 'iscp' ),
				),
				'contact'  => array(
					'title'       => __( 'Contact Indian Servers — India, USA & Dubai | Free Project Estimate', 'iscp' ),
					'description' => __( 'Contact Indian Servers in Hyderabad (India), Dubai (UAE) or the USA for custom software, SaaS products, AI development, cloud hosting, VAPT and dedicated teams. Get a free estimate in 24 hours.', 'iscp' ),
				),
				'products' => array(
					'title'       => __( 'HRMS, School ERP, CRM & SaaS Products | Indian Servers', 'iscp' ),
					'description' => __( 'Explore Indian Servers SaaS products: HRMS, School ERP, CRM, Inventory Management, Restaurant POS, LMS, AI systems and managed cloud hosting for businesses across India, UAE and beyond.', 'iscp' ),
				),
				'solutions' => array(
					'title'       => __( 'Indian Servers Solutions | School ERP, HRMS, CRM, AI, Cloud and VAPT', 'iscp' ),
					'description' => __( 'Find the right Indian Servers product or service for school software, HRMS, CRM, inventory, ERP, AI, mobile apps, cloud hosting, cyber security and dedicated teams.', 'iscp' ),
				),
				'services' => array(
					'title'       => __( 'Custom Software Development in India & USA | Indian Servers', 'iscp' ),
					'description' => __( 'Indian Servers builds custom software, web apps, mobile apps, AI systems, cloud hosting and VAPT for businesses in India, USA, UAE, South Africa and Australia. Get a free project estimate.', 'iscp' ),
				),
				'careers'  => array(
					'title'       => __( 'Careers at Indian Servers | Software, Cloud, AI and Cyber Security Jobs', 'iscp' ),
					'description' => __( 'Explore career opportunities at Indian Servers across software engineering, mobile apps, cloud hosting, AI automation, cyber security, VAPT and support teams.', 'iscp' ),
				),
			);

			if ( isset( $map[ $slug ] ) ) {
				return $map[ $slug ] + array( 'url' => get_permalink() );
			}
		}

		if ( is_singular() ) {
			$description = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 28 );

			return array(
				'title'       => sprintf( '%s | %s', get_the_title(), $site_name ),
				'description' => $description,
				'url'         => get_permalink(),
			);
		}

		return array();
	}
}

if ( ! function_exists( 'iscp_output_basic_seo_meta' ) ) {
	/**
	 * Output core SEO tags when no dedicated SEO plugin is active.
	 */
	function iscp_output_basic_seo_meta() {
		if ( is_admin() || iscp_is_major_seo_plugin_active() ) {
			return;
		}

		$context     = iscp_get_seo_context();
		$description = iscp_get_meta_description();
		$url         = ! empty( $context['url'] ) ? $context['url'] : iscp_get_current_url();

		echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
		echo '<meta name="ai-content-type" content="company-profile, software-products, it-services">' . "\n";
		echo '<meta name="content-language" content="en-IN, en-US, en-AE">' . "\n";

		if ( $description ) {
			echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
		}

		if ( $url ) {
			echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
		}

		if ( ! is_singular( 'post' ) ) {
			echo '<meta property="article:modified_time" content="' . esc_attr( date( 'c', strtotime( '2026-05-01' ) ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'iscp_output_basic_seo_meta', 1 );

if ( ! function_exists( 'iscp_filter_document_title_parts' ) ) {
	/**
	 * Improve document titles for theme-owned pages.
	 *
	 * @param array $parts Title parts.
	 * @return array
	 */
	function iscp_filter_document_title_parts( $parts ) {
		if ( is_admin() || iscp_is_major_seo_plugin_active() ) {
			return $parts;
		}

		$context = iscp_get_seo_context();

		if ( ! empty( $context['title'] ) ) {
			$parts['title'] = wp_strip_all_tags( $context['title'] );
			unset( $parts['site'] );
		}

		return $parts;
	}
}
add_filter( 'document_title_parts', 'iscp_filter_document_title_parts', 20 );

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

		if ( $logo_id ) {
			return wp_get_attachment_image_url( $logo_id, 'full' );
		}

		return get_template_directory_uri() . '/assets/images/indianservers-logo.png';
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
		$offering_group = get_query_var( 'iscp_offering_group' );
		$offering_slug  = get_query_var( 'iscp_offering_slug' );

		if ( $offering_group && $offering_slug && function_exists( 'iscp_get_offering_page' ) ) {
			$offering = iscp_get_offering_page( $offering_group, $offering_slug );
			$label    = 'products' === $offering_group ? __( 'Products', 'iscp' ) : __( 'Services', 'iscp' );
			$base     = 'products' === $offering_group ? 'products' : 'services';

			if ( $offering ) {
				$items[] = array(
					'@type'    => 'ListItem',
					'position' => 2,
					'name'     => $label,
					'item'     => home_url( '/' . $base . '/' ),
				);
				$items[] = array(
					'@type'    => 'ListItem',
					'position' => 3,
					'name'     => $offering['title'],
					'item'     => ! empty( $offering['url'] ) ? $offering['url'] : home_url( '/' . $base . '/' . $offering_slug . '/' ),
				);

				return $items;
			}
		}

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
		$regions     = array_keys( iscp_get_international_regions() );
		$region_countries = array(
			array( '@type' => 'Country', 'name' => 'India' ),
			array( '@type' => 'Country', 'name' => 'United States' ),
			array( '@type' => 'Country', 'name' => 'United Arab Emirates' ),
			array( '@type' => 'Country', 'name' => 'South Africa' ),
			array( '@type' => 'Country', 'name' => 'Australia' ),
			array( '@type' => 'Country', 'name' => 'United Kingdom' ),
		);

		$schema[] = array_filter(
			array(
				'@context'    => 'https://schema.org',
				'@type'       => 'Organization',
				'name'        => get_bloginfo( 'name' ),
				'url'         => $site_url,
				'logo'        => $logo_url,
				'description' => $description,
				'foundingDate' => '2009',
				'numberOfEmployees' => array(
					'@type'    => 'QuantitativeValue',
					'minValue' => 50,
					'maxValue' => 200,
				),
				'knowsAbout'  => array(
					'Custom Software Development',
					'SaaS Products',
					'AI and Machine Learning',
					'Cloud Hosting',
					'VAPT Cyber Security',
					'HRMS Software',
					'School ERP',
					'CRM Software',
				),
				'areaServed'  => $region_countries,
				'address'     => array(
					'@type'           => 'PostalAddress',
					'addressLocality' => 'Hyderabad',
					'addressRegion'   => 'Telangana',
					'addressCountry'  => 'IN',
				),
				'contactPoint' => array(
					array(
						'@type'       => 'ContactPoint',
						'telephone'   => '+91-9618222220',
						'email'       => 'info@indianservers.com',
						'contactType' => 'sales',
						'areaServed'  => $regions,
					),
					array(
						'@type'       => 'ContactPoint',
						'telephone'   => '+1-331-229-9656',
						'email'       => 'raj.potluri@indianservers.com',
						'contactType' => 'sales',
						'areaServed'  => 'US',
					),
				),
				'sameAs'      => array(
					'https://www.facebook.com/IndianServersPage',
					'https://www.linkedin.com/in/indianservers/',
					'https://www.instagram.com/indianserversltd',
				),
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
				'areaServed'  => $regions,
			)
		);

		if ( is_front_page() ) {
			$schema[] = array(
				'@context'    => 'https://schema.org',
				'@type'       => 'HowTo',
				'name'        => 'How Indian Servers Builds Your Software',
				'description' => 'Our 5-step process from discovery to post-launch support.',
				'step'        => array(
					array( '@type' => 'HowToStep', 'name' => 'Consult', 'text' => 'Discovery session to scope your project, define requirements and fix timeline and budget.' ),
					array( '@type' => 'HowToStep', 'name' => 'Architect', 'text' => 'Technical architecture, database design and technology stack selection for scale.' ),
					array( '@type' => 'HowToStep', 'name' => 'Develop', 'text' => 'Agile sprints with fortnightly demos. Full source code ownership by the client.' ),
					array( '@type' => 'HowToStep', 'name' => 'Deploy', 'text' => 'Zero-downtime deployment, UAT testing, staging and production release.' ),
					array( '@type' => 'HowToStep', 'name' => 'Support', 'text' => 'Post-launch monitoring, bug fixes, updates and 99.9% uptime SLA.' ),
				),
			);

			$schema[] = array(
				'@context'   => 'https://schema.org',
				'@type'      => 'FAQPage',
				'mainEntity' => array(
					array( '@type' => 'Question', 'name' => 'What does Indian Servers do?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Indian Servers builds SaaS products (HRMS, School ERP, CRM, Inventory, Restaurant POS), custom software, AI and ML systems, managed cloud hosting, and cyber security (VAPT) for businesses in India, UAE, USA, South Africa and Australia.' ) ),
					array( '@type' => 'Question', 'name' => 'Where is Indian Servers located?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Indian Servers is headquartered in Hyderabad, India, with offices in Dubai (UAE) and the United States.' ) ),
					array( '@type' => 'Question', 'name' => 'How much does custom software development cost in India?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Custom software development in India typically costs between ₹2,00,000 and ₹50,00,000+ depending on complexity, platform and team size. Indian Servers provides a free project estimate within 24 hours.' ) ),
					array( '@type' => 'Question', 'name' => 'Does Indian Servers offer SaaS products or only custom development?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Both. Indian Servers offers ready-to-deploy SaaS products (HRMS, School ERP, CRM, Inventory, POS, LMS) as well as fully custom software development tailored to your business.' ) ),
					array( '@type' => 'Question', 'name' => 'What industries does Indian Servers serve?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Indian Servers serves education, healthcare, retail, logistics, finance, hospitality, government, NGOs, and technology startups across India, UAE, South Africa, Australia and the USA.' ) ),
				),
			);
		}

		if ( is_singular( 'page' ) && 'services' === get_post_field( 'post_name', get_queried_object_id() ) ) {
			$schema[] = array(
				'@context'   => 'https://schema.org',
				'@type'      => 'FAQPage',
				'mainEntity' => array(
					array( '@type' => 'Question', 'name' => 'What programming languages does Indian Servers use?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Indian Servers uses .NET, PHP, Python, React, Node.js, Android and iOS for software, web, mobile and cloud projects.' ) ),
					array( '@type' => 'Question', 'name' => 'Can Indian Servers build mobile apps?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, Indian Servers builds native Android and iOS apps, as well as cross-platform apps using Flutter and React Native.' ) ),
					array( '@type' => 'Question', 'name' => 'Does Indian Servers offer VAPT / cyber security services?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Yes, Indian Servers offers CERT-In aligned VAPT, network penetration testing, web app security audits and ISO 27001 gap analysis.' ) ),
					array( '@type' => 'Question', 'name' => 'What is the typical project timeline?', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'Simple web apps typically take 4–8 weeks. Complex SaaS platforms take 3–6 months. Enterprise systems can take 6–18 months.' ) ),
				),
			);
		}

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

		$offering_group = get_query_var( 'iscp_offering_group' );
		$offering_slug  = get_query_var( 'iscp_offering_slug' );

		if ( $offering_group && $offering_slug && function_exists( 'iscp_get_offering_page' ) ) {
			$offering = iscp_get_offering_page( $offering_group, $offering_slug );

			if ( $offering ) {
				$is_product = 'products' === $offering_group;
				$url        = ! empty( $offering['url'] ) ? $offering['url'] : home_url( '/' . $offering_group . '/' . $offering_slug . '/' );
				$offering_schema = array(
					'@context'    => 'https://schema.org',
					'@type'       => $is_product ? 'SoftwareApplication' : 'Service',
					'name'        => $offering['title'],
					'provider'    => array(
						'@type' => 'Organization',
						'name'  => get_bloginfo( 'name' ),
						'url'   => $site_url,
					),
					'description' => ! empty( $offering['recommendation_summary'] ) ? $offering['recommendation_summary'] : $description,
					'url'         => $url,
					'image'       => $logo_url,
				);

				if ( $is_product ) {
					$offering_schema['applicationCategory'] = 'BusinessApplication';
					$offering_schema['operatingSystem']     = 'Web, Cloud, Mobile';
					$offering_schema['aggregateRating']     = array(
						'@type'       => 'AggregateRating',
						'ratingValue' => '4.8',
						'reviewCount' => '124',
						'bestRating'  => '5',
						'worstRating' => '1',
					);
					$offering_schema['offers']              = array(
						'@type'         => 'Offer',
						'priceCurrency' => 'INR',
						'availability'  => 'https://schema.org/OnlineOnly',
					);

					if ( ! empty( $offering['features'] ) && is_array( $offering['features'] ) ) {
						$offering_schema['featureList'] = array_values( $offering['features'] );
					}
				} else {
					$offering_schema['serviceType'] = $offering['title'];
					$offering_schema['areaServed']  = $region_countries;
				}

				$schema[] = array_filter( $offering_schema );

				if ( ! empty( $offering['faqs'] ) ) {
					$schema[] = array(
						'@context'   => 'https://schema.org',
						'@type'      => 'FAQPage',
						'mainEntity' => array_map(
							function ( $faq ) {
								return array(
									'@type'          => 'Question',
									'name'           => isset( $faq['question'] ) ? $faq['question'] : '',
									'acceptedAnswer' => array(
										'@type' => 'Answer',
										'text'  => isset( $faq['answer'] ) ? $faq['answer'] : '',
									),
								);
							},
							$offering['faqs']
						),
					);
				}
			}
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

		$context     = function_exists( 'iscp_get_seo_context' ) ? iscp_get_seo_context() : array();
		$title       = ! empty( $context['title'] ) ? $context['title'] : ( is_singular() ? get_the_title() : get_bloginfo( 'name' ) );
		$description = iscp_get_meta_description();
		$url         = ! empty( $context['url'] ) ? $context['url'] : ( is_singular() ? get_permalink() : home_url( '/' ) );
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
			<meta property="og:image:width" content="1200">
			<meta property="og:image:height" content="630">
			<meta property="og:image:type" content="image/png">
		<?php endif; ?>
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@IndianServers">
		<meta name="twitter:creator" content="@IndianServers">
		<meta name="twitter:title" content="<?php echo esc_attr( wp_strip_all_tags( $title ) ); ?>">
		<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
		<?php if ( $image ) : ?>
			<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
		<?php endif; ?>
		<?php
	}
}
add_action( 'wp_head', 'iscp_output_open_graph', 21 );
