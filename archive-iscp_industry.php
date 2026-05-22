<?php
/**
 * Industry archive template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
?>

<section class="iscp-section iscp-archive-hero">
	<div class="iscp-container">
		<p class="iscp-eyebrow"><?php esc_html_e( 'Industries', 'iscp' ); ?></p>
		<h1><?php echo esc_html( post_type_archive_title( '', false ) ); ?></h1>
		<?php the_archive_description( '<div class="iscp-archive-description">', '</div>' ); ?>
	</div>
</section>

<div class="iscp-container iscp-content-layout">
	<?php if ( have_posts() ) : ?>
		<div class="iscp-industry-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/cards/card', 'industry' );
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
