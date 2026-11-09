<?php
/**
 * Disposable local WordPress only. Run normally and with:
 * php -d disable_classes=SimpleXMLElement,SimpleXMLIterator
 *     -d disable_functions=simplexml_load_file,simplexml_load_string,simplexml_import_dom
 *     tests/sitemap-renderer.php WORDPRESS_ROOT
 */
$root = isset( $argv[1] ) ? rtrim( $argv[1], '/\\' ) : '';
if ( ! is_file( $root . '/.iscp-phase1-test-environment' ) ) {
	fwrite( STDERR, "Disposable test marker required.\n" );
	exit( 1 );
}
require $root . '/wp-load.php';
if ( 'local' !== wp_get_environment_type() ) {
	exit( 1 );
}
$checks = 0;
function iscp_sitemap_assert( $condition, $message ) {
	global $checks;
	if ( ! $condition ) { throw new RuntimeException( $message ); }
	++$checks;
}
$available = class_exists( 'SimpleXMLElement' ) && method_exists( 'SimpleXMLElement', 'addChild' );
$server = wp_sitemaps_get_server();
iscp_sitemap_assert( get_class( $server->renderer ) === ( $available ? 'WP_Sitemaps_Renderer' : 'ISCP_Portable_Sitemap_Renderer' ), 'Incorrect renderer selected.' );
require_once dirname( __DIR__ ) . '/inc/class-iscp-sitemap-renderer.php';
$renderer = new ISCP_Portable_Sitemap_Renderer();
$url = home_url( '/software-solutions/?source=one&channel=two' );
$entry = array( 'loc' => $url, 'lastmod' => '2026-11-04', 'changefreq' => 'weekly', 'priority' => '0.8', 'unsupported' => '<unexpected/>' );
$xml = $renderer->get_sitemap_xml( array( $entry ) );
iscp_sitemap_assert( 0 === strpos( $xml, '<?xml version="1.0" encoding="UTF-8"?>' ), 'XML declaration is not first.' );
iscp_sitemap_assert( false !== strpos( $xml, '&amp;channel=two' ), 'URL query ampersand was not escaped.' );
iscp_sitemap_assert( false === strpos( $xml, '<unexpected/>' ), 'Unsupported provider field leaked.' );
iscp_sitemap_assert( false !== strpos( $xml, '<lastmod>2026-11-04</lastmod>' ), 'Provider modification date lost.' );
iscp_sitemap_assert( false !== strpos( $xml, '<?xml-stylesheet' ), 'Core stylesheet filter support lost.' );
$malicious = $renderer->get_sitemap_xml( array( array( 'loc' => home_url( '/' ), 'lastmod' => '</lastmod><script>unsafe</script>' . "\x01\xFF" ) ) );
iscp_sitemap_assert( false === strpos( $malicious, '<script>' ), 'Provider text injected XML markup.' );
iscp_sitemap_assert( false !== strpos( $malicious, '&lt;script&gt;' ), 'Provider text was not safely represented.' );
iscp_sitemap_assert( false === strpos( $malicious, "\x01" ) && false === strpos( $malicious, "\xFF" ), 'Invalid XML bytes survived.' );
ob_start();
$renderer->render_sitemap( array( $entry ) );
iscp_sitemap_assert( ob_get_clean() === $xml, 'Public child renderer differed from generated XML.' );
$index_entry = array( 'loc' => home_url( '/wp-sitemap-posts-page-1.xml' ), 'lastmod' => '2026-11-04' );
$index = $renderer->get_sitemap_index_xml( array( $index_entry ) );
ob_start();
$renderer->render_index( array( $index_entry ) );
iscp_sitemap_assert( ob_get_clean() === $index, 'Public index renderer differed from generated XML.' );
iscp_sitemap_assert( false !== strpos( $index, '<sitemapindex xmlns=' ), 'Index root invalid.' );

$custom = new WP_Sitemaps();
$custom->renderer = new class() extends WP_Sitemaps_Renderer {};
$original = $custom->renderer;
iscp_install_portable_sitemap_renderer( $custom );
iscp_sitemap_assert( $custom->renderer === $original, 'Third-party renderer replaced.' );

$visibility = get_option( 'blog_public' );
try {
	update_option( 'blog_public', '0' );
	$disabled = new WP_Sitemaps();
	iscp_install_portable_sitemap_renderer( $disabled );
	iscp_sitemap_assert( 'WP_Sitemaps_Renderer' === get_class( $disabled->renderer ), 'Disabled sitemaps re-enabled.' );
} finally {
	update_option( 'blog_public', $visibility );
}
define( 'WPSEO_VERSION', 'sitemap-guard-test' );
$plugin = new WP_Sitemaps();
iscp_install_portable_sitemap_renderer( $plugin );
iscp_sitemap_assert( 'WP_Sitemaps_Renderer' === get_class( $plugin->renderer ), 'SEO-plugin ownership bypassed.' );
echo 'PASS: ' . $checks . ' sitemap assertions; SimpleXML ' . ( $available ? 'available' : 'unavailable/disabled' ) . ".\n";
