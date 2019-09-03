<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/css');
?>
<link href="assets/prelogin_new/css/returning.css" type="text/css" rel="stylesheet">

<section>
    <div class="ad-log-main">
      <div class="ad-log-in">
        <div class="ad-log-in-logo">
          <a href="#"><img src="images/logo.png" alt=""></a>
        </div>
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
        <div class="ad-log-in-con">
      <div>
                    <h4>Forgot Password</h4>
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


                        <div>
                            <div class="input-field s12">
                                <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                           <input type="hidden" value="<?php echo $code; ?>" name="code">
                           <input name="Password" type='password' class="custom " placeholder="Enter new password" id="password"/>
                           <p id="pwderror"></p>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12 ">
                                <input autocomplete="new-password"  name="confrim_password"  type="password"  class="custom" placeholder="Re-type password" >
                                <p id="cpwderror"></p>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="input-field s4">
                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style=""><input type="submit" value="Submit" class="waves-button-input" name="logins" id="login-btn"></i> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="<?php echo base_url()?>home">Back to Home</a></div>
                        </div>
                    </form>
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
            } else if (element.attr("name") == "confrim_password") {
                  error.appendTo("#cpwderror");
              
            }else{
                  error.insertAfter(element)
            }
        }
    
});



</script>
ERROR - 2019-09-03 12:35:30 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:36:01 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:36:02 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:36:24 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:37:25 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:39:20 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:39:41 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:47:18 --> 404 Page Not Found: Default/images
ERROR - 2019-09-03 12:59:38 --> 404 Page Not Found: Default/images
