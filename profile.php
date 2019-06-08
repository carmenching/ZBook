<?php
require('config/DBCNX.php');
session_start();
include 'template/headerpreset.php';

if(isset($_SESSION['username'])) {
    $currentUser = $_SESSION['username'];
    $userQuery = "SELECT LastNameUser, FirstNameUser, PseudoUser, MailUser, BirthDateUser FROM user WHERE PseudoUser =?";
    if($fetchUser = $mysqli->prepare($userQuery)) {
        $fetchUser->bind_param("s", $currentUser);
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
        <div id="userProfile">
            <h2><?= $currentUsername; ?></h2>
            <div id="profileDetails">
                <p>Prénom                 : <?= $currentUserFirstName ?></p>
                <p>Nom                    : <?= $currentUserLastName ?></p>
                <p>Email                  : <?= $currentUserLastName ?></p>
                <p>Date de Naissance      : <?= $currentUserLastName ?></p>
            </div>
            <div>
            <h3>Amis</h3>
            </div>
        </div>
        
    </div>
