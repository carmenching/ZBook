<?php
require('config/DBCNX.php');
session_start();
$messageContent = $_POST['message_editor'];
    
if(!($query = $db->prepare("INSERT INTO conv_msg (ConvMsgContent) VALUES (?);"))) {
    echo "failed to prepare query";
}

if(!($query->bind_param("s", $messageContent))) {
    echo "Binding parameters failed: (" . $query->errno . ") " . $query->error;
}
if (!$query->execute()) {
    echo "Execute failed: (" . $query->errno . ") " . $query->error;
}

header('Location: minichat.php');
?>