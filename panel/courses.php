<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>My Programme | Malcolm Moffat College</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
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
</head>

<body>
    <?php
    include 'functions/header2.php';
include '../inc/dbconnect.inc.php';
include '../inc/login_function.php';
include '../inc/mains.php';
$userid =  Login::isLoggedIn();
$logged_header = '';

$logged_header = header1($logged_header);


    ?>
    <div class="container">
    <h1 class="text-center" style="color: rgb(130,169,208);background-color: #dbdee4;">&nbsp;My programme </h1><table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        
            <?php



$query_data = mysqli_query($conn, "SELECT * FROM programmes where id='$programme_id' ");
$countData = mysqli_num_rows($query_data);

if ($countData > 0) {
    $rowProgrammes = mysqli_fetch_assoc($query_data);
    $programmeTitle = mysqli_escape_string($conn, htmlspecialchars($rowProgrammes['name']));
    $Valid_from = mysqli_escape_string($conn, htmlspecialchars($rowProgrammes['p_from']));
    $Valid_to = mysqli_escape_string($conn, htmlspecialchars($rowProgrammes['p_to']));
    $ProgrammeDesc = mysqli_escape_string($conn, htmlspecialchars($rowProgrammes['description']));
    
    echo '<div class="card-body" style="background-color:#f4ecec;">
    <h4 class="card-title">'.$programmeTitle.'</h4>
    <h6 class="text-muted card-subtitle mb-2">Valid: <strong>'.$Valid_from.' to '.$Valid_to.'</strong></h6>
    <p class="card-text">'.$ProgrammeDesc.'</p>
</div>';

echo '<h1 class="text-center" style="color: rgb(130,169,208);background-color: #dbdee4;">&nbsp;My programme outline</h1>';
$GetprogrammeOutline = mysqli_query($conn, "SELECT * FROM prgramme_outline WHERE programme_id='$programme_id'");
 echo '<thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
               
               
                
                <th>Description</th>
                
            </tr>
        </thead>
        <tbody>';
    while ($RowProgrammeOutline = mysqli_fetch_assoc($GetprogrammeOutline)) {
        $P_name = mysqli_real_escape_string($conn, $RowProgrammeOutline['name']);
        $p_owner = mysqli_escape_string($conn, htmlspecialchars($RowProgrammeOutline['owner']));
         $p_Desck = $RowProgrammeOutline['description'];
        //$P_name = mysqli_real_escape_string($conn, $rowAssignments['name']);

        

     
 
   
    echo 
    '
    <tr>
                <td>'.$P_name.'</td>
                <td>'. $user_className.'</td>
                
                <td>'.$p_Desck.'</td>
                
                
            </tr>
    ';
}
}
else{
    echo '<h5>You have no Programmes assigned please contact your system administrator!</h5>';
}
            ?>
            
            
        </tbody>
    </table>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
</body>

</html>