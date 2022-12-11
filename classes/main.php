<?php

class main extends db{


    


     //all query no limit single with dinstict

      public function all_query_nolimit_param_d($dinstict, $table, $optional){

        $sql = "SELECT DISTINCT $dinstict FROM $table   $optional";
        $stmt = $this->connect()->query($sql);
       

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }


   //all query no limit single

    public function all_query_nolimit_s($table, $optional, $param, $value, $single){

        $sql = "SELECT $single FROM $table WHERE $param=?  $optional";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($count, $row);

    }



    //search query no limit single

    public function search_query_nolimit($table, $optional, $param, $value){

        $sql = "SELECT * FROM $table WHERE $param LIKE '%$value%'  $optional";
        $stmt = $this->connect()->query($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($count, $row);

    }
       


    //Delete query

    public function delete_custom($table, $param, $value){

        $sql = "DELETE FROM $table   WHERE $param=?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

    }

    //Update query

    public function update_custom_o($table, $param1, $value, $param2, $value2, $optional){

        $sql = "UPDATE $table  SET $param1=? $optional  WHERE $param2=? ";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value, $value2])){
            print_r($stmt->errorInfo());
        }

    }

    //Update query

    public function update_custom($table, $param1, $value, $param2, $value2){

        $sql = "UPDATE $table  SET $param1=?  WHERE $param2=?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value, $value2])){
            print_r($stmt->errorInfo());
        }

    }

    public function queryD($table, $optional){
        $sql  = "SELECT * FROM $table $optional ";
        $stmt = $this->connect()->query($sql);
        $count = $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($count, $row);

    }



//all query no parameters



    public function all_query_nolimit_param($table, $optional){

        $sql = "SELECT * FROM $table   $optional";
        $stmt = $this->connect()->query($sql);
       

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }


 //all query no limit for payments with dinsinct

    public function all_query_nolimit_p_s($table, $optional, $param, $value){

        $sql = "SELECT DISTINCT item_id FROM $table WHERE $param=?  $optional";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }
 //all query no limit for payments with dinsinct

    public function all_query_nolimit_p($table, $optional, $param, $value){

        $sql = "SELECT DISTINCT item_id FROM $table WHERE $param=?  $optional";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }

   //all query no limit

    public function all_query_nolimit($table, $optional, $param, $value){

        $sql = "SELECT * FROM $table WHERE $param=?  $optional";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }

    //al query with limit
	public function all_query($table, $limit, $param, $value){

		$sql = "SELECT * FROM $table WHERE $param=?  limit $limit";
		$stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
		$row = $stmt->fetchAll();
		return array($row, $count);
	}


   //all query with limit Birthday
    public function all_queryBday($table, $limit, $param, $value){
        $sql = "SELECT * FROM $table WHERE DAY(".$param.") = DAY(CURDATE()) AND MONTH(".$param.") = MONTH(CURDATE()) ".$limit." ;";

        //$sql = "SELECT * FROM $table WHERE $param=?  limit $limit";
        $stmt = $this->connect()->prepare($sql);

        //Remove four first characters
        $Rowbirthday = substr($value, 4);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }



       //Query this month bday
    public function all_queryMonthBday($table, $limit, $param, $value){
        $sql = "SELECT * FROM $table WHERE MONTH (".$param.") = MONTH(CURDATE()) ".$limit." ;";

        //$sql = "SELECT * FROM $table WHERE $param=?  limit $limit";
        $stmt = $this->connect()->prepare($sql);

        //Remove four first characters
        $Rowbirthday = substr($value, 4);
        if(!$stmt->execute([$value])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }



//All query with and


    public function all_query2($table, $limit, $param, $param2, $value, $value2){

        $sql = "SELECT * FROM $table WHERE $param=? AND $param2=? limit $limit";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$value, $value2])){
            print_r($stmt->errorInfo());
        }

        $count =  $stmt->rowCount();
        $row = $stmt->fetchAll();
        return array($row, $count);
    }
	public function insert_upload($uploadTitle_Seo, $Category, $description, $user_id, $UploadFullName_img, $uploadName, $file, $original_name, $fileSizeConvertedInFull, $price, $album, $upload_status){

		$nowtime = date('Y-m-d H:i:s');

		$sql = "INSERT INTO uploads (seo_title, Category, about_upload, uploaded_by, upload_image, upload_title, upload_file, original_file, upload_size, upload_price, upload_date, upload_views, downloads, album, upload_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$nowtime', ?, ?,?,?)";

		$dbh = $this->connect();

		$stmt = $dbh->prepare($sql);
		$stmt->execute([$uploadTitle_Seo, $Category, $description, $user_id, $UploadFullName_img, $uploadName, $file, $original_name, $fileSizeConvertedInFull, $price, 0, 0, $album, $upload_status]);
        //getting the last insert id and then query the SEO name    
		$lastId = $dbh->lastInsertId();

		$sqlLast = "SELECT * FROM uploads WHERE id=?";
		$stmtLast = $dbh->prepare($sqlLast);
		$stmtLast->execute([$lastId]);
		$RowLast = $stmtLast->fetch();
		$SeoTitle = $RowLast['seo_title'];

		
	    //header("LOCATION: /".$lastId."/".$SeoTitle." ");

        return array($lastId, $SeoTitle);
	}

	 //function for removing special chars
    public function slugify($text,$strict = false) {
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

    // trim
    $text = trim($text, '-');
    setlocale(LC_CTYPE, 'en_GB.utf8');
    // transliterate
    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w.]+~', '', $text);
    if (empty($text)) {
        return 'empty_$';
    }
    if ($strict) {
        $text = str_replace(".", "-", $text);
    }
    return $text;
}



 //coverting to simple values
 public function formatSizeUnits($fileSize)
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

//Function for editing uploads

public function edit_upload($uploadTitle_Seo, $Category, $description, $user_id, $UploadFullName_img, $uploadName, $file, $original_name, $fileSizeConvertedInFull, $price, $album, $id){

    $sql = "UPDATE uploads SET seo_title=?, category=?, about_upload=?, upload_image=?, upload_title=?, upload_file=?, original_file=?, upload_size=?, upload_price=?, album=? WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$uploadTitle_Seo, $Category, $description,  $UploadFullName_img, $uploadName, $file, $original_name, $fileSizeConvertedInFull, $price, $album, $id]);




}

//Insert Cron entry

public function insertCronEntry($name){

        $nowtime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO cron_entries (name, date_time) VALUES (?,?)";

        $dbh = $this->connect();

        $stmt = $dbh->prepare($sql);
        $stmt->execute([$name, $nowtime]);
      

       
    }


}