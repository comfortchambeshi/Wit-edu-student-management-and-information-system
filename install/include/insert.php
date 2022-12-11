<?php
if(isset($_POST['proceed'])){
    include '../../classes/db.php';
    include '../../classes/insert_user.php';
    $FullName = $_POST['full_name'];
    $password = $_POST['password'];
    //hashing the password

	$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    
    $insert = new insertUser();
    $insertAdmin = $insert->insertAdmin($username, $hashedpwd, $email, $FullName, $gender);
    header("LOCATION: ../setup.php");
}
?>