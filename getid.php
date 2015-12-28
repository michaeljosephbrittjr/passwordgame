<?php
function getid($db,$pw) {
	$sql = "SELECT id FROM `users` WHERE `name` = '" . $pw . "'";
	$result = mysqli_query($db, $sql); // or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
	if (!($result)) { 
		$sql = "CREATE TABLE passgame.users ( id INT NOT NULL AUTO_INCREMENT , 
		name VARCHAR(16) NOT NULL , PRIMARY KEY (id));";
		$result = mysqli_query($db, $sql); // or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
		if (!($result)) {
			die('...oops! something went wrong.'); 
			} 
		/* else {
			$sql = "CREATE TABLE passgame.profile ( id INT NOT NULL  , 
			name VARCHAR(16) NOT NULL , PRIMARY KEY (id));";
			$result = mysqli_query($db, $sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
			if (!($result)) {
			die('...oops! something went wrong.'); 
			} 
			} */
		}
    else {
		if (mysqli_num_rows($result) > 0) { // return the USER ID if it's in the database
			$row = mysqli_fetch_assoc($result); 
			return $row['id']; 
			}
		}
	return FALSE;
}