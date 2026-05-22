<?php
/**
 * Main template file.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

$iscp_slider = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 5,
		'ignore_sticky_posts' => true,
	)
);
?>

<section class="iscp-section iscp-index-hero">
	<div class="iscp-container iscp-index-hero-grid">
		<div class="iscp-index-hero-copy iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Insights', 'iscp' ); ?></p>
			<h1><?php echo esc_html( is_home() && ! is_front_page() ? single_post_title( '', false ) : get_bloginfo( 'name' ) ); ?></h1>
			<p><?php esc_html_e( 'Explore updates, ideas, guides and business resources from this website.', 'iscp' ); ?></p>
		</div>

		<?php if ( $iscp_slider->have_posts() ) : ?>
			<div class="iscp-index-slider iscp-reveal" data-iscp-slider>
				<div class="iscp-index-slider-track">
					<?php
					$iscp_slide_index = 0;
					while ( $iscp_slider->have_posts() ) :
						$iscp_slider->the_post();
						$iscp_slide_index++;
						?>
						<article class="iscp-index-slide <?php echo 1 === $iscp_slide_index ? 'iscp-index-slide-active' : ''; ?>" data-iscp-slide>
							<a class="iscp-index-slide-media" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'iscp-wide' ); ?>
								<?php else : ?>
									<span class="iscp-index-slide-placeholder" aria-hidden="true"></span>
								<?php endif; ?>
							</a>
							<div class="iscp-index-slide-content">
								<p class="iscp-card-kicker"><?php echo esc_html( get_the_date() ); ?></p>
								<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
								<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="iscp-index-slider-controls">
					<button class="iscp-slider-btn" type="button" data-iscp-slider-prev aria-label="<?php esc_attr_e( 'Previous slide', 'iscp' ); ?>"><?php esc_html_e( 'Prev', 'iscp' ); ?></button>
					<div class="iscp-slider-dots" role="tablist" aria-label="<?php esc_attr_e( 'Featured posts', 'iscp' ); ?>">
						<?php for ( $iscp_i = 0; $iscp_i < $iscp_slide_index; $iscp_i++ ) : ?>
							<button class="iscp-slider-dot <?php echo 0 === $iscp_i ? 'iscp-slider-dot-active' : ''; ?>" type="button" data-iscp-slider-dot="<?php echo esc_attr( $iscp_i ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'iscp' ), $iscp_i + 1 ) ); ?>"></button>
						<?php endfor; ?>
					</div>
					<button class="iscp-slider-btn" type="button" data-iscp-slider-next aria-label="<?php esc_attr_e( 'Next slide', 'iscp' ); ?>"><?php esc_html_e( 'Next', 'iscp' ); ?></button>
				</div>
			</div>
		<?php else : ?>
			<div class="iscp-index-slider iscp-index-slider-empty iscp-reveal">
				<span class="iscp-index-slide-placeholder" aria-hidden="true"></span>
				<div class="iscp-index-slide-content">
					<h2><?php esc_html_e( 'Publish posts to activate the featured slider.', 'iscp' ); ?></h2>
					<p><?php esc_html_e( 'The index page will automatically show recent posts with featured images when content is available.', 'iscp' ); ?></p>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<div class="iscp-container iscp-content-layout iscp-index-layout">
	<?php if ( have_posts() ) : ?>
		<div class="iscp-content-with-sidebar">
			<div class="iscp-content-list">
				<div class="iscp-section-heading">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Latest Posts', 'iscp' ); ?></p>
					<h2><?php esc_html_e( 'Browse Recent Articles', 'iscp' ); ?></h2>
				</div>
				<div class="iscp-card-grid iscp-card-grid-3 iscp-index-post-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					?>
				</div>

				<?php the_posts_pagination(); ?>
			</div>
			<?php if ( is_active_sidebar( 'blog-sidebar' ) || is_active_sidebar( 'sidebar-1' ) ) : ?>
				<aside class="iscp-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'iscp' ); ?>">
					<?php dynamic_sidebar( is_active_sidebar( 'blog-sidebar' ) ? 'blog-sidebar' : 'sidebar-1' ); ?>
				</aside>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</div>

<?php
get_footer();
