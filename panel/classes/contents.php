<?php
class contents extends db{

public $content;
public $contentId;
public $contentType;
public $MainContent;

public function getContents($contentId, $contentType){
    
    $sql = "SELECT * FROM contents WHERE cont_id=? AND type=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$contentId, $contentType]);
    if($stmt->rowCount()>0){
        
    
    $rows = $stmt->fetchAll();
    
    foreach($rows as $row){
        
        $main = $row['main_content'];
        echo '<div class="container"><video class="bg-primary border rounded-0 border-primary shadow-lg" controls="" style="max-width: 100%;width: 100%;" preload="auto" height="320" autoplay="" poster="'.$main.'"><source src="'.$main.'" type="video/mp4"></video>';
    }
    
    }
    
    
}
    
    
}
