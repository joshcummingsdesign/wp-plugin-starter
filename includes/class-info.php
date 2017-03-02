<?php

namespace CKBR;

class Info {

    const SLUG        = 'gz-cookie-banner';
    const VERSION     = '1.0';
    const OPTION_NAME = 'ckbr_settings';
    const UPDATE_URL  = 'https://update.madebygrizzly.com/wp-update-server/';

    public static function get_plugin_title() {
        $path = plugin_dir_path(dirname(__FILE__)) . self::SLUG . '.php';
        return get_plugin_data($path)['Name'];
    }
}
