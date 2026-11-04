<?php
/**
 * Extend the native paginated sitemap with theme-owned public routes.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

/** Local public routes absent from core's pages provider; no fabricated lastmod. */
function iscp_get_virtual_sitemap_urls() {
	$urls = array();
	foreach ( iscp_get_editable_offering_pages() as $group => $data ) {
		$candidates = array( '' => home_url( '/' . $data['base'] . '/' ) );
		foreach ( $data['items'] as $slug => $item ) {
			$local_url = home_url( '/' . $data['base'] . '/' . $slug . '/' );
			if ( ! empty( $item['url'] ) && untrailingslashit( $item['url'] ) !== untrailingslashit( $local_url ) ) {
				continue;
			}
			$candidates[ $slug ] = $local_url;
		}
		foreach ( $candidates as $slug => $url ) {
			// Core already lists published pages. Private, draft and protected pages stay excluded.
			if ( get_page_by_path( $data['base'] . ( $slug ? '/' . $slug : '' ) ) ) {
				continue;
			}
			$urls[ $url ] = array( 'loc' => $url );
		}
	}
	foreach ( array( 'blog', 'solutions', 'become-our-partner' ) as $path ) {
		if ( ! get_page_by_path( $path ) ) {
			$url = home_url( '/' . $path . '/' );
			$urls[ $url ] = array( 'loc' => $url );
		}
	}
	return array_values( $urls );
}

/** Use core pagination instead of the former 500-post custom XML endpoint. */
function iscp_register_virtual_sitemap_provider() {
	if ( iscp_is_major_seo_plugin_active() || ! class_exists( 'WP_Sitemaps_Provider' ) || ! wp_sitemaps_get_server()->sitemaps_enabled() ) {
		return;
	}
	if ( ! class_exists( 'ISCP_Offering_Sitemap_Provider' ) ) {
		class ISCP_Offering_Sitemap_Provider extends WP_Sitemaps_Provider {
			public function __construct() {
				$this->name = 'iscpofferings';
				$this->object_type = 'iscpofferings';
			}

			public function get_url_list( $page_num, $object_subtype = '' ) {
				$max = wp_sitemaps_get_max_urls( $this->object_type );
				return array_slice( iscp_get_virtual_sitemap_urls(), ( max( 1, (int) $page_num ) - 1 ) * $max, $max );
			}

			public function get_max_num_pages( $object_subtype = '' ) {
				return (int) ceil( count( iscp_get_virtual_sitemap_urls() ) / wp_sitemaps_get_max_urls( $this->object_type ) );
			}
		}
	}
	wp_register_sitemap_provider( 'iscpofferings', new ISCP_Offering_Sitemap_Provider() );
}
add_action( 'init', 'iscp_register_virtual_sitemap_provider', 30 );

/** Password-protected records belong outside the public discovery sitemap. */
function iscp_sitemap_public_posts_query( $args ) {
	$args['post_password'] = '';
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'iscp_sitemap_public_posts_query' );

/** Keep the old URL working, including under a WordPress subdirectory. */
function iscp_render_sitemap_xml() {
	$path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
	$expected = wp_parse_url( home_url( '/sitemap.xml' ), PHP_URL_PATH );
	if ( trim( (string) $path, '/' ) !== trim( (string) $expected, '/' ) || iscp_is_major_seo_plugin_active() || ! wp_sitemaps_get_server()->sitemaps_enabled() ) {
		return;
	}
	wp_safe_redirect( get_sitemap_url( 'index' ), 301, 'ISCP' );
	exit;
}
add_action( 'template_redirect', 'iscp_render_sitemap_xml', 0 );
