<?php
require('config/DBCNX.php');


if($send = $mysqli->prepare("INSERT INTO post(ContentPost, IDUser) VALUES (?,?)")) {
    $si = "si";
    $postContent = $_POST['postContent'];
    $userID = 1;

    $send->bind_param($si, $postContent, $userID);
    $send->execute();

};
printf("%d post uploaded.\n", $mysqli->affected_rows);
$send->close();


header("refresh:5;url=index.php");
?>