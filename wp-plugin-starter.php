<?php
/**
 * Plugin Name:       WP Plugin Starter
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-plugin-starter
 * Domain Path:       /languages
 */

namespace CKBR;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Runs activation scripts
 */
function activate() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-activator.php';
	Activator::activate();
}
register_activation_hook(__FILE__, __NAMESPACE__ . '\\activate');

/**
 * The main plugin class
 */
require plugin_dir_path(__FILE__) . 'includes/class-plugin.php';

/**
 * Run the plugin
 */
function run() {
    $plugin = new Plugin();
    $plugin->run();
}
run();
