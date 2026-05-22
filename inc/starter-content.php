<?php
/**
 * Starter content.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_register_starter_content' ) ) {
	/**
	 * Register generic starter content.
	 */
	function iscp_register_starter_content() {
		add_theme_support(
			'starter-content',
			array(
				'posts' => array(
					'home',
					'about',
					'contact',
					'blog',
				),
				'options' => array(
					'show_on_front'  => 'page',
					'page_on_front'  => '{{home}}',
					'page_for_posts' => '{{blog}}',
				),
				'nav_menus' => array(
					'primary' => array(
						'name'  => esc_html__( 'Primary Menu', 'iscp' ),
						'items' => array(
							'link_home',
							'page_about',
							'page_blog',
							'page_contact',
						),
					),
				),
			)
		);
	}
}
add_action( 'after_setup_theme', 'iscp_register_starter_content', 11 );

