<?php

class mainInfo extends db{
    public function getInfo(){
        $sql = "SELECT * FROM appearance";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetch();
        return $row;
    }
}
