<?php
/**
 * Template Name: ISCP Training Institute Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-training">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Training Institute', 'iscp' ),
			'title'       => __( 'Promote Courses, Outcomes and Enrollment Clearly', 'iscp' ),
			'description' => __( 'A structured page for institutes, cohort programs, skill academies and professional training teams.', 'iscp' ),
			'variant'     => 'training',
			'visual'      => 'mobile',
			'primary'     => array( 'label' => __( 'View Programs', 'iscp' ), 'url' => '#solutions' ),
		)
	);
	get_template_part( 'template-parts/sections/solutions' );
	get_template_part( 'template-parts/sections/features' );
	get_template_part( 'template-parts/sections/stats' );
	get_template_part( 'template-parts/sections/testimonials' );
	get_template_part( 'template-parts/sections/faq' );
	iscp_render_page_content_area();
	iscp_render_template_cta( __( 'Ready to Open Enrollment?', 'iscp' ), __( 'Guide students and teams from outcomes to inquiry with a focused training page.', 'iscp' ), __( 'Enroll Now', 'iscp' ), '#contact' );
	?>
</main>

<?php
get_footer();
