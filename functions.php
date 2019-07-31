<?php

$template_directory = get_template_directory();

/**
 * firewolf only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require $template_directory . '/inc/functions-back-compat.php';
	return;
}

require $template_directory . '/inc/functions-setup.php';
require $template_directory . '/inc/functions-assets.php';
require $template_directory . '/inc/functions-pagination.php';
require $template_directory . '/inc/functions-session.php';
require $template_directory . '/inc/area_func.php';
require $template_directory . '/inc/add_acf_func.php';