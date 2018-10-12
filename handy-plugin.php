<?php
/**
* @package HandyPlugin
*/
/*
Plugin Name: Handy Plugin
Plugin URI: https://github.com/Olimejj/plugin1.git
Description: This is a very handy plugin.
Version: 1.0.0
Author: J.J. Oliphant
Author: URI: olimejj.com
License: GPLv2 or later
Text Domain: handy-plugin
*/


if(! defined('ABSPATH')){
	die("You are not allowed to access this page directly");
}

class HandyDandy
{

	public $name;
	
	function __construct(){
		add_action('init', array( $this, 'custom_post_type')); 
		$this->name = plugin_basename(__FILE__);
	}
//	function activate(){
//		$this->custom_post_type();
//		flush_rewrite_rules();	
//	}
//	function deactivate(){
//			
//		flush_rewrite_rules();	
//	}
		
	function register(){
		add_action( 'admin_enqueue_scripts', array ($this, 'enqueue'));
		add_action('admin_menu', array( $this , 'add_admin_pages'));
		add_filter("plugin_action_links_$this->name",array($this, 'settings_link'));
	}
	function settings_link($links){
		$settings_link = '<a href="admin.php?page=handy_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
	}
	public function add_admin_pages(){
		add_menu_page( 'Handy Plugin', 'Handy', 'manage_options','handy_plugin', array( $this, 'admin_index'),'dashicons-store', 100);
	}
	public function admin_index(){
		
		require_once plugin_dir_path( __FILE__) . 'templates/admin.php';
		
	}
	function custom_post_type(){
		register_post_type( 'book', ['public' => 'true','label' => 'Books']);
	}
	function enqueue() {
		wp_enqueue_style( 'handystyle', plugins_url('/assets/handystyle.css',__FILE__));
		wp_enqueue_script( 'handyscript', plugins_url('/assets/cool.js',__FILE__));
	}
}
if (class_exists('HandyDandy')){
	$handy_var = new HandyDandy();
	$handy_var->register();
}

//activation
require_once plugin_dir_path( __FILE__) . 'inc/handy-plugin-activate.php';
register_activation_hook( __FILE__, array( 'HandyPluginActivate', 'activate'));

//deactivation
require_once plugin_dir_path( __FILE__) . 'inc/handy-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array( 'HandyPluginDeactivate', 'deactivate'));

//uninstall
//uninstall.php
