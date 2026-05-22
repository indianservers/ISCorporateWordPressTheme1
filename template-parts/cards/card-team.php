<?php
/**
 * Team member card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_designation = get_post_meta( get_the_ID(), '_iscp_team_designation', true );
$iscp_linkedin    = get_post_meta( get_the_ID(), '_iscp_team_linkedin', true );
?>

<article class="iscp-card iscp-team-card iscp-reveal">
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="iscp-card-media" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail( 'iscp-card' ); ?></a>
	<?php endif; ?>
	<div class="iscp-card-body">
		<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
		<?php if ( $iscp_designation ) : ?>
			<p><?php echo esc_html( $iscp_designation ); ?></p>
		<?php endif; ?>
		<?php if ( $iscp_linkedin ) : ?>
			<a class="iscp-card-link" href="<?php echo esc_url( $iscp_linkedin ); ?>"><?php esc_html_e( 'LinkedIn', 'iscp' ); ?></a>
		<?php endif; ?>
	</div>
</article>
