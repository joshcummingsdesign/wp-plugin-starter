<?php

/*****************************************
* Displays content for the front end
/****************************************/

function myplugin_add_content($content) {

  global $myplugin_options;

  if ( is_single() && ! empty( $myplugin_options['enable'] ) ) {
    $content .= '<p class="twitter-message ' . $myplugin_options['theme'] . '">Follow me on <a href="' . $myplugin_options['twitter_url'] . '">Twitter</a>.</p>';
  }
  return $content;
}
add_filter( 'the_content', 'myplugin_add_content' );
