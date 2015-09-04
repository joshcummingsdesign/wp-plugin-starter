<?php

/*****************************************
* Admin Page
/****************************************/

// Creates the admin menu
function snzysldr_add_admin_menu() {
  add_menu_page(
    'Snazzy Slider',
    'Snazzy Slider',
    'manage_options',
    'snazzy-slider',
    'snzysldr_display_admin_content'
    // You can add an icon here
  );
}
add_action( 'admin_menu', 'snzysldr_add_admin_menu' );

// Registers the settings for the options table
function snzysldr_register_settings() {
  register_setting( 'snzysldr_settings_group', 'snzysldr_settings' );
}
add_action( 'admin_init', 'snzysldr_register_settings' );

// Displays the admin menu content
function snzysldr_display_admin_content() {
  global $snzysldr_options;
  include ( 'partials/snzysldr-admin-display.php' ); // The content for the plugin admin page
}
