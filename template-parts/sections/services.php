<?php
/**
 * Services section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_service',
		'posts_per_page'      => 8,
		'ignore_sticky_posts' => true,
	)
);

$iscp_offering_pages = function_exists( 'iscp_get_editable_offering_pages' ) ? iscp_get_editable_offering_pages() : array();
$iscp_fallback       = ! empty( $iscp_offering_pages['services']['items'] ) ? array_slice( $iscp_offering_pages['services']['items'], 0, 8, true ) : array();
?>

<section class="iscp-section iscp-section-alt iscp-home-services">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Services', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Technology Services by Indian Servers', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-card-grid iscp-card-grid-4">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'service' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_slug => $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'service', array( 'label' => __( 'Indian Servers', 'iscp' ), 'title' => $iscp_item['title'], 'icon' => isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'code', 'description' => $iscp_item['summary'], 'url' => ! empty( $iscp_item['url'] ) ? $iscp_item['url'] : home_url( '/services/' . $iscp_slug . '/' ) ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
