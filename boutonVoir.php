<?php

//session_start();
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

        <h2><strong>Voir evenement</strong></h2>

        <table>
            <div class="form-actions">
                <a class="btn btn-primary" href="evenement.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>

<?php
        if(isset($_SESSION['id']))
        { ?>
                <form method="POST" action="scriptInscriptionEvenement.php">
                    <input type="submit" class="btn btn-success" value="Insciption" />
                    <input type="hidden" name="id_evenement" value="<?=$_GET['id']; ?>" />
                    <input type="hidden" name="id_utilisateur" value="<?php $_SESSION['id'] ?>" />
                </form>

                <form method="POST" action='AjouterPhoto.php?id=<?=$_GET['id']; ?>'>
                    <input type="submit" class="btn btn-success" value="Ajouter Photo" />
                    <input type="hidden" name="id_evenement" value="<?=$_GET['id']; ?>" />
                </form>
                <form method="POST" action='AjouterPhoto.php?id=<?=$_GET['id']; ?>'>
                    
                    <a class="btn btn-default btn-sm" href="ajoutlike.php?t=1&id=<?=$_GET['id']; ?>"><span class="glyphicon glyphicon-thumbs-up"></span> J'aime</a> (<?= $liker ?>)
                </form>
          <?php  } ?>

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
            
            <?php
    if(isset($_SESSION['id']))
    { ?>

            <h2>Commentaire :</h2><br>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Contenu</th>
                    </tr>
                </thead>
<?php } ?>
                <?php

    $db = Database::connect();
                $commentaire = $db->prepare('SELECT commenter.contenu_commentaire, commenter.id, utilisateur.nom, utilisateur.prenom FROM commenter 
	INNER JOIN utilisateur ON utilisateur.id = commenter.id_utilisateur
	WHERE commenter.id_evenement = '  . "$id" );

                while($afficherCommentaire = $commentaire->fetch())
                {
                    echo '<tr>';
                    

                    echo '<td>' . $afficherCommentaire['nom'] . " " .$afficherCommentaire['prenom'] . "<br>" . '</td>';
                    echo '<td>' .  $afficherCommentaire['contenu_commentaire'] . "<br><br>" . '</td>';

                    echo '</tr>';
                }
                $id_utilisateur = $afficherCommentaire['id_utilisateur'];
                echo $afficherCommentaire['id_utilisateur'];
                
               
                ?>
            </table>
            <br><br>
    <?php
            if(isset($_SESSION['id']))
            { ?>
            <form method="POST" action="scriptAjoutCommentaire.php">
                <div class="form-group">
                    <input type="hidden" name="id_evenement" value="<?=$_GET['id']; ?>" />
                    <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id']; ?>" />
                    <label for="commentaire">Commentaire :</label>
                    <textarea type="number" rows="6" class="form-control" id="commentaire" name="commentaire" placeholder="Laissez un commentaire :)"></textarea>
                </div>
                <div class="form-actions">
                    <input type="submit" class="btn btn-success" value="Envoyer" />
             <?php } 
                    
                     Database::disconnect(); ?>
                </div>
            </form>
        </table>
    </body>

</html>
