<?php
/** Shared service experience inside the existing native/virtual page templates. */
defined( 'ABSPATH' ) || exit;
$service = $args['service'];
$native = ! empty( $args['native'] );
$business = iscp_get_software_business_profile();
$hub = iscp_software_page_url( 'software-solutions' );
$region = iscp_service_area_url();
$title = $native ? get_the_title() : $service['title'];
$profiles = iscp_get_service_experiences();
foreach ( iscp_get_editable_offering_pages() as $group ) {
	$profiles += $group['items'];
}
?>
<article class="iscp-service-experience" data-iscp-service="<?php echo esc_attr( $service['slug'] ); ?>">
	<div class="iscp-container">
		<nav class="iscp-service-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'iscp' ); ?>"><ol><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li><?php if ( $hub ) : ?><li><a href="<?php echo esc_url( $hub ); ?>">Software Solutions</a></li><?php endif; ?><li aria-current="page"><?php echo esc_html( $title ); ?></li></ol></nav>
		<header class="iscp-service-hero">
			<div>
				<p class="iscp-service-kicker">Indian Servers · Software solutions</p>
				<h1 class="iscp-service-title"><?php echo esc_html( $title ); ?></h1>
				<p class="iscp-service-lead"><?php echo esc_html( $service['summary'] ); ?></p>
				<p class="iscp-service-audience"><strong>For:</strong> <?php echo esc_html( $service['audience'] ); ?></p>
				<div class="iscp-service-actions">
					<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( 'tel:' . $business['telephone'] ); ?>" data-iscp-conversion="call_click">Call <?php echo esc_html( $business['phone'] ); ?></a>
					<a class="iscp-btn iscp-btn-ghost" href="#iscp-service-enquiry" data-iscp-interest="demo" data-iscp-conversion="demo_intent">Request Demo</a>
					<a class="iscp-service-text-link" href="#iscp-service-enquiry" data-iscp-interest="quotation" data-iscp-conversion="quote_intent">Request Quotation <span aria-hidden="true">↗</span></a>
				</div>
			</div>
			<aside class="iscp-service-plan" aria-label="<?php esc_attr_e( 'Plan your software discussion', 'iscp' ); ?>">
				<p class="iscp-service-kicker">A clear starting point</p><h2>Bring your workflow.<br>Build a practical scope.</h2>
				<ol><li><strong>01 · Explain the process</strong><span>Users, records, reports and pain points.</span></li><li><strong>02 · Review the fit</strong><span>Existing product, integration or custom work.</span></li><li><strong>03 · Agree on delivery</strong><span>Demonstration, scope, training and support.</span></li></ol>
				<p>No assumed module bundle or fixed-price promise. Confirm the proposed scope with our team.</p>
			</aside>
		</header>
		<section class="iscp-service-section iscp-service-problem" aria-labelledby="iscp-service-problem-title"><div><p class="iscp-service-kicker">The operational challenge</p><h2 id="iscp-service-problem-title">Connect the work that matters</h2></div><p><?php echo esc_html( $service['problem'] ); ?></p></section>
		<section class="iscp-service-section" aria-labelledby="iscp-service-features-title">
			<div class="iscp-service-heading"><p class="iscp-service-kicker">Modules and workflows</p><h2 id="iscp-service-features-title">What to review in your demonstration</h2><p>These are discussion areas for this offering. Confirm availability, integrations and included modules in your agreed scope.</p></div>
			<div class="iscp-service-feature-grid">
			<?php foreach ( $service['features'] as $index => $feature ) : ?>
				<section class="iscp-service-feature"><span class="iscp-service-feature-icon" aria-hidden="true"><?php echo iscp_get_menu_icon_markup( 0 === $index % 2 ? 'code' : 'chart' ); ?></span><h3><?php echo esc_html( $feature ); ?></h3></section>
			<?php endforeach; ?>
			</div>
		</section>
		<?php if ( $native ) : ?>
			<section class="iscp-service-section iscp-service-editor-content iscp-entry-content" aria-label="<?php esc_attr_e( 'Detailed requirements and planning', 'iscp' ); ?>"><?php the_content(); ?></section>
		<?php else : ?>
			<?php iscp_render_manual_page_content_by_path( get_query_var( 'iscp_offering_group' ) . '/' . $service['slug'] ); ?>
			<section class="iscp-service-section iscp-service-faq" aria-labelledby="iscp-service-faq-title">
				<h2 id="iscp-service-faq-title">Questions before you choose software</h2>
				<details><summary><?php echo esc_html( $service['question'] ); ?></summary><p><?php echo esc_html( $service['answer'] ); ?></p></details>
				<details><summary>How should we prepare for a <?php echo esc_html( $service['title'] ); ?> demonstration?</summary><p>Share your current process, sample reports with personal information removed, approximate user numbers and integration requirements. Ask Indian Servers to demonstrate the specific workflow you need rather than assuming every module is included.</p></details>
				<details><summary>Can this connect to our existing systems?</summary><p>Integration depends on your existing application, available APIs, access permissions and the agreed scope. Share the system and version with our team so compatibility and data migration can be assessed first.</p></details>
				<details><summary>How are deployment, training and support arranged?</summary><p>Confirm the hosting environment, data migration checks, staff responsibilities, training and ongoing support terms in the quotation. On-site availability and response times must be agreed for your location and project.</p></details>
			</section>
		<?php endif; ?>
		<section class="iscp-service-section iscp-service-demo" aria-labelledby="iscp-service-demo-title"><div><p class="iscp-service-kicker">See the relevant workflow</p><h2 id="iscp-service-demo-title">Ask for a guided demonstration</h2><p>Bring a sample report or describe a day in your team’s work. Ask which capabilities are available now and which need customization. Confirm the workflows, integrations and reporting that matter to your organization during the demonstration.</p></div><a class="iscp-btn iscp-btn-primary" href="#iscp-service-enquiry" data-iscp-interest="demo" data-iscp-conversion="demo_intent">Plan my demonstration</a></section>
		<section class="iscp-service-section" aria-labelledby="iscp-service-related-title"><p class="iscp-service-kicker">Connected requirements</p><h2 id="iscp-service-related-title">Related solutions to consider</h2><div class="iscp-service-related-grid">
		<?php foreach ( $service['related'] as $related ) : $related_url = iscp_software_page_url( $related ); if ( ! $related_url || ! isset( $profiles[ $related ] ) ) { continue; } ?>
			<a class="iscp-service-related" href="<?php echo esc_url( $related_url ); ?>"><h3><?php echo esc_html( $profiles[ $related ]['title'] ); ?></h3><span>Explore the workflow <span aria-hidden="true">→</span></span></a>
		<?php endforeach; ?>
		</div></section>
		<?php if ( $region ) : ?><p class="iscp-service-region-link">Planning implementation in Andhra Pradesh? <a href="<?php echo esc_url( $region ); ?>">Review service coverage and location questions</a>.</p><?php endif; ?>
		<?php get_template_part( 'template-parts/components/software-enquiry', null, array( 'service' => $service ) ); ?>
	</div>
	<div class="iscp-service-mobile-actions" aria-label="<?php esc_attr_e( 'Software enquiry shortcuts', 'iscp' ); ?>"><a href="<?php echo esc_url( 'tel:' . $business['telephone'] ); ?>" data-iscp-conversion="call_click">Call Now</a><a href="#iscp-service-enquiry" data-iscp-interest="demo" data-iscp-conversion="demo_intent">Request Demo</a></div>
</article>
