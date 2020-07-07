<?php /*on compt le nombre de like ou dislike par article*/
include('connexion_db.php');
$likes = $db -> prepare('SELECT vote  FROM vote WHERE id_acteur = ? AND vote = ?');
$likes -> execute(array($id, '1'));
$likes = $likes -> rowCount();

$dislike = $db -> prepare('SELECT vote FROM vote WHERE id_acteur = ? AND vote =?');
$dislike -> execute(array($id, '-1'));
$dislike = $dislike -> rowCount();

 ?>
