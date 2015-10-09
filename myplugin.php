<?php
/*
Plugin Name: myplugin
Plugin URI:  http://example.com
Description: myplugin description
Version:     1.0
Author:      Your name
Author URI:  http://example.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: myplugin
Domain Path: /languages
*/

/*****************************************
* Installation
/****************************************/

function myplugin_install() {

	$default_options = array();

	update_option( 'myplugin_options', $default_options );
}
register_activation_hook( __FILE__, 'myplugin_install' );

/*****************************************
* Includes
/****************************************/

include ( 'public/myplugin-public.php' );
include ( 'admin/myplugin-admin.php' );
