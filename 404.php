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
	<div class="iscp-container iscp-not-found-grid">
		<div class="iscp-not-found-copy">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Error 404', 'iscp' ); ?></p>
			<h1><?php esc_html_e( 'This route went offline.', 'iscp' ); ?></h1>
			<p><?php esc_html_e( 'Search Indian Servers or jump back home to continue exploring software, cloud, AI and security services.', 'iscp' ); ?></p>
			<div class="iscp-action-row">
				<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'iscp' ); ?></a>
				<?php get_search_form(); ?>
			</div>
		</div>
		<figure class="iscp-not-found-illustration" aria-hidden="true">
			<svg viewBox="0 0 560 420" role="img" focusable="false">
				<defs>
					<linearGradient id="iscp-404-screen" x1="0" x2="1" y1="0" y2="1">
						<stop offset="0" stop-color="#0a66ff"/>
						<stop offset="1" stop-color="#00b7c7"/>
					</linearGradient>
				</defs>
				<path d="M76 320c56 54 330 58 406-6 46-39 32-128-16-170-53-46-98-17-145-74-52-63-146-38-164 35-17 68-85 64-110 115-16 32 1 73 29 100Z" fill="rgba(255,255,255,.08)"/>
				<rect x="124" y="88" width="312" height="204" rx="24" fill="url(#iscp-404-screen)"/>
				<rect x="144" y="114" width="272" height="142" rx="14" fill="#07101f" opacity=".9"/>
				<path d="M176 160h72M176 194h150M176 228h108" stroke="#76dfff" stroke-width="12" stroke-linecap="round"/>
				<path d="M354 154l-46 46m0-46 46 46" stroke="#ffd84d" stroke-width="14" stroke-linecap="round"/>
				<path d="M238 292h84l18 52H220l18-52Z" fill="#dbeafe"/>
				<rect x="196" y="340" width="168" height="20" rx="10" fill="#ffffff"/>
				<circle cx="430" cy="88" r="28" fill="#ffd84d"/>
				<circle cx="114" cy="254" r="18" fill="#00b7c7"/>
			</svg>
		</figure>
	</div>
</section>

<?php
get_footer();
