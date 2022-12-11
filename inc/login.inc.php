<?php
if (isset($_POST['proceed'])) {
    include 'auto-loader.php';

	$uid = $_POST['login_name'];
	$pass =$_POST['pass'];
	
	$login = new login();
	$login_func = $login->Authenticate($uid, $pass);
	
	



	

}

?>


