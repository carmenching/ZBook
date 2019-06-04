<html>
<head>
<meta  charset="utf-8"/>
 <title>Inscription</title>
 <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   <div class="signup">
    <form action="new_inscription.php" method="POST" id="inscription_form">
     <h2 style="color: #fff;">Créer un compte</h2>
     <input type="pseudo" name="username" placeholder="Pseudo"><br><br>
     <input type="text" name="firstname" placeholder="Prenom"><br><br>
     <input type="text" name="lastname" placeholder="Nom"><br><br>
     <input type="password" name="password" placeholder="Mot de passe"><br><br>    
     <input type="password" name="repass" placeholder="Confirmez mot de passe"><br><br>   
     <input type="email" name="mail" placeholder="Adresse mail"><br><br>
     <input type="date" name="dob" placeholder="Date de naissance"><br><br>
     <input type="submit" value="Inscription" name="submit"><br><br>
    </form>
 </div>
</body>
</html>

