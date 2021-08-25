<?php
//header("Location: page_reportview.php");

include('admin\database.php');
$db = Database::connect();
$idReport = $_POST['id_report'];
    $requeteReportDelete = $db->prepare("DELETE FROM signalerevenement WHERE id_report = ?");
    $requeteReportDelete->execute(array($idReport));
echo "<script type='text/javascript'>document.location.replace('signalement_admin.php');</script>"; 

Database::disconnect();

?>