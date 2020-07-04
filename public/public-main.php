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

	public function shortcode1( $atts, $content = null ){
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
