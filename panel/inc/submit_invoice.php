<?php
include 'acpheader.php';

include($_SERVER['DOCUMENT_ROOT'].'/batmix365/classes/mail.php');

if (isset($_POST['invoice_approve_btn']) && isset($_GET['id']) && isset($_GET['owner_id']) && isset($_GET['ordername'])) {
	$ownerId = $_GET['owner_id'];
	$paymentId = $_GET['id'];
	$ordername = $_GET['ordername'];
//getting payment details
$run_cartget = mysqli_query($conn, "SELECT * FROM shopping_cart WHERE cart_id='$paymentId'");
$row_cartget = mysqli_fetch_assoc($run_cartget);
$cart_idget = mysqli_real_escape_string($conn, $row_cartget['cart_id']);
$cart_owner_idget = mysqli_real_escape_string($conn, $row_cartget['cart_owner_id']);
$cart_titleget = mysqli_real_escape_string($conn, $row_cartget['cart_title']);
$cart_costget = mysqli_real_escape_string($conn, $row_cartget['item_cost']);
$dateTimeExpiring = date('Y-m-d', strtotime("+30 days"));

if ($ordername == 'VIP_account_upgrade') {


$alertinfoz = "Your payment has been approved successfully, you can now enjoy the product you have purchased";
	//update package
                $insert_storage = mysqli_query($conn, "UPDATE artist_storages SET storage_size='15000', package='VIP', purchased_date=NOW(), 	total='15000', 	expiring='$dateTimeExpiring' WHERE user_id='$ownerId'");
                echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User upgraded successfully</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                User account upgraded successfully!
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="../index.php">Go back</a>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>';

  //getting user by owner_id
  $Owner_SQL = mysqli_query($conn, "SELECT * FROM users WHERE id='$ownerId'");
  $RowOwner = mysqli_fetch_assoc($Owner_SQL);
  $Owner_Email = mysqli_real_escape_string($conn, $RowOwner['email']);
  $Owner_uname = mysqli_real_escape_string($conn, $RowOwner['username']);

   //include email templates
   include($_SERVER['DOCUMENT_ROOT'].'/batmix365/functions/emailtemplates.php');

  
   Mail::sendMail('Payment Approved | '.$site_name.'', "".$htmlBodyAccept_VIP."", $Owner_Email);
	
}
elseif ($ordername == 'Premium_account_upgrade') {
	echo '';
	
	
	$alertinfoz = "Your payment has been approved successfully, you can now enjoy the product you have purchased";

	//update package
                $insert_storage = mysqli_query($conn, "UPDATE artist_storages SET storage_size='unlimitted', package='Premium', purchased_date=NOW(), 	total='unlimitted', 	expiring='$dateTimeExpiring' WHERE user_id='$ownerId'");

                echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User upgraded successfully</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                User account upgraded successfully!
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="../index.php">Go back</a>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>';
}




	$run_updateInvoice = mysqli_query($conn, "UPDATE payments SET payment_status='approved', proceeded_by='$staff_name'  WHERE payment_id='$paymentId'");

	//insert notification
   $run_notify = mysqli_query($conn, "INSERT INTO user_alerts(alert_to, alert_info, read_or_unread, alert_url)VALUES ('$user_id', '$alertinfoz', 'unread', 'purchases.php?status=p_success')");

     //getting user by owner_id
  $Owner_SQL = mysqli_query($conn, "SELECT * FROM users WHERE id='$ownerId'");
  $RowOwner = mysqli_fetch_assoc($Owner_SQL);
  $Owner_Email = mysqli_real_escape_string($conn, $RowOwner['email']);
  $Owner_uname = mysqli_real_escape_string($conn, $RowOwner['username']);

   //include email templates
   include($_SERVER['DOCUMENT_ROOT'].'/batmix365/functions/emailtemplates.php');

  
   Mail::sendMail('Payment Approved | '.$site_name.'', "".$htmlBodyAccept_premium."", $Owner_Email);


	
}
elseif (isset($_POST['invoice_reject_btn'])) {
	$ownerId = $_GET['owner_id'];
	$paymentId = $_GET['id'];
	$run_updateInvoice = mysqli_query($conn, "UPDATE payments SET payment_status='rejected', proceeded_by='$staff_name'  WHERE payment_id='$paymentId'");

  //getting user by owner_id
  $Owner_SQL = mysqli_query($conn, "SELECT * FROM users WHERE id='$ownerId'");
  $RowOwner = mysqli_fetch_assoc($Owner_SQL);
  $Owner_Email = mysqli_real_escape_string($conn, $RowOwner['email']);
  $Owner_uname = mysqli_real_escape_string($conn, $RowOwner['username']);

	//update package
                $insert_storage = mysqli_query($conn, "UPDATE artist_storages SET storage_size='20', package='free', purchased_date=NOW(), 	total='20'");


	//insert notification
   $run_notify = mysqli_query($conn, "INSERT INTO user_alerts(alert_to, alert_info, read_or_unread, alert_url)VALUES ('$user_id', 'Your payment has been declined because of invalid transaction or txn code. Please check your code and try again!', 'unread', 'purchases.php?status=p_failed')");
   //include email templates
   include($_SERVER['DOCUMENT_ROOT'].'/batmix365/functions/emailtemplates.php');

  
   Mail::sendMail('Payment Rejection! | '.$site_name.'', "".$htmlBody."", $Owner_Email);

  

                echo '<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User upgrade rejected successfully</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                User account upgrade rejected successfully!
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="../index.php">Go back</a>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>';
}




?>



<?php
echo '

<!-- jQuery -->
<script src="'.$site_url.'/'.$site_directory.'/acp8783/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="'.$site_url.'/'.$site_directory.'/acp8783/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="'.$site_url.'/'.$site_directory.'/acp8783/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="'.$site_url.'/'.$site_directory.'/acp8783/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="'.$site_url.'/'.$site_directory.'/acp8783/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="'.$site_url.'/'.$site_directory.'/acp8783/dist/js/demo.js"></script>

';

?>


<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        type: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        type: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        type: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        type: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

</script>