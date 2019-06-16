<?php
session_start();    

if(empty($_SESSION['username'])) {
    header("location:http://localhost/zbook/login.php");
}
$action ="searchUser";
require('config/DBCNX.php'); 
include 'template/headerpreset.php';    

?>
<main class="container">
    <form id="userSearch" class="align-center" action="searchList.php" method="POST">
        <h1>Search a User</h1>
        <input type="text" name="searchUserName" id="searchUserName">
    </form>

    <section class="align-center">
        <div id="usersList" class="hiddenwithouthover">
        </div>
    </section>
</main>
<script src="ajax/searchUsers.js"></script>


<!-- <script src="ajax/addUsers.js"></script> -->

<?php
include 'template/footerpreset.php';
?>
