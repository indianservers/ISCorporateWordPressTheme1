<?php
/**
 * Page content.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'iscp-entry iscp-page-entry' ); ?>>
	<header class="iscp-entry-header">
		<?php the_title( '<h1 class="iscp-entry-title">', '</h1>' ); ?>
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
</article>

