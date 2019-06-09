<?php
session_start();    

if(empty($_SESSION['username'])) {
    header("location:http://localhost/zbook/login.php");
}

require('config/DBCNX.php'); 
include 'template/headerpreset.php';    


?>

<form id="userSearch" style="border:solid 1px #222;" action="searchList.php" method="POST">
    <h1>Search a User</h1>
    <input class="form-control col-10" type="text" name="searchUserName" id="searchUserName">
    <input type="submit" valeur="Send">
</form>

<section id="usersList">
</section>

<script src="ajax/searchUser.js"></script>

<?php
include 'template/footerpreset.php';
?>
