<!DOCTYPE html>
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
     <input type="password" name="password" placeholder="Mot de passe"  pattern="(?=.*\d)(?=.*[a-b])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir 
       une lettre majuscule et miniscule, et au minimun 8 caracteres ou plus" required><br><br>    
     <input type="password" name="psw" id="psw" placeholder="Confirmez mot de passe"><br><br>   
     <input type="email" name="mail" placeholder="Adresse mail"><br><br>
     <input type="date" name="dob" placeholder="Date de naissance"><br><br>
     <input type="submit" value="Inscription" name="submit"><br><br>
    </form>

 </div>

<!-- boite a message pour le mot de passe-->
   <div id="message">
      <h3>Le mot de passe doit contenir les elements suivants</h3>
      <p id="letter" class="invalid">Une <b>lettre</b>miniscule</p>
      <p id="capital" class="invalid">Une <b>lettre</b>majuscule</p>
      <p id="number" class="invalid">Un<b>nombre</b></p>
      <p id="length" class="invalid">Minimum <b>8 caracters</b></p>
    </div>
                

     <script src="main.js"><script>
 </body>
</html>

