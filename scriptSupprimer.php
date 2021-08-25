<?php 

include 'admin\database.php';
$db = Database::connect();

$id = $_GET['id'];
echo $id;

$requete = $db->prepare('
SET AUTOCOMMIT = 0;
START TRANSACTION;
DELETE FROM poster WHERE id_evenement =' . $id . ';
DELETE FROM evenement WHERE evenement.id =' . $id . ';
COMMIT;');
	
$requete->execute();

$db = Database::disconnect();

echo "<script type='text/javascript'>document.location.replace('boite_a_idee.php');</script>";
?>