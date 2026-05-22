<?php
/**
 * Template helper functions.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_get_theme_mod' ) ) {
	/**
	 * Return a theme mod with a default fallback.
	 *
	 * @param string $key Theme mod key.
	 * @param mixed  $default Default value.
	 * @return mixed
	 */
	function iscp_get_theme_mod( $key, $default = '' ) {
		if ( '' === $default && function_exists( 'iscp_get_customizer_defaults' ) ) {
			$defaults = iscp_get_customizer_defaults();

			if ( array_key_exists( $key, $defaults ) ) {
				$default = $defaults[ $key ];
			}
		}

		return get_theme_mod( $key, $default );
	}
}

if ( ! function_exists( 'iscp_posted_on' ) ) {
	/**
	 * Print post date.
	 */
	function iscp_posted_on() {
		printf(
			'<span class="iscp-posted-on"><time datetime="%1$s">%2$s</time></span>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
	}
}

if ( ! function_exists( 'iscp_posted_by' ) ) {
	/**
	 * Print post author.
	 */
	function iscp_posted_by() {
		printf(
			'<span class="iscp-byline">%1$s <a href="%2$s">%3$s</a></span>',
			esc_html__( 'by', 'iscp' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}

if ( ! function_exists( 'iscp_entry_footer' ) ) {
	/**
	 * Print entry footer metadata.
	 */
	function iscp_entry_footer() {
		$categories = get_the_category_list( esc_html__( ', ', 'iscp' ) );
		$tags       = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'iscp' ) );

		if ( $categories ) {
			printf(
				'<span class="iscp-cat-links">%1$s %2$s</span>',
				esc_html__( 'Posted in', 'iscp' ),
				wp_kses_post( $categories )
			);
		}

		if ( $tags ) {
			printf(
				'<span class="iscp-tags-links">%1$s %2$s</span>',
				esc_html__( 'Tagged', 'iscp' ),
				wp_kses_post( $tags )
			);
		}
	}
}

if ( ! function_exists( 'iscp_get_footer_description' ) ) {
	/**
	 * Return footer description text.
	 *
	 * @return string
	 */
	function iscp_get_footer_description() {
		return iscp_get_theme_mod( 'iscp_footer_description' );
	}
}

if ( ! function_exists( 'iscp_get_first_term_name' ) ) {
	/**
	 * Return the first term name for a post taxonomy.
	 *
	 * @param int    $post_id Post ID.
	 * @param string $taxonomy Taxonomy.
	 * @return string
	 */
	function iscp_get_first_term_name( $post_id, $taxonomy ) {
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( is_wp_error( $terms ) || empty( $terms ) ) {
			return '';
		}

		return $terms[0]->name;
	}
}

if ( ! function_exists( 'iscp_body_classes' ) ) {
	/**
	 * Add design system body classes.
	 *
	 * @param array $classes Body classes.
	 * @return array
	 */
	function iscp_body_classes( $classes ) {
		$class_settings = array(
			'iscp_design_preset'          => 'iscp-design-preset-',
			'iscp_layout_preset'          => 'iscp-layout-preset-',
			'iscp_button_shape'           => 'iscp-button-shape-',
			'iscp_button_size'            => 'iscp-button-size-',
			'iscp_card_style'             => 'iscp-card-style-',
			'iscp_card_hover'             => 'iscp-card-hover-',
			'iscp_icon_style'             => 'iscp-icon-style-',
			'iscp_section_style'          => 'iscp-section-style-',
			'iscp_form_style'             => 'iscp-form-style-',
			'iscp_component_header_style' => 'iscp-header-style-',
			'iscp_component_footer_style' => 'iscp-footer-style-',
		);

		foreach ( $class_settings as $setting => $prefix ) {
			$classes[] = $prefix . sanitize_html_class( iscp_get_theme_mod( $setting ) );
		}

		if ( iscp_get_theme_mod( 'iscp_animations_enabled', true ) ) {
			$classes[] = 'iscp-animations-enabled';
		} else {
			$classes[] = 'iscp-animations-disabled';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'iscp_body_classes' );

if ( ! function_exists( 'iscp_get_menu_icon_key' ) ) {
	/**
	 * Resolve a menu icon from manual CSS class, URL or title keywords.
	 *
	 * @param WP_Post|array|string $item Menu item, array or label.
	 * @param string               $fallback Fallback icon key.
	 * @return string
	 */
	function iscp_get_menu_icon_key( $item, $fallback = 'cube' ) {
		$title   = '';
		$url     = '';
		$classes = array();

		if ( is_object( $item ) ) {
			$title   = isset( $item->title ) ? $item->title : '';
			$url     = isset( $item->url ) ? $item->url : '';
			$classes = isset( $item->classes ) && is_array( $item->classes ) ? $item->classes : array();
		} elseif ( is_array( $item ) ) {
			$title   = isset( $item['title'] ) ? $item['title'] : '';
			$url     = isset( $item['url'] ) ? $item['url'] : '';
			$classes = isset( $item['classes'] ) && is_array( $item['classes'] ) ? $item['classes'] : array();
		} else {
			$title = (string) $item;
		}

		foreach ( $classes as $class ) {
			if ( 0 === strpos( $class, 'iscp-icon-' ) ) {
				return sanitize_key( substr( $class, 10 ) );
			}
		}

		$haystack = strtolower( wp_strip_all_tags( $title . ' ' . $url . ' ' . implode( ' ', $classes ) ) );
		$matches  = array(
			'home'       => array( 'home', 'index' ),
			'about'      => array( 'about', 'company', 'profile', 'story' ),
			'services'   => array( 'services', 'solutions', 'consulting' ),
			'products'   => array( 'products', 'saas', 'software' ),
			'contact'    => array( 'contact', 'enquiry', 'project' ),
			'team'       => array( 'hrms', 'hr ', 'human resource', 'people', 'team', 'dedicated' ),
			'education'  => array( 'school', 'education', 'learning', 'lms' ),
			'crm'        => array( 'crm', 'customer', 'sales' ),
			'inventory'  => array( 'inventory', 'stock', 'warehouse' ),
			'restaurant' => array( 'restaurant', 'pos', 'billing' ),
			'cloud'      => array( 'cloud', 'hosting', 'server', 'devops' ),
			'shield'     => array( 'cyber', 'security', 'vapt', 'audit' ),
			'ai'         => array( 'ai', 'automation', 'machine learning' ),
			'ar'         => array( 'ar', 'vr', 'metaverse', '3d' ),
			'mobile'     => array( 'mobile', 'android', 'ios', 'app' ),
			'web'        => array( 'web', 'website', 'portal' ),
			'code'       => array( '.net', 'php', 'python', 'custom', 'development' ),
			'chart'      => array( 'analytics', 'reports', 'dashboard', 'growth' ),
		);

		foreach ( $matches as $icon => $needles ) {
			foreach ( $needles as $needle ) {
				if ( false !== strpos( $haystack, $needle ) ) {
					return $icon;
				}
			}
		}

		return sanitize_key( $fallback );
	}
}

if ( ! function_exists( 'iscp_get_menu_icon_path' ) ) {
	/**
	 * Return SVG path data for menu icons.
	 *
	 * @param string $icon Icon key.
	 * @return string
	 */
	function iscp_get_menu_icon_path( $icon ) {
		$icons = array(
			'home'     => 'M3 11.2 12 4l9 7.2-1.3 1.5L18 11.4V20h-5v-5h-2v5H6v-8.6l-1.7 1.3L3 11.2Z',
			'about'    => 'M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm-1 7h2v9h-2V9Zm0-4h2v2h-2V5Z',
			'services' => 'M7 3h10l4 7-9 11L3 10l4-7Zm1.1 2L5.5 9h13L15.9 5H8.1ZM7 11l5 6.1 5-6.1H7Z',
			'products' => 'M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3Zm0 2.3L6 8.7v6.6l6 3.4 6-3.4V8.7l-6-3.4Z',
			'contact'  => 'M4 4h16v13H7.6L4 20V4Zm2 2v9.4l.8-.7H18V6H6Zm2.5 3h7v2h-7V9Zm0 3h5v2h-5v-2Z',
		);

		if ( isset( $icons[ $icon ] ) ) {
			return $icons[ $icon ];
		}

		if ( function_exists( 'iscp_get_offering_icon_path' ) ) {
			return iscp_get_offering_icon_path( $icon );
		}

		return $icons['products'];
	}
}

if ( ! function_exists( 'iscp_get_menu_icon_markup' ) ) {
	/**
	 * Return menu icon SVG markup.
	 *
	 * @param string $icon Icon key.
	 * @return string
	 */
	function iscp_get_menu_icon_markup( $icon ) {
		return sprintf(
			'<span class="iscp-menu-icon iscp-menu-icon-%1$s" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="%2$s"/></svg></span>',
			esc_attr( sanitize_html_class( $icon ) ),
			esc_attr( iscp_get_menu_icon_path( $icon ) )
		);
	}
}

if ( ! class_exists( 'ISCP_Icon_Menu_Walker' ) ) {
	/**
	 * Render WordPress navigation menu items with compact icons.
	 */
	class ISCP_Icon_Menu_Walker extends Walker_Nav_Menu {
		/**
		 * Start the element output.
		 *
		 * @param string   $output Used to append additional content.
		 * @param WP_Post  $item   Menu item data object.
		 * @param int      $depth  Depth of menu item.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 * @param int      $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			$indent  = $depth ? str_repeat( "\t", $depth ) : '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = implode( ' ', array_filter( $classes ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$output .= $indent . '<li' . $class_names . '>';

			$atts = array(
				'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
				'target' => ! empty( $item->target ) ? $item->target : '',
				'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
				'href'   => ! empty( $item->url ) ? $item->url : '',
			);

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( '' === $value ) {
					continue;
				}

				$value = 'href' === $attr ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}

			$title = apply_filters( 'the_title', $item->title, $item->ID );
			$icon  = iscp_get_menu_icon_key( $item, $depth ? 'cube' : 'products' );
			$item_output  = isset( $args->before ) ? $args->before : '';
			$item_output .= '<a' . $attributes . '>';
			$item_output .= iscp_get_menu_icon_markup( $icon );
			$item_output .= '<span class="iscp-menu-text">' . ( isset( $args->link_before ) ? $args->link_before : '' ) . esc_html( $title ) . ( isset( $args->link_after ) ? $args->link_after : '' ) . '</span>';
			$item_output .= '</a>';
			$item_output .= isset( $args->after ) ? $args->after : '';

			$output .= $item_output;
		}
	}
}

if ( ! function_exists( 'iscp_append_primary_navigation_items' ) ) {
	/**
	 * Keep core Indian Servers routes visible even when an older menu is active.
	 *
	 * @param string   $items Menu item HTML.
	 * @param stdClass $args  Menu arguments.
	 * @return string
	 */
	function iscp_append_primary_navigation_items( $items, $args ) {
		if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
			return $items;
		}

		$build_submenu = function( $group, $limit ) {
			if ( ! function_exists( 'iscp_get_offering_navigation_groups' ) ) {
				return '';
			}

			$groups = iscp_get_offering_navigation_groups();

			if ( empty( $groups[ $group ] ) ) {
				return '';
			}

			$submenu = '<ul class="sub-menu">';

			foreach ( array_slice( $groups[ $group ], 0, $limit, true ) as $slug => $offering ) {
				$icon = isset( $offering['icon'] ) ? $offering['icon'] : iscp_get_menu_icon_key( $offering['title'] );
				$submenu .= sprintf(
					'<li class="menu-item"><a href="%1$s">%2$s<span class="iscp-menu-text">%3$s</span></a></li>',
					esc_url( home_url( '/' . $group . '/' . $slug . '/' ) ),
					iscp_get_menu_icon_markup( $icon ),
					esc_html( $offering['title'] )
				);
			}

			$submenu .= '</ul>';

			return $submenu;
		};

		$submenu_targets = array(
			'services' => array(
				'needle' => '/services/',
				'marker' => '/services/custom-software-development/',
				'limit'  => 8,
			),
			'products' => array(
				'needle' => '/products/',
				'marker' => '/products/hrms/',
				'limit'  => 10,
			),
			'solutions' => array(
				'needle' => '/solutions/',
				'marker' => '/products/hrms/',
				'limit'  => 10,
				'group'  => 'products',
			),
		);

		foreach ( $submenu_targets as $target_group => $target ) {
			$group = isset( $target['group'] ) ? $target['group'] : $target_group;

			if ( false === strpos( $items, $target['needle'] ) || false !== strpos( $items, $target['marker'] ) ) {
				continue;
			}

			$submenu = $build_submenu( $group, $target['limit'] );

			if ( ! $submenu ) {
				continue;
			}

			$pattern = '#(<li[^>]*>\s*<a[^>]+href=["\'][^"\']*' . preg_quote( $target['needle'], '#' ) . '["\'][^>]*>.*?</a>)(\s*</li>)#i';
			$items   = preg_replace( $pattern, '$1' . $submenu . '$2', $items, 1 );
		}

		$required_links = array(
			array(
				'label' => __( 'Services', 'iscp' ),
				'url'   => home_url( '/services/' ),
				'needle' => '/services/',
				'group' => 'services',
			),
			array(
				'label' => __( 'Products', 'iscp' ),
				'url'   => home_url( '/products/' ),
				'needle' => '/products/',
				'group' => 'products',
			),
		);

		foreach ( $required_links as $link ) {
			if ( false !== strpos( $items, $link['needle'] ) || false !== strpos( wp_strip_all_tags( $items ), $link['label'] ) ) {
				continue;
			}

			$submenu = $build_submenu( $link['group'], 'services' === $link['group'] ? 8 : 10 );

			$items .= sprintf(
				'<li class="menu-item menu-item-has-children iscp-menu-item-auto"><a href="%1$s">%2$s<span class="iscp-menu-text">%3$s</span></a>%4$s</li>',
				esc_url( $link['url'] ),
				iscp_get_menu_icon_markup( iscp_get_menu_icon_key( $link['label'] ) ),
				esc_html( $link['label'] ),
				$submenu
			);
		}

		return $items;
	}
}
add_filter( 'wp_nav_menu_items', 'iscp_append_primary_navigation_items', 10, 2 );

if ( ! function_exists( 'iscp_get_social_icon_path' ) ) {
	/**
	 * Return SVG path data for social icons.
	 *
	 * @param string $network Social network label.
	 * @return string
	 */
	function iscp_get_social_icon_path( $network ) {
		$network = strtolower( $network );
		$icons   = array(
			'facebook'  => 'M14 8h2V5h-2c-2.2 0-4 1.8-4 4v2H8v3h2v7h3v-7h2.5l.5-3h-3V9c0-.6.4-1 1-1Z',
			'linkedin'  => 'M5 8.8h3.2V19H5V8.8ZM6.6 4a1.9 1.9 0 1 1 0 3.8A1.9 1.9 0 0 1 6.6 4Zm4 4.8h3v1.4h.1c.4-.8 1.5-1.7 3.1-1.7 3.3 0 3.9 2.2 3.9 5V19h-3.2v-5c0-1.2 0-2.7-1.7-2.7s-1.9 1.3-1.9 2.6V19h-3.2V8.8Z',
			'instagram' => 'M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9a4.5 4.5 0 0 1-4.5 4.5h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Zm0 2A2.5 2.5 0 0 0 5 7.5v9A2.5 2.5 0 0 0 7.5 19h9a2.5 2.5 0 0 0 2.5-2.5v-9A2.5 2.5 0 0 0 16.5 5h-9ZM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8Zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm4.8-3.1a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z',
			'whatsapp'  => 'M12 2.2A9.7 9.7 0 0 0 3.8 17L3 21l4.1-1A9.7 9.7 0 1 0 12 2.2Zm0 17.4a7.7 7.7 0 0 1-3.9-1l-.3-.2-2.4.6.5-2.3-.2-.4A7.6 7.6 0 1 1 12 19.6Zm4.3-5.8c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.6.1-.2.3-.7.8-.8 1-.2.2-.3.2-.6.1a6.3 6.3 0 0 1-1.8-1.1 6.8 6.8 0 0 1-1.3-1.6c-.1-.3 0-.4.1-.5l.4-.5c.1-.2.2-.3.3-.5a.5.5 0 0 0 0-.5c-.1-.1-.6-1.4-.8-1.9-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.2.3-.9.9-.9 2.1s.9 2.4 1 2.6c.1.2 1.8 2.8 4.4 3.9 1.6.7 2.2.8 3 .7.5-.1 1.4-.6 1.6-1.1.2-.6.2-1.1.1-1.2 0-.1-.2-.2-.4-.3Z',
		);

		return isset( $icons[ $network ] ) ? $icons[ $network ] : 'M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm1 5v4h4v2h-4v4h-2v-4H7v-2h4V7h2Z';
	}
}

if ( ! function_exists( 'iscp_render_social_icon' ) ) {
	/**
	 * Print a social SVG icon.
	 *
	 * @param string $network Social network label.
	 */
	function iscp_render_social_icon( $network ) {
		printf(
			'<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="%s"/></svg>',
			esc_attr( iscp_get_social_icon_path( $network ) )
		);
	}
}

if ( ! function_exists( 'iscp_render_template_hero' ) ) {
	/**
	 * Render a reusable template hero.
	 *
	 * @param array $args Hero arguments.
	 */
	function iscp_render_template_hero( $args = array() ) {
		$defaults = array(
			'eyebrow'     => __( 'ISCP Template Studio', 'iscp' ),
			'title'       => get_the_title(),
			'description' => '',
			'variant'     => 'default',
			'visual'      => '',
			'primary'     => array(),
			'secondary'   => array(),
		);
		$args = wp_parse_args( $args, $defaults );
		?>
		<section class="iscp-template-hero iscp-template-hero-<?php echo esc_attr( sanitize_html_class( $args['variant'] ) ); ?>">
			<div class="iscp-container iscp-template-hero-grid">
				<div class="iscp-template-hero-copy">
					<p class="iscp-eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
					<h1><?php echo esc_html( $args['title'] ); ?></h1>
					<?php if ( $args['description'] ) : ?>
						<p class="iscp-template-hero-lead"><?php echo esc_html( $args['description'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['primary']['label'] ) || ! empty( $args['secondary']['label'] ) ) : ?>
						<div class="iscp-action-row">
							<?php if ( ! empty( $args['primary']['label'] ) ) : ?>
								<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( isset( $args['primary']['url'] ) ? $args['primary']['url'] : '#' ); ?>"><?php echo esc_html( $args['primary']['label'] ); ?></a>
							<?php endif; ?>
							<?php if ( ! empty( $args['secondary']['label'] ) ) : ?>
								<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( isset( $args['secondary']['url'] ) ? $args['secondary']['url'] : '#' ); ?>"><?php echo esc_html( $args['secondary']['label'] ); ?></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( $args['visual'] ) : ?>
					<div class="iscp-template-hero-visual" aria-hidden="true">
						<?php iscp_render_mockup_component( $args['visual'] ); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_page_content_area' ) ) {
	/**
	 * Render editable page content when present.
	 */
	function iscp_render_page_content_area() {
		if ( ! have_posts() ) {
			return;
		}

		while ( have_posts() ) {
			the_post();

			if ( '' === trim( get_the_content() ) ) {
				continue;
			}
			?>
			<section class="iscp-section iscp-template-content">
				<div class="iscp-container iscp-entry-content">
					<?php the_content(); ?>
				</div>
			</section>
			<?php
		}
	}
}

if ( ! function_exists( 'iscp_render_mockup_component' ) ) {
	/**
	 * Render a CSS-only screenshot/browser placeholder.
	 *
	 * @param string $type Mockup type.
	 */
	function iscp_render_mockup_component( $type = 'dashboard' ) {
		$type = sanitize_html_class( $type );
		?>
		<div class="iscp-browser-frame iscp-mockup-type-<?php echo esc_attr( $type ); ?>">
			<div class="iscp-browser-chrome"><span></span><span></span><span></span></div>
			<div class="iscp-app-window">
				<div class="iscp-dashboard-preview">
					<span></span><span></span><span></span><span></span>
				</div>
				<div class="iscp-mobile-preview"></div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_comparison_table' ) ) {
	/**
	 * Render an accessible comparison table.
	 *
	 * @param string $caption Table caption.
	 * @param array  $columns Columns.
	 * @param array  $rows Rows.
	 */
	function iscp_render_comparison_table( $caption, $columns, $rows ) {
		?>
		<div class="iscp-comparison-table-wrap" role="region" aria-label="<?php echo esc_attr( $caption ); ?>" tabindex="0">
			<table class="iscp-comparison-table">
				<caption><?php echo esc_html( $caption ); ?></caption>
				<thead>
					<tr>
						<?php foreach ( $columns as $column ) : ?>
							<th scope="col"><?php echo esc_html( $column ); ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<?php foreach ( $row as $index => $cell ) : ?>
								<?php if ( 0 === $index ) : ?>
									<th scope="row"><?php echo esc_html( $cell ); ?></th>
								<?php else : ?>
									<td><?php echo esc_html( $cell ); ?></td>
								<?php endif; ?>
							<?php endforeach; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_template_cta' ) ) {
	/**
	 * Render a reusable template CTA.
	 *
	 * @param string $title CTA title.
	 * @param string $text CTA text.
	 * @param string $button Button label.
	 * @param string $url Button URL.
	 */
	function iscp_render_template_cta( $title, $text, $button, $url ) {
		?>
		<section class="iscp-section iscp-template-cta">
			<div class="iscp-container">
				<div class="iscp-cta-box">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Next Step', 'iscp' ); ?></p>
					<h2><?php echo esc_html( $title ); ?></h2>
					<p><?php echo esc_html( $text ); ?></p>
					<a class="iscp-btn iscp-btn-light" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $button ); ?></a>
				</div>
			</div>
		</section>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_case_study_grid' ) ) {
	/**
	 * Render a case study grid with fallback cards.
	 *
	 * @param int $posts_per_page Number of posts.
	 */
	function iscp_render_case_study_grid( $posts_per_page = 9 ) {
		$query = new WP_Query(
			array(
				'post_type'           => 'iscp_case_study',
				'posts_per_page'      => absint( $posts_per_page ),
				'ignore_sticky_posts' => true,
			)
		);
		$fallback = array(
			array( 'title' => __( 'SaaS Launch Story', 'iscp' ), 'result' => __( 'A conversion-focused layout for product growth and lead generation.', 'iscp' ) ),
			array( 'title' => __( 'Service Brand Refresh', 'iscp' ), 'result' => __( 'A professional structure for trust, proof and buyer education.', 'iscp' ) ),
			array( 'title' => __( 'Training Platform Rollout', 'iscp' ), 'result' => __( 'A practical page system for courses, outcomes and enrollment.', 'iscp' ) ),
		);
		?>
		<div class="iscp-card-grid iscp-card-grid-3">
			<?php if ( $query->have_posts() ) : ?>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/cards/card', 'case-study' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $fallback as $item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'case-study', $item + array( 'url' => home_url( '/case-studies/' ) ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_get_reading_time' ) ) {
	/**
	 * Estimate reading time for a post.
	 *
	 * @param int $post_id Post ID.
	 * @return int
	 */
	function iscp_get_reading_time( $post_id = 0 ) {
		$post_id = $post_id ? absint( $post_id ) : get_the_ID();
		$content = get_post_field( 'post_content', $post_id );
		$words   = str_word_count( wp_strip_all_tags( strip_shortcodes( $content ) ) );

		return max( 1, (int) ceil( $words / 220 ) );
	}
}

if ( ! function_exists( 'iscp_render_reading_time' ) ) {
	/**
	 * Render reading time on blog posts.
	 */
	function iscp_render_reading_time() {
		if ( ! iscp_get_theme_mod( 'iscp_reading_time_enabled', true ) || 'post' !== get_post_type() ) {
			return;
		}

		$reading_time = iscp_get_reading_time();

		printf(
			'<span class="iscp-reading-time">%1$s</span>',
			esc_html(
				sprintf(
					/* translators: %d: reading time in minutes. */
					_n( '%d min read', '%d min read', $reading_time, 'iscp' ),
					$reading_time
				)
			)
		);
	}
}

if ( ! function_exists( 'iscp_render_share_buttons' ) ) {
	/**
	 * Render native share buttons for posts.
	 */
	function iscp_render_share_buttons() {
		if ( ! iscp_get_theme_mod( 'iscp_share_buttons_enabled', true ) || 'post' !== get_post_type() ) {
			return;
		}

		$url   = rawurlencode( get_permalink() );
		$title = rawurlencode( get_the_title() );
		$links = array(
			'linkedin' => array(
				'label'   => __( 'LinkedIn', 'iscp' ),
				'enabled' => iscp_get_theme_mod( 'iscp_share_linkedin_enabled', true ),
				'url'     => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $url,
			),
			'twitter'  => array(
				'label'   => __( 'X/Twitter', 'iscp' ),
				'enabled' => iscp_get_theme_mod( 'iscp_share_twitter_enabled', true ),
				'url'     => 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title,
			),
			'facebook' => array(
				'label'   => __( 'Facebook', 'iscp' ),
				'enabled' => iscp_get_theme_mod( 'iscp_share_facebook_enabled', true ),
				'url'     => 'https://www.facebook.com/sharer/sharer.php?u=' . $url,
			),
			'whatsapp' => array(
				'label'   => __( 'WhatsApp', 'iscp' ),
				'enabled' => iscp_get_theme_mod( 'iscp_share_whatsapp_enabled', true ),
				'url'     => 'https://wa.me/?text=' . $title . '%20' . $url,
			),
		);
		?>
		<nav class="iscp-share-buttons" aria-label="<?php esc_attr_e( 'Share this post', 'iscp' ); ?>">
			<span><?php esc_html_e( 'Share', 'iscp' ); ?></span>
			<?php foreach ( $links as $link ) : ?>
				<?php if ( $link['enabled'] ) : ?>
					<a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $link['label'] ); ?></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</nav>
		<?php
	}
}

if ( ! function_exists( 'iscp_render_conversion_tools' ) ) {
	/**
	 * Render optional conversion tools.
	 */
	function iscp_render_conversion_tools() {
		if ( iscp_get_theme_mod( 'iscp_scroll_progress_enabled', false ) ) {
			echo '<div class="iscp-scroll-progress" aria-hidden="true"><span></span></div>';
		}

		if ( iscp_get_theme_mod( 'iscp_sticky_cta_enabled', false ) ) {
			$display = iscp_get_theme_mod( 'iscp_sticky_cta_display', 'all' );
			?>
			<div class="iscp-sticky-cta iscp-sticky-cta-<?php echo esc_attr( sanitize_html_class( $display ) ); ?>">
				<p><?php echo esc_html( iscp_get_theme_mod( 'iscp_sticky_cta_text' ) ); ?></p>
				<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_sticky_cta_button_url' ) ); ?>"><?php echo esc_html( iscp_get_theme_mod( 'iscp_sticky_cta_button_text' ) ); ?></a>
			</div>
			<?php
		}

		if ( iscp_get_theme_mod( 'iscp_exit_modal_enabled', false ) ) {
			?>
			<div class="iscp-exit-modal" data-iscp-exit-modal hidden>
				<div class="iscp-exit-modal-backdrop" data-iscp-modal-close></div>
				<div class="iscp-exit-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="iscp-exit-modal-title" aria-describedby="iscp-exit-modal-description">
					<button class="iscp-exit-modal-close" type="button" data-iscp-modal-close><?php echo esc_html( iscp_get_theme_mod( 'iscp_exit_modal_close_text' ) ); ?></button>
					<p class="iscp-eyebrow"><?php esc_html_e( 'Quick Note', 'iscp' ); ?></p>
					<h2 id="iscp-exit-modal-title"><?php echo esc_html( iscp_get_theme_mod( 'iscp_exit_modal_title' ) ); ?></h2>
					<p id="iscp-exit-modal-description"><?php echo esc_html( iscp_get_theme_mod( 'iscp_exit_modal_description' ) ); ?></p>
					<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_exit_modal_button_url' ) ); ?>"><?php echo esc_html( iscp_get_theme_mod( 'iscp_exit_modal_button_text' ) ); ?></a>
				</div>
			</div>
			<?php
		}

		$whatsapp_number = preg_replace( '/[^0-9]/', '', iscp_get_theme_mod( 'iscp_whatsapp_number', '919618222220' ) );
		$social_links    = array(
			'Facebook'  => iscp_get_theme_mod( 'iscp_social_facebook', 'https://www.facebook.com/IndianServersPage' ),
			'LinkedIn'  => iscp_get_theme_mod( 'iscp_social_linkedin', 'https://www.linkedin.com/in/indianservers/' ),
			'Instagram' => iscp_get_theme_mod( 'iscp_social_instagram', 'https://www.instagram.com/indianserversltd' ),
		);

		if ( ! $whatsapp_number ) {
			$whatsapp_number = '919618222220';
		}
		?>
		<div class="iscp-floating-socials" aria-label="<?php esc_attr_e( 'Indian Servers quick contact links', 'iscp' ); ?>">
			<a class="iscp-floating-whatsapp" href="<?php echo esc_url( 'https://wa.me/' . $whatsapp_number . '?text=' . rawurlencode( __( 'Hello Indian Servers, I would like to discuss a project.', 'iscp' ) ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Send WhatsApp message to Indian Servers', 'iscp' ); ?>">
				<?php iscp_render_social_icon( 'WhatsApp' ); ?>
				<span><?php esc_html_e( 'Send', 'iscp' ); ?></span>
			</a>
			<?php foreach ( $social_links as $label => $url ) : ?>
				<?php if ( $url ) : ?>
					<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $label ); ?>"><?php iscp_render_social_icon( $label ); ?></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'iscp_get_cpt_default_content' ) ) {
	/**
	 * Return polished fallback content for service and product pages.
	 *
	 * @param string $post_type Post type.
	 * @param string $title Page title.
	 * @return string
	 */
	function iscp_get_cpt_default_content( $post_type, $title ) {
		$is_solution = 'iscp_solution' === $post_type;
		$type_label  = $is_solution ? __( 'product', 'iscp' ) : __( 'service', 'iscp' );
		$focus       = $is_solution ? __( 'product planning, dashboards, workflows, integrations and long-term support', 'iscp' ) : __( 'consulting, implementation, engineering, cloud readiness and long-term support', 'iscp' );
		$title       = $title ? $title : ( $is_solution ? __( 'Business Software Product', 'iscp' ) : __( 'Professional Technology Service', 'iscp' ) );

		ob_start();
		?>
		<div class="iscp-default-cpt-content">
			<p>
				<?php
				printf(
					/* translators: 1: page title, 2: page type, 3: focus area. */
					esc_html__( 'Indian Servers Pvt. Ltd. delivers %1$s as a practical %2$s for organizations that need secure execution, clean user experience and reliable technical ownership. Our team aligns %3$s so the final solution is useful from day one and maintainable after launch.', 'iscp' ),
					esc_html( $title ),
					esc_html( $type_label ),
					esc_html( $focus )
				);
				?>
			</p>

			<div class="iscp-default-cpt-grid">
				<section>
					<h2><?php esc_html_e( 'What We Cover', 'iscp' ); ?></h2>
					<ul>
						<li><?php esc_html_e( 'Requirement study, workflow mapping and technical planning.', 'iscp' ); ?></li>
						<li><?php esc_html_e( 'Responsive web, mobile and dashboard experiences.', 'iscp' ); ?></li>
						<li><?php esc_html_e( 'Role-based access, reporting, notifications and integrations.', 'iscp' ); ?></li>
						<li><?php esc_html_e( 'Deployment, hosting, monitoring, security review and support.', 'iscp' ); ?></li>
					</ul>
				</section>
				<section>
					<h2><?php esc_html_e( 'Indian Servers Advantage', 'iscp' ); ?></h2>
					<ul>
						<li><?php esc_html_e( 'Software, cloud, AI and cybersecurity teams under one roof.', 'iscp' ); ?></li>
						<li><?php esc_html_e( 'Experience across HRMS, CRM, school ERP, inventory, POS and custom SaaS systems.', 'iscp' ); ?></li>
						<li><?php esc_html_e( 'Delivery presence across Vijayawada, Dehradun, Dubai and USA-connected operations.', 'iscp' ); ?></li>
						<li><?php esc_html_e( 'Built for Indian business realities with scalable global architecture.', 'iscp' ); ?></li>
					</ul>
				</section>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'iscp_breadcrumbs' ) ) {
	/**
	 * Render accessible breadcrumbs.
	 */
	function iscp_breadcrumbs() {
		if ( is_front_page() ) {
			return;
		}

		$items = array(
			array(
				'label' => __( 'Home', 'iscp' ),
				'url'   => home_url( '/' ),
			),
		);

		if ( is_singular() ) {
			$post_type = get_post_type();

			if ( 'post' === $post_type ) {
				$blog_id = get_option( 'page_for_posts' );
				$items[] = array(
					'label' => __( 'Blog', 'iscp' ),
					'url'   => $blog_id ? get_permalink( $blog_id ) : home_url( '/blog/' ),
				);
			} elseif ( 'page' !== $post_type ) {
				$obj = get_post_type_object( $post_type );
				$url = get_post_type_archive_link( $post_type );

				if ( $obj && $url ) {
					$items[] = array(
						'label' => $obj->labels->name,
						'url'   => $url,
					);
				}
			}

			$items[] = array(
				'label' => get_the_title(),
				'url'   => '',
			);
		} elseif ( is_archive() ) {
			$items[] = array(
				'label' => wp_strip_all_tags( get_the_archive_title() ),
				'url'   => '',
			);
		} elseif ( is_search() ) {
			$items[] = array(
				'label' => sprintf(
					/* translators: %s: search query. */
					__( 'Search: %s', 'iscp' ),
					get_search_query()
				),
				'url'   => '',
			);
		}

		?>
		<nav class="iscp-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'iscp' ); ?>">
			<ol class="iscp-container">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php $is_current = count( $items ) - 1 === $index; ?>
					<li <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
						<?php if ( ! $is_current && ! empty( $item['url'] ) ) : ?>
							<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
						<?php else : ?>
							<span><?php echo esc_html( $item['label'] ); ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</nav>
		<?php
	}
}
