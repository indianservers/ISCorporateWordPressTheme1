<?php
/**
 * Template Name: ISCP Software Platform
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-saas">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Software Platform', 'iscp' ),
			'title'       => __( 'Present a Software Platform With Clarity', 'iscp' ),
			'description' => __( 'A practical page structure for Indian Servers software products, custom modules, cloud applications and managed digital platforms.', 'iscp' ),
			'variant'     => 'saas',
			'visual'      => 'dashboard',
			'primary'     => array( 'label' => __( 'Discuss the Platform', 'iscp' ), 'url' => '#pricing' ),
			'secondary'   => array( 'label' => __( 'Explore Features', 'iscp' ), 'url' => '#features' ),
		)
	);
	get_template_part( 'template-parts/sections/trust-strip' );
	get_template_part( 'template-parts/sections/features' );
	?>
	<section class="iscp-section iscp-section-muted iscp-template-screenshots">
		<div class="iscp-container iscp-template-split">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Product Preview', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Show the product without relying on stock images', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Replace this CSS-only dashboard preview with real product screenshots when the client content is ready.', 'iscp' ); ?></p>
			</div>
			<?php iscp_render_mockup_component( 'dashboard' ); ?>
		</div>
	</section>
	<?php
	get_template_part( 'template-parts/sections/solutions' );
	get_template_part( 'template-parts/sections/pricing' );
	get_template_part( 'template-parts/sections/faq' );
	iscp_render_page_content_area();
	iscp_render_template_cta( __( 'Ready to Build a Reliable Platform?', 'iscp' ), __( 'Use Indian Servers for software planning, engineering, deployment and long-term support.', 'iscp' ), __( 'Talk to Our Team', 'iscp' ), '#contact' );
	?>
</main>

<?php
get_footer();
