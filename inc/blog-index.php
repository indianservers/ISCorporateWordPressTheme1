<?php
/**
 * Theme-owned blog index route.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_register_blog_index_rewrite' ) ) {
	/**
	 * Register /blog/ even when WordPress has no posts page assigned.
	 */
	function iscp_register_blog_index_rewrite() {
		add_rewrite_rule( '^blog/?$', 'index.php?iscp_blog_index=1', 'top' );
	}
}
add_action( 'init', 'iscp_register_blog_index_rewrite' );

if ( ! function_exists( 'iscp_register_blog_index_query_var' ) ) {
	/**
	 * Register the blog index query var.
	 *
	 * @param array $vars Public query vars.
	 * @return array
	 */
	function iscp_register_blog_index_query_var( $vars ) {
		$vars[] = 'iscp_blog_index';

		return $vars;
	}
}
add_filter( 'query_vars', 'iscp_register_blog_index_query_var' );

if ( ! function_exists( 'iscp_is_blog_index_request' ) ) {
	/**
	 * Detect /blog/ even before rewrite rules are refreshed.
	 *
	 * @return bool
	 */
	function iscp_is_blog_index_request() {
		if ( get_query_var( 'iscp_blog_index' ) ) {
			return true;
		}

		$request_path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
		$blog_path    = wp_parse_url( home_url( '/blog/' ), PHP_URL_PATH );

		return trim( (string) $request_path, '/' ) === trim( (string) $blog_path, '/' );
	}
}

if ( ! function_exists( 'iscp_include_blog_index_template' ) ) {
	/**
	 * Load the theme blog index template.
	 *
	 * @param string $template Current template path.
	 * @return string
	 */
	function iscp_include_blog_index_template( $template ) {
		if ( iscp_is_blog_index_request() ) {
			status_header( 200 );
			return get_template_directory() . '/template-blog-index.php';
		}

		return $template;
	}
}
add_filter( 'template_include', 'iscp_include_blog_index_template', 12 );

if ( ! function_exists( 'iscp_prevent_blog_index_404' ) ) {
	/**
	 * Stop WordPress from treating the theme-owned /blog/ route as a 404.
	 *
	 * @param bool     $preempt  Whether to short-circuit 404 handling.
	 * @param WP_Query $wp_query Main query.
	 * @return bool
	 */
	function iscp_prevent_blog_index_404( $preempt, $wp_query ) {
		if ( iscp_is_blog_index_request() ) {
			$wp_query->is_404 = false;
			status_header( 200 );

			return true;
		}

		return $preempt;
	}
}
add_filter( 'pre_handle_404', 'iscp_prevent_blog_index_404', 10, 2 );

if ( ! function_exists( 'iscp_maybe_flush_blog_index_rewrite' ) ) {
	/**
	 * Flush once after theme update so /blog/ works on existing installs.
	 */
	function iscp_maybe_flush_blog_index_rewrite() {
		$version = '2026-05-23-blog-index-v2';

		if ( get_option( 'iscp_blog_index_rewrite_version' ) === $version ) {
			return;
		}

		iscp_register_blog_index_rewrite();
		flush_rewrite_rules();
		update_option( 'iscp_blog_index_rewrite_version', $version, false );
	}
}
add_action( 'init', 'iscp_maybe_flush_blog_index_rewrite', 25 );

if ( ! function_exists( 'iscp_blog_index_document_title' ) ) {
	/**
	 * Set a useful title for the virtual blog route.
	 *
	 * @param string $title Current title.
	 * @return string
	 */
	function iscp_blog_index_document_title( $title ) {
		if ( iscp_is_blog_index_request() ) {
			return __( 'Indian Servers Blog | Software, AI, Cloud and Cyber Security Insights', 'iscp' );
		}

		return $title;
	}
}
add_filter( 'pre_get_document_title', 'iscp_blog_index_document_title' );
