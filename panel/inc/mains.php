<?php

//mobile detect
//include($_SERVER['DOCUMENT_ROOT'].'/batmix365/plugins/mobile_detect/Mobile_Detect.php');
//geting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_fULLname = mysqli_real_escape_string($conn, $row_info['full_name']);
$site_email = mysqli_real_escape_string($conn, $row_info['email']);
$site_phone1 = mysqli_real_escape_string($conn, $row_info['phone']);
$site_phone2 = mysqli_real_escape_string($conn, $row_info['phone2']);
$site_motto = mysqli_real_escape_string($conn, $row_info['motto']);
$site_AboutUs = mysqli_real_escape_string($conn, $row_info['about_us']);
$site_address = mysqli_real_escape_string($conn, $row_info['address']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_SmallLogo = mysqli_real_escape_string($conn, $row_info['small_logo']);
$site_directory = 'edearth';
$site_currency = mysqli_real_escape_string($conn, $row_info['currency']);
$site_currency_code = mysqli_real_escape_string($conn, $row_info['currency_code']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
//Bank details

$site_bank_acc_number = mysqli_real_escape_string($conn, $row_info['bank_acc_number']);
$site_bank_acc_name = mysqli_real_escape_string($conn, $row_info['bank_acc_name']);
$site_bank_name = mysqli_real_escape_string($conn, $row_info['bank_name']);

$LoginObj = new Login();
if ($LoginObj->isLoggedIn()) {

 $userid =  $LoginObj->isLoggedIn();

        $username = "SELECT * FROM students WHERE system_id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['system_id'];
        $user_fname = mysqli_real_escape_string($conn,  $row['first_name']);
        $user_lname = mysqli_real_escape_string($conn,  $row['last_name']);
        $User_FullName = $user_fname. ' '. $user_lname;
        $user_email = mysqli_real_escape_string($conn,  $row['student_email']);
        $user_semester =  mysqli_real_escape_string($conn,  $row['semester']);
        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
         $programme_id = mysqli_real_escape_string($conn, $row['programme_id']);
         $student_studentid = mysqli_real_escape_string($conn, $row['exam_number']);
         
         $student_class = mysqli_real_escape_string($conn, $row['class_id']);
          $student_year = mysqli_real_escape_string($conn, $row['year']);
          $student_mode = mysqli_real_escape_string($conn, $row['study_mode']);
          $student_citytown = mysqli_real_escape_string($conn, $row['city_town']);
         // $student_country = mysqli_real_escape_string($conn, $row['country']);
          $phoneNumber = mysqli_real_escape_string($conn, $row['phone_number']);

         //getting payments balances
//gettingshopping cart details
      $Balance_query = mysqli_query($conn,  "SELECT SUM(amount_paid) AS 'sumitem_cost' FROM payments WHERE payment_by='$user_id'  AND status!='rejected' ");
    
      $balance_data = mysqli_fetch_array($Balance_query);
      $balance_price = $balance_data['sumitem_cost'];
      
      $py = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status!='rejected' GROUP BY invoice_id");
      $tot = 0;
      $total_price = 0;
      while($rowpy = mysqli_fetch_assoc($py)){
          
          $paidAmout = $rowpy['amount_paid'];
          $invoiceId = mysqli_real_escape_string($conn, $rowpy['invoice_id']);
          $PaymentStatus = mysqli_real_escape_string($conn, $rowpy['status']);
          //Getting invoice
          $Invoice = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$invoiceId'");
          while($rowInv = mysqli_fetch_assoc($Invoice)){
          $NewFeeId = $rowInv['id'];
          $total_price += $rowInv['fee'];
          
          
          
         
          
         
          
          
      }

    }
      //Getting pending status
      $pystatus = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$user_id' AND status='pending' ");
      if(mysqli_num_rows($pystatus) > 0){
         $BalanceToPay = 'pending'; 
      }else{
     $BalanceToPay =  $total_price - $balance_price;
      }
      }
     
      //getting pending books
      $Get_Books = mysqli_query($conn, "SELECT * FROM physical_library WHERE  borrower_id='$user_id' and  book_status='pending'");
      $Count_Books = mysqli_num_rows($Get_Books);

      //getting failed courses
      $GetFailedCourses = mysqli_query($conn, "SELECT * FROM course_details WHERE course_to='$user_id' and status='failed' ");
      $CountCourses = mysqli_num_rows($GetFailedCourses);

      //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='student' AND read_or_unread='unread'");
          $MsgCounter = mysqli_num_rows($RunMsg);
 


//time ago function

include($_SERVER['DOCUMENT_ROOT'].'/'.$site_directory.'/panel/functions/time.php');
 

//ending

?>