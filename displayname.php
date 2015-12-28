<?php

function rebuilddisplaytable($db, $userid) {
	$sql = "CREATE TABLE passgame.displaynames ( id INT NOT NULL , displayname VARCHAR(139) , PRIMARY KEY (id));";
	return mysqli_query($db, $sql);
	}

function getdisplayname($db, $userid) {
	$sql = "SELECT displayname FROM `displaynames` WHERE `id` = '" . $userid . "'";
	$result = mysqli_query($db, $sql);
	if (!($result)) {
		$result = rebuilddisplaytable($db, $userid);
		return FALSE;
		}
	else { // table exists
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			return $row['displayname'];	
			}
		else { // table exists but no rows found
			return FALSE;
			}
		}
	}

function createdisplayname($db, $userid, $displayname) {
	$sql = "INSERT INTO `passgame`.`displaynames` (`id`, `displayname`) VALUES ('".$userid."', '".$displayname."');";
	$result = mysqli_query($db, $sql);
	if (!($result)) { 
		$result = rebuilddisplaytable($db, $userid);
		if (($result)) {
			// mysqli_free_result($result);
			return createdisplayname($db,$userid,$displayname);
			}
		}
	else { 
		echo '<br>you will be seen as <h1>' . $displayname . '</h1>'; 
		}
    } 
?>