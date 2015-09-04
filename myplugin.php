<?php
/*
Plugin Name: Snazzy Slider
Plugin URI:  https://github.com/joshcummingsdesign/snazzy-slider
Description: A simple and elegant way to display three featured posts.
Version:     1.0
Author:      Josh Cummings
Author URI:  http://joshcummingsdesign.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: snazzy-slider
*/

/*****************************************
* Global variables
/****************************************/

$myplugin_options = get_option( 'myplugin_settings' ); // Get plugin settings from the options table

/*****************************************
* Includes
/****************************************/

include ( 'includes/myplugin-data-processing.php' ); // Controls the saving of data
include ( 'public/myplugin-public.php' ); // Display content functions for the front end
include ( 'admin/myplugin-admin.php' ); // The plugin admin page

/*****************************************
* Enqueue styles and scripts
/****************************************/

function myplugin_load_scripts() {
  if ( is_single() ) {
    wp_enqueue_style( 'myplugin-styles', plugin_dir_url( __FILE__ ) . 'public/css/myplugin-styles.css' );
  }
}
add_action( 'wp_enqueue_scripts', 'myplugin_load_scripts' );
