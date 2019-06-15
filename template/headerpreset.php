<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="<?= $rootPath; ?>css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= $rootPath; ?>css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700&display=swap" rel="stylesheet">

	<?php 
	if (isset($action)) {
		switch($action) {
			case "searchUser":
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/userSearch.css\">";
				break;
			case "showProfile":
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootPath."css/profile.css\">";
				break;
			case "notification":
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootPath."css/notification.css\">";
				break;
			case "messenger":
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$rootPath."css/messenger.css\">";
				break;
		}
	}
	
	?>
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
			<a href="<?= $rootPath ?>index.php" class="lh-3 wt"><img src="<?= $rootPath; ?>img/mainlogo_nobg.png" id="logo" alt="logo"></a>
			<h1 class="">ZBooK</h1>
		</div>
		<div class="justifycenter aligncenter" id="BACKTOPBAR">
			<a href="<?=$rootPath?>profile.php?user=<?=$_SESSION['username']?>" class="wt navitem text-center"> <img src="<?=$rootPath?>img/buttonprofile.png" style="width:45px;" alt="PROFIL"><?= $_SESSION['username']?></a>
			<?php 
			$query = "SELECT * FROM friend WHERE IDUser= ? AND requestStatus=\"Pending\"";
			if($fetchNotification = $mysqli->prepare($query)) {
				$fetchNotification->bind_param("i", $_SESSION['userID']);
				$fetchNotification->execute();
				$result=$fetchNotification->get_result();
				while ($notification = $result->fetch_assoc()) {
					echo "<a href=\"".$rootPath."notificationCenter.php\"><img src=\"".$rootPath."img/notification.svg\" style=\"width:20px;\"></a>";
				}
			}
			?>

			<a href="<?= $rootPath; ?>messagerie.php" class="wt navitem text-center"><img src="<?= $rootPath; ?>img/buttonmessage.png" class="col-12 sidebarlink" alt="MESSAGERIE"></a>
			<a href="<?= $rootPath; ?>searchUser.php" class="wt navitem text-center"><img src="<?= $rootPath; ?>img/buttonfriends.png" class="col-12 sidebarlink" alt="AMIS"></a>
			<a href="<?= $rootPath; ?>login.php" class="wt navitem text-center">Déconnexion</a>
		</div>
	</div>
	
</header>