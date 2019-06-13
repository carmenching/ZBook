<?php
require('config/DBCNX.php');

// getAllPost($mysqli);

// recuperer tous les posts depuis la bdd
/*function getAllPost($mysqli) {
    $querySearch = "SELECT post.IDPost, user.FirstNameUser, user.LastNameUser, post.DatePost, post.ContentPost, COUNT(post_like.IDPostLike) AS NumberLikes 
                    FROM post LEFT JOIN post_like ON post_like.IDPost = post.IDPost, user 
                    WHERE post.IDUser = user.IDUser 
                    GROUP BY IDPost 
                    ORDER BY post.DatePost DESC";
                    
    if ($fetch = $mysqli->query($querySearch)) {
        while ($post = $fetch->fetch_assoc()) {
            echo 
            "<article class=\"fullpost\">
            <p><a href=\"\">".$post['FirstNameUser']." ".$post['LastNameUser']."</a><small>".$post['DatePost']."</small></p>
            <p class=\"postcontent\">" . $post['ContentPost'] . "</p>
            <a class=\"likePost\" href=\"publications_like.php/?like=". $post['IDPost']."\"><img src=\"img/like.png\" alt=\"like icon\" style=\"width:20px\"></a>
            <p class=\"likeCount\"></p>
            </article>";
            var_dump($post);
            echo gettype(intval($post['NumberLikes']));
        }
    }
    $mysqli->close();
}
*/

// echo $_SERVER['DOCUMENT_ROOT']."/zbook";

// $queryOnline = "SELECT PseudoUser, TIMESTAMPDIFF(MINUTE, lastActive, NOW()) AS Minutes 
//                 FROM user WHERE lastActive BETWEEN DATE_SUB(NOW(), INTERVAL 10 MINUTE) 
//                 AND NOW() ORDER BY lastActive DESC";
// if($queryOnline = $mysqli->query($queryOnline)) {
//     while ($userOnline = $queryOnline->fetch_assoc()) {
//         echo "<li>".$userOnline['PseudoUser']."|".$userOnline['Minutes']."</li>";
//     }
// }

