<?php
/**
 * Custom functions for the Login page
 *
 * @package bowtie
 */

/*******************************************************************************
* Custom login styles for the theme. Sass file is located in ./assets/login.scss
* and is spit out to ./assets/dist/css/login.css by webpack. Functions are here so
* that you can move it wherever works best for your project.
*******************************************************************************/

// Load the CSS
add_action( 'login_enqueue_scripts', 'bowtie_login_css' );
function bowtie_login_css() {
	wp_enqueue_style( 'bowtie_login_css', get_template_directory_uri() .
	'/assets/dist/css/login.css', false );
}

// Change header link to our site instead of wordpress.org
add_filter( 'login_headerurl', 'bowtie_remove_logo_link' );
function bowtie_remove_logo_link() {
	return get_bloginfo( 'url' );
}

// Change logo title in from WordPress to our site name
add_filter( 'login_headertitle', 'bowtie_change_login_logo_title' );
function bowtie_change_login_logo_title() {
	return get_bloginfo( 'name' );
}
