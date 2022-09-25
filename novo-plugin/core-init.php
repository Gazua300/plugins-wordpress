<?php
/**
 * this file initialize all the components of the plugin
 */

 if( ! defined('WPINC')){
    die();
 }

 define('CORE_INC', dirname(__FILE__) . '/inc/');
 define('CORE_IMG', plugins_url('img/', __FILE__));
 define('CORE_JS', plugins_url('js/', __FILE__));
 define('CORE_CSS', plugins_url('css/', __FILE__));

 function np_register_core_css(){
   wp_enqueue_style('np-core', CORE_CSS . 'core.css', null, time(), 'all');
  }
  
  add_action('wp_enqueue_scripts', 'np_register_core_css');

  function np_register_core_js(){
    wp_enqueue_script('np-core', CORE_JS . 'core.js', null, time(), 'all');
  }
  
  add_action('wp_enqueue_scripts', 'np_register_core_js');  
  /*
  */

?>