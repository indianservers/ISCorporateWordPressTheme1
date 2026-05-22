<?php
/**
 * Hero section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_hero_layout = iscp_get_theme_mod( 'iscp_hero_layout', 'dashboard' );
$iscp_hero_image  = get_template_directory_uri() . '/assets/images/indianservers-data-center.png';
$iscp_badges      = array_filter(
	array(
		iscp_get_theme_mod( 'iscp_hero_badge_1' ),
		iscp_get_theme_mod( 'iscp_hero_badge_2' ),
		iscp_get_theme_mod( 'iscp_hero_badge_3' ),
		iscp_get_theme_mod( 'iscp_hero_badge_4' ),
	)
);
$iscp_suite_links = array(
	array( 'label' => __( 'Business Apps', 'iscp' ), 'text' => __( 'HRMS, CRM, ERP, Inventory', 'iscp' ), 'url' => home_url( '/products/' ), 'icon' => 'products' ),
	array( 'label' => __( 'Development', 'iscp' ), 'text' => __( '.NET, PHP, Python, Mobile', 'iscp' ), 'url' => home_url( '/services/custom-software-development/' ), 'icon' => 'code' ),
	array( 'label' => __( 'Cloud', 'iscp' ), 'text' => __( 'Hosting, VPS, monitoring', 'iscp' ), 'url' => home_url( '/services/cloud-hosting/' ), 'icon' => 'cloud' ),
	array( 'label' => __( 'Security & AI', 'iscp' ), 'text' => __( 'VAPT, automation, assistants', 'iscp' ), 'url' => home_url( '/services/cyber-security-vapt/' ), 'icon' => 'shield' ),
);
?>

<section id="iscp-hero" class="iscp-section iscp-hero-section iscp-hero-layout-<?php echo esc_attr( $iscp_hero_layout ); ?>">
	<div class="iscp-container iscp-hero-grid">
		<div class="iscp-hero-copy iscp-reveal">
			<p class="iscp-eyebrow"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_eyebrow' ) ); ?></p>
			<h1><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_headline' ) ); ?></h1>
			<p class="iscp-hero-subtitle"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_subtitle' ) ); ?></p>
			<div class="iscp-action-row">
				<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_hero_primary_cta_url' ) ); ?>"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_primary_cta_text' ) ); ?></a>
				<a class="iscp-btn iscp-btn-light" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_hero_secondary_cta_url' ) ); ?>"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_secondary_cta_text' ) ); ?></a>
			</div>
			<?php if ( $iscp_badges ) : ?>
				<ul class="iscp-hero-badges" aria-label="<?php esc_attr_e( 'Company capabilities', 'iscp' ); ?>">
					<?php foreach ( $iscp_badges as $iscp_badge ) : ?>
						<li><?php echo esc_html( $iscp_badge ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<nav class="iscp-hero-suite-nav" aria-label="<?php esc_attr_e( 'Indian Servers solution areas', 'iscp' ); ?>">
				<?php foreach ( $iscp_suite_links as $iscp_suite_link ) : ?>
					<a href="<?php echo esc_url( $iscp_suite_link['url'] ); ?>">
						<span class="iscp-suite-icon" aria-hidden="true"><?php echo iscp_get_menu_icon_markup( $iscp_suite_link['icon'] ); ?></span>
						<span class="iscp-suite-copy">
							<strong><?php echo esc_html( $iscp_suite_link['label'] ); ?></strong>
							<small><?php echo esc_html( $iscp_suite_link['text'] ); ?></small>
						</span>
					</a>
				<?php endforeach; ?>
			</nav>
		</div>

		<?php if ( iscp_get_theme_mod( 'iscp_hero_visual_enabled', true ) && 'minimal' !== $iscp_hero_layout && 'centered' !== $iscp_hero_layout ) : ?>
			<div class="iscp-hero-visual-wrap iscp-reveal" aria-hidden="true">
				<div class="is-globe-thumbnail"
					data-texture-url="<?php echo esc_url( get_template_directory_uri() . '/assets/images/globe/earth-network-texture.webp' ); ?>"
					data-fallback-url="<?php echo esc_url( get_template_directory_uri() . '/assets/images/globe/globe-fallback.webp' ); ?>">
					<div class="is-globe-loading">
						<div class="is-globe-loading-text"><?php esc_html_e( 'Loading 0%', 'iscp' ); ?></div>
						<div class="is-globe-progress">
							<span style="width:0%"></span>
						</div>
					</div>
					<canvas class="is-globe-canvas" width="180" height="180"></canvas>
					<div class="is-globe-fallback"></div>
				</div>
				<div class="iscp-hero-visual">
					<img class="iscp-hero-photo" src="<?php echo esc_url( $iscp_hero_image ); ?>" alt="" loading="eager" decoding="async">
					<div class="iscp-hero-photo-shade"></div>
					<div class="iscp-dashboard-card iscp-dashboard-card-main">
						<span class="iscp-dashboard-label"><?php esc_html_e( 'Delivery Health', 'iscp' ); ?></span>
						<strong>96%</strong>
						<svg viewBox="0 0 240 80" role="img" focusable="false" aria-hidden="true">
							<path class="iscp-visual-line iscp-visual-line-one" d="M4 62 C42 36 70 44 104 28 S172 20 236 12" />
							<path class="iscp-visual-line iscp-visual-line-two" d="M4 54 C42 58 74 22 112 38 S176 68 236 30" />
						</svg>
					</div>
					<div class="iscp-dashboard-card iscp-dashboard-card-small iscp-dashboard-card-a">
						<div class="iscp-dashboard-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="M8.7 16.6 4.1 12l4.6-4.6 1.4 1.4L6.9 12l3.2 3.2-1.4 1.4Zm6.6 0-1.4-1.4 3.2-3.2-3.2-3.2 1.4-1.4 4.6 4.6-4.6 4.6ZM12.2 18h-2.1l1.7-12h2.1l-1.7 12Z"/></svg>
						</div>
						<span><?php esc_html_e( 'Active Builds', 'iscp' ); ?></span>
						<strong>24+</strong>
					</div>
					<div class="iscp-dashboard-card iscp-dashboard-card-small iscp-dashboard-card-b">
						<div class="iscp-dashboard-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="M5 18.5h14a3 3 0 0 0 .7-5.9 5.8 5.8 0 0 0-11.1-1.8A4 4 0 0 0 5 18.5Zm0-2a2 2 0 0 1 0-4h1.2l.4-1.1a3.8 3.8 0 0 1 7.3 1.2v1.1h2.9a1.8 1.8 0 1 1 0 3.6H5Z"/></svg>
						</div>
						<span><?php esc_html_e( 'Cloud Uptime', 'iscp' ); ?></span>
						<strong>99.9</strong>
					</div>
					<div class="iscp-dashboard-node iscp-dashboard-node-one"></div>
					<div class="iscp-dashboard-node iscp-dashboard-node-two"></div>
					<div class="iscp-dashboard-node iscp-dashboard-node-three"></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
