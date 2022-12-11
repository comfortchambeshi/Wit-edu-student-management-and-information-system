<?php
include '../inc/auto-loader.php';
include 'classes/db.php';
include 'inc/dbconnect.inc.php';
include 'inc/acc_login_function.php';

include 'inc/staff_login.php';
include 'inc/acc_mains.php';




$AccLoginObj = new acc_login();
$AdminLoginObj = new admin_login();
if ($AccLoginObj->isLoggedIn()) {
    include 'functions/acc_header.php';
	$logged_header = '';
    $logged_header = header1($logged_header);
    
    include 'inc/acc_sidebar.php';
   
$userType = 'acc';
}elseif($AdminLoginObj->isadminlogged()){
    
    include 'functions/admin_header.php';

include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$userid =  $AdminLoginObj->isadminlogged();
$logged_header = '';

$logged_header = header1($logged_header);
include 'inc/admin_sidebar.php';
$userType = 'admin';

}
else{
    header("Location: ../login.php?sout=success");

      }


?>
<title>Viewing payment..</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/icon-font.min.css" type="text/csc" />
<link href="//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400" rel="stylesheet" type="text/css"/>
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- Content Wrapper. Contains page content -->
<div class="container">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment</h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Payments</a></a></li>
              <li class="breadcrumb-item active">Viewing..</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


  
    
    <style type="text/css">
    	body{}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
		
			
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
</head>
<body>
	<?php

	if (isset($_GET['id'])) {
		$PaymentNumber = $_GET['id'];
	$QueryPayment = mysqli_query($conn, "SELECT * FROM payments WHERE id='$PaymentNumber'");
	if (mysqli_num_rows($QueryPayment) > 0) {
		$RowPayments = mysqli_fetch_assoc($QueryPayment);

		$file = mysqli_real_escape_string($conn, $RowPayments['deposit_slip_file']);
		$AmmountPaid = mysqli_real_escape_string($conn, $RowPayments['amount_paid']); 
		$PaymentDate = mysqli_real_escape_string($conn, $RowPayments['payment_date']); 
		$PaymentOwner = mysqli_real_escape_string($conn, $RowPayments['payment_by']);
		$PaymentStatus = mysqli_real_escape_string($conn, $RowPayments['status']); 

		//Getting Owner  
		$username = "SELECT * FROM students WHERE system_id='$PaymentOwner'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['system_id'];
	 $Owner_fname = mysqli_real_escape_string($conn,  $row['first_name']);   
	 $Owner_lame = mysqli_real_escape_string($conn,  $row['last_name']);
     $Owner_name = $Owner_fname .' '. $Owner_lame;
     $Owner_email = mysqli_real_escape_string($conn,  $row['student_email']);

     $Owner_s_id = mysqli_real_escape_string($conn,  $row['system_id']);

     $Owner_image = mysqli_real_escape_string($conn, $row['profile_pic']);
         $Owner_studentid = mysqli_real_escape_string($conn, $row['username']);
         $Owner_class = mysqli_real_escape_string($conn, $row['class_id']);
          $Owner_year = mysqli_real_escape_string($conn, $row['year']);
          $Owner_citytown = mysqli_real_escape_string($conn, $row['city_town']);
         $Owner_year = mysqli_real_escape_string($conn, $row['year']);
          $OwnerphoneNumber = mysqli_real_escape_string($conn, $row['phone_number']);

          //getting student class
          $GetClass = mysqli_query($conn,"SELECT * FROM classes WHERE id='$Owner_class' ");
          $RowClass = mysqli_fetch_assoc($GetClass);
          $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
          
          
          $InvId = mysqli_real_escape_string($conn, $RowPayments['invoice_id']);
                                                           
					                 
						        $Inv = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$InvId'");
						        $rowInv = mysqli_fetch_assoc($Inv);
						        $InvName = mysqli_real_escape_string($conn, $rowInv['name']);
						        $CostInv = mysqli_real_escape_string($conn, $rowInv['fee']);
						        $InvId = mysqli_real_escape_string($conn, $rowInv['id']);
						        
						      

		echo'
    <div class="row">
		
        <div style="margin-left:12px;" class="receipt-main col-xs-10 col-sm-10 col-md-10 col-xs-offset-3 col-sm-offset-3 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="uploads/students_profiles/'.$Owner_image.'" style="width: 200px; border-radius: 43px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						
					</div>
				</div>
            </div>
			
			<div class="row" style="font-size: 20px;">
				<div class="receipt-header receipt-header-mid">
					<div style="font-size: 20px;" class="col-xs-12 col-sm-12 col-md-8 text-left">
						<div class="receipt-right">
							<h3>'.$Owner_name.' </h3>
							<h4><b>Mobile :</b> '.$OwnerphoneNumber.'</h4>
							<h4><b>Email :</b> '.$Owner_email.'</h4>
							<h4><b>Address :</b> '.$Owner_citytown.', Zambia</h4>
							<h4><b>Classs :</b> '.$ClassName.'</h4>
							<h4><b>Accademic Year :</b> '.$Owner_year.'</h4>


							
						</div>
					</div>
					<div class="col-xs-4 col-sm-12 col-md-4">
						<div class="receipt-left">
							<h4>PAYMENT # '.$PaymentNumber.'</h4>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table style="font-size: 20px;" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                        <tr>
                            <td class="col-md-9">Payment for: <b>'.$InvName.'</b></td>
                            <td class="col-md-3"><i class="fa fa-zmw">K</i>'.$AmmountPaid.'</td>
                        </tr>
                        
                        
                    </tbody>
                </table>
                                Deposit slip file:
                <img style="width:100%" src="uploads/'.$file.'">
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div  style="margin-left:250px; font-size: 20px;" class=" text-center">
						<div class="receipt-center">
							<p><b>Date :</b> '.$PaymentDate.'</p>
							<h5 style="width:100%;" style="color: rgb(140, 140, 140);">This statement is currently '.$PaymentStatus.'.!</h5>
							<h1 class="text-left" style="background-color: #cccccc;">


							<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Reject!
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment rejection for: '.$Owner_name.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      




<form method="post" action="inc/p_a_r.inc.php?id='.$PaymentNumber.'&owner='.$Owner_s_id.'">
        <div class="form-container">
    <h2 class="text-center"><strong>Reject payment</strong></h2>
    
   
    <div class="form-group"><span>Brief explanation of payment rejection!</span><textarea type="text" class="form-control" name="reject_desc" placeholder="total balance"  /> </textarea></div>
    <div class="form-group">
        <div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" required />_____I aknowledge that all the details entered are correct</label></div>
    </div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="reject_btn">Reject payment</button></div></div>

</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>






							&nbsp&nbsp&nbsp&nbsp 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Approve</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="register-photo">
        <div class="form-container">
        <form method="post" action="inc/p_a_r.inc.php?id='.$PaymentNumber.'&owner='.$Owner_s_id.'">
    <h2 class="text-center"><strong>Approve payment</strong></h2>
    <div class="form-group">
    <h5 class="text-danger">Are you sure that you wan\'t to approve this payment. Please note: that the changes cannot be reverted one decided!<h5>
    <span>Amount paid </span>
    <input type="text" class="form-control" name="amount_paid" placeholder="'.$AmmountPaid.'" required disabled/></div>
   
    
    <div class="form-group">
        <div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" required />_____I aknowledge that all the details entered are correct</label></div>
    </div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="approve_btn">Approve payment</button></div>
</div>
    </div>
  </div>
</div></h1>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						
					</div>
				</div>
            </div>
			
        </div>    
	</div></form>
';
	}
	
}
?>
<hr>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
  include 'inc/footer.php';
  
  ?>