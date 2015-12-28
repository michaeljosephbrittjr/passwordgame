<html><head>
<link rel="stylesheet" style="text/css" href="style.css">
<script src="dynamics.js"></script>
<title>welcome to password game</title></head>
<body onload="centerform()" onresize="centerform()">
<?php 
$INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/passwordgame/"; 

// REDO ALL OF THIS WITH SESSION DATA
if (isset($_POST['profilepic'])) {$profilepic = $_POST['profilepic'];}
if (isset($_POST['displayname'])) {$displayname = $_POST['displayname'];}
if (isset($_POST['userid'])) {$userid = $_POST['userid'];}
if (isset($_POST['whatever'])) {$pw = $_POST['whatever'];}

include($INC_DIR. "connect.php");
$db = connectdb('passgame');

echo '<div id="mainform"><form action="index.php" id="formitself" method="post">';
if (!(isset($_POST['profilepic']))) {
	include($INC_DIR. "updatepic.php"); 
	include($INC_DIR. "displayname.php"); 
	if (!(isset($_POST['displayname']))) { 
	  	if (!(isset($_POST['whatever']))) {		
		    echo '<div id="message">enter the password:</div><br><input type="text" id="inputfield" name="whatever" onkeypress="return numbersonly(event)" onkeyup="return limitlength(this, 15)">';	}
		else {		
			include($INC_DIR. "getid.php");
			$userid = getid($db,$pw); 
			if (!($userid)) { // IF NO ROWS EXIST CREATE NEW ACCOUNT
				include($INC_DIR. "newaccount.php"); }
			else {
				$displayname = getdisplayname($db, $userid);
				if (!($displayname)) {
					echo '<br><div id="message">You\'re in!<br>please chose permanent display name:</div><input type="text" id="inputfield" name="displayname" onkeypress="return numbersonly(event)" onkeyup="return limitlength(this, 139)">';	}
				else {
					if ($profilepic = updatepic("get", $db, $userid)) {
						echo '<br><img src="' . $profilepic . '" id="profilepicture">';	
					    echo '<input type="hidden" name="profilepic" value="' . $profilepic . '">';
						$_POST['profilepic'] = $profilepic;
						}
					echo '<br><h1>' . $displayname . '</h1>';
					displayupdatepic($displayname); 
					} 
				mysqli_close($db); }	
			echo '<input type="hidden" name="whatever" value="' . $pw . '">';
			echo '<input type="hidden" name="userid" value="' . $userid . '">';	
			}
		}		
	else {	
	 	createdisplayname($db, $userid, $displayname);
		displayupdatepic($displayname);
		echo '<input type="hidden" name="whatever" value="' . $pw . '">';
		echo '<input type="hidden" name="userid" value="' . $userid . '">';
		}	 		
	}
else {
	include($INC_DIR. "updatepic.php"); 
	$result = updatepic($profilepic, $db, $userid);
	echo '<br><img src="' . $profilepic . '" id="profilepicture"><h1>' . $displayname . '</h1>';
	displayupdatepic($displayname);
	echo '<input type="hidden" name="profilepic" value="' . $profilepic . '">';
	echo '<input type="hidden" name="whatever" value="' . $pw . '">';
	echo '<input type="hidden" name="userid" value="' . $userid . '">';	
	}	
?>
<input class="button" type="submit" id="formsubmit"><?php 
if (isset($_POST['profilepic'])) { 
	echo '<a href="javascript:hidebox();" class="button" id="closebox" onclick="hidebox()">X</a>'; } 
?></form>
<?php 
if (isset($_POST['whatever'])) {
	echo '[<a href="index.php">logout</a>]';}
?></div> 
<?php 
if (isset($_POST['profilepic'])) {
	include($INC_DIR. "buildprofile.php"); 
	buildprofile($profilepic, $displayname, $userid);}
?>
<span id="fiftyfiftyfeed"></span>
</body>
</html>