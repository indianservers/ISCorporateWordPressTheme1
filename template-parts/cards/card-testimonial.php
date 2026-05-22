<?php
/**
 * Testimonial card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_quote   = isset( $args['quote'] ) ? $args['quote'] : get_the_excerpt();
$iscp_name    = isset( $args['name'] ) ? $args['name'] : get_the_title();
$iscp_role    = isset( $args['role'] ) ? $args['role'] : get_post_meta( get_the_ID(), '_iscp_testimonial_role', true );
$iscp_company = isset( $args['company'] ) ? $args['company'] : get_post_meta( get_the_ID(), '_iscp_testimonial_company', true );
$iscp_rating  = isset( $args['rating'] ) ? $args['rating'] : get_post_meta( get_the_ID(), '_iscp_testimonial_rating', true );
?>

<figure class="iscp-testimonial-card iscp-reveal">
	<?php if ( $iscp_rating ) : ?>
		<p class="iscp-testimonial-rating"><?php echo esc_html( str_repeat( '*', min( 5, absint( $iscp_rating ) ) ) ); ?></p>
	<?php endif; ?>
	<blockquote>
		<p><?php echo esc_html( wp_trim_words( $iscp_quote, 34 ) ); ?></p>
	</blockquote>
	<figcaption>
		<?php echo esc_html( $iscp_name ); ?>
		<?php if ( $iscp_role || $iscp_company ) : ?>
			<span><?php echo esc_html( trim( $iscp_role . ( $iscp_role && $iscp_company ? ', ' : '' ) . $iscp_company ) ); ?></span>
		<?php endif; ?>
	</figcaption>
</figure>
