<?php session_start(); ?>
<!DOCTYPE>
<html>
    <body>
        <?php
        include("index.php");
        ?>
    <h1 class="text-logo"> Connexion </h1>
    <div class="admin">
        <div class="row">
            
                <h1><strong>Inscrivez-vous ou connectez-vous pour proposer des evenements dans la boite à idée</strong></h1>
                <br>
                <br>
                <a href="inscription.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-user"></span> Pas encore de compte? Inscris-toi !</a>
                <br>
              <form method="post" action="script_connexion.php">
                    <div class="form-group">
                        <br>
                        <br>
                        <br>

                        <label for="mail">Mail:</label>
                        <input type="mail" class="form-control" id="mail" name="mail" placeholder="exemple@viacesi.fr" value="">

                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe:</label>
                        <input type="password" class="form-control" id="hash" name="mdp" placeholder="6 caractères minimum" value="">


                    </div>

                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="form"><span class="glyphicon glyphicon-pencil" ></span> Connexion</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </form>

        </div>
    </div>
</body>

</html>