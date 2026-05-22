<?php
/**
 * Compact recent posts section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
	)
);
$iscp_posts_page_id = get_option( 'page_for_posts' );
$iscp_posts_url     = $iscp_posts_page_id ? get_permalink( $iscp_posts_page_id ) : home_url( '/blog/' );

$iscp_placeholders = array(
	'AI Automation for Indian Businesses',
	'Choosing the Right Cloud Hosting Plan',
	'Why VAPT Matters Before Launch',
	'How CRM Improves Follow-Ups',
	'School ERP Modules That Save Time',
	'Modern Inventory Software Basics',
	'Restaurant POS and KOT Workflows',
	'When to Hire Dedicated Developers',
);
?>

<section class="iscp-section iscp-home-blog">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Posts', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Recent News', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-recent-post-grid">
			<?php if ( $iscp_posts->have_posts() ) : ?>
				<?php
				while ( $iscp_posts->have_posts() ) :
					$iscp_posts->the_post();
					?>
					<article class="iscp-recent-post-card iscp-reveal">
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="iscp-recent-post-media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php the_post_thumbnail( 'iscp-card' ); ?>
							</a>
						<?php endif; ?>
						<div>
							<span><?php echo esc_html( get_the_date( 'M j' ) ); ?></span>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_placeholders as $iscp_title ) : ?>
					<article class="iscp-recent-post-card iscp-reveal">
						<div>
							<span><?php esc_html_e( 'Insight', 'iscp' ); ?></span>
							<h3><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php echo esc_html( $iscp_title ); ?></a></h3>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="iscp-news-actions iscp-reveal">
			<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( $iscp_posts_url ); ?>"><?php esc_html_e( 'Load More News', 'iscp' ); ?></a>
		</div>
	</div>
</section>
