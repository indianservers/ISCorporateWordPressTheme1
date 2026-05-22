<?php
/**
 * Theme-owned product and service landing pages.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_get_offering_pages' ) ) {
	/**
	 * Return Indian Servers product and service page definitions.
	 *
	 * @return array
	 */
	function iscp_get_offering_pages() {
		return array(
			'products' => array(
				'base'  => 'products',
				'label' => __( 'Products', 'iscp' ),
				'items' => array(
					'hrms'                       => array( 'title' => __( 'HRMS Software', 'iscp' ), 'icon' => 'team', 'summary' => __( 'Human resource management for attendance, leave, payroll support, onboarding and employee records.', 'iscp' ), 'features' => array( __( 'Employee profiles and role-based access', 'iscp' ), __( 'Attendance, leave and shift workflows', 'iscp' ), __( 'Payroll-ready reports and approvals', 'iscp' ), __( 'Self-service dashboards for staff and HR teams', 'iscp' ) ) ),
					'school-management-software' => array( 'title' => __( 'School Management Software', 'iscp' ), 'icon' => 'education', 'summary' => __( 'A complete institution platform for admissions, fees, attendance, exams, transport and parent communication.', 'iscp' ), 'features' => array( __( 'Student, teacher and parent portals', 'iscp' ), __( 'Fee collection, receipts and dues tracking', 'iscp' ), __( 'Attendance, exams and academic reports', 'iscp' ), __( 'Transport, notifications and administration modules', 'iscp' ) ) ),
					'crm'                        => array( 'title' => __( 'CRM Software', 'iscp' ), 'icon' => 'crm', 'summary' => __( 'Lead, customer and follow-up management for sales teams, support teams and service businesses.', 'iscp' ), 'features' => array( __( 'Lead pipelines and customer history', 'iscp' ), __( 'Reminders, follow-ups and task ownership', 'iscp' ), __( 'Quotation, ticket and communication tracking', 'iscp' ), __( 'Reports for sales and service visibility', 'iscp' ) ) ),
					'inventory-management-software' => array( 'title' => __( 'Inventory Management Software', 'iscp' ), 'icon' => 'inventory', 'summary' => __( 'Stock, purchase, sales, vendor and warehouse workflows with practical reports for business control.', 'iscp' ), 'features' => array( __( 'Stock ledger and item movement tracking', 'iscp' ), __( 'Purchase, sales and vendor workflows', 'iscp' ), __( 'Warehouse, branch and reorder visibility', 'iscp' ), __( 'Billing and accounting integration readiness', 'iscp' ) ) ),
					'restaurant-pos-software'    => array( 'title' => __( 'Restaurant POS Software', 'iscp' ), 'icon' => 'restaurant', 'summary' => __( 'Restaurant billing, KOT, table ordering, menu control and branch reporting for hospitality operations.', 'iscp' ), 'features' => array( __( 'Table, takeaway and delivery billing', 'iscp' ), __( 'Kitchen order tickets and menu management', 'iscp' ), __( 'Inventory, purchase and wastage controls', 'iscp' ), __( 'Daily sales and branch reports', 'iscp' ) ) ),
					'vyapara-erp'                => array( 'title' => __( 'Vyapara ERP', 'iscp' ), 'icon' => 'cube', 'summary' => __( 'ERP workflows for SMEs that need purchase, sales, stock, billing, staff and reporting in one place.', 'iscp' ), 'features' => array( __( 'Modular ERP for growing businesses', 'iscp' ), __( 'Purchase, sales, accounts and inventory views', 'iscp' ), __( 'Approval flows and branch-level operations', 'iscp' ), __( 'Custom dashboards and business reports', 'iscp' ) ) ),
					'learning-management-system' => array( 'title' => __( 'Learning Management System', 'iscp' ), 'icon' => 'education', 'summary' => __( 'Online learning, course delivery, tests, certificates and learner progress for training organizations.', 'iscp' ), 'features' => array( __( 'Course, batch and learner management', 'iscp' ), __( 'Assessments, quizzes and certificates', 'iscp' ), __( 'Video, document and assignment workflows', 'iscp' ), __( 'Trainer and administrator dashboards', 'iscp' ) ) ),
					'project-management-software' => array( 'title' => __( 'Project Management Software', 'iscp' ), 'icon' => 'chart', 'summary' => __( 'Project planning, task ownership, milestones and team reporting for software and business teams.', 'iscp' ), 'features' => array( __( 'Tasks, milestones and sprint views', 'iscp' ), __( 'Team ownership and status reporting', 'iscp' ), __( 'Client communication and approvals', 'iscp' ), __( 'Dashboards for delivery visibility', 'iscp' ) ) ),
					'ai-business-assistant'      => array( 'title' => __( 'AI Business Assistant', 'iscp' ), 'icon' => 'ai', 'summary' => __( 'AI chat, document intelligence and workflow assistants for internal operations and customer support.', 'iscp' ), 'features' => array( __( 'Private knowledge-base assistants', 'iscp' ), __( 'Document search, summarization and automation', 'iscp' ), __( 'CRM, ERP and website integrations', 'iscp' ), __( 'Human handoff and audit-ready logs', 'iscp' ) ) ),
					'cloud-hosting-platform'     => array( 'title' => __( 'Cloud Hosting Platform', 'iscp' ), 'icon' => 'cloud', 'summary' => __( 'Managed hosting, VPS, cloud deployment, backups, SSL and monitoring for business-critical systems.', 'iscp' ), 'features' => array( __( 'Managed VPS and cloud server setup', 'iscp' ), __( 'SSL, backups, monitoring and migrations', 'iscp' ), __( 'WordPress, PHP, .NET and custom app hosting', 'iscp' ), __( 'Security hardening and support workflows', 'iscp' ) ) ),
				),
			),
			'services' => array(
				'base'  => 'services',
				'label' => __( 'Services', 'iscp' ),
				'items' => array(
					'custom-software-development' => array( 'title' => __( 'Custom Software Development', 'iscp' ), 'icon' => 'code', 'summary' => __( 'Tailor-made business software using .NET, PHP, Python, Node.js, databases, APIs and cloud deployment.', 'iscp' ) ),
					'web-application-development' => array( 'title' => __( 'Web Application Development', 'iscp' ), 'icon' => 'web', 'summary' => __( 'Secure portals, dashboards, SaaS platforms, admin panels and customer-facing web applications.', 'iscp' ) ),
					'mobile-app-development'      => array( 'title' => __( 'Mobile App Development', 'iscp' ), 'icon' => 'mobile', 'summary' => __( 'Android and cross-platform apps for customers, field staff, students, restaurants and operations teams.', 'iscp' ) ),
					'ai-development'              => array( 'title' => __( 'AI Development', 'iscp' ), 'icon' => 'ai', 'summary' => __( 'AI assistants, workflow automation, document intelligence, analytics and business process augmentation.', 'iscp' ) ),
					'ar-vr-development'           => array( 'title' => __( 'AR/VR Development', 'iscp' ), 'icon' => 'ar', 'summary' => __( 'Immersive training, visualization, simulation and product experience development.', 'iscp' ) ),
					'cloud-hosting'               => array( 'title' => __( 'Cloud Hosting', 'iscp' ), 'icon' => 'cloud', 'summary' => __( 'Managed hosting, VPS, cloud servers, migration, monitoring, backups and deployment support.', 'iscp' ) ),
					'cyber-security-vapt'         => array( 'title' => __( 'Cyber Security & VAPT', 'iscp' ), 'icon' => 'shield', 'summary' => __( 'Vulnerability assessment, penetration testing, hardening, review and secure deployment practices.', 'iscp' ) ),
					'dedicated-development-teams' => array( 'title' => __( 'Dedicated Development Teams', 'iscp' ), 'icon' => 'team', 'summary' => __( 'Dedicated developers, designers, testers and support teams for long-term product delivery.', 'iscp' ) ),
					'wordpress-development'       => array( 'title' => __( 'WordPress Development', 'iscp' ), 'icon' => 'web', 'summary' => __( 'Corporate websites, custom themes, plugins, performance, security and managed WordPress hosting.', 'iscp' ) ),
					'ecommerce-development'       => array( 'title' => __( 'Ecommerce Development', 'iscp' ), 'icon' => 'inventory', 'summary' => __( 'Online stores, catalogues, payment flows, inventory integration and order dashboards.', 'iscp' ) ),
					'api-integration'             => array( 'title' => __( 'API & Integration Services', 'iscp' ), 'icon' => 'cube', 'summary' => __( 'Payment gateways, SMS, WhatsApp, accounting, CRM, ERP and third-party system integrations.', 'iscp' ) ),
					'ui-ux-design'                => array( 'title' => __( 'UI/UX Design', 'iscp' ), 'icon' => 'design', 'summary' => __( 'Product interfaces, admin dashboards, user journeys and business application design systems.', 'iscp' ) ),
					'devops-monitoring'           => array( 'title' => __( 'DevOps & Monitoring', 'iscp' ), 'icon' => 'chart', 'summary' => __( 'CI/CD, server setup, uptime monitoring, backups, logs, deployments and maintenance operations.', 'iscp' ) ),
					'software-maintenance'        => array( 'title' => __( 'Software Maintenance', 'iscp' ), 'icon' => 'shield', 'summary' => __( 'Bug fixing, upgrades, performance tuning, security patches and long-term support contracts.', 'iscp' ) ),
				),
			),
		);
	}
}

if ( ! function_exists( 'iscp_apply_offering_theme_mods' ) ) {
	/**
	 * Apply Customizer overrides to product/service definitions.
	 *
	 * @param array $pages Offering page definitions.
	 * @return array
	 */
	function iscp_apply_offering_theme_mods( $pages ) {
		foreach ( array( 'products', 'services' ) as $group ) {
			if ( empty( $pages[ $group ]['items'] ) ) {
				continue;
			}

			foreach ( $pages[ $group ]['items'] as $slug => $item ) {
				$prefix = 'iscp_' . $group . '_' . str_replace( '-', '_', $slug );

				foreach ( array( 'title', 'summary', 'icon', 'url' ) as $field ) {
					$value = get_theme_mod( $prefix . '_' . $field, isset( $item[ $field ] ) ? $item[ $field ] : '' );

					if ( '' !== trim( (string) $value ) ) {
						$pages[ $group ]['items'][ $slug ][ $field ] = $value;
					}
				}

				if ( ! empty( $item['features'] ) ) {
					$features = get_theme_mod( $prefix . '_features', implode( "\n", $item['features'] ) );

					if ( '' !== trim( (string) $features ) ) {
						$pages[ $group ]['items'][ $slug ]['features'] = array_values(
							array_filter(
								array_map( 'trim', preg_split( '/\r\n|\r|\n/', $features ) )
							)
						);
					}
				}
			}
		}

		return $pages;
	}
}

if ( ! function_exists( 'iscp_get_editable_offering_pages' ) ) {
	/**
	 * Return offering pages with saved Theme Options applied.
	 *
	 * @return array
	 */
	function iscp_get_editable_offering_pages() {
		return iscp_apply_offering_theme_mods( iscp_get_offering_pages() );
	}
}

if ( ! function_exists( 'iscp_get_offering_page' ) ) {
	/**
	 * Return one offering page by group and slug.
	 */
	function iscp_get_offering_page( $group, $slug ) {
		$pages = iscp_get_editable_offering_pages();

		if ( ! isset( $pages[ $group ]['items'][ $slug ] ) ) {
			return array();
		}

		$item          = $pages[ $group ]['items'][ $slug ];
		$item['slug']  = $slug;
		$item['group'] = $group;
		$item['url']   = ! empty( $item['url'] ) ? $item['url'] : home_url( '/' . $pages[ $group ]['base'] . '/' . $slug . '/' );

		if ( function_exists( 'iscp_get_offering_content_profile' ) ) {
			$item = array_merge( $item, iscp_get_offering_content_profile( $group, $slug, $item ) );
		}

		return $item;
	}
}

if ( ! function_exists( 'iscp_get_offering_content_profile' ) ) {
	/**
	 * Return SEO-focused detail content for virtual product and service pages.
	 *
	 * @param string $group Offering group.
	 * @param string $slug Offering slug.
	 * @param array  $item Base offering item.
	 * @return array
	 */
	function iscp_get_offering_content_profile( $group, $slug, $item ) {
		$product_profiles = array(
			'school-management-software' => array(
				'kicker'     => __( 'School ERP for modern institutions', 'iscp' ),
				'intro'      => __( 'Indian Servers School Management Software helps schools, colleges and training institutions manage admissions, fees, attendance, exams, transport, communication and administration from one secure digital platform.', 'iscp' ),
				'best_for'   => __( 'Schools, colleges, coaching centers, residential institutions and multi-branch education groups.', 'iscp' ),
				'outcomes'   => array( __( 'Reduce manual office work and fee follow-up delays.', 'iscp' ), __( 'Improve parent, student and staff communication.', 'iscp' ), __( 'Give management clear reports across academics, finance and operations.', 'iscp' ) ),
				'modules'    => array( __( 'Admissions and student records', 'iscp' ), __( 'Fees, receipts and dues', 'iscp' ), __( 'Attendance and timetable', 'iscp' ), __( 'Exams and report cards', 'iscp' ), __( 'Transport and notifications', 'iscp' ), __( 'Parent and staff portals', 'iscp' ) ),
				'seo_terms'  => __( 'school ERP, school management software, student information system, fees management software, education ERP India', 'iscp' ),
				'cta_title'  => __( 'Looking for school software?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers School ERP to organize your institution with secure workflows and practical reports.', 'iscp' ),
			),
			'hrms' => array(
				'kicker'     => __( 'HRMS for growing teams', 'iscp' ),
				'intro'      => __( 'Indian Servers HRMS Software brings employee data, attendance, leave, payroll support, onboarding, approvals and HR reporting into a clean, role-based system for Indian and global teams.', 'iscp' ),
				'best_for'   => __( 'SMEs, startups, enterprises, branches, factories, schools and service companies.', 'iscp' ),
				'outcomes'   => array( __( 'Centralize employee records and compliance-ready documents.', 'iscp' ), __( 'Speed up leave, attendance and approval workflows.', 'iscp' ), __( 'Give HR and leadership accurate workforce visibility.', 'iscp' ) ),
				'modules'    => array( __( 'Employee profiles', 'iscp' ), __( 'Attendance and shifts', 'iscp' ), __( 'Leave approvals', 'iscp' ), __( 'Payroll-ready reports', 'iscp' ), __( 'Onboarding checklists', 'iscp' ), __( 'HR dashboards', 'iscp' ) ),
				'seo_terms'  => __( 'HRMS software, HR software India, employee management system, payroll support software, attendance management system', 'iscp' ),
				'cta_title'  => __( 'Looking for HR software?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers HRMS to manage teams, approvals and workforce records with confidence.', 'iscp' ),
			),
			'crm' => array(
				'kicker'     => __( 'CRM for sales and service control', 'iscp' ),
				'intro'      => __( 'Indian Servers CRM Software helps teams capture leads, track customer conversations, assign follow-ups, manage service tickets and convert business opportunities with better visibility.', 'iscp' ),
				'best_for'   => __( 'Sales teams, service companies, support desks, consultants, real estate, education and B2B operations.', 'iscp' ),
				'outcomes'   => array( __( 'Never lose a lead or customer follow-up.', 'iscp' ), __( 'Improve team ownership and response discipline.', 'iscp' ), __( 'Track pipeline, tickets and communication history in one place.', 'iscp' ) ),
				'modules'    => array( __( 'Lead pipeline', 'iscp' ), __( 'Customer history', 'iscp' ), __( 'Follow-up reminders', 'iscp' ), __( 'Tickets and tasks', 'iscp' ), __( 'Quotations', 'iscp' ), __( 'Sales reports', 'iscp' ) ),
				'seo_terms'  => __( 'CRM software, lead management software, sales CRM India, customer management system, service CRM', 'iscp' ),
				'cta_title'  => __( 'Looking for CRM software?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers CRM to manage leads, customers, sales teams and service follow-ups.', 'iscp' ),
			),
			'project-management-software' => array(
				'kicker'     => __( 'Project delivery with accountability', 'iscp' ),
				'intro'      => __( 'Indian Servers Project Management Software gives teams a structured way to plan work, assign responsibilities, track milestones, manage approvals and report delivery health across departments.', 'iscp' ),
				'best_for'   => __( 'Software teams, agencies, implementation teams, operations departments and client-facing delivery teams.', 'iscp' ),
				'outcomes'   => array( __( 'Improve task ownership and milestone clarity.', 'iscp' ), __( 'Track delays, approvals and delivery risks earlier.', 'iscp' ), __( 'Give clients and managers a cleaner project view.', 'iscp' ) ),
				'modules'    => array( __( 'Projects and milestones', 'iscp' ), __( 'Tasks and owners', 'iscp' ), __( 'Sprint or phase views', 'iscp' ), __( 'Client approvals', 'iscp' ), __( 'Time and status reports', 'iscp' ), __( 'Delivery dashboards', 'iscp' ) ),
				'seo_terms'  => __( 'project management software, task management system, team collaboration software, software project tracking, milestone management', 'iscp' ),
				'cta_title'  => __( 'Need project control?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers Project Management Software to keep work visible, accountable and measurable.', 'iscp' ),
			),
			'learning-management-system' => array(
				'kicker'     => __( 'LMS for digital learning delivery', 'iscp' ),
				'intro'      => __( 'Indian Servers Learning Management System supports online courses, batches, assignments, assessments, certificates and learner progress tracking for education and training organizations.', 'iscp' ),
				'best_for'   => __( 'Training companies, colleges, coaching centers, corporate academies and certification programs.', 'iscp' ),
				'outcomes'   => array( __( 'Deliver courses and assessments through one platform.', 'iscp' ), __( 'Track learner progress, completion and certification.', 'iscp' ), __( 'Support trainers, admins and learners with role-based dashboards.', 'iscp' ) ),
				'modules'    => array( __( 'Course builder', 'iscp' ), __( 'Batch management', 'iscp' ), __( 'Assignments and tests', 'iscp' ), __( 'Certificates', 'iscp' ), __( 'Learner analytics', 'iscp' ), __( 'Trainer dashboards', 'iscp' ) ),
				'seo_terms'  => __( 'learning management system, LMS software, online course platform, training management software, education technology platform', 'iscp' ),
				'cta_title'  => __( 'Launching online learning?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers LMS to deliver courses, tests and certifications professionally.', 'iscp' ),
			),
			'vyapara-erp' => array(
				'kicker'     => __( 'ERP for practical business operations', 'iscp' ),
				'intro'      => __( 'Vyapara ERP by Indian Servers connects purchase, sales, billing, stock, staff, approvals and reports so SMEs can run daily operations with fewer spreadsheets and better control.', 'iscp' ),
				'best_for'   => __( 'SMEs, distributors, trading companies, service businesses, warehouses and branch operations.', 'iscp' ),
				'outcomes'   => array( __( 'Bring sales, stock, purchase and billing into one workflow.', 'iscp' ), __( 'Improve branch, vendor and customer visibility.', 'iscp' ), __( 'Build reports that support faster business decisions.', 'iscp' ) ),
				'modules'    => array( __( 'Sales and billing', 'iscp' ), __( 'Purchase and vendors', 'iscp' ), __( 'Stock and warehouse', 'iscp' ), __( 'Accounts-ready reports', 'iscp' ), __( 'Branch operations', 'iscp' ), __( 'Approval workflows', 'iscp' ) ),
				'seo_terms'  => __( 'ERP software for SMEs, business management software, purchase sales inventory software, Vyapara ERP, Indian ERP software', 'iscp' ),
				'cta_title'  => __( 'Need a business ERP?', 'iscp' ),
				'cta_text'   => __( 'Use Vyapara ERP to connect business operations with practical dashboards and reports.', 'iscp' ),
			),
			'restaurant-pos-software' => array(
				'kicker'     => __( 'Restaurant POS for faster operations', 'iscp' ),
				'intro'      => __( 'Indian Servers Restaurant POS Software supports billing, KOT, table ordering, takeaway, delivery, menu control, inventory and branch reporting for restaurants and hospitality businesses.', 'iscp' ),
				'best_for'   => __( 'Restaurants, cafes, food courts, bakeries, cloud kitchens, hotels and multi-branch outlets.', 'iscp' ),
				'outcomes'   => array( __( 'Speed up billing and kitchen communication.', 'iscp' ), __( 'Improve menu, stock and wastage control.', 'iscp' ), __( 'Track daily sales and branch performance clearly.', 'iscp' ) ),
				'modules'    => array( __( 'POS billing', 'iscp' ), __( 'KOT and kitchen display', 'iscp' ), __( 'Table and takeaway', 'iscp' ), __( 'Menu management', 'iscp' ), __( 'Inventory control', 'iscp' ), __( 'Branch reports', 'iscp' ) ),
				'seo_terms'  => __( 'restaurant POS software, KOT billing software, restaurant management system, cafe POS, cloud kitchen billing software', 'iscp' ),
				'cta_title'  => __( 'Looking for restaurant POS?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers Restaurant POS to improve billing, kitchen coordination and sales visibility.', 'iscp' ),
			),
			'inventory-management-software' => array(
				'kicker'     => __( 'Inventory software for stock clarity', 'iscp' ),
				'intro'      => __( 'Indian Servers Inventory Management Software helps businesses manage stock, purchase, sales, vendors, warehouses, reorders and reports with practical controls for daily operations.', 'iscp' ),
				'best_for'   => __( 'Retailers, distributors, warehouses, manufacturers, service businesses and branch networks.', 'iscp' ),
				'outcomes'   => array( __( 'Know available stock, movement and reorder needs.', 'iscp' ), __( 'Connect purchase, sales, vendor and warehouse workflows.', 'iscp' ), __( 'Reduce manual stock errors and reporting delays.', 'iscp' ) ),
				'modules'    => array( __( 'Stock ledger', 'iscp' ), __( 'Purchase and sales', 'iscp' ), __( 'Vendor records', 'iscp' ), __( 'Warehouse movement', 'iscp' ), __( 'Reorder alerts', 'iscp' ), __( 'Inventory reports', 'iscp' ) ),
				'seo_terms'  => __( 'inventory management software, stock management system, warehouse software, purchase sales inventory software, vendor management software', 'iscp' ),
				'cta_title'  => __( 'Need inventory control?', 'iscp' ),
				'cta_text'   => __( 'Use Indian Servers Inventory Management Software to control stock, vendors and warehouse workflows.', 'iscp' ),
			),
		);

		if ( 'products' === $group && isset( $product_profiles[ $slug ] ) ) {
			return $product_profiles[ $slug ];
		}

		$service_profiles = array(
			'custom-software-development' => array(
				'kicker'    => __( 'Custom software engineered around your process', 'iscp' ),
				'intro'     => __( 'Indian Servers builds custom software for organizations that need more than ready-made tools. We study the workflow, design the architecture, develop secure modules and support the system after launch.', 'iscp' ),
				'best_for'  => __( 'Enterprises, SMEs, startups, institutions, government-style workflows, internal teams and businesses with unique operational requirements.', 'iscp' ),
				'outcomes'  => array( __( 'Convert manual and spreadsheet-driven work into controlled digital workflows.', 'iscp' ), __( 'Build scalable systems using .NET, PHP, Python, Node.js, databases and APIs.', 'iscp' ), __( 'Launch with secure roles, dashboards, integrations and support planning.', 'iscp' ) ),
				'modules'   => array( __( 'Requirement study', 'iscp' ), __( 'Architecture', 'iscp' ), __( 'Web portals', 'iscp' ), __( 'Admin dashboards', 'iscp' ), __( 'API integrations', 'iscp' ), __( 'Cloud deployment', 'iscp' ) ),
				'seo_terms' => __( 'custom software development, software development company India, .NET PHP Python development, enterprise software development, SaaS application development', 'iscp' ),
				'cta_title' => __( 'Need custom software?', 'iscp' ),
				'cta_text'  => __( 'Talk to Indian Servers about a custom platform designed around your exact workflow.', 'iscp' ),
			),
			'web-application-development' => array(
				'kicker'    => __( 'Secure web applications for business teams', 'iscp' ),
				'intro'     => __( 'Indian Servers develops web applications, customer portals, SaaS dashboards, admin panels and workflow systems that run securely in the browser and scale with business demand.', 'iscp' ),
				'best_for'  => __( 'SaaS founders, internal operations, service portals, booking systems, education platforms and customer-facing dashboards.', 'iscp' ),
				'outcomes'  => array( __( 'Deliver clean browser-based workflows for users and administrators.', 'iscp' ), __( 'Integrate payment, SMS, WhatsApp, CRM, ERP and third-party APIs.', 'iscp' ), __( 'Improve speed, security, usability and maintainability.', 'iscp' ) ),
				'modules'   => array( __( 'Customer portal', 'iscp' ), __( 'Admin panel', 'iscp' ), __( 'SaaS dashboard', 'iscp' ), __( 'Reports', 'iscp' ), __( 'APIs', 'iscp' ), __( 'Deployment', 'iscp' ) ),
				'seo_terms' => __( 'web application development, SaaS development company, business web portal development, admin dashboard development, secure web apps India', 'iscp' ),
				'cta_title' => __( 'Planning a web application?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can design, build and host your web app with practical business workflows.', 'iscp' ),
			),
			'mobile-app-development' => array(
				'kicker'    => __( 'Mobile apps for customers, staff and field teams', 'iscp' ),
				'intro'     => __( 'Indian Servers builds Android and cross-platform mobile apps for field operations, student and parent access, restaurant ordering, customer service and business workflows.', 'iscp' ),
				'best_for'  => __( 'Schools, restaurants, field teams, service companies, logistics operations, internal teams and customer-facing platforms.', 'iscp' ),
				'outcomes'  => array( __( 'Give users a fast mobile experience connected to your backend.', 'iscp' ), __( 'Support authentication, notifications, forms, reports and role-based access.', 'iscp' ), __( 'Connect mobile apps with ERP, CRM, HRMS, LMS and cloud APIs.', 'iscp' ) ),
				'modules'   => array( __( 'Android apps', 'iscp' ), __( 'Cross-platform apps', 'iscp' ), __( 'Push notifications', 'iscp' ), __( 'API backend', 'iscp' ), __( 'User roles', 'iscp' ), __( 'App support', 'iscp' ) ),
				'seo_terms' => __( 'mobile app development, Android app development India, business mobile apps, cross-platform app development, enterprise mobile application', 'iscp' ),
				'cta_title' => __( 'Need a mobile app?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can build mobile apps connected to your business software and cloud systems.', 'iscp' ),
			),
			'ai-development' => array(
				'kicker'    => __( 'AI systems for practical automation', 'iscp' ),
				'intro'     => __( 'Indian Servers develops AI assistants, document intelligence, workflow automation, knowledge-base chat and analytics tools that improve customer support and internal operations.', 'iscp' ),
				'best_for'  => __( 'Support teams, sales teams, schools, HR departments, document-heavy businesses, SaaS products and enterprise operations.', 'iscp' ),
				'outcomes'  => array( __( 'Automate repetitive questions, summaries and document lookup.', 'iscp' ), __( 'Add AI assistants to websites, CRM, ERP and internal systems.', 'iscp' ), __( 'Keep human review, permissions and auditability in the workflow.', 'iscp' ) ),
				'modules'   => array( __( 'AI chat', 'iscp' ), __( 'Document intelligence', 'iscp' ), __( 'Knowledge base', 'iscp' ), __( 'Workflow automation', 'iscp' ), __( 'Analytics', 'iscp' ), __( 'Integrations', 'iscp' ) ),
				'seo_terms' => __( 'AI development company, AI chatbot development, document intelligence, workflow automation AI, business AI solutions India', 'iscp' ),
				'cta_title' => __( 'Want AI in your workflows?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can add AI assistants and automation to your existing business systems.', 'iscp' ),
			),
			'ar-vr-development' => array(
				'kicker'    => __( 'AR/VR for training, visualization and immersive demos', 'iscp' ),
				'intro'     => __( 'Indian Servers creates AR and VR experiences for training, product visualization, simulations, education, industrial walkthroughs and interactive demonstrations.', 'iscp' ),
				'best_for'  => __( 'Training companies, education, manufacturing, real estate, healthcare awareness, product demos and immersive learning projects.', 'iscp' ),
				'outcomes'  => array( __( 'Create memorable interactive experiences for learning and presentation.', 'iscp' ), __( 'Use 3D visualization to explain products, processes or spaces.', 'iscp' ), __( 'Deploy experiences for web, mobile, headset or demo environments.', 'iscp' ) ),
				'modules'   => array( __( '3D scenes', 'iscp' ), __( 'AR demos', 'iscp' ), __( 'VR training', 'iscp' ), __( 'Product visualization', 'iscp' ), __( 'Interactive guides', 'iscp' ), __( 'Deployment', 'iscp' ) ),
				'seo_terms' => __( 'AR VR development, immersive training software, 3D product visualization, augmented reality development, virtual reality solutions India', 'iscp' ),
				'cta_title' => __( 'Planning an immersive experience?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can design AR/VR solutions for training, demos and visualization.', 'iscp' ),
			),
			'cloud-hosting' => array(
				'kicker'    => __( 'Managed cloud hosting and deployment support', 'iscp' ),
				'intro'     => __( 'Indian Servers provides managed hosting, VPS, cloud deployment, SSL, backups, migration, monitoring and hardening for WordPress, PHP, .NET, custom software and business platforms.', 'iscp' ),
				'best_for'  => __( 'Corporate websites, ecommerce, portals, SaaS systems, ERP, CRM, LMS, APIs and mission-critical business applications.', 'iscp' ),
				'outcomes'  => array( __( 'Deploy applications on reliable cloud and VPS infrastructure.', 'iscp' ), __( 'Improve uptime through monitoring, backups and maintenance.', 'iscp' ), __( 'Plan migrations, SSL, security hardening and performance tuning.', 'iscp' ) ),
				'modules'   => array( __( 'VPS setup', 'iscp' ), __( 'Cloud migration', 'iscp' ), __( 'SSL', 'iscp' ), __( 'Backups', 'iscp' ), __( 'Monitoring', 'iscp' ), __( 'Hardening', 'iscp' ) ),
				'seo_terms' => __( 'cloud hosting India, managed VPS hosting, WordPress hosting, application hosting, cloud migration services', 'iscp' ),
				'cta_title' => __( 'Need managed cloud hosting?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can host, monitor and support your business-critical applications.', 'iscp' ),
			),
			'cyber-security-vapt' => array(
				'kicker'    => __( 'Cyber security and VAPT before launch', 'iscp' ),
				'intro'     => __( 'Indian Servers provides vulnerability assessment, penetration testing, security review, hardening guidance and safer deployment practices for websites, portals, APIs and applications.', 'iscp' ),
				'best_for'  => __( 'Web apps, SaaS products, APIs, WordPress websites, ecommerce systems, cloud servers and organizations preparing for secure launch.', 'iscp' ),
				'outcomes'  => array( __( 'Identify vulnerabilities before attackers or customers find them.', 'iscp' ), __( 'Improve server, application and API security posture.', 'iscp' ), __( 'Receive practical remediation guidance for development and hosting teams.', 'iscp' ) ),
				'modules'   => array( __( 'VAPT', 'iscp' ), __( 'Web app testing', 'iscp' ), __( 'API review', 'iscp' ), __( 'Server hardening', 'iscp' ), __( 'Report', 'iscp' ), __( 'Retest support', 'iscp' ) ),
				'seo_terms' => __( 'VAPT services, cyber security company India, vulnerability assessment, penetration testing, web application security testing', 'iscp' ),
				'cta_title' => __( 'Need a VAPT review?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can test and harden your application before production launch.', 'iscp' ),
			),
			'dedicated-development-teams' => array(
				'kicker'    => __( 'Dedicated teams for long-term product delivery', 'iscp' ),
				'intro'     => __( 'Indian Servers provides dedicated developers, designers, QA testers, cloud engineers and support teams for companies that need consistent delivery capacity without building every role internally.', 'iscp' ),
				'best_for'  => __( 'Agencies, SaaS companies, enterprises, startups, product owners and businesses with ongoing software roadmaps.', 'iscp' ),
				'outcomes'  => array( __( 'Add reliable engineering capacity to your roadmap.', 'iscp' ), __( 'Work with developers across .NET, PHP, Python, WordPress, mobile, cloud and AI.', 'iscp' ), __( 'Keep communication, reporting and delivery ownership structured.', 'iscp' ) ),
				'modules'   => array( __( 'Developers', 'iscp' ), __( 'UI/UX', 'iscp' ), __( 'QA', 'iscp' ), __( 'DevOps', 'iscp' ), __( 'Support', 'iscp' ), __( 'Reporting', 'iscp' ) ),
				'seo_terms' => __( 'dedicated development team, hire software developers India, offshore development team, remote developers, software outsourcing company', 'iscp' ),
				'cta_title' => __( 'Need a dedicated team?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can provide dedicated engineering talent for sustained product delivery.', 'iscp' ),
			),
			'wordpress-development' => array(
				'kicker'    => __( 'Professional WordPress development and hosting', 'iscp' ),
				'intro'     => __( 'Indian Servers builds professional WordPress websites, custom themes, plugins, landing pages, performance improvements, security fixes and managed WordPress hosting workflows.', 'iscp' ),
				'best_for'  => __( 'Corporate websites, service companies, institutions, blogs, landing pages, ecommerce catalogs and businesses needing editable content.', 'iscp' ),
				'outcomes'  => array( __( 'Launch a clean website that your team can update.', 'iscp' ), __( 'Improve speed, security, SEO structure and conversion paths.', 'iscp' ), __( 'Support custom theme, plugin and hosting requirements.', 'iscp' ) ),
				'modules'   => array( __( 'Custom theme', 'iscp' ), __( 'Plugin work', 'iscp' ), __( 'SEO setup', 'iscp' ), __( 'Speed tuning', 'iscp' ), __( 'Security', 'iscp' ), __( 'Hosting', 'iscp' ) ),
				'seo_terms' => __( 'WordPress development company, custom WordPress theme, WordPress website design India, WordPress security, managed WordPress hosting', 'iscp' ),
				'cta_title' => __( 'Need a WordPress website?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can build, secure, optimize and host your WordPress presence.', 'iscp' ),
			),
			'ecommerce-development' => array(
				'kicker'    => __( 'Ecommerce systems for selling and operations', 'iscp' ),
				'intro'     => __( 'Indian Servers develops ecommerce websites, catalogs, checkout flows, payment integrations, order dashboards and inventory-connected commerce systems.', 'iscp' ),
				'best_for'  => __( 'Retailers, distributors, D2C brands, B2B catalogs, restaurants, service sellers and businesses moving sales online.', 'iscp' ),
				'outcomes'  => array( __( 'Create product catalogs, cart, checkout and payment workflows.', 'iscp' ), __( 'Connect orders with inventory, CRM, ERP or reporting systems.', 'iscp' ), __( 'Improve reliability, speed, mobile experience and supportability.', 'iscp' ) ),
				'modules'   => array( __( 'Catalog', 'iscp' ), __( 'Cart', 'iscp' ), __( 'Payments', 'iscp' ), __( 'Orders', 'iscp' ), __( 'Inventory', 'iscp' ), __( 'Reports', 'iscp' ) ),
				'seo_terms' => __( 'ecommerce development, online store development India, WooCommerce development, payment gateway integration, ecommerce inventory integration', 'iscp' ),
				'cta_title' => __( 'Need ecommerce development?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can build online selling systems connected to your operations.', 'iscp' ),
			),
			'api-integration' => array(
				'kicker'    => __( 'API and integration services for connected systems', 'iscp' ),
				'intro'     => __( 'Indian Servers connects business software with payment gateways, SMS, WhatsApp, accounting tools, CRM, ERP, LMS, websites and third-party platforms through secure APIs.', 'iscp' ),
				'best_for'  => __( 'Companies with disconnected tools, manual data transfer, payment flows, notification needs or multi-system operations.', 'iscp' ),
				'outcomes'  => array( __( 'Reduce duplicate entry and manual reconciliation.', 'iscp' ), __( 'Connect critical systems through secure and documented APIs.', 'iscp' ), __( 'Enable better automation, reporting and customer communication.', 'iscp' ) ),
				'modules'   => array( __( 'Payment APIs', 'iscp' ), __( 'SMS', 'iscp' ), __( 'WhatsApp', 'iscp' ), __( 'CRM/ERP', 'iscp' ), __( 'Webhooks', 'iscp' ), __( 'Reports', 'iscp' ) ),
				'seo_terms' => __( 'API integration services, payment gateway integration, WhatsApp API integration, CRM ERP integration, third party API development', 'iscp' ),
				'cta_title' => __( 'Need systems connected?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can integrate your software stack so information moves correctly.', 'iscp' ),
			),
			'ui-ux-design' => array(
				'kicker'    => __( 'UI/UX design for usable business software', 'iscp' ),
				'intro'     => __( 'Indian Servers designs product interfaces, dashboards, admin panels, mobile app screens and user journeys for business applications that need clarity, speed and professional polish.', 'iscp' ),
				'best_for'  => __( 'SaaS products, ERP dashboards, mobile apps, customer portals, internal tools and software modernization projects.', 'iscp' ),
				'outcomes'  => array( __( 'Make complex workflows easier for users to understand.', 'iscp' ), __( 'Improve scanability, navigation and task completion.', 'iscp' ), __( 'Create design systems that development teams can implement consistently.', 'iscp' ) ),
				'modules'   => array( __( 'UX flows', 'iscp' ), __( 'Wireframes', 'iscp' ), __( 'UI screens', 'iscp' ), __( 'Dashboards', 'iscp' ), __( 'Design systems', 'iscp' ), __( 'Prototype', 'iscp' ) ),
				'seo_terms' => __( 'UI UX design services, dashboard UI design, SaaS product design, mobile app UI design, business software UX', 'iscp' ),
				'cta_title' => __( 'Need better product design?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can design interfaces that make your software easier to use and sell.', 'iscp' ),
			),
			'devops-monitoring' => array(
				'kicker'    => __( 'DevOps, deployments and monitoring', 'iscp' ),
				'intro'     => __( 'Indian Servers helps teams set up CI/CD, server environments, deployment workflows, backups, uptime monitoring, logs and maintenance operations for reliable software delivery.', 'iscp' ),
				'best_for'  => __( 'Web apps, SaaS platforms, WordPress sites, APIs, business portals and teams that need stable release operations.', 'iscp' ),
				'outcomes'  => array( __( 'Deploy changes with fewer manual steps and lower risk.', 'iscp' ), __( 'Monitor uptime, errors, backups and server health.', 'iscp' ), __( 'Improve handover between development, hosting and support teams.', 'iscp' ) ),
				'modules'   => array( __( 'CI/CD', 'iscp' ), __( 'Servers', 'iscp' ), __( 'Backups', 'iscp' ), __( 'Monitoring', 'iscp' ), __( 'Logs', 'iscp' ), __( 'Maintenance', 'iscp' ) ),
				'seo_terms' => __( 'DevOps services, application monitoring, CI CD setup, server monitoring, cloud maintenance services', 'iscp' ),
				'cta_title' => __( 'Need reliable deployments?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can support DevOps, monitoring and release operations for your systems.', 'iscp' ),
			),
			'software-maintenance' => array(
				'kicker'    => __( 'Software maintenance and long-term support', 'iscp' ),
				'intro'     => __( 'Indian Servers maintains existing software through bug fixing, upgrades, performance tuning, security patches, hosting support, feature improvements and operational assistance.', 'iscp' ),
				'best_for'  => __( 'Businesses with existing websites, ERP, CRM, portals, WordPress projects, custom applications or legacy systems needing dependable support.', 'iscp' ),
				'outcomes'  => array( __( 'Keep existing systems stable, secure and usable.', 'iscp' ), __( 'Improve performance, compatibility and user experience over time.', 'iscp' ), __( 'Plan upgrades and feature changes without disrupting operations.', 'iscp' ) ),
				'modules'   => array( __( 'Bug fixes', 'iscp' ), __( 'Upgrades', 'iscp' ), __( 'Performance', 'iscp' ), __( 'Security patches', 'iscp' ), __( 'Hosting support', 'iscp' ), __( 'Enhancements', 'iscp' ) ),
				'seo_terms' => __( 'software maintenance services, application support, legacy software support, website maintenance, software bug fixing services', 'iscp' ),
				'cta_title' => __( 'Need software support?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can maintain and improve your existing software with a practical support plan.', 'iscp' ),
			),
		);

		if ( 'services' === $group && isset( $service_profiles[ $slug ] ) ) {
			return $service_profiles[ $slug ];
		}

		return array(
			'kicker'    => 'products' === $group ? __( 'Business platform by Indian Servers', 'iscp' ) : __( 'Professional service by Indian Servers', 'iscp' ),
			'intro'     => sprintf(
				/* translators: 1: offering title, 2: offering summary. */
				__( '%1$s from Indian Servers is designed for organizations that need practical technology, secure delivery and dependable support. %2$s', 'iscp' ),
				$item['title'],
				$item['summary']
			),
			'best_for'  => __( 'Growing organizations in India, USA, Dubai, Australia, South Africa, Europe and global delivery markets.', 'iscp' ),
			'outcomes'  => array( __( 'Clear discovery, planning and implementation roadmap.', 'iscp' ), __( 'Secure architecture with scalable delivery practices.', 'iscp' ), __( 'Ongoing support, monitoring and improvement after launch.', 'iscp' ) ),
			'modules'   => array( __( 'Requirement study', 'iscp' ), __( 'Architecture', 'iscp' ), __( 'Development', 'iscp' ), __( 'Testing', 'iscp' ), __( 'Deployment', 'iscp' ), __( 'Support', 'iscp' ) ),
			'seo_terms' => __( 'Indian Servers software development, cloud hosting, AI solutions, VAPT, business software India', 'iscp' ),
			'cta_title' => __( 'Planning a technology project?', 'iscp' ),
			'cta_text'  => __( 'Talk to Indian Servers for a practical solution roadmap, clean implementation and long-term support.', 'iscp' ),
		);
	}
}

if ( ! function_exists( 'iscp_register_offering_rewrites' ) ) {
	/**
	 * Register virtual page URLs.
	 */
	function iscp_register_offering_rewrites() {
		add_rewrite_rule( '^products/?$', 'index.php?iscp_offering_group=products', 'top' );
		add_rewrite_rule( '^products/([^/]+)/?$', 'index.php?iscp_offering_group=products&iscp_offering_slug=$matches[1]', 'top' );
		add_rewrite_rule( '^solutions/?$', 'index.php?iscp_offering_group=products', 'top' );
		add_rewrite_rule( '^solutions/([^/]+)/?$', 'index.php?iscp_offering_group=products&iscp_offering_slug=$matches[1]', 'top' );
		add_rewrite_rule( '^services/?$', 'index.php?iscp_offering_group=services', 'top' );
		add_rewrite_rule( '^services/([^/]+)/?$', 'index.php?iscp_offering_group=services&iscp_offering_slug=$matches[1]', 'top' );
	}
}
add_action( 'init', 'iscp_register_offering_rewrites' );

if ( ! function_exists( 'iscp_register_offering_query_vars' ) ) {
	/**
	 * Register virtual page query vars.
	 */
	function iscp_register_offering_query_vars( $vars ) {
		$vars[] = 'iscp_offering_group';
		$vars[] = 'iscp_offering_slug';

		return $vars;
	}
}
add_filter( 'query_vars', 'iscp_register_offering_query_vars' );

if ( ! function_exists( 'iscp_include_offering_template' ) ) {
	/**
	 * Load the offering template for virtual pages.
	 */
	function iscp_include_offering_template( $template ) {
		$group = get_query_var( 'iscp_offering_group' );
		$slug  = get_query_var( 'iscp_offering_slug' );

		if ( ! $group ) {
			return $template;
		}

		if ( ! $slug ) {
			return get_template_directory() . '/template-offering-index.php';
		}

		if ( ! iscp_get_offering_page( $group, $slug ) ) {
			return $template;
		}

		status_header( 200 );
		return get_template_directory() . '/template-offering.php';
	}
}
add_filter( 'template_include', 'iscp_include_offering_template' );

if ( ! function_exists( 'iscp_flush_offering_rewrites' ) ) {
	/**
	 * Flush rewrite rules when the theme is activated.
	 */
	function iscp_flush_offering_rewrites() {
		iscp_register_offering_rewrites();
		flush_rewrite_rules();
	}
}
add_action( 'after_switch_theme', 'iscp_flush_offering_rewrites' );

if ( ! function_exists( 'iscp_maybe_flush_offering_rewrites' ) ) {
	/**
	 * Flush once after theme updates so new virtual routes work on existing installs.
	 */
	function iscp_maybe_flush_offering_rewrites() {
		$version = '2026-05-22-offering-pages';

		if ( get_option( 'iscp_offering_rewrite_version' ) === $version ) {
			return;
		}

		iscp_register_offering_rewrites();
		flush_rewrite_rules();
		update_option( 'iscp_offering_rewrite_version', $version, false );
	}
}
add_action( 'init', 'iscp_maybe_flush_offering_rewrites', 20 );

if ( ! function_exists( 'iscp_offering_document_title' ) ) {
	/**
	 * Set useful browser titles for virtual pages.
	 */
	function iscp_offering_document_title( $title ) {
		$group = get_query_var( 'iscp_offering_group' );
		$slug  = get_query_var( 'iscp_offering_slug' );

		if ( ! $group ) {
			return $title;
		}

		if ( $slug ) {
			$page = iscp_get_offering_page( $group, $slug );
			return ! empty( $page['title'] ) ? $page['title'] . ' | Indian Servers' : $title;
		}

		return 'products' === $group ? __( 'SaaS Products and Business Software | Indian Servers', 'iscp' ) : __( 'Software Development, Cloud and Cyber Security Services | Indian Servers', 'iscp' );
	}
}
add_filter( 'pre_get_document_title', 'iscp_offering_document_title' );

if ( ! function_exists( 'iscp_get_offering_default_features' ) ) {
	/**
	 * Return shared page feature bullets.
	 */
	function iscp_get_offering_default_features( $group ) {
		if ( 'products' === $group ) {
			return array(
				__( 'Customizable workflows for Indian business operations.', 'iscp' ),
				__( 'Secure roles, dashboards, reports and approvals.', 'iscp' ),
				__( 'Cloud-ready deployment with backup and monitoring options.', 'iscp' ),
				__( 'Integration-ready architecture for payments, SMS, WhatsApp, CRM and ERP systems.', 'iscp' ),
			);
		}

		return array(
			__( 'Discovery, architecture and delivery planning.', 'iscp' ),
			__( 'Experienced development across .NET, PHP, Python, WordPress, cloud and AI stacks.', 'iscp' ),
			__( 'Security, performance and maintainability built into the delivery process.', 'iscp' ),
			__( 'Post-launch support, monitoring and improvement roadmap.', 'iscp' ),
		);
	}
}

if ( ! function_exists( 'iscp_get_offering_icon_path' ) ) {
	/**
	 * Return SVG path data for offering icons.
	 */
	function iscp_get_offering_icon_path( $icon ) {
		$icons = array(
			'code'      => 'M8.7 16.6 4.1 12l4.6-4.6 1.4 1.4L6.9 12l3.2 3.2-1.4 1.4Zm6.6 0-1.4-1.4 3.2-3.2-3.2-3.2 1.4-1.4 4.6 4.6-4.6 4.6ZM12.2 18h-2.1l1.7-12h2.1l-1.7 12Z',
			'web'       => 'M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm0 4v8h16V9H4Zm2-2h2v1H6V7Zm3 0h2v1H9V7Z',
			'mobile'    => 'M8 2h8a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm0 3v14h8V5H8Zm3 11h2v1.6h-2V16Z',
			'ai'        => 'M11 2h2v3h-2V2ZM7 10a5 5 0 0 1 10 0v2.2l2 1.2V19H5v-5.6l2-1.2V10Zm2 0v3.3l-2 1.2V17h10v-2.5l-2-1.2V10a3 3 0 0 0-6 0Zm1 5h2v1.2h-2V15Zm4 0h2v1.2h-2V15Z',
			'ar'        => 'M4 6.5 12 2l8 4.5v9L12 20l-8-4.5v-9Zm2 1.2v6.6l5 2.8v-6.6L6 7.7Zm7 9.4 5-2.8V7.7l-5 2.8v6.6Zm-1-8.3 4.9-2.8L12 3.2 7.1 6 12 8.8Z',
			'cloud'     => 'M5 18.5h14a3 3 0 0 0 .7-5.9 5.8 5.8 0 0 0-11.1-1.8A4 4 0 0 0 5 18.5Zm0-2a2 2 0 0 1 0-4h1.2l.4-1.1a3.8 3.8 0 0 1 7.3 1.2v1.1h2.9a1.8 1.8 0 1 1 0 3.6H5Z',
			'shield'    => 'M12 2 5 5v6c0 4.4 2.8 8.5 7 10 4.2-1.5 7-5.6 7-10V5l-7-3Zm0 2.2 5 2.1V11c0 3.2-1.9 6.2-5 7.7-3.1-1.5-5-4.5-5-7.7V6.3l5-2.1Z',
			'team'      => 'M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm7.5-.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6ZM2.5 20a6.5 6.5 0 0 1 13 0h-2a4.5 4.5 0 0 0-9 0h-2Zm12.8-5.8A5.5 5.5 0 0 1 21.5 20h-2a3.5 3.5 0 0 0-4-3.5l-.2-2.3Z',
			'education' => 'M12 3 2 8l10 5 8-4v6h2V8L12 3Zm0 7.8L6.5 8 12 5.2 17.5 8 12 10.8ZM6 12v4c2.8 2.7 9.2 2.7 12 0v-4l-2 1v2.1c-2 1.3-6 1.3-8 0V13l-2-1Z',
			'crm'       => 'M4 4h16v12H7.5L4 19V4Zm2 2v8.7l.7-.7H18V6H6Zm3 2h6v2H9V8Zm0 3h8v2H9v-2Z',
			'inventory' => 'M4 4h16v5H4V4Zm2 2v1h12V6H6Zm-1 5h14v9H5v-9Zm2 2v5h10v-5H7Zm2 1h6v2H9v-2Z',
			'restaurant' => 'M7 2h2v8H7V2Zm4 0h2v8a4 4 0 0 1-3 3.9V22H8v-8.1A4 4 0 0 1 5 10V2h2v8a2 2 0 1 0 4 0V2Zm7 0h1v20h-2v-7h-3V6a4 4 0 0 1 4-4Z',
			'cube'      => 'M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3zm0 2.3L6 8.7v6.6l6 3.4 6-3.4V8.7l-6-3.4zm0 4.2l3 1.7v3.6l-3 1.7-3-1.7v-3.6l3-1.7z',
			'chart'     => 'M4 19h16v2H2V3h2v16Zm3-2V9h3v8H7Zm5 0V5h3v12h-3Zm5 0v-6h3v6h-3Z',
			'design'    => 'M4 4h16v12H7.6L4 19.2V4Zm2 2v8.8L6.8 14H18V6H6Zm3 2h6v2H9V8Zm0 3h8v2H9v-2Z',
		);

		return isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['cube'];
	}
}

if ( ! function_exists( 'iscp_get_offering_navigation_groups' ) ) {
	/**
	 * Return compact nav groups for menus and pages.
	 */
	function iscp_get_offering_navigation_groups() {
		$pages = iscp_get_editable_offering_pages();

		return array(
			'products' => array_slice( $pages['products']['items'], 0, 10, true ),
			'services' => array_slice( $pages['services']['items'], 0, 14, true ),
		);
	}
}
