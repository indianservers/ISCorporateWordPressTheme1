<?php
/**
 * FAQ card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_index     = isset( $args['index'] ) ? absint( $args['index'] ) : get_the_ID();
$iscp_question  = isset( $args['question'] ) ? $args['question'] : get_the_title();
$iscp_answer    = isset( $args['answer'] ) ? $args['answer'] : get_the_excerpt();
$iscp_button_id = 'iscp-faq-button-' . $iscp_index;
$iscp_panel_id  = 'iscp-faq-panel-' . $iscp_index;
?>

<div class="iscp-faq-item iscp-reveal">
	<h3>
		<button id="<?php echo esc_attr( $iscp_button_id ); ?>" class="iscp-faq-button" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $iscp_panel_id ); ?>">
			<span><?php echo esc_html( $iscp_question ); ?></span>
			<span class="iscp-faq-icon" aria-hidden="true"></span>
		</button>
	</h3>
	<div id="<?php echo esc_attr( $iscp_panel_id ); ?>" class="iscp-faq-panel" role="region" aria-labelledby="<?php echo esc_attr( $iscp_button_id ); ?>" hidden>
		<p><?php echo esc_html( wp_trim_words( $iscp_answer, 45 ) ); ?></p>
	</div>
</div>
