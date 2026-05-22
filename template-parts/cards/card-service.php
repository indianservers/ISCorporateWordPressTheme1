<?php
/**
 * Service card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_title       = isset( $args['title'] ) ? $args['title'] : get_the_title();
$iscp_description = isset( $args['description'] ) ? $args['description'] : get_the_excerpt();
$iscp_description = $iscp_description ? $iscp_description : sprintf(
	/* translators: %s: service title. */
	__( 'Professional %s delivery by Indian Servers with planning, implementation, integration and long-term support.', 'iscp' ),
	$iscp_title
);
$iscp_url         = isset( $args['url'] ) ? $args['url'] : get_permalink();
$iscp_label       = isset( $args['label'] ) ? $args['label'] : iscp_get_first_term_name( get_the_ID(), 'iscp_service_category' );
$iscp_label       = $iscp_label ? $iscp_label : __( 'Service', 'iscp' );
$iscp_icon        = isset( $args['icon'] ) ? sanitize_key( $args['icon'] ) : 'code';
$iscp_icons       = array(
	'code'   => 'M8.7 16.6 4.1 12l4.6-4.6 1.4 1.4L6.9 12l3.2 3.2-1.4 1.4Zm6.6 0-1.4-1.4 3.2-3.2-3.2-3.2 1.4-1.4 4.6 4.6-4.6 4.6ZM12.2 18h-2.1l1.7-12h2.1l-1.7 12Z',
	'mobile' => 'M8 2h8a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm0 3v14h8V5H8Zm3 11h2v1.6h-2V16Z',
	'cloud'  => 'M5 18.5h14a3 3 0 0 0 .7-5.9 5.8 5.8 0 0 0-11.1-1.8A4 4 0 0 0 5 18.5Zm0-2a2 2 0 0 1 0-4h1.2l.4-1.1a3.8 3.8 0 0 1 7.3 1.2v1.1h2.9a1.8 1.8 0 1 1 0 3.6H5Z',
	'ai'     => 'M11 2h2v3h-2V2ZM6.3 4.9l1.4-1.4 2.1 2.1-1.4 1.4-2.1-2.1Zm8 0 2.1-2.1 1.4 1.4-2.1 2.1-1.4-1.4ZM7 10a5 5 0 0 1 10 0v2.2l2 1.2V19H5v-5.6l2-1.2V10Zm2 0v3.3l-2 1.2V17h10v-2.5l-2-1.2V10a3 3 0 0 0-6 0Zm1 5h2v1.2h-2V15Zm4 0h2v1.2h-2V15Z',
	'shield' => 'M12 2 5 5v6c0 4.4 2.8 8.5 7 10 4.2-1.5 7-5.6 7-10V5l-7-3Zm0 2.2 5 2.1V11c0 3.2-1.9 6.2-5 7.7-3.1-1.5-5-4.5-5-7.7V6.3l5-2.1Zm-1 9.1 4.2-4.2 1.4 1.4L11 16.1l-3.1-3.2 1.4-1.4 1.7 1.8Z',
	'chart'  => 'M4 19h16v2H2V3h2v16Zm3-2V9h3v8H7Zm5 0V5h3v12h-3Zm5 0v-6h3v6h-3Z',
	'design' => 'M4 4h16v12H7.6L4 19.2V4Zm2 2v8.8L6.8 14H18V6H6Zm3 2h6v2H9V8Zm0 3h8v2H9v-2Z',
	'team'   => 'M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm7.5 1.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM2.5 20a6.5 6.5 0 0 1 13 0h-2a4.5 4.5 0 0 0-9 0h-2Zm12.8-5.8A5.5 5.5 0 0 1 21.5 20h-2a3.5 3.5 0 0 0-4-3.5l-.2-2.3Z',
);
$iscp_icon_path   = isset( $iscp_icons[ $iscp_icon ] ) ? $iscp_icons[ $iscp_icon ] : $iscp_icons['code'];
?>

<article class="iscp-card iscp-service-tile iscp-service-card iscp-reveal">
	<?php if ( has_post_thumbnail() && empty( $args['title'] ) ) : ?>
		<a class="iscp-card-media" href="<?php echo esc_url( $iscp_url ); ?>">
			<?php the_post_thumbnail( 'iscp-card' ); ?>
		</a>
	<?php endif; ?>
	<span class="iscp-service-mark" aria-hidden="true">
		<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( $iscp_icon_path ); ?>"/></svg>
	</span>
	<p class="iscp-card-kicker"><?php echo esc_html( $iscp_label ); ?></p>
	<h3><a href="<?php echo esc_url( $iscp_url ); ?>"><?php echo esc_html( $iscp_title ); ?></a></h3>
	<p><?php echo esc_html( wp_trim_words( $iscp_description, 22 ) ); ?></p>
	<a class="iscp-card-link" href="<?php echo esc_url( $iscp_url ); ?>"><?php esc_html_e( 'Learn More', 'iscp' ); ?></a>
</article>
