<?php
//mobile detect
//include($_SERVER['DOCUMENT_ROOT'].'/batmix365/plugins/mobile_detect/Mobile_Detect.php');
//geting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
if (lib_Login::isLoggedIn()) {

 $userid =  lib_Login::isLoggedIn();

        $username = "SELECT * FROM librarians WHERE id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['id'];
        
        $user_fullname = mysqli_real_escape_string($conn,  $row['name']);
         $user_nrc = mysqli_real_escape_string($conn,  $row['nrc']);
        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
         //$student_studentid = mysqli_real_escape_string($conn, $row['student_id']);
        //$user_rank = mysqli_real_escape_string($conn, $row['u_rank']);

        

      //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='librarian'  limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);


          //Total Books
          $GetBooks = mysqli_query($conn, "SELECT * FROM library_books");
          $Total_Students = mysqli_num_rows($GetBooks);
      

       
        
       

}

        ?>

        