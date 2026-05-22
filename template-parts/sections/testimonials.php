<?php
/**
 * Testimonials section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_testimonial',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);

$iscp_fallback = array(
	array( 'quote' => __( 'The layout feels polished, fast and credible. It gave our startup a stronger first impression from day one.', 'iscp' ), 'name' => __( 'Startup Founder', 'iscp' ) ),
	array( 'quote' => __( 'The reusable sections make it easy to present services, proof and calls to action without feeling generic.', 'iscp' ), 'name' => __( 'Agency Owner', 'iscp' ) ),
	array( 'quote' => __( 'The design has the right balance of professionalism, clarity and flexibility for a consulting brand.', 'iscp' ), 'name' => __( 'Consultant', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-home-testimonials">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Testimonials', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Designed to Build Business Credibility', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-card-grid iscp-card-grid-3">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'testimonial' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'testimonial', $iscp_item ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
