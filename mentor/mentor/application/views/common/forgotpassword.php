<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
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
               <h4>Forgot password in to Mentor</h4>
               <br>
             
               <?php if(($this->session->flashdata('error'))){ ?>
                     <div class="alert alert-danger" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
                     </div>
               <?php } ?>
               <?php if(($this->session->flashdata('warning'))){ ?>
                     <div class="alert alert-warning" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('warning'); ?></strong> 
                     </div>
               <?php } ?>
               <?php if(($this->session->flashdata('success'))){ ?>
                     <div class="alert alert-success" id="successMessage">
                     <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                     </div>
               <?php } ?>
               <form  id="form_forgotpass" method="post" action="<?php echo base_url();?>Home/Forgotpassword">
                  <div class="">
                     <span class="relative-span">
                     <input name="EmailAddress" type='email' class="form-control " placeholder="Email Address"/>
                           <p id="emailerror" class="pull-left"></p>
                     </span>
                  </div>
                  <br>
                   <p class="bottom-link" style="margin-top: 20px">
                     <span style="float:left">
                     <a href="<?php echo base_url()?>home/login" class="btn btn-black" style="color: #fff; background-color: #000;">Back to Log in</a>
                     </span>
                     <span style="float:right">
                     <input type="submit" name="logins" id="login-btn" class="new-btn-orange" value="Submit">
                     </span>
                  </p>
               <br>
                 
               </form>
              
            </div>
         </div>
      </div>
   </div>
</section>


<?php 
 $this->load->view('common/footer');
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

$(document).ready(function()
{
		$("#form_forgotpass").validate(
		{
					rules: {
                  EmailAddress: {
                        required: true,
                        email:true
                        },			
					},

					messages: {

                  EmailAddress: {
								required: "Plesae enter email address",
								// pattern : "Enter only characters and numbers and \"space , \" -",
								// minlength: "Please enter at least 5 and maximum to 200 letters!",
													},
										
									},
            errorPlacement: function (error, element) {
            console.log('dd', element.attr("name"))
            if (element.attr("name") == "EmailAddress") {
                error.appendTo("#emailerror");
            } else {
                error.insertAfter(element)
            }
        }

				
		});
});



</script>
