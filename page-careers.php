<?php
/**
 * Careers page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_team_image = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';

$iscp_career_tracks = array(
	array(
		'title'       => __( 'Software Engineering', 'iscp' ),
		'description' => __( '.NET, PHP, Python, WordPress, APIs, SaaS platforms, ERP, CRM and business application development.', 'iscp' ),
		'icon'        => 'M4 5h16v11H4V5Zm2 2v7h12V7H6Zm3 12h6v2H9v-2Zm-4-1h14v2H5v-2Z',
	),
	array(
		'title'       => __( 'Mobile and Frontend', 'iscp' ),
		'description' => __( 'Responsive web interfaces, mobile apps, dashboards, UI systems and customer-facing product experiences.', 'iscp' ),
		'icon'        => 'M8 2h8a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm0 3v13h8V5H8Zm3 14h2v1h-2v-1Z',
	),
	array(
		'title'       => __( 'Cloud and DevOps', 'iscp' ),
		'description' => __( 'Hosting, VPS, deployments, monitoring, backups, performance tuning and managed cloud operations.', 'iscp' ),
		'icon'        => 'M7 18h10a5 5 0 0 0 .7-9.95A6.5 6.5 0 0 0 5.2 10 4 4 0 0 0 7 18Zm.2-2A2 2 0 0 1 7 12h.2l.8.1.3-.8A4.5 4.5 0 0 1 17 10.8l-.2 1.1 1.1.2A3 3 0 0 1 17 16H7.2Z',
	),
	array(
		'title'       => __( 'AI and Cyber Security', 'iscp' ),
		'description' => __( 'AI assistants, automation, document intelligence, VAPT, secure coding and security-focused product delivery.', 'iscp' ),
		'icon'        => 'M12 2 4 5v6c0 5 3.4 9.4 8 11 4.6-1.6 8-6 8-11V5l-8-3Zm0 4 4 1.5V11c0 2.8-1.5 5.4-4 6.8C9.5 16.4 8 13.8 8 11V7.5L12 6Z',
	),
);

$iscp_culture = array(
	__( 'Work on real products used by schools, SMEs, enterprises and international customers.', 'iscp' ),
	__( 'Build across software, cloud, AI, security and managed technology services instead of one narrow stack.', 'iscp' ),
	__( 'Collaborate with teams serving India, USA, Dubai, South Africa, Australia and Europe.', 'iscp' ),
	__( 'Learn through practical project ownership, code reviews, deployment exposure and customer problem solving.', 'iscp' ),
);

$iscp_process = array(
	array( 'step' => '01', 'title' => __( 'Apply', 'iscp' ), 'copy' => __( 'Share your profile, portfolio, GitHub, project work or resume with the Indian Servers team.', 'iscp' ) ),
	array( 'step' => '02', 'title' => __( 'Technical Discussion', 'iscp' ), 'copy' => __( 'We understand your strengths, practical experience, problem-solving style and preferred career track.', 'iscp' ) ),
	array( 'step' => '03', 'title' => __( 'Assignment or Review', 'iscp' ), 'copy' => __( 'Depending on the role, we may review code, product thinking, infrastructure skills or communication ability.', 'iscp' ) ),
	array( 'step' => '04', 'title' => __( 'Offer and Onboarding', 'iscp' ), 'copy' => __( 'Selected candidates join active teams with clear responsibilities, mentoring and delivery expectations.', 'iscp' ) ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-careers-page">
	<section class="iscp-careers-hero">
		<div class="iscp-container iscp-careers-hero-grid">
			<div class="iscp-careers-hero-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Careers at Indian Servers', 'iscp' ); ?></p>
				<h1><?php esc_html_e( 'Build software, cloud and AI systems for growing organizations', 'iscp' ); ?></h1>
				<p><?php esc_html_e( 'Join Indian Servers to work on SaaS products, custom software, managed cloud, cyber security and AI automation for clients across India and global markets.', 'iscp' ); ?></p>
				<div class="iscp-action-row">
					<a class="iscp-btn iscp-btn-gold" href="mailto:info@indianservers.com?subject=Careers%20at%20Indian%20Servers"><?php esc_html_e( 'Apply Now', 'iscp' ); ?></a>
					<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact HR Team', 'iscp' ); ?></a>
				</div>
			</div>
			<div class="iscp-careers-visual">
				<img src="<?php echo esc_url( $iscp_team_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software team careers workspace', 'iscp' ); ?>" loading="eager" decoding="async">
				<div class="iscp-careers-visual-panel">
					<strong><?php esc_html_e( 'Software | Cloud | AI | Security', 'iscp' ); ?></strong>
					<span><?php esc_html_e( 'Career tracks for engineers, designers, cloud teams, AI builders and support specialists.', 'iscp' ); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-careers-track-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Open Career Tracks', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Roles for builders who like practical technology work', 'iscp' ); ?></h2>
			</div>
			<div class="iscp-careers-track-grid">
				<?php foreach ( $iscp_career_tracks as $iscp_track ) : ?>
					<article class="iscp-careers-track-card">
						<span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( $iscp_track['icon'] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $iscp_track['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_track['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-careers-culture-section">
		<div class="iscp-container iscp-careers-culture-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Why Join Indian Servers', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A workplace for product thinking, engineering discipline and customer impact', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers gives team members exposure to live business workflows, multi-industry products, cloud infrastructure and long-term customer relationships.', 'iscp' ); ?></p>
			</div>
			<ul class="iscp-check-list">
				<?php foreach ( $iscp_culture as $iscp_item ) : ?>
					<li><?php echo esc_html( $iscp_item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Hiring Process', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Simple, practical and role-focused selection', 'iscp' ); ?></h2>
			</div>
			<div class="iscp-careers-process-grid">
				<?php foreach ( $iscp_process as $iscp_step ) : ?>
					<article class="iscp-careers-process-card">
						<strong><?php echo esc_html( $iscp_step['step'] ); ?></strong>
						<h3><?php echo esc_html( $iscp_step['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_step['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-careers-cta-section">
		<div class="iscp-container iscp-careers-cta-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Start a Career Conversation', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Send your profile to Indian Servers', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Mention your preferred role, current skills, project links, location and availability. Freshers with strong project work and experienced professionals are welcome to apply.', 'iscp' ); ?></p>
			</div>
			<a class="iscp-btn iscp-btn-gold" href="mailto:info@indianservers.com?subject=Careers%20at%20Indian%20Servers"><?php esc_html_e( 'Email Your Profile', 'iscp' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
