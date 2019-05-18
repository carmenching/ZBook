<?php

//R�cup�rer les donn�es de connexions

$servername = 'localhost';

$username = 'id9626323_tifaky';

$password = 'tifa9205';

$db = 'id9626323_zbookdemo';



// Connexion � la DB

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_errno) {

    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

}

echo $mysqli->host_info . "\n";



?>