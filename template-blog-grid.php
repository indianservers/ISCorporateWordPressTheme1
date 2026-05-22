<?php
/**
 * Template Name: ISCP Blog Grid
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_paged = max( 1, absint( get_query_var( 'paged' ) ), absint( get_query_var( 'page' ) ) );
$iscp_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'paged'               => $iscp_paged,
		'posts_per_page'      => 9,
		'ignore_sticky_posts' => true,
	)
);

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-template-blog-grid">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Insights', 'iscp' ),
			'title'       => __( 'Publish Ideas in a Clean Editorial Grid', 'iscp' ),
			'description' => __( 'A blog grid template with search, categories, post cards and pagination.', 'iscp' ),
			'variant'     => 'blog',
		)
	);
	?>
	<section class="iscp-section">
		<div class="iscp-container">
			<div class="iscp-template-blog-tools">
				<?php get_search_form(); ?>
				<div class="iscp-template-category-list">
					<ul>
						<?php wp_list_categories( array( 'title_li' => '', 'number' => 8 ) ); ?>
					</ul>
				</div>
			</div>
			<div class="iscp-card-grid iscp-card-grid-3">
				<?php if ( $iscp_posts->have_posts() ) : ?>
					<?php
					while ( $iscp_posts->have_posts() ) :
						$iscp_posts->the_post();
						get_template_part( 'template-parts/content' );
					endwhile;
					?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<div class="iscp-pagination">
				<?php
				echo wp_kses_post(
					paginate_links(
						array(
							'total'   => $iscp_posts->max_num_pages,
							'current' => $iscp_paged,
						)
					)
				);
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<?php iscp_render_page_content_area(); ?>
</main>

<?php
get_footer();
