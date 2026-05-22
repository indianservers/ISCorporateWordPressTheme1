<?php
/**
 * Solutions section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_section_image = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_solution',
		'posts_per_page'      => 8,
		'ignore_sticky_posts' => true,
	)
);

$iscp_fallback = array(
	array( 'label' => __( 'SaaS Product', 'iscp' ), 'icon' => 'team', 'title' => __( 'HRMS Platform', 'iscp' ), 'description' => __( 'Employee records, attendance, payroll support, leave workflows, onboarding, roles and HR reports.', 'iscp' ) ),
	array( 'label' => __( 'Education SaaS', 'iscp' ), 'icon' => 'education', 'title' => __( 'School Management Software', 'iscp' ), 'description' => __( 'Admissions, fees, attendance, exams, parent communication, transport and institution administration.', 'iscp' ) ),
	array( 'label' => __( 'Sales SaaS', 'iscp' ), 'icon' => 'crm', 'title' => __( 'CRM & Lead Management', 'iscp' ), 'description' => __( 'Inquiry tracking, customer pipelines, reminders, service workflows and business follow-up automation.', 'iscp' ) ),
	array( 'label' => __( 'Operations SaaS', 'iscp' ), 'icon' => 'inventory', 'title' => __( 'Inventory Management Software', 'iscp' ), 'description' => __( 'Stock, purchase, sales, vendors, billing, warehouse control and real-time operational reports.', 'iscp' ) ),
	array( 'label' => __( 'Hospitality SaaS', 'iscp' ), 'icon' => 'restaurant', 'title' => __( 'Restaurant Software', 'iscp' ), 'description' => __( 'Table orders, KOT, billing, menu management, kitchen workflows, inventory and branch reports.', 'iscp' ) ),
	array( 'label' => __( 'Custom Build', 'iscp' ), 'icon' => 'code', 'title' => __( 'Custom Software Development', 'iscp' ), 'description' => __( 'Tailor-made web, mobile, ERP, CRM, AI and integration projects using modern engineering stacks.', 'iscp' ) ),
	array( 'label' => __( 'Cloud', 'iscp' ), 'icon' => 'cloud', 'title' => __( 'Hosting & Cloud Hosting', 'iscp' ), 'description' => __( 'Web hosting, VPS, cloud servers, managed deployments, SSL, backups, monitoring and migration.', 'iscp' ) ),
	array( 'label' => __( 'Security', 'iscp' ), 'icon' => 'shield', 'title' => __( 'VAPT & Cyber Security', 'iscp' ), 'description' => __( 'Vulnerability assessment, penetration testing, security hardening, audits and awareness systems.', 'iscp' ) ),
);
?>

<section id="solutions" class="iscp-section iscp-home-solutions">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Solutions', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Indian Servers SaaS Products & Business Solutions', 'iscp' ); ?></h2>
		</div>
		<figure class="iscp-section-photo iscp-reveal">
			<img src="<?php echo esc_url( $iscp_section_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software development workspace with business dashboards and cloud systems', 'iscp' ); ?>" loading="lazy" decoding="async">
		</figure>
		<div class="iscp-card-grid iscp-card-grid-4">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'solution' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'solution', $iscp_item + array( 'url' => home_url( '/solutions/' ) ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
