<?php
//Récupérer les données de connexions

// Connexion à la DB
$conn = new mysqli();

//Checker que la connexion fonctionne
if ($cnx->cnx_error){
	die("Impossible de se connecter" . $connection->connect_error);
}
echo "Connexion réussie !";
?>