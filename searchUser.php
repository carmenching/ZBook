<?php
require('config/DBCNX.php'); 
include 'template/headerpreset.php';

?>

<form action="searchList.php">
    <input type="text" name="searchUserName" id="searchUserName">
</form>

<section>
<?php
include 'template/footerpreset.php';
?>