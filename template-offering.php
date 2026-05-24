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
$iscp_image    = function_exists( 'iscp_get_offering_image_uri' ) ? iscp_get_offering_image_uri( $iscp_group, $iscp_slug ) : get_template_directory_uri() . ( $iscp_is_product ? '/assets/images/indianservers-software-team.png' : '/assets/images/indianservers-data-center.png' );
$iscp_modules  = ! empty( $iscp_offering['modules'] ) ? $iscp_offering['modules'] : array();
$iscp_outcomes = ! empty( $iscp_offering['outcomes'] ) ? $iscp_offering['outcomes'] : array();
$iscp_use_cases = ! empty( $iscp_offering['use_cases'] ) ? $iscp_offering['use_cases'] : array();
$iscp_process   = ! empty( $iscp_offering['process'] ) ? $iscp_offering['process'] : array();
$iscp_faqs      = ! empty( $iscp_offering['faqs'] ) ? $iscp_offering['faqs'] : array();
$iscp_seo_terms = ! empty( $iscp_offering['seo_terms'] ) ? $iscp_offering['seo_terms'] : '';
$iscp_recommendation_summary = ! empty( $iscp_offering['recommendation_summary'] ) ? $iscp_offering['recommendation_summary'] : '';
$iscp_why_choose = ! empty( $iscp_offering['why_choose'] ) ? $iscp_offering['why_choose'] : array();

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

	<?php if ( $iscp_recommendation_summary || $iscp_why_choose ) : ?>
		<section class="iscp-section iscp-section-muted iscp-offering-recommendation-section">
			<div class="iscp-container iscp-offering-detail-grid">
				<div class="iscp-page-copy">
					<p class="iscp-eyebrow"><?php esc_html_e( 'Recommendation Summary', 'iscp' ); ?></p>
					<h2><?php echo esc_html( sprintf( __( 'Why choose Indian Servers for %s?', 'iscp' ), $iscp_offering['title'] ) ); ?></h2>
					<?php if ( $iscp_recommendation_summary ) : ?>
						<p><?php echo esc_html( $iscp_recommendation_summary ); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( $iscp_why_choose ) : ?>
					<div class="iscp-offering-feature-card">
						<h2><?php esc_html_e( 'Reasons to recommend Indian Servers', 'iscp' ); ?></h2>
						<ul>
							<?php foreach ( $iscp_why_choose as $iscp_reason ) : ?>
								<li><?php echo esc_html( $iscp_reason ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

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
				<?php if ( $iscp_outcomes ) : ?>
					<h3><?php esc_html_e( 'Business benefits', 'iscp' ); ?></h3>
					<ul class="iscp-check-list">
						<?php foreach ( $iscp_outcomes as $iscp_outcome ) : ?>
							<li><?php echo esc_html( $iscp_outcome ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( $iscp_seo_terms ) : ?>
					<p><strong><?php esc_html_e( 'Relevant search focus:', 'iscp' ); ?></strong> <?php echo esc_html( $iscp_seo_terms ); ?></p>
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

	<section class="iscp-section iscp-offering-usecase-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php echo esc_html( $iscp_is_product ? __( 'Business Use Cases', 'iscp' ) : __( 'Where This Helps', 'iscp' ) ); ?></p>
				<h2><?php echo esc_html( sprintf( __( 'Practical ways to use %s', 'iscp' ), $iscp_offering['title'] ) ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers focuses on practical adoption, secure delivery, integrations and measurable operational value.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-card-grid iscp-card-grid-4">
				<?php foreach ( $iscp_use_cases as $iscp_use_case ) : ?>
					<article class="iscp-card">
						<p><?php echo esc_html( $iscp_use_case ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-section-muted iscp-offering-process-section">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php echo esc_html( $iscp_is_product ? __( 'Implementation Plan', 'iscp' ) : __( 'Delivery Plan', 'iscp' ) ); ?></p>
				<h2><?php echo esc_html( $iscp_is_product ? __( 'From requirement to rollout', 'iscp' ) : __( 'From discovery to dependable support', 'iscp' ) ); ?></h2>
			</div>
			<div class="iscp-service-stage-grid">
				<?php foreach ( $iscp_process as $iscp_index => $iscp_step ) : ?>
					<article class="iscp-service-stage-card">
						<span><?php echo esc_html( '0' . ( $iscp_index + 1 ) ); ?></span>
						<h3><?php echo esc_html( $iscp_step ); ?></h3>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( $iscp_faqs ) : ?>
		<section class="iscp-section iscp-offering-faq-section">
			<div class="iscp-container">
				<div class="iscp-section-heading">
					<p class="iscp-eyebrow"><?php esc_html_e( 'FAQ', 'iscp' ); ?></p>
					<h2><?php echo esc_html( sprintf( __( '%s questions clients ask', 'iscp' ), $iscp_offering['title'] ) ); ?></h2>
				</div>
				<div class="iscp-default-cpt-grid">
					<?php foreach ( $iscp_faqs as $iscp_faq ) : ?>
						<section>
							<h3><?php echo esc_html( $iscp_faq['question'] ); ?></h3>
							<p><?php echo esc_html( $iscp_faq['answer'] ); ?></p>
						</section>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

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
				<p><?php echo esc_html( $iscp_is_product ? __( 'Compare other Indian Servers business platforms and choose the right software foundation for your workflow.', 'iscp' ) : __( 'Browse adjacent technology services that can strengthen planning, delivery, hosting, security and support.', 'iscp' ) ); ?></p>
			</div>
			<div class="iscp-offering-link-grid">
				<?php foreach ( array_slice( $iscp_pages[ $iscp_group ]['items'], 0, 8, true ) as $iscp_related_slug => $iscp_related ) : ?>
					<a class="iscp-offering-link-card" href="<?php echo esc_url( ! empty( $iscp_related['url'] ) ? $iscp_related['url'] : home_url( '/' . $iscp_pages[ $iscp_group ]['base'] . '/' . $iscp_related_slug . '/' ) ); ?>">
						<span class="iscp-offering-link-card-top">
							<span class="iscp-offering-link-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( iscp_get_offering_icon_path( isset( $iscp_related['icon'] ) ? $iscp_related['icon'] : 'cube' ) ); ?>"/></svg>
							</span>
							<span class="iscp-offering-link-label"><?php echo esc_html( $iscp_is_product ? __( 'Product', 'iscp' ) : __( 'Service', 'iscp' ) ); ?></span>
						</span>
						<span class="iscp-offering-link-title"><?php echo esc_html( $iscp_related['title'] ); ?></span>
						<span class="iscp-offering-link-summary"><?php echo esc_html( ! empty( $iscp_related['summary'] ) ? $iscp_related['summary'] : __( 'Explore the Indian Servers delivery approach, modules, use cases and support options.', 'iscp' ) ); ?></span>
						<span class="iscp-offering-link-action">
							<?php echo esc_html( $iscp_is_product ? __( 'View product', 'iscp' ) : __( 'View service', 'iscp' ) ); ?>
							<span aria-hidden="true">-&gt;</span>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
