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
        <div class="col-md-12 nopadd">
           <div id="exTab1">          
              <div class="tab-content clearfix">
               

                  <form method="POST" action="<?php echo base_url();?>home/profile">
                     <div class="row">
                           <div class="col-md-3 text-center">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                 <div class="fileupload-preview fileupload-exists thumbnail">
                                    <img src="<?php echo base_url(); ?>default/images/a6.png" /> 
                                 </div>
                                 <div>
                                 <input type="hidden"  value="<?php //echo $UserId; ?>" name="UserId">
                                    <span class="">
                                    <span class="fileupload-exists show-important">Select image</span>
                                  
                                     <input type="file" name="profile_image" value="<?php //echo $ProfileImage;?>"  class="default" /> 
                                    </span>
                                 </div>

                                <small style="font-size:10px;display: block;color: #888;margin-top: 5px;">(upload png/jpeg, max 500kb)</small>
                              </div>
                           </div>

                           <div class="col-md-9">
                              <div class="form-group height-min">
                                 <label>User Name</label>
                                 <br>
                                 <input type="hidden"   value="<?php echo $UserId; ?>" name="UserId">
                                 <input name="Username" value="<?php echo $username;?>" class="form-control" type="text" minlength="3" maxlength="50" >
                              </div>
                             
                              <div class="form-group">
                                 <label>Phone Number</label>
                                 <input name="PhoneNumber" class="form-control" type="text" maxlength="13" value="<?php echo $phone;?>">
                              </div>
                               <div class="form-group height-min">
                                 <label class="">Email Address</label>
                              
                                 <input name="email" value="<?php echo $email;?>" class="form-control" type="text">
                                    
                              </div>                 
                              
                               <div class="form-group height-min">
                                 <label class="">Location</label>
                                 <br>
                                 <input name="location" value="" class="form-control" type="text" value="<?php echo $location;?>">
                                    
                              </div>
                              <div class="form-group height-min">
                                <div class="form-group">
                                 <label>My Age</label>
                                 <br>
                                <select class="form-control" name="age">
                                  <option value="" disabled="" selected="">Please Select</option>
                                    <?php
                                    for($i = 5; $i<=75; $i++) {
                                   ?>
                                    <option value="<?php echo $i ;?>" <?php if($age){ echo "selected";}?> ><?php echo $i ;?></option>
                                   <?php  } ?>
                                </select>
                              </div>
                              </div>

                               <div class="form-group height-min">
                                <div class="form-group">
                                 <label>I am currently doing</label>
                                 <br>
                                <select class="form-control" name="choicecareerassess">
                                 
                                  <?php //echo "<pre>";print_r($choicecareerassess); die;
                                   if($choicecareer="two_to_seven"){ ?>
                                      <option value="87">Elementary Career Assessment - 5th Class- 7th class </option>
                                      <option value="88" >Elementary Career Assessment - 2nd -4th Class</option>
                                      <?php }elseif($choicecareer="nine_to_tweleve"){ ?>

                                      <?php }elseif($choicecareer="subject_selector"){ ?>
                                      <?php }elseif($choicecareer="engineer_selector"){ ?>

                                   <?php }  ?>
                                   
                                </select>
                              </div>
                              </div>
                               <div class="form-group height-min">
                                <div class="form-group">
                                 <label>My Current Stage</label>
                                 <br>
                                <select class="form-control" name="current_stage">
                                  <option value="" disabled="" selected="">Please Select</option>
                                  <option value="1" >I have no idea about my career </option>
                                 <option value="2">I am confused  among various career options</option>
                                 <option value="3">I am in search of  more information  about my career choice.</option>
                                 <option value="4">I have Information but don't have a execution  plan</option>
                                 <option value="5">I have a proper execution  plan for my career</option>
                                </select>
                              </div>
                              </div>
                           </div>
                           
                           <input type="hidden" id="level" value="1" name="level">
                           <div class="col-md-12 margin-top-20" style="text-align: right">
                              <input value="Update" class="btn btn-primary next-profile-btn" type="submit">
                           </div>
                        </div>
                  </form>
              </div>
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