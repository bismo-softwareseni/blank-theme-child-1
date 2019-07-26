<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {
	$options = array();

	//-- heading tab for basic setting
	$options[] = array(
		'name' => __( 'Basic Settings', 'ssblanktheme_child_1' ),
		'type' => 'heading'
	);

	//-- upload logo
	$options[] = array(
		'name' => __( 'Logo', 'ssblanktheme_child_1' ),
		'desc' => __( 'Please select a logo for your site', 'ssblanktheme_child_1' ),
		'id' => 'ss_blank_logo',
		'type' => 'upload'
	);

	//-- footer copyright
	$options[] = array(
		'name' => __('Footer Copyright', 'ssblanktheme_child_1'),
		'desc' => __('Please input a copyright text.', 'ssblanktheme_child_1'),
		'id' => 'ss_blank_copyright',
		'std' => 'Created by SoftwareSeni 2019. All Rights Reserved.',
		'type' => 'text'
	);

	//-- blog description
	$options[] = array(
		'name' => __('Blog Description', 'ssblanktheme_child_1'),
		'desc' => __('Your blog description will appear in the footer', 'ssblanktheme_child_1'),
		'id' => 'ss_blank_blog_desc',
		'std' => 'Lorem ipsum dolor sit amet',
		'type' => 'textarea'
	);

	return $options;
}
