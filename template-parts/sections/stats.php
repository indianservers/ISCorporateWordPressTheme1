<?php
/**
 * Stats section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_stats = array(
	array( 'value' => __( '2200+', 'iscp' ), 'label' => __( 'Clients Served', 'iscp' ) ),
	array( 'value' => __( '8+', 'iscp' ), 'label' => __( 'Core SaaS Product Lines', 'iscp' ) ),
	array( 'value' => __( '3', 'iscp' ), 'label' => __( 'India, Dubai & USA Hubs', 'iscp' ) ),
	array( 'value' => __( '2009', 'iscp' ), 'label' => __( 'Indian Servers Founded', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-stats-section">
	<div class="iscp-container iscp-stats-grid">
		<h2 class="iscp-screen-reader-text"><?php esc_html_e( 'Indian Servers Capability Highlights', 'iscp' ); ?></h2>
		<?php foreach ( $iscp_stats as $iscp_stat ) : ?>
			<div class="iscp-stat-card iscp-reveal">
				<strong><?php echo esc_html( $iscp_stat['value'] ); ?></strong>
				<span><?php echo esc_html( $iscp_stat['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
