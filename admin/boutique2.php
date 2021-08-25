<?php
require 'database.php';
$db = Database::connect();
function boutique($db){
    echo '<div class="row">';
    $reponse = $db->prepare('SELECT * FROM produit');
    $reponse->execute();
    while ($produit = $reponse->fetch()) 
    {
        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $produit['image'] . '" alt="..." style="height: 300px;width: 200px;">
                                    <div class="price">' . number_format($produit['prix'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $produit['nom'] . '</h4>
                                        <p>' . $produit['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
    }

    echo    '</div>
                        </div>';  
}

function goodies($db){ 
    echo '<div class="row">';
    $reponse = $db->prepare('SELECT * FROM produit WHERE categorie = "goodies"');
    $reponse->execute();
    while ($produit = $reponse->fetch()) 
    {
        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $produit['image'] . '" alt="..." style="height: 300px;width: 200px;">
                                    <div class="price">' . number_format($produit['prix'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $produit['nom'] . '</h4>
                                        <p>' . $produit['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
    }

    echo    '</div>
                        </div>';
}

function pantalon($db){
    echo '<div class="row">';
    $reponse = $db->prepare('SELECT * FROM produit WHERE categorie = "pantalon"');
    $reponse->execute();
    while ($produit = $reponse->fetch()) 
    {
        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $produit['image'] . '" alt="..." style="height: 300px;width: 200px;">
                                    <div class="price">' . number_format($produit['prix'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $produit['nom'] . '</h4>
                                        <p>' . $produit['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
    }

    echo    '</div>
                        </div>';
}

function veste($db){
    echo '<div class="row">';
    $reponse = $db->prepare('SELECT * FROM produit WHERE categorie = "veste/pull"');
    $reponse->execute();
    while ($produit = $reponse->fetch()) 
    {
        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $produit['image'] . '" alt="..." style="height: 300px;width: 200px;">
                                    <div class="price">' . number_format($produit['prix'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $produit['nom'] . '</h4>
                                        <p>' . $produit['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
    }

    echo    '</div>
                        </div>';
}

function shirt($db){
    echo '<div class="row">';
    $reponse = $db->prepare('SELECT * FROM produit WHERE categorie = "t-shirt"');
    $reponse->execute();
    while ($produit = $reponse->fetch()) 
    {
        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $produit['image'] . '" alt="..." style="height: 300px;width: 200px;">
                                    <div class="price">' . number_format($produit['prix'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $produit['nom'] . '</h4>
                                        <p>' . $produit['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
    }

    echo    '</div>
                        </div>';
}
Database::disconnect();
?>