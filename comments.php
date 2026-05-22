<?php
/**
 * Comments template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="iscp-comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="iscp-comments-title">
			<?php
			printf(
				/* translators: %s: comment count. */
				esc_html( _n( '%s Comment', '%s Comments', get_comments_number(), 'iscp' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>

		<ol class="iscp-comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	if ( ! comments_open() && get_comments_number() ) :
		?>
		<p class="iscp-no-comments"><?php esc_html_e( 'Comments are closed.', 'iscp' ); ?></p>
		<?php
	endif;

	comment_form();
	?>
</section>

