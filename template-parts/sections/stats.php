<?php
/**
 * Stats section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_stats = array(
	array( 'value' => __( '2,200+', 'iscp' ), 'count' => '2200', 'suffix' => '+', 'label' => __( 'Businesses Trust Us Across India, USA, UAE & South Africa', 'iscp' ) ),
	array( 'value' => __( '8 SaaS', 'iscp' ), 'count' => '8', 'suffix' => ' SaaS', 'label' => __( 'Products: HRMS, ERP, CRM, Inventory, POS, LMS, Cloud & AI', 'iscp' ) ),
	array( 'value' => __( '3 Offices', 'iscp' ), 'count' => '3', 'suffix' => ' Offices', 'label' => __( 'Hyderabad (India) · Dubai (UAE) · United States', 'iscp' ) ),
	array( 'value' => __( '15+ Years', 'iscp' ), 'count' => '15', 'suffix' => '+ Years', 'label' => __( 'Building Software Since 2009', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-stats-section">
	<div class="iscp-container iscp-stats-grid">
		<h2 class="iscp-screen-reader-text"><?php esc_html_e( 'Indian Servers — Company Highlights and Global Reach', 'iscp' ); ?></h2>
		<?php foreach ( $iscp_stats as $iscp_stat ) : ?>
			<div class="iscp-stat-card iscp-reveal">
				<strong data-iscp-count="<?php echo esc_attr( $iscp_stat['count'] ); ?>" data-iscp-count-suffix="<?php echo esc_attr( $iscp_stat['suffix'] ); ?>" data-iscp-count-display="<?php echo esc_attr( $iscp_stat['value'] ); ?>"><?php echo esc_html( $iscp_stat['value'] ); ?></strong>
				<span><?php echo esc_html( $iscp_stat['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
