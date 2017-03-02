<?php

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}

// Delete options
delete_option('ckbr_settings');

// Delete options in Multisite
delete_site_option('ckbr_settings');
