<?php
/**
 * Safe one-click demo importer.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_get_demo_configs' ) ) {
	/**
	 * Return available demo configurations.
	 *
	 * @return array
	 */
	function iscp_get_demo_configs() {
		$generic = array(
			'hero_headline'  => __( 'Professional Software Development Company', 'iscp' ),
			'hero_subtitle'  => __( 'Indian Servers builds secure business applications, ERP and CRM systems, cloud platforms, AI automation, mobile apps and managed digital solutions.', 'iscp' ),
			'footer'         => __( 'Indian Servers Pvt. Ltd. designs, develops and maintains professional software products, business applications, cloud systems and AI-enabled digital platforms.', 'iscp' ),
			'primary_color'  => '#2563eb',
			'accent_color'   => '#12d6ff',
			'solutions'      => array( 'ERP Platform', 'CRM Dashboard', 'School Software', 'Cloud Hosting', 'AI Assistant', 'Cyber Security Lab' ),
			'services'       => array( 'Custom Web Apps', 'Mobile Apps', 'Cloud & DevOps', 'AI Automation', 'ERP Development', 'Long-Term Support' ),
			'industries'     => array( 'Schools', 'SMEs', 'Enterprises', 'Institutions', 'Retail Teams', 'Service Businesses' ),
			'case_studies'   => array( 'ERP Workflow Build', 'Cloud Migration', 'AI Automation Rollout' ),
			'testimonials'   => array( 'Business Owner', 'Institution Admin', 'Operations Manager' ),
			'faqs'           => array( 'What kind of software do you build?', 'Can you manage hosting too?', 'Do you provide long-term support?' ),
			'pricing'        => array( 'Project Discovery', 'Development Phase', 'Support Plan' ),
			'phone_display'  => 'Sai Satish: +91 9618222220',
			'phone_tel'      => '+919618222220',
			'email'          => 'info@indianservers.com',
			'address'        => __( 'Indian Servers Pvt. Ltd., India', 'iscp' ),
			'whatsapp'       => '919618222220',
			'linkedin'       => 'https://www.linkedin.com/in/indianservers/',
			'facebook'       => 'https://www.facebook.com/IndianServersPage',
			'instagram'      => 'https://www.instagram.com/indianserversltd',
		);

		$demos = array(
			'generic_corporate'   => array(
				'label'       => __( 'Generic Corporate', 'iscp' ),
				'description' => __( 'A flexible corporate website for service-led businesses.', 'iscp' ),
				'option'      => 'iscp_demo_imported_generic_corporate',
				'data'        => $generic,
			),
			'it_services'         => array(
				'label'       => __( 'IT Services Company', 'iscp' ),
				'description' => __( 'Managed IT, cloud, support and infrastructure services.', 'iscp' ),
				'option'      => 'iscp_demo_imported_it_services',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'Reliable IT Services for Growing Teams', 'iscp' ), 'solutions' => array( 'Managed IT Desk', 'Cloud Migration', 'Network Monitoring', 'Security Review', 'Device Management', 'Backup Systems' ) ) ),
			),
			'saas_startup'        => array(
				'label'       => __( 'SaaS Startup', 'iscp' ),
				'description' => __( 'Product-led SaaS demo with features, pricing and proof.', 'iscp' ),
				'option'      => 'iscp_demo_imported_saas_startup',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'Launch a SaaS Website That Converts', 'iscp' ), 'solutions' => array( 'Product Dashboard', 'Team Workspace', 'Billing Portal', 'API Access', 'Workflow Builder', 'Reporting Suite' ) ) ),
			),
			'ai_agency'           => array(
				'label'       => __( 'AI Agency', 'iscp' ),
				'description' => __( 'AI consulting, automations and assistant implementation.', 'iscp' ),
				'option'      => 'iscp_demo_imported_ai_agency',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'Practical AI Systems for Modern Businesses', 'iscp' ), 'solutions' => array( 'AI Chat Assistant', 'Workflow Agents', 'Document Intelligence', 'Lead Scoring', 'Data Enrichment', 'Automation Audits' ) ) ),
			),
			'cyber_security'      => array(
				'label'       => __( 'Cyber Security Training', 'iscp' ),
				'description' => __( 'Training, labs, awareness and cyber skill development.', 'iscp' ),
				'option'      => 'iscp_demo_imported_cyber_security',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'Cyber Security Training for Professional Teams', 'iscp' ), 'solutions' => array( 'Security Labs', 'Awareness Training', 'SOC Fundamentals', 'Ethical Hacking Track', 'Incident Response', 'Compliance Workshops' ) ) ),
			),
			'school_software'     => array(
				'label'       => __( 'School Software Company', 'iscp' ),
				'description' => __( 'School management, admissions, fees and parent portals.', 'iscp' ),
				'option'      => 'iscp_demo_imported_school_software',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'School Software for Smarter Administration', 'iscp' ), 'solutions' => array( 'Student Records', 'Fee Management', 'Parent Portal', 'Attendance System', 'Transport Module', 'Exam Reports' ) ) ),
			),
			'erp_pos'             => array(
				'label'       => __( 'ERP / POS / Inventory Company', 'iscp' ),
				'description' => __( 'Operations software for inventory, billing and reporting.', 'iscp' ),
				'option'      => 'iscp_demo_imported_erp_pos',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'ERP and POS Systems for Operational Control', 'iscp' ), 'solutions' => array( 'Inventory Control', 'POS Billing', 'Purchase Management', 'Stock Reports', 'Vendor Records', 'Multi-Branch Tools' ) ) ),
			),
			'consulting'          => array(
				'label'       => __( 'Consulting Firm', 'iscp' ),
				'description' => __( 'Business strategy, process improvement and advisory services.', 'iscp' ),
				'option'      => 'iscp_demo_imported_consulting',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'Consulting Websites Built for Trust and Clarity', 'iscp' ), 'solutions' => array( 'Strategy Advisory', 'Process Audit', 'Growth Planning', 'Operations Review', 'Leadership Workshops', 'Market Research' ) ) ),
			),
			'finance_audit_tax'   => array(
				'label'       => __( 'Finance / Audit / Tax Firm', 'iscp' ),
				'description' => __( 'Professional services demo for financial and compliance firms.', 'iscp' ),
				'option'      => 'iscp_demo_imported_finance_audit_tax',
				'data'        => array_merge( $generic, array( 'hero_headline' => __( 'Professional Finance, Audit and Tax Services', 'iscp' ), 'solutions' => array( 'Tax Advisory', 'Audit Support', 'Compliance Review', 'Payroll Guidance', 'Financial Reporting', 'Business Registration' ) ) ),
			),
			'indian_servers'      => array(
				'label'       => __( 'Indian Servers Official Demo', 'iscp' ),
				'description' => __( 'Official Indian Servers demo content. Import only when building that demo site.', 'iscp' ),
				'option'      => 'iscp_demo_imported_indian_servers',
				'data'        => array(
					'company'        => 'Indian Servers | Bridging Innovation and Tradition in IT',
					'website'        => 'https://indianservers.com/',
					'hero_headline'  => 'Enterprise Software, AI & Digital Transformation Solutions Since 2009',
					'hero_subtitle'  => 'Indian Servers builds business software, AI-enabled platforms, cybersecurity learning systems, web applications, mobile apps and scalable digital solutions for schools, SMEs, enterprises and institutions.',
					'footer'         => 'Indian Servers | Bridging Innovation and Tradition in IT',
					'primary_color'  => '#0b2f6b',
					'accent_color'   => '#12d6ff',
					'solutions'      => array( 'School Management Software', 'Fee Management Software', 'Vyapara ERP', 'Inventory & POS', 'CRM / PMS / HRMS Business Suite', 'AI Agents for Business', 'Cyber Security Labs', 'Custom Software Development' ),
					'services'       => array( 'Web Development', 'Mobile App Development', 'WordPress Development', 'ERP Development', 'CRM Development', 'AI Integration', 'Cyber Security Training', 'Cloud & Hosting', 'Software Maintenance', 'UI/UX Design', 'Automation Tools', 'Data Dashboards' ),
					'industries'     => array( 'Schools & Colleges', 'Retail & Distribution', 'Restaurants & POS', 'Manufacturing / Stock Management', 'Professional Services', 'Training Institutes', 'Startups & SMEs', 'Corporate Teams' ),
					'case_studies'   => array( 'School ERP Implementation', 'Inventory & POS System', 'AI Learning Platform' ),
					'testimonials'   => array( 'School Administration Team', 'Business Owner', 'Training Participant' ),
					'faqs'           => array( 'Can we request a product demo?', 'Do you build custom software?', 'Do you provide cybersecurity training?' ),
					'pricing'        => array( 'Starter', 'Professional', 'Enterprise' ),
					'phone_display'  => '+91 9618222220',
					'phone_tel'      => '+919618222220',
					'email'          => 'info@indianservers.com',
					'address'        => 'India | USA | Aus',
					'business_hours' => '9 AM - 5 PM',
					'whatsapp'       => '919618222220',
					'linkedin'       => 'https://www.linkedin.com/in/indianservers/',
					'facebook'       => 'https://www.facebook.com/IndianServersPage',
					'instagram'      => 'https://www.instagram.com/indianserversltd',
				),
			),
		);

		return $demos;
	}
}

if ( ! function_exists( 'iscp_handle_demo_import' ) ) {
	/**
	 * Handle demo import action.
	 */
	function iscp_handle_demo_import() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have permission to import demo content.', 'iscp' ) );
		}

		check_admin_referer( 'iscp_import_demo', 'iscp_import_nonce' );

		$demo_key = isset( $_POST['iscp_demo_key'] ) ? sanitize_key( wp_unslash( $_POST['iscp_demo_key'] ) ) : '';
		$demos    = iscp_get_demo_configs();

		if ( ! isset( $demos[ $demo_key ] ) ) {
			wp_safe_redirect( add_query_arg( array( 'page' => 'iscp-theme', 'tab' => 'demo-import', 'iscp_notice' => 'invalid_demo' ), admin_url( 'themes.php' ) ) );
			exit;
		}

		$demo = $demos[ $demo_key ];

		if ( get_option( $demo['option'] ) ) {
			wp_safe_redirect( add_query_arg( array( 'page' => 'iscp-theme', 'tab' => 'demo-import', 'iscp_notice' => 'already_imported' ), admin_url( 'themes.php' ) ) );
			exit;
		}

		iscp_import_demo_content( $demo_key, $demo );
		update_option( $demo['option'], current_time( 'mysql' ), false );

		wp_safe_redirect( add_query_arg( array( 'page' => 'iscp-theme', 'tab' => 'demo-import', 'iscp_notice' => 'imported' ), admin_url( 'themes.php' ) ) );
		exit;
	}
}
add_action( 'admin_post_iscp_import_demo', 'iscp_handle_demo_import' );

if ( ! function_exists( 'iscp_import_demo_content' ) ) {
	/**
	 * Import selected demo.
	 *
	 * @param string $demo_key Demo key.
	 * @param array  $demo Demo config.
	 */
	function iscp_import_demo_content( $demo_key, $demo ) {
		$data  = $demo['data'];
		$pages = iscp_import_demo_pages( $demo_key, $data );

		iscp_import_demo_cpt_posts( $demo_key, $data );
		iscp_import_demo_menus( $demo_key, $pages );
		iscp_import_demo_theme_mods( $data );

		if ( isset( $pages['home'] ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', absint( $pages['home'] ) );
		}

		if ( isset( $pages['blog'] ) ) {
			update_option( 'page_for_posts', absint( $pages['blog'] ) );
		}
	}
}

if ( ! function_exists( 'iscp_import_demo_pages' ) ) {
	/**
	 * Create demo pages.
	 *
	 * @param string $demo_key Demo key.
	 * @param array  $data Demo data.
	 * @return array
	 */
	function iscp_import_demo_pages( $demo_key, $data ) {
		$page_titles = array(
			'home'         => __( 'Home', 'iscp' ),
			'about'        => __( 'About', 'iscp' ),
			'services'     => __( 'Services', 'iscp' ),
			'solutions'    => __( 'Solutions', 'iscp' ),
			'case_studies' => __( 'Case Studies', 'iscp' ),
			'blog'         => __( 'Blog', 'iscp' ),
			'contact'      => __( 'Contact', 'iscp' ),
			'privacy'      => __( 'Privacy Policy', 'iscp' ),
			'terms'        => __( 'Terms', 'iscp' ),
		);

		$pages = array();

		foreach ( $page_titles as $key => $title ) {
			$pages[ $key ] = iscp_create_demo_post(
				array(
					'post_type'    => 'page',
					'post_title'   => $title,
					'post_content' => iscp_get_demo_page_content( $key, $data ),
					'post_excerpt' => '',
					'meta_input'   => array( '_iscp_demo_key' => $demo_key ),
				)
			);
		}

		return $pages;
	}
}

if ( ! function_exists( 'iscp_get_demo_page_content' ) ) {
	/**
	 * Return generic page content.
	 *
	 * @param string $key Page key.
	 * @param array  $data Demo data.
	 * @return string
	 */
	function iscp_get_demo_page_content( $key, $data ) {
		$company = isset( $data['company'] ) ? $data['company'] : __( 'your business', 'iscp' );

		$content = array(
			'home'         => __( 'This homepage uses reusable ISCP theme sections. Customize the content from the Customizer and custom post types.', 'iscp' ),
			'about'        => sprintf( __( '%s helps organizations present services, solutions and proof with a clear digital presence.', 'iscp' ), $company ),
			'services'     => __( 'Use this page to describe service categories, delivery process and business outcomes.', 'iscp' ),
			'solutions'    => __( 'Use this page to organize products, platforms, modules and business solutions.', 'iscp' ),
			'case_studies' => __( 'Use this page to present project outcomes, results and customer stories.', 'iscp' ),
			'blog'         => __( 'Publish insights, updates and educational articles here.', 'iscp' ),
			'contact'      => __( 'Add contact forms, maps, phone numbers and business contact information here.', 'iscp' ),
			'privacy'      => __( 'Replace this placeholder privacy policy with legal content appropriate for the website.', 'iscp' ),
			'terms'        => __( 'Replace this placeholder terms page with legal content appropriate for the website.', 'iscp' ),
		);

		return '<p>' . esc_html( isset( $content[ $key ] ) ? $content[ $key ] : $content['home'] ) . '</p>';
	}
}

if ( ! function_exists( 'iscp_import_demo_cpt_posts' ) ) {
	/**
	 * Create CPT demo posts.
	 *
	 * @param string $demo_key Demo key.
	 * @param array  $data Demo data.
	 */
	function iscp_import_demo_cpt_posts( $demo_key, $data ) {
		iscp_create_demo_items( $demo_key, 'iscp_solution', $data['solutions'], __( 'A flexible solution designed to help teams organize work, improve outcomes and present value clearly.', 'iscp' ) );
		iscp_create_demo_items( $demo_key, 'iscp_service', $data['services'], __( 'A professional service page entry with adaptable copy for business websites and client demos.', 'iscp' ) );
		iscp_create_demo_items( $demo_key, 'iscp_industry', $data['industries'], __( 'A reusable industry page entry for niche-specific messaging and positioning.', 'iscp' ) );

		foreach ( $data['case_studies'] as $index => $title ) {
			$post_id = iscp_create_demo_post(
				array(
					'post_type'    => 'iscp_case_study',
					'post_title'   => $title,
					'post_excerpt' => __( 'A sample result story showing how a clear digital experience can improve trust and business presentation.', 'iscp' ),
					'post_content' => __( 'This sample case study uses original placeholder content. Replace it with real project goals, process, outcomes and measurable results.', 'iscp' ),
					'meta_input'   => array( '_iscp_demo_key' => $demo_key ),
				)
			);

			update_post_meta( $post_id, '_iscp_case_client', sprintf( __( 'Demo Client %d', 'iscp' ), absint( $index + 1 ) ) );
			update_post_meta( $post_id, '_iscp_case_industry', isset( $data['industries'][ $index ] ) ? sanitize_text_field( $data['industries'][ $index ] ) : __( 'Business Services', 'iscp' ) );
			update_post_meta( $post_id, '_iscp_case_result', __( 'Improved clarity, credibility and lead-focused presentation.', 'iscp' ) );
		}

		foreach ( $data['testimonials'] as $index => $title ) {
			$post_id = iscp_create_demo_post(
				array(
					'post_type'    => 'iscp_testimonial',
					'post_title'   => $title,
					'post_excerpt' => __( 'The website structure feels professional, fast and easy to adapt for business growth.', 'iscp' ),
					'post_content' => __( 'This is original placeholder testimonial content for demo purposes.', 'iscp' ),
					'meta_input'   => array( '_iscp_demo_key' => $demo_key ),
				)
			);

			update_post_meta( $post_id, '_iscp_testimonial_role', __( 'Demo Role', 'iscp' ) );
			update_post_meta( $post_id, '_iscp_testimonial_company', __( 'Demo Company', 'iscp' ) );
			update_post_meta( $post_id, '_iscp_testimonial_rating', '5' );
		}

		foreach ( $data['faqs'] as $question ) {
			iscp_create_demo_post(
				array(
					'post_type'    => 'iscp_faq',
					'post_title'   => $question,
					'post_excerpt' => __( 'Yes. This demo content is safe to replace and customize for the final website.', 'iscp' ),
					'post_content' => __( 'Use this FAQ entry to answer buyer questions with clear, concise and brand-specific content.', 'iscp' ),
					'meta_input'   => array( '_iscp_demo_key' => $demo_key ),
				)
			);
		}

		foreach ( $data['pricing'] as $index => $title ) {
			$post_id = iscp_create_demo_post(
				array(
					'post_type'    => 'iscp_pricing',
					'post_title'   => $title,
					'post_excerpt' => __( 'A sample pricing plan for the buyer business services.', 'iscp' ),
					'post_content' => "Core business pages\nResponsive layout\nConversion-focused sections",
					'meta_input'   => array( '_iscp_demo_key' => $demo_key ),
				)
			);

			update_post_meta( $post_id, '_iscp_pricing_price', __( 'Price Placeholder', 'iscp' ) );
			update_post_meta( $post_id, '_iscp_pricing_period', __( 'per project', 'iscp' ) );
			update_post_meta( $post_id, '_iscp_pricing_featured', 1 === $index ? '1' : '0' );
			update_post_meta( $post_id, '_iscp_pricing_cta_text', __( 'Get Started', 'iscp' ) );
			update_post_meta( $post_id, '_iscp_pricing_cta_url', home_url( '/contact/' ) );
		}
	}
}

if ( ! function_exists( 'iscp_create_demo_items' ) ) {
	/**
	 * Create simple CPT demo posts.
	 *
	 * @param string $demo_key Demo key.
	 * @param string $post_type Post type.
	 * @param array  $items Titles.
	 * @param string $description Description.
	 */
	function iscp_create_demo_items( $demo_key, $post_type, $items, $description ) {
		foreach ( $items as $title ) {
			iscp_create_demo_post(
				array(
					'post_type'    => $post_type,
					'post_title'   => $title,
					'post_excerpt' => $description,
					'post_content' => $description . ' ' . __( 'Replace this demo content with details, benefits and proof points for the final website.', 'iscp' ),
					'meta_input'   => array( '_iscp_demo_key' => $demo_key ),
				)
			);
		}
	}
}

if ( ! function_exists( 'iscp_create_demo_post' ) ) {
	/**
	 * Create a demo post safely.
	 *
	 * @param array $args Post args.
	 * @return int
	 */
	function iscp_create_demo_post( $args ) {
		$defaults = array(
			'post_status'  => 'publish',
			'post_author'  => get_current_user_id(),
			'post_content' => '',
			'post_excerpt' => '',
			'meta_input'   => array(),
		);

		$post_id = wp_insert_post( wp_parse_args( $args, $defaults ), true );

		return is_wp_error( $post_id ) ? 0 : absint( $post_id );
	}
}

if ( ! function_exists( 'iscp_import_demo_menus' ) ) {
	/**
	 * Create and assign demo menus.
	 *
	 * @param string $demo_key Demo key.
	 * @param array  $pages Page IDs.
	 */
	function iscp_import_demo_menus( $demo_key, $pages ) {
		$primary_menu_id = wp_create_nav_menu( 'ISCP ' . $demo_key . ' Primary' );
		$footer_menu_id  = wp_create_nav_menu( 'ISCP ' . $demo_key . ' Footer' );

		if ( ! is_wp_error( $primary_menu_id ) ) {
			foreach ( array( 'home', 'about', 'services', 'solutions', 'blog', 'contact' ) as $page_key ) {
				if ( isset( $pages[ $page_key ] ) ) {
					wp_update_nav_menu_item(
						$primary_menu_id,
						0,
						array(
							'menu-item-object-id' => absint( $pages[ $page_key ] ),
							'menu-item-object'    => 'page',
							'menu-item-type'      => 'post_type',
							'menu-item-title'     => 'solutions' === $page_key ? __( 'Products', 'iscp' ) : get_the_title( $pages[ $page_key ] ),
							'menu-item-status'    => 'publish',
						)
					);
				}
			}
		}

		if ( ! is_wp_error( $footer_menu_id ) ) {
			foreach ( array( 'privacy', 'terms', 'contact' ) as $page_key ) {
				if ( isset( $pages[ $page_key ] ) ) {
					wp_update_nav_menu_item(
						$footer_menu_id,
						0,
						array(
							'menu-item-object-id' => absint( $pages[ $page_key ] ),
							'menu-item-object'    => 'page',
							'menu-item-type'      => 'post_type',
							'menu-item-title'     => get_the_title( $pages[ $page_key ] ),
							'menu-item-status'    => 'publish',
						)
					);
				}
			}
		}

		$locations = get_theme_mod( 'nav_menu_locations', array() );

		if ( ! is_wp_error( $primary_menu_id ) ) {
			$locations['primary'] = absint( $primary_menu_id );
		}

		if ( ! is_wp_error( $footer_menu_id ) ) {
			$locations['footer'] = absint( $footer_menu_id );
		}

		set_theme_mod( 'nav_menu_locations', $locations );
	}
}

if ( ! function_exists( 'iscp_import_demo_theme_mods' ) ) {
	/**
	 * Set demo Customizer values.
	 *
	 * @param array $data Demo data.
	 */
	function iscp_import_demo_theme_mods( $data ) {
		if ( isset( $data['company'] ) ) {
			update_option( 'blogname', sanitize_text_field( $data['company'] ) );
		}

		set_theme_mod( 'iscp_site_tagline_override', isset( $data['company'] ) ? $data['company'] : '' );
		set_theme_mod( 'iscp_hero_layout', 'dashboard' );
		set_theme_mod( 'iscp_hero_headline', $data['hero_headline'] );
		set_theme_mod( 'iscp_hero_subtitle', $data['hero_subtitle'] );
		set_theme_mod( 'iscp_footer_description', $data['footer'] );
		set_theme_mod( 'iscp_primary_color', $data['primary_color'] );
		set_theme_mod( 'iscp_accent_color', $data['accent_color'] );
		set_theme_mod( 'iscp_header_cta_1_text', __( 'Start a Project', 'iscp' ) );
		set_theme_mod( 'iscp_header_cta_1_url', '/contact/' );
		set_theme_mod( 'iscp_header_cta_2_text', __( 'Contact Us', 'iscp' ) );
		set_theme_mod( 'iscp_header_cta_2_url', '/contact/' );
		set_theme_mod( 'iscp_phone_display', $data['phone_display'] );
		set_theme_mod( 'iscp_phone_tel', $data['phone_tel'] );
		set_theme_mod( 'iscp_email', $data['email'] );
		set_theme_mod( 'iscp_address', $data['address'] );
		set_theme_mod( 'iscp_business_hours', isset( $data['business_hours'] ) ? $data['business_hours'] : '9 AM - 5 PM' );
		set_theme_mod( 'iscp_whatsapp_number', isset( $data['whatsapp'] ) ? $data['whatsapp'] : '919618222220' );
		set_theme_mod( 'iscp_social_linkedin', isset( $data['linkedin'] ) ? $data['linkedin'] : 'https://www.linkedin.com/in/indianservers/' );
		set_theme_mod( 'iscp_social_facebook', isset( $data['facebook'] ) ? $data['facebook'] : 'https://www.facebook.com/IndianServersPage' );
		set_theme_mod( 'iscp_social_instagram', isset( $data['instagram'] ) ? $data['instagram'] : 'https://www.instagram.com/indianserversltd' );
	}
}
