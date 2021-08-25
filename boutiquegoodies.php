<?php
require'admin\boutique.php';
?>
<!DOCTYPE>
<html>
    <body>
        <?php
        include("index.php");
        ?>
        <form class=" nav navbar-nav navbar-form navbar-right" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="recherche..." name="barre">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <br><br><br><br>
        <div class="home col-sm-12">
            <div class="row">
                <div class="wrap">

                    <?php if(isset($_GET['barre']) AND !empty($_GET['barre'])) {
    $q = htmlspecialchars($_GET['barre']);
    $products = $DB->query('SELECT * FROM produit WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');
    $products = $DB->query('SELECT * FROM produit WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');

}else{$products = $DB->query('SELECT * FROM produit WHERE categorie="goodies"'); }?>
                    <?php foreach ( $products as $product ): ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="box">
                            <div class="product full">
                                <a href="#">
                                    <img src="images/<?= $product->id; ?>.jpg" height="261"  wight="255">
                                </a>
                                <div class="description">
                                    <?= $product->nom; ?>
                                    <a href="#" class="price"><?= number_format($product->prix,2,',',' '); ?> €</a>
                                </div>
                                   <?php 
                                if(isset($_SESSION['id']))
                                { ?>
                                <a class="add addPanier" href="admin/addpanier.php?id=<?= $product->id; ?>">
                                    add
                                
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
        include("footer.html");
        ?>
    </body>
</html>