<?php


class interactor extends db{
//Getting classrooms data
protected function GetClasses(){

$sql = "SELECT * FROM classes ORDER BY 1 DESC";
$stmt = $this->connect()->query($sql);

while ($row = $stmt->fetch()) {
	$ClassName = $row['class_name'];
	$AddedBy = $row['added_by'];
	$AddedDate = $row['added_date'];

	//GetUser Name
$QueryUsername = "SELECT * FROM administrators WHERE id='$AddedBy' ";
$stmtUser = $this->connect()->query($QueryUsername);
$rowUserfound = $stmtUser->fetch();
$OwnerName = $rowUserfound['username'];


echo ' <div class="col-md-3" style="margin-bottom: 24px;">
                <div class="media">
                    <div class="media-body border rounded-0" style="background-color: #e0e0e0;">
                        <h5 style="color: rgb(1,8,16);">'.$ClassName.'</h5>
                        <p style="color: rgb(79,79,79);font-size: 13px;">- by: '.$OwnerName.' | '.$AddedDate.'</p>
                    </div>
                </div>
            </div>';
}


}
// Inserting classrooms data

protected function InsertClassroom($ClassName, $AddedBy){
   $TodaysDate = date('d-m-y');

	$sql = "INSERT INTO classes(class_name, added_by, added_date) VALUES(?, ?, ?)";
	$stmt = $this->connect()->prepare($sql);
	$stmt->execute([$ClassName, $AddedBy, $TodaysDate]);
}





	protected function insertData($siteName, $email, $phone, $address, $about_us, $phone2, $motto, $fullname,$url){
		$sql = "UPDATE site_info SET name=?, email=?, phone=?, address=?, about_us=?, phone2=?, motto=?, full_name=?, url=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$siteName, $email, $phone, $address, $about_us, $phone2, $motto, $fullname,$url]);

		
	}
    
	//Payments update
	protected function updatePayments($currency, $currency_code, $bank_name, $bank_acc_number, $bank_acc_name){

		$sql = "UPDATE site_info SET currency=?, currency_code=?, bank_name=?, bank_acc_number=?, bank_acc_name=? ";
	    $stmt = $this->connect()->prepare($sql);
		$stmt->execute([$currency, $currency_code, $bank_name, $bank_acc_number, $bank_acc_name]);
	}
	

	//Getting hostels 
	protected function GetHostels(){


$sql = "SELECT * FROM hostels ORDER BY 1 DESC";
$stmt = $this->connect()->query($sql);
while ($row = $stmt->fetch()) {
	$HostelName = $row['name'];
	$AddedBy = $row['added_by'];
	$AddedDate = $row['added_date'];
//GetUser Name
$QueryUsername = "SELECT * FROM administrators WHERE id='$AddedBy' ";
$stmtUser = $this->connect()->query($QueryUsername);
$rowUserfound = $stmtUser->fetch();
$OwnerName = $rowUserfound['username'];

	echo ' <div class="col-md-3" style="margin-bottom: 24px;">
                <div class="media">
                    <div class="media-body border rounded-0" style="background-color: #e0e0e0;">
                        <h5 style="color: rgb(1,8,16);">'.$HostelName.'</h5>
                        <p style="color: rgb(79,79,79);font-size: 13px;">- by: '.$OwnerName.' | '.$AddedDate.'</p>
                    </div>
                </div>
            </div>';
}


	}

	//Inserting an hostel
	protected function InsertHostel($HostelName, $AddedBy){
		$sql = "INSERT INTO hostels (name, added_by) VALUES(?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$HostelName, $AddedBy]);


	}
	//Inserting messages
	protected function insertMSG($msgBody, $msgto, $msgFrom, $totype, $fromType, $read_or_unread, $viewed, $date){
		$sql = "INSERT INTO messages(msg_from, sent_to, read_or_unread, viewed, body, datestatus, to_type, from_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$msgFrom, $msgto, $read_or_unread, $viewed, $msgBody, $date, $totype, $fromType]);




	}



}