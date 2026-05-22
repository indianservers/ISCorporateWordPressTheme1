<?php
/**
 * Compatibility helpers.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_body_classes' ) ) {
	/**
	 * Add theme body classes.
	 *
	 * @param array $classes Body classes.
	 * @return array
	 */
	function iscp_body_classes( $classes ) {
		$classes[] = 'iscp-theme';

		if ( has_nav_menu( 'primary' ) ) {
			$classes[] = 'iscp-has-primary-menu';
		}

		$header_layout = iscp_get_theme_mod( 'iscp_header_layout', 'default' );
		$classes[]     = 'iscp-header-layout-' . sanitize_html_class( $header_layout );
		$classes[]     = iscp_get_theme_mod( 'iscp_animations_enabled', true ) ? 'iscp-animations-enabled' : 'iscp-animations-disabled';

		if ( ! iscp_get_theme_mod( 'iscp_respect_reduced_motion', true ) ) {
			$classes[] = 'iscp-ignore-reduced-motion';
		}

		if ( ! iscp_get_theme_mod( 'iscp_sticky_header_enabled', true ) ) {
			$classes[] = 'iscp-header-not-sticky';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'iscp_body_classes' );

if ( ! function_exists( 'iscp_plugin_compatibility_setup' ) ) {
	/**
	 * Add optional plugin compatibility support.
	 */
	function iscp_plugin_compatibility_setup() {
		if ( class_exists( 'WooCommerce' ) ) {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	}
}
add_action( 'after_setup_theme', 'iscp_plugin_compatibility_setup' );

if ( ! function_exists( 'iscp_plugin_body_classes' ) ) {
	/**
	 * Add optional plugin body classes.
	 *
	 * @param array $classes Body classes.
	 * @return array
	 */
	function iscp_plugin_body_classes( $classes ) {
		if ( class_exists( 'WooCommerce' ) ) {
			$classes[] = 'iscp-has-woocommerce';
		}

		if ( defined( 'WPCF7_VERSION' ) ) {
			$classes[] = 'iscp-has-contact-form-7';
		}

		if ( defined( 'WPFORMS_VERSION' ) ) {
			$classes[] = 'iscp-has-wpforms';
		}

		if ( iscp_is_major_seo_plugin_active() ) {
			$classes[] = 'iscp-has-seo-plugin';
		}

		if ( defined( 'LSCWP_V' ) || defined( 'WPCACHEHOME' ) ) {
			$classes[] = 'iscp-has-cache-plugin';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'iscp_plugin_body_classes' );
