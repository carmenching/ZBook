<?php
require('config/DBCNX.php');
session_start();

// envoyer le contenu d'un post vers la bdd

if($send = $mysqli->prepare("INSERT INTO message(messageContent, messageSentBy, messageSentTo) VALUES (?,?,?)")) {
    $si = "sii";
    $messageContent = $_POST['message_editor'];
    $messageSentBy = $_POST['messageSentBy'];
    $messageSentTo = $_POST['messageSentTo'];
    
    $send->bind_param($si, $messageContent, $messageSentBy, $messageSentTo);
    $send->execute();
    $send->close();
};