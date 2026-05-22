<?php
/**
 * Template Name: ISCP Consulting Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-consulting">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Consulting Authority', 'iscp' ),
			'title'       => __( 'Build Trust Before the First Consultation', 'iscp' ),
			'description' => __( 'A focused consulting page for expertise, outcomes, process, proof and consultation requests.', 'iscp' ),
			'variant'     => 'consulting',
			'primary'     => array( 'label' => __( 'Schedule Consultation', 'iscp' ), 'url' => '#contact' ),
			'secondary'   => array( 'label' => __( 'View Results', 'iscp' ), 'url' => '#case-studies' ),
		)
	);
	get_template_part( 'template-parts/sections/features' );
	get_template_part( 'template-parts/sections/stats' );
	get_template_part( 'template-parts/sections/process' );
	get_template_part( 'template-parts/sections/case-studies' );
	get_template_part( 'template-parts/sections/testimonials' );
	iscp_render_page_content_area();
	iscp_render_template_cta( __( 'Need Expert Guidance for the Next Step?', 'iscp' ), __( 'Create a clear path from credibility to consultation with this reusable page structure.', 'iscp' ), __( 'Start a Conversation', 'iscp' ), '#contact' );
	?>
</main>

<?php
get_footer();
