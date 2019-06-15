<?php
//Réinitialiser les sessions sauvegardés
session_unset();
session_start();

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
			<form action="connect.php" method="POST">
				<h2 class="center-text">Connexion à ZBOOK</h2>
				<div class="centerFormItem form-fields">
					<input type="text" class="form-control center-text" id="username" name="username" placeholder="Nom d'utilisateur" required/>
				</div>
				<div class="centerFormItem form-fields">
					<input type="password" class="form-control center-text" id="password" name="password" placeholder="Mot de passe" required/>
				</div>
				<button type="submit" class="centerFormItem btn btn-primary btn-lg btn-block center-text" id ="connexion" value="Connexion" name="submit">Connexion</button>
			</form>
			Pas encore de compte? <a href="Inscription.php" style="font-family:'Play', sans-serif;">Inscrivez-vous ici</a>
		</div>
    </div>
    
    <?php include 'template/footerpreset.php' ?>

  </body>
</html>

