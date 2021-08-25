<?php
session_start(); 
require 'admin\database.php';
$db = Database::connect();
    
    if(isset($_POST['form']))
    
    {
    $mailconnect = htmlspecialchars($_POST['mail']);
    $mdpconnect = sha1($_POST['mdp']);
        
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $db->prepare("SELECT * FROM utilisateur WHERE mail = ? AND hash = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['role'] = $userinfo['role'];
             echo "<script> alert('Vous êtes bien connecté')</script>";
            echo "<script type='text/javascript'>document.location.replace('accueil.php');</script>";
            

        
        }
        else
        {
              echo "<script> alert('Mauvais mail ou mauvais mot de passe')</script>";
                                 echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";   
                     
        }
    }
    else
    {
                        echo "<script> alert('Il faut remplir tous les champs!')</script>";
                                 echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>"; 
    }
      
Database::disconnect();
    }

    ?>