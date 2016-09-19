<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

require_once( trailingslashit(PARENT_DIR). 'CMB2/init.php' );


/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_init', 'page_products_meta' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function page_products_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_pts_page_options_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$pts_page_options = new_cmb2_box( array(
		'id'            => $prefix . 'pagelayout',
		'title'         => __( 'Page Layout', PTS_DOMAIN ),
		'object_types'  => array( 'page','product' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$pts_page_options->add_field( array(
		'name'       => __( 'Page Width', PTS_DOMAIN ),
		'desc'       => __( 'Defaults to page with sidebar', PTS_DOMAIN ),
		'id'         => $prefix . 'page_width',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'1' => __( 'Full Width', PTS_DOMAIN ),
			'2'   => __( 'With Sidebar', PTS_DOMAIN ),
		),
	) );

	$pts_page_options->add_field( array(
		'name'       => __( 'Transparent Header Type', PTS_DOMAIN ),
		'desc'       => __( 'Check for transparent header', PTS_DOMAIN ),
		'id'         => $prefix . 'override_header_type',
		'type'    => 'checkbox',
		'options' => array(
			'trans' => __( 'Transparent', PTS_DOMAIN )
		),
		'inline'  => true, // Toggles display to inline
	) );

	$pts_product_options = new_cmb2_box( array(
		'id'            => $prefix . 'prod_layout',
		'title'         => __( 'Product Options', PTS_DOMAIN ),
		'object_types'  => array('product' ), // Post type
	) );

	$pts_product_options->add_field( array(
		'name' => __( 'Demo Link', PTS_DOMAIN ),
		'desc' => __( 'Link to theme demo', PTS_DOMAIN ),
		'id'   => $prefix . 'product_demo_link',
		'type' => 'text_url',
		'protocols' => array('http', 'https'), // Array of allowed protocols
	) );

	$pts_product_options->add_field( array(
		'name'             => __( 'Slider or Banner', PTS_DOMAIN ),
		'desc'             => __( 'Display either slider or banner.', PTS_DOMAIN ),
		'id'               => $prefix . 'banner_slider',
		'type'             => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'banner' => __( 'Banner', PTS_DOMAIN ),
			'slider'   => __( 'Slider', PTS_DOMAIN )
		),
	) );

	$pts_product_options->add_field( array(
		'name' => __( 'Large Promotional Image', PTS_DOMAIN ),
		'desc' => __( 'This image is used in the product banner.', PTS_DOMAIN ),
		'id'   => $prefix . 'product_banner',
		'type' => 'file',
	) );

	$pts_product_options->add_field( array(
		'name' => __( 'Banner Shortcode', PTS_DOMAIN ),
		'desc' => __( 'When using slider, fill this with the slider shortcode', PTS_DOMAIN ),
		'id'   => $prefix . 'slider_shortcode',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$pts_product_options->add_field( array(
		'name' => __( 'Readme File', PTS_DOMAIN ),
		'desc' => __( 'A readme file', PTS_DOMAIN ),
		'id'   => $prefix . 'readme_file',
		'type' => 'file',
	) );

	/*$pts_page_options->add_field( array(
		'name' => __( 'Test Text Medium', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textmedium',
		'type' => 'text_medium',
		// 'repeatable' => true,
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Website URL', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Text Email', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Time', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'time',
		'type' => 'text_time',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Time zone', PTS_DOMAIN ),
		'desc' => __( 'Time zone', PTS_DOMAIN ),
		'id'   => $prefix . 'timezone',
		'type' => 'select_timezone',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Date Picker', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textdate',
		'type' => 'text_date',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Date Picker (UNIX timestamp)', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textdate_timestamp',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'datetime_timestamp',
		'type' => 'text_datetime_timestamp',
	) );

	// This text_datetime_timestamp_timezone field type
	// is only compatible with PHP versions 5.3 or above.
	// Feel free to uncomment and use if your server meets the requirement
	// $pts_page_options->add_field( array(
	// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', PTS_DOMAIN ),
	// 	'desc' => __( 'field description (optional)', PTS_DOMAIN ),
	// 	'id'   => $prefix . 'datetime_timestamp_timezone',
	// 	'type' => 'text_datetime_timestamp_timezone',
	// ) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Money', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textmoney',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$pts_page_options->add_field( array(
		'name'    => __( 'Test Color Picker', PTS_DOMAIN ),
		'desc'    => __( 'field description (optional)', PTS_DOMAIN ),
		'id'      => $prefix . 'colorpicker',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Text Area', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textarea',
		'type' => 'textarea',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Text Area Small', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textareasmall',
		'type' => 'textarea_small',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Text Area for Code', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'textarea_code',
		'type' => 'textarea_code',
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Title Weeeee', PTS_DOMAIN ),
		'desc' => __( 'This is a title description', PTS_DOMAIN ),
		'id'   => $prefix . 'title',
		'type' => 'title',
	) );

	$pts_page_options->add_field( array(
		'name'             => __( 'Test Select', PTS_DOMAIN ),
		'desc'             => __( 'field description (optional)', PTS_DOMAIN ),
		'id'               => $prefix . 'select',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'standard' => __( 'Option One', PTS_DOMAIN ),
			'custom'   => __( 'Option Two', PTS_DOMAIN ),
			'none'     => __( 'Option Three', PTS_DOMAIN ),
		),
	) );

	$pts_page_options->add_field( array(
		'name'             => __( 'Test Radio inline', PTS_DOMAIN ),
		'desc'             => __( 'field description (optional)', PTS_DOMAIN ),
		'id'               => $prefix . 'radio_inline',
		'type'             => 'radio_inline',
		'show_option_none' => 'No Selection',
		'options'          => array(
			'standard' => __( 'Option One', PTS_DOMAIN ),
			'custom'   => __( 'Option Two', PTS_DOMAIN ),
			'none'     => __( 'Option Three', PTS_DOMAIN ),
		),
	) );

	$pts_page_options->add_field( array(
		'name'    => __( 'Test Radio', PTS_DOMAIN ),
		'desc'    => __( 'field description (optional)', PTS_DOMAIN ),
		'id'      => $prefix . 'radio',
		'type'    => 'radio',
		'options' => array(
			'option1' => __( 'Option One', PTS_DOMAIN ),
			'option2' => __( 'Option Two', PTS_DOMAIN ),
			'option3' => __( 'Option Three', PTS_DOMAIN ),
		),
	) );

	$pts_page_options->add_field( array(
		'name'     => __( 'Test Taxonomy Radio', PTS_DOMAIN ),
		'desc'     => __( 'field description (optional)', PTS_DOMAIN ),
		'id'       => $prefix . 'text_taxonomy_radio',
		'type'     => 'taxonomy_radio',
		'taxonomy' => 'category', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

	$pts_page_options->add_field( array(
		'name'     => __( 'Test Taxonomy Select', PTS_DOMAIN ),
		'desc'     => __( 'field description (optional)', PTS_DOMAIN ),
		'id'       => $prefix . 'taxonomy_select',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'category', // Taxonomy Slug
	) );

	$pts_page_options->add_field( array(
		'name'     => __( 'Test Taxonomy Multi Checkbox', PTS_DOMAIN ),
		'desc'     => __( 'field description (optional)', PTS_DOMAIN ),
		'id'       => $prefix . 'multitaxonomy',
		'type'     => 'taxonomy_multicheck',
		'taxonomy' => 'post_tag', // Taxonomy Slug
		// 'inline'  => true, // Toggles display to inline
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Checkbox', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'checkbox',
		'type' => 'checkbox',
	) );

	$pts_page_options->add_field( array(
		'name'    => __( 'Test Multi Checkbox', PTS_DOMAIN ),
		'desc'    => __( 'field description (optional)', PTS_DOMAIN ),
		'id'      => $prefix . 'multicheckbox',
		'type'    => 'multicheck',
		// 'multiple' => true, // Store values in individual rows
		'options' => array(
			'check1' => __( 'Check One', PTS_DOMAIN ),
			'check2' => __( 'Check Two', PTS_DOMAIN ),
			'check3' => __( 'Check Three', PTS_DOMAIN ),
		),
		// 'inline'  => true, // Toggles display to inline
	) );

	$pts_page_options->add_field( array(
		'name'    => __( 'Test wysiwyg', PTS_DOMAIN ),
		'desc'    => __( 'field description (optional)', PTS_DOMAIN ),
		'id'      => $prefix . 'wysiwyg',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'Test Image', PTS_DOMAIN ),
		'desc' => __( 'Upload an image or enter a URL.', PTS_DOMAIN ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$pts_page_options->add_field( array(
		'name'         => __( 'Multiple Files', PTS_DOMAIN ),
		'desc'         => __( 'Upload or add multiple images/attachments.', PTS_DOMAIN ),
		'id'           => $prefix . 'file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$pts_page_options->add_field( array(
		'name' => __( 'oEmbed', PTS_DOMAIN ),
		'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', PTS_DOMAIN ),
		'id'   => $prefix . 'embed',
		'type' => 'oembed',
	) );

	$pts_page_options->add_field( array(
		'name'         => 'Testing Field Parameters',
		'id'           => $prefix . 'parameters',
		'type'         => 'text',
		'before_row'   => 'yourprefix_before_row_if_2', // callback
		'before'       => '<p>Testing <b>"before"</b> parameter</p>',
		'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
		'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
		'after'        => '<p>Testing <b>"after"</b> parameter</p>',
		'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
	) );*/

}

/**add_action( 'cmb2_init', 'yourprefix_register_about_page_metabox' );

 * Hook in and add a metabox that only appears on the 'About' page
 *
function yourprefix_register_about_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_about_';

	/**
	 * Metabox to be displayed on a single page ID
	 *
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'About Page Metabox', PTS_DOMAIN ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
	) );

	$cmb_about_page->add_field( array(
		'name' => __( 'Test Text', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'text',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 *
function yourprefix_register_repeatable_group_field_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_group_';

	/**
	 * Repeatable Field Groups
	 *
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Repeating Field Group', PTS_DOMAIN ),
		'object_types' => array( 'page', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'demo',
		'type'        => 'group',
		'description' => __( 'Generates reusable form entries', PTS_DOMAIN ),
		'options'     => array(
			'group_title'   => __( 'Entry {#}', PTS_DOMAIN ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', PTS_DOMAIN ),
			'remove_button' => __( 'Remove Entry', PTS_DOMAIN ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 *
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Entry Title', PTS_DOMAIN ),
		'id'         => 'title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', PTS_DOMAIN ),
		'description' => __( 'Write a short description for this entry', PTS_DOMAIN ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Entry Image', PTS_DOMAIN ),
		'id'   => 'image',
		'type' => 'file',
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image Caption', PTS_DOMAIN ),
		'id'   => 'image_caption',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 *
function yourprefix_register_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_yourprefix_user_';

	/**
	 * Metabox for the user profile screen
	 *
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Metabox', PTS_DOMAIN ),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Extra Info', PTS_DOMAIN ),
		'desc'     => __( 'field description (optional)', PTS_DOMAIN ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Avatar', PTS_DOMAIN ),
		'desc'    => __( 'field description (optional)', PTS_DOMAIN ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'User Field', PTS_DOMAIN ),
		'desc' => __( 'field description (optional)', PTS_DOMAIN ),
		'id'   => $prefix . 'user_text_field',
		'type' => 'text',
	) );

}

add_action( 'cmb2_init', 'yourprefix_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 *
function yourprefix_register_theme_options_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$option_key = '_yourprefix_theme_options';

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb2_metabox_form` helper function. See wiki for more info.
	 *
	$cmb_options = new_cmb2_box( array(
		'id'      => $option_key . 'page',
		'title'   => __( 'Theme Options Metabox', PTS_DOMAIN ),
		'hookup'  => false, // Do not need the normal user/post hookup
		'show_on' => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( $option_key )
		),
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this option group.
	 * Prefix is not needed.
	 *
	$cmb_options->add_field( array(
		'name'    => __( 'Site Background Color', PTS_DOMAIN ),
		'desc'    => __( 'field description (optional)', PTS_DOMAIN ),
		'id'      => 'bg_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );

}*/
