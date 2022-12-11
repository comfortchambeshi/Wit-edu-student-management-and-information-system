<?php
include '../inc/auto-loader.php';
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';


$logged_header = '';

$logged_header = header1($logged_header);




include 'inc/admin_sidebar.php';

?>
<hr>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- jQuery -->
<!-- //jQuery -->

 
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
 
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <style type="text/css">
            @import url("http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic");
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
    body {
		padding: 0px 0px;
		background-color: rgb(220, 220, 220);
	}
    
    .event-list {
		list-style: none;
		font-family: 'Lato', sans-serif;
		margin: 0px;
		padding: 0px;
	}
	.event-list > li {
		background-color: rgb(255, 255, 255);
		box-shadow: 0px 0px 5px rgb(51, 51, 51);
		box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
		padding: 0px;
		margin: 0px 0px 20px;
	}
	.event-list > li > time {
		display: inline-block;
		width: 100%;
		color: rgb(255, 255, 255);
		background-color: rgb(197, 44, 102);
		padding: 5px;
		text-align: center;
		text-transform: uppercase;
	}
	.event-list > li:nth-child(even) > time {
		background-color: rgb(165, 82, 167);
	}
	.event-list > li > time > span {
		display: none;
	}
	.event-list > li > time > .day {
		display: block;
		font-size: 56pt;
		font-weight: 100;
		line-height: 1;
	}
	.event-list > li time > .month {
		display: block;
		font-size: 24pt;
		font-weight: 900;
		line-height: 1;
	}
	.event-list > li > img {
		width: 100%;
	}
	.event-list > li > .info {
		padding-top: 0px;
		text-align: center;
	}
	.event-list > li > .info > .title {
		font-size: 17pt;
		font-weight: 700;
		margin: 0px;
	}
	.event-list > li > .info > .desc {
		font-size: 13pt;
		font-weight: 300;
		margin: 0px;
	}
	.event-list > li > .info > ul,
	.event-list > li > .social > ul {
		display: table;
		list-style: none;
		margin: 10px 0px 0px;
		padding: 0px;
		width: 100%;
		text-align: center;
	}
	.event-list > li > .social > ul {
		margin: 0px;
	}
	.event-list > li > .info > ul > li,
	.event-list > li > .social > ul > li {
		display: table-cell;
		cursor: pointer;
		color: rgb(30, 30, 30);
		font-size: 11pt;
		font-weight: 300;
        padding: 3px 0px;
	}
    .event-list > li > .info > ul > li > a {
		display: block;
		width: 100%;
		color: rgb(30, 30, 30);
		text-decoration: none;
	} 
    .event-list > li > .social > ul > li {    
        padding: 0px;
    }
    .event-list > li > .social > ul > li > a {
        padding: 3px 0px;
	} 
	.event-list > li > .info > ul > li:hover,
	.event-list > li > .social > ul > li:hover {
		color: rgb(30, 30, 30);
		background-color: rgb(200, 200, 200);
	}
	.facebook a,
	.twitter a,
	.google-plus a {
		display: block;
		width: 100%;
		color: rgb(75, 110, 168) !important;
	}
	.twitter a {
		color: rgb(79, 213, 248) !important;
	}
	.google-plus a {
		color: rgb(221, 75, 57) !important;
	}
	.facebook:hover a {
		color: rgb(255, 255, 255) !important;
		background-color: rgb(75, 110, 168) !important;
	}
	.twitter:hover a {
		color: rgb(255, 255, 255) !important;
		background-color: rgb(79, 213, 248) !important;
	}
	.google-plus:hover a {
		color: rgb(255, 255, 255) !important;
		background-color: rgb(221, 75, 57) !important;
	}

	@media (min-width: 768px) {
		.event-list > li {
			position: relative;
			display: block;
			width: 100%;
			height: 120px;
			padding: 0px;
		}
		.event-list > li > time,
		.event-list > li > img  {
			display: inline-block;
		}
		.event-list > li > time,
		.event-list > li > img {
			width: 120px;
			float: left;
		}
		.event-list > li > .info {
			background-color: rgb(245, 245, 245);
			overflow: hidden;
		}
		.event-list > li > time,
		.event-list > li > img {
			width: 120px;
			height: 120px;
			padding: 0px;
			margin: 0px;
		}
		.event-list > li > .info {
			position: relative;
			height: 120px;
			text-align: left;
			padding-right: 40px;
		}	
		.event-list > li > .info > .title, 
		.event-list > li > .info > .desc {
			padding: 0px 10px;
		}
		.event-list > li > .info > ul {
			position: absolute;
			left: 0px;
			bottom: 0px;
		}
		.event-list > li > .social {
			position: absolute;
			top: 0px;
			right: 0px;
			display: block;
			width: 40px;
		}
        .event-list > li > .social > ul {
            border-left: 1px solid rgb(230, 230, 230);
        }
		.event-list > li > .social > ul > li {			
			display: block;
            padding: 0px;
		}
		.event-list > li > .social > ul > li > a {
			display: block;
			width: 40px;
			padding: 10px 0px 9px;
		}
	}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
	<h1 class="text-center">
		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Post an Event
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="inc/event_post.php" style="width: 100%;max-width: 100%;height: 100%;">
    <h2 class="sr-only">Login Form</h2>
    <h3  class="text-left bg-info">Event Title</h3>
    <div class="form-group"><input type="text" required="" class="form-control" name="event_title" placeholder="Event title" /></div>
<h3  class="text-left bg-info">Event two lines description</h3>
    <div class="form-group"><textarea type="text" required="" class="form-control" name="event_description" placeholder="Event title" >  </textarea></div>


    <div class="form-group">
        <h3  class="text-left bg-info">Event date</h3><input required="" name="event_date" class="form-control" type="date" /></div>

         <div class="form-group">
        <h3  class="text-left bg-info">Event Venue</h3><input required="" name="event_venue" class="form-control" type="text" /></div>

        <div class="form-group">
        <h3  class="text-left bg-info">starting time</h3><input required="" name="starting_time" class="form-control" type="text" /></div>

        <div class="form-group">
        <h3  class="text-left bg-info">Ending time</h3><input required="" name="ending_time" class="form-control" type="text" /></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="event_btn" class="btn btn-primary">Publish</button>
        </form>
      </div>
    </div>
  </div>
</div>
		


	</h1>
	
    <div class="container">
		<div class="row">
			<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				<ul class="event-list">
				<?php
$QueryEvents = mysqli_query($conn, "SELECT * FROM events ORDER BY 1 DESC LIMIT 20");
if (mysqli_num_rows($QueryEvents) > 0) {
	while ($RowEvents = mysqli_fetch_assoc($QueryEvents)) {
		$AddedBy = mysqli_escape_string($conn, $RowEvents['added_by']);
		$EventName = mysqli_real_escape_string($conn, $RowEvents['name']);
		$EventDate =  new DateTime($RowEvents['started']);
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
		<li>
						<time datetime="2014-07-20 0000">
							<span class="day">'.$day.'</span>
							<span class="month">'.$month.'</span>
							<span class="year">2014</span>
							<span class="time">12:00 AM</span>
						</time>
						<div class="info">
							<h2 class="title">'.$EventName.'</h2>
							<p class="desc">'.$EventDescription.'</p>
							<ul>
								<li style="width:50%;"><a href="#website"><span class="fa fa-user"></span> '.$Admin_uname.'</a></li>
								<li style="width:50%;"> </li>
							</ul>
						</div>
						<div class="social">
							<ul>
								<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
								<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
								<li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
							</ul>
						</div>
					</li>
					

		';
	}
}
else{
	echo '<h4>There are currently no events found, please post</h4>';
}

					

					?>

					

					
				</ul>
			</div>
		</div>
	</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>

<?php include 'inc/footer.php';