<?php

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete options
delete_option('plugin_name_settings');

// Delete options in Multisite
delete_site_option('plugin_name_settings');
