<?php
require 'admin\database.php';
$db = Database::connect();
if(isset($_POST['forminscription']))
{
    
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        
        
        $nomlength = strlen($nom);
        $prenomlength = strlen($prenom);
        if($nomlength <= 50)
        {
          if($prenomlength <=50)
          {
             if($mail == $mail2) 
             {
                 if(filter_var($mail, FILTER_VALIDATE_EMAIL)) 
                 {
                     $reqmail = $db->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                     $reqmail->execute(array($mail));
                     $mailexist = $reqmail->rowCount();
                     if($mailexist == 0)
                     {
                         
                     
                         if ($mdp == $mdp2)
                         {
                             $insertmbr = $db->prepare("INSERT INTO utilisateur(nom, prenom, mail, hash) VALUES( ?, ?, ?, ?)");
                             $insertmbr->execute(array("$nom", "$prenom", "$mail", "$mdp"));
                            echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";                       
                         }
                         else
                         {
                             echo "<script> alert('le mot de passe de confirmation ne correspond pas')</script>";
                                     echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
                         }
                     }  
                     else
                     {
                                                      echo "<script> alert('Ce mail existe déjà')</script>";
                                 echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
                     }
             }
              else
              {
                                               echo "<script> alert('le mail de confirmation ne correspond pas')</script>";
                          echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
              }
             }
              else
              {
                                               echo "<script> alert('Votre adresse mail n'est pas valide)</script>";
                          echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
              }
          }
            else
            {
                                             echo "<script> alert('Votre prenom ne doit pas dépasser 50 charactères')</script>";
                        echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
            }
        }
        else
        {
            echo "<script> alert('Votre nom ne doit pas dépasser 50 charactères')</script>";
                    echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
        }
    }
    else
    {
        echo "<script> alert('Tous les champs doivent être complété')</script>";
        echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";   
    }
Database::disconnect();
}
    
?>
