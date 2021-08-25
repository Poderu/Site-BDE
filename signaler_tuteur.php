<!DOCTYPE>
<html>
    <body>
        <?php session_start(); ?>
        <?php require 'admin\database.php';
        $db = Database::connect();?>
        <?php
        include("index.php");
        ?>

        <div class="container admin">
            <div class="row">

                <h1><strong>Signaler un évenement, une photo ou un commentaire : </strong></h1>
                <br>
                <br>
                <br>
                <form method="post" action="">
                    <div class="form-group">
                        <br>
                        <p>
                            <?php echo "<h4>Demande de <strong>". $_SESSION['prenom'] ." " . $_SESSION['nom']."</strong></h4>"  ?> </p>



                        <br>
                    </div>




                    <form method="post" action="script_signaler_tuteur.php">
                        <div class="form-group">
                            <label for="text">Lien du problème :</label>
                            <input type="text" class="form-control" id="mail" name="lien" placeholder="Veuillez copier l'URL où le problème est présent" value="">
                            <br/>
                            <br>
                            <label for="prenom">Expliquez-nous le problème :</label>
                            <textarea type="text" class="form-control" id="prenom" name="message" placeholder="Essayez de faire au plus court, 200 caractères minimum" value="" cols="20" rows="20"></textarea>
                            <span class="help-inline"></span>
                        </div>
                        <button type="submit" class="btn btn-warning" name="form"><span class="glyphicon glyphicon-envelope" ></span> Signaler</button>
                    </form>
                </form>
            </div>
        </div>
    </body>

    <?php

    if(isset($_POST['form']))
    {

        $message = $_POST['message'];
        $lien = $_POST['lien'];
        $id_user = $_SESSION['id'];



        if(!empty($_POST['message']) AND !empty($_POST['lien']) )
        {


            $messagelength = strlen($message);
            if($messagelength <= 201)
            {

                $insertmbr = $db->prepare("INSERT INTO signalerevenement(commentairesignevent, id, lien_evenement) VALUES(?, ?, ?)");
                $insertmbr->execute(array("$message", "$id_user", "$lien"));
            }
            else 
            {
                echo "<script> alert('Votre message est trop long, veuillez écrire 200 caractères max')</script>";
            }
        }
        else
        {
            echo "<script> alert('Veuillez tout remplir')</script>";
        }
        Database::Disconnect();
    }
    ?>
</html>
