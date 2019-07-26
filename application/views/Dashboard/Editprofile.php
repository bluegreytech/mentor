<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');

$this->load->view('common/sidebar_second');
?>
      
<section id="main-content" class="my-profile-page">
   <section class="wrapper">
   <?php if(($this->session->flashdata('error'))){ ?>
                     <div class="alert alert-danger" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
                     </div>
               <?php } ?>
                   <?php if(($this->session->flashdata('success'))){ ?>
                     <div class="alert alert-success" id="successMessage">
                     <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                     </div>
               <?php } ?>
      <div class="c_title">
         <h2>My Profile</h2>
         <div class="clearfix"></div>
      </div>
      <div class="c_panel panel-blank">
            <div id="exTab1"> 
               <ul  class="nav nav-pills">
                  <li class="active text-center"><a  href="#1a" data-toggle="tab"> 
                     <div><i class="fa fa-user fa-2x"></i></div>
                     <div class="tab-name">Personal Details</div></a>
                  </li>
                  <li class="text-center"><a href="#2a" data-toggle="tab">
                     <div><i class="fa fa-book fa-2x"></i></div>
                     <div class="tab-name">Education Details</div></a>
                  </li>
                  <li class="text-center"><a href="#3a" data-toggle="tab">
                  <div><i class="fa fa-users fa-2x"></i></div>
                     <div class="tab-name">Family Details </div></a>
                  </li>
                  <li class="text-center"><a href="#4a" data-toggle="tab">
                     <div><i class="fa fa-mortar-board fa-2x"></i></div>
                     <div class="tab-name">Academic Details</div></a>
                  </li>
               </ul>
 
               <div class="tab-content clearfix">
                 <div class="tab-pane active" id="1a">
                  <!-- <form method="post" id="form_assesment" action="<?php //echo base_url();?>Dashboard/Useradd"> -->
                     <div class="ptd-box " id="Div1">
                     <form method="post" id="valid_forms" action="<?php echo base_url();?>Dashboard/Useradd" 
                           enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-3 text-center">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                 <div class="fileupload-preview fileupload-exists thumbnail">
                                    <img src="http://mindlerdashboard.imgix.net/a6.png?w=120" /> 
                                 </div>
                                 <div>
                                 <input type="hidden"  value="<?php echo $UserId; ?>" name="UserId">
                                    <span class="btn btn-white btn-file btn-xs">
                                    <span class="fileupload-exists show-important">Select image</span>
                                  
                                     <input type="file" name="ProfileImage" value="<?php echo $ProfileImage;?>"  class="default" /> 
                                    </span>
                                 </div>

                                <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 500kb)</small>
                              </div>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group height-min">
                                 <label>First Name</label>
                                 <br>
                                 <input type="hidden"   value="<?php echo $UserId; ?>" name="UserId">
                                 <input type="hidden"   value="<?php echo $EducationId; ?>" name="EducationId">
                                 <input type="hidden"   value="<?php echo $UserFamilyId; ?>" name="UserFamilyId">
                                 <input type="hidden"   value="<?php echo $GraduateScoreId; ?>" name="GraduateScoreId">
                              
                               
                                 <input name="FirstName" value="<?php echo $FirstName;?>" class="form-control" type="text" minlength="3" maxlength="50">
                              </div>
                              <div class="form-group height-min">
                                 <label class="">Email Address</label>
                                 <br>
                                 <input name="EmailAddress" value="<?php echo $EmailAddress;?>" class="form-control" type="text">
                                    
                              </div>

                              <!-- <a href="#" class="add-another-email" style="text-decoration: underline; display: block">Add another email</a>
                              <div class="form-group height-min" id="for-additional-email" style="display: none">
                                 <div><label>Add Email </label><a href="#" class="delete-another-email" >Cancel</a></div>
                                <span class="additional-email"><input id="anotherEmail" name="Email1" class="form-control text-low" style="text-transform: none;" type="text" value=""></span>
                              </div> -->
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Last Name</label>
                                 <br>
                                 <input name="LastName" class="form-control" type="text" maxlength="50" value="<?php echo $LastName;?>">
                              </div>
                              <div class="form-group">
                                 <label>Gender</label><br>
                                 <div class="radio" style="margin-top:0">
                                    <label style="padding-left:0">
                                    <input type="radio" name="Gender" value="Male" <?php  if($Gender=='Male'){  echo 'checked'; } ?>
                                       class="icheck-blue"> Male
                                    </label>
                                    <label>
                                       <input type="radio" name="Gender"  <?php if($Gender=='Female') { echo "checked"; }?> value="Female" class="icheck-blue"> Female
                                    </label>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Date of Birth</label>
                                 <br>
                                 <div class="input-group" id="dateOfBirth">
                                   
                                    <input value="<?php echo $DateofBirth ?>" class="form-control" name="DateofBirth" placeholder="MM/DD/YYYY" type="date" id="datepicker">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Phone Number</label>
                                 <br>
                                 <input name="PhoneNumber" class="form-control" type="text" maxlength="13" value="<?php echo $PhoneNumber;?>">
                              </div>
                           </div>


                           <!-- <input type="hidden" id="level" value="1" name="level">
                           <div class="col-md-12 margin-top-20" style="text-align: right">
                              <input value="Update" class="btn btn-primary next-profile-btn" type="submit">
                           </div> -->
                        </div>
                     </div>
                  <!-- </form> -->
                 </div>

                  <div class="tab-pane" id="2a">
                     <!-- <form action="#"> -->
                        <div class="ptd-box" id="education-tab-details">
                           <div class="row">
                              <div class="for-school-student" style="display: block;">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                   
                                    <?php 
                                       if($StreamStatus=='Graduate')
                                       {
                                          ?>
                                          <label>School</label>
                                          <?php
                                       }
                                       else
                                       {
                                          ?>
                                          <label>College</label>
                                          <?php
                                       }
                                    ?>
                                       <br>
                                       <input value="<?php echo $EducationName;?>" name="EducationName" class="form-control" type="text" >
                                    </div>

                                     <?php
                                      if($StreamStatus=='Graduate')
                                      { 
                                     ?>
                                       <div class="form-group">
                                          <label>Course</label>
                                          <br>
                                             <input name="Course" class="form-control" type="text"
                                           value="<?php echo $Course;?>">
                                       </div>
                                     
                                     <?php
                                     }
                                     else
                                     { 
                                     ?>
                                          <div class="form-group">
                                             <label>Board</label>
                                             <br>
                                             <input name="BoardName" class="form-control" type="text" 
                                             value="<?php echo $BoardName;?>">
                                          </div>
                                    <?php
                                    }
                                    ?>

                                 </div>
                                 <div class="col-md-6">
                                     <?php 
                                      if($StreamStatus=='Graduate')
                                      { 
                                     ?>
                                     <div class="form-group">
                                       <label>University</label>
                                       <br>
                                       <input name="UnivesityName" class="form-control" type="text" value="<?php echo $UnivesityName;?>">
                                    </div>
                                    
                                    <?php
                                     }
                                     else
                                     { 
                                     ?>
                                     <div class="form-group">
                                       <label>Class</label>
                                       <br>
                                       <input  name="ClassStream" class="form-control" type="text" value="<?php echo $ClassStream;?>">
                                    </div>
                                    
                                      <?php
                                    }
                                    ?>

                                    <div class="form-group">
                                       <label>Year of Graduation</label>
                                       <br>
                                       <input  name="YearofGraduation" class="form-control" type="text" maxlength="4"value="<?php echo $YearofGraduation;?>">
                                    </div>
                                 </div>
                              </div>
                                 <!-- <input type="hidden" id="level" value="2" name="level">
                              <div class="col-md-12 next-button-row margin-top-20" style="">
                                  <input  style="display: inline-block;" value="Update" class="btn btn-primary next-profile-btn pull-right" type="submit">
                              </div> -->
                           </div>
                        </div>
                     <!-- </form> -->
                  </div>

                  <div class="tab-pane" id="3a">
                   <!-- <form action="#"> -->
                     <div class="ptd-box" id="family-tab-details">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Father's (or Guardian's) Name</label>
                                 <br>
                                 <input name="FatherName" class="form-control" type="text" 
                                  value="<?php echo $FatherName;?>">
                              </div>
                              <div class="form-group">
                                 <label>Father's (or Guardian's) Profession</label>
                                 <br>
                                 <input  name="FatherProfession" class="form-control" type="text"  
                                 value="<?php echo $FatherProfession;?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Mother's (or Guardian's) Name</label>
                                 <br>
                                 <input  name="MotherName" class="form-control" type="text"  
                                 value="<?php echo $MotherName;?>">
                              </div>
                              <div class="form-group">
                                 <label>Mother's (or Guardian's) Profession</label>
                                 <br>
                                 <input name="MotherProfession" class="form-control" type="text" 
                                  value="<?php echo $MotherProfession;?>">
                              </div>
                           </div>
                           <div class="col-md-12 margin-top-20" >
                              <input value="Update" class="btn btn-primary next-profile-btn pull-right" type="submit">
                           </div>
                        </div>
                     </div>
                  <!-- </form> -->
                  </div>

                  <div class="tab-pane" id="4a">
                  <!-- <form enctype="multipart/form-data" action="#" > -->
                     <div class="ptd-box" style="text-align: left" id="Div2">
                        <div class="academic-student">

                           <div class="container-fluid myData">                 
                              <div id="option3" style="display: block;">
                              <!--1st-->
                              <?php
                              if($StreamStatus=='Graduate')
                              { 
                              ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                       <div class="text-center">
                                          <p>
                                             <strong class="font-size-14">Current Year Academic Scores</strong>
                                             <br>Please enter your scores below
                                          </p>
                                       </div>
                                       <div class="row custom-form">
                                          <div class="col-xs-7">
                                             <div class="form-group">
                                                <label>Subject</label>
                                                <input  name="ClassX" value="<?php echo $ClassX;?>" type="text" class="form-control">
                                                <input  value="<?php echo $ClassXII;?>" name="ClassXII" type="text" class="form-control">
                                                <input  value="<?php echo $College;?>" name="College" type="text" class="form-control">
                                               
                                               
                                             </div>
                                          </div>
                                         
                                       </div>
                                       
                                       
                                     
                                 </div>
                                 <?php
                                    }
                                    else
                                    {
                                 ?>

                                 <!--2nd-->

                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="text-center">

                                          <p>
                                             <strong class="font-size-14">Current Year Academic Scores</strong>
                                             <br>Please enter your scores below
                                          </p>
                                       </div>
                                       <div class="row custom-form">
                                          <div class="col-xs-7">
                                         
                                             <div class="form-group">
                                                <label>Subject</label>
                                                <?php 
                                                foreach($subject as $subjectper)
                                                {
                                                ?>
                                                 
                                                   <input type="text" <?php if($subjectper->YearStatus=='Current')
                                                {
                                                ?>
                                                   value="<?php echo $subjectper->EducationSubjectName ?>"  name="EducationSubjectName[]"  class="form-control">
                                                   <input type="hidden"  value="<?php echo $subjectper->EducationSubjectId; ?>" name="EducationSubjectId[]">
                                                   <?php
                                                } 
                                                ?>
                                                <?php 
                                                }
                                                ?>
                                             </div>
                                          </div>
                                          <div class="col-xs-5">
                                             <div class="form-group">
                                                <label>CGPA / %age</label>
                                                <?php 
                                                foreach($subject as $subjectper)
                                                {
                                                ?>
                                                    <input type="text" <?php if($subjectper->YearStatus=='Current')
                                                {
                                                ?>
                                                   value="<?php echo $subjectper->SubjectCgpa ?>"  name="SubjectCgpa[]"  class="form-control">
                                                   <?php
                                                } 
                                               
                                                }
                                                ?>
                                             </div>
                                             
                                          </div>
                                          
                                       </div>
                                       <div class="col-md-12 text-center margin-bottom-10">
                                          <div><strong>-or-</strong></div>
                                          <div>Upload your marksheet</div>
                                       </div>
                                       <!-- <div class="input-group controls col-md-12  margin-bottom-10" id="event-none-file">
                                          <input type="file" class="filename display-none">
                                          <input type="file" name="current_year_file_name" class="form-control uploadlogo" readonly="readonly" style="border-radius:0!important;height: auto;">
                                          <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 2MB)</small>
                                          
                                       </div> -->
                                                                                 
                                       <div>
                                       <?php if($subjectper->YearStatus=='Current' && $subjectper->MarksheetImage!=''){   ?>
                                          <a class="current_year_file_name" target="_blank"  href="<?php echo base_url(); ?>Upload/Marksheet/<?php echo $subjectper->MarksheetImage; ?>" style="font-size: 12px;text-decoration:underline;"><?php echo $subjectper->MarksheetImage?>
                                          </a>
                                          <?php }
                                    ?>
                                       </div>
                                    </div>

                                    <div class="col-lg-6">
                                       <div class="text-center">
                                          <p>
                                             <strong class="font-size-14">Last Year Academic Scores</strong><br>Please enter your scores below</p>
                                       </div>
                                       <div class="row custom-form">
                                          <div class="col-xs-7">
                                             <div class="form-group">
                                                <label>Subject</label>
                                                <?php
                                                foreach($subject as $subjectper)
                                                {  
                                                ?>
                                                   <input type="text" <?php if($subjectper->YearStatus=='Last')
                                                   {
                                                   ?>
                                                      value="<?php echo $subjectper->EducationSubjectName ?>"  name="EducationSubjectName[]"  class="form-control">
                                                      <input type="hidden"  value="<?php echo $subjectper->EducationSubjectId; ?>" name="EducationSubjectId[]">
                                                      <?php
                                                   } 
                                                   ?>
                                                <?php
                                                }
                                                ?>
                                             </div>
                                          </div>
                                          <div class="col-xs-5">
                                             <div class="form-group">
                                                <label>CGPA / %age</label>
                                                <?php
                                                foreach($subject as $subjectper)
                                                {
                                                ?>
                                                <input type="text" <?php if($subjectper->YearStatus=='Last')
                                                {
                                                ?>
                                                   value="<?php echo $subjectper->SubjectCgpa ?>"  name="SubjectCgpa[]"  class="form-control">
                                                   <?php
                                                } 
                                                ?>
                                                
                                                <?php
                                                }
                                                ?>
                                             </div>
                                          </div>
                                       </div>
                                       <input type="hidden" value="school_student" class="selected_education">
                                       <div class="col-md-12 text-center margin-bottom-10">
                                          <div><strong>-or-</strong></div>
                                          <div>Upload your marksheet</div>
                                       </div>
                                       <!-- <div class="input-group controls col-md-12  margin-bottom-10" id="event-none-file">
                                          <input type="file" class="filename display-none">
                                          <input type="file" name="last_year_file_name" class="uploadlogo form-control" readonly="readonly" style="border-radius:0!important;height: auto;">
                                          <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 2MB)</small>
                                          
                                       </div> -->
                                       
                                       <div>
                                      
                                       <a class="last_year_file_name" target="_blank" 
                                       href="<?php echo base_url(); ?>Upload/Marksheet/<?php echo $subjectper->MarksheetImage?>" style="font-size: 12px;text-decoration:underline;"><?php echo $subjectper->MarksheetImage?></a>
                                          
                                       </div>
                                       </div>
                                 </div>

                                <?php
                                    }
                                ?>

                              </div>

                              </div>
                                 <!-- <input type="hidden" id="Hidden3" value="4" name="level"> -->
                        
                     </div>
     
                        <div class="col-md-12 margin-top-20" style="padding-right:0;padding-left:0;">
                          <input value="Update" class="btn btn-primary next-profile-btn pull-right" type="submit">
                        </div>
                     </div>
                  </form>
                  </div>
            </div>
         </div>
      </div>
   </section>
</section>
</section>

<?php 
 $this->load->view('common/footer_second');
?>

<!-- <script>
$(function() { 
    setTimeout(function() {
  $('#errorMessage').fadeOut('fast');
}, 3000);
   
});
$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 3000);
   
});

</script> -->
<script>

$(document).ready(function()
{
		$("#valid_forms").validate(
		{
			   rules:{

                  FirstName:{
								         required: true,
										},	
						},

            messages: {
                  FirstName: {
						         required: "Please enter a name",
										},
						
						}
				
		});
});
					                 					               
</script>