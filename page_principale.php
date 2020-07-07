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
    <link rel="stylesheet" href="style.css" />
    <title>Groupement Banque Assurance Français</title>
  </head>
  <body>
  <?php  include("header.php") ?>


<div class="partie_haute_principal">


    <h1>Groupement Banque Assurance Français</h1>

<h2>Le Groupement Banque Assurance Français​ (GBAF) est une fédération  représentant les 6 grands groupes français :</h2>

    <nav>
      <ul>


      <li><a class="active" href="#partenaire">Partenaire</a></li>
      <li><a target="_blank" href="https://mabanque.bnpparibas">BNP Paribas</a></li>
      <li><a target="_blank" href="https://groupebpce.com">BPCE</a></li>
      <li><a target="_blank" href="https://www.credit-agricole.fr">Crédit Agricole</a></li>
      <li><a target="_blank" href="https://www.creditmutuel.fr">Crédit Mutuel-CIC</a></li>
      <li><a target="_blank" href="https://particuliers.societegenerale.fr">Société Générale </a></li>
      <li><a target="_blank" href="https://www.labanquepostale.fr">La Banque Postale</a></li>
        </ul>
    </nav>




    <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
      de la même façon pour gérer près de 80 millions de comptes sur le territoire
      national. <br/>
      Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
      les axes de la réglementation financière française. Sa mission est de promouvoir
      l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
      pouvoirs publics.</p>

<img class="bank" src="img/photo_banque.png" alt=""></div>

<?php //on recupere les acteurs et on les affiches les uns apres les autres.
$reponse = $db->query('SELECT * FROM acteur');?>
<div class="acteur_totaux">
<?php while ($donnees = $reponse->fetch()) {?>
<div class="acteur">


<img class="image" src=<?php echo $donnees['logo']?> alt=""><br/>
<div class="contenu">


<h2> <?php
$string = $donnees['description'];
$token = strtok($string, ".");
echo "".$donnees['acteur'] . ""; ?></h2>

<p class="description_article">   <?php echo '' .$token.'.<br/>';?> </p>
<a class="link" href="article.php?id_acteur=<?php echo $donnees['id_acteur']  ?>">lire la suite</a> <br/>
</div>
</div>
<?php
}?>
</div>



<?php    include("footer.php"); ?>




  </body>
</html>
