<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');

$this->load->view('common/sidebar_second');
?>
<section id="main-content" class="my-profile-page">
  <section class="wrapper">
  <div class="congrats">
      <div class="row">
          <div class="col-md-12">
              <div>
                  <!--POPULAR COURSES-->
                  <div class="col-md-4">
                    <div class="home-top-cour">
                        <!--POPULAR COURSES: CONTENT-->
                        <div class="home-top-cour-desc">
                          <div class="cong-heading">
                            <img src="<?php echo base_url();?>default/images/test-icon.png">
                            <h3>1.Career Planning Test</h3>
                          </div>
                          <div class="cong-subtitle">
                            <h4>Congratulations!!! Your have successfully completed your test</h4>
                          </div>
                          <div class="cong-content">  
                            <h3>Congratulations!!!</h3>
                            <p>Now, you can make the payment</p>
                          </div>
                          <div class="cong-footer arrow-pad">
                              <img src="<?php echo base_url();?>default/images/arrow.png" style="width: 110px!important;">
                          </div>
                        </div>
                    </div>
                  </div>
                  <!--POPULAR COURSES-->
                  <div class="col-md-4">
                    <div class="home-top-cour">
                        <!--POPULAR COURSES: CONTENT-->
                        <div class="home-top-cour-desc">
                          <div class="cong-heading">
                            <img src="<?php echo base_url();?>default/images/card-icon.png">
                            <h3>2.Payment</h3>
                          </div>
                          <div class="cong-subtitle">
                            <h4>Make a payment online to activate report instantly</h4>
                          </div>
                          <div class="cong-content">  
                            <div class="row">
                              <div class="col-md-4 col-xs-4">
                                <img src="<?php echo base_url();?>default/images/elearning.png">
                              </div>
                              <div class="col-md-8 col-xs-8">                                 
                                  <h3 style="padding-top: 20px;">Direct Online User</h3>
                              </div>
                            </div>
                          </div>
                           <div class="cong-footer report-pad">
                            <a href="javascript:void(0)" data-amount="<?php echo $student_payment;?>" data-id="1" data-title="Make payment" class="report" id="buy_now">Make Payment</a>
                          </div>
                        </div>
                    </div>
                  </div>
                  <!--POPULAR COURSES-->
                  <div class="col-md-4">
                    <div class="home-top-cour">
                        <!--POPULAR COURSES: CONTENT-->
                        <div class="home-top-cour-desc">
                          <div class="cong-heading">
                            <img src="<?php echo base_url();?>default/images/report-icon.png">
                            <h3>3.Career Planning Report</h3>
                          </div>
                          <div class="cong-subtitle">
                            <h4>Your Career Planning Report is De-activated. Make a Payment to Activate your Report.</h4>
                          </div>
                          <div class="cong-content">  
                            <h3>Carrer Planning</h3>
                            <p>Report of <a href="#">Username</a>
                          </div>
                          <div class="cong-footer report-pad">
                            <a href="#" class="report">Report with Analysis</a>
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
</section>
<!--container.//-->
<?php 
    $this->load->view('common/footer_second');
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var SITEURL = "<?php echo base_url() ?>";
  $('body').on('click', '#buy_now', function(e){
    var totalAmount = $(this).attr("data-amount");
   // var product_id =  $(this).attr("data-id");
    var options = {
    "key": "rzp_test_C7fnEIVjsS6Bsd",
    "amount":(totalAmount*100), // 2000 paise = INR 20
    "name": "Mentor pay",
    "description": "Student Payment",
   // "image": "https://www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
    "handler": function (response){
      console.log(response);
          $.ajax({
            url: SITEURL + 'payment/razorPaySuccess',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount
            }, 
            success: function (msg) { 
               window.location.href = SITEURL + 'payment/RazorThankYou';
            }
        });
      
    },
 
    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  });
 
</script>