<?php

spl_autoload_register('autoloader');

function autoloader($MyClass){
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'inc') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'panel') !== false) {
	$path = "../classes/";
}

elseif (strpos($url, 'crons') !== false) {
	$path = "../classes/";
}
    else{

	$path = "classes/";
    }



$ext = ".php";
$fullPath = $path . $MyClass . $ext;
if (!file_exists($fullPath)) {
	echo "Error";
}

require_once $fullPath;


}


?>