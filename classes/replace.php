<?php
//Mailer
class replace
{

  public function updateEmail($file_dir, $mail_dir,  $security, $host, $port, $username, $password, $mail_from)
  {
   require_once __DIR__. $file_dir;

$replace_content = '
<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/PHPMailer/PHPMailerAutoload.php";
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

';

file_put_contents(__DIR__ . $file_dir, $replace_content);
  }

}



