<?php
/**
 * Builds the Genesis Extender Options functions.
 *
 * @package Extender
 */
 
/**
 * Get the latest genesis_extender_settings array from the database
 * and then cache it, if not otherwise specified, so specific
 * Genesis Extender Settings values (or the entire array) can be efficiently accessed.
 *
 * @since 1.0
 * @return either the entire genesis_extender_settings array or a specific key/value.
 */
function genesis_extender_get_settings( $key, $args = false )
{
	// Make the following variables static so they retain their values.
	static $options_cache = array();
	static $options_set = false;
	
	// If the $args variable is not false then process the values provided.
	if( $args )
	{
		// If the $options_cache variable is not an empty array or the $args['cahed'] key is false
		// then update the $options_cache variable with the latest copy of the genesis_extender_settings array.
		if( empty( $options_cache ) || !$args['cached'] )
		{
			$options_cache = get_option( 'genesis_extender_settings' );
		}
		// If the $args['array'] key is not false then return the entire
		// genesis_extender_settings array through the $options_cache variable.
		if( $args['array'] )
		{
			return $options_cache;
		}
		// Otherwise if the $args['array'] key IS false then return nothing.
		// This is useful if you just want to clear the cache (setting the $args['cahed'] key
		// to false, as mentioned above) but don't want to return any actual values.
		else
		{
			return;
		}
	}

	// If $options_cache[$key] is set then stripslash and return the cached value for that key.
	if( isset( $options_cache[$key] ) )
	{
		return is_array( $options_cache[$key] ) ? stripslashes_deep( $options_cache[$key] ) : stripslashes( wp_kses_decode_entities( $options_cache[$key] ) );
	}
	// Otherwise if the $options_set variable is not false, but $options_cache[$key] is NOT set,
	// then give that particular key a blank value and then return it.
	elseif( $options_set )
	{
		$options_cache[$key] = '';
		return $options_cache[$key];
	}
	// Otherwise if none of the above is true then update the $options_cache variable with the
	// latest copy of the genesis_extender_settings array and set the $options_set variable to true.
	else
	{
		$options_cache = get_option( 'genesis_extender_settings' );
		$options_set = true;
	}
	
	// If $options_cache[$key] is NOT set then give that particular key a blank value.
	if ( !isset( $options_cache[$key] ) )
	{
		$options_cache[$key] = '';
	}
	// Otherwise stripslash the set value.
	else
	{
		$options_cache[$key] = is_array( $options_cache[$key] ) ? stripslashes_deep( $options_cache[$key] ) : stripslashes( wp_kses_decode_entities( $options_cache[$key] ) );
	}

	// Return $options_cache[$key] if it hasn't already been returned above.
	return $options_cache[$key];
}

/**
 * Get the latest genesis_extender_custom_css array from the database
 * and then cache it, if not otherwise specified, so specific
 * Custom Options values (or the entire array) can be efficiently accessed.
 *
 * @since 1.0
 * @return either the entire genesis_extender_custom_css array or a specific key/value.
 */
function genesis_extender_get_custom_css( $key, $args = false )
{
	static $options_cache = array();
	static $options_set = false;
	
	if( $args )
	{
		if( empty( $options_cache ) || !$args['cached'] )
		{
			$options_cache = get_option( 'genesis_extender_custom_css' );
		}
		if( $args['array'] )
		{
			return $options_cache;
		}
		else
		{
			return;
		}
	}

	if( isset( $options_cache[$key] ) )
	{
		return is_array( $options_cache[$key] ) ? stripslashes_deep( $options_cache[$key] ) : stripslashes( wp_kses_decode_entities( $options_cache[$key] ) );
	}
	elseif( $options_set )
	{
		$options_cache[$key] = '';
		return $options_cache[$key];
	}
	else
	{
		$options_cache = get_option( 'genesis_extender_custom_css' );
		$options_set = true;
	}
	
	if ( !isset( $options_cache[$key] ) )
	{
		$options_cache[$key] = '';
	}
	else
	{
		$options_cache[$key] = is_array( $options_cache[$key] ) ? stripslashes_deep( $options_cache[$key] ) : stripslashes( wp_kses_decode_entities( $options_cache[$key] ) );
	}

	return $options_cache[$key];
}
