<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/public
 * @author     Your Name <email@example.com>
 */
class Chimp_Machine_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $Chimp_Machine    The ID of this plugin.
	 */
	private $Chimp_Machine;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $Chimp_Machine       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Chimp_Machine, $version ) {

		$this->Chimp_Machine = $Chimp_Machine;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chimp_Machine_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chimp_Machine_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Chimp_Machine, plugin_dir_url( __FILE__ ) . 'css/chimp-machine-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Chimp_Machine_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chimp_Machine_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Chimp_Machine, plugin_dir_url( __FILE__ ) . 'js/chimp-machine-public.js', array( 'jquery' ), $this->version, false );

	}

}
