<?php
/**
 * Builds the functions required to create, update, delete and display
 * Custom Widget Areas in Custom Options.
 *
 * @package Extender
 */

/**
 * Register each Custom Widget Area based on their current database settings.
 *
 * @since 1.0
 */
function genesis_extender_register_widget_areas()
{
	$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
	$genesis_extender_widget_areas = '<?php' . "\n" . '/**' . "\n" . ' * Register Custom Widget Areas.' . "\n" . ' */' . "\n";
	
	if( !empty( $genesis_extender_widgets ) )
	{
		array_multisort( $genesis_extender_widgets );
		
		foreach( $genesis_extender_widgets as $genesis_extender_widget => $widget_bits )
		{
			if( !empty( $widget_bits['description'] ) )
				$wa_description = $widget_bits['description'];
			else
				$wa_description = '';
			
			$genesis_extender_widget_areas .= "
genesis_register_sidebar( array(
	'id' 			=>	'" . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . "',
	'name'			=>	__( '" . $widget_bits['widget_name'] . "', 'extender' ),
	'description' 	=>	__( '" . esc_html ( $wa_description ) . "', 'extender' )
) );
";
		}
	}

	return $genesis_extender_widget_areas;
}

/**
 * Hook all Custom Widget Areas that area set to be hooked into a Hook Location.
 *
 * @since 1.0
 */
function genesis_extender_build_widget_areas()
{
	$genesis_extender_conditionals = get_option( 'genesis_extender_custom_conditionals' );
	$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
	$genesis_extender_widget_areas = '<?php' . "\n" . '/**' . "\n" . ' * Build and Hook-In Custom Widget Areas.' . "\n" . ' */' . "\n";
	$single_quote = "'";
	
	if( !empty( $genesis_extender_widgets ) )
	{
		foreach( $genesis_extender_widgets as $genesis_extender_widget => $widget_bits )
		{
			$tab = '';
			$genesis_extender_conditional_tags = '';
			if( !empty( $widget_bits['class'] ) )
			{
				$widget_bits['class'] = ' ' . $widget_bits['class'];
			}
			$genesis_extender_widget_conditional = explode( '|', $widget_bits['conditionals'] );
			foreach( $genesis_extender_conditionals as $genesis_extender_conditional => $conditional_bits )
			{
				if( in_array( $conditional_bits['conditional_id'], $genesis_extender_widget_conditional ) )
				{
					$genesis_extender_conditional_tags .= $conditional_bits['conditional_tag'] . ' || ';
				}
			}
			
			$genesis_extender_widget_areas .= '
/* Name: ' . $widget_bits['widget_name'] . ' */
';

			if( $widget_bits['status'] == 'sht' || $widget_bits['status'] == 'bth' )
			{
				$genesis_extender_widget_areas .= '
add_shortcode( ' . $single_quote . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . $single_quote . ', ' . $single_quote . 'genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area_shortcode' . $single_quote . ' );
function genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area_shortcode() {';
				$genesis_extender_widget_areas .= '
	ob_start();
	genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area_content();
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
';
			}

			if( $widget_bits['status'] == 'hkd' || $widget_bits['status'] == 'bth' )
			{
				$genesis_extender_widget_areas .= '
add_action( ' . $single_quote . $widget_bits['hook_location'] . $single_quote . ', ' . $single_quote . 'genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area' . $single_quote . ', ' . $widget_bits['priority'] . ' );
function genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area() {';
				$genesis_extender_widget_areas .= '
	genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area_content();
}
';
			}
			
			$genesis_extender_widget_areas .= '
function genesis_extender_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area_content() {';
			if( !empty( $widget_bits['conditionals'] ) )
			{
				$tab = '	';
				$genesis_extender_widget_areas .= '
	if ( ' . substr( $genesis_extender_conditional_tags, 0, -4 ) . ' ) {';
			}
				
			$genesis_extender_widget_areas .= '
	' . $tab . 'genesis_widget_area( ' . $single_quote . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . $single_quote . ', $args = array (
		' . $tab . $single_quote . 'before' . $single_quote . '              => ' . $single_quote . '<div id="' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '" class="widget-area genesis-extender-widget-area' . $widget_bits['class'] . '">' . $single_quote . ',
		' . $tab . $single_quote . 'after' . $single_quote . '               => ' . $single_quote . '</div>' . $single_quote . ',
		' . $tab . $single_quote . 'before_sidebar_hook' . $single_quote . ' => ' . $single_quote . 'genesis_before_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area' . $single_quote . ',
		' . $tab . $single_quote . 'after_sidebar_hook' . $single_quote . '  => ' . $single_quote . 'genesis_after_' . genesis_extender_sanatize_string( $widget_bits['widget_name'], true ) . '_widget_area' . $single_quote . '
	' . $tab . ') );';
				
			if( !empty( $widget_bits['conditionals'] ) )
			{
				$genesis_extender_widget_areas .= '
	} else {
		return false;
	}';
			}
				
			$genesis_extender_widget_areas .= '
}
';
		}
	}
	
	return $genesis_extender_widget_areas;
}

/**
 * Get Custom Widget Areas from the database, if any exist, and then return
 * them in a sorted array.
 *
 * @since 1.0
 * @return soreted array of all Custom Widget Areas from the database if they exist.
 */
function genesis_extender_get_widgets()
{
	$custom_widgets = get_option( 'genesis_extender_custom_widget_areas' );

	if( !empty( $custom_widgets ) )
	{
		foreach( $custom_widgets as $k => $v )
		{
			$custom_widgets[$k]['conditionals'] = explode( '|', $v['conditionals'] );
			$custom_widgets[$k]['description'] = stripslashes( $custom_widgets[$k]['description'] );
		}
		$custom_widgets = genesis_extender_array_sort( $custom_widgets, 'widget_name' );	
		return $custom_widgets;
	}
	else
	{
		return false;
	}
}

/**
 * Update Custom Widget Areas in the database from current settings posted
 * in the Custom Options > Custom Widget Areas admin page.
 *
 * @since 1.0
 */
function genesis_extender_update_widgets( $names = '', $conditionals = '', $hooks = '', $classes = '', $descriptions = '', $statuses = '', $priorities = '' )
{
	$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
	$these_widgets = array();
	$widget_id_array = array();
	$widget_name_array = array();
	
	if( !empty( $names[1] ) )
	{
		foreach( $names as $key => $value )
		{
			$these_widgets[$key]['name'] = $value;
		}
		if( !empty( $conditionals ) )
		{
			foreach( $conditionals as $key => $value )
			{
				$these_widgets[$key]['conditionals'] = $value;
			}
		}
		if( !empty( $hooks ) )
		{
			foreach( $hooks as $key => $value )
			{
				$these_widgets[$key]['hook'] = $value;
			}
		}
		if( !empty( $classes ) )
		{
			foreach( $classes as $key => $value )
			{
				$these_widgets[$key]['class'] = $value;
			}
		}
		if( !empty( $descriptions ) )
		{
			foreach( $descriptions as $key => $value )
			{
				$these_widgets[$key]['description'] = $value;
			}
		}
		if( !empty( $statuses ) )
		{
			foreach( $statuses as $key => $value )
			{
				$these_widgets[$key]['status'] = $value;
			}
		}
		if( !empty( $priorities ) )
		{
			foreach( $priorities as $key => $value )
			{
				$these_widgets[$key]['priority'] = $value;
			}
		}
	}
	
	if( !empty( $these_widgets ) )
	{
		foreach( $these_widgets as $this_widget )
		{
			$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
			$widget_name = $this_widget['name'];
			$widget_id = genesis_extender_sanatize_string( $widget_name, true );
			$hook_location = $this_widget['hook'];
			$class = $this_widget['class'];
			$description = htmlspecialchars( $this_widget['description'] );
			$status = $this_widget['status'];
			$priority = $this_widget['priority'];
			
			if( !empty( $this_widget['conditionals'] ) )
			{
				$conditionals = implode( '|', $this_widget['conditionals'] );
			}
			else
			{
				$this_widget['conditionals'] = array( '' );
				$conditionals = '';
			}
			
			if( !empty( $widget_id ) )
			{
				$new_values = array( $widget_id => array( 'widget_name' => $widget_name, 'conditionals' => $conditionals, 'hook_location' => $hook_location, 'class' => $class, 'description' => $description, 'status' => $status, 'priority' => $priority ) );
				$merged_widget_area = array_merge( $genesis_extender_widgets, $new_values );
				update_option( 'genesis_extender_custom_widget_areas', $merged_widget_area );
			}
		}
	}
}

/**
 * Delete Custom Widget Areas from the database that are posted for deletion
 * in Custom Options > Custom Widget Areas.
 * 
 *
 * @since 1.0
 */
add_action( 'wp_ajax_genesis_extender_widget_delete', 'genesis_extender_delete_widget' );
function genesis_extender_delete_widget()
{
	$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
	
	$widget_name = $_POST['widget_name'];
	
	foreach( $genesis_extender_widgets as $key => $value )
	{
		if( in_array( $widget_name, $genesis_extender_widgets[$key] ) )
		{
			unset( $genesis_extender_widgets[$key] );
		}
	}

	update_option( 'genesis_extender_custom_widget_areas', $genesis_extender_widgets );
	
	echo 'deleted';
}

/**
 * Build drop-down menu for Custom Widget Area classes for the CSS Builder tool.
 *
 * @since 1.0
 */
function genesis_extender_widget_class_dropdown()
{
	$genesis_extender_widgets = get_option( 'genesis_extender_custom_widget_areas' );
	
	if( !empty( $genesis_extender_widgets ) )
	{
		foreach( $genesis_extender_widgets as $k => $v )
		{
			if( $genesis_extender_widgets[$k]['class'] != '' )
			{
				echo '<option value="' . $genesis_extender_widgets[$k]['class'] . '">' . $genesis_extender_widgets[$k]['class'] . '</option>';
			}
		}
	}
}
