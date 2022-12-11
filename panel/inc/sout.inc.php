<?php
include '../../inc/auto-loader.php';
include('./dbconnect.inc.php');
include('./login_function.php');
include('./parent_login_function.php');
include('./mains.php');

if (!$LoginObj->isLoggedIn()) {
        header("Location: ../index.php");
}
if ($LoginObj->isLoggedIn()) {
        $userLogged_id = $LoginObj->isLoggedIn();  
        $deleteFrom = 'login_tokens';
}
if (isset($_POST['confirm'])) {

       

        if (isset($_POST['alldevices'])) {
                
                
                
                

               
                //deleting all device tokens
                $delete = mysqli_query($conn, "DELETE FROM $deleteFrom WHERE user_id='$userLogged_id'");
          
        } else {
                if (isset($_COOKIE['SNID'])) {
                        $loggedTokHashed = sha1($_COOKIE['SNID']);
                        $deleteTokken = mysqli_query($conn, "DELETE FROM $deleteFrom WHERE token='$loggedTokHashed'");
                        
                }
                setcookie('SNID', '1', time()-3600);
                setcookie('SNID_', '1', time()-3600);
        }

}

header("Location: ../../login.php?sout=success");
echo '<h1>Logout of your Account?</h1>
<p>Are you sure you\'d like to logout?</p>
<form action="sout.inc.php" method="post">
        <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
</form>';

?>