<?php
/**
 * Build a fonts menu and enqueue any added Google Fonts.
 *
 * @package Extender
 */

/**
 * Build Google fonts string.
 *
 * @since 1.5
 * @return a string of Google fonts, if any are currently selected.
 */
function genesis_extender_build_google_fonts_string()
{
	$genesis_extender_google_font_array = genesis_extender_font_types_array( $type = 'google' );
	$google_fonts = '';

	foreach( $genesis_extender_google_font_array as $google_font => $google_font_data )
	{
		if( strpos( $google_font_data['url_string'], '&' ) !== false )
			$google_font_data['url_string'] = substr( $google_font_data['url_string'], 0, strpos( $google_font_data['url_string'], '&' ) );
				
		$google_fonts .= $google_font_data['url_string'] . '|';
	}
	
	if( !empty( $google_fonts ) )
		return $google_fonts;
	else
		return false;
}

add_action( 'wp_enqueue_scripts', 'genesis_extender_enqueue_google_fonts' );
/**
 * Enqueue Google fonts.
 *
 * @since 1.5
 * @return an enqueue of Google fonts, if any are currently selected.
 */
function genesis_extender_enqueue_google_fonts()
{
	$google_fonts = genesis_extender_build_google_fonts_string();
	$google_fonts_enqueue = '';
	
	if( !empty( $google_fonts ) )
	{
		$google_fonts_enqueue = wp_enqueue_style( 'genesis-extender-google-fonts', '//fonts.googleapis.com/css?family=' . $google_fonts, array(), CHILD_THEME_VERSION );
	}
	
	return $google_fonts_enqueue;
}

/**
 * Build the Genesis Extender font menu HTML.
 *
 * @since 1.5
 */
function genesis_extender_build_font_menu( $selected = '' )
{
	$genesis_extender_fonts_array = genesis_extender_fonts_array();
	foreach( $genesis_extender_fonts_array as $font_type => $fonts )
	{
		echo '<optgroup label="' . $font_type . ' -------">';
		foreach( $fonts as $font_slug => $font_data )
		{
			$option = '<option value="' . $font_data . '"';
				
			if( $font_data == $selected )
			{
				$option .= ' selected="selected"';
			}
			
			if( $font_type == 'Google Fonts' )
			{
				$gee = ' [G]';
			}
			
			if( !empty( $gee ) )
			{
				$option .= '>' . $font_slug . $gee . '</option>';
			}
			else
			{
				$option .= '>' . $font_slug . '</option>';
			}
			
			echo $option;
		}
		echo '</optgroup>';
	}
}

/**
 * Create an array of Genesis Extender fonts.
 *
 * @since 1.5
 * @return an array of Genesis Extender fonts.
 */
function genesis_extender_fonts_array()
{
	$genesis_extender_standard_fonts_array = genesis_extender_font_types_array( $type = 'standard' );

	foreach( $genesis_extender_standard_fonts_array as $genesis_extender_standard_font => $value )
	{
		$genesis_extender_standard_fonts_array[$genesis_extender_standard_font] = $value;
	}

	$genesis_extender_google_fonts_array = genesis_extender_font_types_array( $type = 'google' );
	
	foreach( $genesis_extender_google_fonts_array as $genesis_extender_google_font => $value )
	{
		$genesis_extender_google_fonts_array[$genesis_extender_google_font] = $value['value'];
	}
	
	$genesis_extender_fonts_array = array(
		"Standard Fonts" => $genesis_extender_standard_fonts_array,
		"Google Fonts" => $genesis_extender_google_fonts_array
	);
	
	return $genesis_extender_fonts_array;
}

/**
 * Create an array of Google fonts based on the specified type.
 *
 * @since 1.5
 * @return an array of Google fonts.
 */
function genesis_extender_font_types_array( $type = 'all' )
{
	$genesis_extender_font_types_array = array();
	$genesis_extender_google_fonts_array = array();

	$genesis_extender_standard_fonts_array = array(
		"Arial" => "Arial, sans-serif",
		"Arial Black" => "'Arial Black', sans-serif",
		"Courier New" => "'Courier New', sans-serif",
		"Georgia" => "Georgia, serif",
		"Helvetica" => "Helvetica, sans-serif",
		"Impact" => "Impact, sans-serif",
		"Lucida Console" => "'Lucida Console', sans-serif",
		"Lucida Sans Unicode" => "'Lucida Sans Unicode', sans-serif",
		"Tahoma" => "Tahoma, sans-serif",
		"Times New Roman" => "'Times New Roman', serif",
		"Trebuchet MS" => "'Trebuchet MS', sans-serif",
		"Verdana" => "Verdana, sans-serif"
	);

	$current_google_fonts = genesis_extender_get_settings( 'add_google_fonts' );
	$current_google_fonts_array_pre = preg_split( '/\\] \\[|\\[|\\]/', $current_google_fonts, -1, PREG_SPLIT_NO_EMPTY );
	$current_google_fonts_array = array_filter( array_map( 'trim', $current_google_fonts_array_pre ), 'strlen' );
	foreach( $current_google_fonts_array as $current_google_font )
	{
		$google_font_pieces = explode( '|', $current_google_font );
		$genesis_extender_google_fonts_array[$google_font_pieces[0]] = array(
			"value" => $google_font_pieces[2],
			"url_string" => $google_font_pieces[1]
		);
	}

	if( $type == 'standard' )
	{
		$genesis_extender_font_types_array = $genesis_extender_standard_fonts_array;
	}
	elseif( $type == 'google' )
	{
		$genesis_extender_font_types_array = $genesis_extender_google_fonts_array;
	}
	else
	{
		foreach( $genesis_extender_google_fonts_array as $genesis_extender_google_font => $value )
		{
			$genesis_extender_google_fonts_array[$genesis_extender_google_font] = $value['value'];
		}
		$genesis_extender_font_types_array = array_merge( $genesis_extender_standard_fonts_array, $genesis_extender_google_fonts_array );
	}

	return $genesis_extender_font_types_array;
}
