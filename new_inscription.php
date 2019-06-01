<?php
require('config/DBCNX.php');

// recuperer tous les données envoyés par le formulaire inscription utilisateur
$username = $_POST['username']; 
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$password = $_POST['password']; 
$repeatPassword = $_POST['repass']; 
$mail = $_POST['mail']; 
$validate = true;

// ----verifier tous les données envoyés et si les champs sont vides. ---------
// debut
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
    echo "identifiant ne peut pas être vide";
    $validate = false;
}

if(empty($repeatPassword)) {
    echo "identifiant ne peut pas être vide";
    $validate = false;
}

if($password != $repeatPassword) {
    echo "les mots de passe saisi ne sont pas les mêmes";
}

if(empty($mail)) {
    echo "identifiant ne peut pas être vide";
    $validate = false;
}

$dob = strtotime($_POST['dob']);
if(empty($dob)) {
    echo "merci de saisir votre date de naissance";
    $validate = false;
} else {
    $dateDeNaissance = date('Y-m-d', $dob);
}
// fin de vérification ----------------------------------

// envoyer les donées récu vers la bdd
if ($validate) {
    if($subscribe = $mysqli->prepare("INSERT INTO user(LastNameUser, FirstNameUser, PseudoUser, PasswordUser, MailUser, BirthDateUser) VALUES (?,?,?,?,?,?)")) {
        $format = "ssssss";        
       
        $subscribe->bind_param($format, $lastname, $firstname ,$username, $password, $mail, $dateDeNaissance);
        $subscribe->execute();
        echo "user added";
    };
    $subscribe->close();
}
