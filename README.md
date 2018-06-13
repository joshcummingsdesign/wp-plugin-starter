# WP Plugin Starter

[![semantic versioning](https://img.shields.io/github/release/joshcummingsdesign/wp-plugin-starter.svg)](https://github.com/joshcummingsdesign/wp-plugin-starter)

An opinionated fork of the [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

## Getting Started

1. Use the [WP Plugin Generator](https://joshcummingsdesign.com/plugin-generator)

* Create settings fields by adding to the array in the render method in `admin/class-admin.php`.

* Get the data from your settings fields in the render method in `frontend/class-frontend.php` where it says controller.

* Use that data in your default template found in `frontend/partials/view.php`.

* Users will have the ability to create their own template in a folder called `partials/plugin-name.php` in their theme. All the variables you declare in the controller will be accessible to them.

* [Here is an example of how to make an AJAX call in the admin.](https://github.com/joshcummingsdesign/wp-plugin-starter/issues/17)

## Without Generator

If you did not use the generator, change the following generic info:
  * Namespaces in all PHP files - `namespace PLUGIN_NAME;`
  * `./plugin-name`
  * `plugin-name.php`
  * `class-info.php` - `SLUG`, `VERSION`, `OPTION_NAME`, `UPDATE_URL`
  * Make sure the `UPDATE_URL` has a trailing slash at the end
  * `frontend/class-frontend.php` - assets method
  * `fronend/js/plugin-name-frontend.js`
  * `fronend/css/plugin-name-frontend.css`
  * `admin/class-admin.php` - assets method
  * `admin/class-admin.php` - text domain
  * `admin/js/plugin-name-admin.js`
  * `admin/css/plugin-name-admin.css`
  * `uninstall.php` - option names
