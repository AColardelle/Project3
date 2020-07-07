<?php
include("connexion_db.php");

$pass = addslashes(htmlspecialchars(htmlentities(trim($_POST['changement_pass']))));
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
$pseudo = $_POST['pseudo'];
$sql = "UPDATE membre_gbaf
SET pass='$pass_hash'
 WHERE pseudo='$pseudo'";

$stmt = $db->prepare($sql);
$stmt->execute(array("UPDATE membre_gbaf
SET pass='$pass_hash'
 WHERE pseudo='$pseudo'"));


header("location:index.php?change_pass=1");
echo $stmt->rowCount() . " records UPDATED successfully";



?>
