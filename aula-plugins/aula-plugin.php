<?php

/**
 * Plugin Name:       Aula plugin
 * Plugin URI:        https://google.com
 * Description:       Plugin para criar um custom post type 
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Flamarion França
 * Author URI:        https://github.com/Gazua300
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 if( ! defined('ABSPATH')){
    die('Invalid request');
 }

 class AulaPlugin {
    public function __construct(){
        add_action('init', Array($this, 'create_custom_post_type_module'));
    }

    public function create_custom_post_type_module(){
        $labels = array(
            'name'                  => _x('Aula plugins', 'aula_plugins', 'text_domain'),

            'singular_name'         => _x('Aula plugins', 'aula_plugins','text_domain'),
            'menu_name'             => __('Aula plugins', 'text_domain'),
            'name_admin_bar'        => __('Aula plugins', 'text_domain'),            
        );

        $args = array(
            'label'                 => __('Aula plugins', 'text_domain'),
            'description'           => __('Descrição da aulda de plugins', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 3,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'menu_icon'             => 'dashicons-format-video',
            'has_archive'           => true,
            'exlude_from_search'    => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );

        register_post_type('aula_plugin', $args);
    }
    
    public function activate(){
        $this->create_custom_post_type_module();

        flush_rewrite_rules();

       /* global $wpdb;
        $wpdb->get_results("INSERT INTO wp_posts (post_author, post_content, post_title, post_status,
        comment_status, ping_status, post_type, comment_count) VALUES (1, 'Teste Danilo', 'Teste danilo',
        'publish', 'open', 'open', 'aula_plugin', 0);");         
        */
    }

    public function deactivate(){
        flush_rewrite_rules();
    }

    public function uninstall(){
        flush_rewrite_rules();

        global $wpdb;
        $wpdb->get_results("delete from wp_posts where post_type = 'aula_plugin';");
    }

 }

 if(class_exists('AulaPlugin')){
    $didoxModulo = new AulaPlugin();

    register_activation_hook(__FILE__, array($didoxModulo, 'activate'));
    register_deactivation_hook(__FILE__, array($didoxModulo, 'deactivate'));
    register_uninstall_hook(__FILE__, array($didoxModulo, 'uninstall'));

 }