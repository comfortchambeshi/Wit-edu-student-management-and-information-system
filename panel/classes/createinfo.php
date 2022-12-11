<?php

public class insertData extends db{
	public static function getSiteinfo(){
	$sql = "SELECT * FROM site_ifno";
	$stmt = $this->connect()->prepare($sql);
	$row = $this->fetchall();


}





}

