<?php
/**
 * 404 template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="iscp-section iscp-not-found-page">
	<div class="iscp-container">
		<p class="iscp-eyebrow"><?php esc_html_e( 'Error 404', 'iscp' ); ?></p>
		<h1><?php esc_html_e( 'The page you requested could not be found.', 'iscp' ); ?></h1>
		<p><?php esc_html_e( 'Use the navigation, search, or return to the homepage to continue.', 'iscp' ); ?></p>
		<div class="iscp-action-row">
			<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go Home', 'iscp' ); ?></a>
			<?php get_search_form(); ?>
		</div>
	</div>
</section>

<?php
get_footer();

