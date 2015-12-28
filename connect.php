<?php
function connectdb($dbname) {
	$servername = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbport = '3306';
	$db = mysqli_connect($servername, $dbuser, $dbpass, '', $dbport);
	if (!(mysqli_select_db($db,$dbname))) {
		$db = mysqli_connect($servername, $dbuser, $dbpass, '', $dbport);
		$sql = "CREATE DATABASE `" . $dbname . "`;";
		$result = mysqli_query($db,$sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
		if (!($result)) {
			return false;
			}
		else {
			return connectdb($dbname);
			}	
		} 
	return $db;
	}
?>