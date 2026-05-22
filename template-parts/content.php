<?php
/**
 * Default content card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'iscp-card iscp-entry-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="iscp-card-media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'iscp-card' ); ?>
		</a>
	<?php endif; ?>

	<div class="iscp-card-body">
		<header class="iscp-entry-header">
			<?php the_title( '<h2 class="iscp-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="iscp-entry-meta">
					<?php iscp_posted_on(); ?>
					<?php iscp_posted_by(); ?>
				</div>
			<?php endif; ?>
		</header>

		<div class="iscp-entry-summary">
			<?php the_excerpt(); ?>
		</div>

		<footer class="iscp-entry-footer">
			<a class="iscp-read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'iscp' ); ?></a>
		</footer>
	</div>
</article>

