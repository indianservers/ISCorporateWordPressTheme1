<?php
/**
 * CTA section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="iscp-section iscp-cta-section">
	<div class="iscp-container iscp-cta-box iscp-reveal">
		<div>
			<p class="iscp-eyebrow"><?php esc_html_e( 'Work With Indian Servers', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Need HRMS, CRM, ERP, AI, AR, VAPT or Cloud Hosting?', 'iscp' ); ?></h2>
			<p><?php esc_html_e( 'Talk to Indian Servers Pvt. Ltd. for SaaS products, custom software development and managed digital infrastructure across India and global branch regions.', 'iscp' ); ?></p>
		</div>
		<div class="iscp-action-row">
			<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a Project', 'iscp' ); ?></a>
			<a class="iscp-btn iscp-btn-light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'iscp' ); ?></a>
		</div>
	</div>
</section>
