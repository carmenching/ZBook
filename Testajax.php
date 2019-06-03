<?php
// Connexion à la BDD.
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
?>
<html>
	<head>
		<title>Messagerie</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
		<style type="text/css">
			input, textarea { display:block; }
			#messagerie { width: 280px; float:left;}
			#messages { padding-left: 1000px;}
			#messages .auteur { font-weight: bold; }
			#messages .corps {font-style: italic; }
		</style>
	</head>
	<body>
		<h1>Messagerie</h1>
		<?php print ( empty($messages) ) ? '<p id="nopost">Aucun message !</p>' :''; ?>
		<div id="messagerie">
			<?php ?>
			<form action="Testajax.php">
				<label for="auteur">Auteur :</label><input type="text" id="auteur" size="20" />
				<label for="corps">Message :</label><textarea id="corps" cols="30" rows="7"></textarea>
				<input type="submit" value="Envoyer" />
			</form>
		</div>
		<div id="messages">
			<?php
			foreach($messages as $message) {
				printMessage($message);
			}
			?>
		</div>
		</body>
</html>
<?php
}
mysqli_close($mysqli);
?>