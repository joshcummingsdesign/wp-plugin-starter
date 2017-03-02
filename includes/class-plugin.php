<?php

namespace CKBR;

class Plugin {

    private $option_name;
    private $slug;
    private $update_url;

    public function __construct() {
        $this->option_name = 'ckbr_settings';
        $this->slug        = 'gz-cookie-banner';
        $this->update_url  = 'https://update.madebygrizzly.com/wp-update-server/';
    }

    /**
     * Checks the update server for a new verion
     * @return void
     */
    private function check_for_updates() {

        $update_url = $this->update_url;
        $slug       = $this->slug;

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/vendor/plugin-update-checker/plugin-update-checker.php';

        $myUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
            $update_url . '?action=get_metadata&slug=' . $slug,
            __FILE__,
            $slug
        );
    }

    public function run() {
        $this->check_for_updates();
    }
}
