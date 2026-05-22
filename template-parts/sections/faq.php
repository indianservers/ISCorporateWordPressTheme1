<?php
/**
 * FAQ section.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_query = new WP_Query(
	array(
		'post_type'           => 'iscp_faq',
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
	)
);

$iscp_fallback = array(
	array( 'question' => __( 'What kind of software does Indian Servers build?', 'iscp' ), 'answer' => __( 'Indian Servers develops business applications, ERP and CRM modules, cloud platforms, school software, mobile apps, AI automation tools and secure web portals.', 'iscp' ) ),
	array( 'question' => __( 'Can Indian Servers handle both development and hosting?', 'iscp' ), 'answer' => __( 'Yes. The team can plan, build, deploy, monitor and maintain applications on managed cloud or dedicated server environments.', 'iscp' ) ),
	array( 'question' => __( 'Do you build custom ERP or CRM systems?', 'iscp' ), 'answer' => __( 'Yes. Modules can be shaped around inventory, billing, customer management, admissions, reporting, workflows and internal operations.', 'iscp' ) ),
	array( 'question' => __( 'Is AI automation available for business workflows?', 'iscp' ), 'answer' => __( 'Yes. Indian Servers can add AI assistants, document processing, workflow automation and data-driven features where they create practical value.', 'iscp' ) ),
	array( 'question' => __( 'Do you provide long-term software support?', 'iscp' ), 'answer' => __( 'Yes. Maintenance, upgrades, bug fixes, server care and feature improvements can be handled after the first release.', 'iscp' ) ),
);
?>

<section class="iscp-section iscp-home-faq">
	<div class="iscp-container">
		<div class="iscp-section-heading iscp-reveal">
			<p class="iscp-eyebrow"><?php esc_html_e( 'FAQ', 'iscp' ); ?></p>
			<h2><?php esc_html_e( 'Common Questions About Indian Servers Software Work', 'iscp' ); ?></h2>
		</div>
		<div class="iscp-faq-list">
			<?php if ( $iscp_query->have_posts() ) : ?>
				<?php
				while ( $iscp_query->have_posts() ) :
					$iscp_query->the_post();
					get_template_part( 'template-parts/cards/card', 'faq', array( 'index' => get_the_ID() ) );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php foreach ( $iscp_fallback as $iscp_index => $iscp_item ) : ?>
					<?php get_template_part( 'template-parts/cards/card', 'faq', $iscp_item + array( 'index' => $iscp_index + 1 ) ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
