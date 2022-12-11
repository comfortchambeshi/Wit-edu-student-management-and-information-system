<?php

include '../classes/db.php';
include '../classes/mail.php';
include '../classes/main.php';
include '../classes/email_template.php';


$mainClass = new main();


$today = date("m-d");
$nextMonth = date("m")+1;

//Email template
$email_templates = new email_templates();





//Todays's birthday
$BdayQuery = $mainClass->all_queryBday("students", "", "Birth_Date", $today);
if ($BdayQuery[1] > 0) 
{
	foreach ($BdayQuery[0] as $row) 
	{
		$body = "Dear ".$row['first_name'].", study hard, work hard and don't forget to live hard. We wish you the best on your special day! As long as you work hard and never stop believing in yourself, good luck and success shall always accompany you. Happy Birthday.";
        $subject = "HAPPY BIRTHDAY ".$row['first_name']. "";

        $generalTemplate = $email_templates->general_template($body, $subject, $row['first_name'] ." ".$row['last_name'], "Mukuni University");

        Mail::sendMail($subject, $generalTemplate, $row['student_email']);
        $insertCron = $mainClass->insertCronEntry($subject);


	}
}

?>