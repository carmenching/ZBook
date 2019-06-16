<?php
require('config/DBCNX.php');
session_start();

// envoyer le contenu d'un post vers la bdd
if (!empty($_POST['postContent'])||!isset($_POST['postContent'])) {
    if($send = $mysqli->prepare("INSERT INTO post(ContentPost, IDUser) VALUES (?,?)")) {
        $si = "si";
        $postContent = $_POST['postContent'];
        $userID = $_SESSION['userID'];

        $send->bind_param($si, $postContent, $userID);
        $send->execute();
        $send->close();
    }
};


// afficher à l'aide d'ajax le dernier post 

$querySearch = "SELECT user.IDUser, post.IDPost, user.FirstNameUser, user.LastNameUser, post.DatePost, post.ContentPost, COUNT(post_like.IDPostLike) AS NumberLikes
                FROM post LEFT JOIN post_like ON post_like.IDPost = post.IDPost, user WHERE user.IDUser = post.IDUser 
                GROUP BY IDPost 
                ORDER BY post.DatePost DESC LIMIT 1";


if ($fetch = $mysqli->query($querySearch)) {
    while ($post = $fetch->fetch_assoc()) {
        echo 
        "<article class=\"ww fullpost\">
        <p class=\"post-title p-3 bb\"><a class=\"bbt\" href=\"otherProfile.php/?userID=".$post['IDUser']."\">".$post['FirstNameUser']." ".$post['LastNameUser']."</a><small class=\"ml-4\">".$post['DatePost']."</small></p>
        <p class=\"postcontent p-3\">" . $post['ContentPost'] . "</p>
        <div class=\"aligncenter\">
        <a class=\"likePost bbt pl-3 pb-3 aligncenter\" href=\"publications_like.php/?like=". $post['IDPost']."\"><img src=\"img/like.png\" alt=\"like icon\" style=\"width:20px\">
        <p id =\"postid".$post['IDPost']. "\" class=\"likeCount m-0\">".intval($post['NumberLikes'])."</p></a>
        </div>
        </article>";

    }
    $fetch->close();
}

$mysqli->close();   


?>