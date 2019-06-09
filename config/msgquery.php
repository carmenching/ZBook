<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'messagerie') or die ("Impossible de se connecter.");
function printMessage($message) {
	print
		'<div class="message">'
		.	'<span class="auteur">'.$message->auteur.'</span>'
		.	'<p class="corps">'.nl2br($message->corps).'</p>'
		.'</div>';
}
if (isset($_POST['auteur']) && isset($_POST['corps']) && !empty($_POST['auteur']) && !empty($_POST['corps'])) {
	$message = new stdClass();
	$message->auteur = $_POST['auteur'];
	$message->corps = $_POST['corps'];
	$query = "INSERT INTO `messages` (auteur, corps, poste) VALUES ('"
		.mysqli_real_escape_string($mysqli, $message->auteur)
		."', '"
		.mysqli_real_escape_string($mysqli, $message->corps)
		."', ".time().")";
	mysqli_query($mysqli, $query);
	
	printMessage($message);
	exit;
}
else
{
	$messages = array();
	
	$result = mysqli_query($mysqli, "SELECT * FROM messages ORDER BY poste ASC");
	if($result) {
		while($message = mysqli_fetch_object($result)) {
			$messages[] = $message;
		}
	}
}
mysqli_close($mysqli);
?>