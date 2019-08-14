<link href="<?php echo base_url()?>default/assets/prelogin_new/css/returning.css" type="text/css" rel="stylesheet">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
<section class="header-layer">
  <div class="black-sheet">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <h6></h6>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 bg-sec">
      </div>
    </div>
  </div>
</section>


<section id="new-login-screens" style="padding-bottom: 130px!important;">
   <div class="container">
      <div class="row" >
         <div class="col-md-12">
            <div style="float:left; width:100%">
               <div class="sign-up-box" style="position: relative;">
                
                  <div id="emailError" style="width: 100%;padding: 15px;position: absolute;left: 0px;top: -6px;font-size: 13px; display: none">
                     <i class="fa fa-close" aria-hidden="true" style=" position: absolute;
                        right: 20px;
                        font-size: 15px;
                        color: #a7a7a7;
                        top: 20px;
                        cursor: pointer;"></i>
                     <p style="background: #f6f6f6;color: #444;padding: 15px 20px;font-size: 13px;border: 1px #e7e7e7 solid;border-radius: 2px;">This email id already exists.<br><a href="login.php" class="emailError my-ghost-btn" style="color: #444;border: #444 solid 1px;padding: 2px 10px;margin-top: 10px;display: inline-block;  font-size: 12px;">Login</a></p>
                  </div>
                  
                  <h4>Sign up with Mentor
                  </h4>
                  <p>
                     <small>-Using-</small>
                  </p>
                  <div class="col-md-6 social-link-facebook" style="padding-left:0; padding-right:5px">
                     <a href="#" class="socialbutton">
                     <img src="<?php echo base_url() ;?>default/assets/prelogin_new/img/facebook-icon.png"/>facebook
                     </a>
                  </div>
                  <div class="col-md-6 social-link-google"  style="padding-right:0; padding-left:5px">
                     <a href="#" class="socialbutton">
                     <img src="<?php echo base_url()?>default/assets/prelogin_new/img/google-icon.png"  />google
                     </a>
                  </div>
                  <div class="clear"></div>
                  <p>
                     <small>-Or Using-</small>
                  </p>
                  <form method="post" id="registrationForm" action="<?php echo base_url();?>home/register">
                     <input type="hidden" name="ci_csrf_token" value="" />
                      <div class="placeholder-input">
                        <span class="relative-span"><input  type="text" class="form-control" required="" name="username" id='username'  style="text-transform: capitalize;" placeholder="Username" />
                        </span>
                      </div>
                      <div class="placeholder-input">
                        <span class="relative-span"><input  type="email" id='email' name="email" required="" value="" class="form-control" placeholder="Email Address"></span>
                      </div>
                        <div class="placeholder-input">
                        <span class="relative-span"><input  type="password" id='password' name="password"  value="" class="form-control" placeholder="******"></span>
                      </div>
                      <div class="placeholder-input">
                        <span class="relative-span"><input  type="text" id='mobile-number' name="phone" required=""  class="mobile-number form-control" placeholder="Mobile Number" /></span>
                      </div>
                       <div class="placeholder-input">
                        <span class="relative-span"><input  type="text" id='city' name="city" required="" value="" class="form-control" placeholder="City"></span>
                      </div>
                        <div class="form-group" >
                          <label class="pull-left">Desgination</label>
                           <select class="form-control" id="desgination" name="desgination"> 

                            <option  disabled="" selected=" ">Please Select
                              </option>
                              <option value="student">Student</option>
                              <option value="teacher">Teacher</option>
                              <option  value="mother">Mother</option>
                              <option  value="father">Father</option>
                              <option  value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group" >
                          <label class="pull-left">I Need help with</label>
                           <select class="form-control" id="Streambox" name="StreamId">
                            <option  disabled="" selected=" ">Please Select </option>
                            <?php if($streamlist){ 
                                foreach ($streamlist as $row) {  echo "<pre>"; print_r($streamlist)?>
                              <option value="<?php echo $row->StreamTypeId;?>">Choosing a <?php echo $row->StreamName;?></option>
                            <?php  } } ?> 
                            </select>
                        </div>
                          <div class="form-group" id="iam" >
                          <label class="pull-left">I AM IN</label>
                            <select class="form-control" id="StandardId" name="StandardId">
                              <option  disabled="" selected="">Please Select </option>
                            </select>
                        </div>
                         

                      <div class="lockscreen-email" style="color: red;margin-top: -18px;float: left;"></div>
                                         
                     <p>
                        <input type="submit" class="new-btn-orange" id="submitFrm" value="Sign up" >
                     </p>
                    
                  </form>
                  <p class="bottom-link">Already have an account? 
                    
                      <a href="<?php echo base_url()?>home/login">Log in</a>

                    

                     
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php 
 $this->load->view('common/footer');
?>
<script>
$(document).ready(function(){
  url="<?php echo base_url(); ?>home/getstandard"
  
     $("#iam").hide();
    $('#Streambox').on('change', function() {
       $('#iam').show();
      var id= this.value ;
      $.ajax({
        type: "POST",
        url: url,
        data:{id:id},
        success: function(data){
         // console.log(data);
            $('#StandardId').html('<option value="">Please Select</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    //console.log(this.StandardId);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.StandardId).text('Class '+this.Standard);           
                            $('#StandardId').append(option);
                        });
          }
        }
      });    
    });
});

</script>