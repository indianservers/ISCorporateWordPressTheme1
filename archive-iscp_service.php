<?php
/**
 * Service archive template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
$iscp_manual_content_rendered = iscp_render_manual_page_content_by_path( 'services' );
?>

<?php if ( ! $iscp_manual_content_rendered ) : ?>
	<section class="iscp-section iscp-archive-hero">
		<div class="iscp-container">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Services', 'iscp' ); ?></p>
			<h1><?php echo esc_html( post_type_archive_title( '', false ) ); ?></h1>
			<?php if ( get_the_archive_description() ) : ?>
				<?php the_archive_description( '<div class="iscp-archive-description">', '</div>' ); ?>
			<?php else : ?>
				<p class="iscp-archive-description"><?php esc_html_e( 'Explore Indian Servers services across software development, web and mobile applications, AI, AR/VR, cloud hosting, cybersecurity, VAPT and dedicated engineering teams.', 'iscp' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<div class="iscp-container iscp-content-layout">
	<?php if ( have_posts() ) : ?>
		<div class="iscp-card-grid iscp-card-grid-3">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/cards/card', 'service' );
			endwhile;
			?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php elseif ( ! $iscp_manual_content_rendered && function_exists( 'iscp_get_offering_navigation_groups' ) ) : ?>
		<div class="iscp-offering-card-grid">
			<?php foreach ( iscp_get_offering_navigation_groups()['services'] as $iscp_slug => $iscp_item ) : ?>
				<a class="iscp-offering-card" href="<?php echo esc_url( ! empty( $iscp_item['url'] ) ? $iscp_item['url'] : home_url( '/services/' . $iscp_slug . '/' ) ); ?>">
					<span aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( iscp_get_offering_icon_path( isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'code' ) ); ?>"/></svg>
					</span>
					<strong><?php echo esc_html( $iscp_item['title'] ); ?></strong>
					<small><?php echo esc_html( wp_trim_words( $iscp_item['summary'], 18 ) ); ?></small>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
