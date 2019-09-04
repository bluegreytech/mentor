<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>

    <section>
        <div class="head-2 std8">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                    <h1>Career Counselling Programs for Class 8<sup>th</sup></h1>
                       <?php if(!check_user_authentication()){ ?>
                    <a  href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1 asets-btn" data-events="auto" data-display="block">Start Assessment </a>
                  <?php } else{ ?>
                     <a  href="<?php echo base_url()?>Mytest" class="bann-btn-1 asets-btn" data-events="auto" data-display="block">Start Assessment </a>
                  <?php } ?>
                    <!--p>Nurturing Minds</p-->
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
                            <h2>Let Us Help</h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                      <div>
               <div class="featurette">
                <!------------------------code---------------start---------------->
                <div>
                    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
                      <!-- End Carousel Inner -->
                        <div class="controls">
                            <ul class="nav">
                                <li data-target="#custom_carousel" data-slide-to="0" class="active">
                                    <a href="#"><small>Pre-Counseling</small></a>
                                </li>
                                <li data-target="#custom_carousel" data-slide-to="1">
                                    <a href="#"><small>Career Assessment Test</small></a>
                                </li>
                                <li data-target="#custom_carousel" data-slide-to="2">
                                    <a href="#"><small>Post Counseling</small></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Bridging the gap of connections to understand you better. </h4>
                                            <ul>
                                              <li>Understanding the teenage mind.</li>
                                              <li>Getting subjective opinion on strengths and weaknesses.</li>
                                              <li>Identify your likes and dislikes and how it impacts your preferences and lifestyle.</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6"><img src="<?php echo base_url()?>default/images/programs/pre-counseling.png" class="img-responsive"></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6"><img src="<?php echo base_url()?>default/images/programs/career-assesment-test.png" class="img-responsive"></div>
                                        <div class="col-md-6">
                                            <h4>Scientific Career Assessment and Evaluation. </h4>
                                            <ul>
                                              <li>Find out the best-fit subject in alignment to your personality. </li>
                                              <li>Culling out best fitting learning style.</li>
                                              <li>Get a Career road map for pursuing further education.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Avail Career Counseling Session by our Career Experts. </h4>
                                            <ul>
                                              <li>Understanding of the report minutely with the guidance of our Career Expert.</li>
                                              <li>Customized series of steps for overall development.  </li>
                                              <li>Listing of Competitive Exams at school level for the enhancement of the student.   </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6"><img src="<?php echo base_url()?>default/images/programs/post-counseling.png" class="img-responsive"></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->
                        </div>
                        
                    </div>
                    <!-- End Carousel -->
                
            <!----Code------end----------------------------------->
        </div>
  </div>
</div>
                      </div>
                      


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

    <!--SECTION START-->
    <section style="background-color: #f5f5f5;">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Let's help you discover your perfect stream</h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                      <!--Pricing 1-->
                      <div class="col-lg-4 col-sm-6">
                        <div class="price-item text-center">
                            <img src="<?php echo base_url()?>default/images/icon/p1.png" alt="pricing-img">
                            <h3>PREVIEW</h3>
                            <span class="cl">Perfect Choice For Individual</span>
                            <div class="price-tag">
                                <span><sup><i class="fa fa-inr"></i> </sup>25</span>
                            </div>
                            <div class="price-tag2">
                                <span class="sty-span">Per</span>
                                <span>Month</span>
                            </div>
                            <div class="gap-p">
                                <p>Limited course</p>
                                <p>Daily 150+ tutorials</p>
                                <p>No life-time support</p>
                                <p>Zero GB space</p>
                            </div>
                            <div class="price-btn">
                                <a href="#">Get Started</a>
                            </div>
                        </div>
                      </div>
                      <!--Pricing 2-->
                      <div class="col-lg-4 col-sm-6">
                        <div class="price-item text-center">
                            <img src="<?php echo base_url()?>default/images/icon/p2.png" alt="pricing-img">
                            <h3>LEARN</h3>
                            <span class="cl">Perfect Choice For Individual</span>
                            <div class="price-tag">
                                <span><sup><i class="fa fa-inr"></i> </sup>25</span>
                            </div>
                            <div class="price-tag2">
                                <span class="sty-span">Per</span>
                                <span>Month</span>
                            </div>
                            <div class="gap-p">
                                <p>Limited course</p>
                                <p>Daily 150+ tutorials</p>
                                <p>No life-time support</p>
                                <p>Zero GB space</p>
                            </div>
                            <div class="price-btn">
                                <a href="#">Get Started</a>
                            </div>
                        </div>
                      </div>
                      <!--Pricing 3-->
                      <div class="col-lg-4 col-sm-6">
                        <div class="price-item text-center">
                            <img src="<?php echo base_url()?>default/images/icon/p3.png" alt="pricing-img">
                            <h3>EXPLORE</h3>
                            <span class="cl">Perfect Choice For Individual</span>
                            <div class="price-tag">
                                <span><sup><i class="fa fa-inr"></i> </sup>25</span>
                            </div>
                            <div class="price-tag2">
                                <span class="sty-span">Per</span>
                                <span>Month</span>
                            </div>
                            <div class="gap-p">
                                <p>Limited course</p>
                                <p>Daily 150+ tutorials</p>
                                <p>No life-time support</p>
                                <p>Zero GB space</p>
                            </div>
                            <div class="price-btn">
                                <a href="#">Get Started</a>
                            </div>
                        </div>
                      </div>
                      


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

    <div class="who-choose-banner" id="scroll-why">
      <h3 class="h3-title">Why Choose Mentor ?</h3>
      <p class="p-title">Compare all leading career counselling platforms in India, to see how Mentor tops the
         charts across all major elements of career guidance.
      </p>
      <a class="custom-btn" href="#">Read More <i class="fa fa-angle-double-right"></i></a>
   </div>

   <!--SECTION START-->
    <section style="background:#f6f6f6;">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                  <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Frequently Asked Questions </h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <!--First stories-->
                        <div class="row">
                          <div class="col-md-6" style="padding: 0">
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>How should I reach MENTOR to book an appointment?</h4>
                                        <p>Click here to fill the pre-counselling form and our Career experts will get back to you in no time.</p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>Isn’t it too early to take Career decision in 8th grade?</h4>
                                        <p>We believe it is the perfect time since your course selection strategy in 8th grade can change the future of your career. If you unveil your subject inclination at this stage it will make your preparation stronger and decrease the chance of confusion. </p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>Is there any involvement of parents in the Career Counseling session?</h4>
                                        <p>Parents are the most important source of motivation and we aim to bring the parent and the child on the same page. Career Counseling sessions help to create a window for an open discussion where hesitations are kept off the table.</p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>What is the mode of Career Counseling session?</h4>
                                        <p>We are here at your disposal by the means of online assessment and offline assessment both, which is the pen and paper test. </p>
                                      </div>
                                  </div>
                          </div>
                          <div class="col-md-6">
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>What is the duration of the assessment and career counseling session?</h4>
                                        <p>The assessment takes 45 minutes to complete whereas the minimum duration of Career counseling session is 30 minutes and can last until all your career related doubts are resolved and eradicated. </p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>What does psychometric assessment have to do with Career Counseling?</h4>
                                        <p>Psychometric assessment is backed up with science which helps you identify your aptitude and interest to create a career road map for a successful career life. </p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4> How will Career Counseling help me?</h4>
                                        <p>Career Counseling helps to deal with the uncertainty of the future in terms of career by providing you a road map and fulfil your dream. Get your hands on customized action plan for your career development and align your skills with your occupational interest.</p>
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <!--div class="row">
                              <div class="col-md-6">
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>How should I reach MENTOR to book an appointment?</h4>
                                        <div class="time-hide time-hide-1" style="display: none;">
                                            <p> Click here to fill the pre-counselling form and our Career experts will get back to you in no time.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-1-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-11-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>My son is in 5th grade, how will it him at such an early age?</h4>
                                        <div class="time-hide time-hide-2" style="display: none;">
                                            <p> We have special assessment designed for younger minds based on Multiple Intelligence Theory. The assessment will acquaint you with your child’s learning style and generate strategies to ace examinations.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-2-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-22-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>Is there any involvement of parents in the Career Counseling session?</h4>
                                        <div class="time-hide time-hide-3" style="display: none;">
                                            <p>Parents are the most important source of motivation and we aim to bring the parent and the child on the same page. Career Counseling sessions help to create a window for an open discussion where hesitations are kept off the table.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-3-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-33-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>What is the mode of Career Counseling session?</h4>
                                        <div class="time-hide time-hide-3" style="display: none;">
                                            <p>We are here at your disposal by the means of online assessment and offline assessment both, which is the pen and paper test.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-3-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-33-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>

                              </div>

                              <div class="col-md-6">
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>How should I reach MENTOR to book an appointment?</h4>
                                        <div class="time-hide time-hide-4" style="display: none;">
                                            <p> Click here to fill the pre-counselling form and our Career experts will get back to you in no time.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-4-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-44-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>My son is in 5th grade, how will it him at such an early age?</h4>
                                        <div class="time-hide time-hide-5" style="display: none;">
                                            <p> We have special assessment designed for younger minds based on Multiple Intelligence Theory. The assessment will acquaint you with your child’s learning style and generate strategies to ace examinations.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-5-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-55-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>Is there any involvement of parents in the Career Counseling session?</h4>
                                        <div class="time-hide time-hide-3" style="display: none;">
                                            <p>Parents are the most important source of motivation and we aim to bring the parent and the child on the same page. Career Counseling sessions help to create a window for an open discussion where hesitations are kept off the table.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-3-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-33-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>
                                  <div class="s17-eve-time">
                                    <div class="s17-eve-time-msg">
                                        <h4>What is the mode of Career Counseling session?</h4>
                                        <div class="time-hide time-hide-3" style="display: none;">
                                            <p>We are here at your disposal by the means of online assessment and offline assessment both, which is the pen and paper test.</p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-3-btn" style="display: block;">
                                          <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-33-btn hb-com" style="display: none;">
                                          <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div>
                                  </div>

                              </div>
                      </div>
                          
                    </div-->

                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

<?php 
 $this->load->view('common/footer');
?>
<script>
            $(document).ready(function (ev) {
                $('#custom_carousel').on('slide.bs.carousel', function (evt) {
                    $('#custom_carousel .controls li.active').removeClass('active');
                    $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
                })
            });
        </script>