<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
$titre = "Index du forum";
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");
<?php
echo'<i>Vous êtes ici : </i><a href ="./index.php">Index du forum</a>';
?>
<h1>Mon super forum</h1>

<?php
//Initialisation de deux variables
$totaldesmessages = 0;
$categorie = NULL;
?>
<?php

//Cette requête permet d'obtenir tout sur le forum
$query=$db->prepare('SELECT IDUser, LastNameUser, FirstNameUser, PseudoUser, BirthDateUser
FROM USER
WHERE IDUser <= :lvl ');
$query->bindValue(':lvl',$lvl,PDO::PARAM_INT);
$query->execute();
?>

<table>
<?php
//Début de la boucle
while($data = $query->fetch())
{
    //On affiche chaque catégorie
    if( $categorie != $data['IDUser'] )
    {
        //Si c'est une nouvelle catégorie on l'affiche
       
        $categorie = $data['IDUser'];
        ?>
        <tr>
        <th></th>
        <th class="titre"><strong><?php echo stripslashes(htmlspecialchars($data['IDUser'])); ?>
        </strong></th>             
        <th class="nombremessages"><strong>Sujets</strong></th>       
        <th class="nombresujets"><strong>Messages</strong></th>       
        <th class="derniermessage"><strong>Dernier message</strong></th>   
        </tr>
        <?php
               
    }

    //Ici, on met le contenu de chaque catégorie
    ?>