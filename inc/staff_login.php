<?php


class admin_login {
        public static function isadminlogged() {
                   
include($_SERVER['DOCUMENT_ROOT'].'/inc/dbconnect.inc.php');

                if (isset($_COOKIE['SNIDStaff'])) {
                        
                        $realToken = sha1($_COOKIE['SNIDStaff']);
                        if (mysqli_query($conn, "SELECT admin_id FROM admin_login_tokens WHERE token='$realToken'")) {
                               $checktok = mysqli_query($conn, "SELECT admin_id FROM admin_login_tokens WHERE token='$realToken'");
                               $getRowTok = mysqli_fetch_assoc($checktok);
                               $userid = $getRowTok['admin_id'];

                                if (isset($_COOKIE['SNIDStaff_'])) {
                                        return $userid;
                                } else {
                                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        $user_id = mysqli_query($conn, "SELECT id from administrators where username='$uid'");
                        //getting user id
                        $row_users = mysqli_fetch_assoc($user_id);
                        $real_uid = $row_users['id'];
                        $INSERT = mysqli_query($conn, "INSERT INTO admin_login_tokens (token, user_id) VALUES ('$hashed_token', '$real_uid')");

                        setcookie("SNIDStaff", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNIDStaff_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        }
                }

                return false;
        }
}

?>