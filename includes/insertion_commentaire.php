<?php /*insertion des commentaires dans la base de donnes*/

  include("connexion_db.php");
  if (isset($_POST['id_user']))
  {
    $req = $db->prepare('INSERT INTO post (id_user, id_acteur, date_add, post) VALUES (?,?, now(), ?)');
    $req -> execute(array($_POST['id_user'], $_POST['id_acteur'], $_POST['post']));
  }
  else {}
?>
