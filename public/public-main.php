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

	public function pshortcode( $atts, $content = null ){
		// wp_register_style( 'Font_Awesome', 'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css');
		// wp_enqueue_style('Font_Awesome'); // Enque on shortcode only
		ob_start();
		include_once('partials/display.php');
		return ob_get_clean();
	}

}
