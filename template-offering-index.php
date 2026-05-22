<?php
/**
 * Virtual product/service index page template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_group      = get_query_var( 'iscp_offering_group' );
$iscp_pages      = iscp_get_editable_offering_pages();
$iscp_group_data = isset( $iscp_pages[ $iscp_group ] ) ? $iscp_pages[ $iscp_group ] : $iscp_pages['products'];
$iscp_is_product = 'products' === $iscp_group;
$iscp_image      = get_template_directory_uri() . ( $iscp_is_product ? '/assets/images/indianservers-software-team.png' : '/assets/images/indianservers-data-center.png' );
$iscp_manual_page = iscp_get_manual_page_by_path( $iscp_group_data['base'] );
$iscp_manual_has_content = $iscp_manual_page && '' !== trim( wp_strip_all_tags( $iscp_manual_page->post_content ) );

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-offering-index iscp-offering-index-<?php echo esc_attr( sanitize_html_class( $iscp_group ) ); ?>">
	<?php if ( ! $iscp_manual_has_content ) : ?>
		<section class="iscp-template-hero iscp-template-hero-offering">
			<div class="iscp-container iscp-template-hero-grid">
				<div class="iscp-template-hero-copy">
					<p class="iscp-eyebrow"><?php echo esc_html( $iscp_group_data['label'] ); ?></p>
					<h1>
						<?php
						echo esc_html(
							$iscp_is_product
								? __( 'Indian Servers Products', 'iscp' )
								: __( 'Indian Servers Services', 'iscp' )
						);
						?>
					</h1>
					<p class="iscp-template-hero-lead">
						<?php
						echo esc_html(
							$iscp_is_product
								? __( 'Explore SaaS products and business platforms for HRMS, schools, CRM, inventory, restaurant POS, ERP, AI and cloud operations.', 'iscp' )
								: __( 'Explore custom software, web and mobile applications, AI, AR/VR, cloud hosting, cybersecurity, VAPT and dedicated engineering teams.', 'iscp' )
						);
						?>
					</p>
					<div class="iscp-action-row">
						<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a Project', 'iscp' ); ?></a>
						<a class="iscp-btn iscp-btn-ghost" href="<?php echo esc_url( home_url( $iscp_is_product ? '/services/' : '/products/' ) ); ?>">
							<?php echo esc_html( $iscp_is_product ? __( 'View Services', 'iscp' ) : __( 'View Products', 'iscp' ) ); ?>
						</a>
					</div>
				</div>
				<figure class="iscp-page-image-card">
					<img src="<?php echo esc_url( $iscp_image ); ?>" alt="<?php echo esc_attr( $iscp_group_data['label'] ); ?>" loading="lazy" decoding="async">
				</figure>
			</div>
		</section>
	<?php endif; ?>

	<?php iscp_render_manual_page_content_by_path( $iscp_group_data['base'] ); ?>

	<section class="iscp-section iscp-index-proof-section">
		<div class="iscp-container iscp-index-proof-grid">
			<div class="iscp-index-proof-card">
				<span><?php esc_html_e( '01', 'iscp' ); ?></span>
				<h2><?php echo esc_html( $iscp_is_product ? __( 'Product thinking with implementation support', 'iscp' ) : __( 'Discovery before development', 'iscp' ) ); ?></h2>
				<p><?php echo esc_html( $iscp_is_product ? __( 'Indian Servers products are built around real business workflows, role-based access, practical reports and supportable cloud deployment.', 'iscp' ) : __( 'Every service starts with requirement clarity, architecture choices, delivery priorities and a realistic implementation plan.', 'iscp' ) ); ?></p>
			</div>
			<div class="iscp-index-proof-card">
				<span><?php esc_html_e( '02', 'iscp' ); ?></span>
				<h2><?php esc_html_e( 'India, USA and global delivery', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'We support organizations across India, USA, Dubai, Australia, South Africa and Europe with software, cloud, AI, security and maintenance services.', 'iscp' ); ?></p>
			</div>
			<div class="iscp-index-proof-card">
				<span><?php esc_html_e( '03', 'iscp' ); ?></span>
				<h2><?php esc_html_e( 'Built for long-term ownership', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'The goal is not just launch. Indian Servers plans for hosting, backups, monitoring, security, performance, documentation and ongoing improvements.', 'iscp' ); ?></p>
			</div>
		</div>
	</section>

	<section class="iscp-section iscp-offering-catalog <?php echo $iscp_manual_has_content ? 'iscp-offering-grid-section-compact' : ''; ?>">
		<div class="iscp-container">
			<div class="iscp-section-heading iscp-offering-catalog-heading">
				<p class="iscp-eyebrow"><?php echo esc_html( $iscp_is_product ? __( 'Our Products', 'iscp' ) : __( 'Our Services', 'iscp' ) ); ?></p>
				<h2>
					<?php
					echo esc_html(
						$iscp_is_product
							? __( 'Business-ready software products', 'iscp' )
							: __( 'Technology services for serious delivery', 'iscp' )
					);
					?>
				</h2>
				<p>
					<?php
					echo esc_html(
						$iscp_is_product
							? __( 'Choose from Indian Servers platforms for HR, education, sales, inventory, hospitality, ERP, AI and managed cloud operations.', 'iscp' )
							: __( 'Plan, build, secure and operate digital systems with Indian Servers teams across software, cloud, AI, security and support.', 'iscp' )
					);
					?>
				</p>
			</div>
			<div class="iscp-offering-card-grid">
				<?php foreach ( $iscp_group_data['items'] as $iscp_slug => $iscp_item ) : ?>
					<?php
					$iscp_item_url = ! empty( $iscp_item['url'] ) ? $iscp_item['url'] : home_url( '/' . $iscp_group_data['base'] . '/' . $iscp_slug . '/' );
					$iscp_icon     = isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'cube';
					?>
					<article class="iscp-offering-card iscp-offering-card-<?php echo esc_attr( sanitize_html_class( $iscp_icon ) ); ?>">
						<a class="iscp-offering-card-media" href="<?php echo esc_url( $iscp_item_url ); ?>" aria-label="<?php echo esc_attr( $iscp_item['title'] ); ?>">
							<span class="iscp-offering-card-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( iscp_get_offering_icon_path( $iscp_icon ) ); ?>"/></svg>
							</span>
							<span class="iscp-offering-card-art" aria-hidden="true">
								<span></span><span></span><span></span>
							</span>
						</a>
						<div class="iscp-offering-card-body">
							<h3><a href="<?php echo esc_url( $iscp_item_url ); ?>"><?php echo esc_html( $iscp_item['title'] ); ?></a></h3>
							<p><?php echo esc_html( wp_trim_words( $iscp_item['summary'], 22 ) ); ?></p>
						</div>
						<div class="iscp-offering-card-actions">
							<a class="iscp-card-link" href="<?php echo esc_url( $iscp_item_url ); ?>"><?php esc_html_e( 'Learn More', 'iscp' ); ?></a>
							<a class="iscp-card-quote" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
								<?php echo esc_html( $iscp_is_product ? __( 'Buy Now', 'iscp' ) : __( 'Request Quote', 'iscp' ) ); ?>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
