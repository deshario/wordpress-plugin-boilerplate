<?php

class DesharioBPlate {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		if(defined('DesharioBPlate_VERSION')){
			$this->version = DesharioBPlate_VERSION;
		}else{
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'deshario-bplate';
		$this->loadDependencies();
		$this->setLocale();
		$this->defineAdminHooks();
		$this->definePublicHooks();
	}

	private function loadDependencies() {

		require_once plugin_dir_path(dirname(__FILE__)).'includes/loader.php';

		require_once plugin_dir_path(dirname(__FILE__)).'includes/i18n.php';

		require_once plugin_dir_path(dirname(__FILE__)).'admin/admin-main.php';

		require_once plugin_dir_path(dirname(__FILE__)).'public/public-main.php';

		$this->loader = new DesharioBPlate_Loader();

	}
	
	private function setLocale() {
		$plugin_i18n = new DesharioBPlate_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function defineAdminHooks() {
		$plugin_admin = new DesharioBPlate_Admin($this->getPluginName(), $this->getVersion());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('admin_menu', $plugin_admin, 'setupDBPlateMenu');
		$this->loader->add_action('admin_head', $plugin_admin, 'hideAllNotices');
		$this->loader->add_action('init', $plugin_admin, 'initDesharioPlate');
	}

	private function definePublicHooks() {
		$plugin_public = new DesharioBPlate_Public( $this->getPluginName(), $this->getVersion() );
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
		$this->loader->add_shortcode('shtdplt1', $plugin_public, 'shortcode1');
		$this->loader->add_shortcode('shtdplt2', $plugin_public, 'shortcode2');

		$this->loader->add_action('wp_ajax_testAjaxRequest', $plugin_public, 'testAjaxRequest');
		$this->loader->add_action('wp_ajax_nopriv_testAjaxRequest', $plugin_public, 'guestTestAjaxRequest');
		
		$this->loader->add_action('wp_ajax_postSampleAjaxRequest', $plugin_public, 'postSampleAjaxRequest');


		// wp_ajax_(actionName) For users
		// wp_ajax_nopriv_(actionName) For guests

	}

	public function run() {
		$this->loader->run();
	}

	public function getPluginName() {
		return $this->plugin_name;
	}

	public function getLoader() {
		return $this->loader;
	}

	public function getVersion() {
		return $this->version;
	}

}
