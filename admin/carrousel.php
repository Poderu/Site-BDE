<?php
require 'database.php';
$db = Database::connect();
function make_query($db)
{

    $reponse = $db->prepare("SELECT * FROM poster 
INNER JOIN photo ON poster.id=photo.id
INNER JOIN evenement ON poster.id_evenement=evenement.id
WHERE MONTH(date) = MONTH(NOW()) OR MONTH(date) = MONTH(NOW()) +1 AND validation = 1;");
    $reponse -> execute();
    return $reponse;
}

function make_slide_indicators($db)
{
    $output = '';
    $count = 0;
    $reponse = make_query($db);


    while($row = $reponse->fetch(PDO::FETCH_ASSOC))
    {
        if($count == 0)
        {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
        }
        else
        {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
        }
        $count = $count + 1;
    }
    return $output;
}
function make_slides($db)
{
    $output = '';
    $count = 0;
    $reponse = make_query($db);
    while($row = $reponse->fetch(PDO::FETCH_ASSOC))
    {
        if($count == 0)
        {
            $output .= '<div class="item active">';
        }
        else
        {
            $output .= '<div class="item">';
        }
        $output .= '
   <img  src="'.$row["photo"].'" alt="'.$row["titre"].'" style="width: 100%;height: 70%;margin: auto;min-height:200px;"/>
   <div class="carousel-caption">
    <h3>'.$row["denomination"].'</h3>
   </div>
  </div>
  ';
        $count = $count + 1;
    }
    return $output;
}
Database::disconnect();
?>
