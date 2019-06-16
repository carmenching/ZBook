<?php
require('config/DBCNX.php');
// recuperer tous les données envoyés par le formulaire inscription utilisateur
// ----verifier tous les données envoyés et si les champs sont vides. ---------
// debut
if(isset($_POST['submit'])) { 
    $username = htmlspecialchars(trim($_POST['username'])); 
    $firstname = htmlspecialchars(trim($_POST['firstname'])); 
    $lastname = htmlspecialchars(trim($_POST['lastname'])); 
    $password = htmlspecialchars($_POST['password']); 
    $psw = htmlspecialchars($_POST['psw']); 
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $mail = htmlspecialchars(trim($_POST['mail'])); 
    $dob = htmlspecialchars(trim(strtotime($_POST['dob'])));
    $validate = 1;
    

    if(empty($username)) {
        echo "identifiant ne peut pas être vide";
        $validate = 0;
    }

    if(empty($firstname)) {
        echo "prénom ne peut pas être vide";
        $validate = 0;
    }

    if(empty($lastname)) {
        echo "nom ne peut pas être vide";
        $validate = 0;
    }

    if(empty($password)) {
        echo "mot de passe ne peut pas être vide";
        $validate = 0;
    }

    if(empty($psw)) {
        echo "mot de passe ne peut pas être vide";
        $validate = 0;
    }

    if($password != $psw) {
        echo "les mots de passe saisi ne sont pas les mêmes";
    }

    if(empty($mail)) {
        echo "l'adresse mail ne peut pas être vide";
        $validate = 0;
    }

    if(empty($dob)) {
        echo "merci de saisir votre date de naissance";
        $validate = 0;
    } else {
        $dateDeNaissance = date('Y-m-d', $dob);
    }

}

// fin de vérification ----------------------------------

// envoyer les donées récu vers la bdd
if ($validate) {
    $userQuery = "INSERT INTO user(LastNameUser, FirstNameUser, PseudoUser, PasswordUser, MailUser, BirthDateUser) VALUES (?,?,?,?,?,?)";
    if($subscribe = $mysqli->prepare($userQuery)) {
        $format = "ssssss";        
        $subscribe->bind_param($format, $lastname, $firstname ,$username, $hash, $mail, $dateDeNaissance);
        $subscribe->execute();

        
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
<div class="container">
    <div class="center-text" id="login_form">
        <h2 class="center-text">Message de système</h2>
<?php
    echo "<p>l'utilisateur ajoutée, vous serez redirigé vers la page de connexion</p>";
    // header("refresh:5; url=http://localhost/zbook/login.php");
    }   
    } else {
    // header("refresh:5; url=".$_SERVER['HTTP_REFERER']);
    }
    ?>
                
        </div>
    </div>
<?
include 'template/footerpreset.php';




