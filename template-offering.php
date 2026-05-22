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

	<section class="iscp-section">
		<div class="iscp-container iscp-offering-detail-grid">
			<div class="iscp-page-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Indian Servers Approach', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Built for practical business adoption', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers focuses on real workflows, secure deployment, useful reporting and supportable architecture. Every engagement can be adapted for Andhra Pradesh, Telangana, Dehradun, Dubai, USA and broader global delivery needs.', 'iscp' ); ?></p>
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

	<section class="iscp-section iscp-section-muted">
		<div class="iscp-container">
			<div class="iscp-section-heading">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Related Links', 'iscp' ); ?></p>
				<h2><?php echo esc_html( $iscp_is_product ? __( 'Explore More Products', 'iscp' ) : __( 'Explore More Services', 'iscp' ) ); ?></h2>
			</div>
			<div class="iscp-offering-link-grid">
				<?php foreach ( array_slice( $iscp_pages[ $iscp_group ]['items'], 0, 8, true ) as $iscp_related_slug => $iscp_related ) : ?>
					<a href="<?php echo esc_url( home_url( '/' . $iscp_pages[ $iscp_group ]['base'] . '/' . $iscp_related_slug . '/' ) ); ?>">
						<span><?php echo esc_html( $iscp_related['title'] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
