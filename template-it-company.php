<?php
/**
 * Template Name: ISCP IT Company Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-it-company">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Technology Company', 'iscp' ),
			'title'       => __( 'Showcase Technology Services With Enterprise Polish', 'iscp' ),
			'description' => __( 'A complete IT company structure for solutions, services, industries, proof and contact conversion.', 'iscp' ),
			'variant'     => 'technology',
			'visual'      => 'dashboard',
			'primary'     => array( 'label' => __( 'Explore Solutions', 'iscp' ), 'url' => '#solutions' ),
		)
	);
	get_template_part( 'template-parts/sections/solutions' );
	get_template_part( 'template-parts/sections/services' );
	get_template_part( 'template-parts/sections/industries' );
	get_template_part( 'template-parts/sections/case-studies' );
	iscp_render_page_content_area();
	iscp_render_template_cta( __( 'Ready to Talk Through a Technology Need?', 'iscp' ), __( 'Use this page to route visitors from services and proof to a serious business inquiry.', 'iscp' ), __( 'Contact Us', 'iscp' ), '#contact' );
	?>
</main>

<?php
get_footer();
