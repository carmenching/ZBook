<?php
require('config/DBCNX.php');
session_start();
$chatWith = $_POST['chatWith'];
$currentUser = $_SESSION['userID'];
$messageContent = $_POST['message_editor'];

//créer conversation si cela n'existe toujours pas
$createConvQuery = "INSERT INTO message_user(IDUser, IDUserWith) 
                    SELECT".$currentUser.", ".$chatWith." FROM dual 
                    WHERE NOT EXISTS (SELECT * FROM message_user 
                                        WHERE (IDUser = ".$currentUser." AND IDUserWith = ".$chatWith.") OR (IDUser = ".$chatWith." AND IDUserWith = ".$currentUser."))";
if($createConv = $mysqli->prepare($createConvQuery)) {
    $createConv->execute();
    $createConv->close();
}

//selectionner le conversation entre les utilisateurs concernés
$selectConvQuery = "SELECT * FROM message_user WHERE (IDUser= ".$currentUser." AND IDUserWith= ".$chatWith.") OR (IDUser= ".$chatWith." AND IDUserWith=".$currentUser.") LIMIT 1" ;
if($selectConv = $mysqli->query($selectConvQuery)) {
    while($conv = $selectConv->fetch_assoc()) {
        $idConvUser = $conv['IDConvUser'];
    }
}
$selectConv->close();

//inserer le message dans la BDD
$insertMessageQuery = "INSERT INTO message(messageContent, messageSentBy, messageSentTo, message_userID) VALUES (?,?,?,?)";
if($insertMessage = $mysqli->prepare($insertMessageQuery)) {
    $format = "siii";
    $insertMessage->bind_param($format, $messageContent, $currentUser, $chatWith, $idConvUser);
    $insertMessage->execute();
    $insertMessage->close();

}

//afficher le dernier message inseré
$lastMessageQuery = "SELECT messageContent FROM message WHERE message_userID = ".$idConvUser." AND messageSentBy = ".$currentUser." ORDER BY messageDate DESC LIMIT 1";
if ($fetchLastMessage = $mysqli->query($lastMessageQuery)) {
    while ($lastMessage = $fetchLastMessage->fetch_assoc()) {
        var_dump($lastMessage);
        echo "<div class=\"message_block\">
                    <p class=\"message_display\">".$lastMessage['messageContent']."</p>
                    <img class=\"chatwith_avatar\" src=\"".$rootPath."img/currentUser.svg\" alt=\"message sender photo\">
				</div>";
    }
    $fetchLastMessage->close();
}

$mysqli->close();

?>