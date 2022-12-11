<?php
include($_SERVER['DOCUMENT_ROOT'].'/classes/db.php');
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';
echo ' <title>Parents list | '.$site_name.'</title>';


$userid =  admin_login::isadminlogged();
$logged_header = '';

$logged_header = header1($logged_header);


?>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head> 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
    background:#eee;    
}
.main-box.no-header {
    padding-top: 20px;
}
.main-box {
    background: #FFFFFF;
    -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
    -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
    box-shadow: 1px 1px 2px 0 #CCCCCC;
    margin-bottom: 16px;
    -webikt-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.table a.table-link.danger {
    color: #e74c3c;
}
.label {
    border-radius: 3px;
    font-size: 0.875em;
    font-weight: 600;
}
.user-list tbody td .user-subhead {
    font-size: 0.875em;
    font-style: italic;
}
.user-list tbody td .user-link {
    display: block;
    font-size: 1.25em;
    padding-top: 3px;
    margin-left: 60px;
}
a {
    color: #3498db;
    outline: none!important;
}
.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
}

.table thead tr th {
    text-transform: uppercase;
    font-size: 0.875em;
}
.table thead tr th {
    border-bottom: 2px solid #e7ebee;
}
.table tbody tr td:first-child {
    font-size: 1.125em;
    font-weight: 300;
}
.table tbody tr td {
    font-size: 0.875em;
    vertical-align: middle;
    border-top: 1px solid #e7ebee;
    padding: 12px 8px;
}
    </style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<hr>

<?php


?>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
             <h4> <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add Parent
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adding a parent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="contact-clean">
        <form method="post" style="width: 100%;max-width: 100%;" enctype="multipart/form-data" action="inc/parent_reg.inc.php">
            <h2 class="text-center">Add Parent</h2>
            <h4 style="background-color: #358cce;color: #ffffff;">Main info</h4>
            <div class="form-group"><input class="form-control" type="text" name="full_name" placeholder="Full name"></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Date of Birth</h6><input name="dob" class="form-control" type="date"></div>
           
            <div class="form-group"><input class="form-control" type="text" name="nrc_number" placeholder="NRC number"></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Gnder</h6><select class="form-control" name="gender"><optgroup label="Choose  gender"><option selected="">Male</option><option >Female</option></optgroup></select></div>
            
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>profile picture</h6><input type="file" name="profile_pic"></div>
            <div class="form-group">
                <h4 style="background-color: #358cce;color: #ffffff;">Contact info</h4><input class="form-control" type="email" name="email" placeholder="Email address"></div>
            <div class="form-group"><input class="form-control" type="text" name="mobile_number" placeholder="Mobile number"></div>
           
                        <div
                            class="form-group">
                            <h4 style="background-color: #358cce;color: #ffffff;">Security</h4><span class="text-danger"><i> The password is auto-generated for security reason!</i> </span></div>

                            
                            
                           
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="reg" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div> </h4>
            <div class="main-box no-header clearfix">

                <div class="main-box-body clearfix">
                    <div class="table-responsive">

                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>User</span></th>
                                <th><span>Added</span></th>
                                <th class="text-center"><span>NRC</span></th>
                                <th><span>Phone number</span></th>
                                <th><span>Gender</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php

                             $Querys = mysqli_query($conn, "SELECT * FROM parents ORDER BY 1 DESC LIMIT 40");
                             if (mysqli_num_rows($Querys) > 0) {
                                while ($RowsList = mysqli_fetch_assoc($Querys)) {
                                    $FullName = mysqli_real_escape_string($conn, $RowsList['full_name']);
                                    $PhoneNumber = mysqli_real_escape_string($conn, $RowsList['phone_number']);
                                    $Id = mysqli_real_escape_string($conn, $RowsList['id']);
                                    $profile_pic = mysqli_real_escape_string($conn, $RowsList['profile_pic']);
                                    $gender = mysqli_real_escape_string($conn, $RowsList['gender']);
                                    $nrc = mysqli_real_escape_string($conn, $RowsList['nrc']);
                                    $RegisteredDate = mysqli_real_escape_string($conn, $RowsList['added_date']);
                                   

                                    
                                   echo 
                                 '
                                 <tr>
                                    <td>
                                        <img src="uploads/parents_profiles/'.$profile_pic.'"" alt="'.$FullName.'">
                                        <a href="#" class="user-link">'.$FullName.'</a>
                                        <span class="user-subhead"></span>
                                    </td>
                                    <td>'.$RegisteredDate.'</td>
                                    <td class="text-center">
                                        <b class="label label-info"><b>'.$nrc.'</></b>
                                    </td>
                                    <td>
                                        <a href="#">'.$PhoneNumber.'</a>
                                    </td>
                                    <td style="width: 20%;">
                                       <h3>'.$gender.'</h3>
                                    </td>
                                </tr>
                                 ';
                                }
                                 
                             }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include 'inc/admin_sidebar.php';

			?>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    
</script>
</body>
</html>