<?php
/**
 * Services section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_service',
		'posts_per_page'      => 8,
		'ignore_sticky_posts' => true,
	)
);

$iscp_fallback = array(
	array( 'title' => __( 'Custom Software Development', 'iscp' ), 'icon' => 'code', 'description' => __( '.NET, PHP, Python, JavaScript, WordPress, APIs, integrations and enterprise-grade business applications.', 'iscp' ) ),
	array( 'title' => __( 'AI & Automation', 'iscp' ), 'icon' => 'ai', 'description' => __( 'AI assistants, workflow automation, document intelligence, analytics and smart business process tools.', 'iscp' ) ),
	array( 'title' => __( 'AR / VR Experiences', 'iscp' ), 'icon' => 'design', 'description' => __( 'Interactive AR demos, training simulations, visualization tools and immersive product experiences.', 'iscp' ) ),
	array( 'title' => __( 'VAPT & Security', 'iscp' ), 'icon' => 'shield', 'description' => __( 'Vulnerability assessment, penetration testing, hardening, audit support and secure deployment practices.', 'iscp' ) ),
	array( 'title' => __( 'Hosting & Cloud Hosting', 'iscp' ), 'icon' => 'cloud', 'description' => __( 'Shared hosting, VPS, cloud servers, managed hosting, SSL, backup, migration and performance tuning.', 'iscp' ) ),
	array( 'title' => __( 'Mobile App Development', 'iscp' ), 'icon' => 'mobile', 'description' => __( 'Android, cross-platform apps, customer portals, staff apps and mobile interfaces connected to business systems.', 'iscp' ) ),
	array( 'title' => __( 'UI/UX & Product Design', 'iscp' ), 'icon' => 'design', 'description' => __( 'Clean interfaces for SaaS dashboards, admin panels, portals, mobile apps and high-usage internal tools.', 'iscp' ) ),
	array( 'title' => __( 'Maintenance & Support', 'iscp' ), 'icon' => 'team', 'description' => __( 'Ongoing improvements, bug fixes, upgrades, server monitoring and long-term product support.', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-section-alt iscp-home-services">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Services', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Technology Services by Indian Servers', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-card-grid iscp-card-grid-4">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'service' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'service', $iscp_item + array( 'label' => __( 'Indian Servers', 'iscp' ), 'url' => home_url( '/services/' ) ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
