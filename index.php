<?php
session_start();
if (!empty($_SESSION['id']))
{
header('location:page_principale.php');
}

?>
 
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <title>Page d'acceuil</title>
  </head>
  <header>
    <?php include("header.php"); ?>
  </header>
  <body>
  <h1>Bienvenue sur le site du Groupement Banque Assurance Français​  </h1>
<?php 
if (!empty($_GET['creation']))
{
echo "Votre compte à bien été créé";;
}

if(!empty( $_GET['pass'])) {
echo "Mauvais identifiant ou mot de passe";} 


if(!empty( $_GET['change_pass'])) {
echo "Votre mot de passe à bien été changé";} ?>


  <form action="connexion_membre.php" method="POST">
      <p>
      <label for="pseudo"> Pseudo :</label><br>
      <input type="text" name="pseudo" id="pseudo"/></br>
      <label for="pass">Mot de passe :</label><br>
      <input type="password" name="pass" id="pass"/></br>
      <input type="submit" value="Connexion" />
      </p>

      <h2> <a href="pass_oublie.php">mot de passe oublié </a></h2>
      <h2> <a href="nouveau_membre.php">Nouveau Membre </a></h2>

  </body>

  <footer>
  <?php    include("footer.php"); ?>
  </footer>
</html>
