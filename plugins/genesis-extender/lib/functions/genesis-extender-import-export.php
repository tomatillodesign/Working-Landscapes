<?php
/**
 * Handels all the Import/Export functionality in Genesis Extender
 * and the Genesis Extender Child Theme.
 *
 * @package Extender
 */

/**
 * Create a string that represnts the current date and time.
 *
 * @since 1.0
 * @return string that represnts the current date and time.
 */
function genesis_extender_time()
{
	$time = gmdate( 'Y-m-d H:i:s', ( time() + ( get_option( 'gmt_offset' ) * 3600 ) ) );
	return strtotime( $time );
}

/**
 * Export the specified Custom Option settings.
 *
 * @since 1.0
 */
function genesis_extender_custom_export( $export_name = false, $theme_settings = '', $custom_css = '', $custom_functions = '', $custom_js = '', $custom_templates = '', $custom_labels = '', $conditionals = '', $widget_areas = '', $hook_boxes = '', $images = '' )
{
	$export_data = array();
	
	if( !empty( $theme_settings ) )
	{
		$export_data['genesis_extender_settings'] = get_option( 'genesis_extender_settings' );
	}
	
	if( !empty( $custom_css ) )
	{
		$export_data['genesis_extender_custom_css'] = get_option( 'genesis_extender_custom_css' );
	}
	
	if( !empty( $custom_functions ) )
	{
		$export_data['genesis_extender_custom_functions'] = get_option( 'genesis_extender_custom_functions' );
	}

	if( !empty( $custom_js ) )
	{
		$export_data['genesis_extender_custom_js'] = get_option( 'genesis_extender_custom_js' );
	}

	if( !empty( $custom_templates ) )
 	{
		$export_data['genesis_extender_templates'] = get_option( 'genesis_extender_custom_templates' );
	}

	if( !empty( $custom_labels ) )
 	{
		$export_data['genesis_extender_labels'] = get_option( 'genesis_extender_custom_labels' );
	}
	
	if( !empty( $conditionals ) )
	{
		$export_data['genesis_extender_conditionals'] = get_option( 'genesis_extender_custom_conditionals' );
	}
	
	if( !empty( $widget_areas ) )
	{
		$export_data['genesis_extender_widgets'] = get_option( 'genesis_extender_custom_widget_areas' );
	}
	
	if( !empty( $hook_boxes ) )
	{
		$export_data['genesis_extender_hooks'] = get_option( 'genesis_extender_custom_hook_boxes' );
	}

	$genesis_extender_datestamp = date( 'YmdHis', genesis_extender_time() );

	if( $export_name )
	{
		$genesis_extender_export_dat = $export_name . '.dat';
	}
	else
	{
		$genesis_extender_export_dat = 'genesis_extender_custom_' . $genesis_extender_datestamp . '.dat';
	}

	$cheerios = serialize( $export_data );

	if( !empty( $images ) )
	{
		genesis_extender_folders_open_permissions();
		require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );
		if( $export_name )
		{
			$genesis_extender_export_zip = $export_name . '.zip';
		}
		else
		{
			$genesis_extender_export_zip = 'genesis_extender_custom_' . $genesis_extender_datestamp . '.zip';
		}
		$tmp_path = genesis_extender_get_stylesheet_location( 'path' ) . 'tmp';
		$dat_filename = $tmp_path . '/' . $genesis_extender_export_dat;
		$tmp_image_folder = $tmp_path . '/images';
		$tmp_adthumbs_folder = $tmp_image_folder . '/adminthumbnails';
		$image_folder = genesis_extender_get_stylesheet_location( 'path' ) . 'images';
		$adthumbs_folder = $image_folder . '/adminthumbnails';
		
		if( !is_dir( $tmp_path ) )
		{
			@mkdir( $tmp_path, 0755, true );
		}
		if( !is_dir( $tmp_image_folder ) )
		{
			@mkdir( $tmp_image_folder, 0755, true );
		}
		if( !is_dir( $tmp_adthumbs_folder ) )
		{
			@mkdir( $tmp_adthumbs_folder, 0755, true );
		}
		
		$dat_file = fopen( $dat_filename, 'x' );
		fwrite( $dat_file, $cheerios );
		fclose ( $dat_file );
		
		$handle = opendir( $image_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $image_folder . '/' . $file, $tmp_image_folder . '/' . $file );
			}
		}
		closedir( $handle );
		
		$handle = opendir( $adthumbs_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $adthumbs_folder . '/' . $file, $tmp_adthumbs_folder . '/' . $file );
			}
		}
		closedir( $handle );
	
		if( is_dir( $tmp_image_folder ) )
		{
			$export_files = array( $dat_filename, $tmp_image_folder );
		}
		else
		{
			$export_files = $dat_filename;
		}
		
		$genesis_extender_pclzip = new PclZip( $tmp_path . '/' . $genesis_extender_export_zip );
		$genesis_extender_zipped = $genesis_extender_pclzip->create( $export_files, PCLZIP_OPT_REMOVE_PATH, $tmp_path );
		if( $genesis_extender_zipped == 0 )
		{
			die( "Error : " . $genesis_extender_pclzip->errorInfo( true ) );
		}
		
		if( ob_get_level() )
		{
			ob_end_clean();
		}
		header( "Cache-Control: public, must-revalidate" );
		header( "Pragma: hack" );
		header( "Content-Type: application/zip" );
		header( "Content-Disposition: attachment; filename=$genesis_extender_export_zip" );
		readfile( $tmp_path . '/' . $genesis_extender_export_zip );
		unlink( $tmp_path . '/' . $genesis_extender_export_dat );
		unlink( $tmp_path . '/' . $genesis_extender_export_zip );
		genesis_extender_delete_images( $tmp_image_folder );
		genesis_extender_delete_images( $tmp_adthumbs_folder );
		genesis_extender_folders_close_permissions();
		exit();
	}
	else
	{
		header( "Content-type: text/plain" );
		header( "Content-disposition: attachment; filename=$genesis_extender_export_dat" );
		header( "Content-Transfer-Encoding: binary" );
		header( "Pragma: no-cache" );
		header( "Expires: 0" );
		echo $cheerios; 
		exit();
	}
}

/**
 * Import the specified Custom Option settings into
 * their appropriate sections of the wp_options table.
 *
 * @since 1.0
 */
function genesis_extender_custom_import( $import_file, $theme_settings = '', $custom_css = '', $custom_functions = '', $custom_js = '', $custom_templates = '', $custom_labels = '', $conditionals = '', $widget_areas = '', $hook_boxes = '', $images = '' )
{
	$genesis_extender_templates = get_option( 'genesis_extender_custom_templates' );
	$genesis_extender_labels = get_option( 'genesis_extender_custom_labels' );
	$genesis_extender_conditionals = get_option( 'genesis_extender_custom_conditionals' );
	$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
	$genesis_extender_hooks = get_option( 'genesis_extender_custom_hook_boxes' );
	
	if( 'zip' == strtolower( substr( strrchr( $import_file['name'], '.' ), 1 ) ) )
	{
		genesis_extender_folders_open_permissions();
		require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );

		$tmp_path = genesis_extender_get_stylesheet_location( 'path' ) . 'tmp';
		$tmp_import_folder = $tmp_path . '/import';
		$tmp_image_folder = $tmp_import_folder . '/images';
		$tmp_adthumbs_folder = $tmp_image_folder . '/adminthumbnails';
		$image_folder = genesis_extender_get_stylesheet_location( 'path' ) . 'images';
		$adthumbs_folder = $image_folder . '/adminthumbnails';
		
		if( !is_dir( $tmp_path ) )
		{
			@mkdir( $tmp_path, 0755, true );
		}
		if( !is_dir( $tmp_import_folder ) )
		{
			@mkdir( $tmp_import_folder, 0755, true );
		}
		
		$import_tmp_name = $import_file['tmp_name'];
		$zip_file = new PclZip( $import_tmp_name );
		
		if( ( $unzip_result_list = $zip_file->extract( PCLZIP_OPT_PATH, $tmp_import_folder ) ) == 0 )
		{
			die("Error : " . $zip_file->errorInfo( true ) );
		}		
		
		$handle = opendir( $tmp_import_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'dat' )
			{				
				$import_data = file_get_contents( $tmp_import_folder . '/' . $file );
				$genesis_extender_import = unserialize( $import_data );
				
				if( !empty( $theme_settings ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_settings'] ) )
					{
						$plugin_settings_import = array_merge( genesis_extender_settings_defaults( false, $genesis_extender_import['genesis_extender_settings'] ), $genesis_extender_import['genesis_extender_settings'] );
						update_option( 'genesis_extender_settings', $plugin_settings_import );
					}
				}
				
				if( !empty( $custom_css ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_custom_css'] ) )
					{
						$custom_css_import = array_merge( genesis_extender_custom_css_options_defaults(), $genesis_extender_import['genesis_extender_custom_css'] );
						update_option( 'genesis_extender_custom_css', $custom_css_import );
					}
				}
				
				if( !empty( $custom_functions ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_custom_functions'] ) )
					{
						$custom_functions_import = array_merge( genesis_extender_custom_functions_options_defaults(), $genesis_extender_import['genesis_extender_custom_functions'] );
						update_option( 'genesis_extender_custom_functions', $custom_functions_import );
					}
				}

				if( !empty( $custom_js ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_custom_js'] ) )
					{
						$custom_js_import = array_merge( genesis_extender_custom_js_options_defaults(), $genesis_extender_import['genesis_extender_custom_js'] );
						update_option( 'genesis_extender_custom_js', $custom_js_import );
					}
				}

				if( !empty( $custom_templates ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_templates'] ) )
					{
						$genesis_extender_templates_array = array();
						foreach( $genesis_extender_templates as $key => $value )
						{
							if( !in_array( $genesis_extender_templates[$key]['template_file_name'], $genesis_extender_templates_array ) )
							{
								$genesis_extender_templates_array[] = $genesis_extender_templates[$key]['template_file_name'];
							}
						}
						foreach( $genesis_extender_import['genesis_extender_templates'] as $key => $value )
						{	
							if( in_array( $genesis_extender_import['genesis_extender_templates'][$key]['template_file_name'], $genesis_extender_templates_array ) )
							{
								unset( $genesis_extender_import['genesis_extender_templates'][$key] );
							}
						}
						$templates_import = array_merge( $genesis_extender_templates, $genesis_extender_import['genesis_extender_templates'] );
						update_option( 'genesis_extender_custom_templates', $templates_import );
					}
				}

				if( !empty( $custom_labels ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_labels'] ) )
					{
						$genesis_extender_labels_array = array();
						foreach( $genesis_extender_labels as $key => $value )
						{
							if( !in_array( $genesis_extender_labels[$key]['label_name'], $genesis_extender_labels_array ) )
							{
								$genesis_extender_labels_array[] = $genesis_extender_labels[$key]['label_name'];
							}
						}
						foreach( $genesis_extender_import['genesis_extender_labels'] as $key => $value )
						{	
							if( in_array( $genesis_extender_import['genesis_extender_labels'][$key]['label_name'], $genesis_extender_labels_array ) )
							{
								unset( $genesis_extender_import['genesis_extender_labels'][$key] );
							}
						}
						$labels_import = array_merge( $genesis_extender_labels, $genesis_extender_import['genesis_extender_labels'] );
						update_option( 'genesis_extender_custom_labels', $labels_import );
					}
				}
				
				if( !empty( $conditionals ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_conditionals'] ) )
					{
						$genesis_extender_conditionals_array = array();
						foreach( $genesis_extender_conditionals as $key => $value )
						{
							$genesis_extender_conditionals_array[] = $genesis_extender_conditionals[$key]['conditional_id'];
						}
						foreach( $genesis_extender_import['genesis_extender_conditionals'] as $key => $value )
						{	
							if( in_array( $genesis_extender_import['genesis_extender_conditionals'][$key]['conditional_id'], $genesis_extender_conditionals_array ) )
							{
								unset( $genesis_extender_import['genesis_extender_conditionals'][$key] );
							}
						}
						$conditionals_import = array_merge( $genesis_extender_conditionals, $genesis_extender_import['genesis_extender_conditionals'] );
						update_option( 'genesis_extender_custom_conditionals', $conditionals_import );
					}
				}
				
				if( !empty( $widget_areas ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_widgets'] ) )
					{
						$genesis_extender_widgets_array = array();
						foreach( $genesis_extender_widgets as $key => $value )
						{
							if( !in_array( $genesis_extender_widgets[$key]['widget_name'], $genesis_extender_widgets_array ) )
							{
								$genesis_extender_widgets_array[] = $genesis_extender_widgets[$key]['widget_name'];
							}
						}
						foreach( $genesis_extender_import['genesis_extender_widgets'] as $key => $value )
						{	
							if( in_array( $genesis_extender_import['genesis_extender_widgets'][$key]['widget_name'], $genesis_extender_widgets_array ) )
							{
								unset( $genesis_extender_import['genesis_extender_widgets'][$key] );
							}
						}
						$widgets_import = array_merge( $genesis_extender_widgets, $genesis_extender_import['genesis_extender_widgets'] );
						update_option( 'genesis_extender_custom_widget_areas', $widgets_import );
					}
				}
				
				if( !empty( $hook_boxes ) )
				{
					if( !empty( $genesis_extender_import['genesis_extender_hooks'] ) )
					{
						$genesis_extender_hooks_array = array();
						foreach( $genesis_extender_hooks as $key => $value )
						{
							if( !in_array( $genesis_extender_hooks[$key]['hook_name'], $genesis_extender_hooks_array ) )
							{
								$genesis_extender_hooks_array[] = $genesis_extender_hooks[$key]['hook_name'];
							}
						}
						foreach( $genesis_extender_import['genesis_extender_hooks'] as $key => $value )
						{	
							if( in_array( $genesis_extender_import['genesis_extender_hooks'][$key]['hook_name'], $genesis_extender_hooks_array ) )
							{
								unset( $genesis_extender_import['genesis_extender_hooks'][$key] );
							}
						}
						$hooks_import = array_merge( $genesis_extender_hooks, $genesis_extender_import['genesis_extender_hooks'] );
						update_option( 'genesis_extender_custom_hook_boxes', $hooks_import );
					}
				}
			}
		}
		closedir( $handle );
		
		if( !empty( $images ) )
		{
			$handle = opendir( $tmp_image_folder );
			while( false !== ( $file = readdir( $handle ) ) )
			{
				$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
				if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
				{
					copy( $tmp_image_folder . '/' . $file, $image_folder . '/' . $file );
				}
			}
			closedir( $handle );
			
			$handle = opendir( $tmp_adthumbs_folder );
			while( false !== ( $file = readdir( $handle ) ) )
			{
				$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
				if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
				{
					copy( $tmp_adthumbs_folder . '/' . $file, $adthumbs_folder . '/' . $file );
				}
			}
			closedir( $handle );
		}
		
		genesis_extender_delete_dir( $tmp_import_folder );
		genesis_extender_folders_close_permissions();
		
		genesis_extender_get_settings( null, $args = array( 'cached' => false, 'array' => false ) );
		genesis_extender_write_files();
		wp_redirect( admin_url( 'admin.php?page=genesis-extender-settings&activetab=genesis-extender-settings-nav-import-export&notice=import-complete' ) );
		exit();
	}
	elseif( 'dat' == strtolower( substr( strrchr( $import_file['name'], '.' ), 1 ) ) )
	{
		$import_data = file_get_contents( $import_file['tmp_name'] );
		$genesis_extender_import = unserialize( $import_data );
		
		if( !empty( $theme_settings ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_settings'] ) )
			{
				$plugin_settings_import = array_merge( genesis_extender_settings_defaults( false, $genesis_extender_import['genesis_extender_settings'] ), $genesis_extender_import['genesis_extender_settings'] );
				update_option( 'genesis_extender_settings', $plugin_settings_import );
			}
		}
		
		if( !empty( $custom_css ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_custom_css'] ) )
			{
				$custom_css_import = array_merge( genesis_extender_custom_css_options_defaults(), $genesis_extender_import['genesis_extender_custom_css'] );
				update_option( 'genesis_extender_custom_css', $custom_css_import );
			}
		}
		
		if( !empty( $custom_functions ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_custom_functions'] ) )
			{
				$custom_functions_import = array_merge( genesis_extender_custom_functions_options_defaults(), $genesis_extender_import['genesis_extender_custom_functions'] );
				update_option( 'genesis_extender_custom_functions', $custom_functions_import );
			}
		}

		if( !empty( $custom_js ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_custom_js'] ) )
			{
				$custom_js_import = array_merge( genesis_extender_custom_js_options_defaults(), $genesis_extender_import['genesis_extender_custom_js'] );
				update_option( 'genesis_extender_custom_js', $custom_functions_import );
			}
		}

		if( !empty( $custom_templates ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_templates'] ) )
			{
				$genesis_extender_templates_array = array();
				foreach( $genesis_extender_templates as $key => $value )
				{
					if( !in_array( $genesis_extender_templates[$key]['template_file_name'], $genesis_extender_templates_array ) )
					{
						$genesis_extender_templates_array[] = $genesis_extender_templates[$key]['template_file_name'];
					}
				}
				foreach( $genesis_extender_import['genesis_extender_templates'] as $key => $value )
				{	
					if( in_array( $genesis_extender_import['genesis_extender_templates'][$key]['template_file_name'], $genesis_extender_templates_array ) )
					{
						unset( $genesis_extender_import['genesis_extender_templates'][$key] );
					}
				}
				$templates_import = array_merge( $genesis_extender_templates, $genesis_extender_import['genesis_extender_templates'] );
				update_option( 'genesis_extender_custom_templates', $templates_import );
			}
		}

		if( !empty( $custom_labels ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_labels'] ) )
			{
				$genesis_extender_labels_array = array();
				foreach( $genesis_extender_labels as $key => $value )
				{
					if( !in_array( $genesis_extender_labels[$key]['label_name'], $genesis_extender_labels_array ) )
					{
						$genesis_extender_labels_array[] = $genesis_extender_labels[$key]['label_name'];
					}
				}
				foreach( $genesis_extender_import['genesis_extender_labels'] as $key => $value )
				{	
					if( in_array( $genesis_extender_import['genesis_extender_labels'][$key]['label_name'], $genesis_extender_labels_array ) )
					{
						unset( $genesis_extender_import['genesis_extender_labels'][$key] );
					}
				}
				$labels_import = array_merge( $genesis_extender_labels, $genesis_extender_import['genesis_extender_labels'] );
				update_option( 'genesis_extender_custom_labels', $labels_import );
			}
		}
		
		if( !empty( $conditionals ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_conditionals'] ) )
			{
				$genesis_extender_conditionals_array = array();
				foreach( $genesis_extender_conditionals as $key => $value )
				{
					$genesis_extender_conditionals_array[] = $genesis_extender_conditionals[$key]['conditional_id'];
				}
				foreach( $genesis_extender_import['genesis_extender_conditionals'] as $key => $value )
				{	
					if( in_array( $genesis_extender_import['genesis_extender_conditionals'][$key]['conditional_id'], $genesis_extender_conditionals_array ) )
					{
						unset( $genesis_extender_import['genesis_extender_conditionals'][$key] );
					}
				}
				$conditionals_import = array_merge( $genesis_extender_conditionals, $genesis_extender_import['genesis_extender_conditionals'] );
				update_option( 'genesis_extender_custom_conditionals', $conditionals_import );
			}
		}
		
		if( !empty( $widget_areas ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_widgets'] ) )
			{
				$genesis_extender_widgets_array = array();
				foreach( $genesis_extender_widgets as $key => $value )
				{
					if( !in_array( $genesis_extender_widgets[$key]['widget_name'], $genesis_extender_widgets_array ) )
					{
						$genesis_extender_widgets_array[] = $genesis_extender_widgets[$key]['widget_name'];
					}
				}
				foreach( $genesis_extender_import['genesis_extender_widgets'] as $key => $value )
				{	
					if( in_array( $genesis_extender_import['genesis_extender_widgets'][$key]['widget_name'], $genesis_extender_widgets_array ) )
					{
						unset( $genesis_extender_import['genesis_extender_widgets'][$key] );
					}
				}
				$widgets_import = array_merge( $genesis_extender_widgets, $genesis_extender_import['genesis_extender_widgets'] );
				update_option( 'genesis_extender_custom_widget_areas', $widgets_import );
			}
		}
		
		if( !empty( $hook_boxes ) )
		{
			if( !empty( $genesis_extender_import['genesis_extender_hooks'] ) )
			{
				$genesis_extender_hooks_array = array();
				foreach( $genesis_extender_hooks as $key => $value )
				{
					if( !in_array( $genesis_extender_hooks[$key]['hook_name'], $genesis_extender_hooks_array ) )
					{
						$genesis_extender_hooks_array[] = $genesis_extender_hooks[$key]['hook_name'];
					}
				}
				foreach( $genesis_extender_import['genesis_extender_hooks'] as $key => $value )
				{	
					if( in_array( $genesis_extender_import['genesis_extender_hooks'][$key]['hook_name'], $genesis_extender_hooks_array ) )
					{
						unset( $genesis_extender_import['genesis_extender_hooks'][$key] );
					}
				}
				$hooks_import = array_merge( $genesis_extender_hooks, $genesis_extender_import['genesis_extender_hooks'] );
				update_option( 'genesis_extender_custom_hook_boxes', $hooks_import );
			}
		}
		
		genesis_extender_write_files();
		wp_redirect( admin_url( 'admin.php?page=genesis-extender-settings&activetab=genesis-extender-settings-nav-import-export&notice=import-complete' ) );
		exit();
	}	
	else
	{
		wp_redirect( admin_url( 'admin.php?page=genesis-extender-settings&activetab=genesis-extender-settings-nav-import-export&notice=import-error' ) );
		exit();
	}
}

add_action( 'admin_init', 'genesis_extender_import_export_check' );
/**
 * Check for Import/Export $_POST actions and react appropriately.
 *
 * @since 1.0
 */
function genesis_extender_import_export_check()
{
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'genesis_extender_custom_export' )
	{
		$export_name = $_POST['genesis_extender_export_name'] != '' ? $_POST['genesis_extender_export_name'] : false;
		$theme_settings = isset( $_POST['export_settings'] ) ? $_POST['export_settings'] : '';
		$custom_css = isset( $_POST['export_css'] ) ? $_POST['export_css'] : '';
		$custom_functions = isset( $_POST['export_functions'] ) ? $_POST['export_functions'] : '';
		$custom_js = isset( $_POST['export_js'] ) ? $_POST['export_js'] : '';
		$custom_templates = isset( $_POST['export_templates'] ) ? $_POST['export_templates'] : '';
		$custom_labels = isset( $_POST['export_labels'] ) ? $_POST['export_labels'] : '';
		$conditionals = isset( $_POST['export_conditionals'] ) ? $_POST['export_conditionals'] : '';
		$widget_areas = isset( $_POST['export_widgets'] ) ? $_POST['export_widgets'] : '';
		$hook_boxes = isset( $_POST['export_hooks'] ) ? $_POST['export_hooks'] : '';
		$images = isset( $_POST['export_images'] ) ? $_POST['export_images'] : '';

		genesis_extender_custom_export( $export_name, $theme_settings, $custom_css, $custom_functions, $custom_js, $custom_templates, $custom_labels, $conditionals, $widget_areas, $hook_boxes, $images );
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'genesis_extender_custom_import' )
	{
		$theme_settings = isset( $_POST['import_settings'] ) ? $_POST['import_settings'] : '';
		$custom_css = isset( $_POST['import_css'] ) ? $_POST['import_css'] : '';
		$custom_functions = isset( $_POST['import_functions'] ) ? $_POST['import_functions'] : '';
		$custom_js = isset( $_POST['import_js'] ) ? $_POST['import_js'] : '';
		$custom_templates = isset( $_POST['import_templates'] ) ? $_POST['import_templates'] : '';
		$custom_labels = isset( $_POST['import_labels'] ) ? $_POST['import_labels'] : '';
		$conditionals = isset( $_POST['import_conditionals'] ) ? $_POST['import_conditionals'] : '';
		$widget_areas = isset( $_POST['import_widgets'] ) ? $_POST['import_widgets'] : '';
		$hook_boxes = isset( $_POST['import_hooks'] ) ? $_POST['import_hooks'] : '';
		$images = isset( $_POST['import_images'] ) ? $_POST['import_images'] : '';
		
		genesis_extender_custom_import( $_FILES['custom_import_file'], $theme_settings, $custom_css, $custom_functions, $custom_js, $custom_templates, $custom_labels, $conditionals, $widget_areas, $hook_boxes, $images );
	}
}

/**
 * Delete images of specified extension and in specific folders.
 *
 * NOTE: This is used to delete the temporary images created
 * when performing a Genesis Extender Options export.
 *
 * @since 1.0
 */
function genesis_extender_delete_images( $dir )
{
	$handle = opendir( $dir );
	while( false !== ( $file = readdir( $handle ) ) )
	{
		$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
		if( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' )
		{
			unlink( $dir . '/' . $file );
		}
	}
	closedir( $handle );
}

/**
 * Delete specific folders.
 *
 * NOTE: This is used to delete the temporary folders created
 * when performing a Genesis Extender Options export.
 *
 * @since 1.0
 */
function genesis_extender_delete_dir( $dir )
{
	if( !is_dir( $dir ) )
		return;
	
	$handle = opendir( $dir );
	while( false !== ( $file = readdir( $handle ) ) )
	{
		if( is_dir( $dir . '/' . $file ) )
		{
			if( ( $file != '.' ) && ( $file != '..' ) )
			{
				genesis_extender_delete_dir( $dir . '/' . $file );
			}
		}
		else
		{
			unlink( $dir . '/' . $file );
		}
	}
	closedir( $handle );
	rmdir( $dir );
}

/**
 * This function is not currently in use, but we'll keep it around
 * in case we need it in the future.
 *
 * @since 1.0
 */
function genesis_extender_copy_dir( $source, $destination )
{
	if( is_dir( $source ) )
	{
		if( !is_dir( $destination ) )
		{
			@mkdir( $destination, 0755, true );
		}
		$handle = opendir( $source );
		while( false !== ( $readdirectory = readdir( $handle ) ) )
		{
			if( $readdirectory == '.' || $readdirectory == '..' )
			{
				continue;
			}
			$pathdir = $source . '/' . $readdirectory; 
			if( is_dir( $pathdir ) )
			{
				genesis_extender_copy_dir( $pathdir, $destination . '/' . $readdirectory );
				continue;
			}
			copy( $pathdir, $destination . '/' . $readdirectory );
		}
		closedir( $handle );
	}
	else
	{
		copy( $source, $destination );
	}
}
