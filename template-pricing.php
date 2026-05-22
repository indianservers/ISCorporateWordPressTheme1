<?php
/**
 * Template Name: ISCP Pricing Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-pricing">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Pricing', 'iscp' ),
			'title'       => __( 'Present Packages With Confidence', 'iscp' ),
			'description' => __( 'A pricing page for service packages, retainers, subscriptions or product tiers.', 'iscp' ),
			'variant'     => 'pricing',
			'primary'     => array( 'label' => __( 'Compare Plans', 'iscp' ), 'url' => '#comparison' ),
		)
	);
	get_template_part( 'template-parts/sections/pricing' );
	?>
	<section id="comparison" class="iscp-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Plan Comparison', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Help Buyers Choose the Right Level', 'iscp' ); ?></h2>
			</div>
			<?php
			iscp_render_comparison_table(
				__( 'Pricing comparison', 'iscp' ),
				array( __( 'Feature', 'iscp' ), __( 'Starter', 'iscp' ), __( 'Professional', 'iscp' ), __( 'Enterprise', 'iscp' ) ),
				array(
					array( __( 'Core pages', 'iscp' ), __( 'Yes', 'iscp' ), __( 'Yes', 'iscp' ), __( 'Yes', 'iscp' ) ),
					array( __( 'Advanced sections', 'iscp' ), __( 'Limited', 'iscp' ), __( 'Yes', 'iscp' ), __( 'Yes', 'iscp' ) ),
					array( __( 'Dedicated strategy', 'iscp' ), __( 'No', 'iscp' ), __( 'Optional', 'iscp' ), __( 'Yes', 'iscp' ) ),
				)
			);
			?>
		</div>
	</section>
	<?php
	get_template_part( 'template-parts/sections/faq' );
	iscp_render_page_content_area();
	get_template_part( 'template-parts/sections/cta' );
	?>
</main>

<?php
get_footer();
