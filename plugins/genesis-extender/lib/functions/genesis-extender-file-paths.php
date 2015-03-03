<?php
/**
 * Locate, Write and Add various Genesis Extender files.
 *
 * @package Extender
 */
 
/**
 * Get the stylesheet location based on the type of stylesheet.
 *
 * @since 1.0
 * @return the stylesheet location.
 */
function genesis_extender_get_stylesheet_location( $type, $root = false )
{      
	$uploads = wp_upload_dir();

    if( genesis_extender_get_settings( 'protocol_relative_urls' ) )
    {
        $base_url = $uploads['baseurl'];
        $base_dir = $uploads['basedir'];
        $dir = ( 'url' == $type ) ? str_replace( 'http:', '', $base_url ) : $base_dir;
    }
    else
    {
        $dir = ( 'url' == $type ) ? $uploads['baseurl'] : $uploads['basedir'];
    }
    
	$sub_dir = $root ? '/genesis-extender/' : '/genesis-extender/plugin/';

	return apply_filters( 'genesis_extender_get_stylesheet_location', $dir . $sub_dir );
}

/**
 * Get the stylesheet name based on the name value passed into the function.
 *
 * @since 1.0
 * @return the stylesheet name.
 */
function genesis_extender_get_stylesheet_name( $slug='stylesheet' )
{
    return apply_filters( 'genesis_extender_get_stylesheet_name', $slug . '.css' );
}

/**
 * Get the Custom stylesheet name.
 *
 * @since 1.0
 * @return the Custom stylesheet name.
 */
function genesis_extender_get_custom_stylesheet_name()
{
    return apply_filters( 'genesis_extender_get_custom_stylesheet_name', genesis_extender_get_stylesheet_name( 'genesis-extender-custom' ) );
}

/**
 * Get the Custom stylesheet path.
 *
 * @since 1.0
 * @return the Custom stylesheet path.
 */
function genesis_extender_get_custom_stylesheet_path()
{
    return apply_filters( 'genesis_extender_get_custom_stylesheet_path', genesis_extender_get_stylesheet_location( 'path' ) . genesis_extender_get_custom_stylesheet_name() );
}

/**
 * Get the Custom stylesheet url.
 *
 * @since 1.0
 * @return the Custom stylesheet url.
 */
function genesis_extender_get_custom_stylesheet_url() {
    return apply_filters( 'genesis_extender_get_custom_stylesheet_url', genesis_extender_get_stylesheet_location( 'url' ) . genesis_extender_get_custom_stylesheet_name() );
}

/**
 * Get the Minified stylesheet name.
 *
 * @since 1.0.1
 * @return the Minified stylesheet name.
 */
function genesis_extender_get_minified_stylesheet_name()
{
    return apply_filters( 'genesis_extender_get_minified_stylesheet_name', genesis_extender_get_stylesheet_name( 'genesis-extender-minified' ) );
}

/**
 * Get the Minified stylesheet path.
 *
 * @since 1.0.1
 * @return the Minified stylesheet path.
 */
function genesis_extender_get_minified_stylesheet_path()
{
    return apply_filters( 'genesis_extender_get_minified_stylesheet_path', genesis_extender_get_stylesheet_location( 'path' ) . genesis_extender_get_minified_stylesheet_name() );
}

/**
 * Get the Minified stylesheet url.
 *
 * @since 1.0.1
 * @return the Minified stylesheet url.
 */
function genesis_extender_get_minified_stylesheet_url() {
    return apply_filters( 'genesis_extender_get_minified_stylesheet_url', genesis_extender_get_stylesheet_location( 'url' ) . genesis_extender_get_minified_stylesheet_name() );
}

/**
 * Get the Genesis Extender EZ Structure file path.
 *
 * @since 1.0
 * @return the Genesis Extender EZ Structure file path.
 *
 */
function genesis_extender_get_ez_structure_path()
{
	return genesis_extender_get_stylesheet_location( 'path' ) . 'ez-structures.php';
}

/**
 * Get the Genesis Extender Custom Functions file path.
 *
 * @since 1.0
 * @return the Genesis Extender Custom Functions file path.
 *
 */
function genesis_extender_get_custom_functions_path()
{
	return genesis_extender_get_stylesheet_location( 'path' ) . 'custom-functions.php';
}

/**
 * Get the Genesis Extender Custom JS file path.
 *
 * @since 1.2
 * @return the Genesis Extender Custom JS file path.
 *
 */
function genesis_extender_get_custom_js_path()
{
    return genesis_extender_get_stylesheet_location( 'path' ) . 'custom-scripts.js';
}

/**
 * Get the Genesis Extender Custom Template file paths.
 *
 * @since 1.2
 * @return the Genesis Extender Custom Template file paths.
 *
 */
function genesis_extender_get_custom_template_paths( $template_file_name, $template_type )
{
    if( $template_type == 'page_template' )
    {
        return CHILD_DIR . '/my-templates/' . $template_file_name . '.php';
    }
    else
    {
        return CHILD_DIR . '/' . $template_file_name . '.php';
    }
}

/**
 * Get the Genesis Extender Custom Widget Areas Register file path.
 *
 * @since 1.0
 * @return the Genesis Extender Custom Widget Areas Register file path.
 *
 */
function genesis_extender_get_custom_widget_areas_register_path()
{
	return genesis_extender_get_stylesheet_location( 'path' ) . 'custom-widget-areas-register.php';
}

/**
 * Get the Genesis Extender Custom Widget Areas file path.
 *
 * @since 1.0
 * @return the Genesis Extender Custom Widget Areas file path.
 *
 */
function genesis_extender_get_custom_widget_areas_path()
{
	return genesis_extender_get_stylesheet_location( 'path' ) . 'custom-widget-areas.php';
}

/**
 * Get the Genesis Extender Custom Hook Boxes file path.
 *
 * @since 1.0
 * @return the Genesis Extender Custom Hook Boxes file path.
 *
 */
function genesis_extender_get_custom_hook_boxes_path()
{
	return genesis_extender_get_stylesheet_location( 'path' ) . 'custom-hook-boxes.php';
}
