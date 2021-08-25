<?php

session_start();
require 'admin\database.php';
$id = $_GET['id'];
$db = Database::connect();

$caracteristique = $db->query('SELECT id, denomination, date, description, prix FROM evenement WHERE id =' . "$id");

$photo = $db->query('SELECT photo.photo, photo.titre FROM poster INNER JOIN photo ON poster.id = photo.id WHERE poster.id_evenement =' . "$id");


$evenement = $caracteristique->fetch();
$photoEvenement = $photo->fetchAll(PDO::FETCH_OBJ);

$liker = $db->prepare('SELECT id FROM liker WHERE id_evenement = ' .$_GET['id']);
$liker->execute();
$liker = $liker->rowCount();
Database::disconnect();
?>
<!DOCTYPE>
<html>
    <body>
        <?php include("index.php"); ?>

        <h2><strong>Voir idée</strong></h2>

        <table>
            <div class="form-actions">
                <a class="btn btn-primary" href="boite_a_idee.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

                              <?php
                if(isset($_SESSION['id']))
                { ?>
                <form method="POST" action='AjouterPhoto.php?id=<?=$_GET[' id ']; ?>'>
      
                    <a class="btn btn-default btn-sm" href="ajoutlike.php?t=1&id=<?=$_GET['id']; ?>"><span class="glyphicon glyphicon-thumbs-up"></span> J'aime</a> (<?= $liker ?>)
                </form>
                <?php } ?>

            </div>

            <div class="form-group">
                <label for="nom"><h3>Nom : </h3><?php echo $evenement['denomination'];?></label>
            </div>
            <div class="form-group">
                <label for="description"><h3>Description : </h3><?php echo $evenement['description'];?></label>
            </div>
            <div class="form-group">
                <label for="date"><h3>Date : </h3><?php echo $evenement['date'];?></label>
            </div>
            <div class="form-group">
                <label for="prix"><h3>Prix : </h3><?php echo $evenement['prix'];?></label>
            </div>
            <div>
                <h3>Photo : </h3>
                <?php foreach($photoEvenement as $infoEvenement): ?>
                <div class="form-group">
                    <label for="titre">Titre : <?= $infoEvenement->titre; ?></label>
                </div>
                <div class="form-group">
                    <label for="photo"><img src='<?= $infoEvenement->photo; ?>' alt="Erreur Image" class=img-responsive style=width:100%/></label>
                </div>
                <?php endforeach ?>
            </div>
        </table>
    </body>

</html>
