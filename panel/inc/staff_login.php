<?php


class admin_login  extends db {
        public  function isadminlogged() {

            if (isset($_COOKIE['SNIDStaff'])) {

                        $realToken = sha1($_COOKIE['SNIDStaff']);
                        $sql = "SELECT admin_id FROM admin_login_tokens WHERE token=?";
                        $stmt = $this->connect()->prepare($sql);
                         if(!$stmt->execute([$realToken])){
                         print_r($stmt->errorInfo());
                         }

                         $row = $stmt->fetch();

                               $SqlChecktok = "SELECT admin_id FROM admin_login_tokens WHERE token=?";
                               $StmtChecktok = $this->connect()->prepare($SqlChecktok);
                               if(!$StmtChecktok->execute([$realToken])){
                         print_r($stmt->errorInfo());
                         }
                         
                               

                               $getRowTok = $StmtChecktok->fetch();
                               if ($StmtChecktok->rowCount() > 0) {
                                  $userid = $getRowTok['admin_id'];
                               }else{
                                $userid = 0;
                               }
                               

                                if (isset($_COOKIE['SNIDStaff_'])) {
                                        return $userid;
                                } else {
                                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $hashed_token =sha1($token);
                        $user_id = mysqli_query($conn, "SELECT id from accountants where username='$uid' OR email='$uid' ; ");
                        //getting user id
                        $row_users = mysqli_fetch_assoc($user_id);
                        $real_uid = $row_users['id'];
                       $INSERT = mysqli_query($conn, "INSERT INTO acc_login_tokens (token, acc_id) VALUES ('$hashed_token', '$real_uid')");

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                                        return $userid;
                                }
                        
                }
                   


              

                return false;
        }
}

?>