<?php
require('config/DBCNX.php');
session_start();
include 'template/header.php';



if(isset($_SESSION['username'])) {
    $currentUser = $_SESSION['username'];
    $userQuery = "SELECT LastNameUser, FirstNameUser, PseudoUser, MailUser, BirthDateUser FROM user WHERE PseudoUser =?";
    if($fetchUser = $mysqli->prepare($userQuery)) {
        $fetchUser->bind_param("s", $username);
        $fetchUser->execute();
        $result=$fetchUser->get_result();
        while($user = $result->fetch_assoc()) {
            $currentUsername = $user['PseudoUser'];
            $currentUserFirstName = $user['FirstNameUser'];
            $currentUserLastName = $user['LastNameUser'];
            $currentUserEmail = $user['MailUser'];
            $currentUserBirthDate= $user['BirthDateUser'];
        }
    }
}
?>
    <div class="container">
        <div>
            <img src="https://dummyimage.com/1080x400/000/fff" alt="">
            <img src="">
        </div>
        
    </div>
