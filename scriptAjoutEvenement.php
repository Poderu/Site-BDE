<?php
session_start();

include 'admin\database.php';
$db = Database::connect();

$denomination = $_POST['denomination'];
$description = $_POST['description'];
$date = $_POST['date'];
$prix = $_POST['prix'];
$utilisateur = $_SESSION['id'];
$photo = $_POST['photo'];
$titre = $_POST['titre'];

$requete = $db->prepare("
SET AUTOCOMMIT = 0;
START TRANSACTION;
INSERT INTO evenement (denomination, description, date, prix, id_utilisateur) VALUES (?, ?, ?, ?, ?);
INSERT INTO photo (photo, titre) VALUES (?, ?);
INSERT INTO poster (poster.id , id_evenement) VALUES ((SELECT MAX(id) AS max_photo FROM photo), (SELECT MAX(id) AS max_id FROM evenement));
COMMIT;");


if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{

 	if ($_FILES['photo']['size'] <= 8000000)
    {

 		$infosfichier = pathinfo($_FILES['photo']['name']);
	 	$extension_upload = $infosfichier['extension'];

	 	$extensions_autorisees = array('jpg', 'jpeg', 'png', 'PNG');
	 
			if (in_array($extension_upload, $extensions_autorisees))
            {
                  
				$filtrage = $db->query("SELECT id FROM evenement ORDER BY id DESC LIMIT 1");
				$donnees = $filtrage->fetch();
				
                 	if ($donnees == NULL)
                  	{
                     	$donnees['id'] = 1;
						
                 	}

                  	else
                  	{
						$donnees['id'] ++;
						
					}
					  echo "<br>Nouveau id : " . $donnees['id'] . "<br>";
				
				
				$nouveauTitre = "images/" . $donnees['id'] . "." . $infosfichier['extension'];
				
				echo  "<br>";
				move_uploaded_file($_FILES['photo']['tmp_name'], './images/' . $donnees['id'] . "." . $infosfichier['extension']);
				echo "L'envoi a bien été effectué !";
				echo "<br>"."--".$nouveauTitre."--";					
            }
        }
}
$image = $nouveauTitre;

$requete->execute(array($denomination, $description, $date, $prix, $utilisateur, $image, $titre));

$db = Database::disconnect();
?>
