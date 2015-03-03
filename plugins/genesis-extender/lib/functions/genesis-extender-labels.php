<?php
/**
 * Builds the functions required to create, update, delete and display
 * Custom Labels in Custom Options.
 *
 * @package Extender
 */

/**
 * Get Custom Labels from the database, if any exist, and then return
 * them in a sorted array.
 *
 * @since 1.2
 * @return soreted array of all Custom Labels from the database if they exist.
 */
function genesis_extender_get_labels()
{
	$custom_labels = get_option( 'genesis_extender_custom_labels' );
	
	if( !empty( $custom_labels ) )
	{
		$custom_labels = genesis_extender_array_sort( $custom_labels, 'label_name' );		
		return $custom_labels;
	}
	else
	{
		return false;
	}
}

/**
 * Update Custom Labels in the database from current settings posted
 * in the Custom Options > Custom Labels admin page.
 *
 * @since 1.2
 */
function genesis_extender_update_labels( $label_names = '' )
{
	$these_labels = array();
	$label_name_array = array();
	
	if( !empty( $label_names[1] ) )
	{
		foreach( $label_names as $key => $value )
		{
			$these_labels[$key]['label_name'] = $value;
		}
	}

	if( !empty( $these_labels ) )
	{
		foreach( $these_labels as $this_label )
		{
			$genesis_extender_labels = get_option( 'genesis_extender_custom_labels' );
			$label_name = $this_label['label_name'];
			$label_id = genesis_extender_sanatize_string( $label_name );
			
			if( !empty( $label_name ) )
			{
				$new_values = array( $label_id => array( 'label_id' => $label_id, 'label_name' => $label_name ) );
				$merged_page_label = array_merge( $genesis_extender_labels, $new_values );
				update_option( 'genesis_extender_custom_labels', $merged_page_label );
			}
		}
	}
}

/**
 * Delete Custom Labels from the database that are posted for deletion
 * in Custom Options > Custom Labels.
 *
 * @since 1.2
 */
add_action( 'wp_ajax_genesis_extender_label_delete', 'genesis_extender_delete_label' );
function genesis_extender_delete_label()
{
	$genesis_extender_labels = get_option( 'genesis_extender_custom_labels' );
	
	$label_name = $_POST['label_name'];
	
	foreach( $genesis_extender_labels as $key => $value )
	{
		if( in_array( $label_name, $genesis_extender_labels[$key] ) )
		{
			unset( $genesis_extender_labels[$key] );
		}
	}

	update_option( 'genesis_extender_custom_labels', $genesis_extender_labels );
		
	echo 'deleted';
}
