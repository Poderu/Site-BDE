<?php
include("admin\carrousel.php");
?>
<!DOCTYPE>
<html>
    <body>
        <?php
        include("index.php");
        ?>
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">    
                <?php echo make_slide_indicators($db);?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php echo make_slides($db);?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="text-center">
            <div class="info text-center">
                <h2>Information</h2><br>
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/chocolatine.jpg" class="img-responsive" style="width:400px;height:150px;" alt="Image">
                        <h3>vente de chocolatine</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="well">
                            <p>La vente a lieu tout les matin de 9H à 10H</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <?php
        include("footer.html");
        ?>


    </body>
</html>
