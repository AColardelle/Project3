<?php  /*Connexion a la base de donnee*/

$servername = "";
$username = "";
$password = "";
$database = "";

try
{
  $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
