<?php


class lib_Login extends db {





        public  function isLoggedIn() {
         
               

if (isset($_COOKIE['SNID'])) {

                        $realToken = sha1($_COOKIE['SNID']);
                        $sql = "SELECT lib_id FROM lib_login_tokens WHERE token=?";
                        $stmt = $this->connect()->prepare($sql);
                         if(!$stmt->execute([$realToken])){
                         print_r($stmt->errorInfo());
                         }

                         $row = $stmt->fetch();

                               $SqlChecktok = "SELECT lib_id FROM lib_login_tokens WHERE token=?";
                               $StmtChecktok = $this->connect()->prepare($SqlChecktok);
                               if(!$StmtChecktok->execute([$realToken])){
                         print_r($stmt->errorInfo());
                         }
                         
                               

                               $getRowTok = $StmtChecktok->fetch();
                               if ($StmtChecktok->rowCount() > 0) {
                                  $userid = $getRowTok['lib_id'];
                               }else{
                                $userid = 0;
                               }
                               

                                if (isset($_COOKIE['SNID_'])) {
                                        return $userid;
                                } else {
                                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        $user_id = mysqli_query($conn, "SELECT id from librarians where username='$uid' OR email='$uid' OR nrc='$uid' ; ");
                        //getting user id
                        $row_users = mysqli_fetch_assoc($user_id);
                        $real_uid = $row_users['id'];
                       $INSERT = mysqli_query($conn, "INSERT INTO lib_login_tokens (token, lib_id) VALUES ('$hashed_token', '$real_uid')");

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        
                }

                return false;
        }
}

?>
