<?php
include 'auto-loader.php';
include 'staff_login.php';
include 'dbconnect.inc.php';
include 'admin_mains.php';
if (!$AdminLoginObj->isadminlogged()) {
       header("Location: ../../login.php?sout=success");
}

if (isset($_POST['confirm'])) {

       

        if (isset($_POST['alldevices'])) {
                $userLogged_id = $AdminLoginObj->isadminlogged();

               
                //deleting all device tokens
                $delete = mysqli_query($conn, "DELETE FROM admin_login_tokens WHERE admin_id='$userLogged_id'");
                if ($delete) {
                       
                }
                else{
                        echo mysqli_error($conn);
                }
          
        } else {
                if (isset($_COOKIE['SNIDStaff'])) {
                        $loggedTokHashed = sha1($_COOKIE['SNIDStaff']);
                        $deleteTokken = mysqli_query($conn, "DELETE FROM admin_login_tokens WHERE token='$loggedTokHashed'");
                        
                }
                
        }

}
header("Location: ../../login.php?sout=success");
?>