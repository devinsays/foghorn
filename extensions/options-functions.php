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

	function foghorn_options_default() {
		$foghorn_notice_page = add_theme_page(__('Theme Options','foghorn'), __('Theme Options','foghorn'), 'edit_theme_options', 'options-framework','optionsframework_page_notice');
		add_action("admin_print_styles-$foghorn_notice_page",'foghorn_notice_styles');
		add_action("admin_print_scripts-$foghorn_notice_page",'foghorn_notice_scripts');
		}
	add_action('admin_menu', 'foghorn_options_default');
	
	
	// Enqueue thickbox for easy installation of plugin
	
	function foghorn_notice_scripts() {
		wp_enqueue_script( 'thickbox' );
	}

	function foghorn_notice_styles() {
		wp_enqueue_style( 'thickbox' );
	}
}

/**
 * Displays a notice on the theme options page if the Options Framework plugin is not installed
 */

if ( !function_exists( 'optionsframework_page_notice' ) ) {
	function optionsframework_page_notice() { ?>
	
		<div class="wrap">
		<?php screen_icon( 'themes' ); ?>
		<h2><?php _e('Theme Options','foghorn'); ?></h2>
        <p><b><?php _e('To enable Foghorn theme options, please install and activate the', 'foghorn'); ?>
        <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick"><?php _e('Options Framework', 'foghorn'); ?></a> <?php _e('plugin', 'foghorn'); ?>.</b></p>
        <p><?php _e('This theme has options for:','foghorn'); ?></p>
        <ul class="ul-disc">
        <li><?php _e('Uploading a logo image','foghorn'); ?></li>
        <li><?php _e('Displaying the site tagline','foghorn'); ?></li>
        <li><?php _e('Changing sidebar positions, or removing sidebars entirely','foghorn'); ?></li>
        <li><?php _e('Updating the footer text','foghorn'); ?></li>
        </ul>
        
        <p><i><?php _e('If you don\'t need these options, the plugin is not required and default settings will be used.','foghorn'); ?></i></p>
        
        <p class="submit"><a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick button-secondary"><?php _e('Install Now', 'foghorn'); ?></a></p>
        
		</div>
	<?php
	}
}

/**
 * Adds a body class to indicate sidebar position
 */
 
function foghorn_body_class($classes) {
	$layout = of_get_option('layout','layout-2cr');
	$classes[] = $layout;
	return $classes;
}

add_filter('body_class','foghorn_body_class');

/**
 * Menu Position Option
 */

function foghorn_head_css() {
				
		$output = '';
		
		if ( of_get_option('menu_position') ) {
			$output .= "#access {clear:both; float:left;}\n";
			$output .= "#access li {margin-left:0; margin-right:2.8em;}\n";
		}
		
		if ( of_get_option('tagline') ) {
			$output .= "#access {margin-top:25px;}\n";
		}
		
		// Output styles
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
}

add_action('wp_head', 'foghorn_head_css');

?>