


<?PHP
include '../inc/dbconnect.inc.php';
include '../classes/db.php';
include '../classes/contents.php';
include($_SERVER['DOCUMENT_ROOT'].'/inc/login_function.php');
include($_SERVER['DOCUMENT_ROOT'].'/inc/teacher_login_function.php');

if(teacher_Login::isLoggedIn()){
    
    $include = 'teacher_mains.php';
}
else{
    $include = 'mains.php';
    
}

include '../inc/'.$include.'';


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>e-school</title>
    <link rel="stylesheet" href="assets/css/Drag-Drop-File-Input-Upload.css">
    <!-- include summernote css/js -->
    
    
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
     <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    

   
    <script src="https://studentsystem.mukuni.edu.zm/assets/js/jquery.min.js"></script>
    <script src="https://studentsystem.mukuni.edu.zm/assets/bootstrap/js/bootstrap.min.js"></script>

    
     
                          <script>
$(document).ready(function(){
    id = window.location.search.substr(10);
    obj = { "limit":id };
dbParam = JSON.stringify(obj);
setInterval(function(){
$("#data").load('api/answers_data.php?class_id='+dbParam)
}, 1000);
});
</script>


    
    

</head>

<body>
    

    
    
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="lessons.html">Lessons</a></li>
                <li class="nav-item"><a class="nav-link" href="class_view.html">Modules</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Timetable</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            </ul>
        </div>
        
        
        
          
    <!-- Modal -->

<div id="teaching_tools"  class="modal  bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div style="width:100%;max-width:100%;"  class="modal-content login-clean">
      <ul></ul>
    <div class="row">
    
        <div class="col-lg-4">
            <div class="list-group"><a class="list-group-item list-group-item-action" data-toggle="list" href="#list-home">CREATE POST</a><a class="list-group-item list-group-item-action" data-toggle="list" href="#list-profile">VIDEO</a><a class="list-group-item list-group-item-action"
                    data-toggle="list" href="#list-messages">TASK</a><a class="list-group-item list-group-item-action" data-toggle="list" href="#list-notes">NOTES</a></div>
        </div>
        <div class="col">
            <div class="tab-content">
                <div id="list-home" class="tab-pane fade" role="tabpanel">
                    <p> 
                    <div class="form-group">
                    
                    <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data" style="width:100%;max-width:100%;" method="post">
                    <div class="text-danger" id="err"></div>
                    
             <textarea type="text" class="form-control" id="summernote" name="summernote" placeholder="Enter name" required></textarea>
             
             <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input  id="uploadImage" type="file" accept="image/*" name="image" >
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
                 <div class="form-group">
                        <p class="text-center"><button  class="btn btn-primary btn-block"  type="submit">POST</button></p>
                    </div>
           </form>
                </div>
                
                </p>
                
                
                
                
                
                
                
                
                
                
                
                
                </div>
                <div id="list-profile" class="tab-pane fade" role="tabpanel">
                    <div class="form-group files color"><input type="file" multiple="" name="files">
                        <p class="text-center"><button class="btn btn-primary" type="button">UPLOAD</button></p>
                    </div>
                </div>
                <div id="list-messages" class="tab-pane fade" role="tabpanel">
                    <form  method="post" style="width: 100%;max-width: 100%;">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
                        <div class="form-group" style="width: 100%;"><textarea class="form-control" placeholder="Type in Your question here" style="height: 88px;"></textarea></div>
                        <div class="form-group" style="width: 100%;"><input class="form-control" type="number" placeholder="Number Of Questions"></div>
                        <div class="form-group" style="width: 100%;"><small class="form-text text-muted">Time Valid</small><input class="form-control" type="date"></div>
                        <div class="form-group" style="width: 100%;"><button class="btn btn-primary btn-block" type="submit">ADD</button></div><a class="forgot" href="#">Don\'t know how it works? Please read the guide here.</a></form>
                </div>
                <div id="list-notes" class="tab-pane fade" role="tabpanel">
                    <p>
                    
                    
                    <div class="form-group">
                   <form id="notesform" action="api/notes.php" method="post" enctype="multipart/form-data" style="width:100%;max-width:100%;" method="post">
                    <div class="text-danger" id="err"></div>
                     <div class="form-group">
                    <input id="name" name="name" type="text" placeholder="NOTES NAME" class="form-control" />
                    </div>
                    
             <textarea type="text" class="form-control" id="batcall" name="batcall" placeholder="Enter name" required></textarea>
             <p>
             <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input  id="uploadImage2" type="file" accept="image/*" name="image" >
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
                </p>
                 <div class="form-group">
                        <p class="text-center"><button  class="btn btn-primary btn-block"  type="submit">POST</button></p>
                    </div>
           </form>
                </div>
                
                
                    
                    
                    </p>
                </div>
            </div>
            <div class="modal-footer">
        
        <button id="close_modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
        </div>
    </div>
    
    </div>
    
  </div>
</div>



        <div id='data' class="card-body">
            
            
           
   



   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  
  
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
  
   <script>
  $(function () {
    //Add text editor
    $('#batcall').summernote()
  })
</script>




<script>
    $(function() {
  
  $('#add').click(function() {
    $("#summernote").val("")
  });
});
</script>


<script>
//For create post
//var class_id = window.location.search.substr(10);
var summernote = $('#summernote').val();
var class_id = window.location.search.substr(10);
    type: "POST",
				
    $(document).ready(function (e) {
        
 $("#form").on('submit',(function(e) {
    
  e.preventDefault();
   

var class_id = window.location.search.substr(10);
var formData = new FormData(this);
formData.append("class_id", class_id);
//form_data.append(class_id, class_id);
  $.ajax({
         url: "api/ajaxupload.php",
   type: "POST",
   data:  formData,
          
        
        
        
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
        
        
        
          
          
          $('.modal-backdrop').remove()
          $(document.body).removeClass("modal-open");
          $('#teaching_tools').modal('hide');
          
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#form")[0].reset();
    
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
</script>


<script>
//For notes
//var class_id = window.location.search.substr(10);

var class_id = window.location.search.substr(10);
    type: "POST",
				
    $(document).ready(function (e) {
        
 $("#notesform").on('submit',(function(e) {
    
  e.preventDefault();
   

var class_id = window.location.search.substr(10);
var formData = new FormData(this);
formData.append("class_id", class_id);

  $.ajax({
         url: "api/notes.php",
   type: "POST",
   data:  formData,
          
        
        
        
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
        
        
        
          
          
          $('.modal-backdrop').remove()
          $(document.body).removeClass("modal-open");
          $('#teaching_tools').modal('hide');
          
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#notesform")[0].reset();
    
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
</script>



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>