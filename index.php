<?php
require'admin\_header.php';
?>
<!DOCTYPE>
<html>
    <head>
        <title>BDE exia.CESI Pau</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css\style">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="row" id="site">
                <div class="col-md-4">
                    <a href="Accueil.php"><img id="LogoBDExia" src="images/LogoBDExia.png"></a>
                </div>
                <div class="col-md-4">
                    <h1 class="text-logo">BDE exia.CESI Pau </h1>
                </div>
                <div class="social col-md-4">
                    <a href="https://discord.gg/P5CFF"><img class="right-top" id="discord" src="images/Discord.png"></a>
                    <a href="https://www.facebook.com/bdexiapau/"><img class="right-top" id="facebook" src="images/facebook.png"></a>
                </div>
            </div>
            <?php 
            // session_start();
            if(isset($_SESSION['id']))
            {
                echo  '<p class="guest">  Hey ' . $_SESSION['prenom'] . ' ! </p>';
            }
            else
            {
                echo '<p class="guest"> Salut visiteur</p>';
            }
            ?>
            <nav class="navbar navbar-inverse navbar-custom">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <?php 


                        if(empty($_SESSION['id']))
                        {
                        ?>
                        <li><a href="Accueil.php">Accueil</a></li>
                        <li><a href="boite_a_idee.php">Boite à idée</a></li>
                        <li><a href="evenement.php">Evenement</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Boutique
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="boutique.php">Boutique</a></li>
                                <li><a href="boutiqueveste.php">Pulls/Vestes</a></li>
                                <li><a href="boutiqueshirt.php">T-shirts</a></li>
                                <li><a href="boutiquepantalon.php">Pantalons</a></li>
                                <li><a href="boutiquegoodies.php">Goodies</a></li>
                            </ul>
                        </li>
                        <ul class="nav navbar-nav navbar-righ">
                            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
                            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                        </ul>
                        <?php   }
                        else
                        {
                            if($_SESSION['role'] == 0)
                            {
                        ?>

                        <li class=""><a href="Accueil.php">Accueil</a></li>
                        <li><a href="boite_a_idee.php">Boite à idée</a></li>
                        <li><a href="evenement.php">Evenement</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Boutique
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="panier.php">Panier</a></li>
                                <li><a href="boutique.php">Boutique</a></li>
                                <li><a href="boutiqueveste.php">Pulls/Vestes</a></li>
                                <li><a href="boutiqueshirt.php">T-shirts</a></li>
                                <li><a href="boutiquepantalon.php">Pantalons</a></li>
                                <li><a href="boutiquegoodies.php">Goodies</a></li>
                            </ul>
                        </li>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>

                        <?php    }
                            elseif($_SESSION['role'] == 1)
                            {
                        ?>
                        <li class=""><a href="Accueil.php">Accueil</a></li>
                        <li><a href="boite_a_idee.php">Boite à idée</a></li>
                        <li><a href="evenement.php">Evenement</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Boutique
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <li><a href="panier.php">Panier</a></li>
                                <li><a href="boutique.php">Boutique</a></li>
                                <li><a href="boutiqueveste.php">Pulls/Vestes</a></li>
                                <li><a href="boutiqueshirt.php">T-shirts</a></li>
                                <li><a href="boutiquepantalon.php">Pantalons</a></li>
                                <li><a href="boutiquegoodies.php">Goodies</a></li>
                            </ul>
                        </li>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>
                        <li><a href="signalement_admin.php">Singnalements</a></li>

                        <?php }

                            elseif($_SESSION['role'] == 2)
                            {
                        ?>
                        <li class=""><a href="Accueil.php">Accueil</a></li>
                        <li><a href="boite_a_idee.php">Boite à idée</a></li>
                        <li><a href="evenement.php">Evenement</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Boutique
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="panier.php">Panier</a></li>
                                <li><a href="boutique.php">Boutique</a></li>
                                <li><a href="boutiqueveste.php">Pulls/Vestes</a></li>
                                <li><a href="boutiqueshirt.php">T-shirts</a></li>
                                <li><a href="boutiquepantalon.php">Pantalons</a></li>
                                <li><a href="boutiquegoodies.php">Goodies</a></li>
                            </ul>
                        </li>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>
                        <li><a href="signaler_tuteur.php">Signaler un problème</a></li>

                        <?php }
                        }
                        ?>

                    </ul>
                </div>
            </nav>