<?php
/**
 * Capabilities section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_server_image    = get_template_directory_uri() . '/assets/images/indianservers-data-center.png';
$iscp_software_image  = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';
$iscp_capability_cards = array(
	array( 'title' => __( 'Software', 'iscp' ), 'icon' => 'code', 'url' => '/services/custom-software-development/' ),
	array( 'title' => __( 'Web Apps', 'iscp' ), 'icon' => 'web', 'url' => '/services/web-application-development/' ),
	array( 'title' => __( 'Mobile Apps', 'iscp' ), 'icon' => 'mobile', 'url' => '/services/mobile-app-development/' ),
	array( 'title' => __( 'AI', 'iscp' ), 'icon' => 'ai', 'url' => '/services/ai-development/' ),
	array( 'title' => __( 'AR/VR', 'iscp' ), 'icon' => 'ar', 'url' => '/services/ar-vr-development/' ),
	array( 'title' => __( 'Cloud', 'iscp' ), 'icon' => 'cloud', 'url' => '/services/cloud-hosting/' ),
	array( 'title' => __( 'Cyber Security', 'iscp' ), 'icon' => 'shield', 'url' => '/services/cyber-security-vapt/' ),
	array( 'title' => __( 'Dedicated Teams', 'iscp' ), 'icon' => 'team', 'url' => '/services/dedicated-development-teams/' ),
);

$iscp_icons = array(
	'code'   => 'M8.7 16.6 4.1 12l4.6-4.6 1.4 1.4L6.9 12l3.2 3.2-1.4 1.4Zm6.6 0-1.4-1.4 3.2-3.2-3.2-3.2 1.4-1.4 4.6 4.6-4.6 4.6ZM12.2 18h-2.1l1.7-12h2.1l-1.7 12Z',
	'web'    => 'M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm0 4v8h16V9H4Zm2-2h2v1H6V7Zm3 0h2v1H9V7Z',
	'mobile' => 'M8 2h8a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm0 3v14h8V5H8Zm3 11h2v1.6h-2V16Z',
	'ai'     => 'M11 2h2v3h-2V2ZM7 10a5 5 0 0 1 10 0v2.2l2 1.2V19H5v-5.6l2-1.2V10Zm2 0v3.3l-2 1.2V17h10v-2.5l-2-1.2V10a3 3 0 0 0-6 0Zm1 5h2v1.2h-2V15Zm4 0h2v1.2h-2V15Z',
	'ar'     => 'M4 6.5 12 2l8 4.5v9L12 20l-8-4.5v-9Zm2 1.2v6.6l5 2.8v-6.6L6 7.7Zm7 9.4 5-2.8V7.7l-5 2.8v6.6Zm-1-8.3 4.9-2.8L12 3.2 7.1 6 12 8.8Z',
	'cloud'  => 'M5 18.5h14a3 3 0 0 0 .7-5.9 5.8 5.8 0 0 0-11.1-1.8A4 4 0 0 0 5 18.5Zm0-2a2 2 0 0 1 0-4h1.2l.4-1.1a3.8 3.8 0 0 1 7.3 1.2v1.1h2.9a1.8 1.8 0 1 1 0 3.6H5Z',
	'shield' => 'M12 2 5 5v6c0 4.4 2.8 8.5 7 10 4.2-1.5 7-5.6 7-10V5l-7-3Zm0 2.2 5 2.1V11c0 3.2-1.9 6.2-5 7.7-3.1-1.5-5-4.5-5-7.7V6.3l5-2.1Z',
	'team'   => 'M9 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm7.5-.5a3 3 0 1 1 0-6 3 3 0 0 1 0 6ZM2.5 20a6.5 6.5 0 0 1 13 0h-2a4.5 4.5 0 0 0-9 0h-2Zm12.8-5.8A5.5 5.5 0 0 1 21.5 20h-2a3.5 3.5 0 0 0-4-3.5l-.2-2.3Z',
);
?>

<section class="iscp-section iscp-section-alt iscp-capabilities-section">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Core Capabilities', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Eight Ways Indian Servers Helps Businesses Build and Scale', 'iscp' ); ?></h2>
		</div>

		<div class="iscp-capability-main-grid">
			<?php foreach ( $iscp_capability_cards as $iscp_card ) : ?>
				<a class="iscp-capability-main-card iscp-reveal" href="<?php echo esc_url( home_url( $iscp_card['url'] ) ); ?>">
					<span aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( $iscp_icons[ $iscp_card['icon'] ] ); ?>"/></svg>
					</span>
					<strong><?php echo esc_html( $iscp_card['title'] ); ?></strong>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="iscp-capability-visual-strip iscp-reveal">
			<figure>
				<img src="<?php echo esc_url( $iscp_server_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers server and cloud hosting infrastructure', 'iscp' ); ?>" loading="lazy" decoding="async">
				<figcaption><?php esc_html_e( 'Server and Cloud Infrastructure', 'iscp' ); ?></figcaption>
			</figure>
			<figure>
				<img src="<?php echo esc_url( $iscp_software_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers software dashboard and development workspace', 'iscp' ); ?>" loading="lazy" decoding="async">
				<figcaption><?php esc_html_e( 'Software Dashboards and Product Engineering', 'iscp' ); ?></figcaption>
			</figure>
		</div>
	</div>
</section>
