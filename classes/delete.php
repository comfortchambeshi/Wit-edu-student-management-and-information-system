<?php
class delete extends db{
    
    public function deleteHomepageSlider($ImgId){
       
        
       
       
        //Unlinking
         $sql = "SELECT *  FROM homepage_slider WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$ImgId]);
        $row = $stmt->fetch();
        $file = $row['file_name'];
        $fullDir = 'images/homepage_slider/'.$file.'';
        
        if(unlink($fullDir)){
            
             //deleting the homepage image
        $sqldel = "DELETE FROM homepage_slider WHERE id=?";
        $stmtdel = $this->connect()->prepare($sqldel);
        $stmtdel->execute([$ImgId]);
        
        echo '<script>
        if(confirm("Image deleted successfully!")) {
              window.location.href = "homepage_slider.php"}</script>';
              
        }
              
        
        
        
        
    }
    
    public function deleteGalleryImage($ImgId){
        
        //Unlinking
         $sql = "SELECT * FROM gallery WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$ImgId]);
        $row = $stmt->fetch();
        $file = $row['file_name'];
        $fullDir = 'images/gallery/'.$file.'';
        
        if(unlink($fullDir)){
            
             //deleting the homepage image
        $sqldel = "DELETE FROM gallery WHERE id=?";
        $stmtdel = $this->connect()->prepare($sqldel);
        $stmtdel->execute([$ImgId]);
        
        echo '<script>
        if(confirm("Image deleted successfully!")) {
              window.location.href = "gallery.php"}</script>';
              
        }
        
    }
    
    
    public function deletenews($ImgId){
        
        //Unlinking
         $sql = "SELECT * FROM news WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$ImgId]);
        $row = $stmt->fetch();
        $file = $row['cover_file'];
        $fullDir = 'images/news/'.$file.'';
        
        if(unlink($fullDir)){
            
             //deleting the homepage image
        $sqldel = "DELETE FROM news WHERE id=?";
        $stmtdel = $this->connect()->prepare($sqldel);
        $stmtdel->execute([$ImgId]);
        
        echo '<script>
        if(confirm("The news was deleted deleted successfully!")) {
              window.location.href = "news.php"}</script>';
              
        }
        
    }

}

?>