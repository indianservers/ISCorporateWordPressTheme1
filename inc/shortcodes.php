<?php
/**
 * Lightweight ISCP shortcodes.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_shortcode_target' ) ) {
	/**
	 * Sanitize link target.
	 *
	 * @param string $target Target.
	 * @return string
	 */
	function iscp_shortcode_target( $target ) {
		return '_blank' === $target ? '_blank' : '_self';
	}
}

if ( ! function_exists( 'iscp_shortcode_grid_class' ) ) {
	/**
	 * Return safe grid class.
	 *
	 * @param int $columns Column count.
	 * @return string
	 */
	function iscp_shortcode_grid_class( $columns ) {
		$columns = absint( $columns );
		$columns = min( 4, max( 1, $columns ) );

		return 'iscp-grid iscp-grid-' . $columns;
	}
}

if ( ! function_exists( 'iscp_button_shortcode' ) ) {
	/**
	 * Button shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	function iscp_button_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'text'   => __( 'Learn More', 'iscp' ),
				'url'    => '#',
				'style'  => 'primary',
				'size'   => 'normal',
				'target' => '_self',
			),
			$atts,
			'iscp_button'
		);
		$style  = in_array( $atts['style'], array( 'primary', 'secondary', 'ghost' ), true ) ? $atts['style'] : 'primary';
		$size   = in_array( $atts['size'], array( 'small', 'normal', 'large' ), true ) ? $atts['size'] : 'normal';
		$target = iscp_shortcode_target( $atts['target'] );
		$rel    = '_blank' === $target ? ' rel="noopener noreferrer"' : '';

		return sprintf(
			'<a class="iscp-btn iscp-btn-%1$s iscp-btn-%2$s" href="%3$s" target="%4$s"%5$s>%6$s</a>',
			esc_attr( $style ),
			esc_attr( $size ),
			esc_url( $atts['url'] ),
			esc_attr( $target ),
			$rel,
			esc_html( $atts['text'] )
		);
	}
}
add_shortcode( 'iscp_button', 'iscp_button_shortcode' );

if ( ! function_exists( 'iscp_cta_shortcode' ) ) {
	/**
	 * CTA shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	function iscp_cta_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'title'       => __( 'Ready to grow?', 'iscp' ),
				'subtitle'    => __( 'Use this section to guide visitors toward the next business action.', 'iscp' ),
				'button_text' => __( 'Get Started', 'iscp' ),
				'button_url'  => '#',
				'style'       => 'light',
			),
			$atts,
			'iscp_cta'
		);
		$style = in_array( $atts['style'], array( 'light', 'dark', 'gradient' ), true ) ? $atts['style'] : 'light';

		return '<div class="iscp-shortcode-cta iscp-shortcode-cta-' . esc_attr( $style ) . '"><h2>' . esc_html( $atts['title'] ) . '</h2><p>' . esc_html( $atts['subtitle'] ) . '</p>' . iscp_button_shortcode( array( 'text' => $atts['button_text'], 'url' => $atts['button_url'] ) ) . '</div>';
	}
}
add_shortcode( 'iscp_cta', 'iscp_cta_shortcode' );

if ( ! function_exists( 'iscp_icon_box_shortcode' ) ) {
	/**
	 * Icon box shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	function iscp_icon_box_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'icon'        => '',
				'title'       => __( 'Icon Box', 'iscp' ),
				'description' => __( 'Add a short benefit-focused description.', 'iscp' ),
				'url'         => '',
			),
			$atts,
			'iscp_icon_box'
		);
		$title = $atts['url'] ? '<a href="' . esc_url( $atts['url'] ) . '">' . esc_html( $atts['title'] ) . '</a>' : esc_html( $atts['title'] );

		return '<div class="iscp-card iscp-shortcode-icon-box"><span class="iscp-icon-box">' . esc_html( substr( sanitize_text_field( $atts['icon'] ), 0, 2 ) ) . '</span><h3>' . $title . '</h3><p>' . esc_html( $atts['description'] ) . '</p></div>';
	}
}
add_shortcode( 'iscp_icon_box', 'iscp_icon_box_shortcode' );

if ( ! function_exists( 'iscp_stat_shortcode' ) ) {
	/**
	 * Stat shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	function iscp_stat_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'number'      => '100%',
				'label'       => __( 'Responsive', 'iscp' ),
				'description' => __( 'Add proof, metrics or business outcomes.', 'iscp' ),
			),
			$atts,
			'iscp_stat'
		);

		return '<div class="iscp-shortcode-stat"><strong>' . esc_html( $atts['number'] ) . '</strong><span>' . esc_html( $atts['label'] ) . '</span><p>' . esc_html( $atts['description'] ) . '</p></div>';
	}
}
add_shortcode( 'iscp_stat', 'iscp_stat_shortcode' );

if ( ! function_exists( 'iscp_shortcode_query_grid' ) ) {
	/**
	 * Render a CPT shortcode grid.
	 *
	 * @param string $post_type Post type.
	 * @param string $taxonomy Taxonomy.
	 * @param array  $atts Attributes.
	 * @return string
	 */
	function iscp_shortcode_query_grid( $post_type, $taxonomy, $atts ) {
		$atts = shortcode_atts(
			array(
				'limit'    => 3,
				'columns'  => 3,
				'category' => '',
			),
			$atts
		);
		$args = array(
			'post_type'           => sanitize_key( $post_type ),
			'posts_per_page'      => min( 12, max( 1, absint( $atts['limit'] ) ) ),
			'ignore_sticky_posts' => true,
		);

		if ( $atts['category'] && $taxonomy ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => sanitize_key( $taxonomy ),
					'field'    => 'slug',
					'terms'    => sanitize_title( $atts['category'] ),
				),
			);
		}

		$query = new WP_Query( $args );
		ob_start();
		?>
		<div class="<?php echo esc_attr( iscp_shortcode_grid_class( $atts['columns'] ) ); ?>">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<article class="iscp-card iscp-shortcode-card">
					<div class="iscp-card-body">
						<?php $post_type_object = get_post_type_object( get_post_type() ); ?>
						<p class="iscp-card-kicker"><?php echo esc_html( $post_type_object ? $post_type_object->labels->singular_name : __( 'Item', 'iscp' ) ); ?></p>
						<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
						<a class="iscp-card-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Learn More', 'iscp' ); ?></a>
					</div>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}

add_shortcode( 'iscp_testimonials', function ( $atts ) { return iscp_shortcode_query_grid( 'iscp_testimonial', '', $atts ); } );
add_shortcode( 'iscp_solutions', function ( $atts ) { return iscp_shortcode_query_grid( 'iscp_solution', 'iscp_solution_category', $atts ); } );
add_shortcode( 'iscp_services', function ( $atts ) { return iscp_shortcode_query_grid( 'iscp_service', 'iscp_service_category', $atts ); } );
add_shortcode( 'iscp_case_studies', function ( $atts ) { return iscp_shortcode_query_grid( 'iscp_case_study', 'iscp_case_study_category', $atts ); } );
add_shortcode( 'iscp_pricing', function ( $atts ) { return iscp_shortcode_query_grid( 'iscp_pricing', '', $atts ); } );

if ( ! function_exists( 'iscp_faqs_shortcode' ) ) {
	/**
	 * FAQ shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	function iscp_faqs_shortcode( $atts ) {
		$atts = shortcode_atts( array( 'limit' => 6, 'category' => '' ), $atts, 'iscp_faqs' );
		$args = array(
			'post_type'           => 'iscp_faq',
			'posts_per_page'      => min( 12, max( 1, absint( $atts['limit'] ) ) ),
			'ignore_sticky_posts' => true,
		);

		if ( $atts['category'] ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'iscp_faq_category',
					'field'    => 'slug',
					'terms'    => sanitize_title( $atts['category'] ),
				),
			);
		}

		$query = new WP_Query( $args );
		$index = 0;
		ob_start();
		?>
		<div class="iscp-faq-list iscp-shortcode-faqs">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$index++;
				$panel_id = 'iscp-shortcode-faq-' . get_the_ID() . '-' . $index;
				?>
				<div class="iscp-faq-item">
					<button class="iscp-faq-button" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $panel_id ); ?>"><?php echo esc_html( get_the_title() ); ?></button>
					<div id="<?php echo esc_attr( $panel_id ); ?>" class="iscp-faq-panel" hidden>
						<?php echo wp_kses_post( wpautop( get_the_content() ) ); ?>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}
add_shortcode( 'iscp_faqs', 'iscp_faqs_shortcode' );
