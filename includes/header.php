<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css" />
  <title></title>

</head>

<header>
  <div class="flex_entete">
    <div class="logo"><a href="page_principale.php"><img class="image_tete" src="img/logo_gbaf.png" alt="logo gbaf"></a> </div>

<?php /* Affichage du nom et prenom selon la session*/
if (isset($_SESSION['id'])) {
    $id =$_SESSION['id'];
    $reponse = $db->query("SELECT * FROM membre_gbaf  WHERE id='$id'");
    $donnees = $reponse->fetch(); ?>
    <div class="deco">   <a href="parametre.php"><?php echo ''.$donnees['prenom'].' '.$donnees['nom'].'' ; ?></a> <br/>
          <a href="deconnexion.php"><input class="bouton_deco" type="button" value="Déconnexion"></a></div>
    <?php
} else {
    echo "vous n'est pas connecte";
    }
?>
   </div>
</header>
<body>
</body>

</html>
 
