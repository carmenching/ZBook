<?php
//R�cup�rer les donn�es de connexions

// Connexion � la DB
$conn = new mysqli();

//Checker que la connexion fonctionne
if ($cnx->cnx_error){
	die("Impossible de se connecter" . $connection->connect_error);
}
echo "Connexion r�ussie !";
?>