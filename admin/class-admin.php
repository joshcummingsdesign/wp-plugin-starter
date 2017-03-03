<?php

namespace PLUGIN_NAME;

/**
 * The code used in the admin.
 */
class Admin
{
    private $plugin_slug;
    private $version;
    private $option_name;
    private $settings;
    private $settings_group;

    public function __construct($plugin_slug, $version, $option_name) {
        $this->plugin_slug = $plugin_slug;
        $this->version = $version;
        $this->option_name = $option_name;
        $this->settings = get_option($this->option_name);
        $this->settings_group = $this->option_name.'_group';
    }

    /**
     * Generate settings fields by passing an array of data (see the render method).
     *
     * @param array $field_args The array that helps build the settings fields
     * @param array $settings   The settings array from the options table
     *
     * @return string The settings fields' HTML to be output in the view
     */
    private function custom_settings_fields($field_args, $settings) {
        $output = '';

        foreach ($field_args as $field) {
            $slug = $field['slug'];
            $setting = $this->option_name.'['.$slug.']';
            $label = esc_attr__($field['label'], 'plugin-name');
            $output .= '<h3><label for="'.$setting.'">'.$label.'</label></h3>';

            if ($field['type'] === 'text') {
                $output .= '<p><input type="text" id="'.$setting.'" name="'.$setting.'" value="'.$settings[$slug].'"></p>';
            } elseif ($field['type'] === 'textarea') {
                $output .= '<p><textarea id="'.$setting.'" name="'.$setting.'" rows="10">'.$settings[$slug].'</textarea></p>';
            }
        }

        return $output;
    }

    public function assets() {
        wp_enqueue_style($this->plugin_slug, plugin_dir_url(__FILE__).'css/plugin-name-admin.css', [], $this->version);
        wp_enqueue_script($this->plugin_slug, plugin_dir_url(__FILE__).'js/plugin-name-admin.js', ['jquery'], $this->version, true);
    }

    public function register_settings() {
        register_setting($this->settings_group, $this->option_name);
    }

    public function add_menus() {
        $plugin_name = Info::get_plugin_title();
        add_submenu_page(
            'options-general.php',
            $plugin_name,
            $plugin_name,
            'manage_options',
            $this->plugin_slug,
            [$this, 'render']
        );
    }

    /**
     * Render the view using MVC pattern.
     */
    public function render() {

        // Generate the settings fields
        $field_args = [
            // [
            //     'label' => 'Text Label',
            //     'slug'  => 'text-slug',
            //     'type'  => 'text'
            // ],
            // [
            //     'label' => 'Textarea Label',
            //     'slug'  => 'textarea-slug',
            //     'type'  => 'textarea'
            // ]
        ];

        // Model
        $settings = $this->settings;

        // Controller
        $fields = $this->custom_settings_fields($field_args, $settings);
        $settings_group = $this->settings_group;
        $heading = Info::get_plugin_title();
        $submit_text = esc_attr__('Submit', 'plugin-name');

        // View
        require_once plugin_dir_path(dirname(__FILE__)).'admin/partials/view.php';
    }
}
