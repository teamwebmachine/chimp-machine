<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://webmachine.io/chimp-machine
 * @since      1.0.0
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Chimp_Machine
 * @subpackage Chimp_Machine/admin
 * @author     Christopher Mosure <cj@webmachine.io>
 */
class Chimp_Machine_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Chimp_Machine    The ID of this plugin.
	 */
	private $Chimp_Machine;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'chimp_machine';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Chimp_Machine       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Chimp_Machine, $version ) {

		$this->Chimp_Machine = $Chimp_Machine;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->Chimp_Machine, plugin_dir_url( __FILE__ ) . 'css/chimp-machine-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->Chimp_Machine, plugin_dir_url( __FILE__ ) . 'js/chimp-machine-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Chimp Machine Settings', 'chimp-machine' ),
			__( 'Chimp Machine', 'chimp-machine' ),
			'manage_options',
			$this->Chimp_Machine,
			array( $this, 'display_options_page' )
		);
	
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/chimp-machine-admin-display.php';
	}

	/**
	 * Register settings for plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting($option_name) {
		// Add a General section
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', 'chimp-machine' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->Chimp_Machine
		);
		// Add Mailchimp API setting field
		add_settings_field(
			$this->option_name . '_mcapi',
			__( 'Mailchimp API Key', 'chimp-machine' ),
			array( $this, $this->option_name . '_mcapi_cb' ),
			$this->Chimp_Machine,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_mcapi' )
		);
		// Register Mailchimp API setting field
		register_setting( $this->Chimp_Machine, $this->option_name . '_mcapi', 'sanitize_text_field' );

		// Register Mailchimp API datacenter
		register_setting( $this->Chimp_Machine, $this->option_name . '_mcapidatacenter', 'sanitize_text_field' );
	}

	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function chimp_machine_general_cb() {
		echo '<p>' . __( 'General settings for the Chimp Machine plugin.', 'chimp-machine' ) . '</p>';
	}

	/**
	 * Render the Mailchimp API input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function chimp_machine_mcapi_cb() {
		$mcapi = get_option( $this->option_name . '_mcapi' );
		echo '<input type="text" name="' . $this->option_name . '_mcapi' . '" id="' . $this->option_name . '_mcapi' . '" value="' . $mcapi . '"> ';
		// Set Datacenter as well!
		$mcapidatacenter = substr($mcapi, strpos($mcapi, "-") + 1);
		update_option(
			$this->option_name . '_mcapidatacenter',
			$mcapidatacenter
		);

		// Verify API settings
		$this->chimp_machine_api_verify($mcapi, $mcapidatacenter);
	}


	/**
	 * Check if Mailchimp API key is valid
	 *
	 * @since 1.0.0
	 */
	public function chimp_machine_api_verify($mcapi, $mcapidatacenter) {
		$auth = base64_encode( 'user:' . $mcapi );
		$url  = 'https://' . $mcapidatacenter . '.api.mailchimp.com/3.0/';

		$args = array(
			'headers' => array(
				'Authorization' => 'Basic ' . $auth,
				'Content-Type' => 'application/json'
			)
		);
		$response = wp_remote_get($url, $args);
		$data = json_decode($response['body'], true);

		if ( $response['response']['code'] == '200') {
			echo '<br /><em><strong><span style="color:#00ff00;">Success!</span></strong><br />You are connected to the "' . $data['account_name'] . '" MailChimp account.</em>';
		} else {
			echo '<br /><em><span style="color:#ff0000;">There is an issue with your Mailchimp API key.</span><br />' . $data['title'] . ': ' . $data['detail'] . '</em>';
		}
	}


}
