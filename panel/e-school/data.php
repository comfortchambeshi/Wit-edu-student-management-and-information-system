<?php

include '../../inc/dbconnect.inc.php';
$data = mysqli_query($conn, "SELECT * FROM e_comments");
while($row = mysqli_fetch_assoc($data))
{
    echo $row['body'];
}