<?php
//R�cup�rer les donn�es de connexions
$servername = '185.98.131.90';
$username = 'breto1088830_2spl7';
$password = '7yng5velfj';
$db = 'breto1088830_2spl7';

// Connexion � la DB
$conn = new mysqli();

//Checker que la connexion fonctionne
if ($cnx->cnx_error){
	die("Impossible de se connecter" . $connection->connect_error);
}
echo "Connexion r�ussie !";
?>