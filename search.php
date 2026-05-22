<?php
/**
 * Search template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
?>

<div class="iscp-container iscp-content-layout">
	<header class="iscp-archive-header">
		<h1 class="iscp-page-title">
			<?php
			if ( get_search_query() ) {
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Search results for: %s', 'iscp' ),
					esc_html( get_search_query() )
				);
			} else {
				esc_html_e( 'Search Indian Servers', 'iscp' );
			}
			?>
		</h1>
		<form class="iscp-search-page-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="iscp-screen-reader-text" for="iscp-search-page-field"><?php esc_html_e( 'Search', 'iscp' ); ?></label>
			<input id="iscp-search-page-field" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search products, services, posts...', 'iscp' ); ?>">
			<button class="iscp-btn iscp-btn-primary" type="submit"><?php esc_html_e( 'Search', 'iscp' ); ?></button>
		</form>
	</header>

	<?php
	if ( have_posts() ) :
		?>
		<div class="iscp-content-with-sidebar">
			<div class="iscp-content-list">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;

		the_posts_navigation();
		?>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<aside class="iscp-sidebar" aria-label="<?php esc_attr_e( 'Search sidebar', 'iscp' ); ?>">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside>
			<?php endif; ?>
		</div>
		<?php
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</div>

<?php
get_footer();
