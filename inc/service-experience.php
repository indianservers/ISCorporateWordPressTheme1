<?php
/**
 * Phase 2: improve existing service pages without creating alternate permalinks.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

/** Curated relationships and buying questions, not a sitewide keyword-link generator. */
function iscp_get_service_experiences() {
	$profiles = array(
		'school-management-software' => array( 'audience' => 'Schools and education administrators', 'problem' => 'Student records, fees and academic reports are often maintained separately. Start by deciding which records should be shared and who may change them.', 'related' => array( 'fee-management-software', 'marks-management-software', 'student-attendance-management-software', 'college-management-software' ), 'seo_title' => 'School Management Software in Andhra Pradesh | Indian Servers' ),
		'college-management-software' => array( 'related' => array( 'school-management-software', 'fee-management-software', 'examination-results-management-software' ), 'seo_title' => 'College Management Software & ERP | Indian Servers' ),
		'fee-management-software' => array( 'related' => array( 'school-management-software', 'college-management-software', 'accounts-software' ), 'seo_title' => 'Fee Management Software for Schools & Colleges | Indian Servers' ),
		'marks-management-software' => array( 'related' => array( 'examination-results-management-software', 'school-management-software', 'student-attendance-management-software' ), 'seo_title' => 'School Marks & Report Card Management | Indian Servers' ),
		'examination-results-management-software' => array( 'related' => array( 'marks-management-software', 'college-management-software', 'school-management-software' ), 'seo_title' => 'Examination & Results Management Software | Indian Servers' ),
		'student-attendance-management-software' => array( 'related' => array( 'school-management-software', 'college-management-software', 'marks-management-software' ), 'seo_title' => 'Student Attendance Management Software | Indian Servers' ),
		'crm' => array( 'audience' => 'Sales teams, service organizations and professional firms', 'problem' => 'Customer conversations and follow-ups can become disconnected from the responsible salesperson. Review how enquiries are assigned, followed up and handed to service teams.', 'related' => array( 'sales-pos-software', 'task-management-software', 'whatsapp-api-integration' ), 'seo_title' => 'CRM Software for Businesses in Andhra Pradesh | Indian Servers' ),
		'sales-pos-software' => array( 'related' => array( 'inventory-management-software', 'accounts-software', 'restaurant-pos-software', 'crm' ), 'seo_title' => 'Sales & POS Software for Retail Businesses | Indian Servers' ),
		'accounts-software' => array( 'related' => array( 'vyapara-erp', 'inventory-management-software', 'sales-pos-software' ), 'seo_title' => 'Accounts Software & Accounting Integrations | Indian Servers' ),
		'vyapara-erp' => array( 'audience' => 'SMEs and businesses connecting purchasing, sales, stock and accounts', 'problem' => 'Teams may enter the same transaction into several systems. Map where purchasing, stock, sales and accounts hand records to each other before choosing ERP modules.', 'related' => array( 'accounts-software', 'inventory-management-software', 'crm', 'custom-software-development' ), 'seo_title' => 'Vyapara ERP & Business Management Software | Indian Servers' ),
		'project-management-software' => array( 'audience' => 'Delivery teams, service organizations and project managers', 'problem' => 'A project can have many tasks without clear milestone ownership. Review who approves work, how delays are escalated and which reports clients or managers need.', 'related' => array( 'task-management-software', 'crm', 'custom-software-development' ), 'seo_title' => 'Project Management Software for Delivery Teams | Indian Servers' ),
		'task-management-software' => array( 'related' => array( 'project-management-software', 'crm', 'vyapara-erp' ), 'seo_title' => 'Task Management Software for Business Teams | Indian Servers' ),
		'custom-software-development' => array( 'audience' => 'Schools, colleges, SMEs and organizations with a distinct management workflow', 'problem' => 'An off-the-shelf application may not match your approval rules, user responsibilities or reporting needs. Document the gap before deciding to customize an existing product or build a new application.', 'related' => array( 'vyapara-erp', 'web-application-development', 'crm', 'school-management-software' ), 'seo_title' => 'Custom Software Development in Andhra Pradesh | Indian Servers' ),
		'web-application-development' => array( 'audience' => 'Businesses planning portals, dashboards and browser-based applications', 'problem' => 'A web application needs more than screens: define the users, permissions, data sources and integrations that make each workflow useful.', 'related' => array( 'custom-software-development', 'crm', 'project-management-software' ), 'seo_title' => 'Web & Business Application Development | Indian Servers' ),
		'inventory-management-software' => array( 'audience' => 'Retailers, distributors and teams managing stock across locations', 'problem' => 'Purchasing, sales and stock adjustments can tell different stories when records are disconnected. Agree on item identifiers, movement rules and reconciliation reports.', 'related' => array( 'sales-pos-software', 'accounts-software', 'vyapara-erp' ), 'seo_title' => 'Inventory Management Software for Businesses | Indian Servers' ),
		'whatsapp-api-integration' => array( 'related' => array( 'crm', 'fee-management-software', 'custom-software-development' ), 'seo_title' => 'WhatsApp API Integration for Business Workflows | Indian Servers' ),
	);
	$topics = iscp_get_software_topics();
	$catalog = array();
	foreach ( iscp_get_editable_offering_pages() as $group ) {
		$catalog = array_merge( $catalog, $group['items'] );
	}
	foreach ( $profiles as $slug => $profile ) {
		$item = isset( $topics[ $slug ] ) ? $topics[ $slug ] : $catalog[ $slug ];
		$profiles[ $slug ] = array_merge( $item, $profile, array( 'slug' => $slug ) );
		if ( empty( $profiles[ $slug ]['problem'] ) ) {
			$profiles[ $slug ]['problem'] = $item['example'];
		}
		if ( empty( $profiles[ $slug ]['features'] ) ) {
			$profiles[ $slug ]['features'] = $item['workflows'];
		}
	}
	$questions = array(
		'school-management-software' => array( 'Is school management software the same as education ERP?', 'School management software can bring student records, fees, attendance and academic administration together. Education ERP is a broader way to describe connected institutional workflows. Review the specific modules and permissions in the school and college offerings instead of assuming the label includes everything.' ),
		'crm' => array( 'What is the difference between CRM and ERP?', 'CRM focuses on leads, customer history and follow-ups. ERP connects operational areas such as purchasing, stock, sales and accounts. Indian Servers can discuss whether your requirement needs one of these systems or an integration between them.' ),
		'vyapara-erp' => array( 'Should we customize ERP or build a separate management application?', 'Start by comparing your purchasing, sales, stock and accounts workflows with the existing ERP offering. A distinct approval process or reporting requirement may need customization. Agree on the gap and data handover before choosing a separate application.' ),
		'project-management-software' => array( 'When is project management more useful than task management?', 'Project management coordinates delivery milestones, approvals and project reporting. Task management focuses on individual assignments and recurring work. Start with the level of planning and visibility your team actually needs.' ),
		'custom-software-development' => array( 'Can Indian Servers develop a custom management application?', 'Yes. Indian Servers provides custom software development for business workflows. Share user roles, process steps, sample reports and integrations so the team can compare custom development with existing product or ERP options.' ),
		'web-application-development' => array( 'How do we scope a business web application?', 'List the people using the application, what each person can see or change, where records originate and which reports are required. Then review integrations, hosting and migration with Indian Servers before agreeing on development scope.' ),
		'inventory-management-software' => array( 'What should we review before adopting inventory software?', 'Review item identifiers, stock movements, purchasing, sales, returns and branch reporting. Share the current records and explain reconciliation gaps so the proposed stock workflow can be checked against real examples.' ),
	);
	foreach ( $questions as $slug => $question ) {
		$profiles[ $slug ]['question'] = $question[0];
		$profiles[ $slug ]['answer'] = $question[1];
	}
	return $profiles;
}

/** Resolve only an existing service route or an explicitly mapped native page. */
function iscp_get_current_service_experience() {
	if ( is_admin() || is_front_page() || is_404() || is_search() || is_feed() || is_preview() || post_password_required() ) {
		return array();
	}
	$profiles = iscp_get_service_experiences();
	$slug = get_query_var( 'iscp_offering_slug' );
	if ( ! $slug && is_singular( 'page' ) ) {
		$ids = get_option( 'iscp_software_page_ids', array() );
		$slug = array_search( get_queried_object_id(), array_map( 'intval', $ids ), true );
	}
	return $slug && isset( $profiles[ $slug ] ) ? $profiles[ $slug ] : array();
}

/** Internal-only enhancements; no new dependencies and no homepage assets. */
function iscp_enqueue_service_experience() {
	$location = is_singular( 'page' ) && get_post_meta( get_queried_object_id(), '_iscp_service_area', true );
	if ( is_front_page() || ( ! iscp_get_current_service_experience() && ! $location && ! is_page( 'software-solutions' ) ) ) {
		return;
	}
	wp_enqueue_style( 'iscp-service-experience', get_template_directory_uri() . '/assets/css/service-experience.css', array( 'iscp-main' ), iscp_asset_version( 'assets/css/service-experience.css' ) );
	if ( iscp_get_current_service_experience() ) {
		wp_enqueue_script( 'iscp-service-enquiry', get_template_directory_uri() . '/assets/js/service-enquiry.js', array(), iscp_asset_version( 'assets/js/service-enquiry.js' ), true );
	}
}
add_action( 'wp_enqueue_scripts', 'iscp_enqueue_service_experience', 25 );

/** Preserve the Phase 1 schema graph and SEO-plugin ownership; only change its context. */
function iscp_service_experience_seo( $context ) {
	if ( is_front_page() ) {
		return $context;
	}
	$service = iscp_get_current_service_experience();
	if ( $service ) {
		if ( ! is_singular( 'page' ) || get_the_title( get_queried_object_id() ) === $service['title'] ) {
			$context['title'] = $service['seo_title'];
		}
		// Owner-authored native excerpts remain the editable description source.
		if ( ! is_singular( 'page' ) || ! get_post_field( 'post_excerpt', get_queried_object_id() ) ) {
			$business = iscp_get_software_business_profile();
			$context['description'] = $service['summary'] . ' Call ' . $business['phone'] . '.';
		}
	}
	if ( is_singular( 'page' ) && 'andhra-pradesh' === get_post_meta( get_queried_object_id(), '_iscp_service_area', true ) ) {
		$context['title'] = 'Software Services Across Andhra Pradesh | Indian Servers';
	}
	return $context;
}
add_filter( 'iscp_internal_seo_context', 'iscp_service_experience_seo' );

/** Location links resolve only to published, unprotected pages. */
function iscp_service_area_url() {
	$page = get_page_by_path( 'locations/andhra-pradesh' );
	return $page && 'publish' === $page->post_status && ! $page->post_password ? get_permalink( $page ) : '';
}

/** Extend the directory without modifying an owner's saved post_content. */
function iscp_extend_software_directory( $content ) {
	if ( ! is_front_page() && is_page( 'software-solutions' ) && in_the_loop() && is_main_query() ) {
		$url = iscp_service_area_url();
		if ( $url ) {
			$content .= '<section class="iscp-service-directory-note"><h2>Service coverage and implementation planning</h2><p>Education ERP is covered by the existing school and college management offerings. Business management and ERP customization connect to the existing custom software service; separate keyword-only pages are not needed.</p><p><a href="' . esc_url( $url ) . '">Explore Andhra Pradesh service coverage and prepare a location-specific enquiry</a>.</p></section>';
		}
	}
	return $content;
}
add_filter( 'the_content', 'iscp_extend_software_directory', 20 );

/** The collection represents links actually visible on the hub or regional page. */
function iscp_service_directory_schema( $schema ) {
	$service = iscp_get_current_service_experience();
	if ( $service ) {
		$crumbs = array( array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ) );
		$hub = iscp_software_page_url( 'software-solutions' );
		if ( $hub ) {
			$crumbs[] = array( '@type' => 'ListItem', 'position' => 2, 'name' => 'Software Solutions', 'item' => $hub );
		}
		$context = iscp_get_seo_context();
		$crumbs[] = array( '@type' => 'ListItem', 'position' => count( $crumbs ) + 1, 'name' => is_singular( 'page' ) ? get_the_title() : $service['title'], 'item' => $context['url'] );
		foreach ( $schema['@graph'] as &$node ) {
			if ( 'BreadcrumbList' === $node['@type'] ) {
				$node['itemListElement'] = $crumbs;
			}
		}
		unset( $node );
	}
	$region = is_singular( 'page' ) && 'andhra-pradesh' === get_post_meta( get_queried_object_id(), '_iscp_service_area', true );
	if ( ! $region && ! is_page( 'software-solutions' ) ) {
		return $schema;
	}
	$profiles = iscp_get_service_experiences();
	$slugs = $region ? array( 'school-management-software', 'college-management-software', 'fee-management-software', 'inventory-management-software', 'sales-pos-software', 'accounts-software', 'crm', 'project-management-software', 'custom-software-development' ) : array_keys( $profiles );
	$items = array();
	foreach ( $slugs as $slug ) {
		$url = iscp_software_page_url( $slug );
		if ( $url ) {
			$items[] = array( '@type' => 'ListItem', 'position' => count( $items ) + 1, 'name' => $profiles[ $slug ]['title'], 'url' => $url );
		}
	}
	$url = get_permalink();
	$schema['@graph'][2]['@type'] = 'CollectionPage';
	$schema['@graph'][2]['mainEntity'] = array( '@id' => $url . '#service-directory' );
	$schema['@graph'][] = array( '@type' => 'ItemList', '@id' => $url . '#service-directory', 'itemListElement' => $items );
	return $schema;
}
add_filter( 'iscp_internal_schema_graph', 'iscp_service_directory_schema' );

require_once __DIR__ . '/service-locations.php';
require_once __DIR__ . '/service-report.php';
