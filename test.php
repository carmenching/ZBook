<?php
require('config/DBCNX.php');
session_start();
$action="messenger";
include 'template/headerpreset.php';

$chatWith = $_GET['idUser'];
$currentUser = $_SESSION['userID'];
$messageQuery = "SELECT * FROM message WHERE (messageSentBy =".$chatWith." AND messageSentTo = ".$currentUser.") OR (messageSentBy =".$currentUser." AND messageSentTo =".$chatWith.") ORDER BY messageDate DESC";
echo $messageQuery;
if($messageFetch = $mysqli->prepare($messageQuery)) {
	$messageFetch->execute();
	$result = $messageFetch->get_result();
	while($message = $result->fetch_assoc()) {
		var_dump($message);
    }
}
?>