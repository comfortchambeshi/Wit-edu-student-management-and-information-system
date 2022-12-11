<?php
$db1 = 'classes/db.php';
$db2 = 'inc/dbconnect.inc.php';
if (!file_exists($db1) || !file_exists($db2)) {
    header("LOCATION: install/start.php");
}else{
    
    header("LOCATION: login.php");
}


?>

