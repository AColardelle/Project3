<?php /*on regarde le nombre de commentaire par rapport a l'article*/
include('connexion_db.php');
$commentaire = $db -> prepare('SELECT *  FROM post WHERE id_acteur = ? ');
$commentaire -> execute(array($id));
$commentaire = $commentaire -> rowCount();


 ?> 
