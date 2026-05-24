<?php
/**
 * Theme XML sitemap.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_sitemap_xml_escape' ) ) {
	/**
	 * Escape text for XML nodes.
	 *
	 * @param string $value Value to escape.
	 * @return string
	 */
	function iscp_sitemap_xml_escape( $value ) {
		return htmlspecialchars( (string) $value, ENT_XML1 | ENT_COMPAT, 'UTF-8' );
	}
}

if ( ! function_exists( 'iscp_sitemap_add_url' ) ) {
	/**
	 * Add a URL to the sitemap list without duplicates.
	 *
	 * @param array  $urls      Sitemap URLs.
	 * @param string $loc       URL.
	 * @param string $lastmod   Last modified date.
	 * @param string $priority  Priority.
	 * @param string $changefreq Change frequency.
	 * @return array
	 */
	function iscp_sitemap_add_url( $urls, $loc, $lastmod = '', $priority = '0.80', $changefreq = 'weekly' ) {
		$loc = trailingslashit( $loc );

		if ( isset( $urls[ $loc ] ) ) {
			return $urls;
		}

		$urls[ $loc ] = array(
			'loc'        => $loc,
			'lastmod'    => $lastmod ? $lastmod : gmdate( 'Y-m-d' ),
			'changefreq' => $changefreq,
			'priority'   => $priority,
		);

		return $urls;
	}
}

if ( ! function_exists( 'iscp_get_sitemap_urls' ) ) {
	/**
	 * Build sitemap URL list.
	 *
	 * @return array
	 */
	function iscp_get_sitemap_urls() {
		$urls  = array();
		$today = gmdate( 'Y-m-d' );

		$core_pages = array(
			array( '/', '1.00', 'daily' ),
			array( '/about/', '0.80', 'monthly' ),
			array( '/services/', '0.95', 'weekly' ),
			array( '/products/', '0.95', 'weekly' ),
			array( '/solutions/', '0.95', 'weekly' ),
			array( '/blog/', '0.85', 'daily' ),
			array( '/contact/', '0.80', 'monthly' ),
			array( '/careers/', '0.70', 'monthly' ),
		);

		foreach ( $core_pages as $page ) {
			$urls = iscp_sitemap_add_url( $urls, home_url( $page[0] ), $today, $page[1], $page[2] );
		}

		if ( function_exists( 'iscp_get_editable_offering_pages' ) ) {
			$offerings = iscp_get_editable_offering_pages();

			foreach ( array( 'products', 'services' ) as $group ) {
				if ( empty( $offerings[ $group ]['items'] ) ) {
					continue;
				}

				$base = ! empty( $offerings[ $group ]['base'] ) ? $offerings[ $group ]['base'] : $group;

				foreach ( $offerings[ $group ]['items'] as $slug => $item ) {
					$url  = ! empty( $item['url'] ) ? $item['url'] : home_url( '/' . $base . '/' . $slug . '/' );
					$urls = iscp_sitemap_add_url( $urls, $url, $today, '0.90', 'weekly' );
				}
			}
		}

		$post_types = array( 'page', 'post', 'iscp_solution', 'iscp_service', 'iscp_industry', 'iscp_case_study' );
		$posts      = get_posts(
			array(
				'post_type'      => $post_types,
				'post_status'    => 'publish',
				'posts_per_page' => 500,
				'orderby'        => 'modified',
				'order'          => 'DESC',
			)
		);

		foreach ( $posts as $post ) {
			$priority = 'post' === $post->post_type ? '0.75' : '0.80';
			$freq     = 'post' === $post->post_type ? 'monthly' : 'weekly';
			$lastmod  = get_post_modified_time( 'Y-m-d', true, $post );
			$urls     = iscp_sitemap_add_url( $urls, get_permalink( $post ), $lastmod, $priority, $freq );
		}

		return $urls;
	}
}

if ( ! function_exists( 'iscp_render_sitemap_xml' ) ) {
	/**
	 * Render sitemap XML.
	 */
	function iscp_render_sitemap_xml() {
		$request_path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';

		if ( 'sitemap.xml' !== trim( (string) $request_path, '/' ) ) {
			return;
		}

		$urls = iscp_get_sitemap_urls();

		status_header( 200 );
		header( 'Content-Type: application/xml; charset=UTF-8' );
		echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		foreach ( $urls as $url ) {
			echo "\t<url>\n";
			echo "\t\t<loc>" . iscp_sitemap_xml_escape( $url['loc'] ) . "</loc>\n";
			echo "\t\t<lastmod>" . iscp_sitemap_xml_escape( $url['lastmod'] ) . "</lastmod>\n";
			echo "\t\t<changefreq>" . iscp_sitemap_xml_escape( $url['changefreq'] ) . "</changefreq>\n";
			echo "\t\t<priority>" . iscp_sitemap_xml_escape( $url['priority'] ) . "</priority>\n";
			echo "\t</url>\n";
		}

		echo "</urlset>\n";
		exit;
	}
}
add_action( 'template_redirect', 'iscp_render_sitemap_xml', 0 );
