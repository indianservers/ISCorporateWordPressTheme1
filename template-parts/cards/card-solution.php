<?php
/**
 * Solution card.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_title       = isset( $args['title'] ) ? $args['title'] : get_the_title();
$iscp_description = isset( $args['description'] ) ? $args['description'] : get_the_excerpt();
$iscp_description = $iscp_description ? $iscp_description : sprintf(
	/* translators: %s: solution title. */
	__( '%s from Indian Servers, designed for practical business workflows, secure access, reports and scalable cloud deployment.', 'iscp' ),
	$iscp_title
);
$iscp_label       = isset( $args['label'] ) ? $args['label'] : iscp_get_first_term_name( get_the_ID(), 'iscp_solution_category' );
$iscp_label       = $iscp_label ? $iscp_label : __( 'Solution', 'iscp' );
$iscp_url         = isset( $args['url'] ) ? $args['url'] : get_permalink();
$iscp_icon        = isset( $args['icon'] ) ? sanitize_key( $args['icon'] ) : 'cube';
$iscp_icons       = array(
	'cube'       => 'M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3zm0 2.3L6 8.7v6.6l6 3.4 6-3.4V8.7l-6-3.4zm0 4.2l3 1.7v3.6l-3 1.7-3-1.7v-3.6l3-1.7z',
	'team'       => 'M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm7.5-.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6ZM2.5 20a6.5 6.5 0 0 1 13 0h-2a4.5 4.5 0 0 0-9 0h-2Zm12.8-5.8A5.5 5.5 0 0 1 21.5 20h-2a3.5 3.5 0 0 0-4-3.5l-.2-2.3Z',
	'education'  => 'M12 3 2 8l10 5 8-4v6h2V8L12 3Zm0 7.8L6.5 8 12 5.2 17.5 8 12 10.8ZM6 12v4c2.8 2.7 9.2 2.7 12 0v-4l-2 1v2.1c-2 1.3-6 1.3-8 0V13l-2-1Z',
	'crm'        => 'M4 4h16v12H7.5L4 19V4Zm2 2v8.7l.7-.7H18V6H6Zm3 2h6v2H9V8Zm0 3h8v2H9v-2Z',
	'inventory'  => 'M4 4h16v5H4V4Zm2 2v1h12V6H6Zm-1 5h14v9H5v-9Zm2 2v5h10v-5H7Zm2 1h6v2H9v-2Z',
	'restaurant' => 'M7 2h2v8H7V2Zm4 0h2v8a4 4 0 0 1-3 3.9V22H8v-8.1A4 4 0 0 1 5 10V2h2v8a2 2 0 1 0 4 0V2Zm7 0h1v20h-2v-7h-3V6a4 4 0 0 1 4-4Z',
	'code'       => 'M8.7 16.6 4.1 12l4.6-4.6 1.4 1.4L6.9 12l3.2 3.2-1.4 1.4Zm6.6 0-1.4-1.4 3.2-3.2-3.2-3.2 1.4-1.4 4.6 4.6-4.6 4.6ZM12.2 18h-2.1l1.7-12h2.1l-1.7 12Z',
	'cloud'      => 'M5 18.5h14a3 3 0 0 0 .7-5.9 5.8 5.8 0 0 0-11.1-1.8A4 4 0 0 0 5 18.5Zm0-2a2 2 0 0 1 0-4h1.2l.4-1.1a3.8 3.8 0 0 1 7.3 1.2v1.1h2.9a1.8 1.8 0 1 1 0 3.6H5Z',
	'shield'     => 'M12 2 5 5v6c0 4.4 2.8 8.5 7 10 4.2-1.5 7-5.6 7-10V5l-7-3Zm0 2.2 5 2.1V11c0 3.2-1.9 6.2-5 7.7-3.1-1.5-5-4.5-5-7.7V6.3l5-2.1Z',
);
$iscp_icon_path   = isset( $iscp_icons[ $iscp_icon ] ) ? $iscp_icons[ $iscp_icon ] : $iscp_icons['cube'];
?>

<article class="iscp-card iscp-home-card iscp-solution-card iscp-reveal">
	<?php if ( has_post_thumbnail() && empty( $args['title'] ) ) : ?>
		<a class="iscp-card-media" href="<?php echo esc_url( $iscp_url ); ?>">
			<?php the_post_thumbnail( 'iscp-card' ); ?>
		</a>
	<?php endif; ?>
	<div class="iscp-card-body">
		<div class="iscp-card-icon" aria-hidden="true">
			<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( $iscp_icon_path ); ?>"/></svg>
		</div>
		<p class="iscp-card-kicker"><?php echo esc_html( $iscp_label ); ?></p>
		<h3><a href="<?php echo esc_url( $iscp_url ); ?>"><?php echo esc_html( $iscp_title ); ?></a></h3>
		<p><?php echo esc_html( wp_trim_words( $iscp_description, 22 ) ); ?></p>
		<a class="iscp-card-link" href="<?php echo esc_url( $iscp_url ); ?>"><?php esc_html_e( 'Learn More', 'iscp' ); ?></a>
	</div>
</article>
