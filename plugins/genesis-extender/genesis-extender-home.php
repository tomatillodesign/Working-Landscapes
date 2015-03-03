<?php
/**
 * This is the Static Homepage Template that is used when
 * the Genesis Extender Static Homepage feature is enabled.
 *
 * @package Extender
 */

add_action( 'genesis_meta', 'genesis_extender_home_genesis_meta' );
/**
 * Create Static Homepage structure.
 *
 * @since 1.0
 */
function genesis_extender_home_genesis_meta()
{
	if( genesis_extender_get_settings( 'static_homepage_type' ) == 'content' )
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_' . genesis_extender_get_settings( 'static_homepage_content_layout' ) );
}

if( genesis_extender_get_settings( 'static_homepage_type' ) == 'full' )
{
	get_header();

	genesis_extender_do_ez_home();

	get_footer();
}
else
{
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', 'genesis_extender_do_ez_home' );
	
	genesis();
}
