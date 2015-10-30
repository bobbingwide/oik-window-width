<?php 
/*
Plugin Name: oik window width
Plugin URI: http://www.oik-plugins.com/oik-plugins/oik-window-width
Description: Simple jQuery code to help with building a responsive website
Version: 0.01
Author: bobbingwide
Author URI: http://www.bobbingwide.com
License: GPL2

    Copyright 2012,2013 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/

add_action( "oik_loaded", "oik_ww_init" );

/**
 * Implement "oik_loaded" action for oik-window-width 
 */
function oik_ww_init() {
  add_action( "wp_footer", "oik_ww_wp_footer" );
}

/**
 * Implement "wp_footer" action for oik-window-width
 */
function oik_ww_wp_footer() {
  wp_enqueue_script( "oik-window-width-js", plugin_dir_url( __FILE__) . "oik-window-width.js", array( 'jquery' ) );
  wp_enqueue_style( "oik-mq-min-max", plugin_dir_url( __FILE__) . "oik-mq-min-max.css" );
  bw_jquery( 'span.cancan', "windowSize", null );
}

add_action( "admin_notices", "oik_ww_activation" );
/**
*/ 
function oik_ww_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_" . $plugin_basename, __FUNCTION__ );   
    require_once( "admin/oik-activation.php" );
  }  
  $depends = "oik:1.17";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}


