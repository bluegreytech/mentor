<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/css');
?>

<link href="assets/prelogin_new/css/returning.css" type="text/css" rel="stylesheet">
<section class="header-layer login-bg">
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
<section id="new-login-screens" class="addjust-center for-login scroll-stop" >
   <div class="container">
      <div class="row" >
         <div class="col-md-12">
            <div class="sign-up-box " style="position: relative;">
                              <div id="emailError" style="
                  width: 100%;
                  padding: 15px;
                  position: absolute;
                  /* background: #333; */
                  left: 0;
                  top: 0px; font-size: 13px; display: none
                  ">
                  <i class="fa fa-close" aria-hidden="true" style="
                     position: absolute;
                     right: 20px;
                     font-size: 15px;
                     color: #a7a7a7;
                     top: 20px;
                     cursor: pointer;
                     "></i>
                  <p style="background: #f6f6f6;
                     color: #444;
                     padding: 20px 20px;
                     font-size: 13px;
                     border: 1px #e7e7e7 solid;
                     border-radius: 2px;">This email id  does not exist.<br><a class="emailError my-ghost-btn" href="login/onboarding.html" style="
                     color: #444;
                     border: #444 solid 1px;
                     padding: 2px 10px;
                     margin-top: 10px;    display: inline-block;  font-size: 12px;">Create Account</a></p>
               </div>
               <h4>Reset password in to Mentor</h4>
               <br>
               <?php if($this->session->flashdata('error')){ ?>
                     <div class="alert alert-danger" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
                     </div>
               <?php } ?>
               <?php if($this->session->flashdata('warning')){ ?>
                     <div class="alert alert-warning" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('warning'); ?></strong> 
                     </div>
               <?php } ?>
               <?php if($this->session->flashdata('success')){ ?>
                     <div class="alert alert-success" id="successMessage">
                     <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                     </div>
               <?php } ?>
             <?php $attributes = array('name'=>'frm_reset','id'=>'frm_restpwd','class'=>'reset-form');
                  echo form_open('home/reset_password/'.$code,$attributes); ?>
                  <div class="">
                     <span class="relative-span">
                           <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                           <input type="hidden" value="<?php echo $code; ?>" name="code">
                           <input name="Password" type='password' class="form-control" placeholder="Enter new password" id="password"/>
                           <p id="pwderror" class="pull-left"></p>
                     </span>
                  </div>
                  <div class="">
                     <span class="relative-span type-password">
                           <input autocomplete="new-password"  name="confrim_password"  type="password"  class="form-control" placeholder="Re-type password" />
                           <p id="cpwderror" class="pull-left"></p>
                     </span>
                  </div>
                   <br>
                  <div class="form-group">
                     <input type="submit" name="logins" id="login-btn" class="new-btn-orange" value="Submit">
                 </div>
               </form>
               <p class="bottom-link" style="margin-top: 20px">
                  <span style="float:left">
                  <a href="<?php echo base_url()?>home/login">Back to Log in</a>
                  </span>
                  <span style="float:right">New to Mentor? 
                  <a href="<?php echo base_url()?>home/register">Create Account</a>
                  </span>
               </p>
            </div>
         </div>
      </div>
   </div>
</section>


<?php 
 $this->load->view('common/js');
?>
<script>
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

 $("#frm_restpwd").validate(
    {
    rules:{       
        Password:{
            required: true,            
        },  
        confrim_password:{
            required: true,
            equalTo:"#password",
        },      
       
    },
    // messages:{
    //  EmailAddress:"Email Address is required",
    // },
    errorPlacement: function (error, element) {
            console.log('dd', element.attr("name"))
            if (element.attr("name") == "Password") {
                error.appendTo("#pwderror");
            } else if (element.attr("name") == "ConfirmPassword") {
                  error.appendTo("#cpwderror");
              
            }else{
                  error.insertAfter(element)
            }
        }
    
});



</script>
