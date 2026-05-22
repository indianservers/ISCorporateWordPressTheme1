<?php
/**
 * Solutions section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_section_image = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_solution',
		'posts_per_page'      => 8,
		'ignore_sticky_posts' => true,
	)
);

$iscp_offering_pages = function_exists( 'iscp_get_editable_offering_pages' ) ? iscp_get_editable_offering_pages() : array();
$iscp_fallback       = ! empty( $iscp_offering_pages['products']['items'] ) ? array_slice( $iscp_offering_pages['products']['items'], 0, 8, true ) : array();
?>

<section id="solutions" class="iscp-section iscp-home-solutions">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Solutions', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Indian Servers SaaS Products & Business Solutions', 'iscp' ); ?></h2>
		</div>
		<figure class="iscp-section-photo iscp-reveal">
			<img src="<?php echo esc_url( $iscp_section_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software development workspace with business dashboards and cloud systems', 'iscp' ); ?>" loading="lazy" decoding="async">
		</figure>
		<div class="iscp-card-grid iscp-card-grid-4">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'solution' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_slug => $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'solution', array( 'label' => __( 'SaaS Product', 'iscp' ), 'title' => $iscp_item['title'], 'icon' => isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'cube', 'description' => $iscp_item['summary'], 'url' => ! empty( $iscp_item['url'] ) ? $iscp_item['url'] : home_url( '/products/' . $iscp_slug . '/' ) ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
