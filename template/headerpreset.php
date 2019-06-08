<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
		<a href="index.php" class="col-2"><img src="img/mainlogo.png" id="LOGO" class="" alt="logo"></a>
		<h1 class="col-3 offset-lg-7 offset-md-7 offset-sm-6 offset-2">ZBooK</h1>
	</div>
	<div class="sticky-top">
		<div class="row align-items-center" id="BACKTOPBAR">
			<div class="col-lg-4 col-md-5 col-sm-8 col-12">
				<div class="row">
					<?php echo "<a href=\"profile.php?user=".$_SESSION['username']."class=\"col-4 navitem text-center\"><img src=\"img/buttonprofile.png\" class=\"col-12 sidebarlink\" alt=\"PROFIL\">".$_SESSION['username']."</a>";?>  
					<a href="messagerie.php" class="col-4 navitem text-center"><img src="img/buttonmessage.png" class="col-12 sidebarlink" alt="MESSAGERIE"></a>
					<a href="" class="col-4 navitem text-center"><img src="img/buttonfriends.png" class="col-12 sidebarlink" alt="AMIS"></a>
					<a href="login.php" class="navitem text-center">Disconnect</a>
				</div>
			</div>
		</div>	
	</div>
</header>