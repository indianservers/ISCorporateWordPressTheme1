<?php
/**
 * Single post template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
?>

<div class="iscp-container iscp-content-layout">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'iscp-entry iscp-single-entry' ); ?>>
			<header class="iscp-entry-header">
				<?php the_title( '<h1 class="iscp-entry-title">', '</h1>' ); ?>
				<div class="iscp-entry-meta">
					<?php iscp_posted_on(); ?>
					<?php iscp_posted_by(); ?>
					<?php iscp_render_reading_time(); ?>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="iscp-entry-media">
					<?php the_post_thumbnail( 'iscp-wide' ); ?>
				</div>
			<?php endif; ?>

			<div class="iscp-entry-content">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="iscp-page-links">' . esc_html__( 'Pages:', 'iscp' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<footer class="iscp-entry-footer">
				<?php iscp_entry_footer(); ?>
				<?php iscp_render_share_buttons(); ?>
			</footer>
		</article>

		<?php
		the_post_navigation(
			array(
				'prev_text' => esc_html__( 'Previous: %title', 'iscp' ),
				'next_text' => esc_html__( 'Next: %title', 'iscp' ),
			)
		);

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>

	<?php if ( is_active_sidebar( 'blog-sidebar' ) || is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside class="iscp-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'iscp' ); ?>">
			<?php dynamic_sidebar( is_active_sidebar( 'blog-sidebar' ) ? 'blog-sidebar' : 'sidebar-1' ); ?>
		</aside>
	<?php endif; ?>
</div>

<?php
get_footer();
