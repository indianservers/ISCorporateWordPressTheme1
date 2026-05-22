<?php
/**
 * Site footer.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_footer_logo        = iscp_get_theme_mod( 'iscp_footer_logo' );
$iscp_footer_layout      = iscp_get_theme_mod( 'iscp_footer_layout', 'columns' );
$iscp_phone_display      = iscp_get_theme_mod( 'iscp_phone_display' );
$iscp_phone_tel          = iscp_get_theme_mod( 'iscp_phone_tel' );
$iscp_email              = iscp_get_theme_mod( 'iscp_email' );
$iscp_address            = iscp_get_theme_mod( 'iscp_address' );
$iscp_business_hours     = iscp_get_theme_mod( 'iscp_business_hours', __( '9 AM - 5 PM', 'iscp' ) );
$iscp_google_maps_url    = iscp_get_theme_mod( 'iscp_google_maps_url' );
$iscp_whatsapp_number    = iscp_get_theme_mod( 'iscp_whatsapp_number' );
$iscp_social_links       = array(
	'LinkedIn'  => iscp_get_theme_mod( 'iscp_social_linkedin' ),
	'Facebook'  => iscp_get_theme_mod( 'iscp_social_facebook' ),
	'Instagram' => iscp_get_theme_mod( 'iscp_social_instagram' ),
	'YouTube'   => iscp_get_theme_mod( 'iscp_social_youtube' ),
	'X/Twitter' => iscp_get_theme_mod( 'iscp_social_twitter' ),
	'GitHub'    => iscp_get_theme_mod( 'iscp_social_github' ),
	'Dribbble'  => iscp_get_theme_mod( 'iscp_social_dribbble' ),
	'Behance'   => iscp_get_theme_mod( 'iscp_social_behance' ),
);
$iscp_whatsapp_number    = $iscp_whatsapp_number ? $iscp_whatsapp_number : '919618222220';
$iscp_social_links['LinkedIn']  = $iscp_social_links['LinkedIn'] ? $iscp_social_links['LinkedIn'] : 'https://www.linkedin.com/in/indianservers/';
$iscp_social_links['Facebook']  = $iscp_social_links['Facebook'] ? $iscp_social_links['Facebook'] : 'https://www.facebook.com/IndianServersPage';
$iscp_social_links['Instagram'] = $iscp_social_links['Instagram'] ? $iscp_social_links['Instagram'] : 'https://www.instagram.com/indianserversltd';
?>
</main>

<?php if ( is_active_sidebar( 'cta-before-footer' ) ) : ?>
	<section class="iscp-widget-cta-before-footer" aria-label="<?php esc_attr_e( 'Call to action', 'iscp' ); ?>">
		<div class="iscp-container">
			<?php dynamic_sidebar( 'cta-before-footer' ); ?>
		</div>
	</section>
<?php endif; ?>

<?php iscp_render_conversion_tools(); ?>

<footer id="contact" class="iscp-footer iscp-footer-layout-<?php echo esc_attr( $iscp_footer_layout ); ?>">
	<div class="iscp-container iscp-footer-grid">
		<section class="iscp-footer-brand" aria-label="<?php esc_attr_e( 'Site information', 'iscp' ); ?>">
			<?php if ( $iscp_footer_logo ) : ?>
				<a class="iscp-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( $iscp_footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" loading="lazy" decoding="async">
				</a>
			<?php elseif ( has_custom_logo() ) : ?>
				<div class="iscp-footer-logo"><?php the_custom_logo(); ?></div>
			<?php else : ?>
				<h2 class="iscp-footer-title"><?php bloginfo( 'name' ); ?></h2>
			<?php endif; ?>
			<p><?php echo esc_html( iscp_get_footer_description() ); ?></p>
		</section>

		<nav class="iscp-footer-column" aria-label="<?php esc_attr_e( 'Footer menu', 'iscp' ); ?>">
			<h3><?php esc_html_e( 'Explore', 'iscp' ); ?></h3>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'iscp-footer-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			} else {
				?>
				<ul class="iscp-footer-menu">
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'iscp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'iscp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'iscp' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<section class="iscp-footer-column">
			<h3><?php esc_html_e( 'Solutions', 'iscp' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Corporate Websites', 'iscp' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'SaaS Platforms', 'iscp' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/solutions/' ) ); ?>"><?php esc_html_e( 'Consulting Services', 'iscp' ); ?></a></li>
			</ul>
		</section>

		<section class="iscp-footer-column">
			<h3><?php esc_html_e( 'Contact', 'iscp' ); ?></h3>
			<ul class="iscp-contact-list">
				<?php if ( $iscp_address ) : ?>
					<li>
						<?php if ( $iscp_google_maps_url ) : ?>
							<a href="<?php echo esc_url( $iscp_google_maps_url ); ?>"><?php echo esc_html( $iscp_address ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $iscp_address ); ?>
						<?php endif; ?>
					</li>
				<?php endif; ?>
				<?php if ( $iscp_email ) : ?>
					<li><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $iscp_email ) ); ?>"><?php echo esc_html( antispambot( $iscp_email ) ); ?></a></li>
				<?php endif; ?>
				<?php if ( $iscp_phone_display && $iscp_phone_tel ) : ?>
					<li><a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $iscp_phone_tel ) ); ?>"><?php echo esc_html( $iscp_phone_display ); ?></a></li>
				<?php endif; ?>
				<?php if ( $iscp_business_hours ) : ?>
					<li><?php echo esc_html( $iscp_business_hours ); ?></li>
				<?php endif; ?>
				<?php if ( $iscp_whatsapp_number ) : ?>
					<li><a href="<?php echo esc_url( 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $iscp_whatsapp_number ) . '?text=' . rawurlencode( __( 'Hello Indian Servers, I would like to discuss a project.', 'iscp' ) ) ); ?>"><?php esc_html_e( 'WhatsApp Sai Satish', 'iscp' ); ?></a></li>
				<?php endif; ?>
			</ul>

			<ul class="iscp-social-menu" aria-label="<?php esc_attr_e( 'Social links', 'iscp' ); ?>">
				<?php foreach ( $iscp_social_links as $iscp_label => $iscp_url ) : ?>
					<?php if ( $iscp_url ) : ?>
						<li>
							<a href="<?php echo esc_url( $iscp_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $iscp_label ); ?>">
								<?php iscp_render_social_icon( $iscp_label ); ?>
								<span class="iscp-screen-reader-text"><?php echo esc_html( $iscp_label ); ?></span>
							</a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</section>

		<?php for ( $iscp_widget_index = 1; $iscp_widget_index <= 4; $iscp_widget_index++ ) : ?>
			<?php if ( is_active_sidebar( 'footer-' . $iscp_widget_index ) ) : ?>
				<section class="iscp-footer-column iscp-footer-widget-column">
					<?php dynamic_sidebar( 'footer-' . $iscp_widget_index ); ?>
				</section>
			<?php endif; ?>
		<?php endfor; ?>
	</div>

	<div class="iscp-container iscp-footer-bottom">
		<p>
			<?php
			$iscp_copyright = str_replace( '{year}', gmdate( 'Y' ), iscp_get_theme_mod( 'iscp_copyright_text' ) );
			if ( false === strpos( $iscp_copyright, '2009' ) ) {
				$iscp_copyright = preg_replace( '/&copy;\s*/', '&copy; 2009 to ', $iscp_copyright, 1 );
			}
			echo wp_kses_post( $iscp_copyright );
			?>
		</p>
		<?php if ( iscp_get_theme_mod( 'iscp_frontend_credit_enabled', true ) ) : ?>
			<p class="iscp-footer-credit">
				<a href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_footer_credit_url' ) ); ?>">
					<?php echo esc_html( iscp_get_theme_mod( 'iscp_footer_credit_text' ) ); ?>
				</a>
			</p>
		<?php endif; ?>
		<?php if ( iscp_get_theme_mod( 'iscp_back_to_top_enabled', true ) ) : ?>
			<button class="iscp-back-to-top" type="button" aria-label="<?php esc_attr_e( 'Back to top', 'iscp' ); ?>"><?php esc_html_e( 'Top', 'iscp' ); ?></button>
		<?php endif; ?>
	</div>
</footer>

<?php if ( is_active_sidebar( 'offcanvas-panel' ) ) : ?>
	<aside class="iscp-offcanvas-panel" aria-label="<?php esc_attr_e( 'Additional information', 'iscp' ); ?>">
		<?php dynamic_sidebar( 'offcanvas-panel' ); ?>
	</aside>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
