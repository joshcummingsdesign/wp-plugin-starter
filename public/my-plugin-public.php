<?php

/*****************************************
* Displays content for the front end
/****************************************/

function snzysldr_add_content($content) {

  global $snzysldr_options;

  if ( is_single() && ! empty( $snzysldr_options['enable'] ) ) {
    $content .= '<p class="twitter-message ' . $snzysldr_options['theme'] . '">Follow me on <a href="' . $snzysldr_options['twitter_url'] . '">Twitter</a>.</p>';
  }
  return $content;
}
add_filter( 'the_content', 'snzysldr_add_content' );
