<?php
function getquip($quipid) {
	$db = new mysqli('localhost', 'root', 'root', 'quips', '3306'); 
	$sql = "SELECT quip FROM `" . $quipid . "` WHERE `id` = '" . $quipid . "'";
	$result = mysqli_query($db, $sql) or trigger_error("error: ". mysqli_error($db), E_USER_ERROR);
	if (($result)) {
		$row = mysqli_fetch_assoc($result);
		$quip = $row['quip']; 
		return $quip;
		}
	}

function displayquip($quipid, $quip) {
	echo '<div id="quip'.$quipid.'">(#'.$quipid . ')'.'<br>' . $quip . '</div><br>';
	}
?>