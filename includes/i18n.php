<?php
 
class DesharioBPlate_i18n {

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'deshario-bplate',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
