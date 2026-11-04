<?php
/**
 * Run only against a disposable local WordPress installation:
 * php tests/phase1-integration.php C:/path/to/wordpress
 * Create .iscp-phase1-test-environment in that installation first.
 */

$root = isset( $argv[1] ) ? rtrim( $argv[1], '/\\' ) : '';
if ( ! $root || ! is_file( $root . '/.iscp-phase1-test-environment' ) ) {
	fwrite( STDERR, "Refusing to run without a disposable-test marker.\n" );
	exit( 1 );
}
require $root . '/wp-load.php';
if ( 'local' !== wp_get_environment_type() || ! function_exists( 'iscp_install_software_pages' ) ) {
	fwrite( STDERR, "Requires the updated theme in a local test environment.\n" );
	exit( 1 );
}

$checks = 0;
function iscp_phase1_assert( $condition, $message ) {
	global $checks;
	if ( ! $condition ) {
		throw new RuntimeException( $message );
	}
	++$checks;
}

wp_set_current_user( 1 );
iscp_install_software_pages();
$ids = get_option( 'iscp_software_page_ids' );
iscp_phase1_assert( 10 === count( $ids ), 'Expected hub and nine missing topics.' );
foreach ( $ids as $slug => $id ) {
	iscp_phase1_assert( 'publish' === get_post_status( $id ), 'Starter page not published: ' . $slug );
	$content = get_post_field( 'post_content', $id );
	iscp_phase1_assert( false !== strpos( $content, '[iscp_software_contact]' ), 'Missing shared contact: ' . $slug );
	if ( 'software-solutions' !== $slug ) {
		iscp_phase1_assert( false !== strpos( $content, get_permalink( $ids['software-solutions'] ) ), 'Missing hub cross-link: ' . $slug );
	}
}
$hub = get_post_field( 'post_content', $ids['software-solutions'] );
foreach ( $ids as $slug => $id ) {
	if ( 'software-solutions' !== $slug ) {
		iscp_phase1_assert( false !== strpos( $hub, get_permalink( $id ) ), 'Missing hub destination: ' . $slug );
	}
}
$before = (array) wp_count_posts( 'page' );
iscp_install_software_pages();
iscp_phase1_assert( $before === (array) wp_count_posts( 'page' ), 'Setup created duplicate pages.' );
$id = $ids['task-management-software'];
$original = get_post( $id, ARRAY_A );
try {
	wp_update_post( array( 'ID' => $id, 'post_status' => 'draft', 'post_content' => '<p>Owner-authored draft.</p>' ) );
	delete_option( 'iscp_software_pages_version' );
	iscp_install_software_pages();
	iscp_phase1_assert( 'draft' === get_post_status( $id ), 'Setup published an owner draft.' );
	iscp_phase1_assert( '<p>Owner-authored draft.</p>' === get_post_field( 'post_content', $id ), 'Setup overwrote owner content.' );
} finally {
	wp_update_post( $original );
}
$contact = do_shortcode( '[iscp_software_contact]' );
iscp_phase1_assert( false !== strpos( $contact, 'tel:+919618222220' ), 'Incorrect telephone link.' );
iscp_phase1_assert( false !== strpos( $contact, 'https://wa.me/919618222220' ), 'Incorrect WhatsApp link.' );

$key = 'iscp_products_crm_url';
$saved = get_theme_mod( $key, null );
try {
	set_theme_mod( $key, 'https://example.invalid/external-destination/' );
	$urls = array_column( iscp_get_virtual_sitemap_urls(), 'loc' );
	iscp_phase1_assert( ! in_array( 'https://example.invalid/external-destination/', $urls, true ), 'External URL leaked into local sitemap.' );
	iscp_phase1_assert( ! in_array( home_url( '/products/crm/' ), $urls, true ), 'Overridden destination duplicated in sitemap.' );
} finally {
	if ( null === $saved ) {
		remove_theme_mod( $key );
	} else {
		set_theme_mod( $key, $saved );
	}
}

$provider = wp_sitemaps_get_server()->registry->get_provider( 'iscpofferings' );
iscp_phase1_assert( null !== $provider, 'Core sitemap provider missing.' );
iscp_phase1_assert( count( $provider->get_url_list( 1 ) ) > 0, 'Virtual sitemap empty.' );

$parent = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => 'QA Products', 'post_name' => 'products' ) );
$protected = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => 'QA HRMS', 'post_name' => 'hrms', 'post_parent' => $parent, 'post_password' => 'qa-only' ) );
try {
	$urls = array_column( iscp_get_virtual_sitemap_urls(), 'loc' );
	iscp_phase1_assert( ! in_array( home_url( '/products/hrms/' ), $urls, true ), 'Protected page exposed in virtual sitemap.' );
	$query = new WP_Query();
	$query->set( 'iscp_offering_group', 'products' );
	$query->set( 'iscp_offering_slug', 'hrms' );
	iscp_handle_internal_offering_status( false, $query );
	iscp_phase1_assert( $query->is_404, 'Virtual route bypassed page protection.' );
	$args = apply_filters( 'wp_sitemaps_posts_query_args', array(), 'page' );
	iscp_phase1_assert( isset( $args['post_password'] ) && '' === $args['post_password'], 'Core sitemap includes protected posts.' );
} finally {
	wp_delete_post( $protected, true );
	wp_delete_post( $parent, true );
}

$site_visibility = get_option( 'blog_public' );
try {
	update_option( 'blog_public', '0' );
	iscp_phase1_assert( ! wp_sitemaps_get_server()->sitemaps_enabled(), 'Private site exposes native sitemaps.' );
	ob_start();
	wp_robots();
	$robots = ob_get_clean();
	iscp_phase1_assert( false !== strpos( $robots, 'noindex' ), 'Owner noindex policy was lost.' );
} finally {
	update_option( 'blog_public', $site_visibility );
}

$subdirectory = function ( $url ) {
	return str_replace( '127.0.0.1:8765/', '127.0.0.1:8765/company/', $url );
};
try {
	add_filter( 'home_url', $subdirectory );
	$urls = array_column( iscp_get_virtual_sitemap_urls(), 'loc' );
	iscp_phase1_assert( count( $urls ) > 0 && 0 === strpos( $urls[0], 'http://127.0.0.1:8765/company/' ), 'Virtual sitemap ignored the installation subdirectory.' );
} finally {
	remove_filter( 'home_url', $subdirectory );
}

// Simulate a supported SEO plugin being loaded. Theme output must yield entirely.
define( 'WPSEO_VERSION', 'iscp-test' );
ob_start();
iscp_output_internal_software_meta();
iscp_output_internal_software_schema();
iscp_output_internal_software_open_graph();
$output = ob_get_clean();
iscp_phase1_assert( '' === $output, 'SEO plugin guard emitted duplicate tags.' );
iscp_phase1_assert( 'Owner plugin title' === iscp_offering_document_title( 'Owner plugin title' ), 'Theme overrode SEO-plugin title.' );
echo "PASS: {$checks} WordPress integration assertions.\n";
