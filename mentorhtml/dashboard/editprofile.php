<?php include 'header.php';?>

     <?php include 'sidebar.php';?>
      
<section id="main-content" class="my-profile-page">
   <section class="wrapper">
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
                     <form action="#">
                     <div class="ptd-box " id="Div1">
                       
                        <div class="row">
                           <div class="col-md-3 text-center">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                 <div class="fileupload-preview fileupload-exists thumbnail">
                                    <img src="http://mindlerdashboard.imgix.net/a6.png?w=120" /> 
                                    
                                 </div>
                                 <div>
                                    <span class="btn btn-white btn-file btn-xs">
                                    <span class="fileupload-exists show-important">Select image</span>
                                    <input id="register-photo"  type="file" name="userfile"  class="default" />
                                    </span>
                                 </div>

                                <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 500kb)</small>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group height-min">
                                 <label>Full Name</label>
                                 <br>
                                 <!-- <span class="text-cap">Mit Patel</span> -->
                                 <input id="first_name" required="" name="first_name" class="form-control" type="text" value="Mit Patel">
                              </div>
                              <div class="form-group height-min">
                                 <label class="">Email Address</label>
                                 <br>
                                 <span class="text-low">mitnp17@gmail.com</span>
                                  
                                   </div>
                              <a href="#" class="add-another-email" style="text-decoration: underline; display: block">Add another email</a>
                              <div class="form-group height-min" id="for-additional-email" style="display: none">
                                 <div><label>Add Email </label><a href="#" class="delete-another-email" >Cancel</a></div>
                                <span class="additional-email"><input id="anotherEmail" name="Email1" class="form-control text-low" style="text-transform: none;" type="text" value=""></span>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Phone Number</label>
                                 <br>
                                 <input id="phoneno" required="" name="verifyphone" class="form-control" type="text" maxlength="10" value="8200308821">
                              </div>
                              <div class="form-group">
                                 <label>Gender</label><br>
                                 <div class="radio" style="margin-top:0" id="radioRequired">
                                    <label style="padding-left:0">
                                    <input type="radio" name="gender" Checked value="Male" class="icheck-blue"> Male
                                    </label>
                                    <label>
                                    <input type="radio" name="gender"  value="Female" class="icheck-blue"> Female
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Date of Birth</label>
                                 <br>
                                 <div class="input-group" id="dateOfBirth">
                                   
                                    <input value="07/16/1991" class="form-control" name="dob" required="" placeholder="MM/DD/YYYY" type="text" id="datepicker">
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" id="level" value="1" name="level">
                           <div class="col-md-12 margin-top-20" style="text-align: right">
                              <input id="" value="Update" class="btn btn-primary next-profile-btn" type="submit"></div>
                        </div>
                     </div>
                  </form>
                 </div>

                  <div class="tab-pane" id="2a">
                         <form action="#">
                        <div class="ptd-box" id="education-tab-details">
                           <div class="row">
                              <div class="for-school-student" style="display: block;">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>School</label>
                                       <br>
                                       <input required="" value="aaaaaaaa" id="school" name="school" class="form-control" type="text" >
                                    </div>
                                    <div class="form-group">
                                       <label>Board</label>
                                       <br>
                                       <input required="" value="CBS" id="board" name="board" class="form-control" type="text" >
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Class</label>
                                       <br>
                                       <input required="" value="10th" id="class" name="class" class="form-control" type="text" >
                                    </div>
                                    <div class="form-group">
                                       <label>Year of Graduation</label>
                                       <br>
                                       <input required="" value="2009" id="graduation" name="graduation" class="form-control" type="text" maxlength="4">
                                    </div>
                                 </div>
                              </div>
                                 <input type="hidden" id="level" value="2" name="level">
                              <div class="col-md-12 next-button-row margin-top-20" style="">
                                  <input  style="display: inline-block;" value="Update" class="btn btn-primary next-profile-btn pull-right" type="submit">
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>

                  <div class="tab-pane" id="3a">
                     <form action="#">
                     <div class="ptd-box" id="family-tab-details">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Father's (or Guardian's) Name</label>
                                 <br>
                                 <input required="" value="Narendrabhai" id="fathername" name="fathername" class="form-control" type="text">
                              </div>
                              <div class="form-group">
                                 <label>Father's (or Guardian's) Profession</label>
                                 <br>
                                 <input required="" value="Farmar" id="father_profession" name="father_profession" class="form-control" type="text">
                              </div>
                           </div>
                           <input type="hidden" id="Hidden2" value="3" name="level">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Mother's (or Guardian's) Name</label>
                                 <br>
                                 <input required="" value="Daxabahen"  id="mothername" name="mothername" class="form-control" type="text">
                              </div>
                              <div class="form-group">
                                 <label>Mother's (or Guardian's) Profession</label>
                                 <br>
                                 <input required="" value="House Wife" id="mother_profession" name="mother_profession" class="form-control" type="text">
                              </div>
                           </div>
                           <div class="col-md-12 margin-top-20" >
                              <input value="Update" class="btn btn-primary next-profile-btn pull-right" type="submit">
                           </div>
                        </div>
                     </div>
                  </form>
                  </div>

                  <div class="tab-pane" id="4a">
                     <form enctype="multipart/form-data" action="#" >
                     <div class="ptd-box" style="text-align: left" id="Div2">
                        <div class="academic-student">
                           <div class="container-fluid myData">
                            
                                                
                              <div id="option3" style="display: block;">
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <div class="text-center">
                                          <p>
                                             <strong class="font-size-14">Current Year Academic Scores</strong><br>Please enter your scores below
                                          </p>
                                       </div>
                                       <div class="row custom-form">
                                          <div class="col-xs-7">
                                             <div class="form-group">
                                                <label>Subject</label>
                                                <input id="text" name="subject1" value="Account" type="text" class="form-control">
                                                <input id="text" value="" name="subject2" type="text" class="form-control">
                                                <input id="text" value="" name="subject3" type="text" class="form-control">
                                                <input id="text" value="" name="subject4" type="text" class="form-control">
                                                <input id="text" value="" name="subject5" type="text" class="form-control">
                                                <input id="text" value="" name="subject6" type="text" class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-xs-5">
                                             <div class="form-group">
                                                <label>CGPA / %age</label>
                                                <input id="text" value="60" name="marks1" type="text" class="form-control">
                                                <input id="text" value="" name="marks2" type="text" class="form-control">
                                                <input id="text" value="" name="marks3" type="text" class="form-control">
                                                <input id="text" value="" name="marks4" type="text" class="form-control">
                                                <input id="text" value="" name="marks5" type="text" class="form-control">
                                                <input id="text" value="" name="marks6" type="text" class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 text-center margin-bottom-10">
                                          <div><strong>-or-</strong></div>
                                          <div>Upload your marksheet</div>
                                       </div>
                                       <div class="input-group controls col-md-12  margin-bottom-10" id="event-none-file">
                                          <input type="file" class="filename display-none">
                                          <input type="file" name="current_year_file_name" class="form-control uploadlogo" readonly="readonly" style="border-radius:0!important;height: auto;">
                                          <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 2MB)</small>
                                          
                                       </div>
                                                                                 
                                       <div>
                                          <a class="current_year_file_name" target="_blank" href="#" style="font-size: 12px;text-decoration:underline;">imagename
                                          </a>
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
                                                <input id="text" value="" name="subject21" type="text" class="form-control">
                                                <input id="text" value="" name="subject22" type="text" class="form-control">
                                                <input id="text" value="" name="subject23" type="text" class="form-control">
                                                <input id="text" value="" name="subject24" type="text" class="form-control">
                                                <input id="text" value="" name="subject25" type="text" class="form-control">
                                                <input id="text" value="" name="subject26" type="text" class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-xs-5">
                                             <div class="form-group">
                                                <label>CGPA / %age</label>
                                                <input id="text" value="" name="marks21" type="text" class="form-control">
                                                <input id="text" value="" name="marks22" type="text" class="form-control">
                                                <input id="text" value="" name="marks23" type="text" class="form-control">
                                                <input id="text" value="" name="marks24" type="text" class="form-control">
                                                <input id="text" value="" name="marks25" type="text" class="form-control">
                                                <input value="" id="text" name="marks26" type="text" class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                       <input type="hidden" value="school_student" class="selected_education">
                                       <div class="col-md-12 text-center margin-bottom-10">
                                          <div><strong>-or-</strong></div>
                                          <div>Upload your marksheet</div>
                                       </div>
                                       <div class="input-group controls col-md-12  margin-bottom-10" id="event-none-file">
                                          <input type="file" class="filename display-none">
                                          <input type="file" name="last_year_file_name" class="uploadlogo form-control" readonly="readonly" style="border-radius:0!important;height: auto;">
                                          <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 2MB)</small>
                                          
                                       </div>
                                       
                                       <div>
                                          <a class="last_year_file_name" target="_blank" href="#" style="font-size: 12px;text-decoration:underline;">imagename</a></div>
                                       </div>
                                 </div>
                              </div>
                                                         </div>
                           <input type="hidden" id="Hidden3" value="4" name="level">
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
</section> s


<?php include 'footer.php';?>