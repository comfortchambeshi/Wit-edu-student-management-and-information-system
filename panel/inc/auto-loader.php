<?php

spl_autoload_register('autoloader');

function autoloader($MyClass){
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (strpos($url, 'inc') !== false) {
	$path = "../classes/";
}

elseif (strpos($url, 'examiner') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'accountants') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'teacher') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'student') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'settings') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'admin') !== false) {
	$path = "../classes/";
}
elseif (strpos($url, 'librarian') !== false) {
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