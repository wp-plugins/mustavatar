<?php
/*
 * Plugin Name: Mustavatar
 * Plugin URI: http://dougal.gunters.org/plugins/mustavatar
 * Description: Add mustachified goodness to your site's avatars.
 * Version: 1.0
 * Author: dougal
 * Author URI: http://dougal.gunters.org/
 * License: GPL2
 */

add_filter( 'get_avatar', 'mustavatar' ); 

/*
 * Add mustached goodness!
 */
function mustavatar($imgtag) {
  // extract the original image url from the <img> tag
  if ( preg_match( "/(.*) src='(.*?)'(.*)$/", $imgtag, $matches ) ) {
    $url = $matches[2];
    // es-cah-pay
    $escurl = urlencode( $url );
    
    // 'stache it!
    $imgtag = $matches[1] . "src='http://mustachify.me?src=" . $escurl . "'" . $matches[3];
  }
  
  return $imgtag;
  
}

