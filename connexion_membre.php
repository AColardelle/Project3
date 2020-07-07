<?php
include("connexion_db.php");

$pseudo = $_POST['pseudo'];
//  Récupération de l'utilisateur et de son pass hashé
$req = $db->prepare('SELECT id, pass, nom, prenom FROM membre_gbaf WHERE pseudo = ?');
$req->execute(array($pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    header('Location: index.php?pass=1');
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['prenom']=$resultat['prenom'];
        $_SESSION['nom']=$resultat['nom'];
         ob_start();
        header('Location: https://gbafoc.000webhostapp.com/page_principale.php');
        ob_end_clean();
        exit();


    }
    else {
        ob_start();
        header('Location: https://gbafoc.000webhostapp.com/index.php?pass=1');
        exit();
        ob_end_clean();
    }
}
