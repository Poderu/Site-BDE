<?php

require 'admin\database.php';

session_start();
$db = Database::connect();

$id = $_GET['id'];

if(!empty($id)){
    
    $caracteristique = $db->query('SELECT id, denomination, date, description, prix FROM evenement WHERE id =' . "$id");
    $photo = $db->query('SELECT titre, photo FROM photo INNER JOIN poster, evenement WHERE photo.id = poster.id AND poster.id_evenement =' . "$id" . ' LIMIT 1');

    $evenement = $caracteristique->fetch();
    $photoEvenement = $photo->fetch();
    $photoEvenement['photo'];
}
?>
<!DOCTYPE html>
<html>
    <body>
        <?php include("index.php"); ?>

        <form method="POST" action="scriptModifier.php" enctype="multipart/form-data">

            <input type="hidden" name="evenement_id" value="<?=$_GET['id'] ?>" />
            <div class="form-group">
                <label for="nom"><h3>Nom : </h3></label>
                <input type="text" class="form-control" id="denomination" name="denomination" placeholder="Nom" value="<?= $evenement['denomination']; ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea rows="6" type="text" class="form-control" id="description" name="description" placeholder="Description"><?= $evenement['date']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="text" class="form-control" id="date" name="date" placeholder="AAAA-MM-JJ" value="<?= $evenement['description']; ?>" />
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?= $evenement['prix']; ?>" />
            </div>
            <div class="form-group">
                <label for="prix">Validation pour passage à évenement:<br></label>
                <select name="validation" id="validation">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titre">Titre de la photo :</label>
                <textarea type="text" class="form-control" id="titre" name="titre" placeholder="titre"><?php echo $photoEvenement['titre'];?></textarea>
            </div>
            <div class="form-group">
                <label for="photo"><img src='<?= $photoEvenement['photo']?>' alt="Erreur Image" class=img-responsive style=width:100%/></label>
            </div>
            <div class="form-group">
                <label for="photo">photo:</label>
                <label for="photo">Sélectionner une nouvelle photo:</label>
                <input type="file" id="photo" name="photo" value="<?php if(isset($prix)) { echo $prix;}?>">
                <span class="help-inline"></span>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Modifier" />
                <a class="btn btn-primary" href="boite_a_idee.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>
        </form>     
    </body>
</html>
