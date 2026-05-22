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

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-offering-index iscp-offering-index-<?php echo esc_attr( sanitize_html_class( $iscp_group ) ); ?>">
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
							: __( 'Explore software development, AI, cloud, cybersecurity, VAPT, mobile apps, WordPress and dedicated team services.', 'iscp' )
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

	<section class="iscp-section">
		<div class="iscp-container">
			<div class="iscp-offering-card-grid">
				<?php foreach ( $iscp_group_data['items'] as $iscp_slug => $iscp_item ) : ?>
					<a class="iscp-offering-card" href="<?php echo esc_url( ! empty( $iscp_item['url'] ) ? $iscp_item['url'] : home_url( '/' . $iscp_group_data['base'] . '/' . $iscp_slug . '/' ) ); ?>">
						<span aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><path d="<?php echo esc_attr( iscp_get_offering_icon_path( isset( $iscp_item['icon'] ) ? $iscp_item['icon'] : 'cube' ) ); ?>"/></svg>
						</span>
						<strong><?php echo esc_html( $iscp_item['title'] ); ?></strong>
						<small><?php echo esc_html( wp_trim_words( $iscp_item['summary'], 18 ) ); ?></small>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
