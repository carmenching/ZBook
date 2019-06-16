<?php
require('config/DBCNX.php'); 

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    session_start();    

    $userquery = "SELECT IDUser, PseudoUser, PasswordUser FROM USER WHERE PseudoUser =?";
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--[if lt IE 9]>
	 <script
	src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<header id="fulltop">
	<div class="container justifycenter">
		<div class="" id="leftTopBar">
			<img src="img/mainlogo_nobg.png" id="logo" alt="logo">
			<h1>ZBooK</h1>
		</div>
	
		<div class="row align-items-center" id="BACKTOPBAR">
		</div>	
	</div>
</header>

	<!-- barre du haut, contiendra logo, shearchbar etc -->

    <div class="container">
        <div class="center-text" id="login_form">
            <h2 class="center-text">Message d'erreur</h2>
	<?php
        if(!empty($_SESSION['username'])) {
            if(isset($password)&&isset($userPassword)) {
                if(!password_verify($password, $userPassword)) {
                    echo "mot de passe incorrecte, vous serez redirigé à la page de connexion";
                    header("refresh:3; url=http://localhost/zbook/login.php");
                } else {
                    header('Location: http://localhost/zbook/index.php');
                }
            } else {
                echo "mot de passe incorrecte, vous serez redirigé à la page de connexion";
                header("refresh:3; url=http://localhost/zbook/login.php");
            }
        } else {
            echo "utilisateur n'existe pas, vous serez redirigé à la page de connexion";
            header("refresh:5; url=http://localhost/zbook/login.php");
        }
?>
        </div>
    </div>




