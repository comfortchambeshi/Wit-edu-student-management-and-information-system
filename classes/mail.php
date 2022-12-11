
<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/edearth/PHPMailer/PHPMailerAutoload.php";
class Mail {
    public static $security = "ssl";
    public static $host = "mail.mukuni.edu.zm";
    public static $port = "465";
    public static $username = "noreply@mukuni.edu.zm";
    public static $password = "@Bantu2020";
    public static $setFrom = "noreply@mukuni.edu.zm";

    public static function sendMail($subject, $body, $address) {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = self::$security;
            $mail->Host = self::$host;
            $mail->Port = self::$port;
            $mail->isHTML();
            $mail->Username = self::$username;
            $mail->Password = self::$password;
            $mail->SetFrom(self::$setFrom );
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($address);

            $mail->Send();
    }
}

