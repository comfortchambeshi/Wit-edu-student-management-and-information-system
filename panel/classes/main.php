<?php
class main extends db{
    
    public function file_uploaders($file_form,$upload_folder,$extensionsUp){
        	//for files
$fileTmpPath = $file_form['tmp_name'];
$fileName = $file_form['name'];
$fileSize = $file_form['size'];
$fileType = $file_form['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

$uploadTitle = "file";
$newFileName = md5(time() . $uploadTitle) . '.' . $fileExtension;

$allowedfileExtensions_img = $extensionsUp;


$file_name = $depositSlip_file; 

$allowedfileExtensions = $extensionsUp;


            if (in_array($fileExtension, $allowedfileExtensions)) {


    //for files
    $UploadFullName = $newFileName .".". uniqid("", true).".".$fileExtension;

//for files
$uploadFileDir = $upload_folder;
$dest_path = $uploadFileDir . $UploadFullName;

if(move_uploaded_file($fileTmpPath, $dest_path)){
    return $UploadFullName;
    
}else{
    echo '<script>alert("Cannot move file to a directory");
				window.location.href = "../acc_p_history.php";
				
					</script>';
					exit();
}

}
else{
    echo '<script>alert("Invalid file extension!");
				window.location.href = window.location.href;
				
					</script>';
}                   exit();
}
    
    

    //main details for student
    public function student($limit){
    $sql = "SELECT * FROM students GROUP BY system_id LIMIT $limit";
    $stmt = $this->connect()->query($sql);
    $rows = $stmt->fetchAll();
    return $rows;
    
    }
    //main details for student with option
    public function studentQuery($query){
    $sql = "$query";
    $stmt = $this->connect()->query($sql);
    
    $rows = $stmt->fetchAll();
    return $rows;
    
    }
    
    //main details for student with the selected system_id
    public function studentBy_email_orId($user_id,$user_email){
    $sql = "SELECT * FROM students WHERE system_id=? OR student_email=? OR student_email=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id,$user_id]);
    $rows = $stmt->fetchAll();
    if($stmt->rowCount()>0){
    return $rows;
    }
    else{
        echo '<script>alert("User exam_number or email not found!");
				window.location.href = "inc/get_insert.php?inv_id='.$last_id.'";
				
					</script>';
					
					exit();
    }
    
    }

   //main details for student with the selected exam number or email
    public function studentBy_email_orExamid($uid){
    $sql = "SELECT * FROM students WHERE exam_number=? OR student_email=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uid,$uid]);
    $rows = $stmt->fetchAll();
    if($stmt->rowCount()>0){
    return $rows;
    }
    else{
        echo '<script>alert("User exam id or email not found!");
				window.location.href = "../acc_p_history.php";
				
					</script>';
					
					exit();
    }
    
    }

    }