<?php
/**
 * Builds the functions required to create, update, delete and display
 * Custom Conditionals in Custom Options.
 *
 * @package Extender
 */

/**
 * Get Custom Conditionals from the database, if any exist, and then return
 * them in a sorted array.
 *
 * @since 1.0
 * @return soreted array of all Custom Conditionals from the database if they exist.
 */
function genesis_extender_get_conditionals()
{
	$genesis_extender_conditionals = get_option( 'genesis_extender_custom_conditionals' );
	
	if( !empty( $genesis_extender_conditionals ) )
	{
		$custom_conditionals = genesis_extender_array_sort( $genesis_extender_conditionals, 'conditional_id' );
		return $custom_conditionals;
	}
	else
	{
		return false;
	}
}

/**
 * Update Custom Conditionals in the database from current settings posted
 * in the Custom Options > Custom Conditionals admin page.
 *
 * @since 1.0
 */
function genesis_extender_update_conditionals( $conditional_ids, $conditional_tags )
{
	foreach( $conditional_ids as $key => $value )
	{
		$these_conditionals[$key]['conditional_id'] = $value;
	}
	
	foreach( $conditional_tags as $key => $value )
	{
		$these_conditionals[$key]['conditional_tag'] = $value;
	}
	
	foreach( $these_conditionals as $this_conditional )
	{
		$conditional_id = $this_conditional['conditional_id'];
		$conditional_tag = stripslashes( $this_conditional['conditional_tag'] );

		if( !empty( $conditional_id ) )
		{
			$genesis_extender_conditionals = get_option( 'genesis_extender_custom_conditionals' );
			if( !empty( $genesis_extender_conditionals[$conditional_id]['conditional_id'] ) && $genesis_extender_conditionals[$conditional_id]['conditional_id'] == $conditional_id )
			{
				$updated_values = array( $conditional_id => array( 'conditional_id' => $conditional_id, 'conditional_tag' => $conditional_tag ) );
				$merged_conditional = array_merge( $genesis_extender_conditionals, $updated_values );
				update_option( 'genesis_extender_custom_conditionals', $merged_conditional );
			}
			else
			{
				$new_conditional = array( $conditional_id => array( 'conditional_id' => $conditional_id, 'conditional_tag' => $conditional_tag ) );
				$merged_conditional = array_merge( $genesis_extender_conditionals, $new_conditional );
				update_option( 'genesis_extender_custom_conditionals', $merged_conditional );
			}
		}
	}
}

/**
 * Delete Custom Conditionals from the database that are posted for deletion
 * in Custom Options > Custom Conditionals.
 * 
 *
 * @since 1.0
 */
add_action( 'wp_ajax_genesis_extender_conditional_delete', 'genesis_extender_delete_conditional' );
function genesis_extender_delete_conditional()
{
	$genesis_extender_conditionals = get_option( 'genesis_extender_custom_conditionals' );
	$conditional_id = $_POST['conditional_id'];

	unset( $genesis_extender_conditionals[$conditional_id] );
	update_option( 'genesis_extender_custom_conditionals', $genesis_extender_conditionals );
	echo 'deleted';
}

/**
 * Build the Custom Conditionals drop-down list for various admin drop-down menus.
 *
 * @since 1.0
 */
function genesis_extender_list_conditionals( $selected = '' )
{
	$genesis_extender_conditionals = get_option( 'genesis_extender_custom_conditionals' );
	
	if( !is_array( $selected ) )
	{
		if( !empty( $genesis_extender_conditionals ) )
		{
			$conditionals = $genesis_extender_conditionals;

			asort($conditionals);
			
			foreach( $conditionals as $conditional_id => $a['conditional_id'] )
			{
				$option = '<option value="' . $conditional_id . '"';
				
				if( $conditional_id == $selected )
				{
					$option .= ' selected="selected"';
				}
				
				$option .= '>' . $conditional_id . '</option>';
				
				echo $option;
			}
		}
	}
	elseif( is_array( $selected ) )
	{
		if( !empty( $genesis_extender_conditionals ) )
		{		
			$conditionals = $genesis_extender_conditionals;

			asort($conditionals);
			
			foreach( $conditionals as $conditional_id => $a['conditional_id'] )
			{
				$option = '<option value="' . $conditional_id . '"';
				
				if( in_array( $conditional_id, $selected ) )
				{
					$option .= ' selected="selected"';
				}
				
				$option .= '>' . $conditional_id . '</option>';
				
				echo $option;
			}
		}	
	}
}

/**
 * Sort arrays alphabetically.
 *
 * @since 1.0
 * @return arrays sorted alphabetically..
 */
function genesis_extender_array_sort( $a, $subkey )
{
	foreach( $a as $k => $v ) {
		$b[$k] = strtolower( $v[$subkey] );
	}
	asort( $b );
	foreach( $b as $key => $val ) {
		$c[] = $a[$key];
	}
	return $c;
}
