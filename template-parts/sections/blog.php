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
	array(
		'title'       => __( 'AI Automation for Indian Businesses', 'iscp' ),
		'description' => __( 'Practical automation ideas for support, reporting, sales follow-ups and internal operations.', 'iscp' ),
	),
	array(
		'title'       => __( 'Choosing the Right Cloud Hosting Plan', 'iscp' ),
		'description' => __( 'How growing teams can balance performance, security, backups and managed monitoring.', 'iscp' ),
	),
	array(
		'title'       => __( 'Why VAPT Matters Before Launch', 'iscp' ),
		'description' => __( 'A clear view of how security testing reduces risk before applications go live.', 'iscp' ),
	),
	array(
		'title'       => __( 'How CRM Improves Follow-Ups', 'iscp' ),
		'description' => __( 'Better lead tracking, reminders and customer communication for sales and service teams.', 'iscp' ),
	),
	array(
		'title'       => __( 'School ERP Modules That Save Time', 'iscp' ),
		'description' => __( 'Admissions, fees, attendance and communication workflows built for institution operations.', 'iscp' ),
	),
	array(
		'title'       => __( 'Modern Inventory Software Basics', 'iscp' ),
		'description' => __( 'Stock control, purchase visibility and warehouse reporting for practical business decisions.', 'iscp' ),
	),
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
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_placeholders as $iscp_placeholder ) : ?>
					<article class="iscp-recent-post-card iscp-reveal">
						<div>
							<h3><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php echo esc_html( $iscp_placeholder['title'] ); ?></a></h3>
							<p><?php echo esc_html( $iscp_placeholder['description'] ); ?></p>
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
