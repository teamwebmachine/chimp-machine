<?php

/**
 *
 * @link              http://webmachine.io/chimp-machine
 * @since             1.0.0
 * @package           Chimp_Machine
 *
 * @wordpress-plugin
 * Plugin Name:       Chimp Machine
 * Plugin URI:        http://webmachine.io/chimp-machine
 * Description:       Create posts from MailChimp campaigns.
 * Version:           1.0.0
 * Author:            Web Machine
 * Author URI:        http://webmachine.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chimp-machine
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chimp-machine-activator.php
 */
function activate_Chimp_Machine() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chimp-machine-activator.php';
	Chimp_Machine_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chimp-machine-deactivator.php
 */
function deactivate_Chimp_Machine() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-chimp-machine-deactivator.php';
	Chimp_Machine_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Chimp_Machine' );
register_deactivation_hook( __FILE__, 'deactivate_Chimp_Machine' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-chimp-machine.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Chimp_Machine() {

	$plugin = new Chimp_Machine();
	$plugin->run();

}
run_Chimp_Machine();
