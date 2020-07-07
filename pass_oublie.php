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
  <title></title>
</head>
<header>
  <?php  include("header.php") ?>
</header>

<body>


  <?php
  include("connexion_db.php");



  if (isset($_POST['pseudo'])) {
      if (isset($_POST['pass_question'])) {

          {



       //  Récupération de l'utilisateur et de son pass hashé
       $req = $db->prepare('SELECT pseudo, pass_question FROM membre_gbaf WHERE pseudo = :pseudo');
       $req->execute(array(
           'pseudo' => $_POST['pseudo']));
       $resultat = $req->fetch();

       // Comparaison du pass envoyé via le formulaire avec la base
       $isPasswordCorrect = password_verify($_POST['pass_question'], $resultat['pass_question']);

       if (!$resultat) {
           echo 'Mauvais identifiant ou mot de passe !';

       } else {
           if ($isPasswordCorrect) {
               echo 'Bon reponse'; ?>
  <p>
  <form action="update_pass.php" method="POST">
    <label for="changement_pass">Taper votre nouveau mot de passe :</label><br>
    <input type="password" name="changement_pass" id="changement_pass" /></br>
    <input type="hidden" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?>">
    <input type="submit" value="Changer votre mot de passe" />
    </p>
    <?php
           } else {
               echo 'Mauvais identifiant ou mot de passe !';
               ?> <form id="message" action="" method="POST">
               <label for="pseudo">Quel est votre pseudo ? </label><br />
               <input type="pseudo" name="pseudo" id="pseudo" value="">
               <input type="submit" value="envoyer pseudo" class="bouton" />
             </form> <?php
           }
       }}
      } else {
          //  on verifie le pseudo
          //  on cehrche la question et on la donne
          $pseudo = addslashes(htmlspecialchars(htmlentities(trim($_POST['pseudo']))));
          $req = $db->query("SELECT pseudo FROM membre_gbaf WHERE pseudo = '$pseudo'");
          $count = $req->rowCount(); // on rowCount() la requete, donc rowcount retournera une valeur si il trouve.
          if ($count == 1) {
              $question = $db->query("SELECT question FROM membre_gbaf WHERE pseudo = '$pseudo'");
              $test = $question -> fetch(PDO::FETCH_ASSOC);
              echo "la question est :'" . $test['question'] . "'"; ?><form id="message" action="" method="POST">
      <label for="pass_question"></label><br />
      <input type="pass_question" name="pass_question" id="pass_question" value="">
      <input type="hidden" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?>">
      <input type="submit" value="envoyer la reponse " class="bouton" /></form><?php
          }
      }
  }
  else {

      ?>

    <form id="message" action="" method="POST">
      <label for="pseudo">Quel est votre pseudo ? </label><br />
      <input type="pseudo" name="pseudo" id="pseudo" value="">
      <input type="submit" value="envoyer pseudo" class="bouton" />
    </form> <?php
  }

   ?>

   <footer><?php    include("footer.php"); ?></footer>
</body>

</html>
