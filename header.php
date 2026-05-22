<?php
/**
 * Site header.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_header_layout = iscp_get_theme_mod( 'iscp_header_layout', 'default' );
$iscp_header_menu   = absint( iscp_get_theme_mod( 'iscp_primary_menu_override', '0' ) );
$iscp_header_classes = array(
	'iscp-site-header',
	'iscp-header-layout-' . sanitize_html_class( $iscp_header_layout ),
);

if ( iscp_get_theme_mod( 'iscp_sticky_header_enabled', true ) ) {
	$iscp_header_classes[] = 'iscp-header-sticky';
} else {
	$iscp_header_classes[] = 'iscp-header-static';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( iscp_get_theme_mod( 'iscp_preloader_enabled', false ) ) : ?>
	<div class="iscp-preloader" aria-hidden="true">
		<span></span>
	</div>
<?php endif; ?>

<a class="iscp-skip-link iscp-screen-reader-text" href="#iscp-primary"><?php esc_html_e( 'Skip to content', 'iscp' ); ?></a>

<header id="iscp-masthead" class="<?php echo esc_attr( implode( ' ', $iscp_header_classes ) ); ?>" role="banner">
	<?php if ( is_active_sidebar( 'header-top-bar' ) ) : ?>
		<div class="iscp-header-widget-bar">
			<div class="iscp-container">
				<?php dynamic_sidebar( 'header-top-bar' ); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( iscp_get_theme_mod( 'iscp_show_utility_menu', true ) && has_nav_menu( 'utility' ) ) : ?>
		<div class="iscp-utility-bar">
			<div class="iscp-container">
				<nav class="iscp-utility-nav" aria-label="<?php esc_attr_e( 'Utility menu', 'iscp' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'utility',
							'menu_class'     => 'iscp-utility-menu',
							'container'      => false,
							'depth'          => 1,
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
			</div>
		</div>
	<?php endif; ?>

	<div class="iscp-header-main">
		<div class="iscp-container iscp-header-inner">
			<div class="iscp-site-branding">
				<?php iscp_render_brand_logo(); ?>
				<?php if ( iscp_get_theme_mod( 'iscp_site_tagline_override' ) ) : ?>
					<p class="iscp-site-tagline"><?php echo esc_html( iscp_get_theme_mod( 'iscp_site_tagline_override' ) ); ?></p>
				<?php endif; ?>
			</div>

			<button class="iscp-menu-toggle" type="button" aria-controls="iscp-primary-menu" aria-expanded="false">
				<span class="iscp-menu-toggle-bar"></span>
				<span class="iscp-menu-toggle-bar"></span>
				<span class="iscp-menu-toggle-bar"></span>
				<span class="iscp-screen-reader-text"><?php esc_html_e( 'Open menu', 'iscp' ); ?></span>
			</button>

			<nav id="iscp-site-navigation" class="iscp-primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'iscp' ); ?>">
				<?php if ( $iscp_header_menu ) : ?>
					<?php
					wp_nav_menu(
						array(
							'menu'        => $iscp_header_menu,
							'menu_id'     => 'iscp-primary-menu',
							'menu_class'  => 'iscp-primary-menu',
							'container'   => false,
							'fallback_cb' => false,
							'walker'      => new ISCP_Icon_Menu_Walker(),
						)
					);
					?>
				<?php elseif ( has_nav_menu( 'primary' ) ) : ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'iscp-primary-menu',
							'menu_class'     => 'iscp-primary-menu',
							'container'      => false,
							'fallback_cb'    => false,
							'walker'         => new ISCP_Icon_Menu_Walker(),
						)
					);
					?>
				<?php else : ?>
					<ul id="iscp-primary-menu" class="iscp-primary-menu">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( 'home' ); ?><span class="iscp-menu-text"><?php esc_html_e( 'Home', 'iscp' ); ?></span></a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( 'about' ); ?><span class="iscp-menu-text"><?php esc_html_e( 'About', 'iscp' ); ?></span></a></li>
						<li class="menu-item-has-children">
							<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( 'services' ); ?><span class="iscp-menu-text"><?php esc_html_e( 'Services', 'iscp' ); ?></span></a>
							<ul class="sub-menu">
								<?php foreach ( array_slice( iscp_get_offering_navigation_groups()['services'], 0, 8, true ) as $iscp_slug => $iscp_item ) : ?>
									<li><a href="<?php echo esc_url( home_url( '/services/' . $iscp_slug . '/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'code' ); ?><span class="iscp-menu-text"><?php echo esc_html( $iscp_item['title'] ); ?></span></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( 'products' ); ?><span class="iscp-menu-text"><?php esc_html_e( 'Products', 'iscp' ); ?></span></a>
							<ul class="sub-menu">
								<?php foreach ( iscp_get_offering_navigation_groups()['products'] as $iscp_slug => $iscp_item ) : ?>
									<li><a href="<?php echo esc_url( home_url( '/products/' . $iscp_slug . '/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'cube' ); ?><span class="iscp-menu-text"><?php echo esc_html( $iscp_item['title'] ); ?></span></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php echo iscp_get_menu_icon_markup( 'contact' ); ?><span class="iscp-menu-text"><?php esc_html_e( 'Contact', 'iscp' ); ?></span></a></li>
					</ul>
				<?php endif; ?>
			</nav>

			<div class="iscp-header-actions">
				<form class="iscp-global-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="iscp-screen-reader-text" for="iscp-global-search-field"><?php esc_html_e( 'Search Indian Servers', 'iscp' ); ?></label>
					<input id="iscp-global-search-field" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search services, products...', 'iscp' ); ?>">
					<button type="submit" aria-label="<?php esc_attr_e( 'Search', 'iscp' ); ?>">
						<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M10.8 4a6.8 6.8 0 0 1 5.4 10.9l3.5 3.5-1.4 1.4-3.5-3.5A6.8 6.8 0 1 1 10.8 4Zm0 2a4.8 4.8 0 1 0 0 9.6 4.8 4.8 0 0 0 0-9.6Z"/></svg>
					</button>
				</form>
				<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_header_cta_2_url', '/contact/' ) ); ?>">
					<?php echo esc_html( iscp_get_theme_mod( 'iscp_header_cta_2_text', __( 'Contact Us', 'iscp' ) ) ); ?>
				</a>
				<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_header_cta_1_url', '/contact/' ) ); ?>">
					<?php echo esc_html( iscp_get_theme_mod( 'iscp_header_cta_1_text', __( 'Start a Project', 'iscp' ) ) ); ?>
				</a>
			</div>
		</div>
	</div>
</header>

<main id="iscp-primary" class="iscp-site-main">
