<?php
/**
 * Theme-owned blog index.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_paged = max( 1, absint( get_query_var( 'paged' ) ) );
$iscp_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 15,
		'paged'               => $iscp_paged,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
	)
);

get_header();
?>

<div id="iscp-internal-content" class="iscp-main iscp-blog-index-page">
	<section class="iscp-section iscp-section-muted iscp-blog-direct-list">
		<div class="iscp-container">
			<h1><?php esc_html_e( 'Indian Servers Blog', 'iscp' ); ?></h1>
			<?php if ( $iscp_posts->have_posts() ) : ?>
				<div class="iscp-blog-link-grid">
					<?php
					while ( $iscp_posts->have_posts() ) :
						$iscp_posts->the_post();
						?>
						<article class="iscp-blog-link-card">
							<a href="<?php the_permalink(); ?>">
								<span class="iscp-blog-link-title"><?php the_title(); ?></span>
								<span class="iscp-blog-link-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></span>
								<span class="iscp-blog-link-action"><?php esc_html_e( 'Read post', 'iscp' ); ?> <span aria-hidden="true">-&gt;</span></span>
							</a>
						</article>
					<?php endwhile; ?>
				</div>

				<nav class="iscp-blog-load-more-wrap" aria-label="<?php esc_attr_e( 'Blog pagination', 'iscp' ); ?>">
					<?php echo wp_kses_post( paginate_links( array( 'total' => $iscp_posts->max_num_pages, 'current' => $iscp_paged ) ) ); ?>
				</nav>

				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="iscp-card">
					<h2><?php esc_html_e( 'No posts published yet.', 'iscp' ); ?></h2>
					<p><?php esc_html_e( 'Publish blog posts from the WordPress dashboard and they will appear here automatically.', 'iscp' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</div>


<?php
get_footer();
