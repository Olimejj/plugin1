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
	function __construct(){
		add_action('init', array( $this, 'custom_post_type')); 
	}
	function activate(){
		flush_rewrite_rules();	
	}
	function deactivate(){
			
		flush_rewrite_rules();	
	}
	function uninstall(){
		
	}
	function custom_post_type(){
		register_post_type( 'book', ['public' => 'true','label' => 'Books']);
	}
}
if (class_exists('HandyDandy')){
	$handy_var = new HandyDandy();
}

//activation
register_activation_hook( __FILE__, array( $handy_var, 'activate'));

//deactivation

register_deactivation_hook( __FILE__, array( $handy_var, 'deactivate'));

//uninstall
