<?php
/**
 * Single industry template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

iscp_breadcrumbs();
?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<section class="iscp-section iscp-single-hero">
		<div class="iscp-container">
			<p class="iscp-eyebrow"><?php esc_html_e( 'Industry', 'iscp' ); ?></p>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<article class="iscp-container iscp-content-layout iscp-cpt-single">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="iscp-entry-media"><?php the_post_thumbnail( 'iscp-wide' ); ?></div>
		<?php endif; ?>
		<div class="iscp-entry-content"><?php the_content(); ?></div>
		<div class="iscp-single-cta">
			<h2><?php esc_html_e( 'Build for this industry', 'iscp' ); ?></h2>
			<a class="iscp-btn iscp-btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get Started', 'iscp' ); ?></a>
		</div>
	</article>
<?php endwhile; ?>

<?php
$iscp_related = new WP_Query(
	array(
		'post_type'           => 'iscp_industry',
		'posts_per_page'      => 3,
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => true,
	)
);
if ( $iscp_related->have_posts() ) :
	?>
	<section class="iscp-section iscp-section-alt">
		<div class="iscp-container">
			<div class="iscp-section-heading"><h2><?php esc_html_e( 'Related Industries', 'iscp' ); ?></h2></div>
			<div class="iscp-industry-grid">
				<?php
				while ( $iscp_related->have_posts() ) :
					$iscp_related->the_post();
					get_template_part( 'template-parts/cards/card', 'industry' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
get_footer();
