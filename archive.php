<?php
/**
 * Archive template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
$iscp_archive_sidebar = 'sidebar-1';

if ( class_exists( 'WooCommerce' ) && function_exists( 'is_woocommerce' ) && is_woocommerce() && is_active_sidebar( 'woocommerce-sidebar' ) ) {
	$iscp_archive_sidebar = 'woocommerce-sidebar';
} elseif ( is_active_sidebar( 'blog-sidebar' ) ) {
	$iscp_archive_sidebar = 'blog-sidebar';
}
?>

<div class="iscp-container iscp-content-layout">
	<header class="iscp-archive-header">
		<?php
		the_archive_title( '<h1 class="iscp-page-title">', '</h1>' );
		the_archive_description( '<div class="iscp-archive-description">', '</div>' );
		?>
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
			<?php if ( is_active_sidebar( $iscp_archive_sidebar ) ) : ?>
				<aside class="iscp-sidebar" aria-label="<?php esc_attr_e( 'Archive sidebar', 'iscp' ); ?>">
					<?php dynamic_sidebar( $iscp_archive_sidebar ); ?>
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
