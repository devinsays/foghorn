<?php

/**
* Theme options require the "Options Framework" plugin to be installed in order to display
* If it's not installed, default settings will be used
*/
 
if ( !function_exists( 'of_get_option' ) ) {

	function of_get_option($name, $default = false) {
		$optionsframework_settings = get_option('optionsframework');
		
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		
		if ( get_option($option_name) ) {
		$options = get_option($option_name);
		}
		
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

/**
 * Adds Foghorn layout classes to the array of body classes.
 *
 * @since Foghorn 0.1
 */
function foghorn_layout_classes( $existing_classes ) {
	if ( is_singular() ) {
		$layout = of_get_option('singular_layout','content-sidebar');
	}
	else {
		$layout = of_get_option('multiple_layout','one-column');
	}
	$classes[] = $layout;

	return array_merge( $existing_classes, $classes );
}
add_filter( 'body_class', 'foghorn_layout_classes' );