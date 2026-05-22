<?php
/**
 * Case study card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_title  = isset( $args['title'] ) ? $args['title'] : get_the_title();
$iscp_result = isset( $args['result'] ) ? $args['result'] : get_post_meta( get_the_ID(), '_iscp_case_result', true );
$iscp_result = $iscp_result ? $iscp_result : get_the_excerpt();
$iscp_url    = isset( $args['url'] ) ? $args['url'] : get_permalink();
$iscp_label  = isset( $args['label'] ) ? $args['label'] : iscp_get_first_term_name( get_the_ID(), 'iscp_case_study_category' );
$iscp_label  = $iscp_label ? $iscp_label : __( 'Case Study', 'iscp' );
?>

<article class="iscp-case-card iscp-reveal">
	<?php if ( has_post_thumbnail() && empty( $args['title'] ) ) : ?>
		<a class="iscp-card-media" href="<?php echo esc_url( $iscp_url ); ?>">
			<?php the_post_thumbnail( 'iscp-card' ); ?>
		</a>
	<?php else : ?>
		<div class="iscp-case-media"></div>
	<?php endif; ?>
	<div class="iscp-card-body">
		<p class="iscp-card-kicker"><?php echo esc_html( $iscp_label ); ?></p>
		<h3><a href="<?php echo esc_url( $iscp_url ); ?>"><?php echo esc_html( $iscp_title ); ?></a></h3>
		<p><?php echo esc_html( wp_trim_words( $iscp_result, 22 ) ); ?></p>
		<a class="iscp-card-link" href="<?php echo esc_url( $iscp_url ); ?>"><?php esc_html_e( 'View Case Study', 'iscp' ); ?></a>
	</div>
</article>
