<?php 
require('config/DBCNX.php');
session_start();
$idUserSender = $_SESSION['userID'];
$idUserFriend = $_GET['idUser'];

$query = "INSERT INTO friend(IDUser_Sender, IDUser, requestStatus) VALUES (?,?,?)";
if($addFriend = $mysqli->prepare($query)) {
    $format = "iis";
    $requestStatus = "Pending";

    $addFriend->bind_param($format, $idUserSender, $idUserFriend, $requestStatus);
    $addFriend->execute();
    echo "friend added";
} 
$addFriend->close();

$mysqli->close();