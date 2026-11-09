<?php
/**
 * Core-compatible XML serialization for hosts without SimpleXML.
 * Routing, providers, pagination and visibility remain owned by WordPress.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

class ISCP_Portable_Sitemap_Renderer extends WP_Sitemaps_Renderer {
	/** Escape raw values for XML 1.0, including invalid UTF-8/control characters. */
	private function escape_value( $value ) {
		return htmlspecialchars( (string) $value, ENT_XML1 | ENT_QUOTES | ENT_SUBSTITUTE | ENT_DISALLOWED, 'UTF-8' );
	}

	/** Serialize only the fields supported by the native sitemap protocol. */
	private function serialize_entries( $entries, $root, $element, $fields, $stylesheet ) {
		$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $stylesheet . "\n";
		$xml .= '<' . $root . ' xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
		foreach ( $entries as $entry ) {
			$xml .= '<' . $element . '>';
			foreach ( $fields as $field ) {
				if ( ! isset( $entry[ $field ] ) ) {
					continue;
				}
				$value = 'loc' === $field ? esc_url_raw( $entry[ $field ] ) : $entry[ $field ];
				$xml .= '<' . $field . '>' . $this->escape_value( $value ) . '</' . $field . '>';
			}
			$xml .= '</' . $element . '>' . "\n";
		}
		return $xml . '</' . $root . '>' . "\n";
	}

	public function get_sitemap_index_xml( $sitemaps ) {
		return $this->serialize_entries( $sitemaps, 'sitemapindex', 'sitemap', array( 'loc', 'lastmod' ), $this->stylesheet_index );
	}

	public function get_sitemap_xml( $url_list ) {
		return $this->serialize_entries( $url_list, 'urlset', 'url', array( 'loc', 'lastmod', 'changefreq', 'priority' ), $this->stylesheet );
	}

	public function render_index( $sitemaps ) {
		header( 'Content-Type: application/xml; charset=UTF-8' );
		// Values are XML-escaped and element names come from the fixed allowlist above.
		echo $this->get_sitemap_index_xml( $sitemaps ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	public function render_sitemap( $url_list ) {
		header( 'Content-Type: application/xml; charset=UTF-8' );
		echo $this->get_sitemap_xml( $url_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
