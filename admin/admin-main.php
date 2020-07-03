<?php

class DesharioBPlate_Admin {

	private $plugin_name;
	
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/deshario-plate-admin.css', array(), $this->version, 'all' );
		wp_register_style('semantic_ui_css', 'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css', false, '1.0.0' );
		wp_enqueue_style('semantic_ui_css');
		wp_register_script('semantic_ui_js', 'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js', null, null, true );
		wp_enqueue_script('semantic_ui_js');
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/deshario-plate-admin.js', array( 'jquery' ), $this->version, false );
	}
	
	public function setupDBPlateMenu() {
		add_menu_page(
			'Deshario Plate', 'Deshario Plate', 'manage_options',
			 $this->plugin_name, array($this, 'dbPlateMenu1'),
			'dashicons-image-filter'
		);
	}

	public function dbPlateMenu1() {
		require_once plugin_dir_path( __FILE__ ). 'partials/tabMenu.php';
	}

	public function hideAllNotices(){
		$pluginAdminPage = sanitize_text_field($_GET['page']);
		if($pluginAdminPage == 'deshario-bplate'){
			remove_all_actions('admin_notices');
			remove_all_actions('all_admin_notices');
		}
	}

	function initDesharioPlate(){
		if(is_admin() && get_option('activate_plugin_name') == 'just-activated-plate'){
		  delete_option('activate_plugin_name');
		  wp_enqueue_script('clearLocalStorage', plugin_dir_url( __FILE__ ) . '../admin/js/clearStorage.js', array( 'jquery' ), $this->version, false );
		}
	}

}
