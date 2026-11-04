<?php
/**
 * Phase 1 software discovery using native WordPress pages and existing theme options.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;
require_once __DIR__ . '/software-solutions-content.php';

/** Central contact identity. Addresses and credentials are deliberately not inferred. */
function iscp_get_software_business_profile() {
	$telephone = preg_replace( '/[^0-9+]/', '', get_theme_mod( 'iscp_phone_tel', '+919618222220' ) );
	$whatsapp = preg_replace( '/[^0-9]/', '', get_theme_mod( 'iscp_whatsapp_number', '919618222220' ) );
	return array(
		'name'        => get_theme_mod( 'iscp_business_name', 'Indian Servers' ),
		'url'         => home_url( '/' ),
		'phone'       => get_theme_mod( 'iscp_phone_display', '+91 9618222220' ),
		'telephone'   => $telephone ? $telephone : '+919618222220',
		'whatsapp'    => 'https://wa.me/' . ( $whatsapp ? $whatsapp : '919618222220' ),
		'description' => get_theme_mod( 'iscp_business_description', 'Software development, ERP solutions, school and college management software, CRM, POS, accounts software, project and task management systems, and custom business software.' ),
		'area'        => 'Andhra Pradesh, India',
	);
}

/** Add identity fields to the existing Contact section, alongside the shared phone. */
function iscp_customize_software_business( $wp_customize ) {
	$profile = iscp_get_software_business_profile();
	iscp_add_customizer_control( $wp_customize, 'iscp_business_name', 'iscp_contact', __( 'Public Business Name', 'iscp' ), 'text', $profile['name'] );
	iscp_add_customizer_control( $wp_customize, 'iscp_business_description', 'iscp_contact', __( 'Business Description', 'iscp' ), 'textarea', $profile['description'] );
}
add_action( 'customize_register', 'iscp_customize_software_business', 20 );

/** Expose the native excerpt field used for editable page descriptions. */
function iscp_enable_page_descriptions() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'iscp_enable_page_descriptions' );

/** Existing theme configuration remains the owner of branding and contact settings. */
function iscp_software_contact_shortcode() {
	$business = iscp_get_software_business_profile();
	return sprintf(
		'<section class="iscp-software-contact"><h2>%1$s</h2><p>%2$s</p><div class="iscp-action-row"><a class="iscp-btn iscp-btn-primary" href="%3$s">%4$s</a><a class="iscp-btn iscp-btn-ghost" href="%5$s">%6$s</a></div></section>',
		esc_html__( 'Discuss your software requirement', 'iscp' ),
		esc_html__( 'For school and college software, ERP, CRM, POS or custom development, contact Indian Servers. Share your current workflow and ask for a demonstration or a scoped quotation.', 'iscp' ),
		esc_url( 'tel:' . $business['telephone'] ),
		esc_html( 'Call ' . $business['phone'] ),
		esc_url( $business['whatsapp'] . '?text=' . rawurlencode( 'Hello Indian Servers, I would like to discuss a software requirement.' ) ),
		esc_html__( 'Enquire on WhatsApp', 'iscp' )
	);
}
add_shortcode( 'iscp_software_contact', 'iscp_software_contact_shortcode' );

/** Return a published page selected during setup, retaining existing URLs. */
function iscp_software_page_url( $topic ) {
	$ids = get_option( 'iscp_software_page_ids', array() );
	if ( ! empty( $ids[ $topic ] ) ) {
		return 'publish' === get_post_status( $ids[ $topic ] ) && ! get_post_field( 'post_password', $ids[ $topic ] ) ? get_permalink( $ids[ $topic ] ) : '';
	}
	foreach ( iscp_get_editable_offering_pages() as $group ) {
		if ( isset( $group['items'][ $topic ] ) ) {
			$page = get_page_by_path( $group['base'] . '/' . $topic );
			if ( $page && ( 'publish' !== $page->post_status || $page->post_password ) ) {
				return '';
			}
			$item = $group['items'][ $topic ];
			return ! empty( $item['url'] ) ? $item['url'] : home_url( '/' . $group['base'] . '/' . $topic . '/' );
		}
	}
	$page = get_page_by_path( $topic );
	return $page && 'publish' === $page->post_status && ! $page->post_password ? get_permalink( $page ) : '';
}

/** Starter copy is stored in post_content and can be edited normally afterward. */
function iscp_build_software_topic_content( $topic ) {
	$topics = iscp_get_software_topics();
	$item   = $topics[ $topic ];
	$html   = '<div class="iscp-software-content"><p class="iscp-template-hero-lead">' . esc_html( $item['summary'] ) . '</p>';
	$html  .= '<h2>Who this is for</h2><p>' . esc_html( $item['audience'] ) . '</p><h2>Workflows to plan</h2><ul>';
	foreach ( $item['workflows'] as $workflow ) {
		$html .= '<li>' . esc_html( $workflow ) . '</li>';
	}
	$html .= '</ul><h2>A practical starting point</h2><p>' . esc_html( $item['example'] ) . '</p>';
	$html .= '<h2>Implementation and support planning</h2><p>Start with a walkthrough of your current records, sample reports and user responsibilities. Agree on scope, migration checks, access permissions, integrations and acceptance examples before development. Ask Indian Servers to confirm deployment, staff training and ongoing support arrangements in the quotation.</p>';
	$html .= '<h2>Questions to ask before choosing software</h2><h3>' . esc_html( $item['question'] ) . '</h3><p>' . esc_html( $item['answer'] ) . '</p>';
	$html .= '<h3>What should we send for a quotation?</h3><p>Send sample forms and reports with personal data removed, the number of users, existing software details and the workflow you want to improve. Identify required integrations and ask which capabilities are included in the proposed scope.</p><h2>Related software and services</h2><ul>';
	foreach ( $item['related'] as $related ) {
		$url   = iscp_software_page_url( $related );
		$label = isset( $topics[ $related ] ) ? $topics[ $related ]['title'] : ucwords( str_replace( '-', ' ', $related ) );
		if ( $url ) {
			$html .= '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
		}
	}
	$hub = iscp_software_page_url( 'software-solutions' );
	if ( $hub ) {
		$html .= '<li><a href="' . esc_url( $hub ) . '">Software solutions in Andhra Pradesh</a></li>';
	}
	return $html . '</ul>[iscp_software_contact]</div>';
}

/** Useful service-area hub, with one page instead of near-identical city pages. */
function iscp_build_software_hub_content() {
	$business = iscp_get_software_business_profile();
	$html = '<div class="iscp-software-content"><p class="iscp-template-hero-lead">Indian Servers provides software development and business management solutions for organizations in Andhra Pradesh. Discuss school and college administration, ERP, CRM, inventory, sales, POS, accounts and custom workflows with our team.</p>';
	$html .= '<h2>Software developers for your business workflow</h2><p>Start with the problem your team needs to solve: repeated data entry, disconnected records, unclear task ownership or reports that take too long to prepare. Indian Servers works on custom software, web applications, APIs and business applications. A discovery discussion helps decide whether an existing product, an integration or custom development is the right starting point.</p>';
	$groups = array(
		'Education software' => array( 'school-management-software', 'college-management-software', 'fee-management-software', 'student-attendance-management-software', 'marks-management-software', 'examination-results-management-software' ),
		'Business management software' => array( 'inventory-management-software', 'crm', 'sales-pos-software', 'restaurant-pos-software', 'accounts-software', 'project-management-software', 'task-management-software', 'vyapara-erp' ),
		'Custom development and integrations' => array( 'custom-software-development', 'web-application-development', 'api-integration', 'whatsapp-api-integration' ),
	);
	$topics = iscp_get_software_topics();
	$catalog = array();
	foreach ( iscp_get_editable_offering_pages() as $group ) {
		$catalog = array_merge( $catalog, $group['items'] );
	}
	foreach ( $groups as $heading => $slugs ) {
		$html .= '<h2>' . esc_html( $heading ) . '</h2><div class="iscp-software-grid">';
		foreach ( $slugs as $slug ) {
			$item = isset( $topics[ $slug ] ) ? $topics[ $slug ] : ( isset( $catalog[ $slug ] ) ? $catalog[ $slug ] : null );
			$url  = iscp_software_page_url( $slug );
			if ( $item && $url ) {
				$html .= '<section class="iscp-card"><h3><a href="' . esc_url( $url ) . '">' . esc_html( $item['title'] ) . '</a></h3><p>' . esc_html( $item['summary'] ) . '</p></section>';
			}
		}
		$html .= '</div>';
	}
	$html .= '<h2>ERP development and custom management software</h2><p>For connected purchasing, inventory, sales and accounts workflows, review Vyapara ERP first. For a process that does not fit an existing product, discuss custom management software or ERP customization. Share approval rules, user roles, branch requirements and reporting examples so the team can assess the scope without assuming every module is included.</p>';
	$html .= '<h2>Software services across Andhra Pradesh</h2><p>Discuss software requirements for Vijayawada, Visakhapatnam, Guntur, Tirupati, Nellore, Kurnool, Rajamahendravaram (Rajahmundry) and Kakinada. Indian Servers serves Andhra Pradesh; these are service locations, not a list of physical offices.</p><p>Enquiries are also welcome from Eluru, Ongole, Kadapa, Anantapur, Chittoor, Machilipatnam, Tenali, Srikakulam, Vizianagaram, Nandyal, Proddatur, Hindupur, Bhimavaram, Tadepalligudem, Gudivada, Narasaraopet, Amalapuram and Markapur. Confirm remote coordination, on-site requirements and implementation arrangements for your location before engagement.</p>';
	$html .= '<h3>Education institutions</h3><p>A school or college can start with admissions, student records, fees or academic reporting, then review which records need to connect. Bring example registers and report formats to the discussion.</p><h3>Retail, distribution and SMEs</h3><p>Retailers and distributors can review the handover between counter sales, purchasing, stock and accounts. Service businesses can begin with CRM follow-ups, project ownership and recurring tasks.</p>';
	$html .= '<h2>Frequently asked questions</h2><h3>Who can develop customized management software in Andhra Pradesh?</h3><p>Indian Servers provides custom software development and business application services. Describe your users, workflows and reports to discuss whether custom development or an existing product fits your organization.</p><h3>Where can schools discuss fee and marks management software?</h3><p>Contact Indian Servers to discuss fee schedules, collection records, marks entry, grading and report-card requirements. Review the separate fee and marks pages above to prepare your institution\'s requirements.</p><h3>How should we choose between CRM, POS and ERP?</h3><p>CRM organizes customer relationships and follow-ups. POS supports sales transactions and billing. ERP connects operational areas such as purchasing, stock, sales and accounts. Choose based on the records and workflows your team needs to share.</p><h3>How can I contact Indian Servers?</h3><p>Call Indian Servers at <a href="' . esc_url( 'tel:' . $business['telephone'] ) . '">' . esc_html( $business['phone'] ) . '</a> to discuss a demonstration, integration or software quotation. Prepare sample reports and your existing workflow before the discussion.</p>';
	return $html . '[iscp_software_contact]</div>';
}

/**
 * Idempotent native-page setup on an authorized admin visit. Never overwrite existing
 * content, publish an owner's draft, change menus, or alter Reading/permalink options.
 */
function iscp_install_software_pages() {
	if ( wp_doing_ajax() || ! current_user_can( 'manage_options' ) || ! current_user_can( 'publish_pages' ) || get_option( 'iscp_software_pages_version' ) === '1' ) {
		return;
	}
	$lock = (int) get_option( 'iscp_software_pages_installing', 0 );
	if ( $lock && time() - $lock > 300 ) {
		delete_option( 'iscp_software_pages_installing' );
	}
	if ( ! add_option( 'iscp_software_pages_installing', time(), '', false ) ) {
		return;
	}
	try {
		$business = iscp_get_software_business_profile();
		$topics = array( 'software-solutions' => array( 'title' => 'Software Development Company in Andhra Pradesh', 'summary' => 'Indian Servers provides school, college, ERP, CRM, POS, accounting and custom management software in Andhra Pradesh. Call ' . $business['phone'] . '.' ) ) + iscp_get_software_topics();
		$ids = get_option( 'iscp_software_page_ids', array() );
		$pending = array();
		$complete = true;
		$aliases = array(
			'college-management-software' => array( 'college-erp' ),
			'fee-management-software' => array( 'fee-management' ),
			'marks-management-software' => array( 'school-marks-management-software' ),
			'accounts-software' => array( 'accounting-software' ),
			'sales-pos-software' => array( 'pos-software' ),
			'task-management-software' => array( 'tasks-management-software' ),
			'whatsapp-api-integration' => array( 'whatsapp-api' ),
		);
		foreach ( $topics as $slug => $item ) {
			$page = null;
			$paths = array();
			foreach ( array_merge( array( $slug ), isset( $aliases[ $slug ] ) ? $aliases[ $slug ] : array() ) as $candidate ) {
				$paths = array_merge( $paths, array( $candidate, 'products/' . $candidate, 'services/' . $candidate ) );
			}
			foreach ( $paths as $path ) {
				$page = get_page_by_path( $path );
				if ( $page ) {
					break;
				}
			}
			if ( $page ) {
				$ids[ $slug ] = $page->ID;
				// Resume only an empty starter draft left by an interrupted setup.
				if ( 'draft' === $page->post_status && ! $page->post_content && get_post_meta( $page->ID, '_iscp_software_pending', true ) ) {
					$pending[ $slug ] = $page->ID;
				}
				continue;
			}
			$id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'draft', 'post_title' => $item['title'], 'post_name' => $slug, 'post_excerpt' => $item['summary'], 'meta_input' => array( '_iscp_software_topic' => $slug, '_iscp_software_pending' => '1' ) ), true );
			if ( is_wp_error( $id ) ) {
				$complete = false;
				continue;
			}
			$ids[ $slug ] = $id;
			$pending[ $slug ] = $id;
		}
		update_option( 'iscp_software_page_ids', $ids, false );
		// Publish leaves first, then build the hub so links resolve to actual permalinks.
		$pending = array_reverse( $pending, true );
		foreach ( $pending as $slug => $id ) {
			$content = 'software-solutions' === $slug ? iscp_build_software_hub_content() : iscp_build_software_topic_content( $slug );
			$result = wp_update_post( array( 'ID' => $id, 'post_content' => $content, 'post_status' => 'publish' ), true );
			if ( is_wp_error( $result ) ) {
				$complete = false;
			}
		}
		// Resolve cross-links only after all new pages have published permalinks.
		foreach ( $pending as $slug => $id ) {
			if ( 'publish' !== get_post_status( $id ) ) {
				continue;
			}
			$content = 'software-solutions' === $slug ? iscp_build_software_hub_content() : iscp_build_software_topic_content( $slug );
			$result = wp_update_post( array( 'ID' => $id, 'post_content' => $content ), true );
			if ( is_wp_error( $result ) ) {
				$complete = false;
			} else {
				delete_post_meta( $id, '_iscp_software_pending' );
			}
		}
		if ( $complete ) {
			update_option( 'iscp_software_pages_version', '1', false );
		}
	} finally {
		delete_option( 'iscp_software_pages_installing' );
	}
}
add_action( 'admin_init', 'iscp_install_software_pages' );

/** Only these internal content pages get the supplemental layout. */
function iscp_enqueue_software_page_assets() {
	if ( ! is_front_page() && is_singular( 'page' ) && get_post_meta( get_queried_object_id(), '_iscp_software_topic', true ) ) {
		wp_enqueue_style( 'iscp-software-solutions', get_template_directory_uri() . '/assets/css/software-solutions.css', array( 'iscp-main' ), iscp_asset_version( 'assets/css/software-solutions.css' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'iscp_enqueue_software_page_assets', 20 );

/** Page metadata follows editable titles/excerpts, not an uneditable keyword list. */
function iscp_get_internal_software_seo_context() {
	if ( is_404() || is_search() || is_feed() ) {
		return array();
	}
	$group = get_query_var( 'iscp_offering_group' );
	$slug  = get_query_var( 'iscp_offering_slug' );
	$business = iscp_get_software_business_profile();
	if ( is_post_type_archive() ) {
		$post_type = get_query_var( 'post_type' );
		if ( is_string( $post_type ) ) {
			$object = get_post_type_object( $post_type );
			if ( $object ) {
				$page = max( 1, absint( get_query_var( 'paged' ) ) );
				return array( 'title' => $object->labels->name . ' | Indian Servers' . ( $page > 1 ? ' | Page ' . $page : '' ), 'description' => 'Explore Indian Servers ' . strtolower( $object->labels->name ) . '. Discuss your business requirements with our team at ' . $business['phone'] . '.', 'url' => $page > 1 ? get_pagenum_link( $page ) : get_post_type_archive_link( $post_type ) );
			}
		}
	}
	if ( $group && $slug ) {
		$item = iscp_get_offering_page( $group, $slug );
		if ( $item ) {
			return array(
				'title'       => $item['title'] . ' | Indian Servers',
				'description' => 'Discuss ' . $item['title'] . ' with Indian Servers. Call ' . $business['phone'] . '. ' . $item['summary'],
				'url'         => home_url( '/' . $group . '/' . $slug . '/' ),
			);
		}
	}
	if ( is_singular( 'page' ) && get_post_meta( get_queried_object_id(), '_iscp_software_topic', true ) ) {
		$page = get_queried_object();
		return array(
			'title'       => get_the_title( $page ) . ' | Indian Servers',
			'description' => $page->post_excerpt ? $page->post_excerpt : wp_trim_words( wp_strip_all_tags( strip_shortcodes( $page->post_content ) ), 26 ),
			'url'         => get_permalink( $page ),
		);
	}
	if ( is_page( 'contact' ) || is_page_template( 'template-contact.php' ) ) {
		return array( 'title' => 'Contact Indian Servers | Software Development Enquiries', 'description' => 'Discuss software development, education software, ERP, CRM, inventory and POS with Indian Servers. Call ' . $business['phone'] . ' for your requirements.', 'url' => get_permalink() );
	}
	if ( is_page( 'about' ) ) {
		return array( 'title' => 'About Indian Servers | Software and Business Applications', 'description' => 'Learn about Indian Servers software development, business applications, cloud and integration services. Contact the team to discuss your requirements.', 'url' => get_permalink() );
	}
	if ( function_exists( 'iscp_is_blog_index_request' ) && iscp_is_blog_index_request() ) {
		$page = max( 1, absint( get_query_var( 'paged' ) ) );
		return array( 'title' => 'Indian Servers Blog' . ( $page > 1 ? ' | Page ' . $page : '' ), 'description' => 'Software development, business applications, AI, cloud and cyber security insights from Indian Servers.', 'url' => $page > 1 ? get_pagenum_link( $page ) : home_url( '/blog/' ) );
	}
	if ( is_singular() ) {
		$page = get_queried_object();
		return array( 'title' => get_the_title( $page ) . ' | Indian Servers', 'description' => $page->post_excerpt ? $page->post_excerpt : wp_trim_words( wp_strip_all_tags( strip_shortcodes( $page->post_content ) ), 26 ), 'url' => wp_get_canonical_url( $page ) );
	}
	return array();
}

/** Do not emit an index directive: core and owner-configured robots policies win. */
function iscp_output_internal_software_meta() {
	if ( is_admin() || iscp_is_major_seo_plugin_active() || is_404() || is_search() || is_feed() ) {
		return;
	}
	$context = iscp_get_seo_context();
	if ( ! empty( $context['description'] ) ) {
		echo '<meta name="description" content="' . esc_attr( iscp_trim_meta_description( $context['description'] ) ) . '">' . "\n";
	}
	// WordPress owns singular canonicals (including multi-page posts). Theme owns virtual routes.
	if ( ! is_singular() && ! empty( $context['url'] ) && ( get_query_var( 'iscp_offering_group' ) || iscp_is_blog_index_request() || is_post_type_archive() ) ) {
		echo '<link rel="canonical" href="' . esc_url( $context['url'] ) . '">' . "\n";
	}
}

/** Build one connected factual graph for internal pages, reusing the SEO-plugin guard. */
function iscp_get_internal_software_schema() {
	$business = iscp_get_software_business_profile();
	$context = iscp_get_seo_context();
	$url = ! empty( $context['url'] ) ? $context['url'] : iscp_get_current_url();
	$organization_id = $business['url'] . '#organization';
	$organization = array( '@type' => 'Organization', '@id' => $organization_id, 'name' => $business['name'], 'url' => $business['url'], 'telephone' => $business['telephone'], 'description' => $business['description'], 'areaServed' => array( '@type' => 'AdministrativeArea', 'name' => $business['area'] ) );
	// A manually configured site logo is used; no office address or legal name is inferred.
	$logo_id = get_theme_mod( 'custom_logo' );
	if ( $logo_id ) {
		$logo = wp_get_attachment_image_url( $logo_id, 'full' );
		if ( $logo ) {
			$organization['logo'] = $logo;
		}
	}
	$graph = array(
		$organization,
		array( '@type' => 'WebSite', '@id' => $business['url'] . '#website', 'url' => $business['url'], 'name' => $business['name'], 'publisher' => array( '@id' => $organization_id ) ),
		array( '@type' => 'WebPage', '@id' => $url . '#webpage', 'url' => $url, 'name' => ! empty( $context['title'] ) ? $context['title'] : wp_get_document_title(), 'description' => iscp_get_meta_description(), 'isPartOf' => array( '@id' => $business['url'] . '#website' ), 'about' => array( '@id' => $organization_id ) ),
	);
	$group = get_query_var( 'iscp_offering_group' );
	$slug = get_query_var( 'iscp_offering_slug' );
	$item = $group && $slug ? iscp_get_offering_page( $group, $slug ) : array();
	$topic = is_singular( 'page' ) ? get_post_meta( get_queried_object_id(), '_iscp_software_topic', true ) : '';
	if ( $item || ( $topic && 'software-solutions' !== $topic ) || is_singular( 'iscp_service' ) || is_singular( 'iscp_solution' ) ) {
		$product = $item && 'products' === $group;
		$entity = array( '@type' => $product ? 'SoftwareApplication' : 'Service', '@id' => $url . '#offering', 'url' => $url, 'name' => $item ? $item['title'] : get_the_title(), 'description' => $item ? $item['summary'] : iscp_get_meta_description(), 'provider' => array( '@id' => $organization_id ) );
		if ( $product ) {
			$entity['applicationCategory'] = 'BusinessApplication';
			$entity['featureList'] = array_values( $item['features'] );
		} else {
			$entity['serviceType'] = $entity['name'];
			$entity['areaServed'] = $organization['areaServed'];
		}
		$graph[2]['mainEntity'] = array( '@id' => $entity['@id'] );
		$graph[] = $entity;
	}
	if ( is_singular( 'post' ) ) {
		$graph[] = array( '@type' => 'Article', '@id' => $url . '#article', 'headline' => get_the_title(), 'datePublished' => get_the_date( DATE_W3C, get_queried_object_id() ), 'dateModified' => get_the_modified_date( DATE_W3C, get_queried_object_id() ), 'mainEntityOfPage' => array( '@id' => $url . '#webpage' ), 'publisher' => array( '@id' => $organization_id ) );
	}
	$breadcrumbs = iscp_get_breadcrumb_schema_items();
	if ( count( $breadcrumbs ) > 1 ) {
		$graph[] = array( '@type' => 'BreadcrumbList', '@id' => $url . '#breadcrumb', 'itemListElement' => $breadcrumbs );
		$graph[2]['breadcrumb'] = array( '@id' => $url . '#breadcrumb' );
	}
	return apply_filters( 'iscp_internal_schema_graph', array( '@context' => 'https://schema.org', '@graph' => $graph ) );
}

/** Internal graph intentionally has no invented ratings, offers or LocalBusiness offices. */
function iscp_output_internal_software_schema() {
	if ( is_admin() || is_404() || is_search() || is_feed() || iscp_is_major_seo_plugin_active() || ! iscp_get_theme_mod( 'iscp_schema_enabled', true ) ) {
		return;
	}
	echo '<script type="application/ld+json">' . wp_json_encode( iscp_get_internal_software_schema(), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT ) . '</script>' . "\n";
}

/** Social tags use actual image data rather than an assumed PNG size and identity. */
function iscp_output_internal_software_open_graph() {
	if ( is_admin() || is_404() || is_search() || is_feed() || iscp_is_major_seo_plugin_active() || ! iscp_get_theme_mod( 'iscp_open_graph_enabled', true ) ) {
		return;
	}
	$context = iscp_get_seo_context();
	$title = ! empty( $context['title'] ) ? $context['title'] : wp_get_document_title();
	$url = ! empty( $context['url'] ) ? $context['url'] : iscp_get_current_url();
	$description = iscp_get_meta_description();
	foreach ( array( 'og:title' => $title, 'og:description' => $description, 'og:url' => $url, 'og:type' => is_singular( 'post' ) ? 'article' : 'website', 'og:site_name' => 'Indian Servers' ) as $property => $value ) {
		echo '<meta property="' . esc_attr( $property ) . '" content="' . esc_attr( $value ) . '">' . "\n";
	}
	$image = iscp_get_social_image();
	if ( $image ) {
		echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
	}
	echo '<meta name="twitter:card" content="' . ( $image ? 'summary_large_image' : 'summary' ) . '">' . "\n";
	foreach ( array( 'twitter:title' => $title, 'twitter:description' => $description, 'twitter:image' => $image ) as $name => $value ) {
		if ( $value ) {
			echo '<meta name="' . esc_attr( $name ) . '" content="' . esc_attr( $value ) . '">' . "\n";
		}
	}
}

/** Fix query state early, so virtual offering URLs cannot inherit the homepage state. */
function iscp_prepare_internal_offering_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ( ! $query->get( 'iscp_offering_group' ) && ! $query->get( 'iscp_blog_index' ) ) ) {
		return;
	}
	$query->is_home = false;
	$query->is_archive = false;
	$query->is_singular = false;
	$query->is_page = false;
	$query->is_single = false;
	$query->set( 'post__in', array( 0 ) );
	$query->set( 'posts_per_page', 1 );
	$query->set( 'no_found_rows', true );
}
add_action( 'pre_get_posts', 'iscp_prepare_internal_offering_query' );

/** Return real 200/404 statuses before template selection and canonical redirects. */
function iscp_handle_internal_offering_status( $preempt, $query ) {
	$group = $query->get( 'iscp_offering_group' );
	if ( ! $group ) {
		return $preempt;
	}
	$pages = iscp_get_editable_offering_pages();
	$slug = $query->get( 'iscp_offering_slug' );
	$page = get_page_by_path( $group . ( $slug ? '/' . $slug : '' ) );
	$valid = isset( $pages[ $group ] ) && ( ! $slug || iscp_get_offering_page( $group, $slug ) );
	if ( $page && ( 'publish' !== $page->post_status || $page->post_password ) ) {
		$valid = false;
	}
	if ( ! $valid ) {
		$query->set_404();
		status_header( 404 );
		return true;
	}
	$query->is_404 = false;
	status_header( 200 );
	return true;
}
add_filter( 'pre_handle_404', 'iscp_handle_internal_offering_status', 20, 2 );

/** Link only from internal offering templates. No menu or homepage changes. */
function iscp_render_software_hub_link() {
	$url = iscp_software_page_url( 'software-solutions' );
	if ( $url ) {
		printf( '<div class="iscp-container"><p><a href="%s">%s</a></p></div>', esc_url( $url ), esc_html__( 'Explore education, business and custom software solutions in Andhra Pradesh', 'iscp' ) );
	}
}
