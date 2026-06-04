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
$iscp_hero_stats = array(
	array( 'value' => __( '2200+', 'iscp' ), 'label' => __( 'Clients Served', 'iscp' ) ),
	array( 'value' => __( '15+', 'iscp' ), 'label' => __( 'Years Since 2009', 'iscp' ) ),
	array( 'value' => __( '8', 'iscp' ), 'label' => __( 'Product Lines', 'iscp' ) ),
	array( 'value' => __( '3', 'iscp' ), 'label' => __( 'Global Hubs', 'iscp' ) ),
);
$iscp_hero_headline       = iscp_get_theme_mod( 'iscp_hero_headline', __( 'Software That Works. AI That Thinks. Cloud That Scales.', 'iscp' ) );
$iscp_hero_headline_words = preg_split( '/\s+/', trim( wp_strip_all_tags( $iscp_hero_headline ) ) );
$iscp_hero_headline_lines = array_slice( array_chunk( array_filter( $iscp_hero_headline_words ), 3 ), 0, 3 );
?>

<section id="iscp-hero" class="iscp-section iscp-hero-section iscp-hero-layout-<?php echo esc_attr( $iscp_hero_layout ); ?>">
	<div class="iscp-container iscp-hero-grid">
		<div class="iscp-hero-copy iscp-reveal">
			<p class="iscp-eyebrow"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_eyebrow', __( 'Trusted by 2,200+ businesses across 6 countries', 'iscp' ) ) ); ?></p>
			<h1 aria-label="<?php echo esc_attr( $iscp_hero_headline ); ?>">
				<?php foreach ( $iscp_hero_headline_lines as $iscp_hero_headline_line ) : ?>
					<span><?php echo esc_html( implode( ' ', $iscp_hero_headline_line ) ); ?></span>
				<?php endforeach; ?>
			</h1>
			<p class="iscp-hero-subtitle"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_subtitle', __( 'Indian Servers builds custom software, SaaS products, AI systems and managed cloud infrastructure for businesses in India, USA, UAE, Australia and South Africa.', 'iscp' ) ) ); ?></p>
			<div class="iscp-action-row">
				<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_hero_primary_cta_url' ) ); ?>"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_primary_cta_text', __( 'Get a Free Estimate', 'iscp' ) ) ); ?></a>
				<a class="iscp-btn iscp-btn-light" href="<?php echo esc_url( iscp_get_theme_mod( 'iscp_hero_secondary_cta_url' ) ); ?>"><?php echo esc_html( iscp_get_theme_mod( 'iscp_hero_secondary_cta_text', __( 'Explore Our Products', 'iscp' ) ) ); ?></a>
			</div>
			<div class="iscp-hero-stats-bar" aria-label="<?php esc_attr_e( 'Indian Servers quick numbers', 'iscp' ); ?>">
				<?php foreach ( $iscp_hero_stats as $iscp_hero_stat ) : ?>
					<span><strong><?php echo esc_html( $iscp_hero_stat['value'] ); ?></strong><?php echo esc_html( $iscp_hero_stat['label'] ); ?></span>
				<?php endforeach; ?>
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
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
