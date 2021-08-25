<!DOCTYPE>
<html>
    <?php session_start(); ?>
    <?php
    include("index.php");
    ?>
    <body>

        <?php
        require 'admin\database.php';
        $db = Database::connect(); 
        ?>


        <h1><strong>Liste des signalements</strong></h1><br/>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom du tuteur</th>
                    <th>Lien de l'évenement</th>
                    <th>Message</th>
                    <th>Action</th>

                </tr>
            </thead>

            <?php
            //require 'D:\wamp64\www\test_projet\database.php';
            //$db = Database::connect();
            $caracteristique = $db->query('SELECT id_report, nom, prenom, signalerevenement.commentairesignevent, signalerevenement.lien_evenement FROM utilisateur INNER JOIN signalerevenement WHERE utilisateur.id = signalerevenement.id');

            while($evenement = $caracteristique->fetch()) 
            {       
            ?>     
            <form method="post" action="delete_signalement.php" >
                <tr>
                    <td class=""  id=""><?= $evenement['nom']; ?></td>
                    <br>
                    <td class=""  id=""><a href="<?= $evenement['lien_evenement']; ?>"><?= $evenement['lien_evenement']; ?></a></td>
                    <br>
                    <td class=""  id="report"><?= $evenement['commentairesignevent']; ?></td>
                    <input type='hidden' name="id_report" id="id_report" value="<?= $evenement['id_report']; ?>"/>
                    <br>
                    <td><button class="btn btn-danger" type="submit" name="report" value="report" href="signalement_admin.php">Supprimer le signalement</button></td>
                </tr>
            </form>

            <?php
            }	?>


        </table>

    </body>


</html>
