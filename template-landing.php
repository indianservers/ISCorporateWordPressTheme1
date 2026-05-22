<?php
/**
 * Template Name: ISCP Landing Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-landing">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Landing Page', 'iscp' ),
			'title'       => __( 'Launch a Focused Campaign Page', 'iscp' ),
			'description' => __( 'Use a premium, conversion-focused page structure for offers, services, products and lead generation campaigns.', 'iscp' ),
			'variant'     => 'landing',
			'visual'      => 'dashboard',
			'primary'     => array( 'label' => __( 'Start Now', 'iscp' ), 'url' => '#contact' ),
			'secondary'   => array( 'label' => __( 'View Sections', 'iscp' ), 'url' => '#features' ),
		)
	);
	get_template_part( 'template-parts/sections/trust-strip' );
	get_template_part( 'template-parts/sections/features' );
	get_template_part( 'template-parts/sections/services' );
	get_template_part( 'template-parts/sections/testimonials' );
	get_template_part( 'template-parts/sections/faq' );
	iscp_render_page_content_area();
	get_template_part( 'template-parts/sections/cta' );
	?>
</main>

<?php
get_footer();
