<?php
include '../../inc/dbconnect.inc.php';
  //Updating changes
                           if(isset($_POST['mark_btn'])&&isset($_GET['mid'])&&isset($_GET['ass_id']))
                   {
                    $AssId = mysqli_real_escape_string($conn, $_GET['ass_id']);
                    $Mid = mysqli_real_escape_string($conn, $_GET['mid']);
                    $NewMarks = $_POST[''.$Mid.'input_mark'];
                    if($UpdateMarks = mysqli_query($conn, "UPDATE submitted_assigments SET given_marks='$NewMarks', mark_status='marked' WHERE given_marks!='-1' AND  id='$Mid'")){
                   



                      echo '
    
                           <script type="text/javascript">
                           alert("Your '.$NewMarks.' Changes have been made successfully!");
                            window.location.href = "../assignment_view.php?id=2"
                            </script>
                            ';
                   }
                   }else{
                       
                       echo mysqli_error($conn);
                   }
?>