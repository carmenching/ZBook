<?php
require('config/DBCNX.php');
session_start();

// envoyer le contenu d'un post vers la bdd

if($send = $mysqli->prepare("INSERT INTO post(ContentPost, IDUser) VALUES (?,?)")) {
    $si = "si";
    $postContent = $_POST['postContent'];
    $userID = $_SESSION['userID'];

    $send->bind_param($si, $postContent, $userID);
    $send->execute();
    $send->close();
};


// afficher à l'aide d'ajax le dernier post 

$querySearch = "SELECT post.IDPost, user.FirstNameUser, user.LastNameUser, post.DatePost, post.ContentPost FROM post, user WHERE user.IDUser = post.IDUser ORDER BY post.DatePost DESC LIMIT 1";
if ($fetch = $mysqli->query($querySearch)) {
    while ($post = $fetch->fetch_assoc()) {
        echo "<article class=\"fullpost\">
        <p><a href=\"\">".$post['FirstNameUser']." ".$post['LastNameUser']."</a><small>".$post['DatePost']."</small></p>
        <p class=\"postcontent\">" . $post['ContentPost'] . "</p>
        <a href=\"publications.php/?like=". $post['IDPost']."\"><img src=\"img/like.png\" alt=\"like icon\" style=\"width:20px\"></a>
        </article>";
    }
    $fetch->close();
}

$mysqli->close();   


?>