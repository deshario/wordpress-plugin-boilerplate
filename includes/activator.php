<?php
 
class DesharioBPlate_Activator {

	public static function activate() {

		// global $wpdb;
		// $charset_collate = $wpdb->get_charset_collate();
	
		// $tbl_meeting_rooms = $wpdb->prefix.'de_meeting_rooms';
		// if($wpdb->get_var("SHOW TABLES LIKE '$tbl_meeting_rooms'") != $tbl_meeting_rooms){
		//   $createRoom = "CREATE TABLE $tbl_meeting_rooms (
		// 	room_id int(11) NOT NULL AUTO_INCREMENT,
		// 	room_name varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		// 	room_description varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
		// 	room_creator int(11) NOT NULL,
		// 	UNIQUE KEY (room_id)
		//   );";
		//   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		//   dbDelta($createRoom);
		//   $wpdb->query("INSERT INTO $tbl_meeting_rooms (`room_id`, `room_name`, `room_description`, `room_creator`) VALUES
		//   (1, 'Room 1', 'Room 1 Descrition',1);");
		// }
	}

}
