<?php



$getSite_info = mysqli_query($conn, "SELECT * FROM site_info");
$row_info = mysqli_fetch_assoc($getSite_info);
$site_name = mysqli_real_escape_string($conn, $row_info['name']);
$site_Fullname = mysqli_real_escape_string($conn, $row_info['full_name']);
$site_email = mysqli_real_escape_string($conn, $row_info['email']);
$site_phone = mysqli_real_escape_string($conn, $row_info['phone']);
$site_url = mysqli_real_escape_string($conn, $row_info['url']);
$site_address = mysqli_real_escape_string($conn, $row_info['address']);
$site_directory = mysqli_real_escape_string($conn, $row_info['site_directory']);
$site_description = mysqli_real_escape_string($conn, $row_info['description']);


//time ago function

//Creating Function
function FriendlyTimeAgo ($oldTime, $newTime) {
$timeCalc = strtotime($newTime) - strtotime($oldTime);
if ($timeCalc >= (60*60*24*30*12*2)){
 $timeCalc = intval($timeCalc/60/60/24/30/12) . " years ago";
 }else if ($timeCalc >= (60*60*24*30*12)){
 $timeCalc = intval($timeCalc/60/60/24/30/12) . " year ago";
 }else if ($timeCalc >= (60*60*24*30*2)){
 $timeCalc = intval($timeCalc/60/60/24/30) . " months ago";
 }else if ($timeCalc >= (60*60*24*30)){
 $timeCalc = intval($timeCalc/60/60/24/30) . " month ago";
 }else if ($timeCalc >= (60*60*24*2)){
 $timeCalc = intval($timeCalc/60/60/24) . " days ago";
 }else if ($timeCalc >= (60*60*24)){
 $timeCalc = " Yesterday";
 }else if ($timeCalc >= (60*60*2)){
 $timeCalc = intval($timeCalc/60/60) . " hours ago";
 }else if ($timeCalc >= (60*60)){
 $timeCalc = intval($timeCalc/60/60) . " hour ago";
 }else if ($timeCalc >= 60*2){
 $timeCalc = intval($timeCalc/60) . " minutes ago";
 }else if ($timeCalc >= 60){
 $timeCalc = intval($timeCalc/60) . " minute ago";
 }else if ($timeCalc > 0){
 $timeCalc .= " seconds ago";
 }
return $timeCalc;
}
 

//ending








?>