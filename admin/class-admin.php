<?php

namespace CKBR;

class Admin {

    private $plugin_slug;
    private $version;
    private $option_name;
    private $settings;
    private $settings_group;

    public function __construct($plugin_slug, $version, $option_name) {
        $this->plugin_slug    = $plugin_slug;
        $this->version        = $version;
        $this->option_name    = $option_name;
        $this->settings        = get_option($this->option_name);
        $this->settings_group = $this->option_name . '_group';
    }

    private function custom_settings_fields($field_args, $settings) {

        $output = '';

        foreach ($field_args as $field) {
            $slug    = $field['slug'];
            $setting = $this->option_name . '[' . $slug . ']';
            $label   = esc_attr__($field['label'], 'ckbr');
            $output  .= '<h3><label for="' . $setting . '">' . $label . '</label></h3>';

            if ($field['type'] === 'text') {
                $output .= '<p><input type="text" id="' . $setting . '" name="' . $setting . '" value="' . $settings[$slug] . '"></p>';
            } elseif ($field['type'] === 'textarea') {
                $output .= '<p><textarea id="' . $setting . '" name="' . $setting . '" rows="10">' . $settings[$slug] . '</textarea></p>';
            }
        }

        return $output;
    }

    public function assets() {
        wp_enqueue_style($this->plugin_slug, plugin_dir_url(__FILE__) . 'css/ckbr-admin.css', [], $this->version);
        wp_enqueue_script($this->plugin_slug, plugin_dir_url(__FILE__) . 'js/ckbr-admin.js', ['jquery'], $this->version, true);
    }

    public function register_settings() {
        register_setting($this->settings_group, $this->option_name);
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

        // Model
        $settings = $this->settings;

        // Controller
        $fields         = $this->custom_settings_fields($field_args, $settings);
        $settings_group = $this->settings_group;
        $heading        = Info::get_plugin_title();
        $submit_text    = esc_attr__('Submit', 'ckbr');

        // View
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/view.php';
    }
}
