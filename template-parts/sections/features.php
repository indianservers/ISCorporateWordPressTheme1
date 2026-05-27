<?php
/**
 * Features section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_features = array(
	array( 'label' => __( '.NET', 'iscp' ), 'subtitle' => __( 'Enterprise apps, APIs, Azure — .NET 8 & C#', 'iscp' ) ),
	array( 'label' => __( 'PHP', 'iscp' ), 'subtitle' => __( 'WordPress, Laravel, custom CMS and portals', 'iscp' ) ),
	array( 'label' => __( 'Python', 'iscp' ), 'subtitle' => __( 'AI, ML, data pipelines, Django and FastAPI', 'iscp' ) ),
	array( 'label' => __( 'React', 'iscp' ), 'subtitle' => __( 'SPAs, dashboards, PWAs with React 18 and Next.js', 'iscp' ) ),
	array( 'label' => __( 'MySQL', 'iscp' ), 'subtitle' => __( 'Relational databases, query optimisation, migrations', 'iscp' ) ),
	array( 'label' => __( 'Android', 'iscp' ), 'subtitle' => __( 'Native and cross-platform Android and iOS apps', 'iscp' ) ),
	array( 'label' => __( 'Cloud', 'iscp' ), 'subtitle' => __( 'AWS, Azure, GCP — VPS, containers, monitoring', 'iscp' ) ),
	array( 'label' => __( 'Security', 'iscp' ), 'subtitle' => __( 'VAPT, penetration testing, ISO 27001, CERT-In', 'iscp' ) ),
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
					<h3><?php echo esc_html( $iscp_feature['label'] ); ?></h3>
					<small><?php echo esc_html( $iscp_feature['subtitle'] ); ?></small>
					<p><?php esc_html_e( 'Used across Indian Servers projects for scalable, secure and maintainable software delivery.', 'iscp' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
