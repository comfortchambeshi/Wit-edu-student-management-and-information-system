<?php

class datageter extends interactor{
//Inserting Site info data
public function createInfo($siteName, $email, $phone, $adress, $about_us, $phone2, $motto, $fullName,$url){
	$this->insertData($siteName, $email, $phone, $adress, $about_us, $phone2, $motto, $fullName,$url);



}

//Updating payments info
//Inserting Site info data
public function updatePaymentsInfo($currency, $currency_code, $bank_name, $bank_acc_number, $bank_acc_name){
	$this->updatePayments($currency, $currency_code, $bank_name, $bank_acc_number, $bank_acc_name);



}
//Displaying classes
public function DisplayClasses(){
$this->GetClasses();



}

//Inserting classes
public function CreateClassRoom($ClassName, $AddedBy){
$this->InsertClassroom($ClassName, $AddedBy);


}

//Gettings Hostels
public function DisplayHostels(){
$this->GetHostels();


}
//Inserting an Hostel
public function HostelInsetor($HostelName, $AddedBy){

$this->InsertHostel($HostelName, $AddedBy);

}
//Inserting Messages
public function insertMsg($msgBody, $msgto, $msgFrom, $totype, $fromType, $read_or_unread, $viewed, $date){
	$this->insertMSG($msgBody, $msgto, $msgFrom, $totype, $fromType, $read_or_unread, $viewed, $date);




}

}


?>