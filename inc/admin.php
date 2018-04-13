<?php
/**
 * Custom functions for the Admin panel
 *
 * @package bowtie
 */

/**
 * Add ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Enqueue Assets
 */
function bowtie_admin_assets( $hook ) {

  global $post;
  wp_enqueue_script(  'clipboard-js', get_stylesheet_directory_uri().'/assets/js/vendors/clipboard.min.js', null, null, true );

	wp_register_style('bowtie_admin', get_stylesheet_directory_uri().'/assets/dist/css/admin.css');
	wp_enqueue_style('bowtie_admin');
}
add_action( 'admin_enqueue_scripts', 'bowtie_admin_assets', 10, 1 );

/**
 *
 * Add Links to Admin Toolbar
 * Infinite, Media, Options
 *
 */
add_action( 'admin_bar_menu', 'bowtie_toolbar', 999 );
function bowtie_toolbar( $wp_admin_bar ) {

	$wp_admin_bar->remove_node('wp-logo');

	$media_args = array(
		'id' => 'toolbar_media',
		'title' => 'Media',
		'href' => get_site_url().'/wp-admin/upload.php',
		'meta' => array( 'class' => 'toolbar-media' )
	);
	$wp_admin_bar->add_node( $media_args );

	$options_args = array(
		'id' => 'acf_options',
		'title' => 'Options',
		'href' => get_site_url().'/wp-admin/admin.php?page=acf-options',
		'meta' => array( 'class' => 'acf-options' )
	);
	$wp_admin_bar->add_node( $options_args );

}

add_action( 'admin_bar_menu', 'bowtie_infinite_toolbar', 5 );
function bowtie_infinite_toolbar( $wp_admin_bar ) {

		$infinite_menu_args = array(
			'id' => 'toolbar_infinite',
			'title' => false,
			'href' => 'http://theinfiniteagency.com',
			'meta' => array( 'class' => 'toolbar-infinite' )
		);
		$wp_admin_bar->add_node( $infinite_menu_args );

		$infinite_args = array(
			'id' => 'toolbar_infinite_website',
			'parent' => 'toolbar_infinite',
			'title' => 'The Infinite Agency',
			'href' => 'http://theinfiniteagency.com',
			'meta' => array( 'class' => 'toolbar-infinite' )
		);
		$wp_admin_bar->add_node( $infinite_args );
}

/**
 * Register meta box for color options.
 *
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function mb_colors_register_meta_boxes() {
    add_meta_box( 'mb-colors', 'Brand Colors', 'mb_colors_display', array('page','post'), 'side', 'low' );
}
add_action( 'add_meta_boxes', 'mb_colors_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function mb_colors_display( $post ) {
	//wp_nonce_field( basename( __FILE__ ), 'mb_colors_nonce' );


	if(have_rows('colors', 'options')):
		echo '<p>Click color to copy to clipboard.</p>';
		while(have_rows('colors', 'options')): the_row();
			echo '<div class="color-select clipboard" style="background: '.get_sub_field('color').' " data-clipboard-text="'.get_sub_field('color').'">'.get_sub_field('label').'</div>';
		endwhile;
	else:
		echo 'Go to <a href="/wp-admin/admin.php?page=acf-options">Options</a> to set brand colors for easy copying.';
	endif;

}

function acf_load_color_field_choices( $field ) {
  // reset choices
  $field['choices'] = array();

  $field['choices']['transparent'] = 'Transparent';
  // if has rows
  if( have_rows('colors', 'option') ) {
      // while has rows
      while( have_rows('colors', 'option') ) {
          // instantiate row
          the_row();
          // vars
          $value = get_sub_field('class_suffix');
          $label = get_sub_field('label');
          // append to choices
          $field['choices'][ $value ] = $label;
      }
  }
  // return the field
  return $field;
}
add_filter('acf/load_field/name=select_brand_color', 'acf_load_color_field_choices');

function acf_load_gravity_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();
		$forms = GFAPI::get_forms();
		foreach($forms as $form) {
			$value = $form['id'];
			$label = $form['title'];
			// append to choices
			$field['choices'][ $value ] = $label;
		}

    return $field;
}
add_filter('acf/load_field/name=select_gravity_form', 'acf_load_gravity_field_choices');


/*************************************************************/
/*   Friendly Block Titles                                  */
/***********************************************************/
 
function bowtie_layout_title($title, $field, $layout, $i) {
	if($admin_name = get_sub_field('administrative_name')) {
		$title = $admin_name;
	}

	if(get_sub_field('disable_block')) {
		$title = '[<strong>Disabled</strong>] ' . $title;
	}

	return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'bowtie_layout_title', 10, 4);
