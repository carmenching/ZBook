<?php
require('config/DBCNX.php');

// if($send = $mysqli->prepare("INSERT INTO post(ContentPost, IDUser) VALUES (?,?)")) {
//     $si = "si";
//     $postContent = $_POST['postContent'];
//     $userID = 1;

//     $send->bind_param($si, $postContent, $userID);
//     $send->execute();
// };
// $send->close();

$username = $_POST['username']; 
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$password = $_POST['password']; 
$repeatPassword = $_POST['repass']; 
$mail = $_POST['mail']; 
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


