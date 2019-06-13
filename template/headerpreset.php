<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="<?= $rootPath; ?>css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= $rootPath; ?>css/style.css">
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
<header class="" id="fulltop">
	<div class="row align-items-center" id="TOPTOPBAR">
		<a href="<?= $rootPath; ?>index.php" class="col-2"><img src="<?= $rootPath; ?>img/mainlogo.png" id="LOGO" class="" alt="logo"></a>
		<h1 class="col-3 offset-lg-7 offset-md-7 offset-sm-6 offset-2">ZBooK</h1>
	</div>
	<div class="sticky-top">
		<div class="row align-items-center" id="BACKTOPBAR">
			<div class="col-12">
				<?php echo "<a href=\"profile.php?user=".$_SESSION['username']."class=\"col-4 navitem text-center\"><img src=\"".$rootPath."img/buttonprofile.png\" class=\"col-12 sidebarlink\" alt=\"PROFIL\">".$_SESSION['username']."</a>";?>  
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

				<a href="<?= $rootPath; ?>messagerie.php" class="col-4 navitem text-center"><img src="<?= $rootPath; ?>img/buttonmessage.png" class="col-12 sidebarlink" alt="MESSAGERIE"></a>
				<a href="<?= $rootPath; ?>searchUser.php" class="col-4 navitem text-center"><img src="<?= $rootPath; ?>img/buttonfriends.png" class="col-12 sidebarlink" alt="AMIS"></a>
				<a href="<?= $rootPath; ?>login.php" class="navitem text-center">Disconnect</a>
			</div>
		</div>	
	</div>
</header>