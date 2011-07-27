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

if ( !function_exists( 'optionsframework_add_page' ) && current_user_can('edit_theme_options') ) {
	function portfolio_options_default() {
		add_theme_page(__('Theme Options','foghorn'), __('Theme Options','foghorn'), 'edit_theme_options', 'options-framework','optionsframework_page_notice');
	}
	add_action('admin_menu', 'portfolio_options_default');
}

/**
 * Displays a notice on the theme options page if the Options Framework plugin is not installed
 */

if ( !function_exists( 'optionsframework_page_notice' ) ) {
	function optionsframework_page_notice() { ?>
	
		<div class="wrap">
		<?php screen_icon( 'themes' ); ?>
		<h2><?php _e('Theme Options','foghorn'); ?></h2>
        <p><b><?php _e('If you would like to use the Portfolio Press theme options, please install the <a href="https://github.com/devinsays/options-framework-plugin">Options Framework</a> plugin.','foghorn'); ?></b></p>
        <p><?php _e('Once the plugin is activated you will have option to:','foghorn'); ?></p>
        <ul class="ul-disc">
        <li><?php _e('Upload a logo image','foghorn'); ?></li>
        <li><?php _e('Display the site tagline','foghorn'); ?></li>
        <li><?php _e('Change sidebar the position, or remove sidebars entirely','foghorn'); ?></li>
        <li><?php _e('Update the footer text','foghorn'); ?></li>
        </ul>
        
        <p><?php _e('If you don\'t need these options, the plugin is not required and default settings will be used.','foghorn'); ?></p>
		</div>
	<?php
	}
}

?>