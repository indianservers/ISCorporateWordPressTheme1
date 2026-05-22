<?php
/**
 * Commercial theme post types and meta boxes.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_get_post_type_configs' ) ) {
	/**
	 * Return CPT configuration.
	 *
	 * @return array
	 */
	function iscp_get_post_type_configs() {
		return array(
			'iscp_solution'    => array(
				'singular'  => __( 'Solution', 'iscp' ),
				'plural'    => __( 'Solutions', 'iscp' ),
				'slug'      => 'solutions',
				'menu_icon' => 'dashicons-lightbulb',
			),
			'iscp_service'     => array(
				'singular'  => __( 'Service', 'iscp' ),
				'plural'    => __( 'Services', 'iscp' ),
				'slug'      => 'services',
				'menu_icon' => 'dashicons-admin-tools',
			),
			'iscp_industry'    => array(
				'singular'  => __( 'Industry', 'iscp' ),
				'plural'    => __( 'Industries', 'iscp' ),
				'slug'      => 'industries',
				'menu_icon' => 'dashicons-building',
			),
			'iscp_case_study'  => array(
				'singular'  => __( 'Case Study', 'iscp' ),
				'plural'    => __( 'Case Studies', 'iscp' ),
				'slug'      => 'case-studies',
				'menu_icon' => 'dashicons-portfolio',
			),
			'iscp_testimonial' => array(
				'singular'  => __( 'Testimonial', 'iscp' ),
				'plural'    => __( 'Testimonials', 'iscp' ),
				'slug'      => 'testimonials',
				'menu_icon' => 'dashicons-format-quote',
			),
			'iscp_team'        => array(
				'singular'  => __( 'Team Member', 'iscp' ),
				'plural'    => __( 'Team Members', 'iscp' ),
				'slug'      => 'team',
				'menu_icon' => 'dashicons-groups',
			),
			'iscp_faq'         => array(
				'singular'  => __( 'FAQ', 'iscp' ),
				'plural'    => __( 'FAQs', 'iscp' ),
				'slug'      => 'faqs',
				'menu_icon' => 'dashicons-editor-help',
			),
			'iscp_pricing'     => array(
				'singular'  => __( 'Pricing Plan', 'iscp' ),
				'plural'    => __( 'Pricing Plans', 'iscp' ),
				'slug'      => 'pricing',
				'menu_icon' => 'dashicons-money-alt',
			),
		);
	}
}

if ( ! function_exists( 'iscp_register_post_types' ) ) {
	/**
	 * Register theme CPTs.
	 */
	function iscp_register_post_types() {
		foreach ( iscp_get_post_type_configs() as $post_type => $config ) {
			$labels = array(
				'name'               => $config['plural'],
				'singular_name'      => $config['singular'],
				'menu_name'          => $config['plural'],
				'add_new_item'       => sprintf(
					/* translators: %s: post type label. */
					__( 'Add New %s', 'iscp' ),
					$config['singular']
				),
				'edit_item'          => sprintf(
					/* translators: %s: post type label. */
					__( 'Edit %s', 'iscp' ),
					$config['singular']
				),
				'new_item'           => sprintf(
					/* translators: %s: post type label. */
					__( 'New %s', 'iscp' ),
					$config['singular']
				),
				'view_item'          => sprintf(
					/* translators: %s: post type label. */
					__( 'View %s', 'iscp' ),
					$config['singular']
				),
				'search_items'       => sprintf(
					/* translators: %s: post type label. */
					__( 'Search %s', 'iscp' ),
					$config['plural']
				),
				'not_found'          => __( 'No items found.', 'iscp' ),
				'not_found_in_trash' => __( 'No items found in Trash.', 'iscp' ),
			);

			register_post_type(
				$post_type,
				array(
					'labels'       => $labels,
					'public'       => true,
					'has_archive'  => true,
					'show_in_rest' => true,
					'menu_icon'    => $config['menu_icon'],
					'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
					'rewrite'      => array(
						'slug'       => $config['slug'],
						'with_front' => false,
					),
				)
			);
		}
	}
}
add_action( 'init', 'iscp_register_post_types' );

if ( ! function_exists( 'iscp_get_meta_box_fields' ) ) {
	/**
	 * Return meta field definitions.
	 *
	 * @return array
	 */
	function iscp_get_meta_box_fields() {
		return array(
			'iscp_case_study'  => array(
				'_iscp_case_client'      => array( 'label' => __( 'Client Name', 'iscp' ), 'type' => 'text' ),
				'_iscp_case_industry'    => array( 'label' => __( 'Industry', 'iscp' ), 'type' => 'text' ),
				'_iscp_case_result'      => array( 'label' => __( 'Result Summary', 'iscp' ), 'type' => 'textarea' ),
				'_iscp_case_project_url' => array( 'label' => __( 'Project URL', 'iscp' ), 'type' => 'url' ),
			),
			'iscp_testimonial' => array(
				'_iscp_testimonial_role'    => array( 'label' => __( 'Person Role', 'iscp' ), 'type' => 'text' ),
				'_iscp_testimonial_company' => array( 'label' => __( 'Company Name', 'iscp' ), 'type' => 'text' ),
				'_iscp_testimonial_rating'  => array( 'label' => __( 'Rating', 'iscp' ), 'type' => 'number' ),
			),
			'iscp_pricing'     => array(
				'_iscp_pricing_price'    => array( 'label' => __( 'Price', 'iscp' ), 'type' => 'text' ),
				'_iscp_pricing_period'   => array( 'label' => __( 'Billing Period', 'iscp' ), 'type' => 'text' ),
				'_iscp_pricing_featured' => array( 'label' => __( 'Featured Plan', 'iscp' ), 'type' => 'checkbox' ),
				'_iscp_pricing_cta_text' => array( 'label' => __( 'CTA Text', 'iscp' ), 'type' => 'text' ),
				'_iscp_pricing_cta_url'  => array( 'label' => __( 'CTA URL', 'iscp' ), 'type' => 'url' ),
			),
			'iscp_team'        => array(
				'_iscp_team_designation' => array( 'label' => __( 'Designation', 'iscp' ), 'type' => 'text' ),
				'_iscp_team_linkedin'    => array( 'label' => __( 'LinkedIn URL', 'iscp' ), 'type' => 'url' ),
			),
		);
	}
}

if ( ! function_exists( 'iscp_add_meta_boxes' ) ) {
	/**
	 * Add CPT meta boxes.
	 */
	function iscp_add_meta_boxes() {
		foreach ( iscp_get_meta_box_fields() as $post_type => $fields ) {
			add_meta_box(
				'iscp_details',
				__( 'ISCP Details', 'iscp' ),
				'iscp_render_meta_box',
				$post_type,
				'normal',
				'high',
				array( 'fields' => $fields )
			);
		}
	}
}
add_action( 'add_meta_boxes', 'iscp_add_meta_boxes' );

if ( ! function_exists( 'iscp_render_meta_box' ) ) {
	/**
	 * Render meta box fields.
	 *
	 * @param WP_Post $post Post object.
	 * @param array   $box Meta box args.
	 */
	function iscp_render_meta_box( $post, $box ) {
		wp_nonce_field( 'iscp_save_meta_box', 'iscp_meta_box_nonce' );

		$fields = isset( $box['args']['fields'] ) ? $box['args']['fields'] : array();

		foreach ( $fields as $key => $field ) {
			$value = get_post_meta( $post->ID, $key, true );
			?>
			<p class="iscp-meta-field iscp-meta-field-<?php echo esc_attr( $field['type'] ); ?>">
				<label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $field['label'] ); ?></strong></label><br>
				<?php if ( 'textarea' === $field['type'] ) : ?>
					<textarea id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" rows="4" class="widefat"><?php echo esc_textarea( $value ); ?></textarea>
				<?php elseif ( 'checkbox' === $field['type'] ) : ?>
					<label>
						<input id="<?php echo esc_attr( $key ); ?>" type="checkbox" name="<?php echo esc_attr( $key ); ?>" value="1" <?php checked( $value, '1' ); ?>>
						<?php esc_html_e( 'Enable', 'iscp' ); ?>
					</label>
				<?php else : ?>
					<input id="<?php echo esc_attr( $key ); ?>" type="<?php echo esc_attr( $field['type'] ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>" class="widefat">
				<?php endif; ?>
			</p>
			<?php
		}
	}
}

if ( ! function_exists( 'iscp_save_meta_boxes' ) ) {
	/**
	 * Save CPT meta box values.
	 *
	 * @param int $post_id Post ID.
	 */
	function iscp_save_meta_boxes( $post_id ) {
		if ( ! isset( $_POST['iscp_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['iscp_meta_box_nonce'] ) ), 'iscp_save_meta_box' ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$post_type = get_post_type( $post_id );
		$fields    = iscp_get_meta_box_fields();

		if ( ! isset( $fields[ $post_type ] ) ) {
			return;
		}

		foreach ( $fields[ $post_type ] as $key => $field ) {
			if ( 'checkbox' === $field['type'] ) {
				$value = isset( $_POST[ $key ] ) ? '1' : '0';
				update_post_meta( $post_id, $key, $value );
				continue;
			}

			if ( ! isset( $_POST[ $key ] ) ) {
				delete_post_meta( $post_id, $key );
				continue;
			}

			$raw_value = wp_unslash( $_POST[ $key ] );

			if ( 'url' === $field['type'] ) {
				$value = esc_url_raw( $raw_value );
			} elseif ( 'textarea' === $field['type'] ) {
				$value = sanitize_textarea_field( $raw_value );
			} elseif ( 'number' === $field['type'] ) {
				$value = sanitize_text_field( $raw_value );
			} else {
				$value = sanitize_text_field( $raw_value );
			}

			if ( '' === $value ) {
				delete_post_meta( $post_id, $key );
			} else {
				update_post_meta( $post_id, $key, $value );
			}
		}
	}
}
add_action( 'save_post', 'iscp_save_meta_boxes' );

if ( ! function_exists( 'iscp_admin_columns' ) ) {
	/**
	 * Add admin columns.
	 *
	 * @param array $columns Columns.
	 * @return array
	 */
	function iscp_admin_columns( $columns ) {
		$new_columns = array();

		foreach ( $columns as $key => $label ) {
			if ( 'title' === $key ) {
				$new_columns['iscp_thumbnail'] = __( 'Image', 'iscp' );
			}

			$new_columns[ $key ] = $label;
		}

		$new_columns['iscp_category'] = __( 'Category', 'iscp' );

		return $new_columns;
	}
}

if ( ! function_exists( 'iscp_admin_column_content' ) ) {
	/**
	 * Render admin column content.
	 *
	 * @param string $column Column key.
	 * @param int    $post_id Post ID.
	 */
	function iscp_admin_column_content( $column, $post_id ) {
		if ( 'iscp_thumbnail' === $column ) {
			if ( has_post_thumbnail( $post_id ) ) {
				echo wp_kses_post( get_the_post_thumbnail( $post_id, array( 56, 56 ) ) );
			} else {
				echo esc_html__( 'No image', 'iscp' );
			}
		}

		if ( 'iscp_category' === $column ) {
			$taxonomy = iscp_get_primary_taxonomy_for_post_type( get_post_type( $post_id ) );

			if ( $taxonomy ) {
				$terms = get_the_term_list( $post_id, $taxonomy, '', ', ' );
				echo $terms ? wp_kses_post( $terms ) : esc_html__( 'None', 'iscp' );
			} else {
				echo esc_html__( 'None', 'iscp' );
			}
		}
	}
}

if ( ! function_exists( 'iscp_get_primary_taxonomy_for_post_type' ) ) {
	/**
	 * Return primary taxonomy for a CPT.
	 *
	 * @param string $post_type Post type.
	 * @return string
	 */
	function iscp_get_primary_taxonomy_for_post_type( $post_type ) {
		$map = array(
			'iscp_solution'   => 'iscp_solution_category',
			'iscp_service'    => 'iscp_service_category',
			'iscp_industry'   => 'iscp_industry_category',
			'iscp_case_study' => 'iscp_case_study_category',
			'iscp_faq'        => 'iscp_faq_category',
		);

		return isset( $map[ $post_type ] ) ? $map[ $post_type ] : '';
	}
}

foreach ( array_keys( iscp_get_post_type_configs() ) as $iscp_column_post_type ) {
	add_filter( 'manage_' . $iscp_column_post_type . '_posts_columns', 'iscp_admin_columns' );
	add_action( 'manage_' . $iscp_column_post_type . '_posts_custom_column', 'iscp_admin_column_content', 10, 2 );
}
