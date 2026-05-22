<?php
/**
 * Custom taxonomy registrations.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_get_taxonomy_configs' ) ) {
	/**
	 * Return taxonomy configuration.
	 *
	 * @return array
	 */
	function iscp_get_taxonomy_configs() {
		return array(
			'iscp_solution_category'   => array(
				'post_type' => 'iscp_solution',
				'singular'  => __( 'Solution Category', 'iscp' ),
				'plural'    => __( 'Solution Categories', 'iscp' ),
				'slug'      => 'solution-category',
			),
			'iscp_service_category'    => array(
				'post_type' => 'iscp_service',
				'singular'  => __( 'Service Category', 'iscp' ),
				'plural'    => __( 'Service Categories', 'iscp' ),
				'slug'      => 'service-category',
			),
			'iscp_industry_category'   => array(
				'post_type' => 'iscp_industry',
				'singular'  => __( 'Industry Category', 'iscp' ),
				'plural'    => __( 'Industry Categories', 'iscp' ),
				'slug'      => 'industry-category',
			),
			'iscp_case_study_category' => array(
				'post_type' => 'iscp_case_study',
				'singular'  => __( 'Case Study Category', 'iscp' ),
				'plural'    => __( 'Case Study Categories', 'iscp' ),
				'slug'      => 'case-study-category',
			),
			'iscp_faq_category'        => array(
				'post_type' => 'iscp_faq',
				'singular'  => __( 'FAQ Category', 'iscp' ),
				'plural'    => __( 'FAQ Categories', 'iscp' ),
				'slug'      => 'faq-category',
			),
		);
	}
}

if ( ! function_exists( 'iscp_register_taxonomies' ) ) {
	/**
	 * Register theme taxonomies.
	 */
	function iscp_register_taxonomies() {
		foreach ( iscp_get_taxonomy_configs() as $taxonomy => $config ) {
			$labels = array(
				'name'          => $config['plural'],
				'singular_name' => $config['singular'],
				'search_items'  => sprintf(
					/* translators: %s: taxonomy plural label. */
					__( 'Search %s', 'iscp' ),
					$config['plural']
				),
				'all_items'     => sprintf(
					/* translators: %s: taxonomy plural label. */
					__( 'All %s', 'iscp' ),
					$config['plural']
				),
				'edit_item'     => sprintf(
					/* translators: %s: taxonomy singular label. */
					__( 'Edit %s', 'iscp' ),
					$config['singular']
				),
				'add_new_item'  => sprintf(
					/* translators: %s: taxonomy singular label. */
					__( 'Add New %s', 'iscp' ),
					$config['singular']
				),
				'menu_name'     => $config['plural'],
			);

			register_taxonomy(
				$taxonomy,
				array( $config['post_type'] ),
				array(
					'labels'            => $labels,
					'hierarchical'      => true,
					'public'            => true,
					'show_admin_column' => true,
					'show_in_rest'      => true,
					'rewrite'           => array(
						'slug'       => $config['slug'],
						'with_front' => false,
					),
				)
			);
		}
	}
}
add_action( 'init', 'iscp_register_taxonomies' );
