<?php
session_start();
include('connexion_db.php');

/*Insertion des likes dans la base de donnes, on verifie si il y a un like ou un dislike pour quq'une personne ne puissent pas avoir un like et un dislike en meme temps*/
if (!empty($_GET['id']) && ($_GET['t'])) {

  $id_utilisateur=$_SESSION['id'];
  $id_article = (int)$_GET['id'];
  $like = $_GET['t'];
  $check = $db -> prepare("SELECT * FROM acteur WHERE id_acteur = ? ");
  $check -> execute(array($id_article));

  if ($check -> rowCount() ==1) {
      if ($like == 1) {
          $checklike = $db -> prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ? AND vote =?');
          $checklike-> execute(array($id_article, $id_utilisateur, '1'));
          $del = $db -> prepare('DELETE  FROM vote WHERE id_acteur = ? AND id_user = ? AND vote =?');
          $del -> execute(array($id_article, $id_utilisateur, '-1'));
          if ($checklike-> rowCount() ==1) {
              $del = $db -> prepare('DELETE  FROM vote WHERE id_acteur = ? AND id_user = ? AND vote =?');
              $del -> execute(array($id_article, $id_utilisateur, '1'));
        } else {
              $ins = $db -> prepare('INSERT INTO vote (id_user,id_acteur, vote) VALUES (?,?,?)');
              $ins -> execute(array($id_utilisateur, $id_article, $like));
               }
        }
          elseif ($like == -1) {
              $checkdislike = $db -> prepare('SELECT * FROM vote WHERE id_acteur = ? AND id_user = ? AND vote =?');
              $checkdislike-> execute(array($id_article, $id_utilisateur, '-1'));
              $del = $db -> prepare('DELETE  FROM vote WHERE id_acteur = ? AND id_user = ? AND vote =?');
              $del -> execute(array($id_article, $id_utilisateur, '1'));
              if ($checkdislike-> rowCount() ==1) {
                $del = $db -> prepare('DELETE  FROM vote WHERE id_acteur = ? AND id_user = ? AND vote =?');
                $del -> execute(array($id_article, $id_utilisateur, '-1'));
            } else {
                $ins = $db -> prepare('INSERT INTO vote (id_user,id_acteur, vote) VALUES (?,?,?)');
                $ins -> execute(array($id_utilisateur, $id_article, $like));
            }

        }
        header('Location: article.php?id_acteur='.$id_article.'#likes');
    } else {
        exit('erreur fatal');
    }
}
