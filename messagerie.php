<?php
require('config/DBCNX.php');
require ('headerpreset.html');
?>

<?php
require('config/msgquery.php');
?>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<div id="FULLPAGE" class="row">	

	<!-- Barre latérale gauche -->
	<div class="void col-0 col-sm-1 col-md-2">
	</div>

	<!-- contient la division centrale de la page (timeline + module de publication) -->
	<div id="MIDDLE" class="col-12 col-sm-10 col-md-8">
		<script type="text/javascript" src="js/main.js"></script>
		<?php print ( empty($messages) ) ? '<p id="nopost">Aucun message !</p>' :''; ?>
		<div id="messagerie">
			<?php ?>
			<form action="messagerie.php">
				<label for="auteur">Auteur :</label><input type="text" id="auteur" size="20" />
				<label for="corps">Message :</label><textarea id="corps" cols="30" rows="7"></textarea>
				<input type="submit" value="Envoyer" />
			</form>
		</div>
		<div id="messages">
			<?php
			foreach($messages as $message) {
				printMessage($message);
			}
			?>
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