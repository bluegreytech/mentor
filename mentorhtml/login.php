<?php include 'header.php';?>

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
                  <img src="assets/prelogin_new/img/facebook-icon.png"/>facebook
                  </a>
               </div>
               <div class="col-md-6 social-link-google"  style="padding-right:0; padding-left:5px">
                  <a href="#" class="socialbutton">
                  <img src="assets/prelogin_new/img/google-icon.png"  />google
                  </a>
               </div>
              <div class="clear"></div><p><small>-Or Using-</small></p>
               <form  autocomplete='off' id="loginform" method="post" action="dashboard">
                  <div class="placeholder-input">
                     <span class="relative-span">
                     <input  id='email' value="" autocomplete='off' name="email" type='email'  class="form-control " placeholder="Email Address"/>
                     </span>
                  </div>
                  <div class="placeholder-input">
                     <span class="relative-span type-password">
                     <input autocomplete="new-password" id='password' value="" name="password" type="password"  class="form-control" placeholder="Password" />
                     </span>
                  </div>
                  <p>
                     <input type="submit" id="login-btn" name="" class="new-btn-orange" value="Log in">
                  </p>
               </form>
               <p class="bottom-link" style="margin-top: 20px">
                  <span style="float:left">
                  <a href="loginrecoverPassword.php">Forgot Password?</a>
                  </span>
                  <span style="float:right">New to Mentor? 
                  <a href="register.php">Create Account</a>
                  </span>
               </p>
            </div>
         </div>
      </div>
   </div>
</section>

<?php include 'footer.php';?>