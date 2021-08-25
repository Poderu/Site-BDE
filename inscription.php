<!DOCTYPE>
<html>
    <body>
        <?php
        include("index.php");
        ?>
        <h1 class="text-logo"> Inscription </h1>
        <div class="admin">
            <div class="row">

                <h1><strong>Inscrivez-vous ou connectez-vous pour proposer des evenements dans la boite à idée</strong></h1>
                <br>
                <br>
                <a href="connexion.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-log-in"></span>  Déjà inscrit? Connecte-toi !</a>
                <br>
                <form method="post" action="script_inscription.php">
                    <div class="form-group">
                        <br>
                        <br>
                        <br>
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php if(isset($nom)) { echo $nom;}?>">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="<?php if(isset($prenom)) { echo $prenom;}?>">
                        <span class="help-inline"></span>
                    </div>
                    <div class="form-group">
                        <label for="mail">Mail:</label>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="exemple@viacesi.fr" value="<?php if(isset($mail)) { echo $mail;}?>">

                    </div>
                    <div class="form-group">
                        <label for="mail">Confirmer le mail:</label>
                        <input type="email" class="form-control" id="mail" name="mail2" placeholder="exemple@viacesi.fr" value="<?php if(isset($mail2)) { echo $mail2;}?>">

                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe:</label>
                        <input type="text" class="form-control" id="hash" name="mdp" placeholder="6 caractères minimum" value="">


                    </div>

                    <div class="form-group">
                        <label for="motdepasse">Confirmation mot de passe:</label>
                        <input type="password" class="form-control" id="hash" name="mdp2" placeholder="6 caractères minimum" value="">


                    </div>

                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="forminscription"><span class="glyphicon glyphicon-pencil" href="index.php"></span> Inscription</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>


                    <?php      if(isset($GLOBALS['erreur']))
{
    echo '<font color="red">'. $GLOBALS['erreur'] ."</font>";
}
                    ?>

                </form>

            </div>
        </div>
    </body>

</html>
