<?php
session_start();
include("connexion_db.php");

if (empty($_SESSION['id'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Groupement Banque Assurance Français</title>
  </head>
  <?php include("header.php") ?>
  <body>
 <?php /* on recupere les informations sur l'acteur pour afficher l'article, le logo ainsi que les commentaires lie a cette acteur */
 $id=$_GET['id_acteur'];
 $reponse = $db->query("SELECT * FROM acteur  WHERE id_acteur='$id'");
 $donnees = $reponse->fetch();
 ?>
 <br/>
 <img class="logo_article" src=<?php echo $donnees['logo']?> alt=""><br/>
<div class="texte_article">

  <?php

 echo '<br/>' .$donnees['description'].'<br/>';
?> </div> <br/><br/><br/>

<div class="commentaire_total">
<div class="partie_haute_commentaire">
<div class="nb_com">
<?php include("nombre_com.php");
 echo   "" .$commentaire. " Commentaires" ;
  include("nombre_like.php");
?>
</div>

<div class="new_com"> <a href="article.php?id_acteur=<?php echo $donnees['id_acteur'] ?>&new_post=1"><input type="button" value="Nouveau commentaire" /></a></div>


<!--Affichage des likes -->
<div class="likes"><a href="likes.php?t=1&id=<?=$id ?> "> <img class="pouce" src="img/pouce_bleu.png" alt="pouce"><?php echo "".$likes.""; ?></a></div>
<div class="dislikes"><a href="likes.php?t=-1&id=<?=$id ?> "><img class="pouce" src="img/pouce_rouge.png" alt="pouce"><?php echo "".$dislike.""; ?></a></div>
</div>
<?php /* affichage du form pour envoyer un message si on clique sur nouveau message*/
if (!empty($_GET['new_post'])) {?>
<form  action="#comm" method="POST"/>
          <p id="new">
          <label for="post">Message:</label><br>
          <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id'] ?>"/>
          <input type="hidden" name="id_acteur" id="id_acteur" value="<?php echo $id ?>"/>
          <input type="text" name="post" id="post" /></br>
          <input type="submit" value="Envoyer votre commentaire" />
        <?php   } include("insertion_commentaire.php");?>
          </p>

<br/> <!-- affichage des commentaires -->>
<h3 id="comm" class="les_commentaires">Les commentaires</h3>


 <?php include("afficher_commentaire.php");?>

</div>

<footer><?php    include("footer.php"); ?></footer>
  </body>
</html>