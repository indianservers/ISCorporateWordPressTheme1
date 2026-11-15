<?php
/** Partner Signup page; applications and assets are owned by IS-Forms. @package ISCP */
defined( 'ABSPATH' ) || exit;
add_filter( 'body_class', static function ( $classes ) {
    $classes[] = 'iscp-partner-signup-page';
    return $classes;
} );
wp_enqueue_style( 'iscp-partner-signup-layout', get_template_directory_uri() . '/assets/css/partner-signup.css', array( 'iscp-main' ), iscp_asset_version( 'assets/css/partner-signup.css' ) );
get_header();
?>
<div class="iscp-partner-signup">
    <?php
    while ( have_posts() ) {
        the_post();
        if ( shortcode_exists( 'isf_partner_signup' ) ) {
            the_content();
        } else {
            echo '<p>' . esc_html__( 'Partner applications are temporarily unavailable. Please contact our partnership team.', 'iscp' ) . '</p>';
            echo '<a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Contact our team', 'iscp' ) . '</a>';
        }
    }
    ?>
</div>
<?php get_footer(); ?>
