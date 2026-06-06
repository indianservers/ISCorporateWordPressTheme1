<?php
/**
 * Template Name: ISCP Partner Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_partner_whatsapp = 'https://wa.me/919618222220?text=' . rawurlencode( __( 'Hello Indian Servers, I am interested in becoming a partner.', 'iscp' ) );
$iscp_partner_email    = 'mailto:info@indianservers.com?subject=' . rawurlencode( __( 'Partnership Enquiry', 'iscp' ) );
$iscp_partner_image    = get_template_directory_uri() . '/assets/images/indianservers-global-cloud.png';

$iscp_partner_stats = array(
	array( 'value' => '2200+', 'label' => __( 'customers served across business verticals', 'iscp' ) ),
	array( 'value' => '15+', 'label' => __( 'years of software, cloud and security delivery', 'iscp' ) ),
	array( 'value' => '8', 'label' => __( 'SaaS and business software product lines', 'iscp' ) ),
	array( 'value' => '3', 'label' => __( 'incorporated regions with global delivery reach', 'iscp' ) ),
);

$iscp_partner_models = array(
	array(
		'title' => __( 'Sales and Referral Partners', 'iscp' ),
		'text'  => __( 'Introduce qualified businesses that need software, cloud hosting, SaaS products, cyber security or AI systems, and work with a team that can convert needs into clear delivery plans.', 'iscp' ),
		'icon'  => 'team',
	),
	array(
		'title' => __( 'Implementation Partners', 'iscp' ),
		'text'  => __( 'Collaborate on deployment, onboarding, training and customer success for HRMS, School ERP, CRM, Inventory, LMS, POS, ERP and managed cloud platforms.', 'iscp' ),
		'icon'  => 'code',
	),
	array(
		'title' => __( 'Technology Alliance Partners', 'iscp' ),
		'text'  => __( 'Build integrations, hosting bundles, AI automation workflows and industry solutions around Indian Servers products and engineering capabilities.', 'iscp' ),
		'icon'  => 'cloud',
	),
);

$iscp_partner_benefits = array(
	__( 'A strong Indian technology brand with delivery experience since 2009.', 'iscp' ),
	__( 'Portfolio coverage across SaaS products, custom software, cloud, AI, AR/VR, VAPT and managed security.', 'iscp' ),
	__( 'Partner enablement support for demos, requirement analysis, proposals and implementation planning.', 'iscp' ),
	__( 'Flexible engagement models for regional consultants, agencies, IT firms and business development partners.', 'iscp' ),
	__( 'Long-term customer support from Indian Servers teams after project handover or product rollout.', 'iscp' ),
);

$iscp_partner_process = array(
	array( 'step' => '01', 'title' => __( 'Partner Fit Discussion', 'iscp' ), 'text' => __( 'We understand your market, customer profile, strengths and the solutions you want to represent.', 'iscp' ) ),
	array( 'step' => '02', 'title' => __( 'Solution and Commercial Alignment', 'iscp' ), 'text' => __( 'Our team maps products, services, pricing, responsibilities and delivery flow for your partnership model.', 'iscp' ) ),
	array( 'step' => '03', 'title' => __( 'Enablement and Launch', 'iscp' ), 'text' => __( 'You receive sales context, demo support, technical guidance and a clear route to start working on opportunities.', 'iscp' ) ),
	array( 'step' => '04', 'title' => __( 'Delivery and Growth', 'iscp' ), 'text' => __( 'Indian Servers supports discovery, proposals, execution, deployment and customer success for qualified accounts.', 'iscp' ) ),
);

$iscp_partner_focus = array(
	__( 'Software and SaaS resellers', 'iscp' ),
	__( 'Digital agencies', 'iscp' ),
	__( 'IT consultants', 'iscp' ),
	__( 'Cloud and hosting providers', 'iscp' ),
	__( 'Cyber security firms', 'iscp' ),
	__( 'Regional business developers', 'iscp' ),
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-partner-page">
	<section class="iscp-partner-hero">
		<div class="iscp-container iscp-partner-hero-grid">
			<div class="iscp-partner-hero-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Indian Servers Partner Program', 'iscp' ); ?></p>
				<h1><?php esc_html_e( 'Become Our Partner', 'iscp' ); ?></h1>
				<p><?php esc_html_e( 'Partner with Indian Servers Private Limited to take proven software products, custom development, cloud infrastructure, AI automation and cyber security services to more businesses across India and global markets.', 'iscp' ); ?></p>
				<div class="iscp-action-row">
					<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( $iscp_partner_whatsapp ); ?>"><?php esc_html_e( 'Start Partner Discussion', 'iscp' ); ?></a>
					<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( $iscp_partner_email ); ?>"><?php esc_html_e( 'Email Partnership Team', 'iscp' ); ?></a>
				</div>
			</div>
			<div class="iscp-partner-hero-panel" aria-label="<?php esc_attr_e( 'Indian Servers partnership strengths', 'iscp' ); ?>">
				<img src="<?php echo esc_url( $iscp_partner_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers global technology and cloud partnership network', 'iscp' ); ?>" loading="eager" decoding="async">
				<div class="iscp-partner-hero-metrics">
					<?php foreach ( $iscp_partner_stats as $iscp_partner_stat ) : ?>
						<span>
							<strong><?php echo esc_html( $iscp_partner_stat['value'] ); ?></strong>
							<?php echo esc_html( $iscp_partner_stat['label'] ); ?>
						</span>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-partner-models-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Partnership Models', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Ways to grow with Indian Servers', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Whether you generate business, implement solutions, or build around our technology stack, we help you create value with a serious delivery organization behind you.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-partner-model-grid">
				<?php foreach ( $iscp_partner_models as $iscp_partner_model ) : ?>
					<article class="iscp-partner-model-card">
						<span class="iscp-partner-icon" aria-hidden="true"><?php echo iscp_get_menu_icon_markup( $iscp_partner_model['icon'] ); ?></span>
						<h3><?php echo esc_html( $iscp_partner_model['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_partner_model['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-partner-benefits-section">
		<div class="iscp-container iscp-partner-benefits-grid">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Why Partner With Us', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A complete technology portfolio for serious business conversations', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers gives partners a practical advantage: one company that can consult, build, host, secure, maintain and scale technology for customers.', 'iscp' ); ?></p>
			</div>
			<ul class="iscp-partner-benefit-list">
				<?php foreach ( $iscp_partner_benefits as $iscp_partner_benefit ) : ?>
					<li><?php echo esc_html( $iscp_partner_benefit ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Partner Journey', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'A clear path from introduction to active opportunities', 'iscp' ); ?></h2>
			</div>
			<div class="iscp-partner-process-grid">
				<?php foreach ( $iscp_partner_process as $iscp_partner_step ) : ?>
					<article class="iscp-partner-process-card">
						<strong><?php echo esc_html( $iscp_partner_step['step'] ); ?></strong>
						<h3><?php echo esc_html( $iscp_partner_step['title'] ); ?></h3>
						<p><?php echo esc_html( $iscp_partner_step['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section">
		<div class="iscp-container iscp-partner-fit-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Who This Is For', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Built for partners with customer access and technology ambition', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'We are looking for partners who can identify real business requirements, communicate professionally and collaborate with Indian Servers through discovery, proposal, delivery and support.', 'iscp' ); ?></p>
				<div class="iscp-partner-focus-row">
					<?php foreach ( $iscp_partner_focus as $iscp_partner_focus_item ) : ?>
						<span><?php echo esc_html( $iscp_partner_focus_item ); ?></span>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="iscp-partner-fit-card">
				<h3><?php esc_html_e( 'Ready to discuss partnership?', 'iscp' ); ?></h3>
				<p><?php esc_html_e( 'Share your city, business profile, customer segment and the solutions you want to promote. Our team will review fit and suggest the next step.', 'iscp' ); ?></p>
				<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( $iscp_partner_whatsapp ); ?>"><?php esc_html_e( 'Contact on WhatsApp', 'iscp' ); ?></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
