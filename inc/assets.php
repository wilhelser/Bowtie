<?php

/**
 * Enqueue styles.
 */
if ( !function_exists( 'bowtie_styles' ) ) :

	function bowtie_styles() {
		// Enqueue our stylesheet
		$handle = 'bowtie_styles';
		$src =  get_template_directory_uri() . '/assets/dist/css/app.css';
		$deps = '';
		$ver = filemtime( get_template_directory() . '/assets/dist/css/app.css');
		$media = '';
		wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	}

add_action( 'wp_enqueue_scripts', 'bowtie_styles' );

endif;


/**
 * Enqueue scripts.
 */
function bowtie_scripts() {

	// Add our concatenated JS file after Foundation
	$handle = 'bowtie_appjs';
	$src =  get_template_directory_uri() . '/assets/dist/js/app.js';
	$deps = array( 'jquery' );
	$ver = filemtime( get_template_directory() . '/assets/dist/js/app.js');
	$in_footer = true;
	wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bowtie_scripts' );