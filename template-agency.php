<?php
/**
 * Template Name: ISCP Agency Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-agency">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Agency Page', 'iscp' ),
			'title'       => __( 'Present Creative Services With Business Clarity', 'iscp' ),
			'description' => __( 'A polished agency structure for services, case studies, process, testimonials and inquiry-focused calls to action.', 'iscp' ),
			'variant'     => 'agency',
			'visual'      => 'app-window',
			'primary'     => array( 'label' => __( 'Discuss a Project', 'iscp' ), 'url' => '#contact' ),
		)
	);
	get_template_part( 'template-parts/sections/services' );
	get_template_part( 'template-parts/sections/case-studies' );
	get_template_part( 'template-parts/sections/process' );
	get_template_part( 'template-parts/sections/testimonials' );
	iscp_render_page_content_area();
	get_template_part( 'template-parts/sections/cta' );
	?>
</main>

<?php
get_footer();
