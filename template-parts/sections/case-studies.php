<?php
/**
 * Case studies section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_case_study',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);

$iscp_fallback = array(
	array( 'title' => __( 'SaaS Growth Website', 'iscp' ), 'result' => __( 'A scalable product website layout for acquisition, education and conversion.', 'iscp' ) ),
	array( 'title' => __( 'Corporate Service Website', 'iscp' ), 'result' => __( 'A trust-first presentation for professional service teams and consultants.', 'iscp' ) ),
	array( 'title' => __( 'Training Platform Website', 'iscp' ), 'result' => __( 'A structured learning website pattern for courses, cohorts and institutes.', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-section-alt iscp-home-cases">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Case Studies', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Proof-Oriented Layouts for Business Results', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-card-grid iscp-card-grid-3">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'case-study' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'case-study', $iscp_item + array( 'url' => home_url( '/case-studies/' ) ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
