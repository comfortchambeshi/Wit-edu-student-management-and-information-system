<?php

class footer extends db{
public function logged_footer(){
$sql = "SELECT * FROM site_info";
        $stmt = $this->connect()->query($sql);

        $row = $stmt->fetch();

$site_name = $row['name'];
$site_phone1 = $row['phone'];
$site_phone2 = $row['phone2'];
$site_url = $row['url'];
$site_email = $row['email'];
$site_directory = $row['site_directory'];
$site_aboutUs = $row['about_us'];
$site_motto = $row['motto'];
$site_fullName = $row['full_name'];

echo '


';

echo '
<div class="footer-dark text-center" style="background:linear-gradient(90deg,rgba(255,255,255,.1) 0,rgba(255,255,255,.1) 100%),url(../img/bg-callout.jpg);b" class="col item social" style="margin-top:10px;">
                    <h1 style="font-size:1rem;">Quarterly Newsletter</h1><input class="form-control-lg" type="email" style="width:150px;height:40px;margin-left:-3px;margin-bottom:11px;margin-top:30px;" value="Your email"><button class="btn btn-primary" style="width:111px;height:40px;margin-top:-8px;"
                        type="button">SUBSCRIBE</button></div>
<div style="background-color:rgb(29,128,159);"  class="footer-dark">

        <div style="text-align:center;">
            <h2 class="divider-style" style="margin-top:0px;"><span style="background-color:rgb(40, 45, 50);"><a href="#"><i class="fa fa-globe"></i></a>&nbsp;'. $site_fullName.'</span></h2>
        </div>
        
        <footer>
            <div class="container">
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-6 item text" style="margin-bottom:0px;">
                        
                        
                       
                        <p class="text-white">Email: '.$site_email.'</p>
                        <p class="text-white">Phone1: '.$site_phone1.'</p>
                        <p class="text-white">Phone2: '.$site_phone2.'</p>
                        <hr>
                        Motto:<h6class="text-white"><i> '.$site_motto.'</i></h6>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3 class="text-white">Info</h3>
                        <ul>
                    
                    <li><a href="contact_us.php">Contact us</a></li>
                            
                            
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3 class="text-white">Services</h3>
                        <ul>
                    <li><a href="form.php">Online Application</a></li>
                           
                        </ul>
                    </div>
                </div>
                
                
                <div class="col item social" style="margin-top:15px;"><a href="https://web.facebook.com/mamoceorg/#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-whatsapp"></i></a></div>
                <div style="text-align:center;margin-top:-40px;">
                    <h2 class="divider-style"></h2>
                </div>
            </div>
        </footer>
        <footer style="margin-bottom:-50px;" class="footer" style="padding: 0px;">
            <div class="copy-right_text">
                <div class="container-fluid">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                        <p class="text-center">Copyright 2020. All Rights Reserved</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>



';



}





}



?>