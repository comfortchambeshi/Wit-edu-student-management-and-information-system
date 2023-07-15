<?php

//--------------------------------------------------------------------------
// *** remote file inclusion, check for strange characters in $_GET keys
// *** all keys with "/", "\", ":" or "%-0-0" are blocked, so it becomes virtually impossible
// *** to inject other pages or websites
foreach($_GET as $get_key => $get_value){
    if(is_string($get_value) && (preg_match("/\//", $get_value) || preg_match("/\[\\\]/", $get_value) || preg_match("/:/", $get_value) || preg_match("/%00/", $get_value))){
        if(isset($_GET[$get_key])) unset($_GET[$get_key]);
        die("A hacking attempt has been detected. For security reasons, we're blocking any code execution.");
    }
}

// *** check token for POST requests
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	$token_post = isset($_POST['token']) ? $_POST['token'] : 'post';
	$token_session = isset($_SESSION['token']) ? $_SESSION['token'] : 'session';
	
	if($token_session != $token_post){
		unset($_POST['task']); 
	}
}
// *** check and set token
$_SESSION['token'] = md5(uniqid(rand(), true));


// *** disabling magic quotes at runtime
function strip_slashes_recursive($value) {
    if (is_array($value)) {
        foreach ($value as $key => $val) {
            $value[$key] = strip_slashes_recursive($val);
        }
    } else {
        $value = str_replace('\\', '', $value);
    }

    return $value;
}

$GET = strip_slashes_recursive($_GET);
$POST = strip_slashes_recursive($_POST);
$COOKIE = strip_slashes_recursive($_COOKIE);
$REQUEST = strip_slashes_recursive($_REQUEST);


