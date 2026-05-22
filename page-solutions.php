<?php
/**
 * Products and solutions page template loaded by slug.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_product_image = get_template_directory_uri() . '/assets/images/indianservers-software-team.png';

get_header();
?>

<main id="iscp-primary" class="iscp-main iscp-template-page iscp-products-page">
	<?php
	iscp_render_template_hero(
		array(
			'eyebrow'     => __( 'Products & Solutions', 'iscp' ),
			'title'       => __( 'Indian Servers SaaS Products and Business Platforms', 'iscp' ),
			'description' => __( 'Default product coverage for HRMS, school management software, CRM, inventory, restaurant POS, cloud systems, VAPT and custom enterprise software.', 'iscp' ),
			'variant'     => 'product',
			'primary'     => array( 'label' => __( 'Discuss Product Requirement', 'iscp' ), 'url' => home_url( '/contact/' ) ),
		)
	);
	?>

	<section class="iscp-section">
		<div class="iscp-container iscp-template-split">
			<div class="iscp-page-copy">
				<p class="iscp-eyebrow"><?php esc_html_e( 'Product Direction', 'iscp' ); ?></p>
				<h2><?php esc_html_e( 'Business software built for Indian operations and global scale', 'iscp' ); ?></h2>
				<p><?php esc_html_e( 'Indian Servers product pages are structured to present the platform clearly even before custom page copy is added. Each product can cover workflows, dashboards, access control, reports, integrations, hosting and support.', 'iscp' ); ?></p>
			</div>
			<figure class="iscp-page-image-card">
				<img src="<?php echo esc_url( $iscp_product_image ); ?>" alt="<?php esc_attr_e( 'Indian Servers product engineering dashboard and software team', 'iscp' ); ?>" loading="lazy" decoding="async">
			</figure>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/solutions' ); ?>
	<?php get_template_part( 'template-parts/sections/cta' ); ?>
</main>

<?php
get_footer();
