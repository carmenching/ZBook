<?php
//Paramètres de connexion à la BDD
$servername = '9883e481-c82d-46c5-b38a-fc00215f3a9c.zbooklike-4405.mysql.dbs.scalingo.com:32235';
$username = 'zbooklike_4405';
$password = 'bzDPCikzVTgmw1hmv1Tn';
$db = 'zbooklike_4405';

//Connexion test au localhost
//$servername = 'localhost';
//$username = 'root';
//$password = '';
//$db = 'zbook';

// Connexion à la DB
try{
	$conn = new mysqli($servername, $username, $password, $db);
	//echo "Connexion réussie !";
	//Variables pour ajouter un utilisateur
	$Lastname = htmlspecialchars(trim($_POST['lastname']));
	$Firstname = htmlspecialchars(trim($_POST['firstname']));
	$Pseudo = htmlspecialchars(trim($_POST['pseudonyme']));
	$Password = htmlspecialchars(trim($_POST['pass1']));
	$Email = htmlspecialchars(trim($_POST['mail']));
	$Birthdate = htmlspecialchars(trim($_POST['birthdate']));

	$rqsql ="INSERT INTO USER VALUES ('', '$Lastname', '$Firstname', '$Pseudo',	'$Password', '$Email', '$Birthdate')";


	//On ajoute l'utilisateur à la BDD
	$res = $conn->query($rqsql);

	//Message de confirmation de création de l'utilisateur'
	//echo "USer succesfully created";

}catch (Exception $e){
	die("Impossible de se connecter" .$e->getMessage);
}


?>