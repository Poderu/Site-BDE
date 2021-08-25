<?php 

include 'admin\database.php';
$db = Database::connect();

$denomination = $_POST['denomination'];
$description = $_POST['description'];
$date = $_POST['date'];
$prix = $_POST['prix'];
$id = $_POST['evenement_id'];
$validation = $_POST['validation'];

$requete = $db->prepare('UPDATE evenement SET validation = :validation, denomination = :denomination, date = :date, description = :description, prix= :prix WHERE id= :id');
	
$requete->execute(array('validation' => $validation, 'denomination' => $denomination, 'date' => $date, 'description' => $description, 'prix' => $prix, 'id' => $id));

$db = Database::disconnect();

echo "<script type='text/javascript'>document.location.replace('boite_a_idee.php');</script>";
?>