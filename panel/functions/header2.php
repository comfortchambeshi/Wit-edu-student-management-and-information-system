

<?php

function header1($logged_header)
{    
   


    
   
     
    
    //include './inc/login_function.php';

  



  // include($_SERVER['DOCUMENT_ROOT'].'/inc/login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/dbconnect.inc.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/staff_login.php');


//geting site info
$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);
$userid =  Login::isLoggedIn();

//ending info

if (Login::isLoggedIn()) {

echo '
 <!--/content-inner-->

       <div class="mother-grid-inner">
             <!--header start here-->
                <div class="header-main">
                    <div class="logo-w3-agile">
                                <h1><a href="index.php">'.$site_name.'</a></h1>
                            </div>
                    <div class="w3layouts-left">
                            
                            <!--search-box-->
                                <div class="w3-search-box">
                                    <form action="#" method="post">
                                        <input type="text" placeholder="Search..." required=""> 
                                        <input type="submit" value="">                  
                                    </form>
                                </div><!--//end-search-box-->
                            <div class="clearfix"> </div>
                         </div>
                         
                      ';



if (Login::isLoggedIn()) {

    $userid =  Login::isLoggedIn();

        $username = "SELECT * FROM students WHERE system_id='$userid'";
        $result = mysqli_query($conn, $username);
        $row = mysqli_fetch_assoc($result);

        


        $user_id = $row['system_id'];
        
        $user_name = mysqli_real_escape_string($conn,  $row['student_name']);
        $user_image = mysqli_real_escape_string($conn, $row['profile_pic']);
        //gettig messages 
          $RunMsg = mysqli_query($conn, "SELECT * FROM messages WHERE sent_to='$user_id' AND to_type='student' AND read_or_unread='unread' limit 8");
          $MsgCounter = mysqli_num_rows($RunMsg);
          //getting unread alerts
         $GettingLoggedInAlerts = mysqli_query($conn, "SELECT * FROM user_alerts where alert_to=$user_id AND   alert_totype='student' AND read_or_unread='unread'");
  $countingUnreadAlerts =  mysqli_num_rows($GettingLoggedInAlerts);
 



       // $user_rank = mysqli_real_escape_string($conn, $row['u_rank']);
        //$user_email = mysqli_real_escape_string($conn, $row['email']);

    }
    else{
        header("Location: ../../login.php?sout=success");

    }
   
    
        





                        
                         echo '
                         <div class="w3layouts-right">
                            <div class="profile_details_left"><!--notifications of menu start -->
                                <ul class="nofitications-dropdown">
                                    <li class="dropdown head-dpdn">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">'.$MsgCounter.'</span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>You have '.$MsgCounter.' new messages</h3>
                                                </div>
                                            </li>
                                            ';

                                        while ($rowMsgs = mysqli_fetch_assoc($RunMsg)) {
                                            $MsgName = mysqli_real_escape_string($conn, $rowMsgs['msg_title']);
                                            $MsgDate = mysqli_real_escape_string($conn, $rowMsgs['date']);
                                                echo '
                                            <li><a href="#">
                                               <div class="user_img"><img src="images/in9.jpg" alt=""></div>
                                               <div class="notification_desc">
                                                <p>'.$MsgName.'</p>
                                                <p><span>'.$MsgDate.'</span></p>
                                                </div>
                                               <div class="clearfix"></div> 
                                            </a></li>


                                            ';
                                        }
echo '
                                            
                                            <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all messages</a>
                                                </div> 
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown head-dpdn">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">'.$countingUnreadAlerts.'</span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="notification_header">
                                                    <h3>You have '.$countingUnreadAlerts.' new notification</h3>
                                                </div>
                                            </li>
                                            
                                             ';
                                               if ($countingUnreadAlerts < 1) {
                                                echo "You do not have any unread notifications yet!";
                                               }else{
                                              while ($RowAlerts = mysqli_fetch_assoc($GettingLoggedInAlerts) ){
                                             echo '
                                             <li><a href="#">
                                                <div class="user_img"><img src="images/in7.jpg" alt=""></div>
                                               <div class="notification_desc">
                                                <p>Lorem ipsum dolor</p>
                                                <p><span>1 hour ago</span></p>
                                                </div>
                                               <div class="clearfix"></div> 
                                             </a></li>

                                            ';

                                        }

                                        }


                                            echo '
                                             <li>
                                                <div class="notification_bottom">
                                                    <a href="#">See all notifications</a>
                                                </div> 
                                            </li>
                                        </ul>
                                    </li>   
                                      
                                    <div class="clearfix"> </div>
                                </ul>
                                <div class="clearfix"> </div>
                            </div>
                            <!--notification menu end -->
                            
                            <div class="clearfix"> </div>               
                        </div>
                        <div class="profile_details w3l">       
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">   
                                                <span class="prfil-img"><img src="images/in4.jpg" alt=""> </span> 
                                                <div class="user-name">
                                                    <p>'.$user_name.'</p>
                                                    <span>Student</span>
                                                </div>
                                                <i class="fa fa-angle-down"></i>
                                                <i class="fa fa-angle-up"></i>
                                                <div class="clearfix"></div>    
                                            </div>  
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                            <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                                           <form method="post" action="inc/sout.inc.php"> <li> <button class="btn-block btn-danger" name="confirm" type="submit" ><i class="fa fa-sign-out"></i> Logout</button> </li></form>
                                        </ul>
                                    </li>
                                </ul>
                            </div>';

                            echo '
                            
                     <div class="clearfix"> </div>  
                </div>
<!--heder end here-->


          ';
}else{

    header("Location: ../login.php?sout=success");

      }
}

    



?>