<?php
/**
 * Products and solutions page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_product_image = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';
$iscp_is_solutions_page = is_page( 'solutions' ) || is_post_type_archive( 'iscp_solution' );
$iscp_solution_cards = array(
	array(
		'need'        => __( 'Are you looking for school software?', 'iscp' ),
		'solution'    => __( 'Use Indian Servers School ERP', 'iscp' ),
		'description' => __( 'Admissions, fees, attendance, exams, transport, parent communication and institution dashboards in one practical platform.', 'iscp' ),
		'icon'        => 'education',
		'url'         => home_url( '/products/school-management-software/' ),
		'type'        => __( 'Education', 'iscp' ),
	),
	array(
		'need'        => __( 'Need HR, attendance and payroll control?', 'iscp' ),
		'solution'    => __( 'Use Indian Servers HRMS Software', 'iscp' ),
		'description' => __( 'Employee records, leave workflows, attendance, onboarding, approval tracking and HR reporting for growing teams.', 'iscp' ),
		'icon'        => 'team',
		'url'         => home_url( '/products/hrms/' ),
		'type'        => __( 'People Ops', 'iscp' ),
	),
	array(
		'need'        => __( 'Want to manage leads and customers better?', 'iscp' ),
		'solution'    => __( 'Use Indian Servers CRM Software', 'iscp' ),
		'description' => __( 'Lead pipelines, follow-ups, customer history, sales visibility and service tracking for active business teams.', 'iscp' ),
		'icon'        => 'crm',
		'url'         => home_url( '/products/crm/' ),
		'type'        => __( 'Sales', 'iscp' ),
	),
	array(
		'need'        => __( 'Struggling with stock, purchase and warehouse flow?', 'iscp' ),
		'solution'    => __( 'Use Inventory Management Software', 'iscp' ),
		'description' => __( 'Track stock, purchases, sales, vendors, branches, warehouses and business reports with clean operational visibility.', 'iscp' ),
		'icon'        => 'inventory',
		'url'         => home_url( '/products/inventory-management-software/' ),
		'type'        => __( 'Operations', 'iscp' ),
	),
	array(
		'need'        => __( 'Running a restaurant, cafe or food outlet?', 'iscp' ),
		'solution'    => __( 'Use Restaurant POS Software', 'iscp' ),
		'description' => __( 'Billing, KOT, table orders, menu control, kitchen flow, inventory usage and branch sales reporting.', 'iscp' ),
		'icon'        => 'restaurant',
		'url'         => home_url( '/products/restaurant-pos-software/' ),
		'type'        => __( 'Hospitality', 'iscp' ),
	),
	array(
		'need'        => __( 'Need ERP for purchase, sales and accounts?', 'iscp' ),
		'solution'    => __( 'Use Vyapara ERP', 'iscp' ),
		'description' => __( 'A practical ERP foundation for SMEs that need purchase, sales, inventory, billing, staff and reporting in one place.', 'iscp' ),
		'icon'        => 'cube',
		'url'         => home_url( '/products/vyapara-erp/' ),
		'type'        => __( 'ERP', 'iscp' ),
	),
	array(
		'need'        => __( 'Planning online courses or training programs?', 'iscp' ),
		'solution'    => __( 'Use Learning Management System', 'iscp' ),
		'description' => __( 'Courses, batches, tests, certificates, learner progress, trainer dashboards and digital training delivery.', 'iscp' ),
		'icon'        => 'education',
		'url'         => home_url( '/products/learning-management-system/' ),
		'type'        => __( 'Learning', 'iscp' ),
	),
	array(
		'need'        => __( 'Need to track projects and delivery health?', 'iscp' ),
		'solution'    => __( 'Use Project Management Software', 'iscp' ),
		'description' => __( 'Tasks, milestones, ownership, client communication, reports and delivery dashboards for internal and client work.', 'iscp' ),
		'icon'        => 'chart',
		'url'         => home_url( '/products/project-management-software/' ),
		'type'        => __( 'Delivery', 'iscp' ),
	),
	array(
		'need'        => __( 'Want AI inside your business workflows?', 'iscp' ),
		'solution'    => __( 'Use AI Business Assistant and AI Development', 'iscp' ),
		'description' => __( 'AI chat, document intelligence, automation, private knowledge assistants and integrations with your website, CRM or ERP.', 'iscp' ),
		'icon'        => 'ai',
		'url'         => home_url( '/services/ai-development/' ),
		'type'        => __( 'AI', 'iscp' ),
	),
	array(
		'need'        => __( 'Need hosting, VPS or cloud support?', 'iscp' ),
		'solution'    => __( 'Use Indian Servers Cloud Hosting', 'iscp' ),
		'description' => __( 'Managed hosting, VPS, cloud deployment, SSL, backup, monitoring, migration and hardening for business systems.', 'iscp' ),
		'icon'        => 'cloud',
		'url'         => home_url( '/services/cloud-hosting/' ),
		'type'        => __( 'Cloud', 'iscp' ),
	),
	array(
		'need'        => __( 'Need a custom portal, SaaS or web app?', 'iscp' ),
		'solution'    => __( 'Use Custom Software and Web App Development', 'iscp' ),
		'description' => __( '.NET, PHP, Python, WordPress, Laravel, React, APIs, dashboards and secure business application development.', 'iscp' ),
		'icon'        => 'code',
		'url'         => home_url( '/services/custom-software-development/' ),
		'type'        => __( 'Development', 'iscp' ),
	),
	array(
		'need'        => __( 'Need mobile apps for customers or field teams?', 'iscp' ),
		'solution'    => __( 'Use Mobile App Development', 'iscp' ),
		'description' => __( 'Android and cross-platform apps for customers, staff, students, restaurants, field teams and operational workflows.', 'iscp' ),
		'icon'        => 'mobile',
		'url'         => home_url( '/services/mobile-app-development/' ),
		'type'        => __( 'Mobile', 'iscp' ),
	),
	array(
		'need'        => __( 'Need security testing before launch?', 'iscp' ),
		'solution'    => __( 'Use Cyber Security and VAPT Services', 'iscp' ),
		'description' => __( 'Vulnerability assessment, penetration testing, hardening, secure deployment reviews and cyber security guidance.', 'iscp' ),
		'icon'        => 'shield',
		'url'         => home_url( '/services/cyber-security-vapt/' ),
		'type'        => __( 'Security', 'iscp' ),
	),
	array(
		'need'        => __( 'Need long-term developers or support team?', 'iscp' ),
		'solution'    => __( 'Use Dedicated Development Teams', 'iscp' ),
		'description' => __( 'Dedicated developers, designers, testers, cloud engineers and support teams for ongoing product delivery.', 'iscp' ),
		'icon'        => 'team',
		'url'         => home_url( '/services/dedicated-development-teams/' ),
		'type'        => __( 'Teams', 'iscp' ),
	),
);
$iscp_product_metrics = array(
	array( 'value' => '8+', 'label' => __( 'Core SaaS and business platforms', 'iscp' ) ),
	array( 'value' => '2200+', 'label' => __( 'Client relationships and service history', 'iscp' ) ),
	array( 'value' => '4', 'label' => __( 'India, USA, Dubai and Australia focus regions', 'iscp' ) ),
	array( 'value' => '360', 'label' => __( 'Software, cloud, security and support coverage', 'iscp' ) ),
);
$iscp_product_layers = array(
	array( 'title' => __( 'SaaS Product Foundation', 'iscp' ), 'text' => __( 'Start with HRMS, School ERP, CRM, Inventory, POS, LMS, Project Management or Vyapara ERP.', 'iscp' ) ),
	array( 'title' => __( 'Customization Layer', 'iscp' ), 'text' => __( 'Add fields, roles, reports, approvals, workflows, dashboards and integrations based on your operations.', 'iscp' ) ),
	array( 'title' => __( 'Cloud Operations', 'iscp' ), 'text' => __( 'Deploy with managed hosting, SSL, backups, monitoring, migrations and performance support.', 'iscp' ) ),
	array( 'title' => __( 'Security and Support', 'iscp' ), 'text' => __( 'Extend products with VAPT, hardening, user training, maintenance and improvement roadmap.', 'iscp' ) ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page <?php echo esc_attr( $iscp_is_solutions_page ? 'iscp-solutions-finder-page' : 'iscp-products-page' ); ?>">
	<?php if ( $iscp_is_solutions_page ) : ?>
		<section class="iscp-template-hero iscp-template-hero-offering iscp-solutions-hero">
			<div class="iscp-container iscp-template-hero-grid">
				<div class="iscp-template-hero-copy">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Solutions Finder', 'iscp' ); ?></p>
					<h1><?php esc_html_e( 'Find the Right Indian Servers Product or Technology Solution', 'iscp' ); ?></h1>
					<p class="iscp-template-hero-lead"><?php esc_html_e( 'Tell us the business problem. Indian Servers maps it to a practical product, custom software service, cloud platform, AI workflow or dedicated engineering team.', 'iscp' ); ?></p>
					<div class="iscp-action-row">
						<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Recommendation', 'iscp' ); ?></a>
						<a class="iscp-btn iscp-btn-ghost" href="#solution-map"><?php esc_html_e( 'View Solution Map', 'iscp' ); ?></a>
					</div>
				</div>
				<figure class="iscp-page-image-card">
					<img src="<?php echo esc_url( $iscp_product_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software, cloud and business solution planning', 'iscp' ); ?>" loading="lazy" decoding="async">
				</figure>
			</div>
		</section>

		<section id="solution-map" class="iscp-section iscp-solution-map-section">
			<div class="iscp-container">
				<div class="iscp-section-heading iscp-solution-map-heading">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Problem to Product', 'iscp' ); ?></p>
					<h2><?php esc_html_e( 'Are you looking for a specific business solution?', 'iscp' ); ?></h2>
					<p><?php esc_html_e( 'Choose the need closest to your requirement. Each card points to the Indian Servers product or service that can solve it.', 'iscp' ); ?></p>
				</div>

				<div class="iscp-solution-map-grid">
					<?php foreach ( $iscp_solution_cards as $iscp_solution_card ) : ?>
						<article class="iscp-solution-map-card">
							<div class="iscp-solution-map-card-top">
								<span class="iscp-offering-card-icon" aria-hidden="true">
									<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( iscp_get_offering_icon_path( $iscp_solution_card['icon'] ) ); ?>"/></svg>
								</span>
								<span class="iscp-solution-map-type"><?php echo esc_html( $iscp_solution_card['type'] ); ?></span>
							</div>
							<p class="iscp-solution-map-need"><?php echo esc_html( $iscp_solution_card['need'] ); ?></p>
							<h3><?php echo esc_html( $iscp_solution_card['solution'] ); ?></h3>
							<p><?php echo esc_html( $iscp_solution_card['description'] ); ?></p>
							<div class="iscp-solution-map-actions">
								<a class="iscp-card-link" href="<?php echo esc_url( $iscp_solution_card['url'] ); ?>"><?php esc_html_e( 'View Solution', 'iscp' ); ?></a>
								<a class="iscp-card-quote" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request Quote', 'iscp' ); ?></a>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<section class="iscp-section iscp-solution-bundles-section">
			<div class="iscp-container iscp-solution-bundles">
				<div class="iscp-solution-bundle-panel">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Recommended Bundles', 'iscp' ); ?></p>
					<h2><?php esc_html_e( 'Products and services can be combined for complete delivery', 'iscp' ); ?></h2>
					<p><?php esc_html_e( 'Many requirements need more than one item. Indian Servers can combine SaaS products, custom modules, mobile apps, hosting, VAPT and long-term support into one delivery plan.', 'iscp' ); ?></p>
				</div>
				<div class="iscp-solution-bundle-list">
					<div><strong><?php esc_html_e( 'School Digital Suite', 'iscp' ); ?></strong><span><?php esc_html_e( 'School ERP + LMS + Parent App + Cloud Hosting', 'iscp' ); ?></span></div>
					<div><strong><?php esc_html_e( 'SME Operations Suite', 'iscp' ); ?></strong><span><?php esc_html_e( 'Vyapara ERP + Inventory + CRM + Reports', 'iscp' ); ?></span></div>
					<div><strong><?php esc_html_e( 'Restaurant Growth Suite', 'iscp' ); ?></strong><span><?php esc_html_e( 'Restaurant POS + Inventory + Branch Reports + Mobile Ordering', 'iscp' ); ?></span></div>
					<div><strong><?php esc_html_e( 'Secure Cloud Launch', 'iscp' ); ?></strong><span><?php esc_html_e( 'Custom Software + Cloud Hosting + VAPT + Monitoring', 'iscp' ); ?></span></div>
				</div>
			</div>
		</section>

		<section class="iscp-section iscp-section-muted iscp-solution-global-section">
			<div class="iscp-container iscp-solution-global-grid">
				<div class="iscp-page-copy">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Global Solution Coverage', 'iscp' ); ?></p>
					<h2><?php esc_html_e( 'One technology partner for products, services and managed delivery', 'iscp' ); ?></h2>
					<p><?php esc_html_e( 'Indian Servers supports requirements across India, USA, Dubai, Australia, South Africa, Europe and international markets. Solutions can start with a SaaS product, expand through custom modules, add mobile apps, connect cloud hosting and include VAPT or long-term maintenance.', 'iscp' ); ?></p>
				</div>
				<div class="iscp-solution-global-list">
					<div><strong><?php esc_html_e( 'Product + Customization', 'iscp' ); ?></strong><span><?php esc_html_e( 'Use HRMS, School ERP, CRM, Inventory, LMS or POS as a base and extend it for your workflow.', 'iscp' ); ?></span></div>
					<div><strong><?php esc_html_e( 'Software + Cloud', 'iscp' ); ?></strong><span><?php esc_html_e( 'Build the application and host it with SSL, backups, monitoring and support from one team.', 'iscp' ); ?></span></div>
					<div><strong><?php esc_html_e( 'AI + Automation', 'iscp' ); ?></strong><span><?php esc_html_e( 'Add AI assistants, document intelligence and workflow automation to existing business systems.', 'iscp' ); ?></span></div>
					<div><strong><?php esc_html_e( 'Security + Maintenance', 'iscp' ); ?></strong><span><?php esc_html_e( 'Review, harden, monitor and improve your applications after launch.', 'iscp' ); ?></span></div>
				</div>
			</div>
		</section>

		<?php get_template_part( 'template-parts/sections/cta' ); ?>
	<?php else : ?>
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Products & Solutions', 'iscp' ),
			'title'       => __( 'Indian Servers SaaS Products and Business Platforms', 'iscp' ),
			'description' => __( 'Default product coverage for HRMS, school management software, CRM, inventory, restaurant POS, cloud systems, VAPT and custom enterprise software.', 'iscp' ),
			'variant'     => 'product',
			'primary'     => array( 'label' => __( 'Discuss Product Requirement', 'iscp' ), 'url' => home_url( '/contact/' ) ),
		)
	);
	?>

	<?php get_template_part( 'template-parts/sections/solutions' ); ?>

	<section class="iscp-section iscp-section-muted iscp-product-metrics-section">
		<div class="iscp-container">
			<div class="iscp-product-metric-grid">
				<?php foreach ( $iscp_product_metrics as $iscp_metric ) : ?>
					<div class="iscp-product-metric-card">
						<strong><?php echo esc_html( $iscp_metric['value'] ); ?></strong>
						<span><?php echo esc_html( $iscp_metric['label'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section">
		<div class="iscp-container iscp-template-split">
			<div class="iscp-page-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Product Direction', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Business software built for Indian operations and global scale', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers product pages are structured to present the platform clearly even before custom page copy is added. Each product can cover workflows, dashboards, access control, reports, integrations, hosting and support.', 'iscp' ); ?></p>
			</div>
			<figure class="iscp-page-image-card">
				<img src="<?php echo esc_url( $iscp_product_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers product engineering dashboard and software team', 'iscp' ); ?>" loading="lazy" decoding="async">
			</figure>
		</div>
	</section>

	<section class="iscp-section iscp-product-layers-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Product Architecture', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Choose a product, then shape it around your business process', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers products are not isolated brochures. They can be implemented with custom modules, cloud deployment, training, security review and support.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-product-layer-grid">
				<?php foreach ( $iscp_product_layers as $iscp_layer ) : ?>
					<article class="iscp-product-layer-card">
						<h3><?php echo esc_html( $iscp_layer['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_layer['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/cta' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
