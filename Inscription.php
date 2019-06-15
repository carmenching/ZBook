<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--[if lt IE 9]>
	 <script
	src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<header class="" id="fulltop">
	<div class="row align-items-center" id="TOPTOPBAR">
		<a href="index.php" class="col-2"><img src="img/mainlogo_nobg.png" id="LOGO" class="" alt="logo"></a>
		<h1 class="col-3 offset-lg-7 offset-md-7 offset-sm-6 offset-2">ZBooK</h1>
	</div>

   <div class="signup centerFormItem form-fields">
    <form action="newAccount.php" method="POST" id="inscription_form">
     <h2 style="margin-bottom:20px;" class="center-text">Créer un compte</h2>
     <input type="pseudo" name="username" class="form-control center-text" placeholder="Pseudo" required><br><br>
     <input type="text" name="firstname" class="form-control center-text" placeholder="Prenom" required><br><br>
     <input type="text" name="lastname" class="form-control center-text" placeholder="Nom" required><br><br>
     <input type="password" name="password" class="form-control center-text" placeholder="Mot de passe"  required><br><br>    
     <input type="password" name="psw" id="psw" class="form-control center-text" placeholder="Confirmez mot de passe" required><br><br>   
     <input type="email" name="mail" class="form-control center-text" placeholder="Adresse mail" required><br><br>
     <input type="date" name="dob" class="form-control center-text" placeholder="Date de naissance" required><br><br>
     <input type="submit" class="centerFormItem btn btn-primary btn-lg btn-block center-text" value="Inscription" name="submit" required><br><br>
    </form>

 </div>

<!-- boite a message pour le mot de passe-->
 

     <script src="js/main.js"><script>
 </body>
</html>

