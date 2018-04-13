<?php
/**
 * bowtie functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bowtie
 */

/**
 * Define theme constants
 */
define('THEME_DIR', trailingslashit( get_template_directory()));
define('THEME_URI', trailingslashit( get_template_directory_uri()));
define('ASSETS_DIR', THEME_URI . trailingslashit('assets'));
define('CSS_DIR', ASSETS_DIR . trailingslashit('dist/css'));
define('JS_DIR', ASSETS_DIR . trailingslashit('dist/js'));
define('IMAGES_DIR', ASSETS_DIR . trailingslashit('images'));
define('VIDEOS_DIR', ASSETS_DIR . trailingslashit('images/videos'));


/**
 * Custom assets for this theme.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Custom functions and assets for admin.
 */
require get_template_directory() . '/inc/admin.php';

/**
 * Custom functions and assets for login.
 */
require get_template_directory() . '/inc/login.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/templates.php';

/**
 * Custom shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


