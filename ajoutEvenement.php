<!DOCTYPE html>
<html>

    <body>
        <?php include("index.php"); ?>

        <form method="POST" action="scriptAjoutEvenement.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="denomination" name="denomination" placeholder="Nom" value="<?php if(isset($denomination)) { echo $denomination;}?>">
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea rows="6" type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php if(isset($description)) { echo $description;}?>"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="AAAA-MM-JJ" value="<?php if(isset($date)) { echo $date;}?>">
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?php if(isset($prix)) { echo $prix;}?>">
            </div>
            <div class="form-group">
                <label for="titre">Titre de la photo :</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="titre" value="<?php if(isset($titre)) { echo $titre;}?>">
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <label for="photo">Sélectionner une nouvelle photo:</label>
                <input type="file" id="photo" name="photo" value="<?php if(isset($photo)) { echo $photo;}?>">
                <span class="help-inline"></span>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Submit" />
                <a class="btn btn-primary" href="boite_a_idee.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>

        </form>


    </body>

</html>
