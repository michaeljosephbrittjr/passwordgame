<?php
$userid = $_GET['userid'];
$db = new mysqli('localhost', 'root', 'root', 'passgame', '3306'); 
$sql = "SELECT * FROM quips";
$result = mysqli_query($db,$sql);
if (!($result)) {	
	$sql =  "CREATE TABLE passgame.quips ( id INT NOT NULL AUTO_INCREMENT , user INT NOT NULL , time TIMESTAMP NOT NULL , PRIMARY KEY (id))";
	$result = mysqli_query($db,$sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
	}
$sql = "INSERT INTO `passgame`.`quips` (`id`, `user`, `time`) VALUES (NULL, '" . $userid . "', CURRENT_TIMESTAMP);";
$result = mysqli_query($db,$sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
$quipid = mysqli_insert_id($db);
$sql = "SELECT * FROM quips.0";
$result = mysqli_query($db,$sql);
if (!($result)) {
	$INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/passwordgame/"; 
	include($INC_DIR. "buildquipsdatabase.php");
	}
$sql = "CREATE TABLE quips." . $quipid . " LIKE quips.0";
$result = mysqli_query($db,$sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
if (($result)) {
	$quip = $_GET['quip'];
	$sql = "INSERT INTO `quips`.`" . $quipid . "` (`id`, `quip`) VALUES ('" . $quipid . "', '" . $quip . "');";
	if ($result=mysqli_query($db,$sql)) {
		mysqli_close($db);
		$INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/passwordgame/"; 
		include($INC_DIR. "readquips.php"); 
		for ($i=$quipid; $i > -1; $i--) {
			$quip = getquip($i);
			displayquip($i,$quip);
			}
		}
	else {
		echo 'failed to insert the quip input';	mysqli_close($db);
		}
	}	
else {
	echo 'failed to create new quip table'; mysqli_close($db);
	}
?>