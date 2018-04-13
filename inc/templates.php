<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bowtie
 */

if ( ! function_exists( 'bowtie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bowtie_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bowtie, use a find and replace
	 * to change 'bowtie' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bowtie', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bowtie' ),
		'responsive' => esc_html__( 'Responsive Menu', 'bowtie' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bowtie_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bowtie_setup
add_action( 'after_setup_theme', 'bowtie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _bowtie_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_bowtie_content_width', 1200 );
}
add_action( 'after_setup_theme', '_bowtie_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bowtie_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bowtie' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'bowtie' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bowtie_widgets_init' );


/**
 * Disable WP Emoji
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Disable Auto Paragraphs
 *
 * @link https://codex.wordpress.org/Function_Reference/wpautop
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/**
 *
 * Remove css adding margin-top to html
 *
 */
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

/**
 * Add Page Slug to Body Class
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function bowtie_slug_class( $classes ) {
	if ( is_singular( 'page' ) ) {
		global $post;
		$classes[] = 'page-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'bowtie_slug_class' );

/*******************************************************************************
* Make YouTube and Vimeo oembed elements responsive. Add Foundation's .flex-video
* class wrapper around any oembeds
*******************************************************************************/

add_filter( 'embed_oembed_html', 'bowtie_oembed_flex_wrapper', 10, 4 );
function bowtie_oembed_flex_wrapper( $html, $url, $attr, $post_ID ) {
	if ( strpos($url, 'youtube') || strpos($url, 'youtu.be') || strpos($url, 'vimeo') ) {
		return '<div class="flex-video widescreen">' . $html . '</div>';
	}
	return $html;
}


/**
 * Flush out the transients used in bowtie_categorized_blog.
 */
function bowtie_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bowtie_categories' );
}
add_action( 'edit_category', 'bowtie_category_transient_flusher' );
add_action( 'save_post',     'bowtie_category_transient_flusher' );
