<?php
/**
 * Theme bootstrap.
 *
 * @package ISCP
 */

defined( 'ABSPATH' ) || exit;

$iscp_includes = array(
	'inc/theme-setup.php',
	'inc/enqueue.php',
	'inc/customizer.php',
	'inc/post-types.php',
	'inc/taxonomies.php',
	'inc/seo-schema.php',
	'inc/template-functions.php',
	'inc/shortcodes.php',
	'inc/block-patterns.php',
	'inc/demo-importer.php',
	'inc/admin-dashboard.php',
	'inc/starter-content.php',
	'inc/compatibility.php',
);

foreach ( $iscp_includes as $iscp_file ) {
	require_once get_template_directory() . '/' . $iscp_file;
}
