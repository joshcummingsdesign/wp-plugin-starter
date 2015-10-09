<?php

/*****************************************
* Add admin menu
/****************************************/

function myplugin_add_admin_menu() {

  $options = get_option( 'myplugin_options' );

  add_menu_page(
    $page_title,
    $menu_title,
    $capability,
    $menu_slug,
    $function,
    $icon_url,
    $position
  );

}
add_action( 'admin_menu', 'myplugin_add_admin_menu' );

/*****************************************
* Register scripts and styles
/****************************************/

function myplugin_admin_scripts() {

  wp_register_style( 'myplugin_admin_styles', plugins_url( 'css/myplugin-admin.css', __FILE__ ) );

  wp_register_script( 'myplugin_admin_script', plugins_url( 'js/myplugin-admin-script.js', __FILE__ ), array( 'jquery' ) );

}
add_action( 'admin_enqueue_scripts', 'myplugin_admin_scripts' );

/*****************************************
* Data processing
/****************************************/

include ( 'includes/myplugin-data-processing.php' );

/*****************************************
* Display admin content
/****************************************/

function myplugin_display_admin_content() {

  $options = get_option( 'myplugin_options' );

  include ( 'partials/myplugin-admin-content.php' );

}
