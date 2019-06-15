<?php
require('config/DBCNX.php');
session_start();
$action="messenger";
include 'template/headerpreset.php';

$chatWith = $_GET['idUser'];
$currentUser = $_SESSION['userID'];
?>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<section class="container mt-5 mb-5">
	<section id="messages_panel">
		<div id="chat_header">
			<h2 id="destined_user">Chatting with Username 1</h2>
		</div>
		<div id="message_sent">
			<?php
			$messageQuery = "SELECT * FROM message 
							 WHERE (messageSentBy =".$chatWith." AND messageSentTo = ".$currentUser.") OR (messageSentBy =".$currentUser." AND messageSentTo =".$chatWith.") ORDER BY messageDate ASC";
			if($messageFetch = $mysqli->prepare($messageQuery)) {
				$messageFetch->execute();
				$result = $messageFetch->get_result();
				while($message = $result->fetch_assoc()) {
					if ($message['messageSentBy'] == $chatWith) {
						echo "
							<div class=\"message_block_chatwith\">
							<img class=\"chatwith_avatar\" src=\"".$rootPath."img/chatwith.svg\" alt=\"message sender photo\">
								<p class=\"message_display_chatwith\">".$message['messageContent']."</p>
							</div>";
					} else if ($message['messageSentBy'] == $currentUser) {
					echo "<div class=\"message_block\">
							<p class=\"message_display\">".$message['messageContent']."</p>
							<img class=\"chatwith_avatar\" src=\"".$rootPath."img/currentUser.svg\" alt=\"message sender photo\">
						</div>";
					}
				}
			}
			?>	
		</div>
        
		<form action="<?=$rootPath?>message.php" method="post" id="message_edit">
			<input type="hidden" name="messageSentBy" id="messageSentBy" value="<?=$currentUser ?>">
			<input type="hidden" name="messageSentTo" id="messageSentTo" value="<?=$chatWith ?>">
			<textarea id="message_editor" name="message_editor" id="" cols="30" rows="10"></textarea>
			<button type="submit">Send</button>
		</form>
	</section>
</section>

<script src="<?=$rootPath?>ajax/messagerie.js"></script>
<?php

include 'template/footerpreset.php';
?>
