<?php
/**
 * Enqueue/Echo the Genesis Extender stylesheets/CSS.
 *
 * @package Extender
 */

add_action( 'genesis_meta', 'genesis_extender_load_stylesheets', 15 );
/**
 * Enqueue the Genesis Extender stylesheets.
 *
 * @since 1.0.2
 */
function genesis_extender_load_stylesheets()
{
	add_action( 'wp_enqueue_scripts', 'genesis_extender_add_stylesheets' );
}

/**
 * Determine whether or not to enqueue the Custom stylesheet based on whether or not Custom CSS exists.
 *
 * @since 1.0
 */
function genesis_extender_add_stylesheets()
{
	global $genesis_extender_css_builder_popup;

	if( genesis_extender_get_settings( 'include_column_class_styles' ) )
		$default_stylesheet = 'default-with-columns.css';
	else
		$default_stylesheet = 'default.css';

	if( genesis_extender_get_custom_css( 'css_builder_popup_active' ) && current_user_can( 'administrator' ) )
		$genesis_extender_css_builder_popup = true;

	if( !genesis_extender_get_settings( 'minify_stylesheets' ) || $genesis_extender_css_builder_popup )
		wp_enqueue_style( 'genesis-extender-default', GENEXT_URL . 'lib/css/' . $default_stylesheet, false, filemtime( GENEXT_PATH . 'lib/css/' . $default_stylesheet ) );
	
	if( !genesis_extender_get_settings( 'minify_stylesheets' ) && file_exists( genesis_extender_get_custom_stylesheet_path() ) && !$genesis_extender_css_builder_popup )
		wp_enqueue_style( 'genesis-extender-custom', genesis_extender_get_custom_stylesheet_url(), false, filemtime( genesis_extender_get_custom_stylesheet_path() ) );

	if( genesis_extender_get_settings( 'minify_stylesheets' ) && !$genesis_extender_css_builder_popup )
		wp_enqueue_style( 'genesis-extender-minified', genesis_extender_get_minified_stylesheet_url(), false, filemtime( genesis_extender_get_minified_stylesheet_path() ) );

    if( genesis_extender_get_settings( 'font_awesome_css' ) )
		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/' . GENEXT_FONT_AWESOME_VERSION . '/css/font-awesome.min.css', array(), GENEXT_FONT_AWESOME_VERSION );
}

add_action( 'wp_head', 'genesis_extender_css_builder_css_echo', 15 );
/**
 * If the Front-end CSS Builder is active then echo the Custom CSS into the <head>.
 *
 * @since 1.0
 */
function genesis_extender_css_builder_css_echo()
{
	global $genesis_extender_css_builder_popup;

	if( genesis_extender_get_custom_css( 'css_builder_popup_active' ) && current_user_can( 'administrator' ) )
		$genesis_extender_css_builder_popup = true;
	
	if( !$genesis_extender_css_builder_popup )
		return;
	
	$output = '';
    $custom_css = genesis_extender_get_custom_css( 'custom_css' );

	if( $custom_css != '' )
		$output .= $custom_css . "\n";
	
	$output = "\n\n<!-- Begin Genesis Extender Custom CSS -->\n<style id=\"custom-css-echo\" type=\"text/css\">\n" . $output . "</style>\n<!-- End Genesis Extender Custom CSS -->\n";
	
	echo stripslashes( $output );
}
