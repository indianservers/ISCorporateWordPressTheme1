<?php
/**
 * Virtual product/service page template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_group    = get_query_var( 'iscp_offering_group' );
$iscp_slug     = get_query_var( 'iscp_offering_slug' );
$iscp_offering = iscp_get_offering_page( $iscp_group, $iscp_slug );
$iscp_pages    = iscp_get_editable_offering_pages();
$iscp_features = ! empty( $iscp_offering['features'] ) ? $iscp_offering['features'] : iscp_get_offering_default_features( $iscp_group );
$iscp_is_product = 'products' === $iscp_group;
$iscp_image    = get_template_directory_uri() . ( $iscp_is_product ? '/assets/images/indianservers-software-team.png' : '/assets/images/indianservers-data-center.png' );
$iscp_modules  = ! empty( $iscp_offering['modules'] ) ? $iscp_offering['modules'] : array();
$iscp_outcomes = ! empty( $iscp_offering['outcomes'] ) ? $iscp_offering['outcomes'] : array();

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-offering-page iscp-offering-<?php echo esc_attr( sanitize_html_class( $iscp_group ) ); ?>">
	<section class="iscp-template-hero iscp-template-hero-offering">
		<div class="iscp-container iscp-template-hero-grid">
			<div class="iscp-template-hero-copy">
				<p class="iscp-eyebrow"><?php echo esc_html( $iscp_pages[ $iscp_group ]['label'] ); ?></p>
				<h1><?php echo esc_html( $iscp_offering['title'] ); ?></h1>
				<p class="iscp-template-hero-lead"><?php echo esc_html( $iscp_offering['summary'] ); ?></p>
				<div class="iscp-action-row">
					<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Requirement', 'iscp' ); ?></a>
					<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( home_url( $iscp_is_product ? '/products/' : '/services/' ) ); ?>"><?php esc_html_e( 'View All', 'iscp' ); ?></a>
				</div>
			</div>
			<figure class="iscp-page-image-card">
				<img src="<?php echo esc_url( $iscp_image ); ?>" alt="<?php echo esc_attr( $iscp_offering['title'] ); ?>" loading="lazy" decoding="async">
			</figure>
		</div>
	</section>

	<?php iscp_render_manual_page_content_by_path( $iscp_pages[ $iscp_group ]['base'] . '/' . $iscp_slug ); ?>

	<section class="iscp-section iscp-offering-intelligence-section">
		<div class="iscp-container iscp-offering-detail-grid">
			<div class="iscp-page-copy">
				<p class="iscp-eyebrow"><?php echo esc_html( isset( $iscp_offering['kicker'] ) ? $iscp_offering['kicker'] : __( 'Indian Servers Approach', 'iscp' ) ); ?></p>
				<h2><?php echo esc_html( sprintf( __( '%s built for measurable adoption', 'iscp' ), $iscp_offering['title'] ) ); ?></h2>
				<p><?php echo esc_html( isset( $iscp_offering['intro'] ) ? $iscp_offering['intro'] : __( 'Indian Servers focuses on real workflows, secure deployment, useful reporting and supportable architecture.', 'iscp' ) ); ?></p>
				<?php if ( ! empty( $iscp_offering['best_for'] ) ) : ?>
					<div class="iscp-offering-fit">
						<strong><?php esc_html_e( 'Best for', 'iscp' ); ?></strong>
						<span><?php echo esc_html( $iscp_offering['best_for'] ); ?></span>
					</div>
				<?php endif; ?>
			</div>
			<div class="iscp-offering-feature-card">
				<h2><?php esc_html_e( 'Key Coverage', 'iscp' ); ?></h2>
				<ul>
					<?php foreach ( $iscp_features as $iscp_feature ) : ?>
						<li><?php echo esc_html( $iscp_feature ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted iscp-offering-rich-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php echo esc_html( $iscp_is_product ? __( 'What you get', 'iscp' ) : __( 'Delivery focus', 'iscp' ) ); ?></p>
				<h2><?php echo esc_html( $iscp_is_product ? __( 'Business-ready components and outcomes', 'iscp' ) : __( 'Structured delivery from discovery to support', 'iscp' ) ); ?></h2>
			</div>
			<div class="iscp-offering-rich-grid">
				<?php if ( $iscp_modules ) : ?>
					<div class="iscp-offering-panel iscp-offering-panel-dark">
						<div class="iscp-offering-panel-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( iscp_get_offering_icon_path( isset( $iscp_offering['icon'] ) ? $iscp_offering['icon'] : 'cube' ) ); ?>"/></svg>
						</div>
						<h3><?php esc_html_e( 'Core Modules', 'iscp' ); ?></h3>
						<div class="iscp-offering-chip-grid">
							<?php foreach ( $iscp_modules as $iscp_module ) : ?>
								<span><?php echo esc_html( $iscp_module ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $iscp_outcomes ) : ?>
					<div class="iscp-offering-panel">
						<h3><?php esc_html_e( 'Expected Outcomes', 'iscp' ); ?></h3>
						<ul class="iscp-check-list">
							<?php foreach ( $iscp_outcomes as $iscp_outcome ) : ?>
								<li><?php echo esc_html( $iscp_outcome ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<div class="iscp-offering-panel iscp-offering-panel-seo">
					<h3><?php esc_html_e( 'Search Focus', 'iscp' ); ?></h3>
					<p><?php echo esc_html( ! empty( $iscp_offering['seo_terms'] ) ? $iscp_offering['seo_terms'] : __( 'software development, cloud hosting, AI automation, cyber security and business software', 'iscp' ) ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-offering-cta-band">
		<div class="iscp-container iscp-offering-cta-card">
			<div>
				<p class="iscp-eyebrow"><?php esc_html_e( 'Request a Quote', 'iscp' ); ?></p>
				<h2><?php echo esc_html( ! empty( $iscp_offering['cta_title'] ) ? $iscp_offering['cta_title'] : __( 'Ready to discuss this requirement?', 'iscp' ) ); ?></h2>
				<p><?php echo esc_html( ! empty( $iscp_offering['cta_text'] ) ? $iscp_offering['cta_text'] : __( 'Indian Servers can help you plan, build and support the right solution.', 'iscp' ) ); ?></p>
			</div>
			<a class="iscp-btn iscp-btn-gold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a Quote', 'iscp' ); ?></a>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Related Links', 'iscp' ); ?></p>
				<h2><?php echo esc_html( $iscp_is_product ? __( 'Explore More Products', 'iscp' ) : __( 'Explore More Services', 'iscp' ) ); ?></h2>
			</div>
			<div class="iscp-offering-link-grid">
				<?php foreach ( array_slice( $iscp_pages[ $iscp_group ]['items'], 0, 8, true ) as $iscp_related_slug => $iscp_related ) : ?>
					<a href="<?php echo esc_url( ! empty( $iscp_related['url'] ) ? $iscp_related['url'] : home_url( '/' . $iscp_pages[ $iscp_group ]['base'] . '/' . $iscp_related_slug . '/' ) ); ?>">
						<span><?php echo esc_html( $iscp_related['title'] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
