<?php

class eschool extends db{
    
    public function insertComment($body, $classId, $Usertype, $user_id, $Attachments){
        $sql = "INSERT INTO e_comments(body, class_id, 	commenter_type, user_id, datetime, attachements) VALUES(?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        // date:
         $date = date('Y-m-d H:i:s');
        $stmt->execute([$body, $classId, $Usertype, $user_id, $date, $Attachments]);
    }
    //Inserting notes
    public function Insertcontent($name, $Type, $contId, $MainContent, $user_id, $userType){
        $sql = "INSERT INTO contents(name, type,cont_id, main_content, datetime, user_id, user_type) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        // date:
         $date = date('Y-m-d H:i:s');
        if(!$stmt->execute([$name, $Type, $contId, $MainContent, $date, $user_id, $userType])){
            print_r($stmt->errorInfo());
            
        }
        
       
    }
    
    
}