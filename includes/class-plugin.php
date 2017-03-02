<?php

namespace CKBR;

class Plugin {

    private $loader;
    private $plugin_slug;
    private $version;
    private $option_name;
    private $update_url;

    public function __construct() {
        $this->plugin_slug = Info::SLUG;
        $this->version     = Info::VERSION;
        $this->option_name = Info::OPTION_NAME;
        $this->update_url  = Info::UPDATE_URL;
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_frontend_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/vendor/plugin-update-checker/plugin-update-checker.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'frontend/class-frontend.php';
        $this->loader = new Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new Admin($this->plugin_slug, $this->version, $this->option_name);
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'assets');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_menus');
    }

    private function define_frontend_hooks() {
        $plugin_frontend = new Frontend($this->plugin_slug, $this->version, $this->option_name);
        $this->loader->add_action('wp_enqueue_scripts', $plugin_frontend, 'assets');
        $this->loader->add_action('wp_footer', $plugin_frontend, 'render');
    }

    private function check_for_updates() {
        $myUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
            $this->update_url . '?action=get_metadata&slug=' . $this->plugin_slug,
            __FILE__,
            $this->plugin_slug
        );
    }

    public function run() {
        $this->loader->run();
        $this->check_for_updates();
    }
}
