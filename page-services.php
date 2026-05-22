<?php
/**
 * Services page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_server_image = get_template_directory_uri() . '/assets/images/indianservers-data-center.png';
$iscp_services     = array(
	array( 'title' => __( 'Custom Software', 'iscp' ), 'icon' => 'code', 'description' => __( '.NET, PHP, Python, APIs, databases and business applications built around real workflows.', 'iscp' ), 'url' => home_url( '/services/custom-software-development/' ) ),
	array( 'title' => __( 'Web Apps', 'iscp' ), 'icon' => 'design', 'description' => __( 'Portals, dashboards, WordPress, Laravel, React and business-facing web platforms.', 'iscp' ), 'url' => home_url( '/services/web-application-development/' ) ),
	array( 'title' => __( 'Mobile Apps', 'iscp' ), 'icon' => 'mobile', 'description' => __( 'Android and cross-platform apps for staff, customers, students and field teams.', 'iscp' ), 'url' => home_url( '/services/mobile-app-development/' ) ),
	array( 'title' => __( 'AI Solutions', 'iscp' ), 'icon' => 'ai', 'description' => __( 'AI assistants, workflow automation, document intelligence and smart analytics.', 'iscp' ), 'url' => home_url( '/services/ai-development/' ) ),
	array( 'title' => __( 'AR/VR Experiences', 'iscp' ), 'icon' => 'design', 'description' => __( 'Training simulations, product visualization and immersive learning experiences.', 'iscp' ), 'url' => home_url( '/services/ar-vr-development/' ) ),
	array( 'title' => __( 'Cloud Hosting', 'iscp' ), 'icon' => 'cloud', 'description' => __( 'Hosting, VPS, cloud servers, SSL, backups, monitoring and migration services.', 'iscp' ), 'url' => home_url( '/services/cloud-hosting/' ) ),
	array( 'title' => __( 'Cyber Security', 'iscp' ), 'icon' => 'shield', 'description' => __( 'VAPT, hardening, audits, secure deployment and cyber awareness systems.', 'iscp' ), 'url' => home_url( '/services/cyber-security-vapt/' ) ),
	array( 'title' => __( 'Dedicated Teams', 'iscp' ), 'icon' => 'team', 'description' => __( 'Dedicated developers and support teams for ongoing product development.', 'iscp' ), 'url' => home_url( '/services/dedicated-development-teams/' ) ),
);
$iscp_service_stages = array(
	array( 'title' => __( 'Discovery', 'iscp' ), 'text' => __( 'We clarify goals, users, workflows, risks, hosting needs and integration points before development starts.', 'iscp' ) ),
	array( 'title' => __( 'Architecture', 'iscp' ), 'text' => __( 'We define database structure, application layers, access roles, APIs, cloud setup and security expectations.', 'iscp' ) ),
	array( 'title' => __( 'Build & Test', 'iscp' ), 'text' => __( 'Our team develops modules in planned releases with testing, review, performance checks and stakeholder feedback.', 'iscp' ) ),
	array( 'title' => __( 'Launch & Support', 'iscp' ), 'text' => __( 'We assist with deployment, monitoring, backups, documentation, improvements and long-term maintenance.', 'iscp' ) ),
);
$iscp_service_stack = array(
	__( '.NET and ASP.NET Core', 'iscp' ),
	__( 'PHP, Laravel and WordPress', 'iscp' ),
	__( 'Python and AI workflows', 'iscp' ),
	__( 'React, JavaScript and dashboards', 'iscp' ),
	__( 'Android and cross-platform apps', 'iscp' ),
	__( 'MySQL, SQL Server and APIs', 'iscp' ),
	__( 'Cloud, VPS, SSL and monitoring', 'iscp' ),
	__( 'VAPT, hardening and secure delivery', 'iscp' ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-services-page">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Services', 'iscp' ),
			'title'       => __( 'Software, Cloud, AI and Security Services', 'iscp' ),
			'description' => __( 'A focused service portfolio for companies that need business software, managed hosting, secure applications and long-term technology support.', 'iscp' ),
			'variant'     => 'services',
			'primary'     => array( 'label' => __( 'Start a Project', 'iscp' ), 'url' => home_url( '/contact/' ) ),
		)
	);
	?>

	<section class="iscp-section iscp-section-muted iscp-page-priority-grid">
		<div class="iscp-container">
			<div class="iscp-card-grid iscp-card-grid-4">
				<?php foreach ( $iscp_services as $iscp_service ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'service', $iscp_service + array( 'label' => __( 'Indian Servers', 'iscp' ) ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section">
		<div class="iscp-container iscp-template-split">
			<div class="iscp-page-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'What We Do', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'End-to-end delivery from application planning to cloud support', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers can design, build, host, secure and maintain software products. Services are organized for business outcomes rather than one-off tasks.', 'iscp' ); ?></p>
			</div>
			<figure class="iscp-page-image-card">
				<img src="<?php echo esc_url( $iscp_server_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers server and cloud hosting infrastructure', 'iscp' ); ?>" loading="lazy" decoding="async">
			</figure>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted iscp-service-delivery-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Delivery Model', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A structured service workflow for serious technology projects', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers combines consulting, engineering, hosting, security and support so businesses do not have to coordinate multiple disconnected vendors.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-service-stage-grid">
				<?php foreach ( $iscp_service_stages as $iscp_index => $iscp_stage ) : ?>
					<article class="iscp-service-stage-card">
						<span><?php echo esc_html( '0' . ( $iscp_index + 1 ) ); ?></span>
						<h3><?php echo esc_html( $iscp_stage['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_stage['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-service-stack-section">
		<div class="iscp-container iscp-service-stack-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Technology Coverage', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'From code to cloud, our services cover the complete application lifecycle', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Use Indian Servers for new software, legacy improvements, hosting migrations, security reviews, AI integrations and dedicated development capacity.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-service-stack-list">
				<?php foreach ( $iscp_service_stack as $iscp_stack_item ) : ?>
					<span><?php echo esc_html( $iscp_stack_item ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/cta' ); ?>
</main>

<?php
get_footer();
