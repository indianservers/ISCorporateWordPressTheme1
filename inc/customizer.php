<?php
/**
 * Customizer settings.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_get_customizer_defaults' ) ) {
	/**
	 * Return Customizer defaults.
	 *
	 * @return array
	 */
	function iscp_get_customizer_defaults() {
		return array(
			'iscp_footer_logo'                  => '',
			'iscp_site_tagline_override'        => '',
			'iscp_preloader_enabled'            => false,
			'iscp_back_to_top_enabled'          => true,
			'iscp_frontend_credit_enabled'      => true,
			'iscp_footer_credit_text'           => __( 'Indian Servers Pvt. Ltd.', 'iscp' ),
			'iscp_footer_credit_url'            => 'https://indianservers.com/',
			'iscp_header_layout'                => 'default',
			'iscp_sticky_header_enabled'        => true,
			'iscp_header_cta_1_text'            => __( 'Start a Project', 'iscp' ),
			'iscp_header_cta_1_url'             => '/contact/',
			'iscp_header_cta_2_text'            => __( 'Contact Us', 'iscp' ),
			'iscp_header_cta_2_url'             => '/contact/',
			'iscp_show_utility_menu'            => true,
			'iscp_show_search_icon'             => false,
			'iscp_hero_layout'                  => 'dashboard',
			'iscp_hero_eyebrow'                 => __( 'Indian Servers Pvt. Ltd.', 'iscp' ),
			'iscp_hero_headline'                => __( 'Indian Servers Software, Cloud & AI Solutions', 'iscp' ),
			'iscp_hero_subtitle'                => __( 'Custom software development company for HRMS, school management, CRM, inventory, restaurant software, AI, AR, VAPT, hosting and cloud platforms across India and global branches.', 'iscp' ),
			'iscp_hero_primary_cta_text'        => __( 'Explore Services', 'iscp' ),
			'iscp_hero_primary_cta_url'         => '#solutions',
			'iscp_hero_secondary_cta_text'      => __( 'Talk to Our Team', 'iscp' ),
			'iscp_hero_secondary_cta_url'       => '#contact',
			'iscp_hero_badge_1'                 => __( 'SaaS Products', 'iscp' ),
			'iscp_hero_badge_2'                 => __( 'AI, AR & VAPT', 'iscp' ),
			'iscp_hero_badge_3'                 => __( 'India + Global Branches', 'iscp' ),
			'iscp_hero_badge_4'                 => __( '.NET, PHP, Python', 'iscp' ),
			'iscp_hero_visual_enabled'          => true,
			'iscp_primary_color'                => '#2563eb',
			'iscp_accent_color'                 => '#12d6ff',
			'iscp_background_color'             => '#ffffff',
			'iscp_surface_color'                => '#f8fafc',
			'iscp_text_color'                   => '#0f172a',
			'iscp_muted_text_color'             => '#64748b',
			'iscp_dark_section_background'      => '#07111f',
			'iscp_border_color'                 => '#e2e8f0',
			'iscp_heading_font_stack'           => 'system',
			'iscp_body_font_stack'              => 'system',
			'iscp_base_font_size'               => '16px',
			'iscp_heading_scale'                => 'default',
			'iscp_section_hero_enabled'         => true,
			'iscp_section_trust_strip_enabled'  => true,
			'iscp_section_solutions_enabled'    => true,
			'iscp_section_services_enabled'     => true,
			'iscp_section_features_enabled'     => true,
			'iscp_section_industries_enabled'   => true,
			'iscp_section_stats_enabled'        => true,
			'iscp_section_process_enabled'      => true,
			'iscp_section_case_studies_enabled' => false,
			'iscp_section_testimonials_enabled' => false,
			'iscp_section_pricing_enabled'      => false,
			'iscp_section_faq_enabled'          => false,
			'iscp_section_blog_enabled'         => false,
			'iscp_section_cta_enabled'          => true,
			'iscp_phone_display'                => 'Sai Satish: +91 9618222220',
			'iscp_phone_tel'                    => '+919618222220',
			'iscp_email'                        => 'info@indianservers.com',
			'iscp_address'                      => __( 'Indian Servers Pvt. Ltd., India', 'iscp' ),
			'iscp_whatsapp_number'              => '919618222220',
			'iscp_google_maps_url'              => '',
			'iscp_social_linkedin'              => 'https://www.linkedin.com/in/indianservers/',
			'iscp_social_facebook'              => 'https://www.facebook.com/IndianServersPage',
			'iscp_social_instagram'             => 'https://www.instagram.com/indianserversltd',
			'iscp_social_youtube'               => '',
			'iscp_social_twitter'               => '',
			'iscp_social_github'                => '',
			'iscp_social_dribbble'              => '',
			'iscp_social_behance'               => '',
			'iscp_footer_layout'                => 'columns',
			'iscp_footer_description'           => __( 'Indian Servers Pvt. Ltd. designs, develops and maintains professional software products, business applications, cloud systems and AI-enabled digital platforms.', 'iscp' ),
			'iscp_newsletter_enabled'           => true,
			'iscp_copyright_text'               => __( '&copy; {year} Indian Servers Pvt. Ltd. All rights reserved.', 'iscp' ),
			'iscp_animations_enabled'           => true,
			'iscp_respect_reduced_motion'       => true,
			'iscp_schema_enabled'               => true,
			'iscp_open_graph_enabled'           => true,
			'iscp_sticky_cta_enabled'           => false,
			'iscp_sticky_cta_text'              => __( 'Planning a software project with Indian Servers?', 'iscp' ),
			'iscp_sticky_cta_button_text'       => __( 'Contact Us', 'iscp' ),
			'iscp_sticky_cta_button_url'        => '/contact/',
			'iscp_sticky_cta_display'           => 'all',
			'iscp_exit_modal_enabled'           => false,
			'iscp_exit_modal_title'             => __( 'Before you go', 'iscp' ),
			'iscp_exit_modal_description'       => __( 'Talk to our team about software development, cloud systems, AI automation or long-term product support.', 'iscp' ),
			'iscp_exit_modal_button_text'       => __( 'Contact Indian Servers', 'iscp' ),
			'iscp_exit_modal_button_url'        => '/contact/',
			'iscp_exit_modal_close_text'        => __( 'Close', 'iscp' ),
			'iscp_scroll_progress_enabled'      => false,
			'iscp_reading_time_enabled'         => true,
			'iscp_share_buttons_enabled'        => true,
			'iscp_share_linkedin_enabled'       => true,
			'iscp_share_twitter_enabled'        => true,
			'iscp_share_facebook_enabled'       => true,
			'iscp_share_whatsapp_enabled'       => true,
			'iscp_design_preset'                => 'corporate-blue',
			'iscp_layout_preset'                => 'classic-corporate',
			'iscp_button_shape'                 => 'rounded',
			'iscp_button_size'                  => 'normal',
			'iscp_card_style'                   => 'shadow',
			'iscp_card_hover'                   => 'lift',
			'iscp_icon_style'                   => 'badge',
			'iscp_section_style'                => 'clean',
			'iscp_form_style'                   => 'clean',
			'iscp_component_header_style'       => 'solid',
			'iscp_component_footer_style'       => 'corporate',
		);
	}
}

if ( ! function_exists( 'iscp_get_design_presets' ) ) {
	/**
	 * Return global design presets.
	 *
	 * @return array
	 */
	function iscp_get_design_presets() {
		return array(
			'corporate-blue'          => array(
				'label'       => __( 'Corporate Blue', 'iscp' ),
				'primary'     => '#2563eb',
				'accent'      => '#12d6ff',
				'dark'        => '#07111f',
				'surface'     => '#f8fafc',
				'heading'     => '#0f172a',
				'muted'       => '#64748b',
				'border'      => '#e2e8f0',
				'button'      => '10px',
				'card'        => '18px',
				'shadow'      => 'medium',
				'hero'        => 'blue-grid',
			),
			'saas-dark'               => array(
				'label'       => __( 'SaaS Dark', 'iscp' ),
				'primary'     => '#38bdf8',
				'accent'      => '#a78bfa',
				'dark'        => '#020617',
				'surface'     => '#0f172a',
				'heading'     => '#f8fafc',
				'muted'       => '#94a3b8',
				'border'      => '#1e293b',
				'button'      => '999px',
				'card'        => '22px',
				'shadow'      => 'strong',
				'hero'        => 'dark-orbit',
			),
			'agency-purple'           => array(
				'label'       => __( 'Agency Purple', 'iscp' ),
				'primary'     => '#7c3aed',
				'accent'      => '#f472b6',
				'dark'        => '#160923',
				'surface'     => '#faf5ff',
				'heading'     => '#21102f',
				'muted'       => '#6b5b7d',
				'border'      => '#eadcff',
				'button'      => '16px',
				'card'        => '24px',
				'shadow'      => 'medium',
				'hero'        => 'purple-wave',
			),
			'ai-neon'                 => array(
				'label'       => __( 'AI Neon', 'iscp' ),
				'primary'     => '#06b6d4',
				'accent'      => '#22c55e',
				'dark'        => '#031014',
				'surface'     => '#ecfeff',
				'heading'     => '#06262d',
				'muted'       => '#46656b',
				'border'      => '#b8eef4',
				'button'      => '14px',
				'card'        => '20px',
				'shadow'      => 'glow',
				'hero'        => 'neon-mesh',
			),
			'consulting-clean'        => array(
				'label'       => __( 'Consulting Clean', 'iscp' ),
				'primary'     => '#1d4ed8',
				'accent'      => '#0f766e',
				'dark'        => '#111827',
				'surface'     => '#f9fafb',
				'heading'     => '#111827',
				'muted'       => '#6b7280',
				'border'      => '#e5e7eb',
				'button'      => '8px',
				'card'        => '14px',
				'shadow'      => 'soft',
				'hero'        => 'clean-angle',
			),
			'finance-trust'           => array(
				'label'       => __( 'Finance Trust', 'iscp' ),
				'primary'     => '#0f766e',
				'accent'      => '#c99700',
				'dark'        => '#061816',
				'surface'     => '#f7fbfa',
				'heading'     => '#10201f',
				'muted'       => '#5d6b69',
				'border'      => '#d9e7e4',
				'button'      => '6px',
				'card'        => '12px',
				'shadow'      => 'soft',
				'hero'        => 'trust-lines',
			),
			'education-fresh'         => array(
				'label'       => __( 'Education Fresh', 'iscp' ),
				'primary'     => '#0ea5e9',
				'accent'      => '#84cc16',
				'dark'        => '#082f49',
				'surface'     => '#f0f9ff',
				'heading'     => '#0c2438',
				'muted'       => '#536878',
				'border'      => '#cfefff',
				'button'      => '18px',
				'card'        => '20px',
				'shadow'      => 'medium',
				'hero'        => 'fresh-arc',
			),
			'cyber-security-dark'     => array(
				'label'       => __( 'Cyber Security Dark', 'iscp' ),
				'primary'     => '#22c55e',
				'accent'      => '#38bdf8',
				'dark'        => '#020617',
				'surface'     => '#0b1220',
				'heading'     => '#f8fafc',
				'muted'       => '#9ca3af',
				'border'      => '#1f2937',
				'button'      => '4px',
				'card'        => '10px',
				'shadow'      => 'glow',
				'hero'        => 'security-grid',
			),
			'startup-gradient'        => array(
				'label'       => __( 'Startup Gradient', 'iscp' ),
				'primary'     => '#f97316',
				'accent'      => '#8b5cf6',
				'dark'        => '#1f1028',
				'surface'     => '#fff7ed',
				'heading'     => '#271826',
				'muted'       => '#755f67',
				'border'      => '#fed7aa',
				'button'      => '999px',
				'card'        => '26px',
				'shadow'      => 'strong',
				'hero'        => 'startup-gradient',
			),
			'minimal-black-white'     => array(
				'label'       => __( 'Minimal Black & White', 'iscp' ),
				'primary'     => '#111111',
				'accent'      => '#666666',
				'dark'        => '#000000',
				'surface'     => '#f5f5f5',
				'heading'     => '#111111',
				'muted'       => '#6f6f6f',
				'border'      => '#dedede',
				'button'      => '0px',
				'card'        => '0px',
				'shadow'      => 'none',
				'hero'        => 'minimal',
			),
		);
	}
}

if ( ! function_exists( 'iscp_get_shadow_tokens' ) ) {
	/**
	 * Return shadow token values.
	 *
	 * @param string $intensity Shadow intensity.
	 * @return array
	 */
	function iscp_get_shadow_tokens( $intensity ) {
		$tokens = array(
			'none'   => array( 'sm' => 'none', 'md' => 'none', 'lg' => 'none' ),
			'soft'   => array( 'sm' => '0 8px 22px rgba(15, 23, 42, 0.06)', 'md' => '0 14px 34px rgba(15, 23, 42, 0.08)', 'lg' => '0 22px 52px rgba(15, 23, 42, 0.10)' ),
			'medium' => array( 'sm' => '0 10px 24px rgba(15, 23, 42, 0.08)', 'md' => '0 18px 44px rgba(15, 23, 42, 0.12)', 'lg' => '0 26px 68px rgba(15, 23, 42, 0.16)' ),
			'strong' => array( 'sm' => '0 12px 28px rgba(15, 23, 42, 0.12)', 'md' => '0 22px 56px rgba(15, 23, 42, 0.18)', 'lg' => '0 34px 84px rgba(15, 23, 42, 0.24)' ),
			'glow'   => array( 'sm' => '0 0 24px rgba(18, 214, 255, 0.16)', 'md' => '0 0 44px rgba(18, 214, 255, 0.20)', 'lg' => '0 0 72px rgba(18, 214, 255, 0.26)' ),
		);

		return isset( $tokens[ $intensity ] ) ? $tokens[ $intensity ] : $tokens['medium'];
	}
}

if ( ! function_exists( 'iscp_get_active_design_tokens' ) ) {
	/**
	 * Return design tokens resolved from preset plus manual overrides.
	 *
	 * @return array
	 */
	function iscp_get_active_design_tokens() {
		$defaults = iscp_get_customizer_defaults();
		$presets  = iscp_get_design_presets();
		$key      = sanitize_key( get_theme_mod( 'iscp_design_preset', $defaults['iscp_design_preset'] ) );
		$preset   = isset( $presets[ $key ] ) ? $presets[ $key ] : $presets['corporate-blue'];

		$primary = get_theme_mod( 'iscp_primary_color', $defaults['iscp_primary_color'] );
		$accent  = get_theme_mod( 'iscp_accent_color', $defaults['iscp_accent_color'] );
		$background = get_theme_mod( 'iscp_background_color', $defaults['iscp_background_color'] );
		$surface = get_theme_mod( 'iscp_surface_color', $defaults['iscp_surface_color'] );
		$text    = get_theme_mod( 'iscp_text_color', $defaults['iscp_text_color'] );
		$muted   = get_theme_mod( 'iscp_muted_text_color', $defaults['iscp_muted_text_color'] );
		$dark    = get_theme_mod( 'iscp_dark_section_background', $defaults['iscp_dark_section_background'] );
		$border  = get_theme_mod( 'iscp_border_color', $defaults['iscp_border_color'] );

		$primary = $primary !== $defaults['iscp_primary_color'] ? $primary : $preset['primary'];
		$accent  = $accent !== $defaults['iscp_accent_color'] ? $accent : $preset['accent'];
		$background = $background !== $defaults['iscp_background_color'] ? $background : '#ffffff';
		$surface = $surface !== $defaults['iscp_surface_color'] ? $surface : $preset['surface'];
		$text    = $text !== $defaults['iscp_text_color'] ? $text : $preset['heading'];
		$muted   = $muted !== $defaults['iscp_muted_text_color'] ? $muted : $preset['muted'];
		$dark    = $dark !== $defaults['iscp_dark_section_background'] ? $dark : $preset['dark'];
		$border  = $border !== $defaults['iscp_border_color'] ? $border : $preset['border'];
		$shadows = iscp_get_shadow_tokens( $preset['shadow'] );

		return array(
			'preset_key'       => $key,
			'preset_label'     => $preset['label'],
			'primary'          => sanitize_hex_color( $primary ) ? $primary : $preset['primary'],
			'primary_dark'     => $dark,
			'primary_light'    => $surface,
			'accent'           => sanitize_hex_color( $accent ) ? $accent : $preset['accent'],
			'accent_soft'      => $surface,
			'bg'               => sanitize_hex_color( $dark ) ? $dark : $preset['dark'],
			'bg_alt'           => sanitize_hex_color( $surface ) ? $surface : $preset['surface'],
			'surface'          => sanitize_hex_color( $background ) ? $background : '#ffffff',
			'surface_2'        => sanitize_hex_color( $surface ) ? $surface : $preset['surface'],
			'text'             => sanitize_hex_color( $text ) ? $text : $preset['heading'],
			'heading'          => sanitize_hex_color( $text ) ? $text : $preset['heading'],
			'muted'            => sanitize_hex_color( $muted ) ? $muted : $preset['muted'],
			'border'           => sanitize_hex_color( $border ) ? $border : $preset['border'],
			'border_strong'    => sanitize_hex_color( $border ) ? $border : $preset['border'],
			'shadow_sm'        => $shadows['sm'],
			'shadow_md'        => $shadows['md'],
			'shadow_lg'        => $shadows['lg'],
			'button_radius'    => $preset['button'],
			'card_radius'      => $preset['card'],
			'hero_background'  => $preset['hero'],
			'gradient_primary' => 'linear-gradient(135deg, ' . $primary . ', ' . $accent . ')',
			'gradient_dark'    => 'linear-gradient(135deg, ' . $dark . ', ' . $primary . ')',
			'focus_ring'       => '0 0 0 3px rgba(18, 214, 255, 0.42)',
		);
	}
}

if ( ! function_exists( 'iscp_sanitize_checkbox' ) ) {
	/**
	 * Sanitize checkbox values.
	 *
	 * @param mixed $checked Checkbox value.
	 * @return bool
	 */
	function iscp_sanitize_checkbox( $checked ) {
		return (bool) $checked;
	}
}

if ( ! function_exists( 'iscp_sanitize_hex_color' ) ) {
	/**
	 * Sanitize hex color values.
	 *
	 * @param string $color Color value.
	 * @return string
	 */
	function iscp_sanitize_hex_color( $color ) {
		return sanitize_hex_color( $color );
	}
}

if ( ! function_exists( 'iscp_sanitize_select' ) ) {
	/**
	 * Sanitize select values against known Customizer choices.
	 *
	 * @param string               $input Select value.
	 * @param WP_Customize_Setting $setting Customizer setting.
	 * @return string
	 */
	function iscp_sanitize_select( $input, $setting = null ) {
		$choices = iscp_get_customizer_select_choices();
		$input   = sanitize_key( $input );

		if ( $setting && isset( $choices[ $setting->id ] ) && array_key_exists( $input, $choices[ $setting->id ] ) ) {
			return $input;
		}

		if ( $setting && isset( $setting->default ) ) {
			return $setting->default;
		}

		return 'default';
	}
}

if ( ! function_exists( 'iscp_get_customizer_select_choices' ) ) {
	/**
	 * Return select choices.
	 *
	 * @return array
	 */
	function iscp_get_customizer_select_choices() {
		$design_presets = array();

		foreach ( iscp_get_design_presets() as $preset_key => $preset ) {
			$design_presets[ $preset_key ] = $preset['label'];
		}

		return array(
			'iscp_design_preset'      => $design_presets,
			'iscp_layout_preset'      => array(
				'classic-corporate'      => __( 'Classic Corporate', 'iscp' ),
				'saas-landing'           => __( 'SaaS Landing', 'iscp' ),
				'agency-portfolio'       => __( 'Agency Portfolio', 'iscp' ),
				'consulting-authority'   => __( 'Consulting Authority', 'iscp' ),
				'product-showcase'       => __( 'Product Showcase', 'iscp' ),
				'training-institute'     => __( 'Training Institute', 'iscp' ),
				'software-company'       => __( 'Software Company', 'iscp' ),
				'minimal-service-business' => __( 'Minimal Service Business', 'iscp' ),
			),
			'iscp_button_shape'       => array(
				'sharp'   => __( 'Sharp', 'iscp' ),
				'rounded' => __( 'Rounded', 'iscp' ),
				'pill'    => __( 'Pill', 'iscp' ),
			),
			'iscp_button_size'        => array(
				'compact' => __( 'Compact', 'iscp' ),
				'normal'  => __( 'Normal', 'iscp' ),
				'large'   => __( 'Large', 'iscp' ),
			),
			'iscp_card_style'         => array(
				'flat'     => __( 'Flat', 'iscp' ),
				'bordered' => __( 'Bordered', 'iscp' ),
				'shadow'   => __( 'Shadow', 'iscp' ),
				'glass'    => __( 'Glass', 'iscp' ),
			),
			'iscp_card_hover'         => array(
				'none'   => __( 'None', 'iscp' ),
				'lift'   => __( 'Lift', 'iscp' ),
				'glow'   => __( 'Glow', 'iscp' ),
				'border' => __( 'Border', 'iscp' ),
			),
			'iscp_icon_style'         => array(
				'line'     => __( 'Line', 'iscp' ),
				'filled'   => __( 'Filled', 'iscp' ),
				'gradient' => __( 'Gradient', 'iscp' ),
				'badge'    => __( 'Badge', 'iscp' ),
			),
			'iscp_section_style'      => array(
				'clean'          => __( 'Clean', 'iscp' ),
				'boxed'          => __( 'Boxed', 'iscp' ),
				'layered'        => __( 'Layered', 'iscp' ),
				'dark-alternate' => __( 'Dark Alternate', 'iscp' ),
			),
			'iscp_form_style'         => array(
				'clean'          => __( 'Clean', 'iscp' ),
				'boxed'          => __( 'Boxed', 'iscp' ),
				'floating-label' => __( 'Floating Label', 'iscp' ),
			),
			'iscp_component_header_style' => array(
				'glass'    => __( 'Glass', 'iscp' ),
				'solid'    => __( 'Solid', 'iscp' ),
				'minimal'  => __( 'Minimal', 'iscp' ),
				'bordered' => __( 'Bordered', 'iscp' ),
			),
			'iscp_component_footer_style' => array(
				'simple'    => __( 'Simple', 'iscp' ),
				'corporate' => __( 'Corporate', 'iscp' ),
				'extended'  => __( 'Extended', 'iscp' ),
				'dark'      => __( 'Dark', 'iscp' ),
			),
			'iscp_sticky_cta_display' => array(
				'all'     => __( 'All devices', 'iscp' ),
				'mobile'  => __( 'Mobile only', 'iscp' ),
				'desktop' => __( 'Desktop only', 'iscp' ),
			),
			'iscp_header_layout'      => array(
				'default'  => __( 'Default', 'iscp' ),
				'centered' => __( 'Centered', 'iscp' ),
				'split'    => __( 'Split', 'iscp' ),
			),
			'iscp_hero_layout'        => array(
				'dashboard'     => __( 'Dashboard', 'iscp' ),
				'split-content' => __( 'Split Content', 'iscp' ),
				'centered'      => __( 'Centered', 'iscp' ),
				'minimal'       => __( 'Minimal', 'iscp' ),
			),
			'iscp_heading_font_stack' => array(
				'system'       => __( 'System', 'iscp' ),
				'modern-sans'  => __( 'Modern Sans', 'iscp' ),
				'classic-sans' => __( 'Classic Sans', 'iscp' ),
				'serif'        => __( 'Serif', 'iscp' ),
			),
			'iscp_body_font_stack'    => array(
				'system'       => __( 'System', 'iscp' ),
				'modern-sans'  => __( 'Modern Sans', 'iscp' ),
				'classic-sans' => __( 'Classic Sans', 'iscp' ),
				'serif'        => __( 'Serif', 'iscp' ),
			),
			'iscp_base_font_size'     => array(
				'15px' => __( '15px', 'iscp' ),
				'16px' => __( '16px', 'iscp' ),
				'17px' => __( '17px', 'iscp' ),
				'18px' => __( '18px', 'iscp' ),
			),
			'iscp_heading_scale'      => array(
				'compact' => __( 'Compact', 'iscp' ),
				'default' => __( 'Default', 'iscp' ),
				'large'   => __( 'Large', 'iscp' ),
			),
			'iscp_footer_layout'      => array(
				'simple'   => __( 'Simple', 'iscp' ),
				'columns'  => __( 'Columns', 'iscp' ),
				'extended' => __( 'Extended', 'iscp' ),
			),
		);
	}
}

if ( ! function_exists( 'iscp_customize_register' ) ) {
	/**
	 * Register Customizer options.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 */
	function iscp_customize_register( $wp_customize ) {
		$defaults = iscp_get_customizer_defaults();
		$choices  = iscp_get_customizer_select_choices();

		if ( $wp_customize->get_setting( 'blogname' ) ) {
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		}

		if ( $wp_customize->get_setting( 'blogdescription' ) ) {
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}

		$wp_customize->add_panel(
			'iscp_theme_options',
			array(
				'title'       => esc_html__( 'ISCP Theme Options', 'iscp' ),
				'description' => esc_html__( 'Indian Servers website options for branding, layout, content, performance and accessibility.', 'iscp' ),
				'priority'    => 30,
			)
		);

		$sections = array(
			'iscp_design_presets' => __( 'ISCP Design Presets', 'iscp' ),
			'iscp_layout_presets' => __( 'ISCP Layout Presets', 'iscp' ),
			'iscp_components'     => __( 'ISCP Components', 'iscp' ),
			'iscp_branding'      => __( 'Branding', 'iscp' ),
			'iscp_header'        => __( 'Header', 'iscp' ),
			'iscp_hero'          => __( 'Hero', 'iscp' ),
			'iscp_colors'        => __( 'Colors', 'iscp' ),
			'iscp_typography'    => __( 'Typography', 'iscp' ),
			'iscp_home_sections' => __( 'Homepage Sections', 'iscp' ),
			'iscp_contact'       => __( 'Contact Details', 'iscp' ),
			'iscp_social'        => __( 'Social Links', 'iscp' ),
			'iscp_footer'        => __( 'Footer', 'iscp' ),
			'iscp_performance'   => __( 'Performance & Accessibility', 'iscp' ),
			'iscp_conversion'    => __( 'Conversion Tools', 'iscp' ),
		);

		foreach ( $sections as $section_id => $section_title ) {
			$wp_customize->add_section(
				$section_id,
				array(
					'title' => $section_title,
					'panel' => 'iscp_theme_options',
				)
			);
		}

		iscp_add_customizer_control( $wp_customize, 'iscp_design_preset', 'iscp_design_presets', __( 'Global Design Preset', 'iscp' ), 'select', $defaults['iscp_design_preset'], $choices['iscp_design_preset'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_layout_preset', 'iscp_layout_presets', __( 'Global Layout Preset', 'iscp' ), 'select', $defaults['iscp_layout_preset'], $choices['iscp_layout_preset'] );

		if ( $wp_customize->get_control( 'iscp_design_preset' ) ) {
			$wp_customize->get_control( 'iscp_design_preset' )->description = __( 'Presets set global CSS variables. Manual color controls override preset colors when changed from their defaults.', 'iscp' );
		}

		if ( $wp_customize->get_control( 'iscp_layout_preset' ) ) {
			$wp_customize->get_control( 'iscp_layout_preset' )->description = __( 'Layout presets apply body classes for spacing, hero balance, card rhythm, CTA treatment and footer presentation.', 'iscp' );
		}

		$component_controls = array(
			'iscp_button_shape'           => __( 'Button Shape', 'iscp' ),
			'iscp_button_size'            => __( 'Button Size', 'iscp' ),
			'iscp_card_style'             => __( 'Card Style', 'iscp' ),
			'iscp_card_hover'             => __( 'Card Hover', 'iscp' ),
			'iscp_icon_style'             => __( 'Icon Style', 'iscp' ),
			'iscp_section_style'          => __( 'Section Style', 'iscp' ),
			'iscp_form_style'             => __( 'Form Style', 'iscp' ),
			'iscp_component_header_style' => __( 'Header Style', 'iscp' ),
			'iscp_component_footer_style' => __( 'Footer Style', 'iscp' ),
		);

		foreach ( $component_controls as $key => $label ) {
			iscp_add_customizer_control( $wp_customize, $key, 'iscp_components', $label, 'select', $defaults[ $key ], $choices[ $key ] );
		}

		iscp_add_customizer_control( $wp_customize, 'iscp_footer_logo', 'iscp_branding', __( 'Footer Logo', 'iscp' ), 'image', $defaults['iscp_footer_logo'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_site_tagline_override', 'iscp_branding', __( 'Site Tagline Override', 'iscp' ), 'text', $defaults['iscp_site_tagline_override'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_preloader_enabled', 'iscp_branding', __( 'Enable Preloader', 'iscp' ), 'checkbox', $defaults['iscp_preloader_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_back_to_top_enabled', 'iscp_branding', __( 'Enable Back to Top', 'iscp' ), 'checkbox', $defaults['iscp_back_to_top_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_frontend_credit_enabled', 'iscp_branding', __( 'Enable Frontend Theme Credit', 'iscp' ), 'checkbox', $defaults['iscp_frontend_credit_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_footer_credit_text', 'iscp_branding', __( 'Footer Credit Text', 'iscp' ), 'text', $defaults['iscp_footer_credit_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_footer_credit_url', 'iscp_branding', __( 'Footer Credit URL', 'iscp' ), 'url', $defaults['iscp_footer_credit_url'] );

		iscp_add_customizer_control( $wp_customize, 'iscp_header_layout', 'iscp_header', __( 'Header Layout Style', 'iscp' ), 'select', $defaults['iscp_header_layout'], $choices['iscp_header_layout'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_sticky_header_enabled', 'iscp_header', __( 'Enable Sticky Header', 'iscp' ), 'checkbox', $defaults['iscp_sticky_header_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_header_cta_1_text', 'iscp_header', __( 'Header CTA 1 Text', 'iscp' ), 'text', $defaults['iscp_header_cta_1_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_header_cta_1_url', 'iscp_header', __( 'Header CTA 1 URL', 'iscp' ), 'url', $defaults['iscp_header_cta_1_url'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_header_cta_2_text', 'iscp_header', __( 'Header CTA 2 Text', 'iscp' ), 'text', $defaults['iscp_header_cta_2_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_header_cta_2_url', 'iscp_header', __( 'Header CTA 2 URL', 'iscp' ), 'url', $defaults['iscp_header_cta_2_url'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_show_utility_menu', 'iscp_header', __( 'Show Utility Menu', 'iscp' ), 'checkbox', $defaults['iscp_show_utility_menu'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_show_search_icon', 'iscp_header', __( 'Show Search Icon', 'iscp' ), 'checkbox', $defaults['iscp_show_search_icon'] );

		iscp_add_customizer_control( $wp_customize, 'iscp_hero_layout', 'iscp_hero', __( 'Hero Layout', 'iscp' ), 'select', $defaults['iscp_hero_layout'], $choices['iscp_hero_layout'] );
		foreach ( array( 'eyebrow', 'headline', 'subtitle', 'primary_cta_text', 'primary_cta_url', 'secondary_cta_text', 'secondary_cta_url', 'badge_1', 'badge_2', 'badge_3', 'badge_4' ) as $hero_field ) {
			$key  = 'iscp_hero_' . $hero_field;
			$type = false !== strpos( $hero_field, 'url' ) ? 'url' : ( 'subtitle' === $hero_field ? 'textarea' : 'text' );
			iscp_add_customizer_control( $wp_customize, $key, 'iscp_hero', ucwords( str_replace( '_', ' ', $hero_field ) ), $type, $defaults[ $key ] );
		}
		iscp_add_customizer_control( $wp_customize, 'iscp_hero_visual_enabled', 'iscp_hero', __( 'Enable Hero Visual', 'iscp' ), 'checkbox', $defaults['iscp_hero_visual_enabled'] );

		$color_controls = array(
			'iscp_primary_color'           => __( 'Primary Color', 'iscp' ),
			'iscp_accent_color'            => __( 'Accent Color', 'iscp' ),
			'iscp_background_color'        => __( 'Background Color', 'iscp' ),
			'iscp_surface_color'           => __( 'Surface Color', 'iscp' ),
			'iscp_text_color'              => __( 'Text Color', 'iscp' ),
			'iscp_muted_text_color'        => __( 'Muted Text Color', 'iscp' ),
			'iscp_dark_section_background' => __( 'Dark Section Background', 'iscp' ),
			'iscp_border_color'            => __( 'Border Color', 'iscp' ),
		);

		foreach ( $color_controls as $key => $label ) {
			iscp_add_customizer_control( $wp_customize, $key, 'iscp_colors', $label, 'color', $defaults[ $key ] );
		}

		iscp_add_customizer_control( $wp_customize, 'iscp_heading_font_stack', 'iscp_typography', __( 'Heading Font Stack', 'iscp' ), 'select', $defaults['iscp_heading_font_stack'], $choices['iscp_heading_font_stack'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_body_font_stack', 'iscp_typography', __( 'Body Font Stack', 'iscp' ), 'select', $defaults['iscp_body_font_stack'], $choices['iscp_body_font_stack'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_base_font_size', 'iscp_typography', __( 'Base Font Size', 'iscp' ), 'select', $defaults['iscp_base_font_size'], $choices['iscp_base_font_size'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_heading_scale', 'iscp_typography', __( 'Heading Scale', 'iscp' ), 'select', $defaults['iscp_heading_scale'], $choices['iscp_heading_scale'] );

		$home_sections = array(
			'hero'         => __( 'Hero', 'iscp' ),
			'trust_strip'  => __( 'Trust Strip', 'iscp' ),
			'solutions'    => __( 'Solutions', 'iscp' ),
			'services'     => __( 'Services', 'iscp' ),
			'features'     => __( 'Features', 'iscp' ),
			'industries'   => __( 'Industries', 'iscp' ),
			'stats'        => __( 'Stats', 'iscp' ),
			'process'      => __( 'Process', 'iscp' ),
			'case_studies' => __( 'Case Studies', 'iscp' ),
			'testimonials' => __( 'Testimonials', 'iscp' ),
			'pricing'      => __( 'Pricing', 'iscp' ),
			'faq'          => __( 'FAQ', 'iscp' ),
			'blog'         => __( 'Blog', 'iscp' ),
			'cta'          => __( 'Final CTA', 'iscp' ),
		);

		foreach ( $home_sections as $slug => $label ) {
			$key = 'iscp_section_' . $slug . '_enabled';
			iscp_add_customizer_control( $wp_customize, $key, 'iscp_home_sections', $label, 'checkbox', $defaults[ $key ] );
		}

		iscp_add_customizer_control( $wp_customize, 'iscp_phone_display', 'iscp_contact', __( 'Phone Display', 'iscp' ), 'text', $defaults['iscp_phone_display'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_phone_tel', 'iscp_contact', __( 'Phone Tel Link', 'iscp' ), 'text', $defaults['iscp_phone_tel'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_email', 'iscp_contact', __( 'Email', 'iscp' ), 'email', $defaults['iscp_email'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_address', 'iscp_contact', __( 'Address', 'iscp' ), 'textarea', $defaults['iscp_address'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_whatsapp_number', 'iscp_contact', __( 'WhatsApp Number', 'iscp' ), 'text', $defaults['iscp_whatsapp_number'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_google_maps_url', 'iscp_contact', __( 'Google Maps URL', 'iscp' ), 'url', $defaults['iscp_google_maps_url'] );

		foreach ( array( 'linkedin', 'facebook', 'instagram', 'youtube', 'twitter', 'github', 'dribbble', 'behance' ) as $network ) {
			$key = 'iscp_social_' . $network;
			iscp_add_customizer_control( $wp_customize, $key, 'iscp_social', ucwords( str_replace( 'twitter', 'X/Twitter', $network ) ), 'url', $defaults[ $key ] );
		}

		iscp_add_customizer_control( $wp_customize, 'iscp_footer_layout', 'iscp_footer', __( 'Footer Layout', 'iscp' ), 'select', $defaults['iscp_footer_layout'], $choices['iscp_footer_layout'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_footer_description', 'iscp_footer', __( 'Footer Description', 'iscp' ), 'textarea', $defaults['iscp_footer_description'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_newsletter_enabled', 'iscp_footer', __( 'Enable Newsletter', 'iscp' ), 'checkbox', $defaults['iscp_newsletter_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_copyright_text', 'iscp_footer', __( 'Copyright Text', 'iscp' ), 'text', $defaults['iscp_copyright_text'] );

		iscp_add_customizer_control( $wp_customize, 'iscp_animations_enabled', 'iscp_performance', __( 'Enable Animations', 'iscp' ), 'checkbox', $defaults['iscp_animations_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_respect_reduced_motion', 'iscp_performance', __( 'Respect Reduced Motion', 'iscp' ), 'checkbox', $defaults['iscp_respect_reduced_motion'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_schema_enabled', 'iscp_performance', __( 'Enable Schema Output', 'iscp' ), 'checkbox', $defaults['iscp_schema_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_open_graph_enabled', 'iscp_performance', __( 'Enable Open Graph Output', 'iscp' ), 'checkbox', $defaults['iscp_open_graph_enabled'] );

		iscp_add_customizer_control( $wp_customize, 'iscp_sticky_cta_enabled', 'iscp_conversion', __( 'Enable Sticky CTA Bar', 'iscp' ), 'checkbox', $defaults['iscp_sticky_cta_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_sticky_cta_text', 'iscp_conversion', __( 'Sticky CTA Text', 'iscp' ), 'text', $defaults['iscp_sticky_cta_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_sticky_cta_button_text', 'iscp_conversion', __( 'Sticky CTA Button Text', 'iscp' ), 'text', $defaults['iscp_sticky_cta_button_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_sticky_cta_button_url', 'iscp_conversion', __( 'Sticky CTA Button URL', 'iscp' ), 'url', $defaults['iscp_sticky_cta_button_url'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_sticky_cta_display', 'iscp_conversion', __( 'Sticky CTA Display', 'iscp' ), 'select', $defaults['iscp_sticky_cta_display'], $choices['iscp_sticky_cta_display'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_exit_modal_enabled', 'iscp_conversion', __( 'Enable Exit Intent Modal', 'iscp' ), 'checkbox', $defaults['iscp_exit_modal_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_exit_modal_title', 'iscp_conversion', __( 'Exit Modal Title', 'iscp' ), 'text', $defaults['iscp_exit_modal_title'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_exit_modal_description', 'iscp_conversion', __( 'Exit Modal Description', 'iscp' ), 'textarea', $defaults['iscp_exit_modal_description'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_exit_modal_button_text', 'iscp_conversion', __( 'Exit Modal Button Text', 'iscp' ), 'text', $defaults['iscp_exit_modal_button_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_exit_modal_button_url', 'iscp_conversion', __( 'Exit Modal Button URL', 'iscp' ), 'url', $defaults['iscp_exit_modal_button_url'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_exit_modal_close_text', 'iscp_conversion', __( 'Exit Modal Close Text', 'iscp' ), 'text', $defaults['iscp_exit_modal_close_text'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_scroll_progress_enabled', 'iscp_conversion', __( 'Enable Scroll Progress Bar', 'iscp' ), 'checkbox', $defaults['iscp_scroll_progress_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_reading_time_enabled', 'iscp_conversion', __( 'Enable Reading Time', 'iscp' ), 'checkbox', $defaults['iscp_reading_time_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_share_buttons_enabled', 'iscp_conversion', __( 'Enable Blog Share Buttons', 'iscp' ), 'checkbox', $defaults['iscp_share_buttons_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_share_linkedin_enabled', 'iscp_conversion', __( 'Share: LinkedIn', 'iscp' ), 'checkbox', $defaults['iscp_share_linkedin_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_share_twitter_enabled', 'iscp_conversion', __( 'Share: X/Twitter', 'iscp' ), 'checkbox', $defaults['iscp_share_twitter_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_share_facebook_enabled', 'iscp_conversion', __( 'Share: Facebook', 'iscp' ), 'checkbox', $defaults['iscp_share_facebook_enabled'] );
		iscp_add_customizer_control( $wp_customize, 'iscp_share_whatsapp_enabled', 'iscp_conversion', __( 'Share: WhatsApp', 'iscp' ), 'checkbox', $defaults['iscp_share_whatsapp_enabled'] );
	}
}
add_action( 'customize_register', 'iscp_customize_register' );

if ( ! function_exists( 'iscp_add_customizer_control' ) ) {
	/**
	 * Add a Customizer setting and control.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 * @param string               $key Setting key.
	 * @param string               $section Section ID.
	 * @param string               $label Control label.
	 * @param string               $type Control type.
	 * @param mixed                $default Default value.
	 * @param array                $choices Select choices.
	 */
	function iscp_add_customizer_control( $wp_customize, $key, $section, $label, $type, $default, $choices = array() ) {
		$sanitize_callback = 'sanitize_text_field';

		if ( 'checkbox' === $type ) {
			$sanitize_callback = 'iscp_sanitize_checkbox';
		} elseif ( 'select' === $type ) {
			$sanitize_callback = 'iscp_sanitize_select';
		} elseif ( 'color' === $type ) {
			$sanitize_callback = 'iscp_sanitize_hex_color';
		} elseif ( 'url' === $type || 'image' === $type ) {
			$sanitize_callback = 'esc_url_raw';
		} elseif ( 'email' === $type ) {
			$sanitize_callback = 'sanitize_email';
		} elseif ( 'textarea' === $type ) {
			$sanitize_callback = 'sanitize_textarea_field';
		}

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $default,
				'sanitize_callback' => $sanitize_callback,
				'transport'         => 'refresh',
			)
		);

		if ( 'color' === $type ) {
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$key,
					array(
						'label'   => $label,
						'section' => $section,
					)
				)
			);
			return;
		}

		if ( 'image' === $type ) {
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					$key,
					array(
						'label'   => $label,
						'section' => $section,
					)
				)
			);
			return;
		}

		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => $section,
				'type'    => 'email' === $type ? 'email' : $type,
				'choices' => $choices,
			)
		);
	}
}
