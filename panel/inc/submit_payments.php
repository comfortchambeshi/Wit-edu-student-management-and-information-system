<?php
//classes
include '../inc/auto-loader.php';
include '../classes/payments.php';
include '../classes/main.php';
include 'dbconnect.inc.php';

$payments = new payments();
$main = new main();
//end classes
if (isset($_POST['payment_btn']) && isset($_GET['inv_id']) && isset($_GET['pay_id'])) {



include 'login_function.php';
include 'mains.php';
$InvoiceIdUrl = $_GET['inv_id'];
$pyId = $_GET['pay_id'];




	$payment_category = $_POST['invoice_id'];
	$depositSlip_file  = $_FILES['slip_file'];
	$reference  = $_POST['reference'];
	$amount_paid = $_POST['amount_paid'];
	


	

	if (empty($payment_category) || empty($depositSlip_file)) {
		
		header("Location: ../submit_payments.php?status=empty");
	}
	else{

		//for files
$fileTmpPath = $_FILES['slip_file']['tmp_name'];
$fileName = $_FILES['slip_file']['name'];
$fileSize = $_FILES['slip_file']['size'];
$fileType = $_FILES['slip_file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "deposit_slip";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');


$file_name = $depositSlip_file; 

$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = '../uploads/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path))
{
/*$Insert_Slip =  mysqli_query($conn, "INSERT INTO payments(invoice_id, payment_by, status,  deposit_slip_file, proceeded_by, payment_date, amount_paid, reference, reject_description) 

	VALUES('$payment_category', '$user_id', 'pending', '$UploadFullName',  '0', NOW(), '$amount_paid', 'reference', '-' )");*/
	
	//Getting payment details to update
	$Details = mysqli_query($conn, "SELECT * FROM payments WHERE invoice_id='$InvoiceIdUrl' AND payment_by='$user_id'");
	$row = mysqli_fetch_assoc($Details);
	$invIdi = mysqli_real_escape_string($conn, $row['invoice_id']);
	$AmPaid = mysqli_real_escape_string($conn, $row['amount_paid']);
	
	$Totpaid = $AmPaid + $amount_paid;
    
	//Check payment
	$CheckPayment = mysqli_query($conn, "SELECT * FROM payments WHERE invoice_id='$invIdi' AND payment_by='$user_id' AND status='not_paid'");
	if(mysqli_num_rows($CheckPayment)){
	$updateSlip = mysqli_query($conn, "UPDATE payments SET status='pending', deposit_slip_file='$UploadFullName', amount_paid='$amount_paid',  total_paid='$Totpaid', payment_date=NOW() WHERE invoice_id='$invIdi' AND payment_by='$user_id' AND id='$pyId'");
	}else{
	    $Insert_Slip =  mysqli_query($conn, "INSERT INTO payments(payment_by, status, deposit_slip_file, proceeded_by, payment_date, amount_paid, reference, invoice_id) 

	VALUES('$user_id', 'pending', '$UploadFullName', 'none', NOW(), '$amount_paid', 'reference', '$invIdi' )");
	header("Location: ../payment_success.php?status=success");
	}
if ($updateSlip) {
header("Location: ../payment_success.php?status=success");
}else{
	echo mysqli_error($conn);
}





	}

}
else{

header("Location: ../submit_payments.php?status=ext_invalid");
}
}

}
//for manual payments
if(isset($_POST['manual_btn'])){
    $uid = $_POST['uid'];
    $amount = $_POST['amount'];
    $invoice_id = $_POST['amount'];
    $slip_file = $_FILES['slip_file'];
    
    //checking email or exam id
    $checker = $main->studentBy_email_orExamid($uid);
    foreach($checker as $student){
        $system_id = $student['system_id'];
    
    }
    //allowed extensions
    $extensions = array('jpg', 'gif', 'png', 'jpeg', 'docx');
    $fileUploader = $main->file_uploaders($slip_file,'../uploads/slips_test/', $extensions);
    //inserting payments
    $InsertPayment = $payments->InsertPayments($invoice_id,$system_id,$amount,$fileUploader,0);
    header("Location: ../acc_p_history.php?status=success");
}

?>