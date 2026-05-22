<?php
/**
 * Single case study template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php
	$iscp_client      = get_post_meta( get_the_ID(), '_iscp_case_client', true );
	$iscp_industry    = get_post_meta( get_the_ID(), '_iscp_case_industry', true );
	$iscp_result      = get_post_meta( get_the_ID(), '_iscp_case_result', true );
	$iscp_project_url = get_post_meta( get_the_ID(), '_iscp_case_project_url', true );
	?>
	<section class="iscp-section iscp-single-hero">
		<div class="iscp-container">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Case Study', 'iscp' ); ?></p>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
			<?php if ( $iscp_result ) : ?>
				<p><?php echo esc_html( $iscp_result ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<article class="iscp-container iscp-content-layout iscp-cpt-single">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="iscp-entry-media"><?php the_post_thumbnail( 'iscp-wide' ); ?></div>
		<?php endif; ?>
		<ul class="iscp-case-meta">
			<?php if ( $iscp_client ) : ?><li><strong><?php esc_html_e( 'Client:', 'iscp' ); ?></strong> <?php echo esc_html( $iscp_client ); ?></li><?php endif; ?>
			<?php if ( $iscp_industry ) : ?><li><strong><?php esc_html_e( 'Industry:', 'iscp' ); ?></strong> <?php echo esc_html( $iscp_industry ); ?></li><?php endif; ?>
			<?php if ( $iscp_project_url ) : ?><li><strong><?php esc_html_e( 'Project:', 'iscp' ); ?></strong> <a href="<?php echo esc_url( $iscp_project_url ); ?>"><?php esc_html_e( 'Visit Website', 'iscp' ); ?></a></li><?php endif; ?>
		</ul>
		<div class="iscp-entry-content"><?php the_content(); ?></div>
		<div class="iscp-single-cta">
			<h2><?php esc_html_e( 'Plan a project like this', 'iscp' ); ?></h2>
			<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Start a Conversation', 'iscp' ); ?></a>
		</div>
	</article>
<?php endwhile; ?>

<?php
$iscp_related = new WP_Query(
	array(
		'post_type'           => 'iscp_case_study',
		'posts_per_page'      => 3,
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => true,
	)
);
if ( $iscp_related->have_posts() ) :
	?>
	<section class="iscp-section iscp-section-alt">
		<div class="iscp-container">
			<div class="iscp-section-heading"><h2><?php esc_html_e( 'Related Case Studies', 'iscp' ); ?></h2></div>
			<div class="iscp-card-grid iscp-card-grid-3">
				<?php
				while ( $iscp_related->have_posts() ) :
					$iscp_related->the_post();
					get_template_part( 'template-parts/cards/card', 'case-study' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
get_footer();
