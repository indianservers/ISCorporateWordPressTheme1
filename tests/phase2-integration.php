<?php
/** Disposable local WordPress only: php tests/phase2-integration.php WORDPRESS_ROOT */
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
function iscp_phase2_assert( $condition, $message ) {
	global $checks;
	if ( ! $condition ) { throw new RuntimeException( $message ); }
	++$checks;
}
wp_set_current_user( 1 );
$native_before = get_option( 'iscp_software_page_ids' );
iscp_install_service_locations();
$ids = get_option( 'iscp_service_location_ids' );
iscp_phase2_assert( 2 === count( $ids ), 'Expected a directory and one regional page.' );
iscp_phase2_assert( $ids['directory'] === (int) get_post_field( 'post_parent', $ids['andhra-pradesh'] ), 'Regional page has the wrong hierarchy.' );
iscp_phase2_assert( $native_before === get_option( 'iscp_software_page_ids' ), 'Phase 1 page mapping changed.' );
$count = (array) wp_count_posts( 'page' );
iscp_install_service_locations();
iscp_phase2_assert( $count === (array) wp_count_posts( 'page' ), 'Duplicate location pages.' );
iscp_phase2_assert( 16 === count( iscp_get_service_experiences() ), 'Unexpected service inventory.' );
$profiles = iscp_get_service_experiences();
$urls = array();
foreach ( $profiles as $slug => $profile ) {
	$urls[] = iscp_software_page_url( $slug );
	iscp_phase2_assert( ! empty( $profile['features'] ) && ! empty( $profile['audience'] ), 'Missing service-specific content: ' . $slug );
	iscp_phase2_assert( count( $profile['related'] ) <= 4 && ! in_array( $slug, $profile['related'], true ), 'Excessive or self-referencing contextual links.' );
	foreach ( $profile['related'] as $related ) {
		iscp_phase2_assert( (bool) iscp_software_page_url( $related ), 'Unknown related service.' );
	}
}
iscp_phase2_assert( count( $urls ) === count( array_unique( $urls ) ), 'Competing service URLs.' );

$original = get_post( $ids['andhra-pradesh'], ARRAY_A );
try {
	wp_update_post( array( 'ID' => $original['ID'], 'post_status' => 'draft', 'post_content' => '<p>Owner location draft.</p>' ) );
	delete_option( 'iscp_service_locations_version' );
	iscp_install_service_locations();
	iscp_phase2_assert( 'draft' === get_post_status( $original['ID'] ), 'Setup published owner location draft.' );
	iscp_phase2_assert( '<p>Owner location draft.</p>' === get_post_field( 'post_content', $original['ID'] ), 'Owner location content overwritten.' );
	iscp_phase2_assert( '' === iscp_service_area_url(), 'Draft location linked publicly.' );
} finally {
	wp_update_post( $original );
}
$parent = get_post( $ids['directory'], ARRAY_A );
try {
	wp_update_post( array( 'ID' => $parent['ID'], 'post_status' => 'private' ) );
	delete_option( 'iscp_service_locations_version' );
	iscp_install_service_locations();
	iscp_phase2_assert( false === get_option( 'iscp_service_locations_version' ), 'Setup ignored private parent.' );
	iscp_phase2_assert( (bool) get_option( 'iscp_service_locations_notice' ), 'Missing blocked-parent notice.' );
} finally {
	wp_update_post( $parent );
	delete_option( 'iscp_service_locations_notice' );
	update_option( 'iscp_service_locations_version', '1', false );
}

iscp_phase2_assert( isset( iscp_get_admin_tabs()['seo-report'] ), 'Existing dashboard tab missing.' );
ob_start();
iscp_render_service_discovery_report();
$report = ob_get_clean();
iscp_phase2_assert( false !== strpos( $report, 'not measured here' ), 'External metrics fabricated or ambiguous.' );
wp_set_current_user( 0 );
ob_start();
iscp_render_service_discovery_report();
iscp_phase2_assert( '' === ob_get_clean(), 'Report bypassed administrator permission.' );
wp_set_current_user( 1 );

$current_query = $GLOBALS['wp_query'];
$main_query = $GLOBALS['wp_the_query'];
$current_post = isset( $GLOBALS['post'] ) ? $GLOBALS['post'] : null;
try {
	$page_id = $native_before['college-management-software'];
	$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'] = new WP_Query( array( 'page_id' => $page_id ) );
	$GLOBALS['post'] = get_post( $page_id );
	setup_postdata( $GLOBALS['post'] );
	$service = iscp_get_current_service_experience();
	iscp_phase2_assert( 'college-management-software' === $service['slug'], 'Native service resolution failed.' );
	$schema = iscp_get_internal_software_schema();
	iscp_phase2_assert( 'https://schema.org' === $schema['@context'], 'Phase 1 schema context lost.' );
	$encoded = wp_json_encode( $schema );
	iscp_phase2_assert( false === strpos( $encoded, 'aggregateRating' ), 'Unsupported schema rating introduced.' );
	ob_start();
	get_template_part( 'template-parts/components/software-service', null, array( 'service' => $service, 'native' => true ) );
	$html = ob_get_clean();
	iscp_phase2_assert( 1 === substr_count( $html, '<form ' ), 'Duplicate enquiry forms.' );
	iscp_phase2_assert( false !== strpos( $html, 'not a submitted enquiry' ), 'Enquiry handoff misrepresented.' );
} finally {
	$GLOBALS['wp_query'] = $current_query;
	$GLOBALS['wp_the_query'] = $main_query;
	$GLOBALS['post'] = $current_post;
}
echo "PASS: {$checks} Phase 2 WordPress assertions.\n";
