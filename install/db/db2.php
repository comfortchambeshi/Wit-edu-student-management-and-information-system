<?php
    
 
    
    
    $host = "localhost";
$user = "mamoce_try";
$password = "Hs87834673?;";
$dbname = "mamoce_try";


$conn = mysqli_connect($host, $user, $password, $dbname);

if($conn){
    
    //echo "success";
}
else{
    
    die("database Not found! bb");
}
    
   
