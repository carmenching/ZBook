<?php
//Paramètres de connexion à la BDD
//$servername = '9883e481-c82d-46c5-b38a-fc00215f3a9c.zbooklike-4405.mysql.dbs.scalingo.com:32235';
//$username = 'zbooklike_4405';
//$password = 'bzDPCikzVTgmw1hmv1Tn';
//$db = 'zbooklike_4405';

//Connexion test au localhost
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'local_zbook';


//définition des variables de connexion
$login = htmlspecialchars(trim($_POST['PseudoUser']));
$PasswordUser = htmlspecialchars(trim($_POST['PasswordUser']));

try {
$conn =new mysqli($servername, $username, $password, $db);
//if(isset($_POST) && !empty($_POST['PseudoUser']) && !empty($_POST['PasswordUser'])) {
  //extract($_POST);
  // on recupère le password de la table qui correspond au login du visiteur
  $sql = "select * from user where PasswordUser='$PasswordUser' and PseudoUser = '$login'";

  //
  $req = $conn->query($sql);
  $row = $req->fetch_assoc();


  if($row != null){
    session_start();
    $_SESSION['PseudoUser'] = $login;
    echo "connexion ok ";

  }
 else {

     echo "connexion pas ok";
     exit;
 }  

 $conn->close();
}catch (Exception $e){
    die("Impossible de se connecter" .$e->getMessage);
   
   
   
}
?>