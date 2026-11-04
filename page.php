<?php
/**
 * Page template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( is_page( 'about' ) ) {
	require get_template_directory() . '/page-about.php';
	return;
}

if ( is_page( 'services' ) ) {
	require get_template_directory() . '/page-services.php';
	return;
}

if ( is_page( array( 'solutions', 'products' ) ) ) {
	require get_template_directory() . '/page-solutions.php';
	return;
}

if ( is_page( 'contact' ) ) {
	require get_template_directory() . '/template-contact.php';
	return;
}

if ( is_page( 'careers' ) ) {
	require get_template_directory() . '/page-careers.php';
	return;
}

$iscp_service_experience = iscp_get_current_service_experience();
if ( $iscp_service_experience ) {
	get_header();
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/components/software-service', null, array( 'service' => $iscp_service_experience, 'native' => true ) );
	}
	get_footer();
	return;
}

get_header();

iscp_breadcrumbs();
?>

<div class="iscp-container iscp-content-layout">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>
</div>

<?php
get_footer();
