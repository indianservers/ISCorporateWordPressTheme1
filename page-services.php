<?php
/**
 * Services page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_server_image = get_template_directory_uri() . '/assets/images/indianservers-data-center.png';
$iscp_services     = array(
	array( 'title' => __( 'Custom Software', 'iscp' ), 'icon' => 'code', 'description' => __( '.NET, PHP, Python, APIs, databases and business applications built around real workflows.', 'iscp' ) ),
	array( 'title' => __( 'Web Apps', 'iscp' ), 'icon' => 'design', 'description' => __( 'Portals, dashboards, WordPress, Laravel, React and business-facing web platforms.', 'iscp' ) ),
	array( 'title' => __( 'Mobile Apps', 'iscp' ), 'icon' => 'mobile', 'description' => __( 'Android and cross-platform apps for staff, customers, students and field teams.', 'iscp' ) ),
	array( 'title' => __( 'AI Solutions', 'iscp' ), 'icon' => 'ai', 'description' => __( 'AI assistants, workflow automation, document intelligence and smart analytics.', 'iscp' ) ),
	array( 'title' => __( 'AR/VR Experiences', 'iscp' ), 'icon' => 'design', 'description' => __( 'Training simulations, product visualization and immersive learning experiences.', 'iscp' ) ),
	array( 'title' => __( 'Cloud Hosting', 'iscp' ), 'icon' => 'cloud', 'description' => __( 'Hosting, VPS, cloud servers, SSL, backups, monitoring and migration services.', 'iscp' ) ),
	array( 'title' => __( 'Cyber Security', 'iscp' ), 'icon' => 'shield', 'description' => __( 'VAPT, hardening, audits, secure deployment and cyber awareness systems.', 'iscp' ) ),
	array( 'title' => __( 'Dedicated Teams', 'iscp' ), 'icon' => 'team', 'description' => __( 'Dedicated developers and support teams for ongoing product development.', 'iscp' ) ),
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

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-card-grid iscp-card-grid-4">
				<?php foreach ( $iscp_services as $iscp_service ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'service', $iscp_service + array( 'label' => __( 'Indian Servers', 'iscp' ), 'url' => home_url( '/contact/' ) ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/cta' ); ?>
</main>

<?php
get_footer();
