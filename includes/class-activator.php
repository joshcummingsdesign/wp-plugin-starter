<?php

namespace CKBR;

class Activator {

    public static function activate() {
        $option_name = INFO::OPTION_NAME;
        if (empty(get_option($option_name))) {
            $default_settings = [
                'banner-text'   => 'This site uses cookies to enhance your experience.',
                'confirm-text'  => 'Ok',
                'deny-text'     => 'Learn More',
                'deny-redirect' => '/',
                'expires'       => '30',
                'path'          => '/'
            ];
        	update_option($option_name, $default_settings);
        }
    }
}
