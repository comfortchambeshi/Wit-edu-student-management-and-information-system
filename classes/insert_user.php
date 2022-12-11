<?php

class insertUser extends db
{
    
    public function insertStudent($FirstName, $LastName, $Password, $user_pass, $RegisteredDate, $ProgrammeId, $email, $gender, $proficpic, $ClassId, $NRCno, $BirthDate, $HostelNumber, $HostelName,  $StudyMode, $PhoneNumber, $cityTown, $Isbursary, $BursaryPercentage, $Year, $ExamNumber, $Country,  $username, $HealthCondition, $semester, $sponsor_first_name, $sponsor_last_name, $sponser_mobile_number, $health_problem, $relationship_with_sponsor){
        
        $sqlsearch = "SELECT * FROM students WHERE username=? OR student_email=? OR NRC_NO=? OR exam_number=?";
        $stmtsearch = $this->connect()->prepare($sqlsearch);
        if(!$stmtsearch->execute([$username, $email, $NRCno, $ExamNumber])){
        
            print_r($stmtsearch->errorInfo());
            
            
        
        
        }
        else{
            if($stmtsearch->rowCount() > 0){
            header("LOCATION: ../../messages.php?type=reg_taken&email=".$email."");
            }
            
            else{
        $sql = "INSERT INTO students(first_name, last_name, student_password, registered_date, programme_id, student_email, gender, profile_pic, class_id, NRC_NO, Birth_Date, Hostel_number, Hostel_name, study_mode, phone_number, city_town, is_bursary, bursary_percentage, year, exam_number, country, username,  Health_Condition, acc_status, semester, sponsor_first_name, sponsor_last_name, sponser_mobile_number, health_problem, relationship_with_sponsor)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$FirstName, $LastName, $Password, $RegisteredDate, $ProgrammeId, $email, $gender, $proficpic, $ClassId, $NRCno, $BirthDate, $HostelNumber, $HostelName, $StudyMode, $PhoneNumber, $cityTown, $Isbursary, $BursaryPercentage, $Year, $ExamNumber, $Country, $username, $HealthCondition, 'pending', $semester, $sponsor_first_name, $sponsor_last_name, $sponser_mobile_number, $health_problem, $relationship_with_sponsor]))
        {
            print_r($stmt->errorInfo());
            
        }
        else{
            
            include '../../functions/emailtemplates.php';
             $templateCall = new mailTemplate();
                 //run email insert
                $fullDescription = 'Your Account was created successfully, please use the details below to login to the student portal<hr>
                -username:'.$ExamNumber.'<p>-Password: '.$user_pass.'</p> ';
                $generalTemplate = $templateCall->generalTemplate($site_fullName, $FirstName. ' ' .$LastName, $fullDescription,  'Admissions Department', 'Registration Successfull');
                Mail::sendMail('Student Login Details', $generalTemplate , $email);
            

                 
            header("LOCATION: ../../messages.php?type=reg_success&email=".$email."");
        }
        
        
        
        }
        }
        
    }
    //iNSERTING ADMIN
    
    public function insertAdmin($userName, $password, $email, $fullName, $gender){
        $sql = "INSERT INTO administrators(email, name, password, username, gender, profile_pic)VALUES(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$email, $fullName, $password, $userName, $gender, 'none'])){
            //print_r($stmt->errorInfo());
            
            
        }
        
        
        
        
        
    }
    
}


?>