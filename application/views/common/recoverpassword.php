<?php include 'header.php';?>

<<link href="assets/prelogin_new/css/returning.css" type="text/css" rel="stylesheet">
<section class="header-layer login-bg">
   <div class="black-sheet">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h6>Recover Password</h6>
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


         <section id="new-login-screens" class="addjust-center for-login scroll-stop">
            <div class="container">
               <div class="row"  >
                  <div class="col-md-12">
                     <div class="sign-up-box" style="position:relative;padding-bottom: 30px;">
                        <h4>Forgot Password?</h4>
                       <p style="color: #666;font-size: 13px;">Enter your email address and we will send you a link to reset your password.</p>
                      <form action="#">
                       <div class="placeholder-input">
                        <span class="relative-span">
                          <input type="email"  id="recover-email"  class="form-control" placeholder="Email Address" /></span>
                        <div>
                       
                        <p>
                           <input type='submit' class="new-btn-orange btn-sent-reset" value='Send Reset Link'>
                        </p>
                        <p class="bottom-link">
                           <span style="">
                           <a href="login.php">Login</a>
                           </span>
                        </p>
                       </form> 
                     </div>
                     <div class="sign-up-box   for-great-massage">
                        <h4>Great!</h4>
                        <p>We have sent a password-reset link to your email address.
                        </p>
                        <p class="bottom-link">
                           <span>
                           <a href="login.php">Login</a>
                           </span>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </section>

<?php include 'footer.php';?>