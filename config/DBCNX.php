<?php

//Récupérer les données de connexions
// <--------serveur scallingo---------->
// $servername = '9883e481-c82d-46c5-b38a-fc00215f3a9c.zbooklike-4405.mysql.dbs.scalingo.com:32235';
// $username = 'zbooklike_4405';
// $password = 'bzDPCikzVTgmw1hmv1Tn';
// $db = 'zbooklike_4405';

// <--------local server---------->
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'zbook';
$rootPath = $_SERVER['DOCUMENT_ROOT']."/zbook/";
$home = $rootPath."index.php";

// Connexion � la DB

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else { 
    echo "successful";
}



?>
