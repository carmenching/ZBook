<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">

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

   <div class="signup centerFormItem form-fields wb p-5 ">
    <form action="newAccount.php" method="POST" id="inscription_form">
     <h2 style="margin-bottom:20px;" class="center-text amatic-bold">Créer un compte</h2>
     <input type="pseudo" name="username" class="form-control center-text" placeholder="Pseudo" required><br><br>
     <input type="text" name="firstname" class="form-control center-text" placeholder="Prenom" required><br><br>
     <input type="text" name="lastname" class="form-control center-text" placeholder="Nom" required><br><br>
     <input type="password" name="password" class="form-control center-text" placeholder="Mot de passe"  required><br><br>    
     <input type="password" name="psw" id="psw" class="form-control center-text" placeholder="Confirmez mot de passe" required><br><br>   
     <input type="email" name="mail" class="form-control center-text" placeholder="Adresse mail" required><br><br>
     <input type="date" name="dob" class="form-control center-text" placeholder="Date de naissance" required><br><br>
     <input type="submit" class="bbb valid-btn center-text wt btn w-100" value="Inscription" name="submit" required><br><br>
	</form>
	<a href="login.php"><img src="img/return.svg" class="pr-3" style="width:30px;">Vous avez déjà un compte? Connectez-vous</a>

 </div>

<!-- boite a message pour le mot de passe-->
 

     <script src="js/main.js"><script>
 </body>
</html>

