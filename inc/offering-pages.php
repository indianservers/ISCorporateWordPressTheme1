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

				foreach ( array( 'title', 'summary' ) as $field ) {
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
		$item['url']   = home_url( '/' . $pages[ $group ]['base'] . '/' . $slug . '/' );

		return $item;
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
			return ! empty( $page['title'] ) ? $page['title'] . ' - Indian Servers' : $title;
		}

		return 'products' === $group ? __( 'Indian Servers Products', 'iscp' ) : __( 'Indian Servers Services', 'iscp' );
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
