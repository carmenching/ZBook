<?php
require('config/DBCNX.php');

// recuperer la session d'utilisateur et injecter l'info sur header
session_start();
include 'template/header.php';

if(empty($_SESSION['username'])) {
	header('Location: http://localhost/zbook/login.php');
} 
?>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<div id="FULLPAGE">	

	<!-- Barre latérale gauche -->
	<div class="sidebar">
		<ul id="LEFTBAR">
			<li class="sidebarlink"><?php echo"<a href=\"profile.php?user=".$_SESSION['username']."\">PROFIL</a>"?></li>
			<li class="sidebarlink"><a href="">CHAT</a></li>
			<li class="sidebarlink"><a href="">AMIS</a></li>
		</ul>
	</div>

	<!-- contient la division centrale de la page (timeline + module de publication) -->
	<div id="MIDDLE">

		<!-- module de publication -->
		<div id="PUBLISHER">
			<form id="submit_post">
			<p>Publier :</p>
			<input type="text" name="postContent" id="postContent">
			<input type="submit" value="Send">
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
		
			<!-- <article class="fullpost">
				<p><a href="">Robert Roger</a></p>
				<p class="postcontent">J'ai mangé un ananas ce midi, c'était bon putain! j'aime me mettre des concombres dans les oreilles en pensant à ta mère. Je crois bien que je vis ma meilleure vie. #CACTUS</p>
			</article> -->

		</div>
	</div>


	<!-- Barre latérale de menu -->
	<div class="sidebar">
		<ul id="RIGHTBAR">
			<li class="sidebarlink"><a href="">PROFIL</a></li>
			<li class="sidebarlink"><a href="">CHAT</a></li>
			<li class="sidebarlink"><a href="">AMIS</a></li>
		</ul>
	</div>
</div>

<script src="ajax/publications.js"></script>
</body>
</html>