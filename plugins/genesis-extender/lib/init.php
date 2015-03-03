<?php
/**
 * This is the initialization file for Genesis Extender,
 * defining constants, globaling database option arrays
 * and requiring other function files.
 *
 * @package Extender
 */

require_once( GENEXT_PATH . 'lib/functions/genesis-extender-add-styles.php' );
require_once( GENEXT_PATH . 'lib/functions/genesis-extender-functions.php' );
require_once( GENEXT_PATH . 'lib/functions/genesis-extender-fonts.php' );

if( is_admin() )
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-option-lists.php' );

if( !is_admin() && genesis_extender_get_custom_css( 'css_builder_popup_active' ) )
	add_action( 'init', 'genesis_extender_require_genesis_extender_options_lists');

function genesis_extender_require_genesis_extender_options_lists()
{
	if( current_user_can( 'administrator' ) )
		require_once( GENEXT_PATH . 'lib/functions/genesis-extender-option-lists.php' );
}

if( genesis_extender_get_custom_css( 'css_builder_popup_active' ) )
	add_action( 'init', 'genesis_extender_require_css_builder_popup');

function genesis_extender_require_css_builder_popup()
{
	if( current_user_can( 'administrator' ) )
		require_once( GENEXT_PATH . 'lib/admin/css-builder-popup.php' );
}

/**
 * Require files only needed for admin.
 */
if( is_admin() )
{
	if( defined( 'GENESS_VERSION' ) )
	{
		add_action( 'admin_notices', 'genesis_extender_essentials_is_active_nag' );
		/**
		 * Build "Essentials Is Active" Nag HTML.
		 *
		 * @since 1.5
		 */
		function genesis_extender_essentials_is_active_nag()
		{			
			echo '<div id="update-nag">';
			printf( __( '<strong>Genesis Extender & Genesis Essentials Are Currently Active!</strong> These two Cobalt Apps products are not to be used together so deactivate <a href="%s">Genesis Extender</a> or <a href="%s">Genesis Essentials</a>.', 'extender' ), admin_url( 'plugins.php' ), admin_url( 'plugins.php' ) );
			echo '</div>';
		}
	}

	require_once( GENEXT_PATH . 'lib/admin/build-menu.php' );
	require_once( GENEXT_PATH . 'lib/admin/genesis-extender-settings.php' );
	require_once( GENEXT_PATH . 'lib/admin/genesis-extender-custom-options.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-user-meta.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-build-styles.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-write-files.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-image-uploader.php' );
	require_once( GENEXT_PATH . 'lib/update/genesis-extender-edd-updater.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-import-export.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-ez-structures.php' );
	require_once( GENEXT_PATH . 'lib/admin/metaboxes/genesis-extender-metaboxes.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-templates.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-labels.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-conditionals.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-widget-areas.php' );
	require_once( GENEXT_PATH . 'lib/functions/genesis-extender-hook-boxes.php' );
	require_once( GENEXT_PATH . 'lib/update/genesis-extender-update.php' );
}
