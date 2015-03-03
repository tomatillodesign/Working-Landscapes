<?php
/**
 * Handles both the activation and update functionality.
 *
 * @package Extender
 */

add_action( 'admin_init', 'genesis_extender_update' );
/**
 * Perform Genesis Extender updates based on current version number.
 *
 * @since 1.0
 */
function genesis_extender_update()
{
	// Don't do anything if we're on the latest version.
	if( version_compare( get_option( 'genesis_extender_version_number' ), GENEXT_VERSION, '>=' ) )
		return;

	// Update to Genesis Extender 1.0.1
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.0.1', '<' ) )
	{		
		$genesis_extender_settings = get_option( 'genesis_extender_settings' );
		$new_genesis_extender_settings = array(
			'include_column_class_styles' => 0,
			'minify_stylesheets' => 1
		);
		$genesis_extender_settings = wp_parse_args( $new_genesis_extender_settings, $genesis_extender_settings );
		update_option( 'genesis_extender_settings', $genesis_extender_settings );
		
		update_option( 'genesis_extender_version_number', '1.0.1' );
	}

	// Update to Genesis Extender 1.0.2
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.0.2', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.0.2' );
	}

	// Update to Genesis Extender 1.0.3
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.0.3', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.0.3' );
	}

	// Update to Genesis Extender 1.1
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.1', '<' ) )
	{		
		$genesis_extender_settings = get_option( 'genesis_extender_settings' );
		$new_genesis_extender_settings = array(
			'fancy_dropdowns_active' => 0,
			'html_five_active' => 0
		);
		$genesis_extender_settings = wp_parse_args( $new_genesis_extender_settings, $genesis_extender_settings );
		update_option( 'genesis_extender_settings', $genesis_extender_settings );
		
		update_option( 'genesis_extender_version_number', '1.1' );
	}

	// Update to Genesis Extender 1.2
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.2', '<' ) )
	{
		$genesis_extender_settings = get_option( 'genesis_extender_settings' );
		$new_genesis_extender_settings = array(
			'include_inpost_cpt_all' => 0
		);
		$genesis_extender_settings = wp_parse_args( $new_genesis_extender_settings, $genesis_extender_settings );
		update_option( 'genesis_extender_settings', $genesis_extender_settings );

		$do_shortcode_find = array( '[', ']' );
		$do_shortcode_replace = array( '&lt;?php echo do_shortcode( \'[', ']\' ); ?&gt;' );
		$updated_genesis_extender_hook_boxes = array();
		$genesis_extender_hook_boxes = get_option( 'genesis_extender_custom_hook_boxes' );
		foreach( $genesis_extender_hook_boxes as $key => $value )
		{
			$value['hook_textarea'] = str_replace( $do_shortcode_find, $do_shortcode_replace, $value['hook_textarea'] );
			$updated_genesis_extender_hook_boxes[$key] = $value;
		}
		update_option( 'genesis_extender_custom_hook_boxes', $updated_genesis_extender_hook_boxes );
		
		update_option( 'genesis_extender_version_number', '1.2' );
	}

	// Update to Genesis Extender 1.2.1
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.2.1', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.2.1' );
	}

	// Update to Genesis Extender 1.2.2
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.2.2', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.2.2' );
	}

	// Update to Genesis Extender 1.2.3
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.2.3', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.2.3' );
	}

	// Update to Genesis Extender 1.2.4
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.2.4', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.2.4' );
	}

	// Update to Genesis Extender 1.3
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.3', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.3' );
	}

	// Update to Genesis Extender 1.3.1
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.3.1', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.3.1' );
	}

	// Update to Genesis Extender 1.4
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.4', '<' ) )
	{
		$genesis_extender_settings = get_option( 'genesis_extender_settings' );
		$new_genesis_extender_settings = array(
			'static_homepage_entry_class' => 0
		);
		$genesis_extender_settings = wp_parse_args( $new_genesis_extender_settings, $genesis_extender_settings );
		update_option( 'genesis_extender_settings', $genesis_extender_settings );

		update_option( 'genesis_extender_version_number', '1.4' );
	}

	// Update to Genesis Extender 1.4.1
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.4.1', '<' ) )
	{
		$genesis_extender_settings = get_option( 'genesis_extender_settings' );
		$new_genesis_extender_settings = array(
			'protocol_relative_urls' => 1,
			'codemirror_active' => 1
		);
		$genesis_extender_settings = wp_parse_args( $new_genesis_extender_settings, $genesis_extender_settings );
		update_option( 'genesis_extender_settings', $genesis_extender_settings );

		update_option( 'genesis_extender_version_number', '1.4.1' );
	}

	// Update to Genesis Extender 1.4.2
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.4.2', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.4.2' );
	}

	// Update to Genesis Extender 1.5
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.5', '<' ) )
	{
		$genesis_extender_settings = get_option( 'genesis_extender_settings' );
		$new_genesis_extender_settings = array(
			'add_google_fonts' => '',
			'font_awesome_css' => 0
		);
		$genesis_extender_settings = wp_parse_args( $new_genesis_extender_settings, $genesis_extender_settings );
		update_option( 'genesis_extender_settings', $genesis_extender_settings );

		update_option( 'genesis_extender_version_number', '1.5' );
	}

	// Update to Genesis Extender 1.5.1
	if( version_compare( get_option( 'genesis_extender_version_number' ), '1.5.1', '<' ) )
	{	
		update_option( 'genesis_extender_version_number', '1.5.1' );
	}
	
	// Finish the update sequence.
	genesis_extender_activate();
}

/**
 * Perform Genesis Extender activation actions.
 *
 * @since 1.0
 */
function genesis_extender_activate()
{	
	if( !get_option( 'genesis_extender_version_number' ) )
	{
		update_option( 'genesis_extender_version_number', '1.5.1' );
	}
	
	if( !get_option( 'genesis_extender_settings' ) )
	{
		update_option( 'genesis_extender_settings', genesis_extender_settings_defaults() );
	}
	if( !get_option( 'genesis_extender_custom_css' ) )
	{
		update_option( 'genesis_extender_custom_css', genesis_extender_custom_css_options_defaults() );
	}
	if( !get_option( 'genesis_extender_custom_functions' ) )
	{
		update_option( 'genesis_extender_custom_functions', genesis_extender_custom_functions_options_defaults() );
	}
	if( !get_option( 'genesis_extender_custom_js' ) )
	{
		update_option( 'genesis_extender_custom_js', genesis_extender_custom_js_options_defaults() );
	}
	if( !get_option( 'genesis_extender_custom_templates' ) )
	{
		update_option( 'genesis_extender_custom_templates', array() );
	}
	if( !get_option( 'genesis_extender_custom_labels' ) )
	{
		update_option( 'genesis_extender_custom_labels', array() );
	}
	if( !get_option( 'genesis_extender_custom_conditionals' ) )
	{
		update_option( 'genesis_extender_custom_conditionals', array() );
	}
	if( !get_option( 'genesis_extender_custom_widget_areas' ) )
	{
		update_option( 'genesis_extender_custom_widget_areas', array() );
	}
	if( !get_option( 'genesis_extender_custom_hook_boxes' ) )
	{
		update_option( 'genesis_extender_custom_hook_boxes', array() );
	}
	genesis_extender_dir_check( get_stylesheet_directory() . '/my-templates' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path', $root = true ) );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path', $root = true ) . 'plugin' );

	// Delete current /default-images/ directory if it exists to ensure folder is fully updated with all current images.
	genesis_extender_delete_dir( genesis_extender_get_stylesheet_location( 'path' ) . 'default-images' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'default-images' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'default-images/post-formats' );

	$handle = opendir( GENEXT_PATH . 'images' );
	while( false !== ( $file = readdir( $handle ) ) && is_dir( genesis_extender_get_stylesheet_location( 'path' ) . 'default-images' ) )
	{
		$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
		if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
		{
			copy( GENEXT_PATH . 'images/' . $file, genesis_extender_get_stylesheet_location( 'path' ) . 'default-images/' . $file );
		}
	}
	closedir( $handle );
	
	$handle = opendir( GENEXT_PATH . 'images/post-formats' );
	while( false !== ( $file = readdir( $handle ) ) && is_dir( genesis_extender_get_stylesheet_location( 'path' ) . 'default-images/post-formats' ) )
	{
		$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
		if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
		{
			copy( GENEXT_PATH . 'images/post-formats/' . $file, genesis_extender_get_stylesheet_location( 'path' ) . 'default-images/post-formats/' . $file );
		}
	}
	closedir( $handle );

	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'images' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'images/adminthumbnails' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'tmp' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'tmp/images' );
	genesis_extender_dir_check( genesis_extender_get_stylesheet_location( 'path' ) . 'tmp/images/adminthumbnails' );

	genesis_extender_write_files();
	genesis_extender_create_custom_functions_file();

	$genesis_extender_folders = array( genesis_extender_get_stylesheet_location( 'path' ), genesis_extender_get_stylesheet_location( 'path' ) . 'images', genesis_extender_get_stylesheet_location( 'path' ) . 'adminthumbnails', genesis_extender_get_stylesheet_location( 'path' ) . 'tmp', genesis_extender_get_stylesheet_location( 'path' ) . 'tmp/images', genesis_extender_get_stylesheet_location( 'path' ) . 'tmp/images/adminthumbnails' );
	$genesis_extender_unwritable = false;
	foreach( $genesis_extender_folders as $genesis_extender_folder )
	{
		if( is_dir( $genesis_extender_folder ) && !genesis_extender_writable( $genesis_extender_folder ) )
		{
			$genesis_extender_unwritable = true;
		}
	}
	if( $genesis_extender_unwritable )
	{
		wp_redirect( admin_url( 'admin.php?page=genesis-extender-settings&notice=genesis-extender-unwritable' ) );
	}
}
