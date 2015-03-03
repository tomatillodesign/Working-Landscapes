<?php
/**
 * Builds the Genesis Extender stylesheets.
 *
 * @package Extender
 */

/**
 * Build the Custom stylesheet file.
 *
 * @since 1.0
 */
function genesis_extender_build_custom_styles()
{
	$css = '/* ' . __( 'Custom CSS', 'extender' ) . "\n" . '------------------------------------------------------------ */' . "\n";

	$css = genesis_extender_get_custom_css( 'custom_css' );
	
	return $css;
}

/**
 * Build the Combined & Minified stylesheet file.
 *
 * @since 1.0.1
 */
function genesis_extender_build_minified_styles()
{
	if( genesis_extender_get_settings( 'include_column_class_styles' ) )
		$default_stylesheet = 'default-with-columns.css';
	else
		$default_stylesheet = 'default.css';

	$css_prefix = '/* ' . __( 'Combined & Minified CSS', 'extender' ) . "\n" . '------------------------------------------------------------ */' . "\n";

	$css = file_get_contents( GENEXT_PATH . 'lib/css/' . $default_stylesheet );
	
    $css .= genesis_extender_get_custom_css( 'custom_css' );

    $css = $css_prefix . genesis_extender_minify_css( $css );
	
	return $css;
}
