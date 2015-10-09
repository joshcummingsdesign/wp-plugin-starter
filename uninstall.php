<?php

/*****************************************
* Uninstall
/****************************************/

// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

// Delete options
delete_option( 'myplugin_options' );

// Delete options in Multisite
delete_site_option( 'myplugin_options' );
