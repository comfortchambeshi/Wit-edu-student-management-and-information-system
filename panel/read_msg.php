<?php
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$userid =  admin_login::isadminlogged();
$logged_header = '';

$logged_header = header1($logged_header);




include 'inc/admin_sidebar.php';

?>

<body>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel/admin_messages.php';?>">Messages</a></li>
              <li class="breadcrumb-item active">Reading Conversation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
    <div class="container" style="margin-top: 17px;">
       



        <?php


        if (isset($_GET['id'])) {
          $Msg_id = mysqli_real_escape_string($conn, $_GET['id']);
          
              //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE id='$Msg_id' AND sent_to='$user_id' OR msg_from='$user_id' AND from_type='admin' OR to_type='admin' limit 1");
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
    </div>
   <div></div>
    <div></div>
  
<?php
include 'inc/footer.php';
?>


