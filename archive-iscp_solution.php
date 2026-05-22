<?php
/**
 * Solution archive template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
?>

<section class="iscp-section iscp-archive-hero">
	<div class="iscp-container">
		<p class="iscp-eyebrow"><?php esc_html_e( 'Products', 'iscp' ); ?></p>
		<h1><?php esc_html_e( 'Products & Solutions', 'iscp' ); ?></h1>
		<?php if ( get_the_archive_description() ) : ?>
			<?php the_archive_description( '<div class="iscp-archive-description">', '</div>' ); ?>
		<?php else : ?>
			<p class="iscp-archive-description"><?php esc_html_e( 'Browse Indian Servers SaaS products and business platforms for HRMS, school management, CRM, inventory, restaurant POS, cloud systems and custom enterprise workflows.', 'iscp' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<div class="iscp-container iscp-content-layout">
	<?php if ( have_posts() ) : ?>
		<div class="iscp-card-grid iscp-card-grid-3">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/cards/card', 'solution' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</div>

<?php
get_footer();
