
<!DOCTYPE html>
<html>
  <head>
    <title> ZBook - Accueil </title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
  </head>
<body>

	<!-- barre du haut, contiendra logo, shearchbar etc -->
	<div id="TOPBAR">
		<ul id="TOPBARLIST">
			<li><a href="index.html"><img src="img/mainlogo.png" id="LOGO"></a></li>
			
		</ul>
	</div>
    <div class="signin">
      <form action="connect.php" method="POST">
        <h2 style="color:#fff;">Connexion à ZBOOK</h2>
          <input type="text" name="username" placeholder="Nom d'utilisateur" required/><br /><br />
          <input type="password" name="password" placeholder="Mot de passe" required/><br /><br />
          <input type="submit" value="Connexion" name="submit"/></a><br /><br />
      </form>
    <div id="container">
        Pas encore de compte? <a href="Inscription.php" style="font-family:'Play', sans-serif;">Inscrivez-vous ici</a>
    </div>
  </body>
</html>

<?php include 'template/footer.html' ?>
