<?php

class fetch extends db{
    public function mainFetch($name, $limit){
        $sql = "SELECT * FROM $name LIMIT $limit";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}
	
?>