<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @package Extender
 */

add_filter( 'genesis_extender_cmb_meta_boxes', 'genesis_extender_lables_metabox' );
/**
 * Define the metabox and field configurations.
 *
 * @since 1.2
 * @return array
 */
function genesis_extender_lables_metabox( array $genesis_extender_meta_boxes )
{
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_genext_';
	if( genesis_extender_get_settings( 'include_inpost_cpt_all' ) )
	{
		foreach( get_post_types( array( 'public' => true ) ) as $post_type )
		{
			$post_types[] = $post_type;
		}
	}
	else
	{
		$post_types = genesis_extender_get_settings( 'include_inpost_cpt_names' ) != '' ? explode( ',', 'page,post,' . genesis_extender_get_settings( 'include_inpost_cpt_names' ) ) : array( 'page','post' );
	}
	$labels = !get_option( 'genesis_extender_custom_labels' ) ? array() : get_option( 'genesis_extender_custom_labels' );
	asort( $labels );
	$labels_array = array();
	foreach( $labels as $key => $value )
	{
		$labels_array[$key] = $value['label_id'];
		$labels_array[$key] = $value['label_name'];
	}
	$labels_desc = $labels != array() ? 'Select labels appropriate to this page/post.' : 'No labels available. Go to ( Extender Custom > Labels ) to create some.';

	$genesis_extender_meta_boxes[] = array(
		'id'         => 'genesis_extender_labels',
		'title'      => 'Genesis Extender Labels',
		'pages'      => $post_types, // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Select Labels',
				'desc'    => $labels_desc,
				'id'      => $prefix . 'labels',
				'type'    => 'multicheck',
				'options' => $labels_array,
			),
		),
	);

	return $genesis_extender_meta_boxes;
}

add_action( 'init', 'genesis_extender_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 * @since 1.2
 */
function genesis_extender_initialize_cmb_meta_boxes()
{
	if( !class_exists( 'genesis_extender_cmb_Meta_Box' ) )
		require_once 'init.php';
}