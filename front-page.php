<?php
/**
 * Front page template.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

get_header();

$iscp_sections = array(
	'hero'         => 'hero',
	'trust_strip'  => 'trust-strip',
	'solutions'    => 'solutions',
	'blog'         => 'blog',
	'capabilities' => 'capabilities',
	'features'     => 'features',
	'industries'   => 'industries',
	'stats'        => 'stats',
	'process'      => 'process',
	'cta'          => 'cta',
);

foreach ( $iscp_sections as $iscp_section_key => $iscp_template ) {
	if ( iscp_get_theme_mod( 'iscp_section_' . $iscp_section_key . '_enabled', true ) ) {
		get_template_part( 'template-parts/sections/' . $iscp_template );
	}
}

get_footer();
