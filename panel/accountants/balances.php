<?php
include '../inc/auto-loader.php';
include '../classes/payments.php';

include '../inc/dbconnect.inc.php';
include '../inc/acc_login_function.php';

include '../inc/staff_login.php';


$payments = new payments();
$AccLoginObj = new acc_login();
$AdminLoginObj = new admin_login();

if ($AccLoginObj->isLoggedIn()) {
    include '../functions/acc_header.php';
    $logged_header = '';
    $logged_header = header1($logged_header);
    include '../inc/acc_mains.php';
    include '../inc/acc_sidebar.php';
   
}elseif($AdminLoginObj->isadminlogged()){
    
    include '../functions/admin_header.php';

include '../inc/dbconnect.inc.php';
include '../inc/admin_mains.php';

$userid =  $AdminLoginObj->isadminlogged();
$logged_header = '';

$logged_header = header1($logged_header);
include '../inc/admin_sidebar.php';

}
else{
   header("Location: ../index.php?sout=success");
}


?>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Balances </h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Payments</a></a></li>
              <li class="breadcrumb-item active">Balances</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Balances</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</head>
	<body>
		<div class="container">
			
			<div class="card">
              <div class="card-header">
                
                	<div class="form-group">
				<div class="input-group">
					
					<input type="text" name="search_text" id="search_text" placeholder="Enter exam id, full names or email" class="form-control" />
				</div>
			</div>
              </div>
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
  include '../inc/footer.php';
  
  ?>