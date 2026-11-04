<?php
/** One useful regional directory. City pages require separate evidence and review. */
defined( 'ABSPATH' ) || exit;

function iscp_get_service_markets() {
	return array(
		'Priority markets' => array( 'Vijayawada', 'Visakhapatnam', 'Guntur', 'Tirupati', 'Nellore', 'Rajamahendravaram (Rajahmundry)', 'Kakinada', 'Kurnool' ),
		'Additional enquiry locations' => array( 'Eluru', 'Ongole', 'Anantapur', 'Kadapa', 'Chittoor', 'Srikakulam', 'Vizianagaram', 'Machilipatnam', 'Tenali', 'Nandyal', 'Bhimavaram', 'Tadepalligudem', 'Gudivada', 'Narasaraopet', 'Amalapuram', 'Hindupur', 'Proddatur', 'Markapur' ),
	);
}

function iscp_build_service_region_content() {
	$html = '<div class="iscp-service-region"><p class="iscp-template-hero-lead">Discuss software development and business management requirements across Andhra Pradesh with Indian Servers. Choose an existing solution or explain the process you need to improve.</p>';
	$html .= '<section><h2>Start with your workflow, then agree on delivery</h2><p>Share your city, organization, users and existing systems when you enquire. Remote discovery, demonstrations, data migration, training and ongoing support need to be agreed for your project. On-site visits, travel and availability must be confirmed before engagement; they are not automatically included.</p><p>The places below are service-enquiry markets. They are not a list of Indian Servers offices, completed projects or locally based staff.</p></section>';
	foreach ( iscp_get_service_markets() as $heading => $cities ) {
		$html .= '<section><h2>' . esc_html( $heading ) . '</h2><ul class="iscp-market-list">';
		foreach ( $cities as $city ) {
			$html .= '<li>' . esc_html( $city ) . '</li>';
		}
		$html .= '</ul></section>';
	}
	$html .= '<section><h2>Choose the right discussion for your organization</h2><div class="iscp-region-grid">';
	$needs = array(
		array( 'Schools and colleges', 'Bring sample fee registers, academic reports and attendance formats. Explain how admissions staff, accounts teams and teachers share records today.', array( 'school-management-software', 'college-management-software', 'fee-management-software' ) ),
		array( 'Retail, distribution and SMEs', 'Bring a sample sales bill, item list and stock report with personal information removed. Explain your branches, returns process and accounting handover.', array( 'inventory-management-software', 'sales-pos-software', 'accounts-software' ) ),
		array( 'Service organizations and professional firms', 'Explain enquiry assignment, customer follow-ups and project approvals. Share the reporting gaps that make management decisions difficult.', array( 'crm', 'project-management-software', 'custom-software-development' ) ),
	);
	$profiles = iscp_get_service_experiences();
	foreach ( $needs as $need ) {
		$html .= '<article class="iscp-region-card"><h3>' . esc_html( $need[0] ) . '</h3><p>' . esc_html( $need[1] ) . '</p><ul>';
		foreach ( $need[2] as $topic ) {
			$url = iscp_software_page_url( $topic );
			if ( $url ) {
				$html .= '<li><a href="' . esc_url( $url ) . '">' . esc_html( $profiles[ $topic ]['title'] ) . '</a></li>';
			}
		}
		$html .= '</ul></article>';
	}
	$html .= '</div></section><section><h2>Location and implementation questions</h2><h3>Can a school in Vijayawada discuss fee management software?</h3><p>Yes. Contact Indian Servers with the fee schedules, student volumes and reports you need. Ask the team to confirm the demonstration, migration and training arrangements for your institution.</p><h3>Can a college in Guntur discuss education ERP?</h3><p>Yes. Start with the existing college and school management offerings and explain your departments, academic terms and approvals. Confirm the proposed modules rather than assuming every education workflow is included.</p><h3>Do these city names mean there is an office in each city?</h3><p>No. This directory describes locations from which organizations can enquire about software services. Confirm any required in-person meeting or on-site delivery directly with Indian Servers.</p><h3>What should we check before requesting an on-site visit?</h3><p>Confirm the location, dates, required staff, travel arrangements and whether the visit is part of the agreed scope. No city-specific response-time or on-site support guarantee is made.</p></section>';
	$hub = iscp_software_page_url( 'software-solutions' );
	if ( $hub ) {
		$html .= '<p><a href="' . esc_url( $hub ) . '">Browse all education, business and custom software solutions</a>.</p>';
	}
	return $html . '[iscp_software_contact]</div>';
}

/** Native parent/child pages, with matching owners' content and statuses preserved. */
function iscp_install_service_locations() {
	if ( wp_doing_ajax() || ! current_user_can( 'manage_options' ) || ! current_user_can( 'publish_pages' ) || get_option( 'iscp_service_locations_version' ) === '1' ) {
		return;
	}
	$lock = (int) get_option( 'iscp_service_locations_lock', 0 );
	if ( $lock && time() - $lock > 300 ) {
		delete_option( 'iscp_service_locations_lock' );
	}
	if ( ! add_option( 'iscp_service_locations_lock', time(), '', false ) ) {
		return;
	}
	try {
		$parent = get_page_by_path( 'locations' );
		$parent_id = $parent ? $parent->ID : wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => 'Software Service Coverage', 'post_name' => 'locations', 'post_content' => '<p>Explore Indian Servers service-enquiry coverage and implementation planning. Locations describe markets served, not a list of physical offices.</p>', 'meta_input' => array( '_iscp_service_area' => 'directory' ) ), true );
		if ( is_wp_error( $parent_id ) ) {
			return;
		}
		// An owner's unpublished or protected parent must not be made public by setup.
		if ( 'publish' !== get_post_status( $parent_id ) || get_post_field( 'post_password', $parent_id ) ) {
			update_option( 'iscp_service_locations_notice', 'The existing Locations page is unpublished or protected. No regional page was published beneath it.', false );
			return;
		}
		$page = get_page_by_path( 'locations/andhra-pradesh' );
		$id = $page ? $page->ID : wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_parent' => $parent_id, 'post_title' => 'Software Services Across Andhra Pradesh', 'post_name' => 'andhra-pradesh', 'post_excerpt' => 'Explore Indian Servers software service coverage in Andhra Pradesh. Plan a demo, software scope and implementation arrangements for your organization.', 'post_content' => iscp_build_service_region_content(), 'meta_input' => array( '_iscp_service_area' => 'andhra-pradesh' ) ), true );
		if ( is_wp_error( $id ) ) {
			return;
		}
		if ( ! $parent && 'publish' === get_post_status( $id ) ) {
			wp_update_post( array( 'ID' => $parent_id, 'post_content' => '<p>Explore Indian Servers service-enquiry coverage and implementation planning. These are service markets, not a list of physical offices.</p><p><a href="' . esc_url( get_permalink( $id ) ) . '">Andhra Pradesh software service coverage</a></p>' ) );
		}
		update_option( 'iscp_service_location_ids', array( 'directory' => $parent_id, 'andhra-pradesh' => $id ), false );
		update_option( 'iscp_service_locations_version', '1', false );
		delete_option( 'iscp_service_locations_notice' );
	} finally {
		delete_option( 'iscp_service_locations_lock' );
	}
}
add_action( 'admin_init', 'iscp_install_service_locations', 20 );
