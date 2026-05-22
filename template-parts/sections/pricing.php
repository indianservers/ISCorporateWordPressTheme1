<?php
/**
 * Pricing section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_pricing',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);

$iscp_fallback = array(
	array( 'name' => __( 'Starter', 'iscp' ), 'price' => __( 'Price Placeholder', 'iscp' ), 'features' => array( __( 'Core business pages', 'iscp' ), __( 'Responsive layout', 'iscp' ), __( 'Basic lead capture', 'iscp' ) ), 'cta_text' => __( 'Get Started', 'iscp' ), 'cta_url' => home_url( '/contact/' ) ),
	array( 'name' => __( 'Professional', 'iscp' ), 'price' => __( 'Price Placeholder', 'iscp' ), 'features' => array( __( 'Advanced sections', 'iscp' ), __( 'Blog and case studies', 'iscp' ), __( 'Conversion-focused CTAs', 'iscp' ) ), 'cta_text' => __( 'Get Started', 'iscp' ), 'cta_url' => home_url( '/contact/' ), 'featured' => true ),
	array( 'name' => __( 'Enterprise', 'iscp' ), 'price' => __( 'Price Placeholder', 'iscp' ), 'features' => array( __( 'Custom workflows', 'iscp' ), __( 'Integration-ready layouts', 'iscp' ), __( 'Scalable content structure', 'iscp' ) ), 'cta_text' => __( 'Get Started', 'iscp' ), 'cta_url' => home_url( '/contact/' ) ),
);
?>

<section class="iscp-section iscp-section-alt iscp-home-pricing">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Pricing', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Present Your Service Packages Clearly', 'iscp' ); ?></h2>
			<p><?php esc_html_e( 'These pricing cards are placeholders for the buyer business services, retainers or packages.', 'iscp' ); ?></p>
		</div>
		<div class="iscp-card-grid iscp-card-grid-3">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'pricing' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'pricing', $iscp_item ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
