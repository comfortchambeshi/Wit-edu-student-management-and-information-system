<?php
include '../classes/db.php';
include '../classes/main.php';
include 'classes/balance.php';


$main = new main();


if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	
	$student = $main->studentQuery("SELECT * FROM students
	WHERE exam_number LIKE '%".$search."%'
	OR student_email LIKE '%".$search."%'
	OR first_name LIKE '%".$search."%'
	OR last_name LIKE '%".$search."%'
	
	OR CONCAT(first_name, ' ', last_name)  LIKE '%".$search."%'
	");
	
}
else
{



$student = $main->studentQuery("SELECT * FROM students  ");


}

$balance = new balance();
$query = $balance->StudentBalance($student);


?>