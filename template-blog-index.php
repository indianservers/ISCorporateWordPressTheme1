<?php
/**
 * Theme-owned blog index.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => -1,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
	)
);

$iscp_total_posts = (int) $iscp_posts->post_count;

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-blog-index-page">
	<section class="iscp-section iscp-section-muted iscp-blog-direct-list">
		<div class="iscp-container">
			<?php if ( $iscp_posts->have_posts() ) : ?>
				<div class="iscp-blog-link-grid" data-iscp-blog-grid data-initial-count="15" data-batch-count="15">
					<?php
					$iscp_index = 0;
					while ( $iscp_posts->have_posts() ) :
						$iscp_posts->the_post();
						$iscp_index++;
						$iscp_hidden = $iscp_index > 15;
						?>
						<article class="iscp-blog-link-card<?php echo $iscp_hidden ? ' iscp-blog-link-card-hidden' : ''; ?>" <?php echo $iscp_hidden ? 'hidden' : ''; ?> data-iscp-blog-card>
							<a href="<?php the_permalink(); ?>">
								<span class="iscp-blog-link-title"><?php the_title(); ?></span>
								<span class="iscp-blog-link-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></span>
								<span class="iscp-blog-link-action"><?php esc_html_e( 'Read post', 'iscp' ); ?> <span aria-hidden="true">-&gt;</span></span>
							</a>
						</article>
					<?php endwhile; ?>
				</div>

				<?php if ( $iscp_total_posts > 15 ) : ?>
					<div class="iscp-blog-load-more-wrap">
						<button class="iscp-btn iscp-btn-primary" type="button" data-iscp-blog-load-more>
							<?php esc_html_e( 'Load More Previous Posts', 'iscp' ); ?>
						</button>
						<p data-iscp-blog-count>
							<?php
							printf(
								/* translators: 1: visible posts, 2: total posts. */
								esc_html__( 'Showing %1$s of %2$s posts', 'iscp' ),
								esc_html( number_format_i18n( min( 15, $iscp_total_posts ) ) ),
								esc_html( number_format_i18n( $iscp_total_posts ) )
							);
							?>
						</p>
					</div>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="iscp-card">
					<h2><?php esc_html_e( 'No posts published yet.', 'iscp' ); ?></h2>
					<p><?php esc_html_e( 'Publish blog posts from the WordPress dashboard and they will appear here automatically.', 'iscp' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var grid = document.querySelector('[data-iscp-blog-grid]');
	var button = document.querySelector('[data-iscp-blog-load-more]');
	var count = document.querySelector('[data-iscp-blog-count]');

	if (!grid || !button) {
		return;
	}

	var cards = Array.prototype.slice.call(grid.querySelectorAll('[data-iscp-blog-card]'));
	var batch = parseInt(grid.getAttribute('data-batch-count') || '15', 10);

	function visibleCount() {
		return cards.filter(function (card) {
			return !card.hidden;
		}).length;
	}

	function updateState() {
		var visible = visibleCount();

		if (count) {
			count.textContent = 'Showing ' + visible + ' of ' + cards.length + ' posts';
		}

		if (visible >= cards.length) {
			button.hidden = true;
		}
	}

	button.addEventListener('click', function () {
		var hidden = cards.filter(function (card) {
			return card.hidden;
		}).slice(0, batch);

		hidden.forEach(function (card) {
			card.hidden = false;
			card.classList.remove('iscp-blog-link-card-hidden');
		});

		updateState();
	});

	updateState();
});
</script>

<?php
get_footer();
