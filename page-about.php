<?php
/**
 * About page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_team_image  = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';
$iscp_cloud_image = get_template_directory_uri() . '/assets/images/indianservers-global-cloud.png';

$iscp_about_stats = array(
	array( 'value' => '2009', 'label' => __( 'Indian Servers founded', 'iscp' ) ),
	array( 'value' => '2200+', 'label' => __( 'Clients served', 'iscp' ) ),
	array( 'value' => '3', 'label' => __( 'Incorporated regions', 'iscp' ) ),
	array( 'value' => '360°', 'label' => __( 'Software, cloud and support', 'iscp' ) ),
);

$iscp_industries = array(
	array( 'title' => __( 'Educational Institutes', 'iscp' ), 'icon' => 'M12 3 2 8l10 5 8-4v6h2V8L12 3Zm-6 8.2V15c0 2 3.6 4 6 4s6-2 6-4v-3.8l-6 3-6-3Z' ),
	array( 'title' => __( 'Banking and Finance', 'iscp' ), 'icon' => 'M4 10h16v9H4v-9Zm2 2v5h12v-5H6Zm6-9 9 5H3l9-5Z' ),
	array( 'title' => __( 'Insurance', 'iscp' ), 'icon' => 'M12 2 4 5v6c0 5 3.4 9.4 8 11 4.6-1.6 8-6 8-11V5l-8-3Zm0 4 4 1.5V11c0 3-1.6 5.8-4 7-2.4-1.2-4-4-4-7V7.5L12 6Z' ),
	array( 'title' => __( 'Manufacturing', 'iscp' ), 'icon' => 'M3 20V9l5 3V9l5 3V8h8v12H3Zm12-8v6h4v-6h-4ZM6 15h2v2H6v-2Zm4 0h2v2h-2v-2Z' ),
	array( 'title' => __( 'Retail and Distribution', 'iscp' ), 'icon' => 'M6 6h15l-2 8H8L6 6Zm2 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm10 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM5 4H2V2h4.5L7 4h-2Z' ),
	array( 'title' => __( 'Contracting Sectors', 'iscp' ), 'icon' => 'M4 20h16v-2H4v2Zm2-4h12l-1-8h-3V5a2 2 0 0 0-4 0v3H7l-1 8Zm6-11v3h-1V5a1 1 0 1 1 2 0Z' ),
);

$iscp_strengths = array(
	array( 'title' => __( 'End-to-End Outsourcing', 'iscp' ), 'copy' => __( 'From business requirement study to design, development, hosting, security, maintenance and support.', 'iscp' ) ),
	array( 'title' => __( 'Software Development Centers in India', 'iscp' ), 'copy' => __( 'Delivery teams in India build and support business applications for domestic and international customers.', 'iscp' ) ),
	array( 'title' => __( 'Global Marketing Presence', 'iscp' ), 'copy' => __( 'Indian Servers has business presence across India, USA and Dubai with a growing international customer base.', 'iscp' ) ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-about-page">
	<section class="iscp-about-hero">
		<div class="iscp-container iscp-about-hero-grid">
			<div class="iscp-about-hero-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'About Indian Servers', 'iscp' ); ?></p>
				<h1><?php esc_html_e( 'Growing IT services company for software, cloud and outsourcing solutions', 'iscp' ); ?></h1>
				<p><?php esc_html_e( 'Indian Servers is incorporated in India, USA and Australia, providing complete end-to-end outsourcing solutions for education, banking, finance, insurance, manufacturing, retail, distribution and contracting sectors.', 'iscp' ); ?></p>
				<div class="iscp-action-row">
					<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Services', 'iscp' ); ?></a>
					<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Indian Servers', 'iscp' ); ?></a>
				</div>
			</div>
			<div class="iscp-about-visual-card">
				<img src="<?php echo esc_url( $iscp_team_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software development and cloud operations workspace', 'iscp' ); ?>" loading="lazy" decoding="async">
				<div class="iscp-about-visual-panel">
					<strong><?php esc_html_e( 'India | USA | Australia', 'iscp' ); ?></strong>
					<span><?php esc_html_e( 'Customer base and operations across 3 countries with software development centers in India.', 'iscp' ); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-about-stats-section">
		<div class="iscp-container iscp-about-stat-grid">
			<?php foreach ( $iscp_about_stats as $iscp_stat ) : ?>
				<article class="iscp-about-stat-card">
					<strong><?php echo esc_html( $iscp_stat['value'] ); ?></strong>
					<span><?php echo esc_html( $iscp_stat['label'] ); ?></span>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="iscp-section">
		<div class="iscp-container iscp-about-profile-grid">
			<div class="iscp-about-profile-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Company Profile', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Comprehensive IT solutions for industry-specific growth', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers provides a comprehensive set of solutions for educational institutes, banking, finance, insurance, manufacturing, retail and distribution companies, contracting businesses and service-driven organizations.', 'iscp' ); ?></p>
				<p><?php esc_html_e( 'The company combines software engineering, SaaS product development, managed cloud hosting, cyber security, AI systems and long-term support so customers can work with one accountable technology partner.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-about-glass-stack">
				<?php foreach ( $iscp_strengths as $iscp_strength ) : ?>
					<article>
						<h3><?php echo esc_html( $iscp_strength['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_strength['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-section-heading iscp-about-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Industries We Serve', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Solutions for institutions, enterprises and operational businesses', 'iscp' ); ?></h2>
			</div>
			<div class="iscp-about-industry-grid">
				<?php foreach ( $iscp_industries as $iscp_industry ) : ?>
					<article class="iscp-about-industry-card">
						<span aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( $iscp_industry['icon'] ); ?>"/></svg>
						</span>
						<h3><?php echo esc_html( $iscp_industry['title'] ); ?></h3>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section">
		<div class="iscp-container iscp-about-presence-panel">
			<img src="<?php echo esc_url( $iscp_cloud_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers global cloud technology presence', 'iscp' ); ?>" loading="lazy" decoding="async">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Global Presence', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Marketing presence across India, USA and Dubai', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers has operations and a customer base spanning across 3 countries, with software development centers in India and business reach across India, USA, Dubai and Australia.', 'iscp' ); ?></p>
				<div class="iscp-about-location-row">
					<span><?php esc_html_e( 'India', 'iscp' ); ?></span>
					<span><?php esc_html_e( 'USA', 'iscp' ); ?></span>
					<span><?php esc_html_e( 'Australia', 'iscp' ); ?></span>
					<span><?php esc_html_e( 'Dubai', 'iscp' ); ?></span>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
