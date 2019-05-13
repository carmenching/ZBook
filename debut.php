<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>

<?php
if (!empty($titre)) 
{
    echo '<title> '.$titre.' </title>';
}
else //Sinon, on écrit forum par défaut
{
    echo '<title> Zbook </title>';
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylezbook" media="screen" type="text/css" title="Design" href="" />
</head>
<?php

//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

//On inclus les 2 pages restantes
include("./includes/functions.php");
include("./includes/constants.php");
?>
