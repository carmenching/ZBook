<?php
session_start();
require('config/DBCNX.php');
$action="notification";
include 'template/headerpreset.php';
?>
<div class="container mt-5">
    <table class="table" id="userInfo">
        <thead>
            <tr>
                <th scope="col">Notification</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT friend.IDUser_Sender, user.PseudoUser, friend.IDUser FROM user, friend WHERE user.IDUser = friend.IDUser_Sender AND friend.requestStatus=\"Pending\"";

            if($fetchNotification = $mysqli->query($query)) {
                while ($notification = $fetchNotification->fetch_assoc()) {
                    echo "<tr>
                            <th scope=\"row\"><img src=\"img/avatar.svg\" style=\"width:30px;\">".$notification['PseudoUser']." souhaite vous inviter à rejoindre sa liste d'amis sur ZBook.</th> 
                            <td><a class=\"btn btn-dark\" href=\"acceptFriend.php/?sender=".$notification['IDUser_Sender']."&user=".$notification['IDUser']."\">Accepter</a></td>
                        </tr>";
                }
            }
        ?>
        
        </tbody>
    </table>
        
    

</div>