<?php 

	/**
	 * Server Information
	 */
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'osms_db';

	/**
	 * Create Connection
	 */
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

	// Checking Connection
	if ( $conn -> connect_error ) {
		die('Connection Failed');
	}
	// else {
	// 	echo 'Connect';
	// }

 ?>