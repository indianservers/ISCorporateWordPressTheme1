<?php
/**
 * Template Name: ISCP Product Showcase
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-product">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Product Showcase', 'iscp' ),
			'title'       => __( 'Explain a Product With Screens, Proof and Pricing', 'iscp' ),
			'description' => __( 'A product-first page structure for software modules, platforms, apps and digital products.', 'iscp' ),
			'variant'     => 'product',
			'visual'      => 'dashboard',
			'primary'     => array( 'label' => __( 'Discuss This Product', 'iscp' ), 'url' => '#contact' ),
		)
	);
	get_template_part( 'template-parts/sections/features' );
	?>
	<section class="iscp-section iscp-template-screenshots">
		<div class="iscp-container iscp-template-split">
			<?php iscp_render_mockup_component( 'dashboard' ); ?>
			<?php iscp_render_mockup_component( 'mobile' ); ?>
		</div>
	</section>
	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Comparison', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Make Product Differences Easy to Understand', 'iscp' ); ?></h2>
			</div>
			<?php
			iscp_render_comparison_table(
				__( 'Feature comparison', 'iscp' ),
				array( __( 'Capability', 'iscp' ), __( 'Starter', 'iscp' ), __( 'Professional', 'iscp' ), __( 'Enterprise', 'iscp' ) ),
				array(
					array( __( 'Core workflow', 'iscp' ), __( 'Included', 'iscp' ), __( 'Included', 'iscp' ), __( 'Included', 'iscp' ) ),
					array( __( 'Advanced dashboards', 'iscp' ), __( 'Basic', 'iscp' ), __( 'Included', 'iscp' ), __( 'Included', 'iscp' ) ),
					array( __( 'Custom integrations', 'iscp' ), __( 'Optional', 'iscp' ), __( 'Optional', 'iscp' ), __( 'Included', 'iscp' ) ),
				)
			);
			?>
		</div>
	</section>
	<?php
	get_template_part( 'template-parts/sections/pricing' );
	get_template_part( 'template-parts/sections/faq' );
	iscp_render_page_content_area();
	iscp_render_template_cta( __( 'Build a Product With Indian Servers', 'iscp' ), __( 'Connect product planning, engineering, cloud deployment and support into one reliable delivery path.', 'iscp' ), __( 'Start a Project', 'iscp' ), '#contact' );
	?>
</main>

<?php
get_footer();
