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
if (Login::isLoggedIn()) {

 $userid =  Login::isLoggedIn();

        $username = "SELECT * FROM students WHERE system_id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['system_id'];
        
        $user_name = mysqli_real_escape_string($conn,  $row['student_name']);
        $user_email = mysqli_real_escape_string($conn,  $row['student_email']);

        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
         $programme_id = mysqli_real_escape_string($conn, $row['programme_id']);
         $student_studentid = mysqli_real_escape_string($conn, $row['student_id']);
         $student_class = mysqli_real_escape_string($conn, $row['class_id']);
          $student_year = mysqli_real_escape_string($conn, $row['year']);
          $user_className = mysqli_real_escape_string($conn, $row['class_id']);
          $student_citytown = mysqli_real_escape_string($conn, $row['city_town']);
         // $student_country = mysqli_real_escape_string($conn, $row['country']);
          $phoneNumber = mysqli_real_escape_string($conn, $row['phone_number']);
        //$user_rank = mysqli_real_escape_string($conn, $row['u_rank']);

         //getting payments balances
//gettingshopping cart details
      $Balance_query = mysqli_query($conn,  "SELECT SUM(balance) AS 'sumitem_cost' FROM payments_balances WHERE balance_to='$user_id' ");
    
      $balance_data = mysqli_fetch_array($Balance_query);
      $balance_price = $balance_data['sumitem_cost'];
      //getting pending books
      $Get_Books = mysqli_query($conn, "SELECT * FROM pending_books WHERE book_to='$user_id' and status='pending'");
      $Count_Books = mysqli_num_rows($Get_Books);

      //getting failed courses
      $GetFailedCourses = mysqli_query($conn, "SELECT * FROM course_details WHERE course_to='$user_id' and status='failed' ");
      $CountCourses = mysqli_num_rows($GetFailedCourses);

      //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' limit 8");
          $MsgCounter = mysqli_num_rows($RunMsg);

       
        
       

}

        ?>

        