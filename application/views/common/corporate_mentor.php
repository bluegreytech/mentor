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
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con1">
                            <h4>Address</h4>
                            <p>Payal Complex, Mentor , 305 , <br>D Wing Above Manish Book, Opp. M.S. University, Vadodara, Gujarat.</p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con3">
                             
                            <h4>CONTACT INFO:</h4>
                            <p> <a href="tel:+91 8128738522" class="contact-icon">Phone: +91 8128738522</a>
                                 <br> <a href="mailto:mentorcare@gmail.com" class="contact-icon">Email: mentorcare@gmail.com</a> </p>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 new-con new-con4">
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
            <iframe src="" width="100%" height="545" frameborder="0" style="border:0" allowfullscreen></iframe>
            
            <div class="container">
                <div class="overlay-contact footer-part footer-part-form">
                    <div class="map-head">
                        <p>Send Us Now</p>
                        <h2>Get In Touch</h2> <span class="footer-ser-re">Service Request Form</span> </div>
                    <!-- ENQUIRY FORM -->
                    <form id="contact_form" name="contact_form" action="<?php echo base_url()?>home/contact_us" method="POST">
                        <ul>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f1" value="" name="username" placeholder="Name" > </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f2" value="" name="phone" placeholder="Phone" > </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f3" value="" name="email" placeholder="Email" > </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" id="f4" value="" name="subject" placeholder="Subject" > </li>
                            <li class="col-md-12 col-sm-12 col-xs-12 contact-input-spac">
                                <textarea id="f5"  name="message"></textarea>
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

<script type="text/javascript">
    $("#contact_form").validate(
    {
    rules:{  
        username:{
          required: true,

        },     
        email:{
          required: true,
          email: true
        },
         phone:{
          required: true,
          digits: true
        },
        subject:{
           required: true,         
        },
        message:{
           required: true,  
        },
        


      
       
    },
    
    errorPlacement: function (error, element) {

         console.log('dd', element.attr("name"))
            if (element.attr("name") == "assessment") {
                error.appendTo("#assessmenterror");
            }else if(element.attr("name") == "careerchoice"){
               error.appendTo("#careerchoiceerror");
            }
            else{
                error.insertAfter(element)
            }
        }
    
});

</script>