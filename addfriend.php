<?php 
require('config/DBCNX.php');
session_start();
$idUserSender = $_SESSION['userID'];
$idUserFriend = $_GET['idUser'];
$verifyQuery = "SELECT IDUser_Sender FROM friend WHERE IDUser =".$idUserSender." AND IDUser_Sender =".$idUserFriend;
if($verify = $mysqli->prepare($verifyQuery)) {
    $verify->execute();
    $verify->bind_result($friendExist);
    $verify->fetch();        
    }

if($friendExist != $idUserFriend) {
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
} else {
    echo "friend already added";
}

header("refresh:2 url=".$_SERVER['HTTP_REFERER']);
