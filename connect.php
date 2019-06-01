<?php
require('config/DBCNX.php'); 

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    session_start();    

    $userquery = "SELECT PseudoUser, PasswordUser FROM user WHERE PseudoUser =?";
    if($fetch = $mysqli->prepare($userquery)) {
        $fetch->bind_param("s", $username);
        $fetch->execute();
        $result=$fetch->get_result();
        while ($user = $result->fetch_assoc()) {
            echo $user['PseudoUser'];
        }
    }
    $mysqli->close();
}


