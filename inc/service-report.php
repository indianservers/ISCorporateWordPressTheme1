<?php
/** Local inventory and honest external-measurement checklist in the existing dashboard. */
defined( 'ABSPATH' ) || exit;

function iscp_get_service_discovery_inventory() {
	$urls = array();
	$native = 0;
	foreach ( iscp_get_service_experiences() as $slug => $profile ) {
		$url = iscp_software_page_url( $slug );
		if ( ! $url ) {
			continue;
		}
		$urls[ $url ] = array( 'title' => $profile['title'], 'url' => $url );
		$ids = get_option( 'iscp_software_page_ids', array() );
		if ( isset( $ids[ $slug ] ) && 'publish' === get_post_status( $ids[ $slug ] ) ) {
			++$native;
		}
	}
	return array( 'services' => array_values( $urls ), 'published_native_service_pages' => $native, 'published_regional_pages' => iscp_service_area_url() ? 1 : 0 );
}

function iscp_render_service_discovery_report() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$inventory = iscp_get_service_discovery_inventory();
	?>
	<section class="iscp-admin-card">
		<h2><?php esc_html_e( 'Software discovery inventory', 'iscp' ); ?></h2>
		<p><?php printf( esc_html__( '%1$d distinct service URLs; %2$d published native service pages; %3$d published regional coverage pages. Virtual offerings are routes, not extra WordPress pages.', 'iscp' ), count( $inventory['services'] ), $inventory['published_native_service_pages'], $inventory['published_regional_pages'] ); ?></p>
		<?php if ( get_option( 'iscp_service_locations_notice' ) ) : ?><p><?php echo esc_html( get_option( 'iscp_service_locations_notice' ) ); ?></p><?php endif; ?>
		<p><a href="<?php echo esc_url( iscp_software_page_url( 'software-solutions' ) ); ?>"><?php esc_html_e( 'Review Software Solutions', 'iscp' ); ?></a></p>
		<table class="widefat striped"><thead><tr><th><?php esc_html_e( 'Service', 'iscp' ); ?></th><th><?php esc_html_e( 'URL', 'iscp' ); ?></th></tr></thead><tbody>
		<?php foreach ( $inventory['services'] as $service ) : ?>
			<tr><td><?php echo esc_html( $service['title'] ); ?></td><td><a href="<?php echo esc_url( $service['url'] ); ?>"><?php echo esc_html( $service['url'] ); ?></a></td></tr>
		<?php endforeach; ?>
		</tbody></table>
	</section>
	<section class="iscp-admin-card">
		<h2><?php esc_html_e( 'Measurement status', 'iscp' ); ?></h2>
		<p><?php esc_html_e( 'External accounts are not connected to this theme report. Unavailable measurements are not zero results.', 'iscp' ); ?></p>
		<table class="widefat striped"><thead><tr><th><?php esc_html_e( 'Measure', 'iscp' ); ?></th><th><?php esc_html_e( 'Source / status', 'iscp' ); ?></th></tr></thead><tbody>
		<tr><td>Indexing, clicks, impressions, CTR, queries, geographic interest</td><td>Requires authorized Search Console / Bing Webmaster data; not measured here.</td></tr>
		<tr><td>Core Web Vitals and mobile performance</td><td>Requires field data or a recorded performance assessment; not measured here.</td></tr>
		<tr><td>Submitted leads and confirmed demo requests</td><td>Requires the existing enquiry inbox or verified CRM records. Preparing an enquiry does not submit it.</td></tr>
		<tr><td>Click-to-call, demo intent, quotation intent, enquiry preparation</td><td>Privacy-limited browser events are available for an existing, consent-aware analytics integration. No analytics provider is loaded or contacted by this theme.</td></tr>
		<tr><td>Page conversion rate</td><td>Requires consented session data plus verified submitted leads. No rate is calculated without both.</td></tr>
		<tr><td>AI-search observations</td><td>Record dated query, engine, cited URL and evidence separately from organic search metrics; no recommendation or citation is claimed.</td></tr>
		</tbody></table>
		<p><a href="<?php echo esc_url( get_template_directory_uri() . '/docs/phase2-implementation.html' ); ?>"><?php esc_html_e( 'Open the implementation and measurement checklist', 'iscp' ); ?></a></p>
	</section>
	<?php
}
