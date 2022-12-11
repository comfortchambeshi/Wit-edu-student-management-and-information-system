<?php
include 'mainInfo.php';



class header extends db{
public function logged_header(){
    $sqlSite = "SELECT * FROM site_info";
        $stmtSite = $this->connect()->query($sqlSite);

        $rowSite = $stmtSite->fetch();
            $site_name = $rowSite['name'];
            $site_url = $rowSite['url'];
            $siteFullName = $rowSite['full_name'];
            $site_SmallLogo = $rowSite['small_logo'];
            $site_BigLogo = $rowSite['big_logo'];
            
            
            
            
    //fetch appearances
    $mainInfo = new mainInfo();
    $rowin = $mainInfo->getInfo();

$logged_header_bg = $rowin['logged_header_bg'];
$non_logged_header_bg = $rowin['non_logged_header_bg'];
    
            
            
            
            echo '<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="'.$site_url.'/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/styles.css">
     <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer-1.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer-2.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer-3.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/Dark-Footer.css">
    <link rel="stylesheet" href="'.$site_url.'/assets/css/footer-copyright_bar.css">
</head>';

        
    
    

echo '
<header class="" id="km-header">
    <nav style="background-color: '.$non_logged_header_bg.';" class="navbar navbar-expand-lg p-0 ">
      <div  class="km-navbar-brand text-lg-center">
        <div class="container">
          <button aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarTogglerDemo03" data-toggle="collapse" type="button"><i aria-hidden="true" class="fa fa-bars"></i></button> <a class="navbar-brand" href="'.$site_url.'"><img alt="Main Logo" class="img-fluid" src="'.$site_url.'/panel/uploads/logos/'.$site_BigLogo.'" width="300" height="60"> </a>
          <div class="km-navbar-brand-btn-container">
            <a style="background-color: '.$non_logged_header_bg.';color:gold;" href="login.php">LOGIN</a> 
          </div>
        </div>
      </div>
      <div style="background-color: '.$non_logged_header_bg.';color:gold;" class="km-navbar-menu sticky-top">
        <div class="container">
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav m-auto">
              <li class="nav-item active">
                <a class="nav-link" href="'.$site_url.'/index.php">Home</a>
              </li>
                 <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 About Us
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="#">Office of Principal Tutor</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Directors Office</a>
                  
                </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Programmes
                  </a>
                  <div  class="dropdown-menu" aria-labelledby="navbarDropdown1">
                  ';
                  $sql = "SELECT * FROM programmes ";
        $stmt = $this->connect()->query($sql);

        while ($row = $stmt->fetch()) {
            $name = $row['name'];
            echo '
                        <div  class="dropdown-divider"></div>
                        <a class="dropdown-item" role="presentation" href="#">'.$name.'</a>
                        

';}
echo '              <hr>
                    <a class="dropdown-item class="bg-primary" href="form.php"> <button style="background-color: '.$non_logged_header_bg.';color:gold;" class="btn  btn-block">Apply Online</button></a>
                   
                  </div>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="news.php">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="form.php">Apply Now</a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>



';









}
}



?>