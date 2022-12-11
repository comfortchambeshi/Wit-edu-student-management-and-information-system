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
echo '<title>Pending Admissions | '.$site_name.'</title>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
   <?php echo' <title>Pending Admissions | '.$site_name.'</title>';?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
   
<body>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Unapproved Forms Forms</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $site_url.'/panel';?>">Home</a></li>
              <li class="breadcrumb-item active">Pending Applications</li>
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
<hr>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Form</th>
                        
                        
                        <th class="text-center">Status</th>
                      
                    </tr>
                </thead>
                <tbody>

                   <?php
$GetAdmissions = mysqli_query($conn, "SELECT * FROM admission WHERE status='pending'");
if (mysqli_num_rows($GetAdmissions) > 0) {

    while ($RowAdmissions = mysqli_fetch_assoc($GetAdmissions)) {
        $admissionId = mysqli_real_escape_string($conn, $RowAdmissions['id']);
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
                            <a class="thumbnail pull-left" href="admin/form_view.php?id='.$admissionId.'"> <img class="media-object" src="images/courses/'.$ProgrammeCover.'" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="admin/form_view.php?id='.$admissionId.'">'.$OwnerName.'</a></h4>
                                <h5 class="media-heading"> in <a href="admin/form_view.php?id='.$admissionId.'">'.$ProgrammeTitle.'</a></h5>
                                
                            </div>
                        </div></td>
                        
                        
                        <td class="col-md-1 text-center"><strong><span class="text-warning"><strong>'.$Status.'</strong></span></td>
                        
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
 </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include 'inc/footer.php';
  ?>
