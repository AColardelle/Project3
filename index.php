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
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/gif" href="img/logo_gbaf.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
  </head>
  <body>
    <?php include("header.php"); ?>
    <h1>Bienvenue sur le site du Groupement Banque Assurance Français.  </h1>
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
            <label for="pseudo"> Pseudo :</label><br/>
            <input type="text" name="pseudo" id="pseudo"/><br/>
            <label for="pass">Mot de passe :</label><br/>
            <input type="password" name="pass" id="pass"/><br/>
            <input type="submit" value="Connexion" />
          </p>
        </form>
        <h2>
          <a href="pass_oublie.php">
            Mot de passe oublié
          </a></h2>
      <h2>
        <a href="nouveau_membre.php">
          Nouveau Membre
        </a></h2>



  <?php    include("footer.php"); ?>

 </body> </html>
