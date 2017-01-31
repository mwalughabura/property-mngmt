<?php
   /*
   Plugin Name: Property Management
   Plugin URI: http://mwalughabura.wordpress.com
   Description: A plugin that allows one to manage property.
   Version: 0.0.1
   Author: Mwalugha Bura
   Author URI: http://mrtotallyawesome.com
   License: GPL2
   */


function property_add_view() {
   if(is_single()) {
      global $post;
      $current_views = get_post_meta($post->ID, "property_views", true);
      if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
         $current_views = 0;
      }
      $new_views = $current_views + 1;
      update_post_meta($post->ID, "property_views", $new_views);
      return $new_views;
   }
}
?>