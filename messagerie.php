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
	<div>
		<!-- liste des gens -->
		<ul>
			<li>
				<a href="">
					<img src=""> 
					<p>CARLO</p>
				</a>
			</li>
		</ul>
	</div>

	<!-- section messagerie -->
	<div>
		
	</div>

</div>