<?php
  session_start();
  include("connexion_db.php");
  if (empty($_SESSION['id']))
    {
      header('location:index.php');
    }
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image" href="img/logo_gbaf.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametre</title>
  </head>
  <body>
    <?php include("header.php");
    $id = $_SESSION['id']; ?>
    <div class="test"> <br/>
<!-- Modification des parametres souhaites  -->
      <h3>Changer de nom utilisateur</h3>
      <p>
        <form action="#" method="POST" >
          <label for="pseudo"></label><br/>
          <input minlength="5"  type="text" name="pseudo" id="pseudo" /> <br/> <br/>
          <input type="submit" value="Changer votre pseudo" />
        </form>
      </p>
      <?php
      if (isset($_POST['pseudo']))
      {
        $pseudo = addslashes(htmlspecialchars(htmlentities(trim($_POST['pseudo']))));;
        $stmt = $db->prepare("UPDATE membre_gbaf SET pseudo='$pseudo' WHERE id='$id'");
        $stmt->execute(array("UPDATE membre_gbaf SET pseudo='$pseudo' WHERE id='$id'"));
        echo $stmt->rowCount() . " records UPDATED successfully";
      } ?><br/>
      <h3>Changer de mot de passe</h3>
      <p>
        <form action="#" method="POST">
          <label for="pass"/> <br/>
          <input minlength="8" type="password" name="pass" id="pass" /><br/><br/>
          <input type="submit" id="pass" value="Changer votre mot de passe" /> </form>
          <?php
      if (isset($_POST['pass']))
      {
        $pass = addslashes(htmlspecialchars(htmlentities(trim($_POST['pass']))));
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $db->prepare("UPDATE membre_gbaf SET pass='$pass_hash' WHERE id='$id'");
        $stmt->execute(array("UPDATE membre_gbaf SET pass='$pass_hash' WHERE id='$id'"));
      } ?>
    </p><br/>
    <h3>Changer de nom</h3>
    <p>
      <form action="" method="POST" >
        <label for="nom"></label><br/>
        <input type="text" name="nom" id="nom" /><br/><br/>
        <input type="submit" value="Changer votre nom" />
      </form><br/>
  <?php
      if (isset($_POST['nom']))
      {
        $nom = addslashes(htmlspecialchars(htmlentities(trim($_POST['nom']))));
        $stmt = $db->prepare("UPDATE membre_gbaf SET nom='$nom' WHERE id='$id'");
        $stmt->execute(array("UPDATE membre_gbaf SET nom='$nom' WHERE id='$id'"));
      } ?>
    </p>
    <h3>Changer de prenom</h3>
    <p>
      <form action="" method="POST">
        <label for="prenom"></label><br/>
        <input type="text" name="prenom" id="prenom" /><br/><br/>
        <input type="submit" value="Changer votre prenom" /><br/>
      </form><br/>
  <?php
      if (isset($_POST['prenom']))
       {
        $prenom = addslashes(htmlspecialchars(htmlentities(trim($_POST['prenom']))));;
        $stmt = $db->prepare("UPDATE membre_gbaf SET prenom='$prenom' WHERE id='$id'");
        $stmt->execute(array("UPDATE membre_gbaf SET prenom='$prenom' WHERE id='$id'"));
      } ?>
    </p>
    <h3>Changer de question et de reponse</h3>
    <p>
      <form action="" method="POST">
        <label for="question"></><br/>
          <select id="question" name="question"><br/>
            <option value="Votre premiere voiture ?">Votre premiere voiture ?</option>
            <option value="Le nom de jeune fille de votre mère ?">Le nom de jeune fille de votre mère ?</option>
            <option value="Le nom de votre premier animal de compagnie ?">Le nom de votre premier animal de compagnie ? </option>
            <option value="Dans quelle ville êtes vous née ?">Dans quelle ville êtes vous née ?</option>
        <label for="pass_question">Taper votre nouvelle reponse a la question :</label><br/>
        <input type="password" name="pass_question" id="pass_question" /><br/><br/>
        <input type="submit" value="Changer question & reponse" /><br/>
      </form><br/>
      <?php
      if (isset($_POST['question']) && isset($_POST['pass_question']))
       {
        $question = $_POST['question'];
        $pass = addslashes(htmlspecialchars(htmlentities(trim($_POST['pass_question']))));
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $db->prepare("UPDATE membre_gbaf SET question='$question', pass_question='$pass_hash'  WHERE id='$id'");
        $stmt->execute(array("UPDATE membre_gbaf SET question='$question', pass_question='$pass_hash'  WHERE id='$id'"));
      } ?>
    </p>
    <?php    include("footer.php"); ?>
    </div>
  </body>
</html>
