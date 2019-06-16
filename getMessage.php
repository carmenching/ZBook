<?php
require('config/DBCNX.php');
session_start();
$currentUser = $_SESSION['userID'];
$chatWith = $_POST['id'];

$getMessageQuery = "SELECT * FROM message, message_user 
                    WHERE message.message_userID = message_user.IDConvUser 
                    AND ((message_user.IDUser =".$currentUser." AND message_user.IDUserWith = ".$chatWith.") OR (message_user.IDUser = ".$chatWith." AND message_user.IDUserWith = ".$currentUser."))";

if($getMessage = $mysqli->prepare($getMessageQuery)) {
    $getMessage->execute();
    $result = $getMessage->get_result();
    while($message = $result->fetch_assoc()) {
        if ($message['messageSentBy'] == $currentUser) {
            echo "<div class=\"message_block\">
                    <p class=\"message_display\">".$message['messageContent']."</p>
                    <img class=\"chatwith_avatar\" src=\"".$rootPath."img/currentUser.svg\" alt=\"message sender photo\">
				</div>";
        } else {
            echo"<div class=\"message_block_chatwith\">
					<img class=\"chatwith_avatar\" src=\"".$rootPath."img/chatwith.svg\" alt=\"message sender photo\">
 					<p class=\"message_display_chatwith\">".$message['messageContent']."</p>
 				</div>";
        }
    }
}       