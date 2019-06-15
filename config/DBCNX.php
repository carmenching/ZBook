<?php

//Récupérer les données de connexions
// <--------serveur scallingo---------->
$servername = 'localhost';
$username = 'zbooklike_4405';
$password = 'bzDPCikzVTgmw1hmv1Tn';
$db = 'zbooklike_4405';

// <--------local server---------->
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $db = 'zbook';
$rootPath = "http://".$_SERVER['SERVER_NAME']."/zbook/";
$home = $rootPath."index.php";

// Connexion � la DB

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



?>
