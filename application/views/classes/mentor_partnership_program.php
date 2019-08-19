<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>
  <section>
        <div class="head-2">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                	<div class="col-md-12">
                    <h1 class="mgccap">Mentor's Partnership Program</h1>
                    <p>Polish your career counseling practice by operating our advanced platform. Let’s partner up to multiply, amplify and grow together.</div>
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
                                        <h4>Get access at your convenience.</h4>
                                        <p>Get access to our assessment tool and avail strong knowledge of academic advising and career services.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Counselor Training from our experts.</h4>
                                        <p>Get strong service orientation and ability to relate effectively with diverse individuals and organisational groups.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Become a Friend, Philosopher and a Guide. </h4>
                                        <p>Get proficient to give directly give academic and career development service to designated students by implementing the vision and stages of career life cycle i.e., Career Mentoring, Career Establishing and Career Habitating.  </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="http://rn53themes.net/themes/demo/education-master/images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>AAA Assessment access.</h4>
                                        <p>Analyse students three pillars of growth with the help of our career experts and get an opportunity to learn from the best. Maintain top notch knowledge of academic and career related issues and provide intervention. </p>
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


  
   

    <div class="who-choose-banner" id="scroll-why">
      <h3 class="h3-title">Why Choose Mentor?</h3>
      <p class="p-title">Compare all leading career counselling platforms in India, to see how Mentor tops the
         charts across all major elements of career guidance.
      </p>
      <a class="custom-btn" href="#">Read More <i class="fa fa-angle-double-right"></i></a>
   </div>

   <!--Section start-->
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
                                        <h4>What is your knowledge imparting methodology?</h4>
                                        <p>We have modules curated by our experienced Career experts covering all the dimensions and phenomenon of Career Counseling beginning from introduction to psychometric theories to worldwide education system and more. Also, you will be benefiting from our exclusive resource material hand picked by professionals. </p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>I don’t have a website, will that create a hindrance in the process of partnership? What will be the portal solution for me?</h4>
                                        <p>We will customize a counselor portal for you after you have filled up the form. It can be customized in accordance to your preference in the form of: your name/ company’s name.mentor.com. </p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>How will being a partner be beneficial for me?</h4>
                                        <p></p>
                                      </div>
                                  </div>
                          </div>
                          <div class="col-md-6">
                            <div class="s17-eve-time">
                                      <div>
                                        <h4>What is the marketing support if I become a partner?</h4>
                                        <p>You will have access to our assessment tool and our website along with it you will have unlimited resources from our career library. </p>
                                      </div>
                                  </div>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4>Why should I choose MENTOR?</h4>
                                        <p>MENTOR’s vision is what makes it unique. We envision the education and career experience as a journey, beginning with the student’s first step onto any campus and continuing through participation in exciting learning opportunities that lead to a fulfilling personal and professional life.
                                        </p>
                                      </div>
                                  </div>
                                  
                          </div>
                      </div>
                   

                </div>
            </div>
        </div>
    </div>
</section>

    <!--section end-->


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