<?php

/*****************************************
* Register scripts and styles
/****************************************/

function myplugin_register_scripts() {

	wp_register_style( 'myplugin_styles', plugin_dir_url( __FILE__ ) . 'css/myplugin-styles.css' );

  wp_register_script( 'myplugin_script', plugin_dir_url( __FILE__ ) . 'js/myplugin-script.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'myplugin_register_scripts' );

/*****************************************
* Add shortcode
/****************************************/

function myplugin_display_slider($atts) {

	$atts = shortcode_atts(
	array(
		'name' => ''
	), $atts);

	$options = get_option( 'myplugin_options' );

	include ( 'partials/myplugin-public-content.php' );

}
add_shortcode( 'myplugin', 'myplugin_display_slider' );
