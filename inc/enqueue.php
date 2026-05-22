<?php
/**
 * Asset enqueueing.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_asset_version' ) ) {
	/**
	 * Return a filemtime version when the file exists.
	 *
	 * @param string $relative_path Theme-relative file path.
	 * @return string
	 */
	function iscp_asset_version( $relative_path ) {
		$path = get_template_directory() . '/' . ltrim( $relative_path, '/' );

		if ( file_exists( $path ) ) {
			return (string) filemtime( $path );
		}

		return wp_get_theme()->get( 'Version' );
	}
}

if ( ! function_exists( 'iscp_enqueue_assets' ) ) {
	/**
	 * Enqueue frontend assets.
	 */
	function iscp_enqueue_assets() {
		wp_enqueue_style(
			'iscp-main',
			get_template_directory_uri() . '/assets/css/main.css',
			array(),
			iscp_asset_version( 'assets/css/main.css' )
		);

		wp_add_inline_style( 'iscp-main', iscp_get_customizer_inline_css() );

		wp_enqueue_script(
			'iscp-main',
			get_template_directory_uri() . '/assets/js/main.js',
			array(),
			iscp_asset_version( 'assets/js/main.js' ),
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'iscp_enqueue_assets' );

if ( ! function_exists( 'iscp_enqueue_block_editor_design_tokens' ) ) {
	/**
	 * Add the same Customizer variables to the block editor canvas.
	 */
	function iscp_enqueue_block_editor_design_tokens() {
		wp_add_inline_style( 'wp-block-library', iscp_get_customizer_inline_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'iscp_enqueue_block_editor_design_tokens' );

if ( ! function_exists( 'iscp_get_customizer_inline_css' ) ) {
	/**
	 * Build inline CSS variables from Customizer values.
	 *
	 * @return string
	 */
	function iscp_get_customizer_inline_css() {
		$font_stacks = array(
			'system'       => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'modern-sans'  => 'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif',
			'classic-sans' => 'Arial, Helvetica, sans-serif',
			'serif'        => 'Georgia, "Times New Roman", Times, serif',
		);

		$heading_stack = iscp_get_theme_mod( 'iscp_heading_font_stack', 'system' );
		$body_stack    = iscp_get_theme_mod( 'iscp_body_font_stack', 'system' );
		$heading_scale = iscp_get_theme_mod( 'iscp_heading_scale', 'default' );
		$tokens        = function_exists( 'iscp_get_active_design_tokens' ) ? iscp_get_active_design_tokens() : array();

		$scale_values = array(
			'compact' => array( 'h1' => '3.75rem', 'h2' => '2.35rem' ),
			'default' => array( 'h1' => '4.6rem', 'h2' => '3rem' ),
			'large'   => array( 'h1' => '5.35rem', 'h2' => '3.5rem' ),
		);

		$scale = isset( $scale_values[ $heading_scale ] ) ? $scale_values[ $heading_scale ] : $scale_values['default'];

		$variables = array(
			'--iscp-primary'         => isset( $tokens['primary'] ) ? $tokens['primary'] : '#2563eb',
			'--iscp-primary-dark'    => isset( $tokens['primary_dark'] ) ? $tokens['primary_dark'] : '#07111f',
			'--iscp-primary-light'   => isset( $tokens['primary_light'] ) ? $tokens['primary_light'] : '#eff6ff',
			'--iscp-accent'          => isset( $tokens['accent'] ) ? $tokens['accent'] : '#12d6ff',
			'--iscp-secondary'       => isset( $tokens['accent'] ) ? $tokens['accent'] : '#12d6ff',
			'--iscp-accent-soft'     => isset( $tokens['accent_soft'] ) ? $tokens['accent_soft'] : '#ecfeff',
			'--iscp-bg'              => isset( $tokens['bg'] ) ? $tokens['bg'] : '#07111f',
			'--iscp-bg-alt'          => isset( $tokens['bg_alt'] ) ? $tokens['bg_alt'] : '#f8fafc',
			'--iscp-surface'         => isset( $tokens['surface'] ) ? $tokens['surface'] : '#ffffff',
			'--iscp-surface-alt'     => isset( $tokens['surface_2'] ) ? $tokens['surface_2'] : '#f8fafc',
			'--iscp-surface-2'       => isset( $tokens['surface_2'] ) ? $tokens['surface_2'] : '#f8fafc',
			'--iscp-text'            => isset( $tokens['text'] ) ? $tokens['text'] : '#0f172a',
			'--iscp-heading'         => isset( $tokens['heading'] ) ? $tokens['heading'] : '#0f172a',
			'--iscp-muted'           => isset( $tokens['muted'] ) ? $tokens['muted'] : '#64748b',
			'--iscp-border'          => isset( $tokens['border'] ) ? $tokens['border'] : '#e2e8f0',
			'--iscp-border-strong'   => isset( $tokens['border_strong'] ) ? $tokens['border_strong'] : '#cbd5e1',
			'--iscp-shadow-sm'       => isset( $tokens['shadow_sm'] ) ? $tokens['shadow_sm'] : '0 10px 24px rgba(15, 23, 42, 0.08)',
			'--iscp-shadow-md'       => isset( $tokens['shadow_md'] ) ? $tokens['shadow_md'] : '0 18px 44px rgba(15, 23, 42, 0.12)',
			'--iscp-shadow-lg'       => isset( $tokens['shadow_lg'] ) ? $tokens['shadow_lg'] : '0 26px 68px rgba(15, 23, 42, 0.16)',
			'--iscp-shadow'          => isset( $tokens['shadow_md'] ) ? $tokens['shadow_md'] : '0 18px 44px rgba(15, 23, 42, 0.12)',
			'--iscp-radius-sm'       => '6px',
			'--iscp-radius-md'       => '10px',
			'--iscp-radius-lg'       => isset( $tokens['card_radius'] ) ? $tokens['card_radius'] : '18px',
			'--iscp-radius-xl'       => '28px',
			'--iscp-radius'          => isset( $tokens['button_radius'] ) ? $tokens['button_radius'] : '10px',
			'--iscp-button-radius'   => isset( $tokens['button_radius'] ) ? $tokens['button_radius'] : '10px',
			'--iscp-card-radius'     => isset( $tokens['card_radius'] ) ? $tokens['card_radius'] : '18px',
			'--iscp-section-spacing' => 'clamp(4rem, 8vw, 7rem)',
			'--iscp-container'       => '1180px',
			'--iscp-gradient-primary' => isset( $tokens['gradient_primary'] ) ? $tokens['gradient_primary'] : 'linear-gradient(135deg, #2563eb, #12d6ff)',
			'--iscp-gradient-dark'   => isset( $tokens['gradient_dark'] ) ? $tokens['gradient_dark'] : 'linear-gradient(135deg, #07111f, #2563eb)',
			'--iscp-focus-ring'      => isset( $tokens['focus_ring'] ) ? $tokens['focus_ring'] : '0 0 0 3px rgba(18, 214, 255, 0.42)',
			'--iscp-font-body'       => isset( $font_stacks[ $body_stack ] ) ? $font_stacks[ $body_stack ] : $font_stacks['system'],
			'--iscp-font-heading'    => isset( $font_stacks[ $heading_stack ] ) ? $font_stacks[ $heading_stack ] : $font_stacks['system'],
			'--iscp-base-font'       => iscp_get_theme_mod( 'iscp_base_font_size', '16px' ),
			'--iscp-h1-max'          => $scale['h1'],
			'--iscp-h2-max'          => $scale['h2'],
		);

		$css = ':root{';

		foreach ( $variables as $name => $value ) {
			$value = str_replace( array( '<', '>', '{', '}' ), '', (string) $value );
			$css  .= $name . ':' . $value . ';';
		}

		$css .= '}';

		if ( ! iscp_get_theme_mod( 'iscp_animations_enabled', true ) ) {
			$css .= '.iscp-reveal{opacity:1;transform:none;transition:none}.iscp-visual-line,.iscp-dashboard-node{animation:none}';
		}

		if ( ! iscp_get_theme_mod( 'iscp_respect_reduced_motion', true ) ) {
			$css .= '@media (prefers-reduced-motion: reduce){.iscp-reveal{opacity:0;transform:translateY(16px)}}';
		}

		return $css;
	}
}

if ( ! function_exists( 'iscp_enqueue_admin_assets' ) ) {
	/**
	 * Enqueue admin assets.
	 */
	function iscp_enqueue_admin_assets( $hook_suffix ) {
		if ( 'appearance_page_iscp-theme' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style(
			'iscp-admin',
			get_template_directory_uri() . '/assets/css/admin.css',
			array(),
			iscp_asset_version( 'assets/css/admin.css' )
		);

		wp_enqueue_script(
			'iscp-admin',
			get_template_directory_uri() . '/assets/js/admin.js',
			array(),
			iscp_asset_version( 'assets/js/admin.js' ),
			true
		);
	}
}
add_action( 'admin_enqueue_scripts', 'iscp_enqueue_admin_assets' );
