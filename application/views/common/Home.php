
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
?>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>default/css/owl.carousel.min.css">

  <section class="mob-slider">
        <!-- SLIDER -->
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1349px;height:560px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo base_url(); ?>default/images/slider/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1349px;height:560px;overflow:hidden;">
                <div>
                    <img data-u="image" src="<?php echo base_url(); ?>default/images/slider/1.jpg" />
                    <div style="position:absolute;top:150px;left:485px;height:40px;font-size:32px;color:#fff;line-height:1.2;text-align:center;">
                        <h2>Explore</h2>
                        <h3>Give your exploration a direction.</h3>

                        <select name="cars" style="width: 400px;">
                            <option value="1">Career Assessment for 2nd - 7th class</option>
                            <option value="2">Career Assessment for 8th class</option>
                            <option value="3">Career Assessment for 9th - 12th class</option>
                            <option value="4">Career Assessment for Graduates</option>
                            <option value="4">Career Assessment for Professionals</option>
                        </select>
                    </div>
                       <?php if(!check_user_authentication()){ ?>
                    <a style="position:absolute;top:350px;left:585px;width:170px;height:49px;max-width:170px;" href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1">Start Assessment </a>
                    <?php } else{ ?>
                           <a style="position:absolute;top:350px;left:585px;width:170px;height:49px;max-width:170px;" href="<?php echo base_url()?>Mytest" class="bann-btn-1">Start Assessment </a>
                    <?php } ?>

                    <<!-- div class="event-picker wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                      <h3>Give your exploration a direction.<br><br></h3>
                      <p>Connect With Us</p>
                      <a href="#!" data-toggle="modal" data-target="#modal2" class="link">Register here <i class="ti-angle-right"></i></a>
                    </div> -->
                </div>
                <div>
                    <img data-u="image" src="<?php echo base_url(); ?>default/images/slider/2.jpg" />
                    <div style="position:absolute;top:150px;left:290px;height:40px;font-size:32px;color:#fff;line-height:1.2;text-align:center;">
                        <h2>Execute</h2>
                        <h3 style="line-height: 1.4">You can’t reach a destination without <br>walking,let’s walk together / No dream can be achieved without action. </h3> 
                        <select name="cars" style="width: 400px;">
                            <option value="1">Career Assessment for 2nd - 7th class</option>
                            <option value="2">Career Assessment for 8th class</option>
                            <option value="3">Career Assessment for 9th - 12th class</option>
                            <option value="4">Career Assessment for Graduates</option>
                            <option value="4">Career Assessment for Professionals</option>
                        </select>
                    </div>
                     <?php if(!check_user_authentication()){ ?>
                    <a style="position:absolute;top:390px;left:586px;width:170px;height:49px;max-width:170px;" href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1">Start Assessment </a>
                    <?php } else{ ?>
                           <a style="position:absolute;top:370px;left:560px;width:170px;height:49px;max-width:170px;" href="<?php echo base_url()?>Mytest" class="bann-btn-1">Start Assessment </a>
                    <?php } ?>

                </div>
                <div>
                    <img data-u="image" src="<?php echo base_url(); ?>default/images/slider/3.jpg" />
                    <div style="position:absolute;top:150px;left:450px;height:40px;font-size:32px;color:#fff;line-height:1.2;text-align:center;">
                        <h2>Emerge</h2>
                        <h3>Emerge into the best version of yourself.</h3>
                        <select name="cars" style="width: 400px;">
                            <option value="1">Career Assessment for 2nd - 7th class</option>
                            <option value="2">Career Assessment for 8th class</option>
                            <option value="3">Career Assessment for 9th - 12th class</option>
                            <option value="4">Career Assessment for Graduates</option>
                            <option value="4">Career Assessment for Professionals</option>
                        </select>
                    </div>
                    <?php if(!check_user_authentication()){ ?>
                    <a style="position:absolute;top:350px;left:580px;width:170px;height:49px;max-width:170px;" href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1">Start Assessment </a>
                    <?php } else{ ?>
                           <a style="position:absolute;top:350px;left:580px;width:170px;height:49px;max-width:170px;" href="<?php echo base_url()?>Mytest" class="bann-btn-1">Start Assessment </a>
                    <?php } ?>

                 </div>
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb110" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <rect class="b" x="2200" y="2200" width="11600" height="11600"></rect>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora101" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6080"></circle>
                    <polygon class="a" points="8789.5,4902.8 8789.5,5846.4 6801.7,8000 8789.5,10153.6 8789.5,11097.2 5930.5,8000 "></polygon>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora101" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6080"></circle>
                    <polygon class="a" points="7210.5,4902.8 7210.5,5846.4 9198.3,8000 7210.5,10153.6 7210.5,11097.2 10069.5,8000 "></polygon>
                </svg>
            </div>
        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>
        <!-- #endregion Jssor Slider End -->
    </section>

      <!-- POPULAR COURSES -->
    <section class="pop-cour">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>Our <span>Programs</span></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
              <div id="exTab2">  
                    <ul class="nav nav-tabs">
                        <li class="active">
                         <a  href="#1" data-toggle="tab">Career Counselling Programs</a>
                        </li>
                        <li><a href="#2" data-toggle="tab">Overseas Appliation Programs</a>
                        </li>
                        <li><a href="#3" data-toggle="tab">Mentoring at School</a>
                        </li>
                        <li><a href="#5" data-toggle="tab">Become A Career Counselor</a>
                        </li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                             <div id="exTab2" class="sub-tab">  
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                    <a  href="#Students" data-toggle="tab">Start Assessment for Students</a>
                                    </li>
                                    <li><a href="#Professionals" data-toggle="tab">Start Assessment for Professionals</a>
                                    </li>
                                </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="Students">
                                        <br><Br>    
                                <div class="row">    
                                            <div class="col-md-6">
                                                <div>
                                                    <!--POPULAR COURSES-->
                                                    <div class="home-top-cour">
                                                        <!--POPULAR COURSES: CONTENT-->
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="class-2-to-7.php">
                                                                <h3>Class 2nd - 7th</h3>
                                                            </a>
                                                            <h4>Nurturing Minds</h4>
                                                            <p>Find out your perfect intelligence amongst 8 Multiple Intelligences.</p>
                                                            <p>Children are born with unique and distinct intelligence profile that are shaped by different biological and environmental factors. After tracing the innate learning style and aptitude, the growing mind will discover his/her perfect Multiple Intelligence which sharpens the personality and helps him/her choose future endeavours.</p><br>
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/class_2_to_7"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <!--POPULAR COURSES-->
                                                    <div class="home-top-cour">
                                                        <!--POPULAR COURSES: CONTENT-->
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="class-8.php">
                                                                <h3>Class 8th</h3>
                                                            </a>
                                                            <h4>Budding Minds. Course Inclination</h4>
                                                            <p>Unveil your inclination at an early age to start your preparation in a specific way.</p>
                                                            <p>You might find out that you enjoy thinking about why the apple fell in the first place and what made Einstein develop the theory in comparison to studying history at class. This is the time when you are on the path of self discovery instead of intense competition. Your course selection strategy in 8th grade can change the future of your career.</p>
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/class_8"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <!--POPULAR COURSES-->
                                                    <div class="home-top-cour">
                                                        <!--POPULAR COURSES: CONTENT-->
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="class-9-to-10.php">
                                                                <h3>Class 9th and 10th</h3>
                                                            </a>
                                                            <h4>Stream Selection Assessment Plan</h4>
                                                            <p>Discover your perfect stream by the five Career Dimensions.</p>
                                                            <p>Understand your Individual Interests, Career Values & Motivators, Personality, Learning Style, Skills & Abilities through a comprehensive assessment of your learning style, strengths and personalised counselling from our leading Career Mentors. We expertise in exploring your career options with you in a scientifically proven method.</p>
                                                            <br>
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/class_9_to_10"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <!--POPULAR COURSES-->
                                                    <div class="home-top-cour">
                                                        <!--POPULAR COURSES: CONTENT-->
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="class-11-to-12.php">
                                                                <h3>Class 11th and 12th </h3>
                                                            </a>
                                                            <h4>Focal Point</h4>
                                                            <p>Have a clear view of your vision through the lens of our assessment and experts.</p>
                                                            <p>Unveil your perfect career based on your individualised Interests, Career Values & Motivators, Personality, Learning Style, Skills & Abilities by our Expert Career Mentor. Get acquainted with the various career options and build a Career Road Map in a scientific way.</p><br>
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/class_11_to_12"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Professionals">
                                        <bR><bR>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <!--POPULAR COURSES-->
                                                    <div class="home-top-cour">
                                                        <!--POPULAR COURSES: CONTENT-->
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="graduates.php">
                                                                <h3>Graduates </h3>
                                                            </a>
                                                            <h4>Age Edge Advancement Plan</h4>
                                                            <p>Career Development Assessment</p><br>
                                                            <p>Early Career Counseling before stepping into the professional world or into the world of advanced studies will help you plan your career in a more proactive and effective way. Find out the most suitable career path based on the five Career Dimensions: Individuals Interests, Career Values & Motivators, Personality, Learning Style, Skills & Abilities.</p>
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/Graduates"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <!--POPULAR COURSES-->
                                                    <div class="home-top-cour">
                                                        <!--POPULAR COURSES: CONTENT-->
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="professionals.php">
                                                                <h3>Professionals </h3>
                                                            </a>
                                                            <h4>Professional Aptitude Assessment</h4>
                                                            <p>Benefit from our Career Assessment at this stage to deal with setbacks by the means of resilience with an effective road map.</p>
                                                            <p>Midlife crisis cannot be treated by medicines, it requires the assistance of professional counseling. Experimenting and selecting a job is like gambling and dissatisfaction in professional life is alarming. It is time you get your career values and Interest in alignment. </p><br>
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/Professionals"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="2">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="home-top-cour">
                                    <!--POPULAR COURSES: CONTENT-->
                                    <div class="col-md-12 home-top-cour-desc">
                                        <a href="#">
                                            <h3>Overseas Appliation Programs</h3>
                                        </a>
                                         <p>Fulfil your overseas education dream through end-to-end admissions guidance from top overseas experts. Get help on everything from shortlisting colleges, selecting study destinations, to building your profile and crafting the perfect applications for your target universities.</p><br>
                                        <div class="hom-list-share">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane" id="3">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="home-top-cour">
                                    <!--POPULAR COURSES: CONTENT-->
                                    <div class="col-md-12 home-top-cour-desc">
                                        <a href="#">
                                            <h3>Mentoring at School</h3>
                                        </a>
                                        <p>MENTOR believes that the students who are in schools will be taking care of the reins of our nation in the next 10 to 15 years. They are the most important assets of our nation. Hence, we take the initiative to groom students’ career personality in a scientific and standardized manner by sharing our knowledge & experience with your students as their - Friend, Philosopher and Guide to help them choose their right career in the form of Workshops and Seminars by our Career experts.</p><br>
                                        <div class="hom-list-share">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane" id="5">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="home-top-cour">
                                        <!--POPULAR COURSES: CONTENT-->
                                        <div class="col-md-12 home-top-cour-desc">
                                            <a href="#">
                                                <h3>Mentor's Partnership Program</h3>
                                            </a>
                                            <p>Polish your career counseling practice by operating our advanced platform. Let’s partner up to multiply, amplify and grow together.</p><br>
                                            <div class="hom-list-share">
                                                <ul>
                                                    <li><a href="<?php echo base_url()?>/home/mentor_partnership_program"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <!--POPULAR COURSES-->
                                        <div class="home-top-cour">
                                            <!--POPULAR COURSES: CONTENT-->
                                            <div class="col-md-12 home-top-cour-desc">
                                                <a href="mgccap-1-to-12.php">
                                                    <h3>Class 1st - 12th</h3>
                                                </a>
                                                <p>Avail 7 day training program and learn from our career experts and understand the role of psychometric assessment thoroughly. Benefit from our tool and unlimited resources to gain expertise.</p>
                                               <!--  <p>Get an overview of the role of a Career Counselor and learn about the education system and career pathways in India. Furthermore, understand the administration of MIT, analysis and comprehensive report depiction. </p> -->   
                                                <div class="hom-list-share">
                                                    <ul>
                                                        <li><a href="<?php echo base_url()?>home/class_1_to_12"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <!--POPULAR COURSES-->
                                        <div class="home-top-cour">
                                            <!--POPULAR COURSES: CONTENT-->
                                            <div class="col-md-12 home-top-cour-desc">
                                                <a href="mgccap-undergraduates.php">
                                                    <h3>Undergraduate</h3>
                                                </a>
                                                <p>A 12 day program to help you gain a comprehensive insight backed up with practical and theoretical knowledge. Along with it being a part of widespread network of Career Analysts. </p>
                                                <div class="hom-list-share">
                                                    <ul>
                                                        <li><a href="<?php echo base_url()?>home/mgccap_undergraduates"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <!--POPULAR COURSES-->
                                        <div class="home-top-cour">
                                            <!--POPULAR COURSES: CONTENT-->
                                            <div class="col-md-12 home-top-cour-desc">
                                                <a href="mgccap-professionals.php">
                                                    <h3>Professionals</h3>
                                                </a>
                                                <p>A 21 days program to make you an expert Career Analyst with in depth knowledge about the education system worldwide and effective counseling skills.</p><br>
                                                <div class="hom-list-share">
                                                    <ul>
                                                        <li><a href="<?php echo base_url()?>home/mgccap_professionals"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
     <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">

                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Mentor's: 6 Steps Effective Assessment To Find Best Fit Carrer</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="s18-age-event l-info-pack-days">
                        <ul>
                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="images/icon/awa/2.png" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step 1</span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4>Understand your current career planning stage.</h4>
                                        <p class="program-title">Personal Profiling is the first milestone for a successful career assessment.</p>
                                        <div class="time-hide time-hide-1" style="display: none;">
                                            <p> The ultimate objective of planning is to take you from the current stage of career planning to the optimized stage of career planning. Personal profiling includes information about your current stage, risk involved and action plan for your career development.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-1-btn" style="display: block;">
                                        <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-11-btn hb-com" style="display: none;">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="images/icon/awa/3.png" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step 2</span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4>Get acquainted with your Career Personality.</h4>
                                        <p class="program-title">Personality assessment will help you understand yourself better as a person.</p>
                                        <div class="time-hide time-hide-2" style="display: none;">
                                             <p>It will help you expand your career options in alignment with your personality. Self-understanding and awareness can lead you to more appropriate and rewarding career choices.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-2-btn" style="display: block;">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-22-btn hb-com" style="display: none;">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="images/icon/awa/4.png" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step 3</span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4>Scoop out your Career Interest.</h4>
                                        <p class="program-title">Let the Career Interest Assessment help you find your occupational interest.</p>
                                        <div class="time-hide time-hide-3">
                                           <p>Understand your top career interest to identify a career focus and begin your career planning and career exploration process. The Career Interest Assessment will help you understand which careers might be the best fit for you.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-3-btn">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-33-btn hb-com">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="images/icon/awa/5.png" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step 4</span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4>Identify your learning style.</h4>
                                        <p class="program-title">Benefit from the customized learning strategies for improvement by our experts.</p>
                                        <div class="time-hide time-hide-4">
                                            <p>Understand how you gather information and pick your preferred style to ace your examination. It is scientifically proven that with individualised learning style can lessen the cognitive load and make the process of learning more engaging and fun.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-4-btn">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-44-btn hb-com">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="images/icon/awa/5.png" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step 5</span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4>Career Cluster and best-fit equivalents.</h4>
                                        <p class="program-title">Connect you education and Career planning.</p>
                                        <div class="time-hide time-hide-5">
                                            <p>Career Clusters are groups of similar occupations and industries that require similar skills. It provides a career road map for pursuing further education and career opportunities. Career Cluster help you narrow down your occupational choices based on your assessment responses.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-5-btn">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-55-btn hb-com">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="images/icon/awa/5.png" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step 6</span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4>Benefit from your Career Path Analysis by our experts.</h4>
                                        <p class="program-title">Know about the market value of your career.</p>
                                        <div class="time-hide time-hide-6">
                                            <p>The Career Path Analysis contains four important parameters to have a better insight into the most suitable career path.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-6-btn">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-66-btn hb-com">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-6" style="padding:20px 0px">
                        <iframe width="100%" height="450" src="https://www.youtube.com/embed/24HqSC9antg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->
    
    <section style="background-color: #f5f5f5;">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>News & Updates</h2>
                </div>
            </div>
            <div class="row">
                <!--First Blog-->
                <div class="col-md-4 text-center">
                    <div class="blog-post">
                        <div class="post-media">
                          <a href="#">
                            <img src="<?php echo base_url(); ?>default/images/pricing.jpg" class="img-responsive">
                          </a>
                        </div>
                        <div class="post-header">
                          <h5 style="margin-bottom: 0;">
                            <a href="#">Academic Vs. Professional Degree After Class 12th: Which One is Better?</a>
                          </h5>
                        </div>
                        <div class="post-header">
                          <p>When you completed Class 10, you had a relatively simple choice of 3 streams, but now when you pass out of Class 12, you...</p>
                          <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>
                <!--Second Blog-->
                <div class="col-md-4 text-center">
                    <div class="blog-post">
                        <div class="post-media">
                          <a href="#">
                            <img src="<?php echo base_url(); ?>default/images/pricing.jpg" class="img-responsive">
                          </a>
                        </div>
                        <div class="post-header">
                          <h5 style="margin-bottom: 0;">
                            <a href="#">Academic Vs. Professional Degree After Class 12th: Which One is Better?</a>
                          </h5>
                        </div>
                        <div class="post-header">
                          <p>When you completed Class 10, you had a relatively simple choice of 3 streams, but now when you pass out of Class 12, you...</p>
                          <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>
                <!--Third Blog-->
                <div class="col-md-4 text-center">
                    <div class="blog-post">
                        <div class="post-media">
                          <a href="#">
                            <img src="<?php echo base_url(); ?>default/images/pricing.jpg" class="img-responsive">
                          </a>
                        </div>
                        <div class="post-header">
                          <h5 style="margin-bottom: 0;">
                            <a href="#">Academic Vs. Professional Degree After Class 12th: Which One is Better?</a>
                          </h5>
                        </div>
                        <div class="post-header">
                          <p>When you completed Class 10, you had a relatively simple choice of 3 streams, but now when you pass out of Class 12, you...</p>
                          <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pad-top-20">  
                    <a href="blog.php" class="custom-btn">View All  <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </section>

    <section style="background: linear-gradient(to right, #b31217, #e52d27);">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2 style="color: #fff">Testimonials</h2>
                </div>
            </div>
            <div class="row">
        <div class="col-md-10 col-center m-auto">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>   
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="item carousel-item active">
                        <div class="img-box"><img src="<?php echo base_url(); ?>default/images/a6.png" alt=""></div>
                        <p class="testimonial">First of all I thank to God that my father take me to mentor because it is a great consultancy and it help me to explore my passion by making it profession. Their main aim is the life of someone not their time and I really appreciate that. All should visit there for perfect guidance in life.</p>
                        <p class="overview"><b>Manthan Dalvadi</b></p>
                    </div>
                    <div class="item carousel-item">
                        <div class="img-box"><img src="<?php echo base_url(); ?>default/images/a6.png" alt=""></div>
                        <p class="testimonial">It was a great experience. I was confused with the stream, but now it's clear. This session was really very helpful. Bhavna mam was so friendly and now my stream is clear. I feel lucky to have come here!!</p>
                        <p class="overview"><b>Yesha Barot</b></p>
                    </div>
                    <div class="item carousel-item">
                        <div class="img-box"><img src="<?php echo base_url(); ?>default/images/a6.png" alt=""></div>
                        <p class="testimonial">I Khushi, am grateful that my parents took me to the Mentor and it’s really helpful session.It was a really life changing experience. I was first confused with the selection of stream but now it’s all resolved.  I recommend it to all of the students who are looking for advice.</p>
                        <p class="overview"><b>Pankaj Patel</b></p>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
        </div>
    </section>

    <section style="background-color: #f5f5f5;">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="row">
                <!--First Blog-->
                <div class="col-md-6 text-justify">
                    <p>MENTOR Knowledge Management Pvt Ltd is creating wonders positively since 2004 by assisting parents and students to improve the way they are taking decisions and also the way they are implementing them in terms of education and career for a better tomorrow.  It is associating career life cycle with the fusion of technology and human intervene involving all three stages of career life cycle i.e Career Mentoring, Career Establishing and Career Habitatiating which ensures the better and brighter career of a student and contentment for parents. MENTOR FPG associates includes universities, colleges, schools and educators from various fields in education sector world wide.</p>
                    <p>Mentor FPG is an initiative of Mentor Knowledge Management Pvt ltd and Sanskar Bharti Foundation, an education and research organization, founded in 2004 with a vision of becoming “First Choice of People”. </p>
                </div>
                <div class="col-md-6">
                    <img src="<?php base_url(); ?>default/images/about-us.png" class="img-responsive">
                </div>
                <!--Second Blog-->
            </div>
            <div class="text-center pad-top-20">  
                <br>
                    <a href="<?php base_url(); ?>home/about_us" class="custom-btn">Read More <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </section>

    <section>
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>Associated Partners</h2>
                </div>
            </div>
            <div class="row">
                <div id="owl-demo" class="owl-carousel">
                    <div class="itempro"> 
                            <center><img src="<?php echo base_url(); ?>default/images/partner-logo.png" class="img-responsive"></center>
                    </div>
                     <div class="itempro"> 
                            <center><img src="<?php echo base_url(); ?>default/images/partner-logo.png" class="img-responsive"></center>
                    </div>
                     <div class="itempro"> 
                            <center><img src="<?php echo base_url(); ?>default/images/partner-logo.png" class="img-responsive"></center>
                    </div>
                     <div class="itempro"> 
                            <center><img src="<?php echo base_url(); ?>default/images/partner-logo.png" class="img-responsive"></center>
                    </div>
                     <div class="itempro"> 
                            <center><img src="<?php echo base_url(); ?>default/images/partner-logo.png" class="img-responsive"></center>
                    </div>
                     <div class="itempro"> 
                            <center><img src="<?php echo base_url(); ?>default/images/partner-logo.png" class="img-responsive"></center>
                    </div>
                </div>
            </div>
        </div>
    </section>

      





<?php 
 $this->load->view('common/footer');
?>
