<?php
class notify extends db
{
    
    public function insertNotify($AlertTo, $AlertbODY, $RedirectUrl,  $AlertToType, $AlertImg){
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO user_alerts (alert_to, alert_date, alert_info, read_or_unread, alert_url, alert_totype, alert_img)VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$AlertTo, $date, $AlertbODY, 'unread', $RedirectUrl, $AlertToType, $AlertImg])){
            
            print_r($stmt->errorInfo());
        }
        
    }

}
?>