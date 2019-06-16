<?php
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: '.$rootPath.'login.php');
} 
require('config/DBCNX.php');
// recuperer la session d'utilisateur et injecter l'info sur header
<<<<<<< HEAD
session_start();
=======
>>>>>>> 2f5a23883134ddcea959e156eec66f4d294c9657
include 'template/headerpreset.php';

$query = "UPDATE user SET lastActive=NOW() WHERE IDUser =".$_SESSION['userID'];
if($update = $mysqli->prepare($query)) {
	$update->execute();
}
?>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<div id="FULLPAGE" class="row">	

	<!-- contient la division centrale de la page (timeline + module de publication) -->
<<<<<<< HEAD
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
=======
	<div class="container">
		<div class="row mb-5 mt-5">
			<div id="usersOnline" class="p-4 col-2">
				<p class="bbt amatic fs-2">Utilisateurs Actif</p>
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
>>>>>>> 2f5a23883134ddcea959e156eec66f4d294c9657

			<div id="PUBLISHER" class="p-4 col-10">
				<form action="publications.php" method="post" id="submit_post">
					<div class="">
						<p class="text-center bbt amatic fs-2" id="POSTTOPTEXT">Publier Un Post</p>
					</div>
					<div class="ww p-4 aligncenter" id="postPublisher">
						<textarea type='text' class="noBorder" rows="4" name="postContent" id="postContent" style="width:85%;"></textarea>
						<input class="valid-btn bbb wt" type="submit" valeur="Send" src="img/buttonmessage.png" class="btn bbb wt">
					</div>
				</form>
					
				<!-- la timeline en elle même -->
				<div id="TIMELINE" class="mt-3">
					<!-- ceci est un type post: -->

					<?php
					// recuperer tous les posts depuis la bdd
					$querySearch = "SELECT user.IDUser, post.IDPost, user.FirstNameUser, user.LastNameUser, post.DatePost, post.ContentPost, COUNT(post_like.IDPostLike) AS NumberLikes 
									FROM post LEFT JOIN post_like ON post_like.IDPost = post.IDPost, user 
									WHERE post.IDUser = user.IDUser 
									GROUP BY IDPost 
									ORDER BY post.DatePost DESC";
									
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
