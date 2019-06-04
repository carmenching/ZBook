<?php
require('config/DBCNX.php'); 

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    session_start();    

    $userquery = "SELECT IDUser, PseudoUser, PasswordUser FROM user WHERE PseudoUser =?";
    if($fetch = $mysqli->prepare($userquery)) {
        $fetch->bind_param("s", $username);
        $fetch->execute();
        $result=$fetch->get_result();
        while ($user = $result->fetch_assoc()) {
            $_SESSION['username'] = $user['PseudoUser'];
            $userPassword = $user['PasswordUser'];
            $_SESSION['userID'] = $user['IDUser'];
        }
    }
    $mysqli->close();
}

if(empty($_SESSION['username'])) {
    echo "username does not exist";
    header("refresh:5; url=http://localhost/zbook/login.php");

}

if(!password_verify($password, $userPassword)) {
    echo "password incorrect!";
	header("refresh:5; url=http://localhost/zbook/login.php");
} else {
	header('Location: http://localhost/zbook/index.php');
}

