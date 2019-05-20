<?php
require('config/DBCNX.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- barre du haut, contiendra logo, shearchbar etc -->
<div id="TOPBAR">
	<ul id="TOPBARLIST">
		<li><a href="index.html"><img src="img/mainlogo.png" id="LOGO"></a></li>
		<li>
			<div class="search">
				<input type="text" class="searchTerm" placeholder="Rechercher ...">
				<button type="submit" class="searchButton"></button>
    		</div>
    	</li>
	</ul>
</div>

<!-- contient la page en elle même, timeline + barre latérale, .... -->
<div id="FULLPAGE">

	<!-- section des amis -->
	<div class="sidebar">
		<!-- liste des gens -->
		<ul id="LEFTBAR">
			<li class="sidebarlink">
				<a href="" class="imgplustext">
					<img src="img/buttonfriends.png" class="pponlist"> 
					<p>CARLO</p>
				</a>
			</li>
		</ul>
	</div>

	<!-- section messagerie -->
	<div id="FULLMESSAGEFEED">
		<div class="messagegroup">
			<p class="dudewriting">ROBERT</p>
			<div class="message" class="receivedmessage">
				<p>sexe</p>
			</div>
			<div class="message" class="receivedmessage">
				<p>je suis pour le concubinage</p>
			</div>
		</div>
		<div class="messagegroup">
			<p class="dudewriting">MOI</p>
			<div class="message" class="sentmessage">
				<p>oh oui faisons ça!</p>
			</div>
		</div>
	</div>

</div>