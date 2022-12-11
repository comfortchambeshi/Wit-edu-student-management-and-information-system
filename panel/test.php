<?php
include_once 'inc/dbconnect.inc.php';
 //Getting overdue dates
 $sqlqueryLib = mysqli_query($conn, "SELECT * FROM physical_library");
 

while($RowBooksDue = mysqli_fetch_assoc($sqlqueryLib))
{
    $startdate = mysqli_real_escape_string($conn, $RowBooksDue['due_date']);
// modify this setting your expiry time
$expiry = $startdate;

$today = date("Y-m-d", time());

if( $today > $expiry)    {
  

    $UpdatetoDue = mysqli_query($conn, "UPDATE physical_library SET book_status='overdue' WHERE due_date<NOW()");
   }
      

}
?>