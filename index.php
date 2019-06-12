<?php
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: '.$rootPath.'login.php');
} 
require('config/DBCNX.php');
// recuperer la session d'utilisateur et injecter l'info sur header
include 'template/headerpreset.php';

$query = "UPDATE user SET lastActive=NOW() WHERE IDUser =".$_SESSION['userID'];
if($update = $mysqli->prepare($query)) {
	$update->execute();
}
?>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<div id="FULLPAGE" class="row">	

	<!-- contient la division centrale de la page (timeline + module de publication) -->
	<div class="container">
		<div class="row mainRow mb-5 mt-5">
			<div id="usersOnline" class="p-4 col-2">
				<p class="bt">Utilisateurs Active</p>
				<ul id="usersList" class="bbt">
					<?php 
					$queryOnline = "SELECT PseudoUser, TIMESTAMPDIFF(MINUTE, lastActive, NOW()) AS Minutes 
					FROM user WHERE lastActive BETWEEN DATE_SUB(NOW(), INTERVAL 10 MINUTE) 
					AND NOW() ORDER BY lastActive DESC";
					if($queryOnline = $mysqli->query($queryOnline)) {
						while ($userOnline = $queryOnline->fetch_assoc()) {
							echo "<li><p><img src=\"img/avatar.svg\" style=\"width:20px;margin-right:5px;\">".$userOnline['PseudoUser']."</p>
							<small> (Active il y a ".$userOnline['Minutes']." minutes) </small>
							</li>";
						}
					}
					?> 
				</ul>
			</div>
			<div id="PUBLISHER" class="p-4 col-10">
				<form action="publications.php" method="post" id="submit_post">
					<div class="row form-row">
						<p class="text-center bt" id="POSTTOPTEXT">Publier Un Post</p>
					</div>
					<div class="row form-row wb p-4">
						<input type='text' class="noBorder" rows="4" name="postContent" id="postContent" style="width:85%;">
						<input type="submit" valeur="Send" src="img/buttonmessage.png" class="btn bbb wt" style="width:15%;font-weight:bold;">
					</div>
				</form>
					
				<!-- la timeline en elle même -->
				<div id="TIMELINE" class="mt-3">
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
							<p class=\"post-title mt-3\"><a href=\"\">".$post['FirstNameUser']." ".$post['LastNameUser']."</a><small class=\"ml-4\">".$post['DatePost']."</small></p>
							<p class=\"postcontent\">" . $post['ContentPost'] . "</p>
							<a class=\"likePost\" href=\"publications_like.php/?like=". $post['IDPost']."\"><img src=\"img/like.png\" alt=\"like icon\" style=\"width:20px\">
							<p id =\"postid".$post['IDPost']. "\" class=\"likeCount\">".intval($post['NumberLikes'])."</p></a>
							</article>";
						}
					}
					$mysqli->close();
					?>
				</div>
			</div>
		</div>
		<!-- module de publication -->
	</div>

<div class="spacer"></div>
<script src="ajax/publications.js"></script>

<?php
include 'template/footerpreset.php';
?>

