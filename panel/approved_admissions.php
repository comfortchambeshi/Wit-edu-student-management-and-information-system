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
<?php
echo '<title>Approved Admissions | '.$site_name.'</title>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <style type="text/css">
        
    </style>
   
<body>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Approved Forms Forms</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Home</a></li>
              <li class="breadcrumb-item active">Approved Applications</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
    

                   <?php
$GetAdmissions = mysqli_query($conn, "SELECT * FROM admission WHERE status='approved'");
if (mysqli_num_rows($GetAdmissions) > 0) {
    echo '<div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Form</th>
                        
                        
                        <th class="text-center">Course</th>
                      
                    </tr>
                </thead>
                <tbody>';
    while ($RowAdmissions = mysqli_fetch_assoc($GetAdmissions)) {
        $OwnerName = mysqli_real_escape_string($conn, $RowAdmissions['full_name']);
        $Status = mysqli_real_escape_string($conn, $RowAdmissions['status']);
        $ResultsImage  = mysqli_real_escape_string($conn, $RowAdmissions['results_file']);
        $ProgrammeId  = mysqli_real_escape_string($conn, $RowAdmissions['course_id']);

        //getting programme details
        $GetCourses = mysqli_query($conn, "SELECT * FROM programmes WHERE id='$ProgrammeId'");

   $RowCourses = mysqli_fetch_assoc($GetCourses);
    $ProgrammeTitle = mysqli_real_escape_string($conn, $RowCourses['name']);
    $ProgrammeId = mysqli_real_escape_string($conn, $RowCourses['id']);
    $ProgrammeCover = mysqli_real_escape_string($conn, $RowCourses['cover_file']);
    $ProgrammeDescription = mysqli_real_escape_string($conn, $RowCourses['description']);

        echo 
        '
          <tr>
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="uploads/admissions/'.$ResultsImage.'" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">'.$OwnerName.'</a></h4>
                                <h5 class="media-heading"> in <a href="#">'.$ProgrammeTitle.'</a></h5>
                                <span>Status: </span><span class="text-warning"><strong>'.$Status.'</strong></span>
                            </div>
                        </div></td>
                        
                        
                        <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                        
                    </tr>
        ';
    }
}
else{
    echo '<hr><br><h3 class="text-center text-warning">There are currently no approved admissions!</h3>';
}



                   ?>
                    
                  
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
 </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include 'inc/footer.php';
  ?>
