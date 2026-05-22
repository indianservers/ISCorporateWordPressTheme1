<?php
/**
 * Template Name: ISCP Full Width
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-full-width">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Full Width', 'iscp' ),
			'title'       => get_the_title(),
			'description' => __( 'A clean full-width canvas for custom corporate pages, block patterns and long-form business content.', 'iscp' ),
			'variant'     => 'minimal',
		)
	);
	iscp_render_page_content_area();
	?>
</main>

<?php
get_footer();
