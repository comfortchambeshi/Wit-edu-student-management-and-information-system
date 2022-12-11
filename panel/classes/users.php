<?php

class users extends db{
                               
                               public function accountants($is_post,$name,$email,$phone){
                                   if($is_post == 'yes'){
                                   $sql = "SELECT * FROM accountants WHERE name LIKE ? OR email LIKE ? OR phone LIKE? ";
                                   $stmt = $this->connect()->prepare($sql);
                                   $stmt->execute([$name,$email,$phone]);
                                   
                                   }
                                   else{
                                       
                                       $sql = "SELECT * FROM accountants ORDER BY 1 DESC LIMIT 44 ";
                                       $stmt = $this->connect()->query($sql);
                                       
                                   }
                                   $row = $stmt->fetchAll();
                                   return $row;
                               }
                               
                               //for displaying students
                               
                                public function students($is_post,$search){
                                   if($is_post == 'yes'){
                                   $sql = "SELECT * FROM students WHERE exam_number LIKE ? OR student_email LIKE? OR CONCAT(first_name, '', last_name) LIKE ? OR phone_number LIKE ?";
                                   $stmt = $this->connect()->prepare($sql);
                                   $stmt->execute([$search,$search,$search,$search]);
                                   
                                   }
                                   else{
                                       
                                       $sql = "SELECT * FROM students ORDER BY 1 DESC LIMIT 44 ";
                                       $stmt = $this->connect()->query($sql);
                                       
                                   }
                                   $row = $stmt->fetchAll();
                                   return $row;
                               }
                               
                               //for displaying teachers
                               
                               
                                public function teachers($is_post,$search){
                                   if($is_post == 'yes'){
                                   $sql = "SELECT * FROM lecturers WHERE name LIKE ? OR email LIKE?  OR mobile_number LIKE ?  OR ts_number LIKE ?";
                                   $stmt = $this->connect()->prepare($sql);
                                   $stmt->execute([$search,$search,$search,$search]);
                                   
                                   }
                                   else{
                                       
                                       $sql = "SELECT * FROM lecturers ORDER BY 1 DESC LIMIT 44 ";
                                       $stmt = $this->connect()->query($sql);
                                       
                                   }
                                   $row = $stmt->fetchAll();
                                   return $row;
                               }
                               
                                //for displaying librarians
                               
                               
                                public function librarians($is_post,$search){
                                   if($is_post == 'yes'){
                                   $sql = "SELECT * FROM librarians WHERE name LIKE ? OR email LIKE?  OR phone_number LIKE ?  OR nrc LIKE ?";
                                   $stmt = $this->connect()->prepare($sql);
                                   $stmt->execute([$search,$search,$search,$search]);
                                   
                                   }
                                   else{
                                       
                                       $sql = "SELECT * FROM librarians ORDER BY 1 DESC LIMIT 44 ";
                                       $stmt = $this->connect()->query($sql);
                                       
                                   }
                                   $row = $stmt->fetchAll();
                                   return $row;
                               }
                           }