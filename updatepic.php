<?php
function updatepic($action, $db, $userid) {
	$suffix = " FROM `profilepic` WHERE `id` = '"  . $userid . "'";
	switch ($action) {
		case "get": $prefix = "SELECT url"; break;
		case "delete": $prefix = "DELETE"; break;
		default: // in case of "ADD" the $action is actually the URL
			$prefix = "INSERT INTO `passgame`.`profilepic` (`id`, `url`) VALUES (" . $userid . ", '" . $action . "');";
			$suffix = "";
			if (updatepic("get", $db, $userid)) {	
				updatepic("delete", $db, $userid);
			}
	}	
	$sql = $prefix . $suffix;
	$createsql = "CREATE TABLE IF NOT EXISTS `passgame`.`profilepic` ( `id` INT NOT NULL , `url` VARCHAR(512) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	$createresult = mysqli_query($db, $createsql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);	
	$result = mysqli_query($db, $sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
	if (@mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $row['url'];
	}
	else { // if there is a result but no rows found, added, or deleted
		return FALSE;
	}
}

function displayupdatepic($displayname) {
	echo '<input type="hidden" name="displayname" value="' . $displayname . '">';
	echo '<br>Copy and paste a url for your profile picture:<br>';
	echo '<input type="text" value="http://i2.cdn.turner.com/cnnnext/dam/assets/130831195426-24-iconic-einstein-horizontal-large-gallery.jpg" name="profilepic" id="inputfield" onkeypress="return numbersonly(event,\'formitself\')" onkeyup="return limitlength(this, 139)">';
}
?>