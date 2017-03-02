<?php

namespace CKBR;

class Info {

    const SLUG = 'gz-cookie-banner';
    const VERSION = '1.0';

    public static function get_plugin_title() {
        $path = plugin_dir_path(dirname(__FILE__)) . self::SLUG . '.php';
        return get_plugin_data($path)['Name'];
    }
}
