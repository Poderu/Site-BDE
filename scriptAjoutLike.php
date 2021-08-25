<?php
include 'admin\database.php';
$db = Database::connect();

if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    
    $sessionid = 4;//$_SESSION['id'];
    
    if($gett == 1) {
        $check_like = $bdd->prepare('SELECT id FROM liker WHERE id_evenement = ? AND id_membre = ?');
        $check_like->execute(array($getid, $sessionid));
        
        if($check_like->rowCount() == 1) {
            
            $del = $bdd->prepare('DELETE FROM liker WHERE id_evenement = ? AND id_membre = ?');
            $del->execute(array($getid, $sessionid));
            
        }else {
        
            $ins = $bdd->prepare('INSERT INTO liker (id_evenement, id_membre) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
        }
    }
    header('Location: http://localhost/PHP_MySQL/PHP_MySQL/boutonlike.php?id='.$getid);
}