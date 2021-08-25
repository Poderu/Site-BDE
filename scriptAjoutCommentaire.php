<?php
//session_start();
	require 'admin\database.php';
	
	$contenu_commentaire = $_POST['commentaire'];
	$id_utilisateur = $_POST['id_utilisateur'];
	$id_evenement = $_POST['id_evenement'];
	echo $contenu_commentaire . "<br>";
	echo $id_evenement. "<br>";
	echo $id_utilisateur. "<br>";
	
	$db = Database::connect();	

	$ajoutEvenement = $db->prepare('INSERT INTO commenter (contenu_commentaire, id_utilisateur,  id_evenement) VALUES (?,?,?)');
				
	$ajoutEvenement->execute(array($contenu_commentaire, $id_utilisateur, $id_evenement));

	echo "<script type='text/javascript'>document.location.replace('javascript:history.back()');</script>";

?>
