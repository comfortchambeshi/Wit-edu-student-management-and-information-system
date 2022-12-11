<?php
include '../inc/auto-loader.php';
include 'functions/admin_header.php';
include 'inc/staff_login.php';
include 'inc/dbconnect.inc.php';
include 'inc/admin_mains.php';

$logged_header = '';

$logged_header = header1($logged_header);




include 'inc/admin_sidebar.php';

//loading classes

include 'classes/users.php';
//end load

?>
<title>Students list</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students <span data-toggle="modal" data-target="#exampleModalCenter" class="badge badge-info right">Add Student</span>
            <form method="POST" action="inc/download.php">
    					    <button style="width:180px;margin-left:260px;margin-top:-70px;" name="students_export" type="submit" class="btn btn-primary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Export CSV</span></button></form>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<div style="margin-bottom:20px;" class="row">
        <div class="col-md-6">
    		<form method="post" action="">
            <div id="custom-search-input">
                <div class="input-group col-md-12 align-center">
                    <input name="search_text" type="text" class="form-control input-lg" placeholder="Enter Name, Email, Mobile or exam number" />
                    <span class="input-group-btn">
                        <button name="search_acc" class="btn btn-info btn-lg" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        </form>
	</div>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
           <?php
           
           $users = new users();
           
            if(isset($_POST['search_acc'])){
                               
                                $search_text = "%{$_POST['search_text']}%";
                                
                                $students = $users->students('yes',$search_text);
                                
                            
                                
                            }else{
                                $students = $users->students('no','no');
                                
                                
                            }

                             
                            
                                 foreach($students as $RowStudentsList){
                               
                                    $StudentFirstName = mysqli_real_escape_string($conn, $RowStudentsList['first_name']);
                                    $StudentLastName = mysqli_real_escape_string($conn, $RowStudentsList['last_name']);
                                    $StudentFullName = $StudentFirstName ." ". $StudentLastName;
                                    $StudentPhoneNumber = mysqli_real_escape_string($conn, $RowStudentsList['phone_number']);
                                    $StudentId = mysqli_real_escape_string($conn, $RowStudentsList['exam_number']);
                                    $profile_pic = mysqli_real_escape_string($conn, $RowStudentsList['profile_pic']);
                                    $RegisteredDate = mysqli_real_escape_string($conn, $RowStudentsList['registered_date']);
                                    $Student_Class = mysqli_real_escape_string($conn, $RowStudentsList['class_id']);
                                    $StudentAddress = mysqli_real_escape_string($conn, $RowStudentsList['city_town']);
                                    $StudentExamNumber = mysqli_real_escape_string($conn, $RowStudentsList['exam_number']);
                                    

                                    //Getting class name
                                    $QueryClass = mysqli_query($conn, "SELECT * FROM classes WHERE id='$Student_Class'");
                                    $RowClass = mysqli_fetch_assoc($QueryClass);
                                    $ClassName = mysqli_real_escape_string($conn, $RowClass['class_name']);
                                    echo '
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <b>'.$StudentFullName.'</b>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead">'.$ClassName.'</h2>
                      <p class="text-muted text-sm"><b>Exam: </b> '. $StudentExamNumber.' </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>City: '.$StudentAddress.'</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: '.$StudentPhoneNumber.'</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="uploads/students_profiles/'.$profile_pic.'" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>';
                                }
                             
            
            ?>
         
          </div>
        </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adding A Student...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="contact-clean">
        <form method="post" style="width: 100%;max-width: 100%;" enctype="multipart/form-data" action="inc/reg.inc.php">
            <h2 class="text-center">Add student</h2>
            <h4 style="background-color: #358cce;color: #ffffff;">Main info</h4>
            <div class="form-group"><input class="form-control" type="text" name="first_name" placeholder="First name" required=""></div>
            <div class="form-group"><input class="form-control" type="text" name="last_name" placeholder="Last name" required=""></div>
            <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Date of Birth</h6><input required="" name="dob" class="form-control" type="date"></div>
            
            <div class="form-group"><input class="form-control" type="text" required="" name="exam_number" placeholder="exam Number"></div>
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
            <h4 style="background-color: #358cce;color: #ffffff;">Sponsor details</h4>
            <div class="form-group"><input class="form-control" type="text" required="" name="sponsor_first_name" placeholder="Sponsor first name"></div>
             <div class="form-group"><input class="form-control" type="text" required="" name="sponsor_last_name" placeholder="Sponsor last name"></div>
            <div class="form-group"><input class="form-control" type="text" required="" name="sponser_mobile_number" placeholder="Sponsor mobile number"></div>
            <div class="form-group">
                <small class="form-label">Relationship with sponsor</small>
                <select name="relationship_with_sponsor" class="form-control">
                    <option value="mother">Mother</option>
                    <option value="father">Father</option>
                    <option value="aunt">Aunt</option>
                    <option value="uncle">Uncle</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            
            
            <h4 style="background-color: #358cce;color: #ffffff;">Address</h4>
            <div class="form-group"><input class="form-control is-invalid" type="text" required="" name="city_town" placeholder="City/Town"></div>
            
            <h4 style="background-color: #358cce;color: #ffffff;">Hostel related info</h4>
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
                  
                <option  >10</option>

                <option >20%</option><option >30%</option><option >40%</option><option >50%</option><option >60%</option><option >70%</option><option >80%</option><option >90%</option><option >100%</option><option ></option></optgroup></select></div>
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
                        <h6>Mode of Study</h6><select class="form-control" name="study_mode"><optgroup label="Student health condition"><option  selected="">Distance</option><option >Full time</option>></optgroup></select></div>
                      
                          <div
                        class="form-group">
                        <h6>Health condition</h6><select required="" class="form-control" name="health_condition"><optgroup label="Student health condition"><option  >Medical</option><option selected="">No illness</option></optgroup></select></div>

                        <div
                        class="form-group">
                        
                        <textarea class="form-control" name="health_problem" placeholder="State health problem if any"></textarea>
                        </div>
                        <div class="form-group" style="background-color: #e7e7e7;">
                <h6>Country</h6><select name="country" class="form-control"><optgroup label="Choose country">
                    
                  
               <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option selected="" value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                    
                    
                    
                </optgroup></select></div>
                        <div
                            class="form-group">
                            <h4 style="background-color: #358cce;color: #ffffff;">Security</h4><i class="text-danger"> The Password is auto generated for security reason!</i></div>
                            
                           
                            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="reg" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>
<?php
  include 'inc/footer.php';
  
  ?>
