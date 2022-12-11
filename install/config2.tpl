<?php
    
 
    
    
    $host = "<DB_HOST>";
$user = "<DB_USER>";
$password = "<DB_PASSWORD>";
$dbname = "<DB_NAME>";


$conn = mysqli_connect($host, $user, $password, $dbname);

if($conn){
    
    //echo "success";
}
else{
    
    die("database Not found! bb");
}
    
   
