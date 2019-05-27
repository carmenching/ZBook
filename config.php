<?php

//On se connecte a la BDD en local pour le moment [A CHANGER]
try{
    mysqli_connect('127.0.0.1', 'root', '','local_zbook'); 
    echo "Vous êtes connecté";
}
catch(Exception $e)
{
    die("erreur de connexion".$e->getMessage());
}


//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'default';
?>