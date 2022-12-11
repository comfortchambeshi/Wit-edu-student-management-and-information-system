<?php
include '../inc/auto-loader.php';
include 'teacher_login_function.php';
include 'dbconnect.inc.php';

include 'teacher_mains.php';



if (!$TeacherLoginObj->isLoggedIn()) {
        die("Not logged in.");
}

if (isset($_POST['confirm'])) {

        session_start();
        session_destroy();

        if (isset($_POST['alldevices'])) {
                $userLogged_id = $TeacherLoginObj->isLoggedIn();

               
                //deleting all device tokens
                $delete = mysqli_query($conn, "DELETE FROM teacher_login_tokens WHERE teacher_id='$userLogged_id'");
          
        } else {
                if (isset($_COOKIE['SNID'])) {
                        $loggedTokHashed = sha1($_COOKIE['SNID']);
                        $deleteTokken = mysqli_query($conn, "DELETE FROM teacher_login_tokens WHERE token='$loggedTokHashed'");
                        
                }
                setcookie('SNID', '1', time()-3600);
                setcookie('SNID_', '1', time()-3600);
        }

}

header("Location: ../../login.php?sout=success");

?>
<h1>Logout of your Account?</h1>
<p>Are you sure you'd like to logout?</p>
<form action="sout.inc.php" method="post">
        <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
</form>
