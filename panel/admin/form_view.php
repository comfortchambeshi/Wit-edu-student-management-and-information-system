<?php
include '../inc/auto-loader.php';
include '../functions/admin_header.php';
include '../inc/staff_login.php';
include '../inc/dbconnect.inc.php';
include '../inc/admin_mains.php';
include '../classes/mail.php';

$logged_header = '';

$logged_header = header1($logged_header);




include '../inc/admin_sidebar.php';

?>
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
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="assets/css/footer-copyright_bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="assets/css/Important-Highlighted-Event.css">
    <link rel="stylesheet" href="assets/css/Latest-Blog.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap Core CSS -->

<!-- Custom CSS -->


<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
</head>

<body>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Admission</a></li>
              <li class="breadcrumb-item active">Form View</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


<?php
if (isset($_GET['id'])) {
	$UrlId = $_GET['id'];
$GetForm = mysqli_query($conn, "SELECT * FROM admission where id='$UrlId' ");
if (mysqli_num_rows($GetForm) > 0) {
	
	while($row = mysqli_fetch_assoc($GetForm)){
        $FormId = mysqli_real_escape_string($conn,$row['id']);
        $ProgrammeId = mysqli_real_escape_string($conn,$row['course_id']);
		$NameOfSubmitter = mysqli_real_escape_string($conn,$row['full_name']);
		$SubmitterDob = mysqli_real_escape_string($conn,$row['dob']);
		$SubmitterGender = mysqli_real_escape_string($conn,$row['gender']);
		$SubmitterNrc = mysqli_real_escape_string($conn,$row['nrc_number']);
		$SubmitterCountry = mysqli_real_escape_string($conn,$row['country']);
		$formStatus = mysqli_real_escape_string($conn,$row['status']);
		$SubmitterEmail = mysqli_real_escape_string($conn,$row['email']);
		$SubmitterpHONEnUMBER = mysqli_real_escape_string($conn,$row['phone_number']);
		$SubmitterAddress = mysqli_real_escape_string($conn,$row['address']);
         $SubmitterCity = mysqli_real_escape_string($conn,$row['city']);
         $SubmitterStudyMode = mysqli_real_escape_string($conn,$row['study_mode']);
          $SubmitterScriptFile = mysqli_real_escape_string($conn,$row['results_file']);
        $SubmitterPaymentFile = mysqli_real_escape_string($conn,$row['payment_file']); 
          //changing statuses

             if ($formStatus == 'rejected') {
             	$txtColor = 'danger';
             }
             elseif ($formStatus == 'approved') {
             	$txtColor = 'success';
             }
             else{

             	$txtColor = 'warning';
             }


//Getting course Name by id
          $sql = mysqli_query($conn, "SELECT * FROM programmes where id='$ProgrammeId'");
          $rowProgramme = mysqli_fetch_assoc($sql);
          $ProgrammeName = mysqli_real_escape_string($conn, $rowProgramme['name']);

		echo ' <title>'.$NameOfSubmitter.' \'s Admission form #'.$FormId.' | '.$site_name.'</title>';
	echo
	'
	 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>View Admission </li>
            </ol>
	 <div class="login-clean">
    <form method="post" style="width: 100%;max-width: 100%;">
        <h2 class="text-center border rounded-circle border-dark">'.$NameOfSubmitter.'</h2>
        
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    <h6 class="text-dark">Date Of Birth: '.$SubmitterDob.'</h6>
                    <h6 class="text-dark">Age: 19</h6>
                    <h6 class="text-dark">SEX: '.$SubmitterGender.'</h6>
                    <h6 class="text-dark">NRC NO.: '.$SubmitterNrc.'</h6>
                    
                    <h6 class="text-dark">Application Status: <strong class="text-'.$txtColor.' border rounded-0" style="color: rgb(200,165,61);">'.$formStatus.'</strong></h6>
                </div>
            </div>
        </div>
        <h4 class="text-center text-dark border rounded" style="color: rgb(224,97,25);background-color: #a3cdff;">Contact details</h4>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    <h6>Email: '.$SubmitterEmail.'</h6>
                </div>
                <div class="col-md-6">
                    <h6>Phone NO.: '.$SubmitterpHONEnUMBER.'</h6>
                </div>
                <div class="col-md-6">
                    <h6>Adress: '.$SubmitterAddress.'</h6>
                    <h6>City/Town: '.$SubmitterCity.'<br /></h6>
                </div>
                <div class="col-md-6">
                    <h6><h6 class="text-dark">Country: '.$SubmitterCountry.'</h6></h6>
                </div>
            </div>
            <h4 class="text-center text-black-50 border rounded" style="color: rgb(224,97,25);background-color: #a3cdff;">Applied Programme Details</h4>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    <h6>Programme: '.$ProgrammeName.'</h6>
                </div>
                <div class="col-md-6">
                    <h6>Study Mode: '.$SubmitterStudyMode.'</h6>
                </div>
                
            </div>
            
             
              <h4 class="text-center text-black-50 border rounded" style="color: rgb(224,97,25);background-color: #a3cdff;">Payment info.</h4>
            <p></p>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Payment proof</h6>
                    
                    
                    ';
                    
                    $path_parts = pathinfo('../uploads/admissions/payments/'.$SubmitterPaymentFile.'');
                    if($path_parts['extension'] == 'pdf'){
                        
                        echo '<p><a class="btn btn-primary" href="../uploads/admissions/payments/'.$SubmitterPaymentFile.'">View file</a></p>';
                    }else{
                        echo '<p class="card-text"><img class="img-fluid" src="../uploads/admissions/payments/'.$SubmitterPaymentFile.'" />';
                    }
                    
                    echo '
                    
                    </p>
                </div>
            </div>
            
        </div>
            
            <h4 class="text-center text-black-50 border rounded" style="color: rgb(224,97,25);background-color: #a3cdff;">Results info.</h4>
            <p></p>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Script file</h6>
                    <p class="card-text"><img class="img-fluid" src="../uploads/admissions/'.$SubmitterScriptFile.'" /></p>
                </div>
            </div>
            <h4 class="text-center" style="color: rgb(224,97,25);background-color: #e6e6e6;margin-top: 29px;"><button class="btn bg-danger border rounded-circle shadow" name="reject_btn" type="submit" style="color: rgb(246,250,255);">Reject form</button><button class="btn btn-info border rounded-circle" type="submit" name="accept_btn">Approve form</button></h4>
        </div>
    </form>
</div>  <link/>

	';

}





}
else{

	echo '<h4 class="text-danger bg-primary">The requested Application form was not found!</h4>';
}


//Submitting form values

if (isset($_POST['accept_btn'])) {
	$sql = mysqli_query($conn, "UPDATE admission SET status='approved' WHERE id='$UrlId'");
	
  //Sending email
  include'../../functions/emailtemplates.php';
  $Template = new mailTemplate();
  $fullDescription = 'We are here to inform you that you have been approved by the admissions of '.$site_name.'. We are now looking forward to see you on our campus.';
  $Admissiontemplate = $Template->admissionTemplate($site_fULLname, $NameOfSubmitter, $fullDescription);
  
  Mail::sendMail('Your admission form has been approved successfully', $Admissiontemplate, $SubmitterEmail);
	echo '<script>alert("You have approved the form successfully, the submitter will be notified on the email address!");
window.location.href = "../approved_admissions.php";


    </script>';
  
}
else{

	if (isset($_POST['reject_btn'])) {
$sql = mysqli_query($conn, "UPDATE admission SET status='rejected' WHERE id='$UrlId'");
  //Sending email
  include'../../functions/emailtemplates.php';
  $Template = new mailTemplate();
  $fullDescription = 'We are here to inform you that your admission form has been rejected by our admissions of '.$site_name.'. This mostly happens due to lack of qualifications.';
  $Admissiontemplate = $Template->admissionTemplate($site_fULLname, $NameOfSubmitter, $fullDescription);
  
  Mail::sendMail('Admission form rejected', $Admissiontemplate, $SubmitterEmail);
	echo '<script>alert("Form rejected successfully, the submitter will be notified on the email address!");
window.location.href = "../rejected_admissions.php";

	</script>';
}
}
//ending form submittion


}
else{

	echo "Error!";
}

       ?>
       <!--//content-inner-->
		<?php

include_once '../inc/admin_sidebar.php';
		?>

<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
</body>

<?php


?>