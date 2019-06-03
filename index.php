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
					<textarea class="form-control col-10" rows="4"></textarea>
					<div class="col-1"><div class="row"><input type="image" class="col-12" src="img/buttonmessage.png" id="BUTTONPUB" style="width: 40px; height: 40px;"></input></div></div>
				</div>
				<div class="lilspacer row"></div>
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

            <article class="fullpost">
                <p><a href="">Robert Roger</a></p>
                <p class="postcontent">J'ai mangé un ananas ce midi, c'était bon putain! j'aime me mettre des concombres dans les oreilles en pensant à ta mère. Je crois bien que je vis ma meilleure vie. #CACTUS</p>
            </article>

            <article class="fullpost">
                <p><a href="">Robert Roger</a></p>
                <p class="postcontent">J'ai mangé un ananas ce midi, c'était bon putain! j'aime me mettre des concombres dans les oreilles en pensant à ta mère. Je crois bien que je vis ma meilleure vie. #CACTUS</p>
            </article>

            <article class="fullpost">
                <p><a href="">Robert Roger</a></p>
                <p class="postcontent">J'ai mangé un ananas ce midi, c'était bon putain! j'aime me mettre des concombres dans les oreilles en pensant à ta mère. Je crois bien que je vis ma meilleure vie. #CACTUS</p>
            </article>

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