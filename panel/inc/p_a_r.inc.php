<?php
include '../inc/auto-loader.php';
include 'acc_login_function.php';
include 'dbconnect.inc.php';
include 'acc_mains.php';
include '../../classes/mail.php';
include '../../functions/emailtemplates.php';


include 'staff_login.php';
include 'admin_mains.php';

if ($AccLoginObj->isLoggedIn()) {
	

	
}elseif ($AdminLoginObj->isadminlogged()) {
	
}else {
	echo "<h1>Invalid access!</h1>";
	exit();
}

$templateCall = new mailTemplate();
if (isset($_POST['reject_btn']) && isset($_GET['id']) && isset($_GET['owner'])) {
	    $Owner = $_GET['owner'];
//GetOnwer Details
	$QueryOwner = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$Owner'");
	$rowOwner = mysqli_fetch_assoc($QueryOwner);
	$Oemail = mysqli_real_escape_string($conn, $rowOwner['student_email']);
	$OFullName = mysqli_real_escape_string($conn, $rowOwner['first_name']) .''. mysqli_real_escape_string($conn, $rowOwner['last_name']);
	
		$Payment_id = mysqli_real_escape_string($conn, $_GET['id']);
	    $amount_paid = mysqli_real_escape_string($conn, $_POST['amount_paid']);
	    
	    
	    $FetcPayment = mysqli_query($conn, "SELECT * FROM payments WHERE id='$Payment_id'");
	    $rowFetchPayment = mysqli_fetch_assoc($FetcPayment);
	    $InvoiceIdUrl = mysqli_real_escape_string($conn, $rowFetchPayment['invoice_id']);
	       //Getting payment details to update
	$Details = mysqli_query($conn, "SELECT * FROM payments WHERE invoice_id='$InvoiceIdUrl'");
	$row = mysqli_fetch_assoc($Details);
	$invIdi = mysqli_real_escape_string($conn, $row['invoice_id']);
	$AmPaid = mysqli_real_escape_string($conn, $row['total_paid']);
	$lstPaid = mysqli_real_escape_string($conn, $row['last_paid']);
	$amount_paid = mysqli_real_escape_string($conn, $row['amount_paid']);
	     $Totpaid = $lstPaid + $amount_paid;
	     
	//Getting invoice
	$InvoiceGet = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$invIdi'");
	$RowInvGet = mysqli_fetch_assoc($InvoiceGet);
	$InvCostFee = mysqli_real_escape_string($conn, $RowInvGet['fee']);
	    


		if($updatePayments = mysqli_query($conn, "UPDATE payments SET status='rejected', proceeded_by='$user_id'  WHERE id='$Payment_id'")){

		//insert notification
   $run_notify = mysqli_query($conn, "INSERT INTO user_alerts(alert_totype, alert_to, alert_info, read_or_unread, alert_url)VALUES ('student', '$Owner', 'Your payment has been approved successfully', 'unread', 'p_history.php?status=approved')");


   //Sending another invoice
          // Simply:
          $Nowdate = date('Y-m-d H:i:s');
          $AnotherInvoice = mysqli_query($conn, "INSERT INTO payments (payment_by, status, deposit_slip_file, 	proceeded_by, payment_date, amount_paid, reference, reject_description,invoice_id, last_paid, total_paid)
          VALUES('$Owner', 'not_paid', 'none', '0','$Nowdate','0', 'Complete the Balance','-','$invIdi','$Totpaid','$Totpaid')");
          
          
          
   //run email insert
                $fullDescription = 'Your payment from '.$site_fullName.' was rejected. Please make sure that you have attached the correct deposit slip file and note that uploading fake slips is a serious crime.<br> You can now view your payment history here: '.$site_url.'/'.$site_directory.'/panel/p_history.php';
                $generalTemplate = $templateCall->generalTemplate($site_fullName, $OFullName, $fullDescription, 'Accountants Department', 'Payment Rejected');
				 Mail::sendMail('Payment Rejected', $generalTemplate , $Oemail);

				 	
				 
		       header("Location: ../acc_approvedpayments.php?status=rejected");
		}else{
		    echo mysqli_error($conn);
		}

		
}
else{
	if (isset($_POST['approve_btn']) && isset($_GET['id']) && isset($_GET['owner'])) {
	    $Owner = $_GET['owner'];
//GetOnwer Details
	$QueryOwner = mysqli_query($conn, "SELECT * FROM students WHERE system_id='$Owner'");
	$rowOwner = mysqli_fetch_assoc($QueryOwner);
	$Oemail = mysqli_real_escape_string($conn, $rowOwner['student_email']);
	$OFullName = mysqli_real_escape_string($conn, $rowOwner['first_name']) .''. mysqli_real_escape_string($conn, $rowOwner['last_name']);
	
		$Payment_id = mysqli_real_escape_string($conn, $_GET['id']);
	    $FetcPayment = mysqli_query($conn, "SELECT * FROM payments WHERE id='$Payment_id'");
	    $rowFetchPayment = mysqli_fetch_assoc($FetcPayment);
	    $InvoiceIdUrl = mysqli_real_escape_string($conn, $rowFetchPayment['invoice_id']);
	    
	    //Getting payment details to update
	$Details = mysqli_query($conn, "SELECT * FROM payments WHERE invoice_id='$InvoiceIdUrl'");
	$row = mysqli_fetch_assoc($Details);
	$invIdi = mysqli_real_escape_string($conn, $row['invoice_id']);
	$AmPaid = mysqli_real_escape_string($conn, $row['total_paid']);
	$lstPaid = mysqli_real_escape_string($conn, $row['last_paid']);
	$amount_paid = mysqli_real_escape_string($conn, $row['amount_paid']);
	     $Totpaid = $lstPaid + $amount_paid;
	     
	//Getting invoice
	$InvoiceGet = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$invIdi'");
	$RowInvGet = mysqli_fetch_assoc($InvoiceGet);
	$InvCostFee = mysqli_real_escape_string($conn, $RowInvGet['fee']);


		$updatePayments = mysqli_query($conn, "UPDATE payments SET status='approved', proceeded_by='$user_id', last_paid='$Totpaid', total_paid='$Totpaid' WHERE id='$Payment_id'");
	    //Balance check
		$Balance_query = mysqli_query($conn,  "SELECT SUM(amount_paid) AS 'sumitem_cost' FROM payments WHERE payment_by='$Owner' AND invoice_id='$invIdi' AND status!='rejected'");
    
      $balance_data = mysqli_fetch_array($Balance_query);
      $balance_price = $balance_data['sumitem_cost'];
      
      if($balance_price == $InvCostFee || $balance_price > $InvCostFee){
         //Do nothing
          
      }else{
          //Sending another invoice
          // Simply:
          $Nowdate = date('Y-m-d H:i:s');
          $AnotherInvoice = mysqli_query($conn, "INSERT INTO payments (payment_by, status, deposit_slip_file, 	proceeded_by, payment_date, amount_paid, reference, reject_description,invoice_id, last_paid, total_paid)
          VALUES('$Owner', 'not_paid', 'none', '0','$Nowdate','0', 'Complete the Balance','-','$invIdi','$Totpaid','$Totpaid')");
      }
      
		

		//insert notification
  $run_notify = mysqli_query($conn, "INSERT INTO user_alerts(alert_totype, alert_to, alert_info, read_or_unread, alert_url)VALUES ('student', '$Owner', 'Your payment has been approved successfully', 'unread', 'p_history.php?status=approved')");

   //run email insert
             
   
				 //run email insert
                $fullDescription = 'Your payment from '.$site_fullName.' has been approved successfull.<br> You can now view your payment history here: '.$site_url.'/'.$site_directory.'/panel/p_history.php';
                $generalTemplate = $templateCall->generalTemplate($site_fullName, $OFullName, $fullDescription, 'Accountants Department', 'Payment approved');
				 Mail::sendMail('Payment Approved', $generalTemplate , $Oemail);

				 	
		        header("Location: ../acc_approvedpayments.php?status=approved");
	}
}
?>