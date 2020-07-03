<?php

/**
 * Plugin Name:       Deshario Boilerplate
 * Plugin URI:        http://github.com/deshario
 * Description:       Wordpress Plugin Boilerplate
 * Version:           1.0.0
 * Author:            Deshario
 * Author URI:        http://github.com/deshario
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       deshario-boilerplate
 * Domain Path:       /languages
 */

if (!defined('WPINC')){
	die;
}

define('PLUGIN_NAME_VERSION', '1.0.0');

function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/activator.php';
	DesharioBPlate_Activator::activate();
	add_option('activate_plugin_name','just-activated-plate');
}

function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/deactivator.php';
	DesharioBPlate_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );

register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

require plugin_dir_path( __FILE__ ) . 'includes/main.php';

function runDesharioPlate() {
	$plugin = new DesharioBPlate();
	$plugin->run();
}

runDesharioPlate();