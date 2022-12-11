<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Parent/Guard portal portal | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
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
<body>
   <div class="page-container">
   <!--/content-inner-->
<?php
include 'functions/parent_header.php';
include 'inc/parent_login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/parent_mains.php';

 



$userid =  parent_Login::isLoggedIn();
$logged_header = '';

$logged_header = header1($logged_header);



echo $userid.' 
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>My Students</h3>
								<h4> '.$Total_Students.'  </h4>
								
							</div>
							
						</div>
					</div>
					
				
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>My NRC</h3>
								<h4>'.$nrc_number.'</h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>';

                ?>
<!--//four-grids here-->

<!--photoday-section--> 
            
                        
                        <div class="col-sm-8 wthree-crd">
                            <div class="card">
                                <div class="card-body">
                                    <div class="widget widget-report-table">
                                        <header class="widget-header m-b-15">
                                        </header>
                                        
                                        <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                                            <div class="col-md-12 col-sm-12 col-xs-12 w3layouts-aug">
                                                <h3>Recent Payments</h3>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="widget-body p-15">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>From</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    <?php

                                                    
                                                    
                                                                                                       
                                                      //Querying student by logged in parent
                                                      $QueryStudent = mysqli_query($conn, "SELECT * FROM students WHERE parent_id='$user_id'");
                                                      while ($rowStd = mysqli_fetch_assoc($QueryStudent)) {
                                                          $StdId = mysqli_real_escape_string($conn, $rowStd['system_id']);
                                                        $GetPayments = mysqli_query($conn, "SELECT * FROM payments WHERE payment_by='$StdId'");

                                                        if (mysqli_num_rows($GetPayments)> 0) {
                                                           $RowPayments = mysqli_fetch_assoc($GetPayments);
    
                                                                $PaymentId = mysqli_real_escape_string($conn, $RowPayments['id']);
                                                                $ItemName = mysqli_real_escape_string($conn, $RowPayments['item_name']);
                                                                $Payment_status = mysqli_real_escape_string($conn, $RowPayments['status']);
                                                                $Payment_by = mysqli_real_escape_string($conn, $RowPayments['payment_by']);
                                                                //getting student name
                                                                $username = "SELECT * FROM students WHERE system_id='$Payment_by'";
            $result = mysqli_query($conn, $username);
            $row = mysqli_fetch_assoc($result);
    
            
    
    
            $payer_id = $row['system_id'];
            
            $payer_name = mysqli_real_escape_string($conn,  $row['student_name']);
            $payer_image = mysqli_real_escape_string($conn, $row['profile_pic']);
             $payer_studentid = mysqli_real_escape_string($conn, $row['student_id']);
    
                                                                
                                                                echo '
                                                        <tr>
                                                            <td>'.$PaymentId.'</td>
                                                            <td>'.$ItemName.'</td>
                                                            <td>'.$Payment_status.'</td>
                                                            <td>'.$payer_name.'</td>
                                                            
                                                        </tr>
    
                                                        ';
                                                            
                                                        }
                                                      }
                                                   


                                                    

                                                    echo '
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-4 w3-agileits-crd">
                        
                            <div class="card card-contact-list">
                            <div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3>Messages</h3>
                                </div>
                                <div class="card-body p-b-20">
                                    <div class="list-group">
                                    ';

                                    //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='parent'  limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);
         if ($MsgCounter > 0) {
            while ($RowMsg = mysqli_fetch_assoc($RunMsg)) {
                $messageTitle = mysqli_real_escape_string($conn, $RowMsg['msg_title']);
                $messageBody = mysqli_real_escape_string($conn, $RowMsg['body']);
                $messageDate = mysqli_real_escape_string($conn, $RowMsg['date']);
                $messageId = mysqli_real_escape_string($conn, $RowMsg['id']);
                echo '
                                        <a class="list-group-item media" href="read_msg.php?id='.$messageId.'">
                                             <div class="pull-left">
                                                <img class="lg-item-img" src="images/in1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                    <div class="lg-item-heading">'.$messageTitle.'</div>
                                                    <small class="lg-item-text">lorem@gmail.com</small>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="lg-item-heading">Ceo</div>
                                                </div>
                                            </div>
                                        </a>
                                        ';



                                    }}
                                    else{
                                        echo '<h4><i> You have no messages</i></h4>';
                                    }


                                        echo '
                                       
                                       
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                   
    
          <div class="clearfix"></div>
      </div>';


      ?>
						<div class="clearfix"></div>
                   
	
		  <div class="clearfix"></div>
	  </div>
	  <!--//w3-agileits-pane-->	
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<?php

include 'inc/parent_sidebar.php';

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
</html>