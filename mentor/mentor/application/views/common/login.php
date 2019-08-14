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
               <h4>Log in to Mentor</h4>
               <p>   <small>-Using-</small>              </p>
               <div class="col-md-6 social-link-facebook" style="padding-left:0; padding-right:5px">
                  <a href="#" class="socialbutton">
                  <img src="<?php echo base_url()?>default/assets/prelogin_new/img/facebook-icon.png"/>facebook
                  </a>
               </div>
               <div class="col-md-6 social-link-google"  style="padding-right:0; padding-left:5px">
                  <a href="#" class="socialbutton">
                  <img src="<?php echo base_url()?>default/assets/prelogin_new/img/google-icon.png"/>google
                  </a>
               </div>
              <div class="clear"></div><p><small>-Or Using-</small></p>
               <?php if(($this->session->flashdata('error'))){ ?>
                     <div class="alert alert-danger" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
                     </div>
               <?php } ?>
                   <?php if($this->session->flashdata('success')){ ?>
                     <div class="alert alert-success" id="successMessage">
                     <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                     </div>
               <?php } ?>
               <form  id="form_valid" method="post">
                  <div class="placeholder-input">
                     <span class="relative-span">
                     <input name="EmailAddress" type='email' required  class="form-control " placeholder="Email Address"/>
                     </span>
                  </div>
                  <div class="placeholder-input">
                     <span class="relative-span type-password">
                     <input autocomplete="new-password"  name="Password" required type="password"  class="form-control" placeholder="Password" />
                     </span>
                  </div>
                  <p>
                     <input type="submit" name="logins" id="login-btn" class="new-btn-orange" value="Log in">
                  </p>
                  <p>
                     <input type="submit" id="fbLink" onclick="fbLogin()" class="new-btn-orange" value="Login with Facebook">
                  </p>
               </form>
               <p class="bottom-link" style="margin-top: 20px">
                  <span style="float:left">
                  <a href="<?php echo base_url();?>home/forgotpassword/">Forgot Password?</a>
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
 $this->load->view('common/footer');
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
URL="<?php echo base_url('index.php/')?>";
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '616922428821448', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
          
           
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
   
   
    function (response) {
       // console.log(response);
            var saveData = $.ajax({
                type: 'POST',
                url: URL+"login/fblogin/",
                data: {id:response.id,first_name:response.first_name,last_name:response.last_name,email:response.email,picture:response.picture.data.url},
                dataType: "text",
                success: function(resultData) {
                    console.log(resultData);

                    if(resultData=='true'){
                       // location.reload(URL+'Program/Programlist');
                    }
                    //location.reload(URL+'Program/Programlist');
                }
            });
            saveData.error(function() { alert("Something went wrong"); });
            document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
      //  document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
      //  document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
      //  document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
    });



}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}




  </script>