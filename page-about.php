<?php
/**
 * About page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_team_image   = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';
$iscp_cloud_image  = get_template_directory_uri() . '/assets/images/indianservers-global-cloud.png';
$iscp_about_points = array(
	__( 'Software development company serving 2200+ clients', 'iscp' ),
	__( 'SaaS products for HRMS, CRM, school, inventory and restaurant operations', 'iscp' ),
	__( 'Cloud hosting, VAPT, AI, AR and managed technology services', 'iscp' ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-about-page">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'About Indian Servers', 'iscp' ),
			'title'       => __( 'Building Software, Cloud and AI Solutions Since 2009', 'iscp' ),
			'description' => __( 'Indian Servers Pvt. Ltd. helps businesses, schools, institutions and global teams build reliable software products, hosted platforms and secure digital systems.', 'iscp' ),
			'variant'     => 'about',
			'primary'     => array( 'label' => __( 'Explore Services', 'iscp' ), 'url' => home_url( '/services/' ) ),
			'secondary'   => array( 'label' => __( 'Contact Us', 'iscp' ), 'url' => home_url( '/contact/' ) ),
		)
	);
	?>

	<section class="iscp-section">
		<div class="iscp-container iscp-template-split">
			<div class="iscp-page-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Company Profile', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A technology partner for software, hosting and security', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers works across custom software, web applications, mobile apps, SaaS products, cloud infrastructure, cyber security and automation. The company supports customers from India with global branch presence in Dubai and the USA.', 'iscp' ); ?></p>
				<ul class="iscp-check-list">
					<?php foreach ( $iscp_about_points as $iscp_point ) : ?>
						<li><?php echo esc_html( $iscp_point ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<figure class="iscp-page-image-card">
				<img src="<?php echo esc_url( $iscp_team_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software engineering team workspace', 'iscp' ); ?>" loading="lazy" decoding="async">
			</figure>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container iscp-card-grid iscp-card-grid-3">
			<article class="iscp-card iscp-value-card"><div class="iscp-card-body"><h3><?php esc_html_e( 'Product Engineering', 'iscp' ); ?></h3><p><?php esc_html_e( 'From idea to SaaS platform, Indian Servers plans, builds and maintains business software products.', 'iscp' ); ?></p></div></article>
			<article class="iscp-card iscp-value-card"><div class="iscp-card-body"><h3><?php esc_html_e( 'Cloud Infrastructure', 'iscp' ); ?></h3><p><?php esc_html_e( 'Hosting, VPS, managed servers, backups, SSL, monitoring and deployment support for growing teams.', 'iscp' ); ?></p></div></article>
			<article class="iscp-card iscp-value-card"><div class="iscp-card-body"><h3><?php esc_html_e( 'Security and Trust', 'iscp' ); ?></h3><p><?php esc_html_e( 'VAPT, hardening, secure implementation and long-term support help protect production systems.', 'iscp' ); ?></p></div></article>
		</div>
	</section>

	<section class="iscp-section">
		<div class="iscp-container iscp-section-photo iscp-section-photo-split">
			<img src="<?php echo esc_url( $iscp_cloud_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers global cloud operations center', 'iscp' ); ?>" loading="lazy" decoding="async">
			<figcaption>
				<strong><?php esc_html_e( 'Vijayawada, Dehradun, Dubai and USA', 'iscp' ); ?></strong>
				<span><?php esc_html_e( 'Serving clients with software delivery, cloud hosting and security support across Indian and global business regions.', 'iscp' ); ?></span>
			</figcaption>
		</div>
	</section>
</main>

<?php
get_footer();
