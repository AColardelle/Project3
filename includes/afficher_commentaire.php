<?php /* On recupere les commentaires dans la base de donnes pour les affiches */
  $req = $db->prepare('SELECT id_user, post, DATE_FORMAT(date_add, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM post WHERE id_acteur = ? ORDER BY date_add DESC');
  $req->execute(array($_GET['id_acteur']));
  $test = $db -> prepare('SELECT pseudo FROM membre_gbaf where id = ?');
  $test-> execute(array($_GET['id_acteur']));

  while ($donnees = $req->fetch()) {
    $test = $db -> prepare('SELECT pseudo FROM membre_gbaf where id = ?');
    $test-> execute(array($donnees['id_user']));
    $info_user = $test->fetch(); ?>

    <div class="comment">
      <p> <strong><?php echo htmlspecialchars($info_user['pseudo']); ?></strong><br/> le <?php echo $donnees['date_commentaire_fr']; ?></p><br/>
      <p><?php echo nl2br(htmlspecialchars($donnees['post'])); ?></p>
    </div>
<?php}?>
