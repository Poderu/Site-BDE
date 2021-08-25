<?php
require 'admin\database.php';
$db = Database::connect();
if(isset($_POST['form']))
{

    $message = $_POST['message'];
    $lien = $_POST['lien'];
    $id_user = $_SESSION['id'];

    echo $message;
    echo $lien;
    echo $id_user;

    if(!empty($_POST['message']) AND !empty($_POST['lien']) )
    {


        $messagelength = strlen($message);
        if($messagelength <= 201)
        {

            $insertmbr = $db->prepare("INSERT INTO signalerevenement(commentairesignevent, id, lien_evenement) VALUES(?, ?, ?)");
            $insertmbr->execute(array("$message", "$id_user", "$lien"));
            echo "<script type='text/javascript'>document.location.replace('signaler_tuteur.php');</script>"; 
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