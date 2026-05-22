<?php
/**
 * Trust strip section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_logos = array(
	array( 'label' => __( 'HRMS', 'iscp' ), 'icon' => 'team' ),
	array( 'label' => __( 'School ERP', 'iscp' ), 'icon' => 'school' ),
	array( 'label' => __( 'CRM', 'iscp' ), 'icon' => 'crm' ),
	array( 'label' => __( 'Inventory', 'iscp' ), 'icon' => 'inventory' ),
	array( 'label' => __( 'Restaurant POS', 'iscp' ), 'icon' => 'restaurant' ),
	array( 'label' => __( 'AI / AR', 'iscp' ), 'icon' => 'ai' ),
	array( 'label' => __( 'VAPT', 'iscp' ), 'icon' => 'shield' ),
	array( 'label' => __( 'Cloud Hosting', 'iscp' ), 'icon' => 'cloud' ),
);

$iscp_icons = array(
	'team'       => 'M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm7.5-.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6ZM2.5 20a6.5 6.5 0 0 1 13 0h-2a4.5 4.5 0 0 0-9 0h-2Z',
	'school'     => 'M12 3 2 8l10 5 8-4v6h2V8L12 3Zm0 7.8L6.5 8 12 5.2 17.5 8 12 10.8ZM6 12v4c2.8 2.7 9.2 2.7 12 0v-4l-2 1v2.1c-2 1.3-6 1.3-8 0V13l-2-1Z',
	'crm'        => 'M4 4h16v12H7.5L4 19V4Zm2 2v8.7l.7-.7H18V6H6Zm3 2h6v2H9V8Zm0 3h8v2H9v-2Z',
	'inventory'  => 'M4 4h16v5H4V4Zm2 2v1h12V6H6Zm-1 5h14v9H5v-9Zm2 2v5h10v-5H7Zm2 1h6v2H9v-2Z',
	'restaurant' => 'M7 2h2v8H7V2Zm4 0h2v8a4 4 0 0 1-3 3.9V22H8v-8.1A4 4 0 0 1 5 10V2h2v8a2 2 0 1 0 4 0V2Zm7 0h1v20h-2v-7h-3V6a4 4 0 0 1 4-4Z',
	'ai'         => 'M11 2h2v3h-2V2ZM7 10a5 5 0 0 1 10 0v2.2l2 1.2V19H5v-5.6l2-1.2V10Zm2 0v3.3l-2 1.2V17h10v-2.5l-2-1.2V10a3 3 0 0 0-6 0Z',
	'shield'     => 'M12 2 5 5v6c0 4.4 2.8 8.5 7 10 4.2-1.5 7-5.6 7-10V5l-7-3Zm0 2.2 5 2.1V11c0 3.2-1.9 6.2-5 7.7-3.1-1.5-5-4.5-5-7.7V6.3l5-2.1Z',
	'cloud'      => 'M5 18.5h14a3 3 0 0 0 .7-5.9 5.8 5.8 0 0 0-11.1-1.8A4 4 0 0 0 5 18.5Zm0-2a2 2 0 0 1 0-4h1.2l.4-1.1a3.8 3.8 0 0 1 7.3 1.2v1.1h2.9a1.8 1.8 0 1 1 0 3.6H5Z',
);
?>

<section class="iscp-trust-strip">
	<div class="iscp-container">
		<h2><?php esc_html_e( 'Indian Servers builds SaaS products, custom software, AI systems and managed cloud solutions.', 'iscp' ); ?></h2>
		<div class="iscp-logo-strip" aria-label="<?php esc_attr_e( 'Indian Servers capability areas', 'iscp' ); ?>">
			<?php foreach ( $iscp_logos as $iscp_index => $iscp_logo ) : ?>
				<span class="iscp-product-pill iscp-product-pill-<?php echo esc_attr( (string) ( $iscp_index + 1 ) ); ?>">
					<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="<?php echo esc_attr( $iscp_icons[ $iscp_logo['icon'] ] ); ?>"/></svg>
					<?php echo esc_html( $iscp_logo['label'] ); ?>
				</span>
			<?php endforeach; ?>
		</div>
	</div>
</section>
