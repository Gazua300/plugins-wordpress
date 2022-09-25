<?php

/**
 * Plugin Name:       Novo plugin
 * Plugin URI:        https://github.com/Gazua300/image-upload
 * Description:       Upload images from desktop directories to wordpress
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Flamarion França
 * Author URI:        https://github.com/Gazua300
 * License:           GPL v2 or later
 * License URI:       https://flamarionfranca.blogspot.com/2022/09/gnu-general-public-license-version-3-29.html
 * Update URI:        https://github.com/Gazua300/image-upload
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 if( ! defined('WPINC')){
    die();
 }

 if(file_exists(plugin_dir_path(__FILE__) . 'core-init.php')){
   require_once(plugin_dir_path(__FILE__) . 'core-init.php');
 }

?>