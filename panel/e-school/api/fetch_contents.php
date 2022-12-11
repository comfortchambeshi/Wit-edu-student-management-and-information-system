<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["class_id"], false);
$ClassToGet = $obj->limit;

include '../../inc/dbconnect.inc.php';

            //$ClassId = $_GET['class_id'];
            $ClassName = mysqli_query($conn, "SELECT * FROM e_classes WHERE id='$ClassToGet'");
            if(mysqli_num_rows($ClassName) > 0){
                $RowClass = mysqli_fetch_assoc($ClassName);
                $Name = mysqli_real_escape_string($conn,$RowClass['name']);
                $ClassType = mysqli_real_escape_string($conn,$RowClass['class_type']);
            echo '
            <h4  class="text-center text-light bg-primary">'.$Name.'</h4>
            
            ';
            
            
            if($ClassType == 'none'){
                if(teacher_Login::isLoggedIn()){
                echo '<p class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teaching_tools">
  Teaching tools
</button></p>

';
}
                //Getting contents
               $contents = new contents();
               $video = $contents->getContents($ClassId, 'video');
            }
            else{
                
                echo '<div class="container"><video class="bg-primary border rounded-0 border-primary shadow-lg" controls="" style="max-width: 100%;width: 100%;" preload="auto" height="320" autoplay="" poster="E:\Bollyhood Action/2.0 2018 Full Movie.MP4"><source src="E:\Bollyhood Action/2.0 2018 Full Movie.MP4" type="video/mp4"></video>';
            }
            }
                ?>