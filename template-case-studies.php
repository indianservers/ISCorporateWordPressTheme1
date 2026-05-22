<?php
/**
 * Template Name: ISCP Case Studies Page
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-case-studies">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Case Studies', 'iscp' ),
			'title'       => __( 'Show Proof With a Clean Results Library', 'iscp' ),
			'description' => __( 'An archive-style page for projects, outcomes, categories and credibility-building stories.', 'iscp' ),
			'variant'     => 'case-studies',
			'primary'     => array( 'label' => __( 'View Projects', 'iscp' ), 'url' => '#case-grid' ),
		)
	);
	?>
	<section id="case-grid" class="iscp-section">
		<div class="iscp-container">
			<div class="iscp-template-filter-row">
				<span class="iscp-pill"><?php esc_html_e( 'All', 'iscp' ); ?></span>
				<span class="iscp-pill"><?php esc_html_e( 'SaaS', 'iscp' ); ?></span>
				<span class="iscp-pill"><?php esc_html_e( 'Services', 'iscp' ); ?></span>
				<span class="iscp-pill"><?php esc_html_e( 'Training', 'iscp' ); ?></span>
			</div>
			<?php iscp_render_case_study_grid( 9 ); ?>
		</div>
	</section>
	<?php
	iscp_render_page_content_area();
	get_template_part( 'template-parts/sections/cta' );
	?>
</main>

<?php
get_footer();
