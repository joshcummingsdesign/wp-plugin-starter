<?php

namespace PLUGIN_NAME;

/**
 * This class defines all code necessary to run during the plugin's activation.
 */
class Activator
{
    /**
     * Sets the default options in the options table on activation.
     */
    public static function activate() {
        $option_name = INFO::OPTION_NAME;
        if (empty(get_option($option_name))) {
            $default_options = [
                // 'key' => 'value',
            ];
            update_option($option_name, $default_options);
        }
    }
}
