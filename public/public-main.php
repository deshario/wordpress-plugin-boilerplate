<?php

class DesharioBPlate_Public {

	private $plugin_name;

	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/deshario-bplate-public.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/deshario-bplate-public.js', array( 'jquery' ), $this->version, false );
	}

	public function testAjaxRequest() {
		$current_user = wp_get_current_user();
		wp_send_json_success($current_user->display_name);
	   	die();
	}

	public function guestTestAjaxRequest() {
		wp_send_json_success('Not Login');
	   	die();
	}

	public function postSampleAjaxRequest(){
		check_ajax_referer('sample-nonce','security'); // Validate Nonce
		$username = isset($_POST['username']) ? $_POST['username'] : '-';
		wp_send_json_success($username);
	   	die();
	}

	public function shortcode1( $atts, $content = null ){
		wp_register_style('semanticCss','https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css');
		wp_enqueue_style('semanticCss');

		wp_register_script('semanticJs', 'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js', null, null, true );
		wp_enqueue_script('semanticJs');

		wp_enqueue_script(
			'submitForm',
			plugin_dir_url( __FILE__ ).'js/submitForm.js',
			array('jquery'),
			$this->version,
			false
		);         
		wp_localize_script(
			'submitForm',
			'desharioLocalize',
			array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'key' => 'value',
				'deshario_nonce' => wp_create_nonce('sample-nonce')
			)
		);

		ob_start();
		include_once('partials/form.php');
		return ob_get_clean();
	}

	public function shortcode2($atts, $content = "") {
		wp_register_style('bootstrapAsset','https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css');
		wp_enqueue_style('bootstrapAsset'); // Enque on shortcode only
		ob_start();
		include_once('partials/panel.php');
		return ob_get_clean();
	}

}
