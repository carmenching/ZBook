<?php
require('config/DBCNX.php');
session_start();

if(isset($_GET['like'])) {
    if($send = $mysqli->prepare("INSERT INTO post_like(IDPost, IDUser) VALUES (?,?)")) {
        $si = "ii";
        $idPost = $_GET['like'];
        $userID = $_SESSION['userID'];

        $send->bind_param($si, $idPost, $userID);
        $send->execute();
    };
    $send->close();
    // header("Location:$home");
}

header('Location: http://localhost/zbook/index.php');
