<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
$site_address=(isset($setting[0]->site_address)!='')?$setting[0]->site_address:"";
?>

   <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                    <div class="cor">
                        <div class="ed-about-tit">
                            <div class="con-title">
                                <h2>Corporate <span>Trainer</span></h2>
                                <p>24X7 Toll-Free Number For All Your Career Related Queries & To Booking Appointments With Any Of Our Department: <strong>Call: 18002122044</strong> </p>
                            </div>
                        </div>
                    </div>     
                    <div class="col-md-8">
                        <div class="pg-contact">
                            <div class="row">
                                <div class="col-md-12 col-sm-6 col-xs-12 new-con new-con3">
                                    <h4>Address</h4>
                                    <p><?php echo $site_address?></p>
                                </div>
                            </div>
                            <?php
                            $x=0;
                            foreach($contacts as $val){
                                if($x%2==0){


                              ?>

                            <div class="row">
                                <?php
                                }
                            ?>
                                <div class="col-md-6 col-sm-6 col-xs-12 new-con new-con3">
                                    <h4><?php echo $val->contact_title?> </h4>
                                  <?php echo $val->contact_desc?>
                                </div>
                            <?php
                            $x++;
                            if($x%2==0){
                                ?>
                            
                            </div>
                            <?php
                        }
                        }
                        ?>
                           
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="overlay-contact footer-part footer-part-form">
                            <div class="map-head">
                                <p>Send Us Now</p>
                                <h2>Get In Touch</h2> <span class="footer-ser-re">Service Request Form</span> </div>
                            <!-- ENQUIRY FORM -->
                            <form id="contact_form" name="contact_form" action="<?php echo base_url() ?>/home/corporate_mentor" method="POST" novalidate="novalidate">
                                <ul>
                                    <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                        <input type="text" id="f1" value="" name="username" placeholder="Name"> </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                        <input type="text" id="f2" value="" name="phone" placeholder="Phone"> </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                        <input type="text" id="f3" value="" name="email" placeholder="Email"> </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                        <input type="text" id="f4" value="" name="subject" placeholder="Subject"> </li>
                                    <li class="col-md-12 col-sm-12 col-xs-12 contact-input-spac">
                                        <textarea id="f5" name="message"></textarea>
                                    </li>
                                    <li class="col-md-6">
                                        <input type="submit" value="SUBMIT"> </li>
                                </ul>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

            
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
            if (element.attr("name") == "assessment"){
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