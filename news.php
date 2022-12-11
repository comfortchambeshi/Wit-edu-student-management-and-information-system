<?php
include 'panel/inc/dbconnect.inc.php';
include('classes/db.php');
include 'inc/auto-loader.php';
include 'inc/dbconnect.inc.php';
include 'inc/siteinfo.php';


//Site title
echo '<title>News Feed | '.$site_name.'</title>';

$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;


$Object = new main();
    ?>

    
    <div class="container" style="margin-top: 44px;margin-bottom: 25px;"><div class="blog-home3 py-5">
  <div class="container">
    <!-- Row  -->
    <div class="row justify-content-center">
      <!-- Column -->
      <div class="col-md-8 text-center">
        <h3 class="my-3">Latest News and Blog</h3>
      
      </div>
      <!-- Column -->
      <!-- Column -->
    </div>
    <div class="row mt-4">

      <?php

$GetNews = $Object->all_query_nolimit_param('news', 'limit 20');
    /*$NewsTitle = mysqli_real_escape_string($conn, $RowNews['title']);
       $NewsDate = mysqli_real_escape_string($conn, $RowNews['date']);
    $NewsBody = mysqli_real_escape_string($conn, $RowNews['body']);
    $NewsId = mysqli_real_escape_string($conn, $RowNews['id']);
    $NewsCover = mysqli_real_escape_string($conn, $RowNews['cover_file']);
    $NewsBy = mysqli_real_escape_string($conn, $RowNews['added_by']);*/

  

   
         
        
if ($GetNews[1] > 0) {

  foreach ($GetNews[0] as $RowNews) {
     # code...
   } {
    $NewsTitle = $RowNews['title'];
      $NewsDate = $RowNews['date'];
    $NewsBody = $RowNews['body'];
    $NewsId = $RowNews['id'];
    $NewsCover = $RowNews['cover_file'];
    $NewsBy = $RowNews['added_by'];

    //Getting admin details
    $GetAdmin = mysqli_query($conn, "SELECT * FROM administrators where id='$NewsBy'");
    $rowAdmins = mysqli_fetch_assoc($GetAdmin);
    $Admin_uname = mysqli_real_escape_string($conn, $rowAdmins['username']);
    $Admin_pic = mysqli_real_escape_string($conn, $rowAdmins['profile_pic']);


    echo 
    '
 <!-- Column -->
          <div class="col-md-6">
            <div class="card border-0 mb-4">
              <a href="single.php?id='.$NewsId.'"><img class="card-img-top" src="panel/images/news/'.$NewsCover.'" alt="wrappixel kit"></a>
              <div class="date-pos text-center text-white p-3 bg-success-gradiant">JOHN DOE &nbsp; &nbsp; SEPT 15, 2017</div>
              <h6 class="font-weight-medium mt-3"><a href="single.php?id='.$NewsId.'" class="link text-decoration-none">'. $NewsTitle.'</a></h6>
            </div>
          </div>
          <!-- Column -->
    ';

  }
}else{
  echo '<h5 class="text-center">No news found!</h5>';
}


        ?>
         
        </div>
      </div>
      <!-- Column -->
    </div>
  </div>
</div></div>
 	<?php
    
$Header = new footer();
$LoggedHeader = $Header->logged_footer();
echo $LoggedHeader;
    ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>