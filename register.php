<?php
include 'panel/inc/dbconnect.inc.php';

    include 'classes/db.php';
include 'inc/auto-loader.php';
include 'inc/siteinfo.php';


//Site title
echo '<title>REGISTRATION FORM | '.$site_name.'</title>';
$Header = new header();
$LoggedHeader = $Header->logged_header();
echo $LoggedHeader;
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navbar-with-menu-and-login.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">  <div class="contact-clean">
         <form method="post" style="width: 100%;max-width: 100%;" enctype="multipart/form-data" action="panel/inc/reg.inc.php">
            <h2 class="text-center">New Student Registration Form</h2>
            <h4 style="background-color: #358cce;color: #ffffff;">Main info</h4>
            <div class="form-group"><input class="form-control" type="text" name="first_name" placeholder="First name" required=""></div>
            <div class="form-group"><input class="form-control" type="text" name="last_name" placeholder="Last name" required=""></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Date of Birth</h6><input required="" name="dob" class="form-control" type="date"></div>
            
            <div class="form-group"><input class="form-control" type="text"  name="exam_number" placeholder="exam Number"></div>
            <div class="form-group"><input class="form-control" type="text" required="" name="nrc_number" placeholder="NRC number"></div>
           
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Gender</h6><select class="form-control" name="gender"><optgroup label="Choose student gender"><option selected="">Male</option><option >Female</option></optgroup></select></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Boarding Status</h6><select name="student_mode" class="form-control"><optgroup label="Choose either day or border"><option  selected="">Day Scholar</option><option >Boarder</option></optgroup></select></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Student profile picture</h6><input type="file" name="profile_pic"></div>
            <div class="form-group">
                <h4 style="background-color: #358cce;color: #ffffff;">Contact info</h4><input class="form-control" type="email" name="email" placeholder="Email address"></div>
            <div class="form-group"><input class="form-control" type="text" required="" name="mobile_number" placeholder="Mobile number"></div>
            <h4 style="background-color: #358cce;color: #ffffff;">Address</h4>
            <div class="form-group"><input class="form-control is-invalid" type="text" required="" name="city_town" placeholder="City/Town"></div>
            
            <h4 style="background-color: #358cce;color: #ffffff;">Hostel Accomodation</h4>
            <div class="form-group">
                <h6>Hostel name</h6><select  class="form-control" name="hostel_number"><optgroup label="Choose a Hostel">
                     <option value="0"  selected="">none</option>
               <?php

               $GetHostels = mysqli_query($conn, "SELECT * FROM hostels");
               while ($rowHostels = mysqli_fetch_assoc($GetHostels)) {
                $HostelName = mysqli_real_escape_string($conn, $rowHostels['name']);
                $HostelId = mysqli_real_escape_string($conn, $rowHostels['id']);
                  echo '

                  <option value='.$HostelId.' >'.$HostelName.'</option>';
               }
                    
?>
                    </optgroup></select></div>
            <div class="form-group">
                <h6>Hostel number</h6>

<input class="form-control is-invalid"   type="text" placeholder="Enter room Number" name="hostel_number">
            </div>
    <h4
        style="background-color: #358cce;color: #ffffff;">Bursary</h4>
        <div class="form-group">
            <h6>Applicable</h6><select class="form-control" name="is_bussery"><optgroup label="Are you on bursary?"><option  selected="">no</option><option >yes</option></optgroup></select></div>
        <div class="form-group">
            <h6>Percentage</h6><select class="form-control" name="bussery_percentage"><optgroup label="Choose bursary mode">
                  
                <option  >NIL</option>

                 <option >10%</option><option >20%</option><option >30%</option><option >40%</option><option >50%</option><option >60%</option><option >70%</option><option >80%</option><option >90%</option><option >100%</option><option ></option></optgroup></select></div>
        <h4
            style="background-color: #358cce;color: #ffffff;">Other info</h4>
            <div class="form-group">
                <h6>Class</h6><select required="" class="form-control" name="class">


                    <optgroup label="Choose a class for a student">

<?php
//Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes ");
                                    while($RowClass = mysqli_fetch_assoc($QueryClass)){

                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                    $ClassId = mysqli_real_escape_string($conn, $RowClass['id']);

                                    echo '<option value="'.$ClassId.'" >'.$ClassName.'</option>';

                                }

?>
                        </optgroup></select></div>
            
               
                    
                    <div
                        class="form-group">
                        <select required="" class="form-control" name="health_condition"><optgroup label="Student health condition"><option  selected="">Medical</option><option >No illness</option>></optgroup></select></div>

                        
                       <div
                        class="form-group">
                        <h6>Year of Study</h6><select class="form-control" name="year"><optgroup label="Student health condition"><option  selected="">one</option><option >two</option>
                       <option >three</option>
                       <option >four</option>

                        </optgroup></select>
                    </div>
                  
                    <div
                        class="form-group">
                        <h6>Study Semester</h6><select class="form-control" name="semester"><optgroup label="Choose A Study Semester"><option  selected="">-</option>
                       <option >first</option>
                       <option >second</option>

                        </optgroup></select>
                        
                        </div>
                        
                         <div
                    class="form-group">
                    <h6>Programme of Study</h6><select required="" class="form-control" name="course"><optgroup label="Choose student course">
                        
<?php
                             $QueryProgramme = mysqli_query($conn, "SELECT * FROM programmes");
                                    while($RowProgramme = mysqli_fetch_assoc($QueryProgramme)){

                                    $ProgrammeName = mysqli_real_escape_string($conn, $RowProgramme['name']);
                                    $ProgrammeId = mysqli_real_escape_string($conn, $RowProgramme['id']);


                                    echo '<option value="'.$ProgrammeId.'">'.$ProgrammeName.'</option>';
}
                                    ?>

                    </optgroup></select></div>

                        <div
                        class="form-group">
                        <h6>Mode of Study</h6><select class="form-control" name="study_mode"><optgroup label="Student health condition"><option  selected="">Online</option><option >Fulltime</option>></optgroup></select></div>
                      
                          <div
                        class="form-group">
                        <h6>Health condition</h6><select required="" class="form-control" name="health_condition"><optgroup label="Student health condition"><option  selected="">Medical Condition</option><option >No illness</option>></optgroup></select></div>

                     
                        <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Country</h6><select name="country" class="form-control"><optgroup label="Choose either day or boarder">
                    
                  
                <option value="Angola">Angola</option>
                <option value="Burundi">Burundi</option>
               
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
               
               <option value="Kenya">Kenya</option>
               
                <option value="Lesotho">Lesotho</option>
              
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
              
                <option value="Mauritius">Mauritius</option>
               
                <option value="Mozambique">Mozambique</option>
               
                <option value="Namibia">Namibia</option>
               
               
                <option value="Rwanda">Rwanda</option>
              
               
                <option value="Swaziland">Swaziland</option>
              
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
               
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                    
                    
                    
                </optgroup></select></div>
                        <div
                            class="form-group">
                            <h4 style="background-color: #358cce;color: #ffffff;">Security</h4><i class="text-danger"> The Password is auto generated for security reasons!</i></div>
                            
                           
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="reg" class="btn btn-primary">Save changes</button>
    </form>
      </div>
      </div>
      </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>