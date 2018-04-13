<?php
/**
 * Custom shortcodes
 *
 * @package bowtie
 */

add_filter('widget_text', 'do_shortcode');

function social_shortcode($atts) {
	$output = '<div class="social">';

	if(have_rows('social_media', 'option')):
		while(have_rows('social_media', 'option')): the_row();
			$output .= '<a href="'.get_sub_field('url').'" target="_blank" class="fab social fa-'.get_sub_field('media').'"></a>';
		endwhile;
	endif;

	$output .= '</div>';

	return $output;
}
add_shortcode('social_media', 'social_shortcode');

function contact_shortcode($atts) {
	if($atts['id'] == 'address') {
		$output = get_field('address', 'option').' '.get_field('city','option').', '.get_field('state','option').' '.get_field('zip', 'option');
	} elseif($atts['id'] == 'email') {
		$output = get_field('email','option');
	} elseif($atts['id'] == 'phone') {
		$output = get_field('phone_number', 'option');
	}

	return $output;
}
add_shortcode('contact','contact_shortcode');

function logo_shortcode($atts) {
	$output = '';

	if(isset($atts['id'])) {
		$filename = 'logo-'.$atts['id'];
	} else {
		$filename = 'logo';
	}

	$file = file_get_contents( get_template_directory() . '/assets/images/'.$filename.'.svg' );
	if(isset($atts['class'])) { $class = $atts['class']; } else { $class = ''; }
	if($file) {
		$output .= '<div class="logo '.$filename.' '.$class.'">';

		$output .= $file;

		$output .= '</div>';
	} else {
		$output .= 'A matching logo could not be found.';
	}

	return $output;
}
add_shortcode('logo', 'logo_shortcode');

function vector_shortcode($atts) {
	$output = '';

	if(isset($atts['id'])) {
		$filename = $atts['id'];
	} else {
		$filename = '';
	}

	$file = file_get_contents( get_template_directory() . '/assets/images/'.$filename.'.svg' );
	if(isset($atts['class'])) { $class = $atts['class']; } else { $class = ''; }
	if($file) {
		$output .= '<div class="vector '.$atts['id'].' '.$class.'">';

		$output .= $file;

		$output .= '</div>';
	} else {
		$output .= 'A matching vector could not be found.';
	}

	return $output;
}
add_shortcode('vector', 'vector_shortcode');
