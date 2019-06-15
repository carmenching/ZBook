<?php
require('config/DBCNX.php');
session_start();
$action = "showProfile";
include 'template/headerpreset.php';

if(isset($_GET['idUser'])) {
    $currentUser = $_GET['idUser'];
    $userQuery = "SELECT IDUser, LastNameUser, FirstNameUser, PseudoUser, MailUser, BirthDateUser FROM user WHERE IDUser =?";
    if($fetchUser = $mysqli->prepare($userQuery)) {
        $fetchUser->bind_param("s", $currentUser);
        $fetchUser->execute();
        $result=$fetchUser->get_result();
        while($user = $result->fetch_assoc()) {
            $currentUserID = $user['IDUser'];
            $currentUsername = $user['PseudoUser'];
            $currentUserFirstName = $user['FirstNameUser'];
            $currentUserLastName = $user['LastNameUser'];
            $currentUserEmail = $user['MailUser'];
            $currentUserBirthDate= $user['BirthDateUser'];
        }
    }
}

?>
    <div class="container profileTable">
        <div id="userTitle" class="m-5">
            <?php echo "<img src=\"".$rootPath."img/user.svg\" id=\"profileAvatar\" alt=\"Profile Photo Placeholder\">";?>
            <h1 id="userPseudo"><?php echo $currentUsername ?></h1>
            <a href="<?= $rootPath ?>addfriend.php/?idUser=<?=$currentUser?>">
                <img src="<?=$rootPath?>img/add-contact.svg" id="profileAvatar" style="width:30px;" alt="Profile Photo Placeholder">
            </a>
            
        </div>
        <table class="table" id="userInfo">
            <thead>
                <tr>
                    <th scope="col">Info</th>
                    <th scope="col">Amis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Prénom</th>
                    <td><?= $currentUserFirstName ?></td>
                </tr>
                <tr>
                    <th scope="row">Nom</th>
                    <td><?= $currentUserLastName ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?= $currentUserEmail ?></td>
                </tr>
                <tr>
                    <th scope="row">Date de Naissance</th>
                    <td><?= $currentUserBirthDate?></td>
                </tr>
                <tr>
                    <th scope="row">Amis</th>
                    <td>
                <?php 
                
                $friendQuery = "SELECT user.PseudoUser, user.IDUser
                                FROM user, friend 
                                WHERE user.IDUser=friend.IDUser_Sender 
                                AND friend.IDUser =".$currentUserID; 
                if($userFriends = $mysqli->prepare($friendQuery)) {
                    $userFriends->execute();
                    $result=$userFriends->get_result();
                    while($friend=$result->fetch_assoc()) {
                        echo "<li><a href=\"".$rootPath."otherProfile.php?idUser=".$friend['IDUser']."\">".$friend['PseudoUser']."</a></li>";
                    }
                }
                $userFriends->close();
                $mysqli->close();
                ?>
                </td>
                </tr>
            </tbody>
        </table>
        
           
        
    
