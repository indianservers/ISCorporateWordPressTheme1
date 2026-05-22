<?php
/**
 * Theme setup.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_theme_setup' ) ) {
	/**
	 * Configure theme defaults and WordPress feature support.
	 */
	function iscp_theme_setup() {
		load_theme_textdomain( 'iscp', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header' );
		add_editor_style( 'assets/css/editor-style.css' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 300,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'iscp' ),
				'footer'  => esc_html__( 'Footer Menu', 'iscp' ),
				'social'  => esc_html__( 'Social Menu', 'iscp' ),
				'utility' => esc_html__( 'Utility Menu', 'iscp' ),
			)
		);

		add_image_size( 'iscp-card', 800, 600, true );
		add_image_size( 'iscp-hero', 1400, 900, true );
		add_image_size( 'iscp-wide', 1600, 900, true );
		add_image_size( 'iscp-logo', 300, 120, true );
	}
}
add_action( 'after_setup_theme', 'iscp_theme_setup' );

if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

if ( ! function_exists( 'iscp_widgets_init' ) ) {
	/**
	 * Register theme widget areas.
	 */
	function iscp_widgets_init() {
		$widget_areas = array(
			'sidebar-1'          => __( 'Sidebar', 'iscp' ),
			'footer-1'           => __( 'Footer Column 1', 'iscp' ),
			'footer-2'           => __( 'Footer Column 2', 'iscp' ),
			'footer-3'           => __( 'Footer Column 3', 'iscp' ),
			'footer-4'           => __( 'Footer Column 4', 'iscp' ),
			'header-top-bar'     => __( 'Header Top Bar', 'iscp' ),
			'blog-sidebar'       => __( 'Blog Sidebar', 'iscp' ),
			'cta-before-footer'  => __( 'CTA Before Footer', 'iscp' ),
			'offcanvas-panel'    => __( 'Offcanvas Panel', 'iscp' ),
		);

		if ( class_exists( 'WooCommerce' ) ) {
			$widget_areas['woocommerce-sidebar'] = __( 'WooCommerce Sidebar', 'iscp' );
		}

		foreach ( $widget_areas as $id => $name ) {
			register_sidebar(
				array(
					'name'          => esc_html( $name ),
					'id'            => $id,
					'description'   => esc_html__( 'Add widgets here for ISCP layouts.', 'iscp' ),
					'before_widget' => '<section id="%1$s" class="widget iscp-widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="iscp-widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}
	}
}
add_action( 'widgets_init', 'iscp_widgets_init' );
