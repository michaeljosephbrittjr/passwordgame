<?php
$sql = "CREATE DATABASE `quips`;";
$result = mysqli_query($db,$sql);// or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
/*
if (!($result)) {
	echo 'failed to create quips database<br>';
	}
else {
	echo 'new quip database initialized<br>';
	}
*/
$sql = "CREATE TABLE quips.0 ( id INT NOT NULL , quip VARCHAR(255) NOT NULL , PRIMARY KEY (id));";
$result = mysqli_query($db,$sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
if (!($result)) { 
	echo 'failed to create genesis table<br>'; 
	}
else { 
	$genesiscomment = 'Zooey turned and looked at her, and—unpredictable young man—made a very dour face, as though he had suddenly eschewed any and all forms of levity.';
	$sql = "INSERT INTO `quips`.`0` ( `id`,`quip` ) VALUES ('0', '".$genesiscomment."');";
	$result = mysqli_query($db,$sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
	echo 'new quip table initialized<br>'; 
	}
?>