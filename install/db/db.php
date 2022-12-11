<?php
    

    class db{

private $dbname = "mamoce_try";
private $dbhost = "localhost";
private $dbuser = "mamoce_try";
private $dbpwd = "Hs87834673?;";

protected function connect(){

$dsn = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname.'';
$pdo = new PDO($dsn, $this->dbuser, $this->dbpwd);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
return $pdo;

}




}
    
    
    
   
