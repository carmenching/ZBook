<?php
require('config/DBCNX.php');

// envoyer le contenu d'un post vers la bdd
if($send = $mysqli->prepare("INSERT INTO post(ContentPost, IDUser) VALUES (?,?)")) {
    $si = "si";
    $postContent = $_POST['postContent'];
    $userID = 1;

    $send->bind_param($si, $postContent, $userID);
    $send->execute();
};
$send->close();

// afficher à l'aide d'ajax le dernier post 
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