<?php 
/*
Plugin Name: Genesis Extender
Version: 1.5.1
Plugin URI: http://cobaltapps.com/downloads/genesis-extender-plugin/
Description: The ultimate Genesis Child Theme companion Plugin.
Author: The Cobalt Apps Team
Author URI: http://cobaltapps.com/
License: GPLv2 or later
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

/**
 * @package Extender
 */
 
/**
 * Define stuff.
 */
if( !defined( 'GENEXT_URL' ) )
	define( 'GENEXT_URL', plugin_dir_url( __FILE__ ) );
if( !defined( 'GENEXT_PATH' ) )
	define( 'GENEXT_PATH', plugin_dir_path( __FILE__ ) );
if( !defined( 'GENEXT_BASENAME' ) )
	define( 'GENEXT_BASENAME', plugin_basename( __FILE__ ) );
if( defined( 'PARENT_THEME_NAME' ) && PARENT_THEME_NAME == 'Genesis' )
	define( 'GENESIS_ACTIVE', true );

define( 'GENEXT_FILE', __FILE__ );
define( 'GENEXT_VERSION', '1.5.1' );
define( 'GENEXT_FONT_AWESOME_VERSION', '4.2.0' );

/**
 * Require files.
 */
require_once( GENEXT_PATH . 'lib/functions/genesis-extender-file-paths.php' );
require_once( GENEXT_PATH . 'lib/functions/genesis-extender-options.php' );

/**
 * Create a global to define whether or not the CSS Buidler Popup tool is active.
 */
$genesis_extender_css_builder_popup = false;

/**
 * Create globals only needed for admin.
 */
if( is_admin() )
{
	/**
	 * Create globals to define both the folder locations to be written to and their current writable state.
	 */
	$genesis_extender_folders = array( get_stylesheet_directory(), get_stylesheet_directory() . '/my-templates', genesis_extender_get_stylesheet_location( 'path', $root = true ), genesis_extender_get_stylesheet_location( 'path' ), genesis_extender_get_stylesheet_location( 'path' ) . 'images', genesis_extender_get_stylesheet_location( 'path' ) . 'images/adminthumbnails', genesis_extender_get_stylesheet_location( 'path' ) . 'tmp', genesis_extender_get_stylesheet_location( 'path' ) . 'tmp/images', genesis_extender_get_stylesheet_location( 'path' ) . 'tmp/images/adminthumbnails' );
	$genesis_extender_unwritable = false;

	foreach( $genesis_extender_folders as $genesis_extender_folder )
	{
		if( is_dir( $genesis_extender_folder ) && !is_writable( $genesis_extender_folder ) )
		{
			// Update $genesis_extender_unwritable global.
			$genesis_extender_unwritable = true;
		}
	}

	// Image Uploader globals.
	$genesis_extender_uploader_settings['uploadpath'] = genesis_extender_get_stylesheet_location( 'path' ) . 'images/'; // The full size images will be stored here.  Must have forward slash on end.
	$genesis_extender_uploader_settings['realpath'] = genesis_extender_get_stylesheet_location( 'url' ) . 'images/'; // This is the real URL location of your gallery images, this is used by the admin script to porvide a full URL link to the uploaded images.
	$genesis_extender_uploader_settings['adminthumbpath'] = genesis_extender_get_stylesheet_location( 'path' ) . 'images/adminthumbnails/'; // Regardless of whether or not you have enabled automatic thumbnail creation above, a 100 pixel wide admin thumbnail is always created for use by the admin panel when listing images.
	$genesis_extender_uploader_settings['adminthumbpath2'] = genesis_extender_get_stylesheet_location( 'url' ) . 'images/adminthumbnails/';
	$genesis_extender_uploader_settings['filetypes'] = array( "image/gif", "image/pjpeg", "image/jpeg", "image/x-png", "image/png");  // Only these filetypes are allowed to be uploaded.
	$message = '';
}

add_action( 'genesis_setup', 'genesis_extender_init', 15 );
function genesis_extender_init()
{
	// Localization.
	load_plugin_textdomain( 'extender', false, dirname( plugin_basename( __FILE__ ) ) . '/lib/languages' );

	// Include Genesis Extender files.
	require_once( GENEXT_PATH . 'lib/init.php' );
}

/**
 * Run if Genesis Extender was just activated.
 */
if( is_admin() )
{
	register_activation_hook( __FILE__, 'genesis_extender_activation_check' );
	/**
	 * Activation hook callback.
	 *
	 * This functions runs when the plugin is activated. It checks to make sure the user is running
	 * a minimum Genesis version, so there are no conflicts or fatal errors.
	 *
	 * @since 1.5
	 */
	function genesis_extender_activation_check()
	{
		if( !defined( 'GENESIS_ACTIVE' ) )
			genesis_extender_require_genesis_framework();
	}

	/**
	 * Make sure the Genesis Framework is active and if it is not, deactivate this Plugin.
	 *
	 * @since 1.0
	 */
	function genesis_extender_require_genesis_framework()
	{
		$plugin = plugin_basename( __FILE__ );
		$plugin_data = get_plugin_data( __FILE__, false );

		deactivate_plugins( $plugin );
		wp_die( "'" . $plugin_data['Name'] . "' requires the Genesis Framework! Deactivating Plugin.<br /><br />Back to <a href='" . admin_url() . "plugins.php'>Plugins page</a>." );
	}

	register_activation_hook( GENEXT_PATH . 'lib/update/genesis-extender-update.php', 'genesis_extender_activate' );
}
