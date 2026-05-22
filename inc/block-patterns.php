<?php
/**
 * ISCP Section Studio block patterns.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'iscp_pattern_button' ) ) {
	/**
	 * Return a core button block.
	 *
	 * @param string $label Button label.
	 * @param string $url Button URL.
	 * @param string $class Button class.
	 * @return string
	 */
	function iscp_pattern_button( $label, $url = '#', $class = 'iscp-btn iscp-btn-primary' ) {
		return '<!-- wp:buttons {"className":"iscp-pattern-actions"} --><div class="wp-block-buttons iscp-pattern-actions"><!-- wp:button {"className":"' . esc_attr( $class ) . '"} --><div class="wp-block-button ' . esc_attr( $class ) . '"><a class="wp-block-button__link wp-element-button" href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->';
	}
}

if ( ! function_exists( 'iscp_pattern_visual' ) ) {
	/**
	 * Return a visual placeholder block.
	 *
	 * @param string $label Visual label.
	 * @return string
	 */
	function iscp_pattern_visual( $label ) {
		return '<!-- wp:group {"className":"iscp-pattern-visual"} --><div class="wp-block-group iscp-pattern-visual"><!-- wp:paragraph {"className":"iscp-pattern-visual-label"} --><p class="iscp-pattern-visual-label">' . esc_html( $label ) . '</p><!-- /wp:paragraph --><!-- wp:html --><div class="iscp-pattern-visual-grid" aria-hidden="true"><span></span><span></span><span></span><span></span></div><!-- /wp:html --></div><!-- /wp:group -->';
	}
}

if ( ! function_exists( 'iscp_pattern_cards' ) ) {
	/**
	 * Return a group of cards.
	 *
	 * @param array  $items Card titles.
	 * @param string $description Card description.
	 * @param string $grid_class Grid class.
	 * @return string
	 */
	function iscp_pattern_cards( $items, $description, $grid_class = 'iscp-pattern-grid iscp-pattern-grid-3' ) {
		$content = '<!-- wp:group {"className":"' . esc_attr( $grid_class ) . '"} --><div class="wp-block-group ' . esc_attr( $grid_class ) . '">';

		foreach ( $items as $item ) {
			$content .= '<!-- wp:group {"className":"iscp-pattern-card"} --><div class="wp-block-group iscp-pattern-card"><!-- wp:paragraph {"className":"iscp-pattern-icon"} --><p class="iscp-pattern-icon"></p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>' . esc_html( $item ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html( $description ) . '</p><!-- /wp:paragraph --></div><!-- /wp:group -->';
		}

		$content .= '</div><!-- /wp:group -->';

		return $content;
	}
}

if ( ! function_exists( 'iscp_pattern_section' ) ) {
	/**
	 * Return a section pattern.
	 *
	 * @param string $type Pattern type.
	 * @param string $eyebrow Eyebrow text.
	 * @param string $heading Heading.
	 * @param string $body Body text.
	 * @param string $inner Inner content.
	 * @param bool   $dark Dark style.
	 * @return string
	 */
	function iscp_pattern_section( $type, $eyebrow, $heading, $body, $inner = '', $dark = false ) {
		$classes = 'iscp-pattern iscp-pattern-' . sanitize_html_class( $type );

		if ( $dark ) {
			$classes .= ' iscp-pattern-dark';
		}

		return '<!-- wp:group {"className":"' . esc_attr( $classes ) . '","layout":{"type":"constrained"}} --><div class="wp-block-group ' . esc_attr( $classes ) . '"><!-- wp:paragraph {"className":"iscp-pattern-eyebrow"} --><p class="iscp-pattern-eyebrow">' . esc_html( $eyebrow ) . '</p><!-- /wp:paragraph --><!-- wp:heading --><h2>' . esc_html( $heading ) . '</h2><!-- /wp:heading --><!-- wp:paragraph {"className":"iscp-pattern-lead"} --><p class="iscp-pattern-lead">' . esc_html( $body ) . '</p><!-- /wp:paragraph -->' . $inner . '</div><!-- /wp:group -->';
	}
}

if ( ! function_exists( 'iscp_build_pattern_content' ) ) {
	/**
	 * Build pattern content by type.
	 *
	 * @param array $pattern Pattern config.
	 * @return string
	 */
	function iscp_build_pattern_content( $pattern ) {
		$title = $pattern['title'];
		$type  = $pattern['type'];
		$dark  = ! empty( $pattern['dark'] );

		if ( 'hero' === $type ) {
			$inner = '<!-- wp:columns {"className":"iscp-pattern-columns"} --><div class="wp-block-columns iscp-pattern-columns"><!-- wp:column --><div class="wp-block-column">' . iscp_pattern_button( __( 'Get Started', 'iscp' ) ) . '</div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column">' . iscp_pattern_visual( $title ) . '</div><!-- /wp:column --></div><!-- /wp:columns -->';
			return iscp_pattern_section( 'hero', __( 'Premium Section', 'iscp' ), $title, __( 'Use this ready-made section to introduce a business, product, service or campaign with a polished corporate layout.', 'iscp' ), $inner, $dark );
		}

		if ( 'pricing' === $type ) {
			$inner = iscp_pattern_cards( array( __( 'Starter', 'iscp' ), __( 'Professional', 'iscp' ), __( 'Enterprise', 'iscp' ) ), __( 'Add plan details, benefits and a clear call to action.', 'iscp' ), 'iscp-pattern-grid iscp-pattern-grid-3 iscp-pattern-pricing' );
			return iscp_pattern_section( 'pricing', __( 'Pricing', 'iscp' ), $title, __( 'Present buyer service packages in a clean, credible and conversion-ready way.', 'iscp' ), $inner, $dark );
		}

		if ( 'faq' === $type ) {
			$inner = iscp_pattern_cards( array( __( 'Can this section be customized?', 'iscp' ), __( 'Does this need a page builder?', 'iscp' ), __( 'Can sections be combined?', 'iscp' ) ), __( 'Replace this answer with helpful, buyer-focused guidance.', 'iscp' ), 'iscp-pattern-grid iscp-pattern-grid-2 iscp-pattern-faq' );
			return iscp_pattern_section( 'faq', __( 'FAQ', 'iscp' ), $title, __( 'Answer common objections with accessible, structured content.', 'iscp' ), $inner, $dark );
		}

		if ( 'testimonial' === $type ) {
			$inner = iscp_pattern_cards( array( __( 'Founder', 'iscp' ), __( 'Agency Owner', 'iscp' ), __( 'Operations Lead', 'iscp' ) ), __( 'This original placeholder quote can be replaced with a real testimonial.', 'iscp' ), 'iscp-pattern-grid iscp-pattern-grid-3 iscp-pattern-testimonial' );
			return iscp_pattern_section( 'testimonial', __( 'Testimonials', 'iscp' ), $title, __( 'Build trust with customer voices, outcomes and social proof.', 'iscp' ), $inner, $dark );
		}

		if ( 'contact' === $type ) {
			$inner = iscp_pattern_cards( array( __( 'Email', 'iscp' ), __( 'Phone', 'iscp' ), __( 'Office', 'iscp' ) ), __( 'Replace with real contact details or connect a form plugin if needed.', 'iscp' ), 'iscp-pattern-grid iscp-pattern-grid-3 iscp-pattern-contact' );
			return iscp_pattern_section( 'contact', __( 'Contact', 'iscp' ), $title, __( 'Make it easy for visitors to start a conversation with the business.', 'iscp' ), $inner, $dark );
		}

		if ( 'trust' === $type ) {
			$inner = iscp_pattern_cards( array( __( 'Startup', 'iscp' ), __( 'Agency', 'iscp' ), __( 'SaaS', 'iscp' ), __( 'Enterprise', 'iscp' ) ), __( 'Use this area for proof, awards, certifications or client categories.', 'iscp' ), 'iscp-pattern-grid iscp-pattern-grid-4' );
			return iscp_pattern_section( 'trust', __( 'Trust', 'iscp' ), $title, __( 'Add credibility markers that help buyers feel confident before they contact you.', 'iscp' ), $inner, $dark );
		}

		if ( 'cta' === $type ) {
			$inner = '<!-- wp:group {"className":"iscp-pattern-cta"} --><div class="wp-block-group iscp-pattern-cta">' . iscp_pattern_button( __( 'Start Now', 'iscp' ) ) . '</div><!-- /wp:group -->';
			return iscp_pattern_section( 'cta', __( 'Call to Action', 'iscp' ), $title, __( 'Guide visitors toward the next business action with confident, focused messaging.', 'iscp' ), $inner, $dark );
		}

		$items = array( __( 'Strategy', 'iscp' ), __( 'Execution', 'iscp' ), __( 'Growth', 'iscp' ) );

		if ( 'feature' === $type ) {
			$items = array( __( 'Fast setup', 'iscp' ), __( 'Flexible sections', 'iscp' ), __( 'SEO structure', 'iscp' ), __( 'Mobile first', 'iscp' ) );
		} elseif ( 'service' === $type ) {
			$items = array( __( 'Consulting', 'iscp' ), __( 'Implementation', 'iscp' ), __( 'Support', 'iscp' ) );
		} elseif ( 'solution' === $type ) {
			$items = array( __( 'Platform', 'iscp' ), __( 'Dashboard', 'iscp' ), __( 'Automation', 'iscp' ) );
		}

		$eyebrows = array(
			'feature'  => __( 'Features', 'iscp' ),
			'service'  => __( 'Services', 'iscp' ),
			'solution' => __( 'Solutions', 'iscp' ),
		);
		$eyebrow  = isset( $eyebrows[ $type ] ) ? $eyebrows[ $type ] : __( 'Section', 'iscp' );
		$inner    = iscp_pattern_cards( $items, __( 'Replace this original placeholder text with specific benefits, proof points and details.', 'iscp' ), 'iscp-pattern-grid iscp-pattern-grid-3' );

		return iscp_pattern_section( $type, $eyebrow, $title, __( 'A reusable premium corporate section built with core WordPress blocks and ISCP design classes.', 'iscp' ), $inner, $dark );
	}
}

if ( ! function_exists( 'iscp_get_section_studio_patterns' ) ) {
	/**
	 * Return Section Studio pattern configs.
	 *
	 * @return array
	 */
	function iscp_get_section_studio_patterns() {
		return array(
			array( 'slug' => 'hero-dashboard', 'title' => __( 'Hero Dashboard', 'iscp' ), 'type' => 'hero', 'dark' => true ),
			array( 'slug' => 'hero-centered', 'title' => __( 'Hero Centered', 'iscp' ), 'type' => 'hero' ),
			array( 'slug' => 'hero-split-image', 'title' => __( 'Hero Split Image', 'iscp' ), 'type' => 'hero' ),
			array( 'slug' => 'hero-saas', 'title' => __( 'Hero SaaS', 'iscp' ), 'type' => 'hero' ),
			array( 'slug' => 'hero-agency', 'title' => __( 'Hero Agency', 'iscp' ), 'type' => 'hero' ),
			array( 'slug' => 'hero-consultant', 'title' => __( 'Hero Consultant', 'iscp' ), 'type' => 'hero' ),
			array( 'slug' => 'hero-dark-premium', 'title' => __( 'Hero Dark Premium', 'iscp' ), 'type' => 'hero', 'dark' => true ),
			array( 'slug' => 'hero-minimal-corporate', 'title' => __( 'Hero Minimal Corporate', 'iscp' ), 'type' => 'hero' ),
			array( 'slug' => 'feature-grid-3-columns', 'title' => __( 'Feature Grid 3 Columns', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-grid-4-columns', 'title' => __( 'Feature Grid 4 Columns', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-cards-with-icons', 'title' => __( 'Feature Cards With Icons', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-timeline', 'title' => __( 'Feature Timeline', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-comparison', 'title' => __( 'Feature Comparison', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-checklist', 'title' => __( 'Feature Checklist', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-with-image', 'title' => __( 'Feature With Image', 'iscp' ), 'type' => 'feature' ),
			array( 'slug' => 'feature-dark-section', 'title' => __( 'Feature Dark Section', 'iscp' ), 'type' => 'feature', 'dark' => true ),
			array( 'slug' => 'services-grid', 'title' => __( 'Services Grid', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'services-with-cta', 'title' => __( 'Services With CTA', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'services-alternating-rows', 'title' => __( 'Services Alternating Rows', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'services-icon-cards', 'title' => __( 'Services Icon Cards', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'services-for-agencies', 'title' => __( 'Services For Agencies', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'services-for-saas', 'title' => __( 'Services For SaaS', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'services-for-it-company', 'title' => __( 'Services For IT Company', 'iscp' ), 'type' => 'service' ),
			array( 'slug' => 'product-solution-grid', 'title' => __( 'Product/Solution Grid', 'iscp' ), 'type' => 'solution' ),
			array( 'slug' => 'saas-product-cards', 'title' => __( 'SaaS Product Cards', 'iscp' ), 'type' => 'solution' ),
			array( 'slug' => 'erp-crm-solution-cards', 'title' => __( 'ERP/CRM Solution Cards', 'iscp' ), 'type' => 'solution' ),
			array( 'slug' => 'ai-solution-cards', 'title' => __( 'AI Solution Cards', 'iscp' ), 'type' => 'solution' ),
			array( 'slug' => 'training-solution-cards', 'title' => __( 'Training Solution Cards', 'iscp' ), 'type' => 'solution' ),
			array( 'slug' => 'school-software-solution-cards', 'title' => __( 'School Software Solution Cards', 'iscp' ), 'type' => 'solution' ),
			array( 'slug' => 'logo-strip', 'title' => __( 'Logo Strip', 'iscp' ), 'type' => 'trust' ),
			array( 'slug' => 'stats-row', 'title' => __( 'Stats Row', 'iscp' ), 'type' => 'trust', 'dark' => true ),
			array( 'slug' => 'trust-badges', 'title' => __( 'Trust Badges', 'iscp' ), 'type' => 'trust' ),
			array( 'slug' => 'awards-strip', 'title' => __( 'Awards Strip', 'iscp' ), 'type' => 'trust' ),
			array( 'slug' => 'client-quote-highlight', 'title' => __( 'Client Quote Highlight', 'iscp' ), 'type' => 'trust' ),
			array( 'slug' => 'certification-strip', 'title' => __( 'Certification Strip', 'iscp' ), 'type' => 'trust' ),
			array( 'slug' => 'cta-simple', 'title' => __( 'CTA Simple', 'iscp' ), 'type' => 'cta' ),
			array( 'slug' => 'cta-dark', 'title' => __( 'CTA Dark', 'iscp' ), 'type' => 'cta', 'dark' => true ),
			array( 'slug' => 'cta-with-benefits', 'title' => __( 'CTA With Benefits', 'iscp' ), 'type' => 'cta' ),
			array( 'slug' => 'cta-split', 'title' => __( 'CTA Split', 'iscp' ), 'type' => 'cta' ),
			array( 'slug' => 'cta-sticky-bottom-style', 'title' => __( 'CTA Sticky Bottom Style', 'iscp' ), 'type' => 'cta' ),
			array( 'slug' => 'lead-magnet-cta', 'title' => __( 'Lead Magnet CTA', 'iscp' ), 'type' => 'cta' ),
			array( 'slug' => 'pricing-3-cards', 'title' => __( 'Pricing 3 Cards', 'iscp' ), 'type' => 'pricing' ),
			array( 'slug' => 'pricing-with-featured-plan', 'title' => __( 'Pricing With Featured Plan', 'iscp' ), 'type' => 'pricing' ),
			array( 'slug' => 'pricing-comparison', 'title' => __( 'Pricing Comparison', 'iscp' ), 'type' => 'pricing' ),
			array( 'slug' => 'pricing-minimal', 'title' => __( 'Pricing Minimal', 'iscp' ), 'type' => 'pricing' ),
			array( 'slug' => 'faq-accordion', 'title' => __( 'FAQ Accordion', 'iscp' ), 'type' => 'faq' ),
			array( 'slug' => 'faq-two-column', 'title' => __( 'FAQ Two Column', 'iscp' ), 'type' => 'faq' ),
			array( 'slug' => 'faq-with-cta', 'title' => __( 'FAQ With CTA', 'iscp' ), 'type' => 'faq' ),
			array( 'slug' => 'testimonial-cards', 'title' => __( 'Testimonial Cards', 'iscp' ), 'type' => 'testimonial' ),
			array( 'slug' => 'testimonial-slider-layout-static', 'title' => __( 'Testimonial Slider Layout Static', 'iscp' ), 'type' => 'testimonial' ),
			array( 'slug' => 'testimonial-wall', 'title' => __( 'Testimonial Wall', 'iscp' ), 'type' => 'testimonial' ),
			array( 'slug' => 'single-large-testimonial', 'title' => __( 'Single Large Testimonial', 'iscp' ), 'type' => 'testimonial' ),
			array( 'slug' => 'contact-split', 'title' => __( 'Contact Split', 'iscp' ), 'type' => 'contact' ),
			array( 'slug' => 'contact-cards', 'title' => __( 'Contact Cards', 'iscp' ), 'type' => 'contact' ),
			array( 'slug' => 'contact-with-map-placeholder', 'title' => __( 'Contact With Map Placeholder', 'iscp' ), 'type' => 'contact' ),
			array( 'slug' => 'contact-cta', 'title' => __( 'Contact CTA', 'iscp' ), 'type' => 'contact' ),
		);
	}
}

if ( ! function_exists( 'iscp_register_block_patterns' ) ) {
	/**
	 * Register block patterns.
	 */
	function iscp_register_block_patterns() {
		if ( ! function_exists( 'register_block_pattern' ) || ! function_exists( 'register_block_pattern_category' ) ) {
			return;
		}

		register_block_pattern_category(
			'iscp-sections',
			array( 'label' => __( 'ISCP Sections', 'iscp' ) )
		);

		foreach ( iscp_get_section_studio_patterns() as $pattern ) {
			register_block_pattern(
				'iscp/' . $pattern['slug'],
				array(
					'title'       => $pattern['title'],
					'description' => __( 'A premium ISCP Section Studio pattern built with core WordPress blocks.', 'iscp' ),
					'categories'  => array( 'iscp-sections' ),
					'content'     => iscp_build_pattern_content( $pattern ),
				)
			);
		}
	}
}
add_action( 'init', 'iscp_register_block_patterns' );
