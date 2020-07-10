<?php
  session_start();
  if (!empty($_SESSION['id']))
  {
  header('location:page_test_principale.php');
  }
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image" href="img/logo_gbaf.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
  </head>
  <?php include("header.php") ?>
    <body>
      <h1>Bienvenue sur le site du Groupement Banque Assurance Français​ </h1>
      <?php
      include("connexion_db.php");
// insertion du nouveau utilisateur en se proteger des failles xss
      $message = '';
      if (isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['pass_verification']) && isset($_POST['question']) && isset($_POST['pass_question']) && isset($_POST['pass_question_verification']))
      {
      // Sécurité
        $pseudo = addslashes(htmlspecialchars(htmlentities(trim($_POST['pseudo']))));
        $nom = addslashes(htmlspecialchars(htmlentities(trim($_POST['nom']))));
        $prenom = addslashes(htmlspecialchars(htmlentities(trim($_POST['prenom']))));
        $pass = addslashes(htmlspecialchars(htmlentities(trim($_POST['pass']))));
        $pass_verification = addslashes(htmlspecialchars(htmlentities(trim($_POST['pass_verification']))));
        $question = addslashes(htmlspecialchars(htmlentities(trim($_POST['question']))));
        $pass_question = addslashes(htmlspecialchars(htmlentities(trim($_POST['pass_question']))));
        $pass_question_verification = addslashes(htmlspecialchars(htmlentities(trim($_POST['pass_question_verification']))));


        if ($pass == $pass_verification and $pass_question == $pass_question_verification)
        { // on vérifie que les deux mots de passe soient identique.
          $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
          $pass_question_hash = password_hash($pass_question, PASSWORD_DEFAULT);
          $req = $db->query("SELECT pseudo FROM membre_gbaf WHERE pseudo = '$pseudo'");
          $count = $req->rowCount(); // on rowCount() la requete, donc rowcount retournera une valeur si il trouve.
          if ($count == 0) { // si il ne trouve pas une valeur, alors c'est bon
            $req = $db->prepare("INSERT INTO membre_gbaf(nom, prenom, pseudo, pass, question, pass_question) VALUES(:nom, :prenom, :pseudo, :pass, :question, :pass_question)");
            $req->execute(array('nom' => $nom,'prenom' => $prenom,'pseudo' => $pseudo,'pass' => $pass_hash,'question' => $question, 'pass_question' => $pass_question_hash));
            header('location: index.php?creation=1');
                 }
          else {
            $message =  'Cet identifiant est déjà utilisé.';
                }
      }
      else
      {
          $message = 'Vos mots de passe ne sont pas identique.';
      }
      }
      ?>
  <?= $message; ?>
    <form action="nouveau_membre.php" method="POST">
      <p>
        <label for="nom"> Nom :</label><br>
        <input  type="text" name="nom" id="nom" value required/></br>
        <label for="prenom">Prénom :</label><br>
        <input type="text" name="prenom" id="prenom" value required/></br>
        <label for="pseudo">Pseudo :</label><br>
        <input minlength="5" type="text" name="pseudo" id="pseudo" value required/></br>
        <label for="pass">Mot de passe :</label><br>
        <input  minlength="8" type="password" name="pass" id="pass" value required/></br>
        <label for="pass_verification">Retaper votre Mot de passe :</label><br>
        <input minlength="8" type="password" name="pass_verification" id="pass_verification" value required/></br>
        <label for="question">Question secrète :</label><br>
        <select id="question" name="question"></br>
          <option value="Votre premiere voiture ?">Votre premiere voiture ?</option>
          <option value="Le nom de jeune fille de votre mère ?">Le nom de jeune fille de votre mère ?</option>
          <option value="Le nom de votre premier animal de compagnie ?">Le nom de votre premier animal de compagnie ? </option>
          <option value="Dans quelle ville êtes vous née ?">Dans quelle ville êtes vous née ?</option>
          <label for="pass_question">Réponse à la question secrète. :</label><br>
          <input type="password" name="pass_question" id="pass_question" value required/></br>
          <label for="pass_question_verification">Retaper votre reponse :</label><br>
          <input type="password" name="pass_question_verification" id="pass_question_verification" value required /></br>
          <input type="submit" value="Inscription" />
      </p>
<?php    include("footer.php"); ?>
  </body>
</html>
