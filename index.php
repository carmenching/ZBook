<?php
require('config/DBCNX.php');

// recuperer la session d'utilisateur et injecter l'info sur header
session_start();
include 'template/header.php';
require('headerpreset.php');

if(empty($_SESSION['username'])) {
	header('Location: login.php');
} 
?>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<div class="spacer"></div>

<div id="FULLPAGE" class="row">	

	<!-- Barre latérale gauche -->
	<div class="void col-0 col-sm-1 col-md-2">
	</div>

	<!-- contient la division centrale de la page (timeline + module de publication) -->
	<div id="MIDDLE" class="col-12 col-sm-10 col-md-8">

		<!-- module de publication -->
<div id="PUBLISHER" class="row">
<form action="publications.php" method="post" class="col-12">
	<div class="lilspacer row"></div>
	<div class="row">
		<div class="col-2"><img src=""></div>
		<p class="col-8 text-center bt" id="POSTTOPTEXT">Publier Un Post</p>
		<div class="col-2"></div>
	</div>
	<div class="row">
		<img src="" class="col-1">
		<input type='text' class="form-control col-10" rows="4" name="postContent" id="postContent"></input>
		<div class="col-1"><div class="row"><input type="submit" valeur="Send" class="col-12" src="img/buttonmessage.png" id="BUTTONPUB" style="width: 40px; height: 40px;"></input></div></div>
	</div>
	<div class="lilspacer row"></div>
			</form>
		</div>
		
		<!-- la timeline en elle même -->
		<div id="TIMELINE">
			<!-- ceci est un type post: -->

<?php
		// recuperer tous les posts depuis la bdd
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
            <p id =\"postid".$post['IDPost']. "\" class=\"likeCount\">".intval($post['NumberLikes'])."</p>
            </article>";
        }
    }
    $mysqli->close();
?>
		
			<article class="fullpost">
				<p><a href="">Robert Roger</a></p>
				<p class="postcontent">J'ai mangé un ananas ce midi, c'était bon putain! j'aime me mettre des concombres dans les oreilles en pensant à ta mère. Je crois bien que je vis ma meilleure vie. #CACTUS</p>
			</article>

		</div>
	</div>


	<!-- Barre latérale de menu -->
	<div class="void col-0 col-sm-1 col-md-2">
	</div>
</div>

<script src="ajax/publications.js"></script>
<div class="spacer"></div>

<?php
require('footerpreset.html');
?>
</body>
</html>