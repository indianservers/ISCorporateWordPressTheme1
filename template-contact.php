<?php
/**
 * Template Name: ISCP Contact Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_ceo_name   = __( 'Sai Satish', 'iscp' );
$iscp_ceo_title  = __( 'CEO, Indian Servers', 'iscp' );
$iscp_phone      = '+91 9618222220';
$iscp_tel        = '+919618222220';
$iscp_ceo_email  = 'saisatish@indianservers.com';
$iscp_team_email = 'info@indianservers.com';
$iscp_whatsapp   = 'https://wa.me/919618222220?text=' . rawurlencode( __( 'Hello Indian Servers, I would like to discuss a project.', 'iscp' ) );
$iscp_socials    = array(
	'Facebook'  => 'https://www.facebook.com/IndianServersPage',
	'LinkedIn'  => 'https://www.linkedin.com/in/indianservers/',
	'Instagram' => 'https://www.instagram.com/indianserversltd',
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-contact">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Contact Indian Servers', 'iscp' ),
			'title'       => __( 'Talk to Our Software and Cloud Team', 'iscp' ),
			'description' => __( 'Connect with Indian Servers Pvt. Ltd. for software development, SaaS products, AI, VAPT, hosting and cloud projects.', 'iscp' ),
			'variant'     => 'contact',
			'primary'     => array( 'label' => __( 'WhatsApp Sai Satish', 'iscp' ), 'url' => $iscp_whatsapp ),
			'secondary'   => array( 'label' => __( 'Call Now', 'iscp' ), 'url' => 'tel:' . $iscp_tel ),
		)
	);
	?>

	<section class="iscp-section iscp-contact-details-section">
		<div class="iscp-container iscp-card-grid iscp-card-grid-3">
			<article class="iscp-card iscp-contact-card">
				<div class="iscp-card-body">
					<span class="iscp-contact-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4.4 0-8 2.2-8 5v1h16v-1c0-2.8-3.6-5-8-5Z"/></svg>
					</span>
					<p class="iscp-card-kicker"><?php esc_html_e( 'Leadership Contact', 'iscp' ); ?></p>
					<h2><?php echo esc_html( $iscp_ceo_name ); ?></h2>
					<p><?php echo esc_html( $iscp_ceo_title ); ?></p>
				</div>
			</article>

			<article class="iscp-card iscp-contact-card">
				<div class="iscp-card-body">
					<span class="iscp-contact-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M6.6 10.8a15.5 15.5 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2 11.8 11.8 0 0 0 3.6.6 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.4a1 1 0 0 1 1 1 11.8 11.8 0 0 0 .6 3.6 1 1 0 0 1-.2 1l-2.2 2.2Z"/></svg>
					</span>
					<p class="iscp-card-kicker"><?php esc_html_e( 'Mobile', 'iscp' ); ?></p>
					<h2><a href="<?php echo esc_url( 'tel:' . $iscp_tel ); ?>"><?php echo esc_html( $iscp_phone ); ?></a></h2>
					<a class="iscp-card-link" href="<?php echo esc_url( 'tel:' . $iscp_tel ); ?>"><?php esc_html_e( 'Call Sai Satish', 'iscp' ); ?></a>
				</div>
			</article>

			<article class="iscp-card iscp-contact-card">
				<div class="iscp-card-body">
					<span class="iscp-contact-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M3 5h18a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm9 8 7.2-6H4.8L12 13Zm-3.2-1.2L4 7.8V17h16V7.8l-4.8 4 4.1 3.4-1.3 1.5-4.4-3.7-1.6 1.3-1.6-1.3-4.4 3.7-1.3-1.5 4.1-3.4Z"/></svg>
					</span>
					<p class="iscp-card-kicker"><?php esc_html_e( 'Email', 'iscp' ); ?></p>
					<h2><a href="<?php echo esc_url( 'mailto:' . $iscp_ceo_email ); ?>"><?php echo esc_html( $iscp_ceo_email ); ?></a></h2>
					<p><a href="<?php echo esc_url( 'mailto:' . $iscp_team_email ); ?>"><?php echo esc_html( $iscp_team_email ); ?></a></p>
				</div>
			</article>
		</div>
	</section>

	<section id="contact-form" class="iscp-section iscp-section-muted">
		<div class="iscp-container iscp-contact-panel">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Project Inquiry', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Share your requirement with Indian Servers', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'For HRMS, CRM, school software, restaurant software, cloud hosting, AI, AR, VAPT or custom development, contact Sai Satish or the Indian Servers team directly.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-action-row">
				<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( $iscp_whatsapp ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Send WhatsApp', 'iscp' ); ?></a>
				<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( 'mailto:' . $iscp_ceo_email ); ?>"><?php esc_html_e( 'Email CEO', 'iscp' ); ?></a>
				<a class="iscp-btn iscp-btn-secondary" href="<?php echo esc_url( 'mailto:' . $iscp_team_email ); ?>"><?php esc_html_e( 'Email Team', 'iscp' ); ?></a>
			</div>
			<div class="iscp-contact-socials" aria-label="<?php esc_attr_e( 'Indian Servers social media handles', 'iscp' ); ?>">
				<?php foreach ( $iscp_socials as $iscp_label => $iscp_url ) : ?>
					<a href="<?php echo esc_url( $iscp_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $iscp_label ); ?></a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
