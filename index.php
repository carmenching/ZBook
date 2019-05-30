<?php
require('config/DBCNX.php');
require('headerpreset.html');
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
		<div id="PUBLISHER">
			<form action="publications.php" method="post">
			<p>Publier :</p>
			<input type="text" name="postContent">
			<button type="submit">Submit</button>
			</form>
		</div>
		
		<!-- la timeline en elle même -->
		<div id="TIMELINE">

			<!-- ceci est un type post: -->
<?php
		if ($fetch = $mysqli->query("SELECT DatePost, ContentPost FROM POST ORDER BY DatePost")) {
			while ($post = $fetch->fetch_assoc()) {
				echo "<article class=\"fullpost\">
				<p><a href=\"\">Robert Roger</a></p>
				<p class=\"postcontent\">" . $post['ContentPost'] . "</p></article>";
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

<div class="spacer"></div>

<?php
require('footerpreset.html');
?>

</body>
</html>