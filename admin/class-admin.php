<?php

namespace CKBR;

class Admin {

    private $plugin_name;
    private $version;
    private $option_name;
    private $group;

    public function __construct($plugin_name, $version, $option_name) {
        $this->plugin_name  = $plugin_name;
        $this->version      = $version;
        $this->option_name  = $option_name;
        $this->group        = $this->option_name . '_group';
    }

    private function get_the_plugin_title() {
        $path = plugin_dir_path(dirname(__FILE__)) . $this->plugin_name . '.php';
        return get_plugin_data($path)['Name'];
    }

    private function custom_settings_fields($field_args, $settings) {

        $output = '';

        foreach ($field_args as $field) {
            $slug    = $field['slug'];
            $setting = $this->option_name . '[' . $slug . ']';
            $label   = esc_attr($field['label'], 'ckbr');
            $output  .= '<h3><label for="' . $setting . '">' . $label . '</label></h3>';

            if ($field['type'] === 'text') {
                $output .= '<p><input type="text" id="' . $setting . '" name="' . $setting . '" value="' . $settings[$slug] . '"></p>';
            } elseif ($field['type'] === 'textarea') {
                $output .= '<p><textarea id="' . $setting . '" name="' . $setting . '" rows="8" cols="40">' . $settings[$slug] . '</textarea></p>';
            }
        }

        return $output;
    }

    public function register_settings() {
        register_setting($this->group, $this->option_name);
    }

    public function add_menus() {
        add_submenu_page(
            'options-general.php',
            'Cookie Banner',
            'Cookie Banner',
            'manage_options',
            'cookie-banner',
            [$this, 'render']
        );
    }

    public function render() {

        $field_args = [
            [
                'label' => 'Banner Text',
                'slug'  => 'banner-text',
                'type'  => 'textarea'
            ],
            [
                'label' => 'Confirm Text',
                'slug'  => 'confirm-text',
                'type'  => 'text'
            ],
            [
                'label' => 'Deny Text',
                'slug'  => 'deny-text',
                'type'  => 'text'
            ],
            [
                'label' => 'Deny Redirect',
                'slug'  => 'deny-redirect',
                'type'  => 'text'
            ],
            [
                'label' => 'Cookie Expiration (Days)',
                'slug'  => 'expires',
                'type'  => 'text'
            ],
            [
                'label' => 'Cookie Path',
                'slug'  => 'path',
                'type'  => 'text'
            ]
        ];

        $settings = get_option($this->option_name);
        $fields   = $this->custom_settings_fields($field_args, $settings);
        $group    = $this->group;
        $heading  = $this->get_the_plugin_title();

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/view.php';
    }
}
