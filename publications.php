<?php
require('config/DBCNX.php');

if($send = $mysqli->prepare("INSERT INTO post(ContentPost, IDUser) VALUES (?,?)")) {
    $si = "si";
    $postContent = $_POST['postContent'];
    $userID = 1;

    $send->bind_param($si, $postContent, $userID);
    $send->execute();
};
$send->close();
     
$showContent = $_POST['postContent'];
$querySearch = "SELECT DatePost, ContentPost FROM POST ORDER BY DatePost DESC LIMIT 1";
if ($fetch = $mysqli->query($querySearch)) {
    while ($post = $fetch->fetch_assoc()) {
        echo "<article class=\"fullpost\">
        <p><a href=\"\">Robert Roger</a><small>".$post['DatePost']."</small></p>
        <p class=\"postcontent\">" . $post['ContentPost'] . "</p></article>";
    }
}
$mysqli->close();
?>