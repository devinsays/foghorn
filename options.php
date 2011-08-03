<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses 'foghorn'.  If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = 'foghorn';
	update_option('optionsframework', $optionsframework_settings);
	
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('template_url') . '/images/';
	
	// Options array	
	$options = array();
		
	$options[] = array( "name" => __('General Settings','foghorn'),
                    	"type" => "heading");
						
	$options[] = array( "name" => __('Custom Logo','foghorn'),
						"desc" => __('Upload a logo for your site.','foghorn'),
						"id" => "logo",
						"type" => "upload");
						
	$options[] = array( "name" => __('Display Site Tagline','foghorn'),
						"desc" => __('Display the site tagline under the site title.','foghorn'),
						"id" => "tagline",
						"std" => "0",
						"type" => "checkbox");
	
	$options[] = array( "name" => __('Menu Position','foghorn'),
						"desc" => __('Check to display the menu underneath the logo and floated left.  Good for long menus.','foghorn'),
						"id" => "menu_position",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Layout','foghorn'),
						"desc" => __('Select a site layout: sidebar right, sidebar left, or no sidebar.','foghorn'),
						"id" => "layout",
						"std" => "layout-2cr",
						"type" => "images",
						"options" => array(
						'layout-2cr' => $imagepath . '2cr.png',
						'layout-2cl' => $imagepath . '2cl.png',
						'layout-1c' => $imagepath . '1col.png',)
						);
						
	$options[] = array( "name" => __('Custom Footer Text','foghorn'),
						"desc" => __('Custom text for the footer of your theme.','foghorn'),
						"id" => "footer_text",
						"std" => __( 'Powered by ', 'foghorn' ) . '<a href="http://www.wordpress.org">WordPress</a> ' . __( 'and ', 'foghorn' ) . '<a href="https://github.com/devinsays/foghorn">' . __( 'Foghorn', 'foghorn' ) . '</a>',
						"type" => "textarea");
						
	return $options;
}