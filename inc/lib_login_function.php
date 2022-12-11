<?php


class lib_Login {





        public static function isLoggedIn() {
         include($_SERVER['DOCUMENT_ROOT'].'/inc/dbconnect.inc.php');
               


                if (isset($_COOKIE['SNID'])) {

                        $realToken = sha1($_COOKIE['SNID']);
                        if (mysqli_query($conn, "SELECT id FROM lib_login_tokens WHERE token='$realToken'")) {
                               $checktok = mysqli_query($conn, "SELECT lib_id FROM lib_login_tokens WHERE token='$realToken'");
                               $getRowTok = mysqli_fetch_assoc($checktok);
                               $userid = $getRowTok['lib_id'];

                                if (isset($_COOKIE['SNID_'])) {
                                        return $userid;
                                } else {
                                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
         $user_id = mysqli_query($conn, "SELECT id from librarians where nrc='$uid' OR email='$uid' ");
                        //getting user id
                        $row_users = mysqli_fetch_assoc($user_id);
                        $real_uid = $row_users['id'];
                        $INSERT = mysqli_query($conn, "INSERT INTO lib_login_tokens (token, lib_id) VALUES ('$hashed_token', '$real_uid')");

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        }
                }

                return false;
        }
}

?>
