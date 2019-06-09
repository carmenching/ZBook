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
    <input type="submit" valeur="submit" id="searchSubmit">
</form>

<section id="usersList">
</section>

<script>
$(document).ready(function() {
    $('#searchUserName').keyup(function() {
        var searchUserName = $(this).val();
        if (searchUserName != '') {
            $.ajax({
                url: "searchList.php",
                method: "POST",
                data : {searchUserName : searchUserName},
                success : function(data) {                    
                    $('#usersList').html(data);
                    console.log(data);
                }
            });
        }
    });
});
</script>

<?php
include 'template/footerpreset.php';
?>
