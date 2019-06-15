<?php
require('config/DBCNX.php');
session_start();
$action="messenger";
include 'template/headerpreset.php';
$currentUser = $_SESSION['userID'];

?>
<section id="messenger" class="container wb mt-5 mb-5">
    <aside>
        <div class="chat_header leftradius">
			<h2 id="destined_user">Users</h2>
		</div>
        <ul>
            <?php 
            $chatwithQuery = "SELECT friend.IDUser_Sender, user.PseudoUser FROM friend, user WHERE user.IDUser=friend.IDUser_Sender AND friend.IDUser = ".$currentUser;
            if($chatWithFetch = $mysqli->prepare($chatwithQuery)) {
                $chatWithFetch->execute();
                $result = $chatWithFetch->get_result();
                while($chatWtih = $result->fetch_assoc()) {
                        echo "<li class=\"chatWithUser\"><a href=\"#\" class=\"link p-3\" id=\"".$chatWtih['IDUser_Sender']."\">".$chatWtih['PseudoUser']."</a></li>";
                } 
            }
        
            ?>
        </ul>
    </aside>
	<section id="messages_panel">
		<div class="chat_header rightradius">
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