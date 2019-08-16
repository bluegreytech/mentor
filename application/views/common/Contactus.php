<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>

   <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Contact <span> Us</span></h2>
                            <p>Take The World’s Most Awarded & Most Contemporary Career Planning Assessment And Get To Know What Is Best For You</p>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con1"> <img src="img/contact/1.png" alt="">
                            <h4>Address</h4>
                            <p>Payal Complex, Mentor , 305 , <br>D Wing Above Manish Book, Opp. M.S. University, Vadodara, Gujarat.</p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con3"> <img src="img/contact/2.png" alt="">
                            <h4>CONTACT INFO:</h4>
                            <p> <a href="tel:+91 8128738522" class="contact-icon">Phone: +91 8128738522</a>
                                 <br> <a href="mailto:mentorcare@gmail.com" class="contact-icon">Email: mentorcare@gmail.com</a> </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con4"> <img src="img/contact/3.png" alt="">
                            <h4>Website</h4>
                            <p> <a href="http://www.togethermentor.com/" target="_blank">www.togethermentor.com</a>
                                <!--br> <a href="#">Facebook: www.facebook/my</a>
                                <br> <a href="#">Blog: www.blog.mycompany.com</a--> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

    <section id="map">
        <div class="row contact-map">
            <!-- IFRAME: GET YOUR LOCATION FROM GOOGLE MAP -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d29528.19849644114!2d73.15887783012397!3d22.314901360208374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x395fcf2d18ad1851%3A0xe4d60a076d044c62!2stogether+mentor+vadodara!3m2!1d22.308522099999998!2d73.1858956!5e0!3m2!1sen!2sin!4v1564554125472!5m2!1sen!2sin" width="100%" height="545" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6207.877488520852!2d73.1832277489249!3d22.307289523188462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fcf2d18ad1851%3A0xe4d60a076d044c62!2sTogether+MENTOR!5e0!3m2!1sen!2sin!4v1565700956944!5m2!1sen!2sin" width="100%" height="545" frameborder="0" style="border:0" allowfullscreen></iframe-->

            <div class="container">
                <div class="overlay-contact footer-part footer-part-form">
                    <div class="map-head">
                        <p>Send Us Now</p>
                        <h2>GetIn Touch</h2> <span class="footer-ser-re">Service Request Form</span> </div>
                    <!-- ENQUIRY FORM -->
                    <form id="contact_form" name="contact_form" action="#">
                        <ul>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f1" value="" name="f1" placeholder="Name" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f2" value="" name="f2" placeholder="Phone" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f3" value="" name="f3" placeholder="City" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f4" value="" name="f4" placeholder="Country" required=""> </li>
                            <li class="col-md-12 col-sm-12 col-xs-12 contact-input-spac">
                                <textarea id="f5" name="f5" required=""></textarea>
                            </li>
                            <li class="col-md-6">
                                <input type="submit" value="SUBMIT"> </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>

			
<?php 
 $this->load->view('common/footer');
?>