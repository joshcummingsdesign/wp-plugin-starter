# WP Plugin Starter

[![semantic versioning](https://img.shields.io/github/release/joshcummingsdesign/wp-plugin-starter.svg)](https://github.com/joshcummingsdesign/wp-plugin-starter)

An opinionated fork of the [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

## Getting Started

TODO: Create generator
TODO: Add base unit tests

1. Change the following generic info to fit your plugin:
  * `plugin-name`
  * `plugin-name.php`
  * `class-info.php - SLUG, VERSION, OPTION_NAME, UPDATE_URL`
  * `frontend/class-frontend.php - assets method`
  * `fronend/js/plugin-name-frontend.js`
  * `fronend/css/plugin-name-frontend.css`
  * `admin/class-admin.php - assets method`
  * `admin/class-admin.php - text domain in esc_attr__() calls`
  * `admin/js/plugin-name-admin.js`
  * `admin/css/plugin-name-admin.css`

2. Create settings fields by adding to the array in the render method in `admin/class-admin.php`.

3. Get the data from your settings fields in the render method in `frontend/class-frontend.php` where it says controller.

4. Use that data in your default template found in `frontend/partials/view.php`.

5. Users will have the ability to create their own template in a folder called `partials/plugin-name.php` in their theme. All the variables you declare in the controller will be accessible to them.

6. Let's talk ajax for a moment. To use ajax in the admin, for example, create an `includes` folder and add a file called `class-admin-ajax.php` and use the `wp_ajax_` hook to process the data.
