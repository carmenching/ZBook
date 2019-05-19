<?php

//R�cup�rer les donn�es de connexions

$servername = 'localhost';

$username = 'root';

$password = '';

$db = 'zbook';



// Connexion � la DB

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_errno) {

    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

}


?>