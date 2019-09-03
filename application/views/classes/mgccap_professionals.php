<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
  <section>
        <div class="head-2 default">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                	<div class="col-md-12">
                    <h1 class="mgccap">Mentor  Certified Career Analyst Programme for Professionals </h1>
                    
                    <p>A 21 days program to make you an expert Career Analyst with in depth knowledge about the education system worldwide and effective counseling skills.</p>
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
                            <h2>Key <span>Highlights</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	    <div class="ed-about-sec1">
                        <div class="ed-advan">
                            <ul>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Assistance for working professionals and occupationists.</h4>
                                        <p>Understand the diversity of Career options in the market.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Assignments and Career Counseling practice using Assessment Technology platform.</h4>
                                        <p>Evaluate your learning and keep your knowledge in check.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Case Studies and Scenarios.</h4>
                                        <p>Get knowledge from our Creer expert based on their experience to maximize your potential. </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Webinars.</h4>
                                        <p>Avail from our expert career analyst.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


    <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>What will you learn</span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                      <div>
               <div class="featurette">
                <!------------------------code---------------start---------------->
                <div>
                    <div id="custom_carousel" class="carousel slide mgccap" data-ride="carousel" data-interval="2500">
                      <!-- End Carousel Inner -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6" style="padding:50px">
                                            <h4>Career development strategies for professionals- </h4>
                                            <ul>
                                              <li>Understanding the concept of mid-life crisis. </li>
                                              <li>Personal career advice.</li>
                                              <li>Occupation analysis. </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6"><img src="<?php echo base_url()?>/default/images/2.jpg" class="img-responsive"></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6"><img src="<?php echo base_url()?>/default/images/2.jpg" class="img-responsive"></div>
                                        <div class="col-md-6" style="padding:50px">
                                            <h4>Develop advanced skills from expert training-</h4>
                                            <ul>
                                              <li>Methods of effective counseling. </li>
                                              <li>Understanding the diversity of Career options in the market.</li>
                                              <li>Learn how to deal with overwhelmed and confused individuals. </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6" style="padding:50px">
                                            <h4> In-depth knowledge about the assessment technology platform-</h4>
                                            <ul>
                                              <li>Understanding the science behind the assessments. </li>
                                              <li>Importance of assessment platform in applied career counseling. </li>
                                              <li>Do’s and Don'ts for counseling.</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6"><img src="<?php echo base_url()?>/default/images/2.jpg" class="img-responsive"></div>
                                        
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



   

    <div class="who-choose-banner" id="scroll-why">
      <h3 class="h3-title">Why Choose Mentor?</h3>
      <p class="p-title">Compare all leading career counselling platforms in India, to see how Mentor tops the
         charts across all major elements of career guidance.
      </p>
      <a class="custom-btn" href="#">Read More <i class="fa fa-angle-double-right"></i></a>
   </div>

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