<?php
/*
Plugin Name: Dashboard License Keys
Plugin URI: http://www.tomatillodesign.com
Description: Show My License Keys for Easy Copying ***DELETE AFTER USE***
Author: Chris Liu-Beers | Tomatillo Design
Version: 1.0
*/

function clb_register_my_dashboard_widget() {
    global $wp_meta_boxes;

    $site_title = get_bloginfo();
    $welcome = 'Plugin Licenses';

    wp_add_dashboard_widget(
        'my_dashboard_widget',
        $welcome,
        'clb_my_dashboard_widget_display'
    );

    $dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

    $my_widget = array( 'my_dashboard_widget' => $dashboard['my_dashboard_widget'] );
    unset( $dashboard['my_dashboard_widget'] );

    $sorted_dashboard = array_merge( $my_widget, $dashboard );
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'clb_register_my_dashboard_widget' );

function clb_my_dashboard_widget_display() {
    ?>
 
    <p>Advanced Custom Fields: b3JkZXJfaWQ9MzY5OTJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA4LTEwIDIxOjM3OjQ5</p>
    <p>Gravity Forms: 8cb727a61af383c863d31a1ebce750a0</p>
    <p>Genesis Extender: 69f53bd9a8d752adf293322072c9946d</p>
    <p>Soliloquy: 8ea2a0a29aa8373ea537bc5ee2a13cbe</p>
 
    <?php
}