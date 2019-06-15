<?php
require('config/DBCNX.php');
session_start();
$action="messenger";
include 'template/headerpreset.php';
$currentUser = $_SESSION['userID'];

?>
<section class="container mt-5 mb-5">
    <aside>
        <div id="chat_header">
			<h2 id="destined_user">Users</h2>
		</div>
        <ul>
            <?php 
            $chatwithQuery = "SELECT * FROM message_user WHERE IDUser = ".$currentUser." OR IDUserWith = ".$currentUser;
            if($chatWithFetch = $mysqli->prepare($chatwithQuery)) {
                $chatWithFetch->execute();
                $result = $chatWithFetch->get_result();
                while($chatWtih = $result->fetch_assoc()) {
                    if ($chatWtih['IDUser']!==$currentUser) {
                        echo "<li class=\"chatWithUser\"><a href=\"#\" class=\"link\" id=\"".$chatWtih['IDUser']."\">".$chatWtih['IDUser']."</a></li>";
                    } else {
                        echo "<li class=\"chatWithUser\"><a href=\"#\" class=\"link\" id=\"".$chatWtih['IDUserWith']."\">".$chatWtih['IDUserWith']."</a></li>";
                    }
                }
            }
            ?>
        </ul>
    </aside>
	<section id="messages_panel">
		<div id="chat_header">
			<h2 id="destined_user">Chatting with Username 1</h2>
		</div>
		<div id="message_sent">
			
		</div>
        <form style="display:none;" id="message_edit" action="sendMessage.php" method="POST">
            <input id="chatWith" name="chatWith" type="hidden" value="">
            <textarea name="message_editor" id="message_editor" cols="30" rows="10"></textarea>
            <input type="submit" value="Envoyer">
        </form>
		
	</section>
</section>

<script src="<?=$rootPath?>ajax/messagerie.js"></script>
<script>
    
    
</script>
<?php

include 'template/footerpreset.php';
?>