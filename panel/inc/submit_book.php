<?php

if (isset($_POST['book_btn'])) {
    include '../inc/auto-loader.php';
	include 'dbconnect.inc.php';
	include 'lib_login_function.php';
include 'lib_mains.php';
	if ($LibLoginObj->isLoggedIn()) {
		$BookTitle = mysqli_real_escape_string($conn, $_POST['book_title']);
		$BookSubject = mysqli_real_escape_string($conn, $_POST['book_subject']);
		$BookCover =  $_FILES['book_cover'];
		$BookFile = $_FILES['book_file'];





// get details of the image file
$fileTmpPath_img = $_FILES['book_cover']['tmp_name'];
$fileName_img = $_FILES['book_cover']['name'];
$fileSize_img = $_FILES['book_cover']['size'];
$fileType_img = $_FILES['book_cover']['type'];
$fileNameCmps_img = explode(".", $fileName_img);
$fileExtension_img = strtolower(end($fileNameCmps_img));
$newFileName_img = md5(time() . $BookTitle) . '.' . $fileExtension_img;
//for files
$fileTmpPath = $_FILES['book_file']['tmp_name'];
$fileName = $_FILES['book_file']['name'];
$fileSize = $_FILES['book_file']['size'];
$fileType = $_FILES['book_file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$newFileName = md5(time() . $BookTitle) . '.' . $fileExtension;
//coverting to simple values
function formatSizeUnits($fileSize)
    {

        if ($fileSize >= 1073741824)
        {
            $fileSize = number_format($fileSize / 1073741824, 2) . ' GB';
        }
        elseif ($fileSize >= 1048576)
        {
            $fileSize = number_format($fileSize / 1048576, 2) . ' MB';
        }
        elseif ($fileSize >= 1024)
        {
            $fileSize = number_format($fileSize / 1024, 2) . ' KB';
        }
        elseif ($fileSize > 1)
        {
            $fileSize = $fileSize . ' bytes';
        }
        elseif ($fileSize == 1)
        {
            $fileSize = $fileSize . ' byte';
        }
        else
        {
            $fileSize = '0 bytes';
        }

        return $fileSize;
}


$fileSizeConvertedInFull = formatSizeUnits($fileSize);

//$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;



$allowedfileExtensions_img = array('jpg', 'gif', 'png', 'jpeg');
//for files
$allowedfileExtensions= array('pdf', 'docx');

if (in_array($fileExtension_img, $allowedfileExtensions_img) && in_array($fileExtension, $allowedfileExtensions)) {

// directory in which the uploaded file will be moved
    $UploadFullName_img = $newFileName_img .".". uniqid("", true).".".$fileExtension_img;
    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;
$uploadFileDir_img = '../images/books/';
$dest_path_img = $uploadFileDir_img . $UploadFullName_img;
//for files
$uploadFileDir = '../uploads/books/';
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath_img, $dest_path_img) && move_uploaded_file($fileTmpPath, $dest_path)){
	if($RunInsert = mysqli_query($conn, "INSERT INTO library_books(book_name,subject_id, book_file, book_cover, added_by,  added_date ) VALUES('$BookTitle', '$BookSubject', '$UploadFullName', '$UploadFullName_img', '$user_id', NOW())")){
        header("LOCATION: ../lib_library.php?status=success");

    }
    else{
        echo mysqli_error($conn);
    }




}
else{


	echo '<h3>Cannot insert into directory</h3>';
}

}
else{

	echo "Invalid file extension for book or book cover!";
}
}}
		
	


?>