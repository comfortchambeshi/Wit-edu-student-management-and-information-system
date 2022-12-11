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
<title>Slider Images</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HOMEPAGE SLIDER <span data-toggle="modal" data-target="#exampleModal" class="badge badge-info right">Upload Image</span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home-Page Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                    Home-Page Slider IMAGES
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    
                    	<?php
				$GetGallery = mysqli_query($conn, "SELECT * FROM homepage_slider ORDER BY 1 DESC");
			
				if(mysqli_num_rows($GetGallery) > 0){
					while ($RowGallery = mysqli_fetch_assoc($GetGallery)) {
					    $ImageId = mysqli_real_escape_string($conn, $RowGallery['id']);
						$ImageName = mysqli_real_escape_string($conn, $RowGallery['name']);
						$AddedDate = mysqli_real_escape_string($conn, $RowGallery['added_date']);
						$FileName = mysqli_real_escape_string($conn, $RowGallery['file_name']);
						$ImageDescription = mysqli_real_escape_string($conn, $RowGallery['description']);
						
						echo '
						  <form action="?id='.$ImageId.'" method="POST">
					<div style="margin-top: 12px; " class="col-md-3 ">
						<div  class="gallery-grid">
						<button name="delete_btn"   class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i>Delete</button>
							<a  class="example-image-link" href="images/homepage_slider/'.$FileName.'" data-lightbox="example-set" data-title="'.$ImageDescription.'">
							
							
							
								<img src="images/homepage_slider/'.$FileName.'" alt="">
							</a>
						</div>
					</div>
					</form>
				
				
				
				


					
					




				';

					}

				

			}
			else{
			echo "No images found!";
		}

		?>
		<?php
		
if(isset($_POST['delete_btn']) && isset($_GET['id'])){
    $del_id = $_GET['id'];
    
    $DeleteSlider = $class->deleteHomepageSlider($del_id);
}
?>
				
					
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
				<script src="js/lightbox-plus-jquery.min.js"> </script>
			</div>
		
	</div>
						
     
                  
                 
                 
                  
                 
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="contact-clean">
        <form method="post" style="width: 100%;max-width: 100%;" action="inc/upload_slider.inc.php" enctype="multipart/form-data">
            <h2 class="text-center">Upload image slider</h2>
            <h4 style="background-color: #358cce;color: #ffffff;">Image info</h4>
            <div class="form-group"><input class="form-control" required="You must add the title!" type="text" name="title" placeholder="title"></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h4>image file</h4><input required="" type="file" name="image_file"></div><textarea name="image_description" class="form-control" placeholder="Image description or body"></textarea>
            
       
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="upload_btn" class="btn btn-primary">Save changes</button> </form>
      </div>
    </div>
  </div>
</div>

 </div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
 <?php
  
  include 'inc/footer.php';
  ?>
