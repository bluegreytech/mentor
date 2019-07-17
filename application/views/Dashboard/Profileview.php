<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');
$this->load->view('common/sidebar_second');
$UserId=$this->session->userdata('UserId');
?>


<section id="main-content" class="my-profile-details-page">
   <section class="wrapper">
     <div class="c_title">
       <h2> My Profile</h2>
       <span class="pull-right">
         <a href="<?php echo base_url();?>Dashboard/Profileedit/<?php echo $UserId ;?>" class="btn btn-primary-ghost btn-xs" style="margin-top: 1px;"><i class="fa fa-edit "></i> Edit Profile
         </a>
       </span>
      
       <div class="clearfix"></div>
     </div>
     <div class="c_panel panel-blank">

       <div class="c_content">
         <div class="row">
           <div class="col-md-4 mobile-personal-details">
             <div class="row">

               <div class="col-md-12">
                 <div style="border:1px solid #e9e9e9; border-radius:2px; overflow:hidden;     margin-bottom: 15px;">
                   <div>


                     <div class="profile-about">
                       <h4>
                         <i class="fa fa-user" aria-hidden="true"></i>Personal Details
                       </h4>

                       <div class="col-md-3" style="padding: 0;">
                         <div class="view-profile-user" style="padding: 0;text-align: center;margin-top: 15px;">
                           <span style="border: 1px #e9e9e9 solid;border-radius: 50%;padding: 2px;display: inline-block;">
                           <img src="http://mindlerdashboard.imgix.net/a6.png?w=110&h=110&fit=crop&crop=faces" />                           </span>
                         </div>
                       </div>
                        <div class="col-md-9" style="padding: 0;">
                         <div class="table-responsive about-table" style="padding-left: 15px;">
                           <table class="table">
                             <tbody>
                               <tr><th style="font-size: 13px;text-transform: capitalize;">
                               <?php echo $FirstName.' '.$LastName?></th></tr>
                               <tr>
                                 <td  style="padding-left: 0;text-transform: lowercase;"><i class="fa fa-envelope margin-right-5" aria-hidden="true"  style="width: 15px;    font-size: 11px;"></i> <?php echo $EmailAddress?></td>
                               </tr>
                               <tr>
                                 <td  style="padding-left:0;"><i class="fa fa-phone margin-right-5" aria-hidden="true"  style="width: 15px;"> <?php echo $PhoneNumber?></td>
                               </tr>
                               <tr>
                                  <td  style="padding-left: 0;"> <i class="fa fa-calendar margin-right-5" aria-hidden="true"  style="width: 13px;float: left;font-size: 10px;margin-top: 3px;"></i><?php echo $DateofBirth?></td>
                               </tr>
                               <tr>
                                 <td  style="padding-left: 0;"><i class="fa fa-user  margin-right-5" aria-hidden="true"  style="width: 15px;"></i><?php echo $Gender?></td>
                               </tr>
                             </tbody>
                           </table>
                         </div>

                       </div>

                     </div>
                   </div>
                 </div>

               </div>
             </div>
           </div>
           <div class="col-md-8 ">
             <div class="row">
            <div class="col-md-12">
              <div style="border:1px solid #e9e9e9; border-radius:2px; overflow:hidden">
               <div class="profile-about">
                  <h4><i class="fa fa-book" aria-hidden="true"></i>Education Details</h4>
                  <div class="table-responsive about-table">
                     <table class="table">
                        <tbody>
                              <tr>
                               
                                 <?php 
                                       if($StreamStatus=='Graduate')
                                       {
                                          ?>
                                          <th>College</th>
                                          <?php
                                       }
                                       else
                                       {
                                          ?>
                                          <th>School</th>
                                          <?php
                                       }
                                    ?>
                                 <td><?php echo $EducationName?></td>
                              </tr>
                              <tr>
                              <?php 
                                       if($StreamStatus=='Graduate')
                                       {
                                        ?>
                                            <th>University</th>
                                            <td><?php echo $UnivesityName ;?></td>
                                        <?php
                                        }else
                                        {
                                        ?>
                                            <th>Board</th>
                                            <td><?php echo $BoardName ;?></td>
                                        <?php 
                                        }
                                        ?>
                              </tr>
                              <tr>
                              <?php 
                                       if($StreamStatus=='Graduate')
                                       {
                                        ?>
                                            <th>Course</th>
                                            <td><?php echo $Course ;?></td>
                                        <?php
                                        }else
                                        {
                                        ?>
                                             <th>Class</th>
                                             <td><?php echo $ClassStream?></td>
                                        <?php 
                                        }
                                        ?>
                              </tr>
                            
                              <tr>
                                 <th>Year of Passing</th>
                                 <td><?php echo $YearofGraduation?></td>
                              </tr>          
                        </tbody>
                     </table>
                  </div>
               </div>
              <div class="profile-about ">
                <h4>
                  <i class="fa fa-group" aria-hidden="true"></i>Family Details
                </h4>
                <div class="table-responsive about-table">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th>Father's Name </th>
                        <td><?php echo $FatherName?></td>
                      </tr>
                      <tr>
                        <th>Father's Profession </th>
                        <td><?php echo $FatherProfession?></td>
                      </tr>
                      <tr>
                        <th>Mother's Name </th>
                        <td><?php echo $MotherName?></td>
                      </tr>
                      <tr>
                        <th>Mother's Profession </th>
                        <td><?php echo $MotherProfession?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="profile-about ">
                <h4>
                  <i class="fa fa-mortar-board" aria-hidden="true"></i>Academic Details
                </h4>
                <div class="table-responsive about-table academic-details-box">
                  <div class="row">
                     <div class="col-md-12 career-academic">
                    <?php 
                    if($StreamStatus=='Graduate')
                    {
                    ?>
                      <table class="table">

                      <tbody>
                        <tr>
                          <th colspan="2">Academic Scores</th>
                        </tr>
                        
                        <tr>
                          <th>College </th>
                          <td><?php echo $ClassX?></td>
                        </tr>
                          
                        <tr>
                          <th>Class XIIth </th>
                          <td><?php echo $ClassXII?></td>
                        </tr>

                        <tr>
                          <th>Class Xth</th>
                          <td><?php echo $College?></td>
                        </tr>
                                                
                      </tbody>
                      </table>
                      </div>
                    
                    <?php
                    }
                    else
                    {
                    ?>






                      <table class="table">

                        <tbody>
                          <tr>
                            <th colspan="2">Current Year Academic Scores</th>
                          </tr>
                          <?php 
                            foreach($subject as $subjectper)
                            {
                            ?>
                          <tr>
                          
                          <?php if($subjectper->YearStatus=='Current'){   ?>
                                <td style="padding-right: 0!important;"> <?php echo $subjectper->EducationSubjectName ?></td>
                              <td  class="padding-left-pro"><?php echo $subjectper->SubjectCgpa ?></td>
                               <?php }
                                ?>
                           
                           </tr>
                           <?php 
                            }
                            ?>
                           <tr>
                              <?php if($subjectper->YearStatus=='Current' && $subjectper->MarksheetImage!=''){   ?>
                                <td><a target="_blank" href="<?php echo base_url(); ?>/upload/Marksheet/<?php echo $subjectper->MarksheetImage?>" style="text-decoration:underline;"><?php echo $subjectper->MarksheetImage?></a></td>
                                  <?php }
                                    ?>
                                
                          </tr>
                                                  
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-12 career-academic  margin-top-25">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th colspan="2">Last Year Academic Scores</th>
                          </tr>
                          <?php 
                            foreach($subject as $subjectper)
                            {
                            ?>
                          <tr>
                        
                               <?php if($subjectper->YearStatus=='Last'){   ?>
                                <td style="padding-right: 0!important;"> <?php echo $subjectper->EducationSubjectName ?></td>
                              <td  class="padding-left-pro"><?php echo $subjectper->SubjectCgpa ?></td>
                               <?php }
                                ?>
                           </tr>
                           <?php 
                            }
                            ?>
                           <tr>
                              <?php if($subjectper->YearStatus=='Last' && $subjectper->MarksheetImage!=''){   ?>
                                <td><a target="_blank" href="<?php echo base_url(); ?>/upload/Marksheet/<?php echo $subjectper->MarksheetImage?>" style="text-decoration:underline;"><?php echo $subjectper->MarksheetImage?></a></td>
                                  <?php }
                                    ?>
                                
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  <?php
                    }
                  ?>

                  </div>
                </div>
              </div>
              </div>
            </div>
            
         </div>
           </div>

           <div class="col-md-4 desktop-personal-details">
             <div class="row">

               <div class="col-md-12">
                 <div style="border:1px solid #e9e9e9; border-radius:2px; overflow:hidden">
                   <div class="">


                     <div class="profile-about">
                       <h4>
                         <i class="fa fa-user" aria-hidden="true"></i>Personal Details
                       </h4>

                       <div class="col-md-3" style="padding: 0;">
                         <div class="view-profile-user">
                           <span style="border: 1px #e9e9e9 solid;border-radius: 50%;padding: 2px;display: inline-block;">
                           <img src="<?php echo base_url();?>default/images/a6.png" />                 
                           </span>
                         </div>
                       </div>
                       <div class="col-md-9" style="padding: 0;">
                         <div class="table-responsive about-table" style="padding-left: 15px;">
                           <table class="table">
                             <tbody>
                               <tr>
                                 <th style="font-size: 13px;text-transform: capitalize;"><?php echo $FirstName.' '.$LastName?></th>
                               </tr>
                               <tr>

                                 <td  style="text-transform: lowercase;">
                                   <i class="fa fa-envelope margin-right-5" aria-hidden="true"  style="width: 15px;"></i>
                                   <?php echo $EmailAddress?>                                </td>
                               </tr>
                               
                               <tr>

                                 <td>
                                   <i class="fa fa-phone margin-right-5" aria-hidden="true"  style="width: 15px;"></i>
                                   <?php echo $PhoneNumber?>                                 </td>
                               </tr>

                               <tr>

                                 <td>
                                   <i class="fa fa-calendar margin-right-5" aria-hidden="true"  style="width: 15px;"></i>
                                   <?php echo $DateofBirth?>                                </td>
                               </tr>
                               <tr>

                                 <td>
                                   <i class="fa fa-user  margin-right-5" aria-hidden="true"  style="width: 15px;"></i>
                                   <?php echo $Gender?>                              </td>
                               </tr>
                             </tbody>
                           </table>
                         </div>

                       </div>

                     </div>
                   </div>
                 </div>

               </div>
             </div>
           </div>
           
         </div>
      </div>
   </section>
</section>
</section>
<!-- test page code -->

<?php 
 $this->load->view('common/footer_second');
?>