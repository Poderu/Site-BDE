<?php
			
	require 'admin\database.php';
	
	$id_evenement = $_POST['id_evenement'];
	$id_utilisateur = $_POST['id_utilisateur'];
	echo $id_evenement. "<br>";
	echo $id_utilisateur. "<br>";
	
	$db = Database::connect();	

	$ajoutEvenement = $db->prepare('INSERT INTO inscrire (id, id_evenement) VALUES (?,?)');
				
	$ajoutEvenement->execute(array($id_utilisateur, $id_evenement));

	echo "<script type='text/javascript'>document.location.replace('evenement.php');</script>";

?>
