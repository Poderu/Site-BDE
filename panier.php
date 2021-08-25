<!DOCTYPE>
<html>
    <body>
        <?php
        include("index.php");
        ?>
        <br>
        <div class="panier">
            <h2 class="first">Panier</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><span class="name">Produit</span></th>
                        <th><span class="price">Prix</span></th>
                        <th><span class="quantity">Quantité</span></th>
                        <th><span class="subtotal">Prix avec TVA</span></th>
                        <th><span class="action">Actions</span></th>
                    </tr>
                </thead>
                <?php
                $ids = array_keys($_SESSION['panier']);
                if(empty($ids)){
                    $products = array();
                }else{
                    $products = $DB->query('SELECT * FROM produit WHERE id IN ('.implode(',',$ids).')');
                }
                foreach($products as $product):
                ?>
                <tbody>
                    <tr>
                        <td><img src="images/<?= $product->id; ?>.jpg" height="53"><?= $product->nom; ?></td>
                        <td><?= number_format($product->prix,2,',',' '); ?> €</td>
                       <td><label name="panier[quantity][<?= $product->id; ?>]" value="<?= $_SESSION['panier'][$product->id]; ?>">1</label></td>

                        <td><?= number_format($product->prix * 1.196,2,',',' '); ?> €</td>

                        <td><a href="panier.php?delPanier=<?= $product->id; ?>" class="del"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span>supprimer</button></a></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th class="">Grand Total : <?= number_format($panier->total() * 1.196,2,',',' '); ?> €</th>
                    </tr>
                </thead>
            </table>

            <?php require 'footer.html'; ?>
        </div>
    </body>
</html>