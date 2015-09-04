<?php

/*****************************************
* Admin Page
/****************************************/

// Creates the admin menu
function myplugin_add_admin_menu() {
  add_menu_page(
    'Snazzy Slider',
    'Snazzy Slider',
    'manage_options',
    'snazzy-slider',
    'myplugin_display_admin_content'
    // You can add an icon here
  );
}
add_action( 'admin_menu', 'myplugin_add_admin_menu' );

// Registers the settings for the options table
function myplugin_register_settings() {
  register_setting( 'myplugin_settings_group', 'myplugin_settings' );
}
add_action( 'admin_init', 'myplugin_register_settings' );

// Displays the admin menu content
function myplugin_display_admin_content() {
  global $myplugin_options;
  include ( 'partials/myplugin-admin-display.php' ); // The content for the plugin admin page
}
