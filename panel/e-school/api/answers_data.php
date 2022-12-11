<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["class_id"], false);
$ClassToGet = $obj->limit;

include '../../inc/dbconnect.inc.php';
include '../../classes/db.php';
include '../../classes/contents.php';
include($_SERVER['DOCUMENT_ROOT'].'/inc/login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/teacher_login_function.php');


?>

 <?php
            $ClassId = $_GET['class_id'];
            $ClassName = mysqli_query($conn, "SELECT * FROM e_classes WHERE id='25'");
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




<?php
$data = mysqli_query($conn, "SELECT * FROM e_comments WHERE class_id='$ClassToGet' ORDER BY 1 DESC ");
while($row = mysqli_fetch_assoc($data)){
    $commentId = mysqli_real_escape_string($conn, $row['id']);
    $commenterId = mysqli_real_escape_string($conn, $row['user_id']);
    $questionBody = $row['body'];
    $commenterType = mysqli_real_escape_string($conn, $row['commenter_type']);
    
    if($commenterType == 'teacher'){
    $IdType = 'id';    
    $queryFrom = 'lecturers';  
    $systemName = 'name';
    $ImgDirectory = 'teachers_profiles';
    }
    else
    {
        $IdType = 'system_id';
        $queryFrom = 'students';
        
        $systemName = 'student_name';
        $ImgDirectory = 'students_profiles';
    }
    
    $GetCommenter = mysqli_query($conn, "SELECT * FROM $queryFrom WHERE $IdType='$commenterId' ORDER BY 2 DESC");
    $rowCommenter = mysqli_fetch_assoc($GetCommenter);
        $FullName = mysqli_real_escape_string($conn, $rowCommenter[$systemName]);
        $ProfilePic = $rowCommenter['profile_pic'];
   
    
    echo '<div class="card" style="margin-bottom: 5px;">
                        <div class="card-body">
                            <h4 class="text-primary card-title"><img class="rounded-circle" src="../../panel/uploads/'.$ImgDirectory.'/'.$ProfilePic.'" width="50" height="50">&nbsp;'.$FullName.'</h4>
                            <h6 class="text-muted card-subtitle mb-2">'.$commenterType.'</h6>
                            <p style="width:100%;max-width:100%;" class="card-text">'.$questionBody.'</p>
                            
                            
                                
                                ';
                                
                                 //Getting Answers
    $FetchAnswer = mysqli_query($conn, "SELECT * FROM e_answers WHERE comment_id='$commentId'");
    $Answercounter = mysqli_num_rows($FetchAnswer);
    echo '<div><a class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$commentId.'" href="#collapse-'.$commentId.'" role="button">Answers('.$Answercounter.')</a>
            <div class="collapse" id="collapse-'.$commentId.'">';
    if($Answercounter > 0){
        
        while($rowAnswers = mysqli_fetch_assoc($FetchAnswer))
        {
            $UserType = mysqli_real_escape_string($conn, $rowAnswers['user_type']);
             $AnswerCommenter = mysqli_real_escape_string($conn, $rowAnswers['user_id']);
             $Answerbody = mysqli_real_escape_string($conn, $rowAnswers['body']);
    
    if($UserType == 'teacher'){
    $AnswerIdType = 'id';    
    $AnswerqueryFrom = 'lecturers';  
    $AnswersystemName = 'name';
    $AnswerImgDirectory = 'teachers_profiles';
    }
    else
    {
        $AnswerIdType = 'system_id';
        $AnswerqueryFrom = 'students';
        $AnswersystemName = 'student_name';
        $AnswerImgDirectory = 'students_profiles';
    }
    
     $GetCommenter = mysqli_query($conn, "SELECT * FROM $AnswerqueryFrom WHERE $AnswerIdType='$AnswerCommenter' ORDER BY 2 DESC");
    $rowCommenter = mysqli_fetch_assoc($GetCommenter);
        $FullName = mysqli_real_escape_string($conn, $rowCommenter[$AnswersystemName]);
        $ProfilePic = $rowCommenter['profile_pic'];
            
            echo ' <p></p>
                                    <div class="media border rounded-0" style="margin-bottom: 5px;"><img class="rounded-circle mr-3" src="../../panel/uploads/'.$ImgDirectory.'/'.$ProfilePic.'">
                                        <div class="media-body">
                                            <h5>'.$FullName.'</h5>
                                            <p>'.$Answerbody.' </p>
                                        </div></div>';
            
        }
    }
    else{
        echo 'No Answer found to this for this question!';
    }
    
    echo '
                                   
                                    <small class="form-text text-muted">Reply to this question</small>
                                    <div class="form-group">
                                        <form><textarea class="form-control" style="margin-bottom: 6px;"></textarea><button class="btn btn-primary" type="button">Reply</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
    
    
}



?>
