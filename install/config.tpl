<?php
    

    class db{

private $dbname = "<DB_NAME>";
private $dbhost = "<DB_HOST>";
private $dbuser = "<DB_USER>";
private $dbpwd = "<DB_PASSWORD>";

protected function connect(){

$dsn = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname.'';
$pdo = new PDO($dsn, $this->dbuser, $this->dbpwd);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
return $pdo;

}




}
    
    
    
   
