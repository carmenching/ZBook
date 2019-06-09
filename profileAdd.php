<?php
require('config/DBCNX.php');
session_start();
$friendRequestSender = htmlspecialchars($_SESSION['userID']);
$friend = htmlspecialchars($_GET['idUser']);

$friendAdd = "INSERT INTO friend (IDUser_Sender, TypeFriendship, IDUser, requestStatus) VALUES (?,?,?,?)";
if ($send = $mysqli->prepare($friendAdd)) {
    $format = "isis";
    $typeFriendship = "Amis";
    $requestStatus = "Pending";
    
    $send->bind_param($format, $friendRequestSender, $typeFriendship, $friend, $requestStatus);
    $send->execute();
    $send->close();

}
$mysqli->close();
