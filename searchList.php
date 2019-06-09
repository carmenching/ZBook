<?php 
session_start();
require('config/DBCNX.php');

$userNameSearch = $_POST['searchUserName'];
$userSearch = "SELECT IDUser, PseudoUser, PasswordUser FROM user WHERE PseudoUser =?";
if($fetch = $mysqli->prepare($userSearch)) {
    $fetch->bind_param("s", $userNameSearch);
    $fetch->execute();
    $result=$fetch->get_result();
    while ($user = $result->fetch_assoc()) {
        $addUserName = $user['IDUser'];
        echo 
        "<div>
        <p><span class=\"userResult\">".$user['PseudoUser']."</span></p>
        <a href=\"profileAdd.php/?idUser=".$addUserName."\"><i class=\"fas fa-user-plus\"></i>Ajout</a>
        </div>";
    }
}
$mysqli->close();

?>
