<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://webmachine.io/chimp-machine
 * @since      1.0.0
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/public
 * @author     Christopher Mosure <cj@webmachine.io>
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
	 * @since      0.1.0
	 * @param      string    $Chimp_Machine       The name of the plugin.
	 * @param      string    $version             The version of this plugin.
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

		wp_enqueue_style( $this->Chimp_Machine, plugin_dir_url( __FILE__ ) . 'css/chimp-machine-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->Chimp_Machine, plugin_dir_url( __FILE__ ) . 'js/chimp-machine-public.js', array( 'jquery' ), $this->version, false );

	}

}
