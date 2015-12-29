<?php
function buildprofile($profilepic, $displayname, $userid) {
	echo '<div id="profile">';
	echo '<img src="' . $profilepic . '" id="profilepicture">';
	echo '<h1 id="displayname">' . $displayname . '</h1>
		<a class="button" href="index.php">logout</a>
		<a href="javascript:showbox();" class="button" id="closebox" onclick="showbox()">edit picture</a>
		<form id="quipform" action="javascript:postquip('.$userid.');">
		quip:<input type="text" id="inputquip" name="quip"  onkeypress="return numbersonly(event,\'quipform\')" onkeyup="return limitlength(this, 255)">';
	echo '<a href="javascript:postquip(' . $userid . ');" class="button" id="submitquip" onclick="postquip(' . $userid . ')">post</a>
		</form>
	</div>';
}

function strip() {
	$input = $_POST['pagename'];
	if($input == "") { die("Can't create a page with an empty name"); }
	$search = array
	(
	'@<script[^>]*?>.*?</script>@si',   // Strip out JavaScript
	'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
	'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
	'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);
	if($output == "") { die("Can't create a page with an empty name"); }
	// header("location: https://urlgoeshere.com/script.php?id=$output");
}
?>