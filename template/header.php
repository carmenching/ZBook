<!DOCTYPE html>
<html>
<head>
	<title> ZBook - Accueil </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
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
			<li>
				<a href="#"><?php echo $_SESSION['username'] ?></a>
			</li>
		</ul>
	</div>