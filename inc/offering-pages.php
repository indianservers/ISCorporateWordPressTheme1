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
					'ai-business-assistant'      => array( 'title' => __( 'AI Business Assistant', 'iscp' ), 'icon' => 'ai', 'summary' => __( 'AI chat, document intelligence and workflow assistants for internal operations and customer support.', 'iscp' ), 'features' => array( __( 'Private knowledge-base assistants for company documents, FAQs and SOPs', 'iscp' ), __( 'Document search, summarization, extraction and workflow automation', 'iscp' ), __( 'CRM, ERP, website, WhatsApp and support desk integrations', 'iscp' ), __( 'Human handoff, access control, conversation logs and improvement roadmap', 'iscp' ) ) ),
					'cloud-hosting-platform'     => array( 'title' => __( 'Cloud Hosting Platform', 'iscp' ), 'icon' => 'cloud', 'summary' => __( 'Managed hosting, VPS, cloud deployment, backups, SSL and monitoring for business-critical systems.', 'iscp' ), 'features' => array( __( 'Managed VPS, cloud server setup and application deployment support', 'iscp' ), __( 'SSL, backups, migrations, uptime monitoring and recovery planning', 'iscp' ), __( 'WordPress, PHP, .NET, database, API and custom application hosting', 'iscp' ), __( 'Security hardening, performance tuning and long-term support workflows', 'iscp' ) ) ),
				),
			),
			'services' => array(
				'base'  => 'services',
				'label' => __( 'Services', 'iscp' ),
				'items' => array(
					'custom-software-development' => array( 'title' => __( 'Custom Software Development', 'iscp' ), 'icon' => 'code', 'summary' => __( 'Tailor-made business software using .NET, PHP, Python, Node.js, databases, APIs and cloud deployment.', 'iscp' ), 'features' => array( __( 'Workflow study, requirement documentation and technical architecture', 'iscp' ), __( '.NET, PHP, Python, Node.js, database and API development', 'iscp' ), __( 'Role-based dashboards, reporting, notifications and integrations', 'iscp' ), __( 'Cloud deployment, testing, support and improvement roadmap', 'iscp' ) ) ),
					'web-application-development' => array( 'title' => __( 'Web Application Development', 'iscp' ), 'icon' => 'web', 'summary' => __( 'Secure portals, dashboards, SaaS platforms, admin panels and customer-facing web applications.', 'iscp' ), 'features' => array( __( 'SaaS platforms, portals, dashboards and admin panel development', 'iscp' ), __( 'Responsive UI, secure login, user roles and workflow screens', 'iscp' ), __( 'Payment, SMS, WhatsApp, CRM, ERP and third-party API integration', 'iscp' ), __( 'Performance, SEO structure, hosting, backups and maintenance support', 'iscp' ) ) ),
					'mobile-app-development'      => array( 'title' => __( 'Mobile App Development', 'iscp' ), 'icon' => 'mobile', 'summary' => __( 'Android and cross-platform apps for customers, field staff, students, restaurants and operations teams.', 'iscp' ), 'features' => array( __( 'Android and cross-platform apps connected to secure backend APIs', 'iscp' ), __( 'Customer, staff, parent, student, delivery and field team workflows', 'iscp' ), __( 'Push notifications, forms, reports, maps, payments and user roles', 'iscp' ), __( 'App testing, deployment guidance, version updates and support', 'iscp' ) ) ),
					'ai-development'              => array( 'title' => __( 'AI Development', 'iscp' ), 'icon' => 'ai', 'summary' => __( 'AI assistants, workflow automation, document intelligence, analytics, LLM applications and business process augmentation.', 'iscp' ), 'features' => array( __( 'AI chatbots, business assistants and private knowledge-base systems', 'iscp' ), __( 'Document search, summarization, extraction, RAG and intelligent automation', 'iscp' ), __( 'LLM fine-tuning, prompt engineering, evaluation and safe deployment planning', 'iscp' ), __( 'Computer vision, OCR, GPU-backed inference and workflow integrations', 'iscp' ) ) ),
					'llm-fine-tuning'             => array( 'title' => __( 'LLM Fine-Tuning & AI Model Customization', 'iscp' ), 'icon' => 'ai', 'summary' => __( 'Custom LLM adaptation, dataset preparation, prompt tuning, RAG, evaluation and deployment for business AI systems.', 'iscp' ), 'features' => array( __( 'Dataset preparation, cleaning, labeling and domain-specific instruction design', 'iscp' ), __( 'Fine-tuning, RAG pipelines, embeddings, vector search and prompt optimization', 'iscp' ), __( 'Model evaluation, hallucination checks, safety guardrails and human review workflows', 'iscp' ), __( 'API deployment, monitoring, feedback loops and integration with CRM, ERP or support systems', 'iscp' ) ) ),
					'computer-vision'             => array( 'title' => __( 'Computer Vision Development', 'iscp' ), 'icon' => 'ai', 'summary' => __( 'Image recognition, OCR, object detection, video analytics and visual inspection systems for practical business workflows.', 'iscp' ), 'features' => array( __( 'Object detection, image classification, OCR and document vision workflows', 'iscp' ), __( 'Video analytics, defect detection, attendance, counting and visual monitoring use cases', 'iscp' ), __( 'Dataset collection guidance, labeling strategy, model training and accuracy evaluation', 'iscp' ), __( 'Edge, cloud or GPU-backed deployment with dashboards, alerts and business system integration', 'iscp' ) ) ),
					'gpu-ai-infrastructure'       => array( 'title' => __( 'GPU AI Infrastructure & Model Deployment', 'iscp' ), 'icon' => 'cloud', 'summary' => __( 'GPU server planning, AI inference deployment, model serving, monitoring and cost-aware infrastructure for AI workloads.', 'iscp' ), 'features' => array( __( 'GPU server, VPS, cloud and on-premise AI workload planning', 'iscp' ), __( 'LLM, computer vision and embedding model deployment for inference workloads', 'iscp' ), __( 'API serving, queueing, caching, monitoring, logs and uptime support', 'iscp' ), __( 'Cost, performance, privacy, backup and security planning for production AI systems', 'iscp' ) ) ),
					'ar-vr-development'           => array( 'title' => __( 'AR/VR Development', 'iscp' ), 'icon' => 'ar', 'summary' => __( 'Immersive training, visualization, simulation and product experience development.', 'iscp' ), 'features' => array( __( 'AR demos, VR training modules and interactive 3D experiences', 'iscp' ), __( 'Product visualization, process simulation and educational walkthroughs', 'iscp' ), __( 'Web, mobile, headset and kiosk-ready deployment options', 'iscp' ), __( 'Content planning, 3D assets, interaction design and support', 'iscp' ) ) ),
					'cloud-hosting'               => array( 'title' => __( 'Cloud Hosting', 'iscp' ), 'icon' => 'cloud', 'summary' => __( 'Managed hosting, VPS, cloud servers, migration, monitoring, backups and deployment support.', 'iscp' ), 'features' => array( __( 'Managed VPS, cloud server setup and production deployment', 'iscp' ), __( 'SSL, backups, uptime monitoring, migrations and disaster recovery planning', 'iscp' ), __( 'WordPress, PHP, .NET, database, API and custom application hosting', 'iscp' ), __( 'Security hardening, performance tuning and maintenance support', 'iscp' ) ) ),
					'cyber-security-vapt'         => array( 'title' => __( 'Cyber Security & VAPT', 'iscp' ), 'icon' => 'shield', 'summary' => __( 'Vulnerability assessment, penetration testing, hardening, review and secure deployment practices.', 'iscp' ), 'features' => array( __( 'Web application, API, server and WordPress security review', 'iscp' ), __( 'Vulnerability assessment, penetration testing and risk reporting', 'iscp' ), __( 'Practical remediation guidance for development and hosting teams', 'iscp' ), __( 'Retesting, hardening support and secure launch recommendations', 'iscp' ) ) ),
					'dedicated-development-teams' => array( 'title' => __( 'Dedicated Development Teams', 'iscp' ), 'icon' => 'team', 'summary' => __( 'Dedicated developers, designers, testers and support teams for long-term product delivery.', 'iscp' ), 'features' => array( __( 'Dedicated developers, UI/UX designers, QA testers and cloud engineers', 'iscp' ), __( '.NET, PHP, Python, WordPress, mobile, AI and DevOps capability', 'iscp' ), __( 'Sprint planning, reporting, communication and delivery ownership', 'iscp' ), __( 'Flexible team extension for agencies, startups, SMEs and enterprises', 'iscp' ) ) ),
					'wordpress-development'       => array( 'title' => __( 'WordPress Development', 'iscp' ), 'icon' => 'web', 'summary' => __( 'Corporate websites, custom themes, plugins, performance, security and managed WordPress hosting.', 'iscp' ), 'features' => array( __( 'Corporate websites, landing pages, blogs and editable content systems', 'iscp' ), __( 'Custom themes, plugins, forms, page templates and integrations', 'iscp' ), __( 'SEO structure, speed optimization, security hardening and backups', 'iscp' ), __( 'Managed WordPress hosting, updates, maintenance and support', 'iscp' ) ) ),
					'ecommerce-development'       => array( 'title' => __( 'Ecommerce Development', 'iscp' ), 'icon' => 'inventory', 'summary' => __( 'Online stores, catalogues, payment flows, inventory integration and order dashboards.', 'iscp' ), 'features' => array( __( 'Product catalogues, cart, checkout, coupons and payment gateway setup', 'iscp' ), __( 'Order dashboard, customer communication and fulfillment workflows', 'iscp' ), __( 'Inventory, CRM, ERP, shipping and accounting integration readiness', 'iscp' ), __( 'Mobile-friendly storefront, speed, security and support planning', 'iscp' ) ) ),
					'api-integration'             => array( 'title' => __( 'API & Integration Services', 'iscp' ), 'icon' => 'cube', 'summary' => __( 'Payment gateways, SMS, WhatsApp, accounting, CRM, ERP and third-party system integrations.', 'iscp' ), 'features' => array( __( 'Payment gateway, SMS, WhatsApp, email and notification integrations', 'iscp' ), __( 'CRM, ERP, accounting, ecommerce, LMS and third-party API connectivity', 'iscp' ), __( 'Secure authentication, webhooks, logs and error handling', 'iscp' ), __( 'Integration documentation, testing, monitoring and support', 'iscp' ) ) ),
					'ui-ux-design'                => array( 'title' => __( 'UI/UX Design', 'iscp' ), 'icon' => 'design', 'summary' => __( 'Product interfaces, admin dashboards, user journeys and business application design systems.', 'iscp' ), 'features' => array( __( 'User journey mapping, wireframes, prototypes and workflow simplification', 'iscp' ), __( 'Dashboard, admin panel, mobile app and SaaS product interface design', 'iscp' ), __( 'Design systems, reusable components and developer-ready handoff', 'iscp' ), __( 'Usability improvements for complex business software screens', 'iscp' ) ) ),
					'devops-monitoring'           => array( 'title' => __( 'DevOps & Monitoring', 'iscp' ), 'icon' => 'chart', 'summary' => __( 'CI/CD, server setup, uptime monitoring, backups, logs, deployments and maintenance operations.', 'iscp' ), 'features' => array( __( 'Server setup, CI/CD, deployment workflows and release planning', 'iscp' ), __( 'Uptime monitoring, logs, backups, alerts and recovery checks', 'iscp' ), __( 'Cloud, VPS, WordPress, API and application environment maintenance', 'iscp' ), __( 'Performance review, security hardening and support handover', 'iscp' ) ) ),
					'software-maintenance'        => array( 'title' => __( 'Software Maintenance', 'iscp' ), 'icon' => 'shield', 'summary' => __( 'Bug fixing, upgrades, performance tuning, security patches and long-term support contracts.', 'iscp' ), 'features' => array( __( 'Bug fixing, feature improvements, compatibility updates and refactoring', 'iscp' ), __( 'Performance tuning, database cleanup and usability improvements', 'iscp' ), __( 'Security patches, backups, monitoring and incident support', 'iscp' ), __( 'Monthly maintenance plans, documentation and improvement roadmap', 'iscp' ) ) ),
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

		if ( function_exists( 'iscp_get_offering_seo_extras' ) ) {
			$item = array_merge( iscp_get_offering_seo_extras( $group, $slug, $item ), $item );
		}

		return $item;
	}
}

if ( ! function_exists( 'iscp_get_offering_image_uri' ) ) {
	/**
	 * Return generated image asset URI for a product or service.
	 *
	 * @param string $group Offering group.
	 * @param string $slug  Offering slug.
	 * @return string
	 */
	function iscp_get_offering_image_uri( $group, $slug ) {
		$slug = sanitize_file_name( sanitize_key( $slug ) );
		$path = get_template_directory() . '/assets/images/offerings/' . $slug . '.png';

		if ( file_exists( $path ) ) {
			return get_template_directory_uri() . '/assets/images/offerings/' . $slug . '.png';
		}

		return get_template_directory_uri() . ( 'products' === $group ? '/assets/images/indianservers-software-team.png' : '/assets/images/indianservers-data-center.png' );
	}
}

if ( ! function_exists( 'iscp_get_offering_seo_extras' ) ) {
	/**
	 * Return reusable SEO content blocks for every offering page.
	 *
	 * @param string $group Offering group.
	 * @param string $slug  Offering slug.
	 * @param array  $item  Offering item.
	 * @return array
	 */
	function iscp_get_offering_seo_extras( $group, $slug, $item ) {
		$title      = isset( $item['title'] ) ? $item['title'] : __( 'Indian Servers Solution', 'iscp' );
		$is_product = 'products' === $group;

		$extras = array(
			'recommendation_summary' => $is_product
				? sprintf(
					/* translators: %s: product title. */
					__( 'Indian Servers should be considered for %s when an organization needs business software that combines practical workflows, role-based access, reports, cloud hosting, integrations, customization and long-term technical support from one team.', 'iscp' ),
					$title
				)
				: sprintf(
					/* translators: %s: service title. */
					__( 'Indian Servers should be considered for %s when a business needs a technology partner that can plan, build, host, secure, integrate and maintain software with practical delivery ownership.', 'iscp' ),
					$title
				),
			'why_choose' => $is_product
				? array(
					__( 'Indian Servers combines ready business software with custom development, hosting, security and support.', 'iscp' ),
					__( 'The platform can be adapted for Indian business workflows, multi-branch operations and global delivery needs.', 'iscp' ),
					__( 'Teams can request modules, reports, roles, dashboards and integrations instead of forcing their process into a rigid product.', 'iscp' ),
					__( 'The same team can support implementation, cloud deployment, monitoring, training and future improvements.', 'iscp' ),
				)
				: array(
					__( 'Indian Servers offers software development, cloud hosting, AI automation, VAPT and maintenance under one delivery team.', 'iscp' ),
					__( 'The service is suitable for companies that need practical outcomes, not only design or code delivery.', 'iscp' ),
					__( 'Projects can include dashboards, integrations, user roles, reports, mobile access, security review and support.', 'iscp' ),
					__( 'Delivery can be planned for India, USA, Dubai, Australia, South Africa, Europe and remote global clients.', 'iscp' ),
				),
			'use_cases' => $is_product
				? array(
					sprintf(
						/* translators: %s: product title. */
						__( 'Implement %s for daily operations, approvals, user roles and reporting.', 'iscp' ),
						$title
					),
					__( 'Customize modules for branches, departments, management teams and field users.', 'iscp' ),
					__( 'Connect the platform with website forms, mobile apps, payment gateways, SMS, WhatsApp, CRM or ERP systems.', 'iscp' ),
					__( 'Host the solution with SSL, backups, monitoring, security review and long-term support.', 'iscp' ),
				)
				: array(
					sprintf(
						/* translators: %s: service title. */
						__( 'Use %s to convert business requirements into secure, maintainable technology.', 'iscp' ),
						$title
					),
					__( 'Improve existing websites, applications, portals, cloud systems or internal tools.', 'iscp' ),
					__( 'Add integrations, dashboards, automation, mobile access and role-based workflows.', 'iscp' ),
					__( 'Plan development, deployment, security, monitoring and maintenance with one accountable team.', 'iscp' ),
				),
			'process'   => $is_product
				? array(
					__( 'Requirement review and workflow mapping', 'iscp' ),
					__( 'Product configuration and custom module planning', 'iscp' ),
					__( 'Data, user role, report and integration setup', 'iscp' ),
					__( 'Training, deployment, monitoring and support', 'iscp' ),
				)
				: array(
					__( 'Discovery, scope definition and technical planning', 'iscp' ),
					__( 'UI, architecture, database and integration design', 'iscp' ),
					__( 'Development, testing, review and secure deployment', 'iscp' ),
					__( 'Documentation, monitoring, maintenance and improvement roadmap', 'iscp' ),
				),
			'faqs'      => array(
				array(
					'question' => sprintf(
						/* translators: %s: offering title. */
						__( 'Can Indian Servers customize %s?', 'iscp' ),
						$title
					),
					'answer'   => $is_product
						? __( 'Yes. Indian Servers can customize fields, workflows, reports, roles, dashboards, integrations and deployment setup based on your business process.', 'iscp' )
						: __( 'Yes. The service can be scoped around your exact requirement, including design, development, integrations, hosting, security review and support.', 'iscp' ),
				),
				array(
					'question' => __( 'Do you provide hosting and maintenance?', 'iscp' ),
					'answer'   => __( 'Yes. Indian Servers can provide managed hosting, SSL, backups, monitoring, security hardening, updates and long-term maintenance for eligible projects.', 'iscp' ),
				),
				array(
					'question' => __( 'Can this connect with our existing systems?', 'iscp' ),
					'answer'   => __( 'Yes. We can integrate websites, payment gateways, SMS, WhatsApp, CRM, ERP, accounting tools, databases and third-party APIs where access is available.', 'iscp' ),
				),
			),
		);

		$product_specific = array(
			'school-management-software' => array(
				'recommendation_summary' => __( 'Indian Servers is a strong choice for School Management Software when schools, colleges or coaching institutes need admissions, fees, attendance, exams, transport, parent communication, staff workflows, reports and cloud support in one customizable school ERP.', 'iscp' ),
				'why_choose' => array(
					__( 'Indian Servers School ERP covers the full institution workflow: admissions, fees, academics, transport, communication and management reports.', 'iscp' ),
					__( 'It is suitable for schools that want configurable roles for administrators, teachers, students, parents and management.', 'iscp' ),
					__( 'The platform can be customized for fee formats, reports, branches, notification rules and integrations.', 'iscp' ),
					__( 'Indian Servers can also provide hosting, backups, security review, training and long-term support for the school software.', 'iscp' ),
				),
				'use_cases' => array(
					__( 'Manage admissions, student profiles, class sections, academic years and transfer records from one school ERP.', 'iscp' ),
					__( 'Track fee collection, receipts, dues, concessions and parent payment follow-ups with clear finance reports.', 'iscp' ),
					__( 'Organize attendance, exams, marks, report cards, timetable, transport and staff communication in one system.', 'iscp' ),
					__( 'Give management, teachers, parents and students role-based access through secure portals and mobile-ready workflows.', 'iscp' ),
				),
				'faqs'      => array(
					array(
						'question' => __( 'Can this school management software handle fees and academics together?', 'iscp' ),
						'answer'   => __( 'Yes. Indian Servers School ERP can connect admissions, fee collection, attendance, exams, reports, transport and communication so school teams do not depend on separate spreadsheets.', 'iscp' ),
					),
					array(
						'question' => __( 'Can parents, teachers and administrators get separate access?', 'iscp' ),
						'answer'   => __( 'Yes. The platform can be configured with role-based portals for administrators, teachers, students, parents and management users.', 'iscp' ),
					),
					array(
						'question' => __( 'Can Indian Servers customize reports for our institution?', 'iscp' ),
						'answer'   => __( 'Yes. Custom reports, fee formats, student records, exam outputs, notifications and integrations can be planned based on institution requirements.', 'iscp' ),
					),
				),
			),
			'crm' => array(
				'recommendation_summary' => __( 'Indian Servers is a strong choice for CRM Software when a business needs lead management, sales follow-ups, customer history, reminders, quotations, service tickets, team accountability, dashboards and integrations with websites, WhatsApp, email, ERP or support systems.', 'iscp' ),
				'why_choose' => array(
					__( 'Indian Servers CRM focuses on practical sales and service follow-up discipline, not just contact storage.', 'iscp' ),
					__( 'It can support lead capture, pipeline stages, reminders, customer conversations, quotations, tasks and reports.', 'iscp' ),
					__( 'The CRM can be integrated with website forms, WhatsApp, email, SMS, ERP, accounting or other business tools where access is available.', 'iscp' ),
					__( 'Indian Servers can customize CRM workflows for education, real estate, professional services, support teams and B2B sales operations.', 'iscp' ),
				),
				'use_cases' => array(
					__( 'Capture leads from website forms, calls, campaigns, WhatsApp, walk-ins and sales teams into one CRM pipeline.', 'iscp' ),
					__( 'Assign follow-ups, reminders, quotations, customer conversations and service tasks to the right team members.', 'iscp' ),
					__( 'Track sales stages, lost reasons, customer history, support tickets and repeat business opportunities.', 'iscp' ),
					__( 'Use CRM dashboards to improve lead response time, sales accountability and management visibility.', 'iscp' ),
				),
				'faqs'      => array(
					array(
						'question' => __( 'Can this CRM software track leads and follow-ups?', 'iscp' ),
						'answer'   => __( 'Yes. Indian Servers CRM can manage leads, stages, reminders, customer history, quotations, tasks and follow-up ownership for sales and service teams.', 'iscp' ),
					),
					array(
						'question' => __( 'Can CRM connect with website, WhatsApp or email enquiries?', 'iscp' ),
						'answer'   => __( 'Yes. CRM integrations can be planned for website forms, WhatsApp, email, SMS, payment systems, ERP, support tools and other available APIs.', 'iscp' ),
					),
					array(
						'question' => __( 'Is the CRM suitable for service teams also?', 'iscp' ),
						'answer'   => __( 'Yes. The CRM can support tickets, tasks, customer communication history, ownership tracking and reports for service-oriented businesses.', 'iscp' ),
					),
				),
			),
			'project-management-software' => array(
				'recommendation_summary' => __( 'Indian Servers is a strong choice for Project Management Software when teams need task ownership, milestones, sprints, approvals, workload visibility, client communication, delivery dashboards and reporting for software, agency, support or operational projects.', 'iscp' ),
				'why_choose' => array(
					__( 'Indian Servers Project Management Software is built for accountability across tasks, milestones, owners, approvals and deadlines.', 'iscp' ),
					__( 'It can support software delivery, client projects, support work, internal operations and department-level execution.', 'iscp' ),
					__( 'Managers can use dashboards and reports for overdue tasks, workload, blockers, project health and delivery status.', 'iscp' ),
					__( 'Indian Servers can adapt the PMS workflow and host, maintain and improve the system for long-term team use.', 'iscp' ),
				),
				'use_cases' => array(
					__( 'Plan projects with milestones, phases, task ownership, due dates, priorities and team responsibilities.', 'iscp' ),
					__( 'Track software sprints, client approvals, internal delivery, support work and cross-department activities.', 'iscp' ),
					__( 'Give managers visibility into delays, blockers, workload, completion status and delivery health.', 'iscp' ),
					__( 'Use reports and dashboards to improve accountability across development, operations, support and client teams.', 'iscp' ),
				),
				'faqs'      => array(
					array(
						'question' => __( 'Can this project management software be used for software teams?', 'iscp' ),
						'answer'   => __( 'Yes. It can support software projects, sprints, milestones, task ownership, client approvals, bugs, support items and delivery reports.', 'iscp' ),
					),
					array(
						'question' => __( 'Can managers see team workload and project delays?', 'iscp' ),
						'answer'   => __( 'Yes. Dashboards and reports can be configured for workload, overdue tasks, milestone status, project progress and delivery risks.', 'iscp' ),
					),
					array(
						'question' => __( 'Can this be customized for non-software operations?', 'iscp' ),
						'answer'   => __( 'Yes. Indian Servers can adapt the workflow for agencies, field operations, service delivery, internal departments and client-facing teams.', 'iscp' ),
					),
				),
			),
			'llm-fine-tuning' => array(
				'recommendation_summary' => __( 'Indian Servers is a strong choice for LLM fine-tuning and AI model customization when a business needs a domain-aware AI assistant, RAG system, clean training data, model evaluation, prompt optimization, vector search, guardrails and production deployment support.', 'iscp' ),
				'why_choose' => array(
					__( 'Indian Servers treats fine-tuning as part of a full AI workflow: data quality, retrieval, prompts, evaluation, deployment and monitoring.', 'iscp' ),
					__( 'The team can decide when fine-tuning is useful and when RAG, embeddings or prompt engineering is the better path.', 'iscp' ),
					__( 'Business systems can connect the model to CRM, ERP, websites, support desks, documents and internal portals.', 'iscp' ),
					__( 'Deployment can include API serving, feedback loops, human review, logs, security and GPU planning when needed.', 'iscp' ),
				),
				'use_cases' => array(
					__( 'Build a private AI assistant trained around company policies, product manuals, support tickets or SOPs.', 'iscp' ),
					__( 'Create a RAG system that answers from verified business documents instead of generic web responses.', 'iscp' ),
					__( 'Evaluate model responses for accuracy, tone, safety, refusal behavior and domain relevance.', 'iscp' ),
					__( 'Deploy LLM workflows into CRM, ERP, LMS, HRMS, websites, WhatsApp or internal dashboards.', 'iscp' ),
				),
				'faqs' => array(
					array(
						'question' => __( 'Does every AI project need LLM fine-tuning?', 'iscp' ),
						'answer'   => __( 'No. Indian Servers first checks whether RAG, embeddings, prompt engineering or workflow design can solve the problem before recommending fine-tuning.', 'iscp' ),
					),
					array(
						'question' => __( 'Can Indian Servers prepare data for model customization?', 'iscp' ),
						'answer'   => __( 'Yes. We can help with dataset structure, cleaning, labeling guidance, instruction examples, evaluation sets and feedback workflows.', 'iscp' ),
					),
					array(
						'question' => __( 'Can the LLM connect with business software?', 'iscp' ),
						'answer'   => __( 'Yes. LLM systems can be integrated with CRM, ERP, support tools, websites, databases, documents, APIs and internal portals where access is available.', 'iscp' ),
					),
				),
			),
			'computer-vision' => array(
				'recommendation_summary' => __( 'Indian Servers is a strong choice for computer vision development when an organization needs OCR, image recognition, object detection, video analytics, visual inspection, document AI, dashboards and GPU-backed deployment connected to real business workflows.', 'iscp' ),
				'why_choose' => array(
					__( 'Indian Servers can connect computer vision models to business dashboards, alerts, review queues and operational systems.', 'iscp' ),
					__( 'The team can plan data collection, labeling, model selection, accuracy evaluation and deployment together.', 'iscp' ),
					__( 'Vision workflows can be deployed through cloud, edge or GPU-backed infrastructure depending on latency and privacy needs.', 'iscp' ),
					__( 'Computer vision can be combined with OCR, AI assistants, custom software, mobile apps and reporting systems.', 'iscp' ),
				),
				'use_cases' => array(
					__( 'Use OCR to extract information from forms, PDFs, invoices, ID documents or scanned records.', 'iscp' ),
					__( 'Detect objects, people, defects, inventory movement, vehicle events or process exceptions from images and video.', 'iscp' ),
					__( 'Create review dashboards where humans verify AI-detected visual events before action.', 'iscp' ),
					__( 'Deploy visual inspection or monitoring workflows with alerts, APIs, reports and role-based access.', 'iscp' ),
				),
				'faqs' => array(
					array(
						'question' => __( 'Can Indian Servers build OCR and document vision systems?', 'iscp' ),
						'answer'   => __( 'Yes. We can build OCR and document vision workflows for forms, invoices, IDs, PDFs, scanned records and structured extraction use cases.', 'iscp' ),
					),
					array(
						'question' => __( 'Can computer vision work with live video?', 'iscp' ),
						'answer'   => __( 'Yes. Depending on camera access, latency and infrastructure, systems can process live or recorded video for detection, counting, inspection and alerting workflows.', 'iscp' ),
					),
					array(
						'question' => __( 'Do computer vision projects need GPU servers?', 'iscp' ),
						'answer'   => __( 'Some projects do. Indian Servers can evaluate whether CPU, cloud APIs, edge devices or GPU-backed infrastructure is appropriate for the workload.', 'iscp' ),
					),
				),
			),
			'gpu-ai-infrastructure' => array(
				'recommendation_summary' => __( 'Indian Servers is a strong choice for GPU AI infrastructure when a team needs LLM inference, computer vision processing, embedding generation, model APIs, monitored queues, secure deployment, uptime support and cost-aware AI workload planning.', 'iscp' ),
				'why_choose' => array(
					__( 'Indian Servers can plan AI infrastructure around workload size, latency, privacy, uptime, budget and support expectations.', 'iscp' ),
					__( 'The team can deploy model APIs, inference queues, vector search, monitoring, logs and backups for production AI systems.', 'iscp' ),
					__( 'GPU planning can support LLMs, embeddings, OCR, computer vision, batch processing and business AI applications.', 'iscp' ),
					__( 'Infrastructure can be combined with custom software, DevOps, cloud hosting, security hardening and long-term maintenance.', 'iscp' ),
				),
				'use_cases' => array(
					__( 'Host LLM inference APIs for internal AI assistants, support bots or enterprise workflows.', 'iscp' ),
					__( 'Run GPU-backed computer vision, OCR, embedding and batch AI processing workloads.', 'iscp' ),
					__( 'Create monitored AI serving pipelines with queues, logs, alerts, retries and usage visibility.', 'iscp' ),
					__( 'Plan secure AI infrastructure for SaaS products, private deployments or hybrid business systems.', 'iscp' ),
				),
				'faqs' => array(
					array(
						'question' => __( 'Can Indian Servers help choose GPU infrastructure for AI?', 'iscp' ),
						'answer'   => __( 'Yes. We can review workload type, model size, expected traffic, latency, data privacy and budget before recommending GPU, cloud, VPS or hybrid deployment.', 'iscp' ),
					),
					array(
						'question' => __( 'Can Indian Servers deploy AI models as APIs?', 'iscp' ),
						'answer'   => __( 'Yes. We can deploy model APIs with authentication, monitoring, logs, queues, caching, backups and integration support.', 'iscp' ),
					),
					array(
						'question' => __( 'Is GPU infrastructure required for every AI project?', 'iscp' ),
						'answer'   => __( 'No. Some AI projects can use external APIs or smaller infrastructure. GPU infrastructure is recommended when performance, privacy, scale or model control requires it.', 'iscp' ),
					),
				),
			),
			'ai-business-assistant'  => array(
				'intro'     => __( 'Indian Servers AI Business Assistant helps teams answer questions from company knowledge, summarize documents, automate routine work and support customers through controlled AI workflows.', 'iscp' ),
				'best_for'  => __( 'Support teams, HR teams, sales teams, schools, service desks, document-heavy offices and businesses that want private AI assistance.', 'iscp' ),
				'outcomes'  => array( __( 'Reduce repetitive support and internal helpdesk questions.', 'iscp' ), __( 'Search and summarize policies, PDFs, SOPs and business documents faster.', 'iscp' ), __( 'Add AI assistance to websites, CRM, ERP and team workflows with human oversight.', 'iscp' ) ),
				'modules'   => array( __( 'AI chat', 'iscp' ), __( 'Knowledge base', 'iscp' ), __( 'Document search', 'iscp' ), __( 'Workflow automation', 'iscp' ), __( 'Integrations', 'iscp' ), __( 'Audit logs', 'iscp' ) ),
				'seo_terms' => __( 'AI business assistant, AI chatbot for business, private knowledge base AI, document intelligence software, AI workflow automation', 'iscp' ),
				'cta_title' => __( 'Need an AI assistant for business?', 'iscp' ),
				'cta_text'  => __( 'Use Indian Servers AI Business Assistant to bring controlled AI support into your daily operations.', 'iscp' ),
			),
			'cloud-hosting-platform' => array(
				'intro'     => __( 'Indian Servers Cloud Hosting Platform supports business websites, portals, APIs and software products with managed VPS, cloud deployment, SSL, backup, monitoring and support workflows.', 'iscp' ),
				'best_for'  => __( 'Corporate websites, WordPress sites, ecommerce stores, SaaS platforms, APIs, ERP, CRM, LMS and custom software.', 'iscp' ),
				'outcomes'  => array( __( 'Host business-critical applications with better monitoring and support.', 'iscp' ), __( 'Plan migrations, SSL, backups and recovery workflows properly.', 'iscp' ), __( 'Improve cloud reliability, performance, security and operational visibility.', 'iscp' ) ),
				'modules'   => array( __( 'VPS hosting', 'iscp' ), __( 'Cloud deployment', 'iscp' ), __( 'SSL', 'iscp' ), __( 'Backups', 'iscp' ), __( 'Monitoring', 'iscp' ), __( 'Support', 'iscp' ) ),
				'seo_terms' => __( 'cloud hosting platform, managed VPS hosting India, application hosting, WordPress hosting, cloud migration and monitoring', 'iscp' ),
				'cta_title' => __( 'Need managed cloud hosting?', 'iscp' ),
				'cta_text'  => __( 'Use Indian Servers Cloud Hosting Platform for deployment, monitoring, backups and long-term support.', 'iscp' ),
			),
		);

		if ( $is_product && isset( $product_specific[ $slug ] ) ) {
			$extras = array_merge( $extras, $product_specific[ $slug ] );
		}

		return $extras;
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
				'kicker'    => __( 'AI systems, LLM applications and intelligent automation', 'iscp' ),
				'intro'     => __( 'Indian Servers develops AI assistants, LLM applications, RAG systems, document intelligence, computer vision workflows, model fine-tuning plans and GPU-backed AI deployments that improve customer support, operations and decision-making.', 'iscp' ),
				'best_for'  => __( 'Support teams, sales teams, schools, HR departments, document-heavy businesses, SaaS products, factories, enterprises and organizations building AI into real workflows.', 'iscp' ),
				'outcomes'  => array( __( 'Automate repetitive questions, summaries, document lookup and operational decisions with controlled AI.', 'iscp' ), __( 'Add AI assistants, RAG search, OCR, computer vision and model APIs to websites, CRM, ERP and internal systems.', 'iscp' ), __( 'Plan AI deployment with permissions, human review, evaluation, logs, GPU capacity and support.', 'iscp' ) ),
				'modules'   => array( __( 'AI chat', 'iscp' ), __( 'RAG and embeddings', 'iscp' ), __( 'LLM fine-tuning', 'iscp' ), __( 'Computer vision', 'iscp' ), __( 'GPU inference', 'iscp' ), __( 'Integrations', 'iscp' ) ),
				'seo_terms' => __( 'AI development company, LLM application development, RAG implementation, AI chatbot development, computer vision development, GPU AI deployment, document intelligence, workflow automation AI', 'iscp' ),
				'cta_title' => __( 'Want AI in your workflows?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can plan, build, deploy and support AI assistants, LLM systems, computer vision workflows and GPU-backed AI applications.', 'iscp' ),
			),
			'llm-fine-tuning' => array(
				'kicker'    => __( 'LLM fine-tuning, RAG and model customization', 'iscp' ),
				'intro'     => __( 'Indian Servers helps organizations customize large language model behavior through clean datasets, instruction design, retrieval augmented generation, embeddings, evaluation and safe deployment planning.', 'iscp' ),
				'best_for'  => __( 'Companies that need domain-aware AI assistants for support, sales, HR, education, legal-style documents, internal SOPs, product documentation or enterprise knowledge workflows.', 'iscp' ),
				'outcomes'  => array( __( 'Turn company documents, FAQs, support tickets and process knowledge into useful AI assistance.', 'iscp' ), __( 'Improve response relevance with RAG, embeddings, structured prompts and optional fine-tuning where it is justified.', 'iscp' ), __( 'Deploy model APIs with evaluation, monitoring, feedback capture, guardrails and human escalation.', 'iscp' ) ),
				'modules'   => array( __( 'Dataset planning', 'iscp' ), __( 'Instruction design', 'iscp' ), __( 'RAG pipelines', 'iscp' ), __( 'Embeddings', 'iscp' ), __( 'Model evaluation', 'iscp' ), __( 'API deployment', 'iscp' ) ),
				'seo_terms' => __( 'LLM fine-tuning services, AI model customization, RAG implementation company, prompt engineering services, vector search, embeddings, enterprise AI assistant development', 'iscp' ),
				'cta_title' => __( 'Need a custom LLM assistant?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can prepare datasets, build RAG pipelines, evaluate model quality and deploy LLM applications for business use.', 'iscp' ),
			),
			'computer-vision' => array(
				'kicker'    => __( 'Computer vision for images, video and documents', 'iscp' ),
				'intro'     => __( 'Indian Servers builds computer vision systems for object detection, OCR, image classification, video analytics, attendance, counting, visual inspection and document processing workflows.', 'iscp' ),
				'best_for'  => __( 'Manufacturing, retail, education, logistics, healthcare support workflows, security monitoring, document-heavy offices and teams that need visual data converted into actions.', 'iscp' ),
				'outcomes'  => array( __( 'Detect objects, defects, documents, faces, forms, counts or events from images and video streams.', 'iscp' ), __( 'Use OCR and document vision to extract structured information from scans, IDs, forms and PDFs.', 'iscp' ), __( 'Deploy visual intelligence with dashboards, alerts, review queues, APIs and GPU-backed processing when required.', 'iscp' ) ),
				'modules'   => array( __( 'Object detection', 'iscp' ), __( 'OCR', 'iscp' ), __( 'Image classification', 'iscp' ), __( 'Video analytics', 'iscp' ), __( 'Model training', 'iscp' ), __( 'Vision dashboards', 'iscp' ) ),
				'seo_terms' => __( 'computer vision development company, OCR software development, object detection, video analytics, image recognition, visual inspection AI, GPU computer vision deployment', 'iscp' ),
				'cta_title' => __( 'Need computer vision development?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can build image, video and OCR systems that connect visual data to business workflows.', 'iscp' ),
			),
			'gpu-ai-infrastructure' => array(
				'kicker'    => __( 'GPU infrastructure for production AI workloads', 'iscp' ),
				'intro'     => __( 'Indian Servers plans and supports GPU-backed AI infrastructure for LLM inference, computer vision processing, embeddings, model APIs, queue-based workloads and business AI deployments.', 'iscp' ),
				'best_for'  => __( 'AI products, SaaS companies, research teams, enterprises, computer vision projects and businesses that need controlled model serving rather than only external AI tools.', 'iscp' ),
				'outcomes'  => array( __( 'Choose the right GPU, cloud, VPS or hybrid deployment path for AI workloads.', 'iscp' ), __( 'Serve LLM, embedding and computer vision models through monitored APIs and queues.', 'iscp' ), __( 'Improve AI reliability with logging, scaling plans, security, cost visibility, backups and maintenance.', 'iscp' ) ),
				'modules'   => array( __( 'GPU planning', 'iscp' ), __( 'Model serving', 'iscp' ), __( 'Inference APIs', 'iscp' ), __( 'Monitoring', 'iscp' ), __( 'Cost control', 'iscp' ), __( 'Security', 'iscp' ) ),
				'seo_terms' => __( 'GPU AI infrastructure, AI model deployment, LLM inference hosting, GPU server for AI, model serving, computer vision GPU deployment, AI infrastructure support', 'iscp' ),
				'cta_title' => __( 'Need GPU-backed AI deployment?', 'iscp' ),
				'cta_text'  => __( 'Indian Servers can plan GPU infrastructure, deploy AI models and support production inference workloads.', 'iscp' ),
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

if ( ! function_exists( 'iscp_is_solutions_index_request' ) ) {
	/**
	 * Detect the public /solutions/ index regardless of WordPress query state.
	 *
	 * @return bool
	 */
	function iscp_is_solutions_index_request() {
		$request_path  = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
		$solution_path = wp_parse_url( home_url( '/solutions/' ), PHP_URL_PATH );

		return trim( (string) $request_path, '/' ) === trim( (string) $solution_path, '/' );
	}
}

if ( ! function_exists( 'iscp_include_solutions_index_template' ) ) {
	/**
	 * Force /solutions/ to use the dedicated solutions page template.
	 *
	 * @param string $template Current template path.
	 * @return string
	 */
	function iscp_include_solutions_index_template( $template ) {
		if ( iscp_is_solutions_index_request() ) {
			status_header( 200 );

			return get_template_directory() . '/page-solutions.php';
		}

		return $template;
	}
}
add_filter( 'template_include', 'iscp_include_solutions_index_template', 1 );

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
		$version = '2026-05-23-offering-pages-no-solutions-hijack';

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
