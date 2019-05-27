<?php
include('config.php')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>TEST</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/zbook.jpg" alt="Espace Membre" /></a>
	    </div>
        <div class="content">
<?php
//On affiche un message de bienvenue, si lutilisateur est connecte, on affiche son pseudo
?>
Bonjour<?php if(isset($_SESSION['username'])){echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');} ?>,<br />
Bienvenue sur notre site.<br />
Vous pouvez <a href="users.php">voir la liste des utilisateurs</a>.<br /><br />
<?php
//Si lutilisateur est connecte, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
if(isset($_SESSION['username']))
{
?>
<a href="edit_infos.php">Modifier mes informations personnelles</a><br />
<a href="connexion.php">Se d&eacute;connecter</a>
<?php
}
else
{
//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
?>
<a href="sign_up.php">Inscription</a><br />
<a href="connexion.php">Se connecter</a>
<?php
}
?>
		</div>

	</body>
</html>