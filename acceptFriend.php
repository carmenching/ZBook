<?php
session_start();
require('config/DBCNX.php');
$action="";
include 'template/headerpreset.php';

$sender = $_GET['sender'];
$user = $_GET['user'];
$update = "UPDATE friend SET requestStatus = \"Accept\" WHERE IDUser_Sender=".$sender." AND IDUser =".$user;

if($acceptFriend = $mysqli->prepare($update)) {
    $acceptFriend->execute();
    echo "Invitation acceptée.";
}
$acceptFriend->close();


if($duplicate = $mysqli->prepare("INSERT INTO friend(IDUser_Sender, IDUser, requestStatus) VALUES (?,?,?)")) {
$format ="iis";
$status ="Accept";

$duplicate->bind_param($format, $user, $sender, $status);
$duplicate->execute();
    echo "Invitation acceptée.";

}



header("refresh:2 url=".$rootPath."notificationCenter.php");

?>

