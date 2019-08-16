 
<!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <div class="row wed-foot-link">
                <div class="col-md-4 foot-tc-mar-t-o">
                    <h4>How We Help</h4>
                    <p>At the Center for Academic and Career Development at MENTOR FPG , we envision the education & career development as a journey. Beginning with a student’s first step outside home , onto any campus and continuing through participation...<a href="about-us.php" style="color:#bb342f;">Read More</a></p>
                </div>
                <div class="col-md-4">
                    <h4>Popular Careers</h4>
                    <ul>
                      <li> <a href="#">Career in Design</a></li>
                      <li><a href="#">Career in Engineering</a></li>
                      <li><a href="#">Career in Media &amp; Communication</a> </li>
                      <li><a href="#">Career in Social Sciences &amp; Humanities</a></li>
                      <li><a href="#">Career in Ethical Hacking</a></li>
                      <li><a href="#" style="color:#bb342f;">View All Popular Careers</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Popular Blogs</h4>
                    <ul>
                      <li> <a href="#">Career Options for Students</a></li>
                      <li> <a href="#">Career Options for Gradutes</a></li>
                      <li> <a href="#">Mentoring at School</a></li>
                      <li> <a href="#">Overseas Programs</a></li>
                      <li> <a href="#">Become a Psychologist</a></li>
                      <li><a href="#" style="color:#bb342f;">View All Popular Blogs</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </section>

    <!-- COPY RIGHTS -->
    <section class="wed-rights">
        <div class="container">
            <div class="row">
                <div class="col-md-7 copy-right">
                    <p style="float: left;">Copyrights © 2015- 2019 MENTOR TOGETHER. All rights reserved.</p>
                </div>
                <div class="col-md-5 wed-foot-link-1">
                    <ul style="float: right;">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>
        <!-- LOGIN SECTION -->
        <div id="modal1" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="<?php echo base_url(); ?>default/images/cancel.png" alt="" />
                    </a>
                    <h4>Login</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                     <form class="s12" id="loginForm" method="POST" action="<?php echo base_url();?>home/login/">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name" class="validate" placeholder="Email" name="email" id="email">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate" placeholder="Password" name="password"  id="password">
                            </div>
                        </div>
                        <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                    <input type="checkbox" id="test5" name="rememberme" />
                                    <label for="test5">Remember me</label>
                                </p>
                            </div>
                        </div><br>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- REGISTER SECTION -->
        <div id="modal2" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="<?php echo base_url(); ?>default/images/cancel.png" alt="" />
                    </a>
                    <h4>Create an Account</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12" id="registrationForm" method="POST" action="<?php echo base_url();?>home/register/">
                        <div>
                            <div class="input-field s12">
                                <input type="text" class="validate" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="email" class="validate" placeholder="E-mail" name="email">
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate" placeholder="Password" name="password" id="password"> 
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate" placeholder="Re-Password" name="repassword">
                            </div>
                            <input type="hidden" name="careerchoiceassess[]" id="careerchoiceassess">
                        </div>
                          <div>
                            <div class="input-field s12">
                              <select style="width:100%;"  name="assessment" id="assessment">
                                 <option value="" disabled="" selected="">Please Select Assessment</option>
                                 <option value="student">Start Assessment for Students</option>
                                  <option value="professionals">Start Assessment for Professionals</option>
                              </select>


                            </div>
                            <div class="input-field s12" id="careerchoice1">
                                <select name="careerchoice" id="careerchoice" style="width:100%;">
                                    <option value="" disabled="" selected="">Please select</option>
                                    <option value="two_to_seven">Career Assessment for 2nd - 7th class </option>
                                    <option value="nine_to_tweleve">Career Assessment for 9th - 12th class</option>
                                    <option value="subject_selector">Subject Stream Selector</option>
                                    <option value="engineer_selector">Engineering Stream Selector</option>
                                </select>
                              
                            </div>
                              <div id="assessmenterror"></div>
                            <div class="input-field s12" id="careerchoice2">
                                <select name="careerchoice" id="careerchoice"  style="width:100%;">
                                    <option value="" disabled="" selected="">Please select</option>
                                    <option value="graduates">Career Assessment for Graduates</option>
                                    <option value="professionals">Career Assessment for Professionals</option>
                                </select>
                            </div>
                               <div id="careerchoiceerror"></div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Register" class="waves-effect waves-light log-in-btn"></div>
                        </div>
                        <div>
                            <div class="input-field s12">Are you a already member ?  <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Login</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FORGOT SECTION -->
        <div id="modal3" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello... </h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="<?php echo base_url(); ?>default/images/cancel.png" alt="" />
                    </a>
                    <h4>Forgot password</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12" method="POST"  action="<?php echo base_url()?>home/Forgotpassword/" id="forgotpwdfrm">
                        <div>
                            <div class="input-field s12">
                                <input type="text" class="validate" name="email" id='email'>
                                <label>User name or email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12">Are you a already member ?  <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php  $this->load->view('common/js'); ?>
