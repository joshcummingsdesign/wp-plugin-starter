<?php

namespace CKBR;

class Plugin {

    protected $loader;
    protected $plugin_name;
    protected $version;
    protected $option_name;
    private   $update_url;

    public function __construct() {
        $this->plugin_name = 'gz-cookie-banner';
        $this->version     = '1.0';
        $this->option_name = 'ckbr_settings';
        $this->update_url  = 'https://update.madebygrizzly.com/wp-update-server/';
        $this->load_dependencies();
        $this->define_admin_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/vendor/plugin-update-checker/plugin-update-checker.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-admin.php';
        $this->loader = new Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new Admin($this->plugin_name, $this->version, $this->option_name);
        $this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_menus');
    }

    private function check_for_updates() {
        $myUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
            $this->update_url . '?action=get_metadata&slug=' . $this->plugin_name,
            __FILE__,
            $this->plugin_name
        );
    }

    public function run() {
        $this->loader->run();
        $this->check_for_updates();
    }
}
