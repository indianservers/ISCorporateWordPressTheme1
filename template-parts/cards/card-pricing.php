<?php
/**
 * Pricing card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_name     = isset( $args['name'] ) ? $args['name'] : get_the_title();
$iscp_price    = isset( $args['price'] ) ? $args['price'] : get_post_meta( get_the_ID(), '_iscp_pricing_price', true );
$iscp_period   = isset( $args['period'] ) ? $args['period'] : get_post_meta( get_the_ID(), '_iscp_pricing_period', true );
$iscp_featured = isset( $args['featured'] ) ? $args['featured'] : get_post_meta( get_the_ID(), '_iscp_pricing_featured', true );
$iscp_cta_text = isset( $args['cta_text'] ) ? $args['cta_text'] : get_post_meta( get_the_ID(), '_iscp_pricing_cta_text', true );
$iscp_cta_url  = isset( $args['cta_url'] ) ? $args['cta_url'] : get_post_meta( get_the_ID(), '_iscp_pricing_cta_url', true );
$iscp_features = isset( $args['features'] ) ? $args['features'] : array_filter( preg_split( '/\r\n|\r|\n/', wp_strip_all_tags( get_the_content() ) ) );

$iscp_price    = $iscp_price ? $iscp_price : __( 'Price Placeholder', 'iscp' );
$iscp_cta_text = $iscp_cta_text ? $iscp_cta_text : __( 'Get Started', 'iscp' );
$iscp_cta_url  = $iscp_cta_url ? $iscp_cta_url : home_url( '/contact/' );
?>

<article class="iscp-pricing-card <?php echo $iscp_featured ? 'iscp-pricing-card-featured' : ''; ?> iscp-reveal">
	<h3><?php echo esc_html( $iscp_name ); ?></h3>
	<p class="iscp-plan-price">
		<?php echo esc_html( $iscp_price ); ?>
		<?php if ( $iscp_period ) : ?>
			<span><?php echo esc_html( $iscp_period ); ?></span>
		<?php endif; ?>
	</p>
	<?php if ( $iscp_features ) : ?>
		<ul>
			<?php foreach ( $iscp_features as $iscp_feature ) : ?>
				<li><?php echo esc_html( $iscp_feature ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<a class="iscp-btn <?php echo $iscp_featured ? 'iscp-btn-primary' : 'iscp-btn-outline'; ?>" href="<?php echo esc_url( $iscp_cta_url ); ?>"><?php echo esc_html( $iscp_cta_text ); ?></a>
</article>
