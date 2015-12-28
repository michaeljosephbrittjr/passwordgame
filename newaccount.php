<?php	
$sql = "INSERT INTO `passgame`.`users` (`id`, `name`) VALUES (NULL, '" . $pw . "');";
if ($result=mysqli_query($db,$sql)) {
	$userid = mysqli_insert_id($db); 
	echo '<h1> you may log in as ' . $pw . '</h1>';
	echo '<br><div id="message">chose permanent display name:</div><input type="text" id="inputfield" name="displayname" onkeypress="return numbersonly(event)" onkeyup="return limitlength(this, 139)">';
	}
?>