<?php

/*****************************************
* Admin data processing
/****************************************/

function snzysldr_add_slider() {

  check_ajax_referer( 'snzysldr-nonce', 'security' );

  $output = get_option( 'snzysldr_options' );
  $input = sanitize_text_field( $_POST['name'] );
  $input = preg_replace('/\s+/', ' ', $input);
  $input = str_replace( ' ', '_', $input );

  if ( !empty( $input ) ) {
    if ( !preg_match( '/[^a-zA-Z0-9_ ]/', $input ) ) {
      if ( !isset( $output['sliders'][$input] ) ) {

        $output['sliders'][$input] = array(
          'images' => array(
            '-1'
          ),
          'settings' => array(
            'img_size0' => 'contain',
            'img_size1' => 'contain',
            'img_size2' => 'contain',
            'img_size3' => 'contain',
            'img_size4' => 'contain',
            'img_size5' => 'contain',
            'img_color0' => '#22272c',
            'img_color1' => '#22272c',
            'img_color2' => '#22272c',
            'img_color3' => '#22272c',
            'img_color4' => '#22272c',
            'img_color5' => '#22272c',
            'slider_height' => '540',
            'arrows' => 'on',
            'controls_align' => 'left',
            'controls_color' => '#ffffff',
            'sel_color' => '#ff6347',
            'autoplay' => 'on',
            'slide_duration' => '8000',
            'fx' => 'slide',
            'fade_color' => '#22272c',
            'text_enable' => 'off',
            'text_fx' => 'none',
            'text_color' => '#ffffff',
            'text_bg' => '#4688f1',
            'link_color' => '#dddddd',
            'link_hover' => '#ffffff',
            'link_align' => 'left'
          )
        );
        $output['current'] = $input;
        update_option( 'snzysldr_options', $output );
        echo 'updated';

      } else {
        die('same');
      }
    } else {
      die('specialchars');
    }
  } else {
    die('blank');
  }

  die();
}
add_action( 'wp_ajax_snzysldr_add_slider', 'snzysldr_add_slider' );


function snzysldr_delete_slider() {

  check_ajax_referer( 'snzysldr-nonce', 'security' );

  $output = get_option( 'snzysldr_options' );
  $input = sanitize_text_field( $_POST['name'] );
  $input = preg_replace('/\s+/', ' ', $input);
  $input = str_replace( ' ', '_', $input );

  if ( !empty( $input ) && !preg_match( '/[^a-zA-Z0-9_ ]/', $input ) && isset( $output['sliders'][$input] ) ) {

    unset( $output['sliders'][$input] );
    $last_added = array_keys( $output['sliders'] );
    $last_added = end( $last_added );
    $output['current'] = $last_added;
    $last_added = str_replace( '_', ' ', $last_added );
    update_option( 'snzysldr_options', $output );
    echo 'updated';

  } else {
    die('error');
  }

  die();
}
add_action( 'wp_ajax_snzysldr_delete_slider', 'snzysldr_delete_slider' );


function snzysldr_update_current() {

  check_ajax_referer( 'snzysldr-nonce', 'security' );

  $output = get_option( 'snzysldr_options' );
  $input = $_POST['name'];

  if ( !empty( $input ) && !preg_match( '/[^a-zA-Z0-9_ ]/', $input ) && isset( $output['sliders'][$input] ) ) {

    $output['current'] = $input;
    update_option( 'snzysldr_options', $output );
    echo 'updated';

  } else {
    die('error');
  }

  die();
}
add_action( 'wp_ajax_snzysldr_update_current', 'snzysldr_update_current' );
