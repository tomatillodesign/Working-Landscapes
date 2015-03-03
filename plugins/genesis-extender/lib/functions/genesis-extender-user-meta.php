<?php 
/**
 * Build and Add the User Meta option functions.
 *
 * @package Extender
 */
 
add_action( 'show_user_profile', 'genesis_extender_user_options_fields' );
add_action( 'edit_user_profile', 'genesis_extender_user_options_fields' );
/**
 * Build the Genesis Extender User Profile options.
 *
 * @since 1.0
 */
function genesis_extender_user_options_fields( $user )
{
	if( !current_user_can( 'edit_users', $user->ID ) )
		return false;

	?>
	<h3><?php _e( 'Genesis Extender Settings', 'extender' ); ?></h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row" valign="top"><?php _e( 'Genesis Extender Admin Menus', 'extender' ); ?></th>
				<td>
					<input id="meta[disable_genesis_extender_settings_menu]" name="meta[disable_genesis_extender_settings_menu]" type="checkbox" value="1" <?php checked( get_the_author_meta( 'disable_genesis_extender_settings_menu', $user->ID ) ); ?> />
					<label for="meta[disable_genesis_extender_settings_menu]"><?php _e( 'Disable Genesis Extender Settings Submenu?', 'extender' ); ?></label><br />
					<input id="meta[disable_genesis_extender_custom_menu]" name="meta[disable_genesis_extender_custom_menu]" type="checkbox" value="1" <?php checked( get_the_author_meta( 'disable_genesis_extender_custom_menu', $user->ID ) ); ?> />
					<label for="meta[disable_genesis_extender_custom_menu]"><?php _e( 'Disable Genesis Extender Custom Submenu?', 'extender' ); ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row" valign="top"><?php _e( 'Genesis Extender License', 'extender' ); ?></th>
				<td>
					<input id="meta[hide_genesis_extender_license_key]" name="meta[hide_genesis_extender_license_key]" type="checkbox" value="1" <?php checked( get_the_author_meta( 'hide_genesis_extender_license_key', $user->ID ) ); ?> />
					<label for="meta[hide_genesis_extender_license_key]"><?php _e( 'Hide Genesis Extender License Key?', 'extender' ); ?></label>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
}

add_action( 'personal_options_update', 'genesis_extender_user_meta_save' );
add_action( 'edit_user_profile_update', 'genesis_extender_user_meta_save' );
/**
 * Provide Genesis Extender User Profile options with save/update functionality.
 *
 * @since 1.0
 */
function genesis_extender_user_meta_save( $user_id )
{
	if( !current_user_can( 'edit_users', $user_id ) )
		return;
		
	if( !isset( $_POST['meta'] ) || !is_array( $_POST['meta'] ) )
		return;
		
	$meta = wp_parse_args( $_POST['meta'], array(
		'disable_genesis_extender_settings_menu' => '',
		'disable_genesis_extender_custom_menu' => '',
		'hide_genesis_extender_license_key' => ''
	) );
		
	foreach( $meta as $key => $value )
	{
		update_user_meta( $user_id, $key, $value );
	}
	
}

/* The following term_meta options are not in use at this time. */

//add_action( 'edit_term', 'genesis_extender_save_term_meta', 10, 2 );
/**
 * Provide Genesis Extender taxonomy options with save/update functionality.
 *
 * @since 1.0
 */
function genesis_extender_save_term_meta( $term_id, $tt_id )
{
	$term_meta = ( array ) get_option( 'genesis_extender_term_meta_options' );
	
	$term_meta[$term_id] = isset( $_POST['meta'] ) ? ( array ) $_POST['meta'] : array();
	
	update_option( 'genesis_extender_term_meta_options', $term_meta );
}

//add_action( 'delete_term', 'genesis_extender_delete_term_meta', 10, 2 );
/**
 * Provide Genesis Extender taxonomy options with delete functionality.
 *
 * @since 1.0
 */
function genesis_extender_delete_term_meta( $term_id, $tt_id )
{
	$term_meta = ( array ) get_option( 'genesis_extender_term_meta_options' );
	
	unset( $term_meta[$term_id] );
	
	update_option( 'genesis_extender_term_meta_options', ( array ) $term_meta );
}

//add_filter( 'get_term', 'genesis_extender_filter_get_term', 10, 2 );
/**
 * Filter Genesis Extender term-meta into the options table.
 *
 * @since 1.0
 * @return "filtered" term-meta value.
 */
function genesis_extender_filter_get_term( $term, $taxonomy )
{
	$db = get_option( 'genesis_extender_term_meta_options' );
	$term_meta = isset( $db[$term->term_id] ) ? $db[$term->term_id] : array();
	
	$term->meta = wp_parse_args( $term_meta, array(
			'layout' => ''
	) );
	
	foreach ( $term->meta as $field => $value )
	{
		$term->meta[$field] = stripslashes( wp_kses_decode_entities( $value ) );
	}
	
	return $term;
}
