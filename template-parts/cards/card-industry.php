<?php
/**
 * Industry card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_title = isset( $args['title'] ) ? $args['title'] : get_the_title();
$iscp_url   = isset( $args['url'] ) ? $args['url'] : get_permalink();
$iscp_label = isset( $args['label'] ) ? $args['label'] : iscp_get_first_term_name( get_the_ID(), 'iscp_industry_category' );
?>

<a class="iscp-industry-card iscp-reveal" href="<?php echo esc_url( $iscp_url ); ?>">
	<span aria-hidden="true"></span>
	<?php if ( $iscp_label ) : ?>
		<p class="iscp-card-kicker"><?php echo esc_html( $iscp_label ); ?></p>
	<?php endif; ?>
	<h3><?php echo esc_html( $iscp_title ); ?></h3>
</a>
