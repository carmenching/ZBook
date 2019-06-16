<?php 
session_start();
require('config/DBCNX.php');

$searchUserName = "%".$_POST['searchUserName']."%";
$userSearch = "SELECT IDUser, PseudoUser, PasswordUser FROM user WHERE PseudoUser LIKE ? ";

if($fetch = $mysqli->prepare($userSearch)) {
    $fetch->bind_param("s", $searchUserName);
    $fetch->execute();
    $result=$fetch->get_result();
    while ($user = $result->fetch_assoc()) {
        $addUserName = $user['IDUser'];
        echo "<div class=\"resultUser\">
        <p class=\"userResult\">".$user['PseudoUser']."</p>
        <a class=\"addfriend\" href=\"otherProfile.php/?idUser=".$addUserName."\"><img src=\"img/add-user.svg\" width=\"20px\"></i>Voir</a>
        </div>";
    }
    $fetch->close();
}
$mysqli->close();

?>
