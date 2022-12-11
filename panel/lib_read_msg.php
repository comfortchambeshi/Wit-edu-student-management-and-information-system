      
          <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="assets/css/footer-copyright_bar.css">
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />

</head>

<body>
    <div class="container" style="margin-top: 17px;">
        <?php
           
include 'functions/lib_header2.php';
include 'inc/lib_login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/lib_mains.php';


$userid =  lib_login::isloggedIn();
$logged_header = '';

$logged_header = header1($logged_header);

?>


        <?php


        if (isset($_GET['id'])) {
          $Msg_id = mysqli_real_escape_string($conn, $_GET['id']);
          
              //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE id='$Msg_id' AND sent_to='$user_id' OR msg_from='$user_id' AND from_type='lib' OR to_type='lib' limit 1");
          $MsgCounter = mysqli_num_rows($RunMsg);
         if ($MsgCounter > 0) {
          
          while ($RowMsg = mysqli_fetch_assoc($RunMsg)) {

            //$messageTitle = mysqli_real_escape_string($conn, $RowMsg['msg_title']);
            $fromtype = mysqli_real_escape_string($conn, $RowMsg['from_type']);
            $messageBody = mysqli_real_escape_string($conn, $RowMsg['body']);
            $messageDate = mysqli_real_escape_string($conn, $RowMsg['datestatus']);
            $messageFrom = mysqli_real_escape_string($conn, $RowMsg['msg_from']);
             $messageTo = mysqli_real_escape_string($conn, $RowMsg['sent_to']);
             if ($messageTo == $user_id ) {
                 $UpdateMSG = mysqli_query($conn, "UPDATE messages SET read_or_unread='read' WHERE id='$Msg_id'");
             }

             //Getting sender details

             if ($fromtype == 'student') {
                $queryFrom = 'students';
                $totype = 'student';
                $system_id = 'system_id';
                $profile_dir = 'students_profiles';
             }
             elseif ($fromtype == 'admin') {
                 $totype = 'admin';
                 $queryFrom = 'administrators';
                 $system_id = 'id';
                 $profile_dir = 'admins_profiles';
             }
             elseif ($fromtype == 'acc') {
                 $totype = 'acc';
                $queryFrom = 'accountants';
                $system_id = 'id';
                $profile_dir = 'acc_profiles';
             }
             elseif ($fromtype == 'lib') {
                 $totype = 'lib';
                $queryFrom = 'librarians';
                $system_id = 'id';
                $profile_dir = 'libs_profiles';
             }

          $QuerySender = mysqli_query($conn, "SELECT * FROM $queryFrom WHERE $system_id='$messageFrom'");
          $RowSender = mysqli_fetch_assoc($QuerySender);
          $SenderId = mysqli_real_escape_string($conn, $RowSender[$system_id]);
          $senderProfile = mysqli_real_escape_string($conn, $RowSender['profile_pic']);
             //Ending sender details
            


             if ($messageFrom == $user_id) {
                echo'

 
                 <div class="media border rounded-0" style="margin-bottom: 13px;background-color: #bed2b2;"><img class="img-fluid border rounded-circle mr-3" src="assets/img/user-icon.jpg" style="width: 48px;">
            <div class="media-body">
                <p class="text-dark border rounded-circle">'.$messageBody.'</p>
                <p class="text-dark"><em>'.$messageDate.'</em></p>
            </div>
        </div>';
             }
             else{

 echo '


              <div class="media border rounded-0" style="margin-bottom: 13px;background-color: #d7d7d7;"><img class="img-fluid border rounded-circle mr-3" src="uploads/'.$profile_dir.'/'.$senderProfile.'" style="width: 48px;">
            <div class="media-body border rounded-circle">
                <p class="text-dark">'.$messageBody.'</p>
                <p class="text-dark"><em>'.$messageDate.'</em></p>
            </div>
        </div>


           

            ';


             }
            
}}
else{

}

//Getting replys



$RunMsg = mysqli_query($conn, "SELECT * FROM messages_replys WHERE msg_id='$Msg_id'  limit 10");
$MsgCounter = mysqli_num_rows($RunMsg);
if ($MsgCounter > 0) {

while ($RowMsg = mysqli_fetch_assoc($RunMsg)) {

 
  $messageBody = mysqli_real_escape_string($conn, $RowMsg['body']);
  $messageDate = mysqli_real_escape_string($conn, $RowMsg['date_sent']);
  $messageFrom = mysqli_real_escape_string($conn, $RowMsg['msg_from']);
   $messageTo = mysqli_real_escape_string($conn, $RowMsg['sent_to']);
  


   if ($messageFrom == $user_id) {
      echo '


       <div class="media border rounded-0" style="margin-bottom: 13px;background-color: #bed2b2;"><img class="img-fluid border rounded-circle mr-3" src="assets/img/user-icon.jpg" style="width: 48px;">
  <div class="media-body">
      <p class="text-dark border rounded-circle">'.$messageBody.'</p>
      <p class="text-dark"><em>'.$messageDate.'</em></p>
  </div>
</div>';
   }
   else{

echo '


    <div class="media border rounded-0" style="margin-bottom: 13px;background-color: #d7d7d7;"><img class="img-fluid border rounded-circle mr-3" src="assets/img/user-icon.jpg" style="width: 48px;">
  <div class="media-body border rounded-circle">
      <p class="text-dark">'.$messageBody.'</p>
      <p class="text-dark"><em>'.$messageDate.'</em></p>
  </div>
</div>


 

  ';


   }
  
}}



else{

echo "No replys found!";
}


echo ' <form  action="inc/message_inc.php?msg_id='.$Msg_id.'&totype='.$totype.'&fromtype='.$fromtype.'&msg_to='.$messageFrom.'" method="POST" style="background-color: #ddedee;">
<textarea name="reply_body" class="form-control"></textarea>
<button class="btn btn-primary btn-lg" name="reply_btn" type="submit" style="margin-top: 8px;">SEND</button>
</form>';
}

            ?>
            
            
            
    
        
       
       
    </div>
   
    <div></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>


echo '<h5 class="text-center text-white shadow-lg" style="background-color: #425ce4;">Me and Tizenge Sibale</h5>';