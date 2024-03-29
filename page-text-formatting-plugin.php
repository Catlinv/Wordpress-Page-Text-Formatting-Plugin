<?php
/*
Plugin Name: Text Formatting
Plugin URI: http://#.com
Description: Description
Version: 1.0.0
Author: Me
Author URI: http://#.com
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activatePlugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activatePlugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivatePlugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivatePlugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}