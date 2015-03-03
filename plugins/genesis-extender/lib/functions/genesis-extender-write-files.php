<?php
/**
 * Locate, Write and Add various Genesis Extender files.
 *
 * @package Extender
 */
 
/**
 * Write the Custom stylesheet file.
 *
 * @since 1.0
 */
function genesis_extender_write_custom_styles()
{
	// Clear out the cached values so the latest Custom CSS setting will be written to the Custom Stylesheet.
	genesis_extender_get_custom_css( null, $args = array( 'cached' => false, 'array' => false ) );

	$css = genesis_extender_build_custom_styles();
	
	$handle = @fopen( genesis_extender_get_custom_stylesheet_path(), 'w' );
	@fwrite( $handle, $css );
	@fclose( $handle );
	if( substr( sprintf( '%o', fileperms( genesis_extender_get_custom_stylesheet_path() ) ), -4 ) != '0644' &&
		substr( sprintf( '%o', fileperms( genesis_extender_get_custom_stylesheet_path() ) ), -4 ) != '0666' )
	{
		@chmod( genesis_extender_get_custom_stylesheet_path(), 0644 );
	}
}

/**
 * Write the Minified stylesheet file.
 *
 * @since 1.0.1
 */
function genesis_extender_write_minified_styles()
{
	// Clear out the cached values so the latest Custom CSS setting will be written to the Custom Stylesheet.
	genesis_extender_get_custom_css( null, $args = array( 'cached' => false, 'array' => false ) );

	$css = genesis_extender_build_minified_styles();
	
	$handle = @fopen( genesis_extender_get_minified_stylesheet_path(), 'w' );
	@fwrite( $handle, $css );
	@fclose( $handle );
	if( substr( sprintf( '%o', fileperms( genesis_extender_get_minified_stylesheet_path() ) ), -4 ) != '0644' &&
		substr( sprintf( '%o', fileperms( genesis_extender_get_minified_stylesheet_path() ) ), -4 ) != '0666' )
	{
		@chmod( genesis_extender_get_minified_stylesheet_path(), 0644 );
	}
}

/**
 * Create the Genesis Extender EZ Structure file if it does not already exist.
 *
 * @since 1.0
 *
 */
function genesis_extender_create_ez_structure_file()
{
	if( file_exists( genesis_extender_get_ez_structure_path() ) )
		return;
		
	$handle = @fopen( genesis_extender_get_ez_structure_path(), 'w' );
	@fwrite( $handle, stripslashes( '<?php' . "\n" ) );
	@fclose( $handle );
}

/**
 * Write to the Genesis Extender EZ Structure file if it exists.
 *
 * @since 1.0
 *
 */
function genesis_extender_write_ez_structures( $code = '' )
{
	genesis_extender_folders_open_permissions();
	
	if( !file_exists( genesis_extender_get_ez_structure_path() ) )
	{
		genesis_extender_create_ez_structure_file();
	}

	$handle = @fopen( genesis_extender_get_ez_structure_path(), 'w+' );
	@fwrite( $handle, stripslashes( $code ) );
	@fclose( $handle );
	
	genesis_extender_folders_close_permissions();
}

/**
 * Create the Genesis Extender Custom Functions file if it does not already exist.
 *
 * @since 1.0
 *
 */
function genesis_extender_create_custom_functions_file()
{
	if( file_exists( genesis_extender_get_custom_functions_path() ) )
		return;
		
	$handle = @fopen( genesis_extender_get_custom_functions_path(), 'w' );
	@fwrite( $handle, stripslashes( '<?php' . "\n" . '/* Do not remove this line. Add your functions below. */' . "\n" ) );
	@fclose( $handle );
}

/**
 * Write to the Genesis Extender Custom Functions file if it exists.
 *
 * @since 1.0
 *
 */
function genesis_extender_write_custom_functions( $code = '' )
{
	genesis_extender_folders_open_permissions();
	if( !file_exists( genesis_extender_get_custom_functions_path() ) )
	{
		genesis_extender_create_custom_functions_file();
	}

	$handle = @fopen( genesis_extender_get_custom_functions_path(), 'w+' );
	@fwrite( $handle, stripslashes( $code ) );
	@fclose( $handle );
	genesis_extender_folders_close_permissions();
}

/**
 * Create the Genesis Extender Custom JS file if it does not already exist.
 *
 * @since 1.2
 *
 */
function genesis_extender_create_custom_js_file()
{
	if( file_exists( genesis_extender_get_custom_js_path() ) )
		return;
		
	$handle = @fopen( genesis_extender_get_custom_js_path(), 'w' );
	@fwrite( $handle, '' );
	@fclose( $handle );
}

/**
 * Write to the Genesis Extender Custom JS file if it exists.
 *
 * @since 1.2
 *
 */
function genesis_extender_write_custom_js( $code = '' )
{
	genesis_extender_folders_open_permissions();
	if( !file_exists( genesis_extender_get_custom_js_path() ) )
	{
		genesis_extender_create_custom_js_file();
	}

	$handle = @fopen( genesis_extender_get_custom_js_path(), 'w+' );
	@fwrite( $handle, stripslashes( $code ) );
	@fclose( $handle );
	genesis_extender_folders_close_permissions();
}

/**
 * Create and write to the Genesis Extender Custom Template files.
 *
 * @since 1.2
 *
 */
function genesis_extender_write_custom_templates()
{
	genesis_extender_folders_open_permissions();
	$genesis_extender_templates = get_option( 'genesis_extender_custom_templates' );
	
	if( !empty( $genesis_extender_templates ) )
	{
		genesis_extender_dir_check( CHILD_DIR . '/my-templates' );
		
		foreach( $genesis_extender_templates as $genesis_extender_template => $template_bits )
		{
			if( $template_bits['template_type'] == 'page_template' )
			{
				$genesis_extender_template_content = '<?php
/*
 * Template Name: ' . $template_bits['template_name'] . '
 */
?>

';
			}
			else
			{
				$genesis_extender_template_content = '<?php
/*
 * Custom WordPress Template: ' . $template_bits['template_name'] . '
 */
?>

';
			}

			$template_file_name = $template_bits['template_file_name'] == 'a404' ? '404' : $template_bits['template_file_name'];
			$genesis_extender_template_content .= $template_bits['template_textarea'];

			$handle = @fopen( genesis_extender_get_custom_template_paths( $template_file_name, $template_bits['template_type'] ), 'w+' );
			@fwrite( $handle, htmlspecialchars_decode( stripslashes( $genesis_extender_template_content ) ) );
			@fclose( $handle );

			$genesis_extender_template_content = '';
		}
	}
	genesis_extender_folders_close_permissions();
}

/**
 * Create the Genesis Extender Custom Widget Areas Register file if it does not already exist.
 *
 * @since 1.0
 *
 */
function genesis_extender_create_custom_widget_areas_register_file()
{
	if( file_exists( genesis_extender_get_custom_widget_areas_register_path() ) )
		return;
		
	$handle = @fopen( genesis_extender_get_custom_widget_areas_register_path(), 'w' );
	@fwrite( $handle, stripslashes( '<?php' . "\n" . '/**' . "\n" . ' * Build, Register and Hook-In Custom Widget Areas.' . "\n" . ' *' . "\n" . ' * @package Extender' . "\n" . ' */' . "\n" ) );
	@fclose( $handle );
}

/**
 * Write to the Genesis Extender Custom Widget Areas Register file if it exists.
 *
 * @since 1.0
 *
 */
function genesis_extender_write_custom_widget_areas_register( $code = '' )
{
	genesis_extender_folders_open_permissions();
	if( !file_exists( genesis_extender_get_custom_widget_areas_register_path() ) )
	{
		genesis_extender_create_custom_widget_areas_register_file();
	}

	$handle = @fopen( genesis_extender_get_custom_widget_areas_register_path(), 'w+' );
	@fwrite( $handle, stripslashes( $code ) );
	@fclose( $handle );
	genesis_extender_folders_close_permissions();
}

/**
 * Create the Genesis Extender Custom Widget Areas file if it does not already exist.
 *
 * @since 1.0
 *
 */
function genesis_extender_create_custom_widget_areas_file()
{
	if( file_exists( genesis_extender_get_custom_widget_areas_path() ) )
		return;
		
	$handle = @fopen( genesis_extender_get_custom_widget_areas_path(), 'w' );
	@fwrite( $handle, stripslashes( '<?php' . "\n" . '/**' . "\n" . ' * Build, Register and Hook-In Custom Widget Areas.' . "\n" . ' *' . "\n" . ' * @package Extender' . "\n" . ' */' . "\n" ) );
	@fclose( $handle );
}

/**
 * Write to the Genesis Extender Custom Widget Areas file if it exists.
 *
 * @since 1.0
 *
 */
function genesis_extender_write_custom_widget_areas( $code = '' )
{
	genesis_extender_folders_open_permissions();
	if( !file_exists( genesis_extender_get_custom_widget_areas_path() ) )
	{
		genesis_extender_create_custom_widget_areas_file();
	}

	$handle = @fopen( genesis_extender_get_custom_widget_areas_path(), 'w+' );
	@fwrite( $handle, stripslashes( $code ) );
	@fclose( $handle );
	genesis_extender_folders_close_permissions();
}

/**
 * Create the Genesis Extender Custom Hook Boxes file if it does not already exist.
 *
 * @since 1.0
 *
 */
function genesis_extender_create_custom_hook_boxes_file()
{
	if( file_exists( genesis_extender_get_custom_hook_boxes_path() ) )
		return;
		
	$handle = @fopen( genesis_extender_get_custom_hook_boxes_path(), 'w' );
	@fwrite( $handle, stripslashes( '<?php' . "\n" . '/**' . "\n" . ' * Build and Hook-In Custom Hook Boxes.' . "\n" . ' *' . "\n" . ' * @package Extender' . "\n" . ' */' . "\n" ) );
	@fclose( $handle );
}

/**
 * Write to the Genesis Extender Custom Hook Boxes file if it exists.
 *
 * @since 1.0
 *
 */
function genesis_extender_write_custom_hook_boxes( $code = '' )
{
	genesis_extender_folders_open_permissions();
	if( !file_exists( genesis_extender_get_custom_hook_boxes_path() ) )
	{
		genesis_extender_create_custom_hook_boxes_file();
	}

	$handle = @fopen( genesis_extender_get_custom_hook_boxes_path(), 'w+' );
	@fwrite( $handle, htmlspecialchars_decode( stripslashes( $code ) ) );
	@fclose( $handle );
	genesis_extender_folders_close_permissions();
}

/**
 * Call to all necessary functions to create both the
 * Genesis Extender and Custom stylesheets.
 *
 * @since 1.0
 */
function genesis_extender_write_files( $css = true, $ez = true, $custom = true )
{
	genesis_extender_folders_open_permissions();
	if( $css )
	{
		genesis_extender_write_custom_styles();
		genesis_extender_write_minified_styles();
	}
	if( $ez )
	{
		genesis_extender_write_ez_structures( genesis_extender_build_ez_structures() );
	}
	if( $custom )
	{
		$custom_functions = get_option( 'genesis_extender_custom_functions' );
		genesis_extender_write_custom_functions( $custom_functions['custom_functions'] );
		$custom_js = get_option( 'genesis_extender_custom_js' );
		genesis_extender_write_custom_js( $custom_js['custom_js'] );
		genesis_extender_write_custom_templates();
		genesis_extender_write_custom_widget_areas_register( genesis_extender_register_widget_areas() );
		genesis_extender_write_custom_widget_areas( genesis_extender_build_widget_areas() );
		genesis_extender_write_custom_hook_boxes( genesis_extender_build_hook_boxes() );
	}
	genesis_extender_folders_close_permissions();
}

/* File Permissions Check */

/**
 * Test to see if a directory is writable and/or able to
 * be made writable by Genesis Extender.
 *
 * @since 1.0
 * @return true or false based on the findings of the function.
 */
function genesis_extender_writable( $dir, $level_open = 0777, $level_close = 0755 )
{
	if( !is_writable( $dir ) )
	{
		@chmod( $dir, $level_open );
	}
	else
	{
		return true;
	}
	
	if( !is_writable( $dir ) )
	{
		return false;
	}
	else
	{
		@chmod( $dir, $level_close );
	}
	
	return true;
}

/**
 * chmod a directory to 0777.
 *
 * @since 1.0
 */
function genesis_extender_open_permissions( $dir, $level_open = 0777 )
{
	@chmod( $dir, $level_open );
}

/**
 * chmod a directory to 0755.
 *
 * @since 1.0
 */
function genesis_extender_close_permissions( $dir, $level_close = 0755 )
{
	@chmod( $dir, $level_close );
}

/**
 * Make any unwritable folders writable.
 *
 * NOTE: "folders" meaning Genesis Extender stylesheet and Image Uploader folders.
 *
 * @since 1.0
 */
function genesis_extender_folders_open_permissions()
{
	global $genesis_extender_unwritable, $genesis_extender_folders;
	
	if( $genesis_extender_unwritable )
	{
		foreach( $genesis_extender_folders as $genesis_extender_folder )
		{
			if( is_dir( $genesis_extender_folder ) )
			{
				genesis_extender_open_permissions( $genesis_extender_folder );
			}
		}
	}
}

/**
 * Return any folders that were made writable by Genesis Extender to a permission setting of 0755.
 *
 * NOTE: "folders" meaning Genesis Extender stylesheet and Image Uploader folders.
 *
 * @since 1.0
 */
function genesis_extender_folders_close_permissions()
{
	global $genesis_extender_unwritable, $genesis_extender_folders;
	
	if( $genesis_extender_unwritable )
	{
		foreach( $genesis_extender_folders as $genesis_extender_folder )
		{
			if( is_dir( $genesis_extender_folder ) )
			{
				genesis_extender_close_permissions( $genesis_extender_folder );
			}
		}
	}
}
