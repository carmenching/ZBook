<?php
require('config/DBCNX.php');

// recuperer tous les données envoyés par le formulaire inscription utilisateur
// ----verifier tous les données envoyés et si les champs sont vides. ---------
// debut
if(isset($_POST['submit'])) { 
    $username = htmlspecialchars(trim($_POST['username'])); 
    $firstname = htmlspecialchars(trim($_POST['firstname'])); 
    $lastname = htmlspecialchars(trim($_POST['lastname'])); 
    $password = htmlspecialchars($_POST['password']); 
    $psw = htmlspecialchars($_POST['psw']); 
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $mail = htmlspecialchars(trim($_POST['mail'])); 
    $dob = htmlspecialchars(trim(strtotime($_POST['dob'])));
    $validate = true;
    
    if(empty($username)) {
        echo "identifiant ne peut pas être vide";
        $validate = false;
    }

    if(empty($firstname)) {
        echo "prénom ne peut pas être vide";
        $validate = false;
    }

    if(empty($lastname)) {
        echo "nom ne peut pas être vide";
        $validate = false;
    }

    if(empty($password)) {
        echo "mot de passe ne peut pas être vide";
        $validate = false;
    }

    if(empty($psw)) {
        echo "mot de passe ne peut pas être vide";
        $validate = false;
    }

    if($password != $psw) {
        echo "les mots de passe saisi ne sont pas les mêmes";
    }

    if(empty($mail)) {
        echo "l'adresse mail ne peut pas être vide";
        $validate = false;
    }

    if(empty($dob)) {
        echo "merci de saisir votre date de naissance";
        $validate = false;
    } else {
        $dateDeNaissance = date('Y-m-d', $dob);
    }

}
// fin de vérification ----------------------------------

// envoyer les donées récu vers la bdd
if ($validate) {
    if($subscribe = $mysqli->prepare("INSERT INTO user(LastNameUser, FirstNameUser, PseudoUser, PasswordUser, MailUser, BirthDateUser) VALUES (?,?,?,?,?,?)")) {
        $format = "ssssss";        
       
        $subscribe->bind_param($format, $lastname, $firstname ,$username, $hash, $mail, $dateDeNaissance);
        $subscribe->execute();
        echo "l'utilisateur ajoutée, vous serez redirigé vers la page de connexion";
    };
	$subscribe->close();
	header("refresh:5; url=http://localhost/zbook/login.php");

}

