<?php
/**
 * Industries section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_section_image = get_template_directory_uri() . '/assets/images/indianservers-global-cloud.png';

$iscp_fallback = array(
	array( 'title' => __( 'India', 'iscp' ), 'label' => __( 'Vijayawada and Dehradun', 'iscp' ) ),
	array( 'title' => __( 'Dubai', 'iscp' ), 'label' => __( 'Two branch operations', 'iscp' ) ),
	array( 'title' => __( 'USA', 'iscp' ), 'label' => __( 'Third global branch hub', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-section-alt iscp-home-industries">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Presence', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Serving India and Global Branch Locations', 'iscp' ); ?></h2>
		</div>
		<figure class="iscp-section-photo iscp-section-photo-split iscp-reveal">
			<img src="<?php echo esc_url( $iscp_section_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers cloud operations center with global network monitoring', 'iscp' ); ?>" loading="lazy" decoding="async">
			<figcaption>
				<strong><?php esc_html_e( 'India, Dubai and USA', 'iscp' ); ?></strong>
				<span><?php esc_html_e( 'Vijayawada and Dehradun in India, two Dubai branches and a USA branch hub for global delivery.', 'iscp' ); ?></span>
			</figcaption>
		</figure>
		<div class="iscp-industry-grid">
			<?php foreach ( $iscp_fallback as $iscp_item ) : ?>
				<?php get_template_part( 'template-parts/cards/card', 'industry', $iscp_item + array( 'url' => home_url( '/contact/' ) ) ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
