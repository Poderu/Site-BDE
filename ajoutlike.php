<?php
session_start();
require 'admin\database.php';

$db = Database::connect();

if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    
    $sessionid = $_SESSION['id'] ;
    
    if($gett == 1) {
        $check_like = $db->prepare('SELECT id FROM liker WHERE id_evenement = ? AND id_membre = ?');
        $check_like->execute(array($getid, $sessionid));
        
        if($check_like->rowCount() == 1) {
            
            $del = $db->prepare('DELETE FROM liker WHERE id_evenement = ? AND id_membre = ?');
            $del->execute(array($getid, $sessionid));
            
        }else {
        
            $ins = $db->prepare('INSERT INTO liker (id_evenement, id_membre) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
        }
    }
    echo "<script type='text/javascript'>document.location.replace('javascript:history.back()');</script>";
}