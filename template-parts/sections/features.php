<?php
/**
 * Features section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_features = array(
	__( '.NET / ASP.NET Core', 'iscp' ),
	__( 'PHP / WordPress / Laravel', 'iscp' ),
	__( 'Python / AI / Data', 'iscp' ),
	__( 'React / Node.js / APIs', 'iscp' ),
	__( 'MySQL / SQL Server', 'iscp' ),
	__( 'Android / Mobile Apps', 'iscp' ),
	__( 'Cloud / VPS / DevOps', 'iscp' ),
	__( 'Security / VAPT', 'iscp' ),
);
?>

<section class="iscp-section iscp-home-features">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Technology Stack', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Platforms and Technologies We Work With', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-feature-list">
			<?php foreach ( $iscp_features as $iscp_feature ) : ?>
				<article class="iscp-feature-item iscp-reveal">
					<span aria-hidden="true"></span>
					<h3><?php echo esc_html( $iscp_feature ); ?></h3>
					<p><?php esc_html_e( 'Used across Indian Servers projects for scalable, secure and maintainable software delivery.', 'iscp' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
