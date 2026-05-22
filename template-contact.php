<?php
/**
 * Template Name: ISCP Contact Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_india_contact = array(
	'label'      => __( 'India Contact', 'iscp' ),
	'name'       => 'D SaiSatish',
	'title'      => __( 'CEO, Indian Servers', 'iscp' ),
	'company'    => __( 'Indian Servers Pvt. Ltd.', 'iscp' ),
	'phone'      => '+91 9618222220',
	'tel'        => '+919618222220',
	'email'      => 'saisatish@indianservers.com',
	'team_email' => 'info@indianservers.com',
	'address'    => __( 'India operations for software, cloud, AI, VAPT and managed technology delivery.', 'iscp' ),
);
$iscp_usa_contact   = array(
	'label'      => __( 'USA Contact', 'iscp' ),
	'name'       => 'Raj Potluri',
	'title'      => __( 'USA Business Contact', 'iscp' ),
	'company'    => __( 'Indian Servers INC', 'iscp' ),
	'phone'      => '+1 3312299656',
	'tel'        => '+13312299656',
	'email'      => 'raj.potluri@indianservers.com',
	'team_email' => '',
	'address'    => __( '752 Century Farm Ln, Naperville, IL 60563, United States', 'iscp' ),
);
$iscp_locations     = __( 'India | USA | Dubai | South Africa | Australia | Europe', 'iscp' );
$iscp_hours         = __( '9 AM - 5 PM', 'iscp' );
$iscp_whatsapp      = 'https://wa.me/919618222220?text=' . rawurlencode( __( 'Hello Indian Servers, I would like to discuss a project.', 'iscp' ) );
$iscp_socials    = array(
	'Facebook'  => 'https://www.facebook.com/IndianServersPage',
	'LinkedIn'  => 'https://www.linkedin.com/in/indianservers/',
	'Instagram' => 'https://www.instagram.com/indianserversltd',
);
$iscp_contact_paths = array(
	array( 'title' => __( 'New Software Project', 'iscp' ), 'text' => __( 'Share your workflow, users, reports, integrations and expected launch timeline.', 'iscp' ), 'icon' => 'code' ),
	array( 'title' => __( 'SaaS Product Requirement', 'iscp' ), 'text' => __( 'Ask about HRMS, School ERP, CRM, Inventory, LMS, POS, ERP or project management platforms.', 'iscp' ), 'icon' => 'products' ),
	array( 'title' => __( 'Cloud or Hosting Support', 'iscp' ), 'text' => __( 'Discuss VPS, cloud migration, SSL, backups, monitoring, hardening or WordPress hosting.', 'iscp' ), 'icon' => 'cloud' ),
	array( 'title' => __( 'Security, AI or Dedicated Team', 'iscp' ), 'text' => __( 'Contact us for VAPT, AI automation, AR/VR or long-term engineering team support.', 'iscp' ), 'icon' => 'shield' ),
);
$iscp_contact_promises = array(
	__( 'Direct leadership contact for serious project discussions.', 'iscp' ),
	__( 'India and USA coordination for global customer requirements.', 'iscp' ),
	__( 'Clear next steps for discovery, quotation and implementation planning.', 'iscp' ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-contact">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Contact Indian Servers', 'iscp' ),
			'title'       => __( 'Talk to Our Software and Cloud Team', 'iscp' ),
			'description' => __( 'Connect with Indian Servers in India and the USA for software development, SaaS products, AI, VAPT, hosting and cloud projects.', 'iscp' ),
			'variant'     => 'contact',
			'primary'     => array( 'label' => __( 'WhatsApp Sai Satish', 'iscp' ), 'url' => $iscp_whatsapp ),
			'secondary'   => array( 'label' => __( 'Call India', 'iscp' ), 'url' => 'tel:' . $iscp_india_contact['tel'] ),
		)
	);
	?>

	<section class="iscp-section iscp-contact-details-section">
		<div class="iscp-container">
			<div class="iscp-contact-office-grid">
				<?php foreach ( array( $iscp_india_contact, $iscp_usa_contact ) as $iscp_contact ) : ?>
					<article class="iscp-card iscp-contact-office-card">
						<div class="iscp-card-body">
							<span class="iscp-contact-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" focusable="false"><path d="M12 2a8 8 0 0 1 8 8c0 5.5-8 12-8 12S4 15.5 4 10a8 8 0 0 1 8-8Zm0 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg>
							</span>
							<p class="iscp-card-kicker"><?php echo esc_html( $iscp_contact['label'] ); ?></p>
							<h2><?php echo esc_html( $iscp_contact['company'] ); ?></h2>
							<div class="iscp-contact-person">
								<strong><?php echo esc_html( $iscp_contact['name'] ); ?></strong>
								<span><?php echo esc_html( $iscp_contact['title'] ); ?></span>
							</div>
							<ul class="iscp-contact-list">
								<li>
									<span><?php esc_html_e( 'Mobile', 'iscp' ); ?></span>
									<a href="<?php echo esc_url( 'tel:' . $iscp_contact['tel'] ); ?>"><?php echo esc_html( $iscp_contact['phone'] ); ?></a>
								</li>
								<li>
									<span><?php esc_html_e( 'Email', 'iscp' ); ?></span>
									<a href="<?php echo esc_url( 'mailto:' . $iscp_contact['email'] ); ?>"><?php echo esc_html( $iscp_contact['email'] ); ?></a>
								</li>
								<?php if ( ! empty( $iscp_contact['team_email'] ) ) : ?>
									<li>
										<span><?php esc_html_e( 'Team', 'iscp' ); ?></span>
										<a href="<?php echo esc_url( 'mailto:' . $iscp_contact['team_email'] ); ?>"><?php echo esc_html( $iscp_contact['team_email'] ); ?></a>
									</li>
								<?php endif; ?>
								<li>
									<span><?php esc_html_e( 'Address', 'iscp' ); ?></span>
									<em><?php echo esc_html( $iscp_contact['address'] ); ?></em>
								</li>
							</ul>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="iscp-contact-meta-grid">
				<article class="iscp-card iscp-contact-card">
					<div class="iscp-card-body">
						<span class="iscp-contact-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="M4 5h16v12H7l-3 3V5Zm2 2v8.2l.2-.2H18V7H6Zm2 2h8v2H8V9Zm0 3h6v2H8v-2Z"/></svg>
						</span>
						<p class="iscp-card-kicker"><?php esc_html_e( 'Team Email', 'iscp' ); ?></p>
						<h2><a href="<?php echo esc_url( 'mailto:' . $iscp_india_contact['team_email'] ); ?>"><?php echo esc_html( $iscp_india_contact['team_email'] ); ?></a></h2>
					</div>
				</article>

				<article class="iscp-card iscp-contact-card">
					<div class="iscp-card-body">
						<span class="iscp-contact-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="M3 5h18v14H3V5Zm2 2v10h14V7H5Zm2 2h10v2H7V9Zm0 4h7v2H7v-2Z"/></svg>
						</span>
						<p class="iscp-card-kicker"><?php esc_html_e( 'Locations', 'iscp' ); ?></p>
						<h2><?php echo esc_html( $iscp_locations ); ?></h2>
					</div>
				</article>

				<article class="iscp-card iscp-contact-card">
					<div class="iscp-card-body">
						<span class="iscp-contact-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20Zm1 5h-2v6l5 3 1-1.7-4-2.3V7Z"/></svg>
						</span>
						<p class="iscp-card-kicker"><?php esc_html_e( 'Business Hours', 'iscp' ); ?></p>
						<h2><?php echo esc_html( $iscp_hours ); ?></h2>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section id="contact-form" class="iscp-section iscp-section-muted">
		<div class="iscp-container iscp-contact-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Project Inquiry', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Share your requirement with Indian Servers', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'For HRMS, CRM, school software, restaurant software, cloud hosting, AI, AR, VAPT or custom development, contact our India or USA team directly.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-action-row">
				<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( $iscp_whatsapp ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Send WhatsApp', 'iscp' ); ?></a>
				<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( 'mailto:' . $iscp_india_contact['email'] ); ?>"><?php esc_html_e( 'Email India', 'iscp' ); ?></a>
				<a class="iscp-btn iscp-btn-secondary" href="<?php echo esc_url( 'mailto:' . $iscp_usa_contact['email'] ); ?>"><?php esc_html_e( 'Email USA', 'iscp' ); ?></a>
			</div>
			<div class="iscp-contact-socials" aria-label="<?php esc_attr_e( 'Indian Servers social media handles', 'iscp' ); ?>">
				<?php foreach ( $iscp_socials as $iscp_label => $iscp_url ) : ?>
					<a href="<?php echo esc_url( $iscp_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $iscp_label ); ?>">
						<?php iscp_render_social_icon( $iscp_label ); ?>
						<span class="iscp-screen-reader-text"><?php echo esc_html( $iscp_label ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-contact-routing-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'How to Reach Us', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Route your inquiry to the right Indian Servers team', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Whether you are evaluating a product, building custom software, moving to cloud or planning security review, send a short note and we will guide the next step.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-contact-route-grid">
				<?php foreach ( $iscp_contact_paths as $iscp_path ) : ?>
					<article class="iscp-contact-route-card">
						<span aria-hidden="true">
							<?php echo iscp_get_menu_icon_markup( $iscp_path['icon'] ); ?>
						</span>
						<h3><?php echo esc_html( $iscp_path['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_path['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted iscp-contact-confidence-section">
		<div class="iscp-container iscp-contact-confidence-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Before You Contact', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A useful first message gets you a faster response', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Mention the service or product you need, current system if any, approximate users, must-have integrations, preferred timeline and location. Our team can then respond with a practical path forward.', 'iscp' ); ?></p>
			</div>
			<ul class="iscp-check-list">
				<?php foreach ( $iscp_contact_promises as $iscp_promise ) : ?>
					<li><?php echo esc_html( $iscp_promise ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</main>

<?php
get_footer();
