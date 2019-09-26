<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
//echo "<pre>";print_r(check_user_authentication());;
//$this->session->userdata('user_id');
 // echo $UserId=$this->session->userdata('user_id');
   $this->load->view('common/css');
?>
    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>default/images/logo.png" alt="" />
            </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <div style="padding: 6px;"> 
                             <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>default/images/logo.png" alt="" />
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            </div><br>

                            <div class="col-md-12 text-center">
                                <div class="call-link">
                                   <a href="tel:+91 8128738522 " class="contact-link">
                                   <i class="fa fa-phone"></i> Career Helpline: <b>+91 8128738522 </b>
                                   </a>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="display: inline-flex;">
                                <div style="width: 60%;">
                                  <h4><a href="#">Programs</a></h4>
                                <ul>
                                    <h5>Career Counselling Programs for Students</h5>
                                    <li><a href="<?php echo base_url()?>home/class_2_to_7">Career Counselling for Class 2<sup>nd</sup> - 7<sup>th</sup></a></li>
                                    <li><a href="<?php echo base_url()?>home/class_8">Career Counselling for Class 8<sup>th</sup></a></li>
                                    <li><a href="<?php echo base_url()?>home/class_9_to_10">Career Counselling for Class 9<sup>th</sup> - 10<sup>th</sup></a></a></li>
                                    <li><a href="<?php echo base_url()?>home/class_11_to_12">Career Counselling for Class 11<sup>th</sup> - 12<sup>th</sup></a></a></li>
                                </ul>
                                <hr>
                                <ul>
                                    <h5>Career Counselling Programs for Graduates/Professionals</h5>
                                    <li><a href="<?php echo base_url()?>home/Graduates">Career Counselling for Class Graduates</a></li>
                                    <li><a href="<?php echo base_url()?>home/Professionals">Career Counselling for Class Professionals</a></li>
                                </ul>
                                <ul>
                                    <h5>Overseas Appliation Programs</h5>
                                    <li><a href="#">Overseas Appliation Programs</a></li>
                                </ul>
                                <ul>
                                    <h5>Mentoring at School</h5>
                                    <li><a href="#">Mentoring at School</a></li>
                                </ul>
                                <ul>
                                    <h5>Budding Carrer Counsellors</h5>
                                    <li><a href="<?php echo base_url();?>home/class_1_to_12">MGCCAP for Class 1<sup>st</sup> - 12<sup>th</sup> </a></li>
                                    <li><a href="<?php echo base_url();?>home/mgccap_undergraduates">MGCCAP for Undergraduate</a></li>
                                    <li><a href="<?php echo base_url();?>home/mgccap_professionals">MGCCAP for Professionals</a></li>
                                </ul>
                                <ul>
                                    <h5>Mentor's Partnership Programs</h5>
                                    <li><a href="<?php echo base_url();?>home/mentor_partnership_program">Mentor's Partnership Programs</a></li>
                                </ul>
                                </div>
                                <div class="col-md-6" style="width: 40%;">
                                    <h4><a href="#">Resources</a></h4>
                                    <h5><a href="<?php echo base_url()?>home/about_us">About Us</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/success">Success Stories</a></h5>
                                    <h5><a href="#">Career Library</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/blog/">Career News</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/contact_us/">Contact Us</a></h5>
                                      
                                    <?php if(check_user_authentication()){   ?>
                                      <h5><a href="<?php echo base_url()?>/home/profile" >My Profile</a></h5>
                                       <h5><a href="<?php echo base_url()?>/home/logout" >Logout</a></h5>
                                    <?php }else{ ?>
                                    <h5><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a></h5>
                                    <h5><a href="#!" data-toggle="modal" data-target="#modal2">Sign Up</a></h5>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Contact: Lake Road, Suite 180 Farmington Hills, U.S.A.</a>
                                </li>
                                <li><a href="#">Phone: +101-1231-1231</a>
                                </li>
                            </ul>
                        </div-->
                        <div class="ed-com-t1-right">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>home/about_us">About Us</a></li>
                                 <?php 
                                 if(check_user_authentication()){  ?>
                                      <li><a href="<?php echo base_url()?>/home/profile" >My Profile</a></li>
                                       <li><a href="<?php echo base_url()?>/home/logout" >Logout</a></li>
                                    <?php }else{ ?>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a></li>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal2">Sign Up</a></li>
                                    <?php } ?>
                            </ul>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>default/images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                              <li class="cour-menu">
                                  <a href="#!" class="mm-arr">Programs <span class="fa fa-angle-down"></span></a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div id="exTab3" class="container">  
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                        <a  href="#m1" data-toggle="tab">
                                                        Career Counselling Programs</a>
                                                        </li>
                                                        <li><a href="#m2" data-toggle="tab">Overseas Appliation Programs</a>
                                                        </li>
                                                        <li><a href="#m3" data-toggle="tab">Mentoring at School</a>
                                                        </li>
                                                        <li><a href="#m4" data-toggle="tab">Become A Career Counselor</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content ">
                                                        <div class="tab-pane active" id="m1">
                                                            <div class="col-md-12">
                                                                <br>
                                                                <h6 style="font-weight:400;font-size: 16px;    margin-bottom: 20px;">    Career Counselling Programs
                                                                  <span style="font-weight:600">for Students</span>
                                                                </h6>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Class 2<sup>nd</sup> - 7<sup>th</sup></h6>
                                                                  <strong>Nurturing Minds</strong>
                                                                  <p>Find out your perfect intelligence amongst 8 Multiple Intelligences. <br>
                                                                  <a href="<?php echo base_url()?>home/class_2_to_7/">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Class 8<sup>th</h6>
                                                                  <strong>Budding Minds. Course Inclination</strong>
                                                                  <p>Unveil your inclination at an early age to start your preparation in a specific way.<br>
                                                                  <a href="<?php echo base_url()?>home/class_8">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Class 9<sup>th</sup> - 10<sup>th</sup></h6>
                                                                  <strong>Stream Selection Assessment Plan</strong>
                                                                  <p>Discover your perfect stream by the five Career Dimensions.<br>
                                                                  <a href="<?php echo base_url()?>home/class_9_to_10">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Class 11<sup>th</sup> - 12<sup>th</sup></h6>
                                                                  <strong>Focal Point</strong>
                                                                  <p>Have a clear view of your vision through the lens of our assessment and experts.<br>
                                                                  <a href="<?php echo base_url()?>home/class_11_to_12">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <br>
                                                              <hr style="height: 2px;width: 100%">
                                                               <div class="col-md-12"><h6 style="font-weight:400;font-size: 16px;    margin-bottom: 20px;">Career Counselling Programs
                                                                  <span style="font-weight:600">for Graduates/Professionals</span>
                                                                </h6>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Graduates</h6>
                                                                  <strong>Age Edge Advancement Plan</strong>
                                                                  <p>Career Development Assessment.Early Career Counseling before stepping into the professional world or into the world of advanced studies will help you plan your career in a more proactive and effective way.<br>
                                                                  <a href="<?php echo base_url()?>home/Graduates">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Professionals</h6>
                                                                  <strong>Professional Aptitude Assessment</strong>
                                                                  <p>Benefit from our Career Assessment at this stage to deal with setbacks by the means of resilience with an effective road map.<br>
                                                                  <a href="<?php echo base_url()?>home/Professionals">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="m2">
                                                            <div class="col-md-12 text-center">
                                                                <br>
                                                                <strong>Overseas Application Program </strong>
                                                                 <p>End-to-end overseas admissions guidance to help you build the perfect applications for your target universities.<br>
                                                                  <a href="#">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="m3">
                                                            <div class="col-md-12 text-center">
                                                                <br>
                                                                <strong>Mentoring at Schools </strong>
                                                                 <p>MENTOR believes that the students who are in schools will be taking care of the reins of our nation in the next 10 to 15 years.<br>
                                                                  <a href="#">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="m4">
                                                            <div class="col-md-12">
                                                                <br>
                                                                <h6 style="font-weight:400;font-size: 16px;    margin-bottom: 20px;">   Become a 
                                                                  <span style="font-weight:600">Career Counselor</span>
                                                                </h6>
                                                              </div>
                                                              <div class="col-md-3">
                                                                <strong>Mentor's Partnership Programs </strong>
                                                                 <p>Polish your career counseling practice by operating our advanced platform. Let’s partner up to multiply, amplify and grow together.<br>
                                                                  <a href="<?php echo base_url()?>home/mentor_partnership_program">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                </p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Class 1<sup>st</sup> - 12<sup>th</sup></h6>
                                                                  <p>Avail 7 day training program and learn from our career experts and understand the role of psychometric assessment thoroughly.<br>
                                                                  <a href="<?php echo base_url()?>home/class_1_to_12">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Undergraduate</h6>
                                                                  <p>A 12 day program to help you gain a comprehensive insight backed up with practical and theoretical knowledge. <br><br>
                                                                  <a href="<?php echo base_url()?>home/mgccap_undergraduates">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-3">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;">Professionals</h6>
                                                                  <p>A 21 days program to make you an expert Career Analyst with in depth knowledge about the education system worldwide and effective counseling skills.<br>
                                                                  <a href="<?php echo base_url()?>home/mgccap_professionals">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="<?php echo base_url()?>home/success">Success Stories</a>
                                <li class="about-menu">
                                    <a href="#" class="waves-effect dropdown-button" href="#" data-activates="top-menu">Knowledge Center <span class="fa fa-angle-down"></span></a>
                                    <!-- MEGA MENU 1 -->
                                    <ul id="top-menu" class="dropdown-content top-menu-sty-custom">
                                          <li><a href="#">Career Library</a></li>
                                          <li class="divider"></li>
                                          <li><a href="<?php echo base_url()?>home/blog">Career News</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url()?>home/contact_us">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="all-drop-down-menu">

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->


<style type="text/css">
.sbuttons {
  bottom: 5%;
  position: fixed;
  margin: 1em;
  left: 0;
  z-index: 99999;
}
.sbutton {
  display:none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  text-align: center;
  color: white;
  margin: 20px auto 0;
  box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);
  cursor: pointer;
  -webkit-transition: all .1s ease-out;
  transition: all .1s ease-out;
  position: relative;
}
.sbutton > i {
  font-size: 24px;
  line-height: 50px;
  transition: all .2s ease-in-out;
  transition-delay: 2s;
}
.sbutton:active,
.sbutton:focus,
.sbutton:hover {
  box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
}

.sbuttons:hover .sbutton{
  display: block;
}
.sbutton:not(:last-child) > i {
  font-size: 25px;
  line-height: 50px;
  color: #fff!important;
  transition: all .3s ease-in-out;
}

.sbutton:nth-last-child(1) {
  -webkit-transition-delay: 25ms;
  transition-delay: 25ms;
}
.sbutton:not(:last-child):nth-last-child(2) {
  -webkit-transition-delay: 20ms;
  transition-delay: 20ms;
}
.sbutton:not(:last-child):nth-last-child(3) {
  -webkit-transition-delay: 40ms;
  transition-delay: 40ms;
}
.sbutton:not(:last-child):nth-last-child(4) {
  -webkit-transition-delay: 60ms;
  transition-delay: 60ms;
}
.sbutton:not(:last-child):nth-last-child(5) {
  -webkit-transition-delay: 80ms;
  transition-delay: 80ms;
}
.sbutton:not(:last-child):nth-last-child(6) {
  -webkit-transition-delay: 100ms;
  transition-delay: 100ms;
}
 
[tooltip]:before {
   font-weight: 600;
  border-radius: 2px;
  background-color: #585858;
  color: #fff;
  content: attr(tooltip);
  font-size: 12px;
  visibility: hidden;
  opacity: 0;
  padding: 5px 7px;
  margin-left: 10px;
  position: absolute;
  left: 100%;
  bottom: 20%;
  white-space: nowrap;
}
 
[tooltip]:hover:before,
[tooltip]:hover:after {
  visibility: visible;
  opacity: 1;
}
.sbutton.mainsbutton {
  background: linear-gradient(to right, #b31217, #e52d27);
}
.sbutton.gplus {
  background: #F44336;
}
.sbutton.pinteres {
  background: #e60023;
}
.sbutton.twitt {
  background: #03A9F4;
}
.sbutton.fb {
  background: linear-gradient(to right, #2193b0, #6dd5ed);
}
.sbutton.whatsapp {
  background: linear-gradient(to right, #369b40, #3abe4d);
}
</style>
<div class="sbuttons">
  
  <a href="https://api.whatsapp.com/send?phone=918128738522&text=Hello,%0AMentor" target="_blank" class="sbutton whatsapp" tooltip="WhatsApp"><i class="fa fa-whatsapp"></i></a>  
    
  <a href="tel:+91 8128738522" class="sbutton fb" tooltip="+91 8128738522"><i class="fa fa-phone"></i></a>
  
  <a class="sbutton mainsbutton" style="display: block;"><i class="fa fa-comments"></i></a>
    
</div> 