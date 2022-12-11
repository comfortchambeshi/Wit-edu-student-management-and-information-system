<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Edulearn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Style-Css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Font-Awesome-Icons-Css -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->
	
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
 
    
    <link rel="stylesheet" href="assets/css/Pretty-User-List.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  


    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
	 <?php
    include 'classes/db.php';
include 'inc/auto-loader.php';
$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;
    ?>

	
	</div><hr>

	<?php
if (isset($_GET['id'])) {
	include 'inc/dbconnect.inc.php';
	include 'inc/login_function.php';
	include 'inc/mains.php';
	$NewsId = mysqli_real_escape_string($conn, $_GET['id']);

	$GetNews = mysqli_query($conn, "SELECT * FROM news WHERE id='$NewsId'");

	if (mysqli_num_rows($GetNews) > 0) {
		while($RowNews = mysqli_fetch_assoc($GetNews)){
		$NewsTitle = mysqli_real_escape_string($conn, $RowNews['title']);
		$NewsBody = $RowNews['body'];
		$NewsDate = mysqli_real_escape_string($conn, $RowNews['date']);
		$NewsBy = mysqli_real_escape_string($conn, $RowNews['added_by']);
		$NewsCover = mysqli_real_escape_string($conn, $RowNews['cover_file']);
//Getting admin details
		$GetAdmin = mysqli_query($conn, "SELECT * FROM administrators where id='$NewsBy'");
		$rowAdmins = mysqli_fetch_assoc($GetAdmin);
		$Admin_uname = mysqli_real_escape_string($conn, $rowAdmins['username']);
		$Admin_pic = mysqli_real_escape_string($conn, $rowAdmins['profile_pic']);
		echo 
		'
			
<title>'.$NewsTitle.' | '.$site_name.'</title>

	<!-- single -->
	<div class="single-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">'.$NewsTitle.'
			</h3>
			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-8 single-left">
					<div class="single-left1">
						<img src="panel/images/news/'.$NewsCover.'" alt=" " class="img-fluid" />
						<h6 class="blog-first text-dark text-center my-4">
							<i class="far fa-user mr-2"></i>'.$Admin_uname.'
						</h6>
						<ul class="blog_list my-3 text-center">
							<li>'.$NewsDate.'</li>
							<li class="mx-3">
								<a href="#">
									<i class="far fa-heart mr-1"></i>
									</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-comments mr-1"></i>
									</a>
							</li>
						</ul></ul></li>
						'.$NewsBody.'
						


		';
	}
}
}

	?>

	<!-- //banner -->


						
						
					</div>

					<?php

$GetComments = mysqli_query($conn, "SELECT * FROM news_comments WHERE news_id='NewsId'");
if (mysqli_num_rows($GetComments) > 0) {
	while ($RowComments = mysqli_fetch_assoc($GetComments)) {
		echo 
		'
		<div class="comments my-5">
						<h3 class="blog-title text-dark">Recent Comments</h3>
						<div class="comments-grids mt-4">
							<div class="row comments-grid">
								<div class="col-3 comments-grid-left">
									<img src="images/t1.jpg" alt=" " class="img-thumbnail rounded-circle" />
								</div>
								<div class="col-8 comments-grid-right mt-3">
									<h4>Parker Moe</h4>
									<ul class="my-2">
										<li class="font-weight-bold">6 June 2018
											<i>|</i>
										</li>
										<li>
											<a href="#" class="font-weight-bold">Reply</a>
										</li>
									</ul>
									<p>mattis ut hendrerit non, facilisis eget mauris. Sed ultricies nec purus quis tempor. Phasellus bibendum eu.</p>
								</div>
							</div>
							
							
						</div>
					</div>
		';
	}
}
else{

	echo '<h4>There are no comments on this news!</h4>
	<hr>';
}
					?>
					
					<div class="leave-coment-form">
						<h3 class="blog-title text-dark mb-4">Leave a Reply</h3>
						<form action="#" method="post">
							<div class="row">
								<div class="col-sm-6 form-group">
									<input type="text" name="Name" class="form-control" placeholder="Name" required="">
								</div>
								<div class="col-sm-6 form-group">
									<input type="email" name="Email" class="form-control" placeholder="Email" required="">
								</div>
							</div>
							<div class="form-group">
								<textarea name="Message" class="form-control" placeholder="Your comment here..." required=""></textarea>
							</div>
							<div class="mm_single_submit">
								<input type="submit" value="Post Comment">
							</div>
						</form>
					</div>
				</div>
				<!-- //left side -->
				<!-- right side -->
				<div class="col-lg-4 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="search1">
							<form class="form-inline" action="#" method="post">
								<input class="form-control rounded-0 mr-sm-2" type="search" placeholder="Search Here" aria-label="Search" required>
								<button class="btn bg-dark text-white rounded-0 mt-3" type="submit">Search</button>
							</form>
						</div>
						
						<div class="posts p-4 border">
							<h3 class="blog-title text-dark text-center" >Our Events</h3>
							<div class="posts-grids">

								<?php
$QueryEvents = mysqli_query($conn, "SELECT * FROM events ORDER BY 1 DESC LIMIT 20");
if (mysqli_num_rows($QueryEvents) > 0) {
	while ($RowEvents = mysqli_fetch_assoc($QueryEvents)) {
		$AddedBy = mysqli_escape_string($conn, $RowEvents['added_by']);
		$EventName = mysqli_real_escape_string($conn, $RowEvents['name']);
		$EventDate =  new DateTime($RowEvents['started']);

$EventStarting = mysqli_real_escape_string($conn, $RowEvents['starting_time']);
	$EventEnding = mysqli_real_escape_string($conn, $RowEvents['ending_time']);
	$EventVenue = mysqli_real_escape_string($conn, $RowEvents['venue']);

		$year = $EventDate -> format('Y');
$month = $EventDate -> format('m');
$day = $EventDate -> format('d');
		$EventDescription = htmlspecialchars($RowEvents['description']);

		//Getting admin details
		$GetAdmin = mysqli_query($conn, "SELECT * FROM administrators where id='$AddedBy'");
		$rowAdmins = mysqli_fetch_assoc($GetAdmin);
		$Admin_uname = mysqli_real_escape_string($conn, $rowAdmins['username']);
		$Admin_pic = mysqli_real_escape_string($conn, $rowAdmins['profile_pic']);



		echo 
		'
		<div class="row posts-grid mt-4">
									<div class="col-lg-4 col-md-3 col-4 posts-grid-left pr-0">
										
									</div>
									<div class="col-lg-8 col-md-7 col-8 posts-grid-right mt-lg-0 mt-md-5 mt-sm-4">
										<h4>
											'.$EventName.'
										</h4>
										<ul class="wthree_blog_events_list mt-2">
											<li class="mr-2 text-dark">
												<i class="fa fa-calendar mr-2" aria-hidden="true"></i>'.$day.'/'.$month.'/'.$year.'</li>
											<li>
												<i class="fa fa-user" aria-hidden="true"></i>
												<a href="#" class="text-dark ml-2">'.$Admin_uname.'</a>
											</li>
										</ul>
									</div>
								</div>
		';


}}
		?>
								

								
								
								
							</div>
						</div>
						<div class="tags mt-4 p-4 border">
							<h3 class="blog-title text-dark">Recent Tags</h3>
							<ul class="mt-4">
								<?php
                 

                 

                 
                        
                        

                        	
                        

                 ?>
							</ul>
						</div>
					</div>
				</div>
				<!-- //right side -->
			</div>
		</div>
	</div>
	<!-- //blog -->





	<!-- Js files -->
	<!-- JavaScript -->
	

	<!-- //Js files -->


</body>

</html>