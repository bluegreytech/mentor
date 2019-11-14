<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');

$this->load->view('common/sidebar_second');
?>
<div class="container">
<br><br><br>
<div class="row">
<div class="col-md-4">
<figure class="card card-product"> 
  <div class="bottom-wrap">
    <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1000" data-id="1">Pay Now</a> 
    <!-- price-wrap.// -->
  </div> <!-- bottom-wrap.// -->
</figure>
</div> <!-- col // -->


</div> <!-- row.// -->
</div> 
<!--container.//-->
<?php 
    $this->load->view('common/footer_second');
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var SITEURL = "<?php echo base_url() ?>";
  $('body').on('click', '.buy_now', function(e){
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var options = {
    "key": "rzp_test_C7fnEIVjsS6Bsd",
    "amount":(totalAmount*100), // 2000 paise = INR 20
    "name": "Mentor pay",
    "description": "Payment",
    "image": "https://www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
    "handler": function (response){
          $.ajax({
            url: SITEURL + 'payment/razorPaySuccess',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
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