


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>

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
   <?php
include 'functions/parent_header.php';
include 'inc/parent_login_function.php';
include 'inc/dbconnect.inc.php';
include 'inc/parent_mains.php';
echo '<title>My Messages | '.$site_name.'</title>';


$userid =  parent_Login::isLoggedIn();
$logged_header = '';

$logged_header = header1($logged_header);

         


         echo '
         <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Inbox</li>
     </ol>
<div class="inbox-mail">
<div class="col-md-4 compose w3layouts">
 
     <button type="button" class="btn  btn-block btn-primary"data-toggle="modal" data-target=".bd-example-modal-lg" >Compose</button>

<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="search.php" method="POST">
     <div class="alert alert-success" role="alert"><span>Search a person where to send your message to</span>
         <div class="input-group">
             <div class="input-group-prepend"></div><input name="search_text" class="form-control" type="text" placeholder="Student, Teacher, Accountant or Admin name">
             <div class="input-group-append"><button class="btn btn-primary" type="submit" name="msgsearch_button">Search!</button></div>
         </div>
     </div>
 </form>
</div>
</div>
</div>
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true"><i class="fa fa-inbox"></i>Inbox <span>'.$MsgCounter.'</span><div class="clearfix"></div></a></li>
          <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false"><i class="fa fa-paper-plane-o"></i>Sent</a></li>
         
                                      
		</ul>
	</nav>
		
</div>
<!-- tab content -->
<div class="col-md-8 tab-content tab-content-in w3">
<div class="tab-pane text-style active" id="tab1">
  <div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
			     <div class="float-left">
			       <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Forums</a></li>
                                        <li><a href="#">Updates</a></li>
                                       
                                        <li><a href="#">Spam</a></li>
                                        <li><a href="#">Trash</a></li>
                                       
                                        <li><a href="#">New</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Family</a></li>
                                        <li><a href="#">Social</a></li>
                                       
                                        <li><a href="#">Primary</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>
                            </div>
			        
			        
			    </div>
			    <div class="float-right">
<div class="dropdown">
			            <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
			                <i class="fa fa-cog icon_8"></i>
			                <i class="fa fa-chevron-down icon_8"></i>
			            <div class="ripple-wrapper"></div></a>
			            <ul class="dropdown-menu float-right">
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-pencil-square-o icon_9"></i>
			                        Edit
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-calendar icon_9"></i>
			                        Schedule
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-download icon_9"></i>
			                        Download
			                    </a>
			                </li>
			               
			                <li>
			                    <a href="#" class="font-red" title="">
			                        <i class="fa fa-times" icon_9=""></i>
			                        Delete
			                    </a>
			                </li>
			            </ul>
			        </div>
                            
                            <div class="btn-group">
                                <a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                                <a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        
			        
			    </div>
				
               </div>
                <table class="table">
                    <tbody>
                        
                       
                        ';
                   //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='parent'  limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);
         if ($MsgCounter > 0) {
         	while ($RowMsg = mysqli_fetch_assoc($RunMsg)) {
         		$messageTitle = mysqli_real_escape_string($conn, $RowMsg['msg_title']);
         		$messageBody = mysqli_real_escape_string($conn, $RowMsg['body']);
         		$messageDate = mysqli_real_escape_string($conn, $RowMsg['datestatus']);
         		$messageId = mysqli_real_escape_string($conn, $RowMsg['id']);
         		
         	echo '
						<a href="acc_read_msg.php?id='.$messageId.'"><tr class="table-row">
                            <a href="acc_read_msg.php?id='.$messageId.'"><td class="table-img">
                               <a href="acc_read_msg.php"> <p><img style="width:65px;" src="images/profile/g2.jpg" alt=""></a>
                            </td></a>
                            <td class="table-text">
                            	<a href="acc_read_msg.php?id='.$messageId.'"><h6> '.$messageTitle.'</h6></a>
                               <a href="acc_read_msg.php?id='.$messageId.'"> <p>'.$messageBody.'</p></a>
                            </td>
                           <a href="acc_read_msg.php">  <td>
                            	<a href="acc_read_msg.php?id='.$messageId.'"> <p><span class="ur">urgent</span></a>
                            </td></a>
                            <td class="march">
                             <a href="acc_read_msg.php?id='.$messageId.'">    '.$messageDate.' </a>
                            </td>
                          
                             <td>
                              <a href="acc_read_msg.php">  <i class="fa fa-star-half-o icon-state-warning"></i></a>
                            </td>
                        </tr></a>';


                    }

                    }
                    else
                    {
                    	echo '<h4> You have no messages</h4>';
                    }
         
                        



                        echo'
                    </tbody>
                </table>
               </div>
            </div>
</div>
<div class="tab-pane text-style" id="tab2">
	<div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
			     <div class="float-left">
			       <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Forums</a></li>
                                        <li><a href="#">Updates</a></li>
                                       
                                        <li><a href="#">Spam</a></li>
                                        <li><a href="#">Trash</a></li>
                                       
                                        <li><a href="#">New</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Family</a></li>
                                        <li><a href="#">Social</a></li>
                                       
                                        <li><a href="#">Primary</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>
                            </div>
			        
			        
			    </div>
			    <div class="float-right">
<div class="dropdown">
			            <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
			                <i class="fa fa-cog icon_8"></i>
			                <i class="fa fa-chevron-down icon_8"></i>
			            <div class="ripple-wrapper"></div></a>
			            <ul class="dropdown-menu float-right">
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-pencil-square-o icon_9"></i>
			                        Edit
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-calendar icon_9"></i>
			                        Schedule
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-download icon_9"></i>
			                        Download
			                    </a>
			                </li>
			               
			                <li>
			                    <a href="#" class="font-red" title="">
			                        <i class="fa fa-times" icon_9=""></i>
			                        Delete
			                    </a>
			                </li>
			            </ul>
			        </div>
                            
                            <div class="btn-group">
                                <a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                                <a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        
			        
			    </div>
				
               </div>
                <table class="table">
                    <tbody>';
                    
                      //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE msg_from='$user_id' AND from_type='parent' limit 10");
          $MsgCounter = mysqli_num_rows($RunMsg);
         if ($MsgCounter > 0) {
         	while ($RowMsg = mysqli_fetch_assoc($RunMsg)) {
                 $messageId = mysqli_real_escape_string($conn, $RowMsg['id']);
         		$messageTitle = mysqli_real_escape_string($conn, $RowMsg['msg_title']);
         		$messageBody = mysqli_real_escape_string($conn, $RowMsg['body']);
         		$messageDate = mysqli_real_escape_string($conn, $RowMsg['datestatus']);
         		
         	echo '
						<a href="acc_read_msg.php?id='.$messageId.'"><tr class="table-row">
                            <a href="acc_read_msg.php?id='.$messageId.'"><td class="table-img">
                               <a href="acc_read_msg.php"> <p><img style="width:65px;" src="images/profile/g2.jpg" alt=""></a>
                            </td></a>
                            <td class="table-text">
                            	<a href="acc_read_msg.php?id='.$messageId.'"><h6> '.$messageTitle.'</h6></a>
                               <a href="acc_read_msg.php?id='.$messageId.'"> <p>'.$messageBody.'</p></a>
                            </td>
                           <a href="acc_read_msg.php">  <td>
                            	<a href="acc_read_msg.php?id='.$messageId.'"> <p><span class="ur">urgent</span></a>
                            </td></a>
                            <td class="march">
                             <a href="acc_read_msg.php?id='.$messageId.'">    '.$messageDate.' </a>
                            </td>
                          
                             <td>
                              <a href="acc_read_msg.php">  <i class="fa fa-star-half-o icon-state-warning"></i></a>
                            </td>
                        </tr></a>';


                    }

                    }
                    else
                    {
                    	echo '<h4> You have no sent messages</h4>';
                    }

                    echo '
                      
                    </tbody>
                </table>
               </div>
            </div>
</div>
<div class="tab-pane text-style" id="tab3">
	<div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
			     <div class="float-left">
			       <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Forums</a></li>
                                        <li><a href="#">Updates</a></li>
                                       
                                        <li><a href="#">Spam</a></li>
                                        <li><a href="#">Trash</a></li>
                                       
                                        <li><a href="#">New</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Family</a></li>
                                        <li><a href="#">Social</a></li>
                                       
                                        <li><a href="#">Primary</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>
                            </div>
			        
			        
			    </div>
			    <div class="float-right">
<div class="dropdown">
			            <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
			                <i class="fa fa-cog icon_8"></i>
			                <i class="fa fa-chevron-down icon_8"></i>
			            <div class="ripple-wrapper"></div></a>
			            <ul class="dropdown-menu float-right">
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-pencil-square-o icon_9"></i>
			                        Edit
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-calendar icon_9"></i>
			                        Schedule
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-download icon_9"></i>
			                        Download
			                    </a>
			                </li>
			               
			                <li>
			                    <a href="#" class="font-red" title="">
			                        <i class="fa fa-times" icon_9=""></i>
			                        Delete
			                    </a>
			                </li>
			            </ul>
			        </div>
                            
                            <div class="btn-group">
                                <a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                                <a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        
			        
			    </div>
				
               </div>
                <table class="table">
                    <tbody>
                        
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in6.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="fam">Family</span>
                            </td>
                            <td class="march">
                               in 2 days  
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in7.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="ur">urgent</span>
                            </td>
                            <td class="march">
                                in 2 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
						<tr class="table-row">
                            <td class="table-img">
                               <img src="images/in8.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            
                            </td>
                            <td class="march">
                                in 2 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
						<tr class="table-row">
                            <td class="table-img">
                               <img src="images/in9.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	
                            </td>
                            <td class="march">
                                in 2 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
						<tr class="table-row">
                            <td class="table-img">
                               <img src="images/in10.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="mar">Market</span>
                            </td>
                            <td class="march">
                                in 1 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
						<tr class="table-row">
                            <td class="table-img">
                               <img src="images/in11.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="ur">urgent</span>
                            </td>
                            <td class="march">
                                in 1 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
               </div>
            </div>
 </div>
  <div class="tab-pane text-style" id="tab4">
  <div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
			     <div class="float-left">
			       <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Forums</a></li>
                                        <li><a href="#">Updates</a></li>
                                       
                                        <li><a href="#">Spam</a></li>
                                        <li><a href="#">Trash</a></li>
                                       
                                        <li><a href="#">New</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Family</a></li>
                                        <li><a href="#">Social</a></li>
                                       
                                        <li><a href="#">Primary</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>
                            </div>
			        
			        
			    </div>
			    <div class="float-right">
<div class="dropdown">
			            <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
			                <i class="fa fa-cog icon_8"></i>
			                <i class="fa fa-chevron-down icon_8"></i>
			            <div class="ripple-wrapper"></div></a>
			            <ul class="dropdown-menu float-right">
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-pencil-square-o icon_9"></i>
			                        Edit
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-calendar icon_9"></i>
			                        Schedule
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-download icon_9"></i>
			                        Download
			                    </a>
			                </li>
			               
			                <li>
			                    <a href="#" class="font-red" title="">
			                        <i class="fa fa-times" icon_9=""></i>
			                        Delete
			                    </a>
			                </li>
			            </ul>
			        </div>
                            
                            <div class="btn-group">
                                <a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                                <a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        
			        
			    </div>
				
               </div>
                <table class="table">
                    <tbody>
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="fam">Family</span>
                            </td>
                            <td class="march">
                               in 5 days 
                            </td>
                          
                             <td>
							 <i class="fa fa-star-half-o icon-state-warning"></i>
                                
                            </td>
                        </tr>
                       <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in1.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="mar">Market</span>
                            </td>
                            <td class="march">
                                in 5 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in2.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="work">work</span>
                            </td>
                            <td class="march">
                                in 5 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in3.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="fam">Family</span>
                            </td>
                            <td class="march">
                              in 4 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in4.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="ur">urgent</span>
                            </td>
                            <td class="march">
                                in 4 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in5.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	
                            </td>
                            <td class="march">
                                in 3 days  
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                
                    </tbody>
                </table>
               </div>
            </div>
  </div>
  <div class="tab-pane text-style" id="tab5">
  	<div class="inbox-right">
         	
            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
			     <div class="float-left">
			       <div class="btn-group m-r-sm mail-hidden-options" style="display: inline-block;">
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Forums</a></li>
                                        <li><a href="#">Updates</a></li>
                                       
                                        <li><a href="#">Spam</a></li>
                                        <li><a href="#">Trash</a></li>
                                       
                                        <li><a href="#">New</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Work</a></li>
                                        <li><a href="#">Family</a></li>
                                        <li><a href="#">Social</a></li>
                                       
                                        <li><a href="#">Primary</a></li>
                                        <li><a href="#">Promotions</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>
                            </div>
			        
			        
			    </div>
			    <div class="float-right">
<div class="dropdown">
			            <a href="#" title="" class="btn btn-default" data-toggle="dropdown" aria-expanded="false">
			                <i class="fa fa-cog icon_8"></i>
			                <i class="fa fa-chevron-down icon_8"></i>
			            <div class="ripple-wrapper"></div></a>
			            <ul class="dropdown-menu float-right">
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-pencil-square-o icon_9"></i>
			                        Edit
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-calendar icon_9"></i>
			                        Schedule
			                    </a>
			                </li>
			                <li>
			                    <a href="#" title="">
			                        <i class="fa fa-download icon_9"></i>
			                        Download
			                    </a>
			                </li>
			               
			                <li>
			                    <a href="#" class="font-red" title="">
			                        <i class="fa fa-times" icon_9=""></i>
			                        Delete
			                    </a>
			                </li>
			            </ul>
			        </div>
                            
                            <div class="btn-group">
                                <a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                                <a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        
			        
			    </div>
				
               </div>
                <table class="table">
                    <tbody>
                       
                       <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in1.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="mar">Market</span>
                            </td>
                            <td class="march">
                                in 5 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                       
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in3.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="fam">Family</span>
                            </td>
                            <td class="march">
                              in 4 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                       
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in5.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	
                            </td>
                            <td class="march">
                                in 3 days  
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                       
                        <tr class="table-row">
                            <td class="table-img">
                               <img src="images/in7.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="ur">urgent</span>
                            </td>
                            <td class="march">
                                in 2 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
						
						<tr class="table-row">
                            <td class="table-img">
                               <img src="images/in10.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="mar">Market</span>
                            </td>
                            <td class="march">
                                in 1 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
						<tr class="table-row">
                            <td class="table-img">
                               <img src="images/in11.jpg" alt="">
                            </td>
                            <td class="table-text">
                            	<h6> Lorem ipsum</h6>
                                <p>Nullam quis risus eget urna mollis ornare vel eu leo</p>
                            </td>
                            <td>
                            	<span class="ur">urgent</span>
                            </td>
                            <td class="march">
                                in 1 days 
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
               </div>
            </div>
</div>
</div>';

?>
<div class="clearfix"> </div>
   </div>
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
	 <?php

$date = date('y');
echo ' <p>© 20'.$date.' '.$site_name.'. All Rights Reserved | Developed by  <a href="https://fourskilllevels.com">Fourskilllevels</a></p>';
    ?>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<?php

include 'inc/parent_sidebar.php';

			?>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>