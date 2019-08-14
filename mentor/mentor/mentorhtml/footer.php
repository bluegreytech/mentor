<footer>
  <div class="footer-box">
    <div class="container">
      <div class="row">
        <div class="footer-row">
          <div class="col-md-3 ">
            <h4>Call Our Helpline</h4>
            <p>Got career-related questions? Talk to our experts!</p>
            <a href="tel:+91 8128738522" class="helpline" style="color:#fff!important">
              <i class="fa fa-phone  margin-right-5 " style="margin-right:5px"></i>+91 8128738522
            </a>
          </div>
          <div class="col-md-9">
            <h4>Subscribe to our Newsletter</h4>
            <p>Expert-written articles and everything else you need to choose the right career, delivered weekly to your
              inbox.</p>
            <div class="subscription-box">
              <form action="#">
                <input type="email" class="newsletter-value" placeholder="Enter your email" />
                <button id="newsletter-button" class="btn-orange">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
        <div class="footer-row">
          <div class="col-md-4 ">
            <div class="title">
              <h3>How We Help</h3>
            </div>
            <p>At the Center for Academic and Career Development at MENTOR FPG , we envision the education & career development as a journey. Beginning with a student’s first step outside home , onto any campus and continuing through participation in exciting learning opportunities that lead to a fulfilling personal and professional life.</p>
            
          </div>
          <div class="col-md-4 ">
            <div class="title">
              <h3>Popular Careers</h3>
            </div>

            <ul>
              <li> <a href="#">Career in Design</a></li>
              <li><a href="#">Career in Engineering</a></li>
              <li><a href="#">Career in Media &amp; Communication</a> </li>
              <li><a href="#">Career in Social Sciences &amp; Humanities</a></li>
              <li><a href="#">Career in Ethical Hacking</a></li>
              <li><a href="#" style="color:#007fb6;">View All Popular Careers</a></li>
            </ul>
          </div>
          <div class="col-md-4 ">
            <div class="title">
              <h3>Popular Blogs</h3>
            </div>

            <ul>
              <li> <a href="#">Career Options for PCM Students</a></li>
              <li> <a href="#">Career Options for PCB Students</a></li>
              <li> <a href="#">Career Options for Commerce Students</a></li>
              <li> <a  href="#">How to Become a Pilot in India</a></li>
              <li> <a  href="#">How to Become a Psychologist in India</a></li>
              <li> <a  href="#">Difference Between CBSE, ICSE & IB Boards</a></li>
              <li><a  href="#" style="color:#007fb6;">View All Popular Blogs</a></li>
            </ul>
          </div>

        </div>
       
        </div>
        <div class="footer-row footer-copyright text-center">
          <div class="col-md-12 ">
            <p class="bold-6">© 2015-
              2019 MENTOR TOGETHER
            </p>
            <p>All Rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- jS -->
 <link href="asset/all-css/my-sets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="asset/all-css/my-sets/js/jquery.js" ></script>
<script type="text/javascript" src="asset/all-css/my-sets/js/jquery-ui.min.js"></script>
 <script type="text/javascript" src="asset/all-css/my-sets/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="asset/all-css/my-sets/js/custom.js"></script>
 <script type="text/javascript" src="asset/all-css/my-sets/js/lightslider.js"></script>
 <script type="text/javascript" src="asset/all-css/my-sets/js/clipboard.min.js"></script>

<script type="text/javascript" src="asset/all-css/my-sets/js/homepage-functionb3dc.js?1559996786"></script>
<script type="text/javascript">



$(".offer-popup.mode-compress .fa").click(function () { 
    localStorage.clear();
    $(".offer-popup.mode-compress").hide();
    $(".offer-popup.mode-expand").show();
    localStorage.setItem("p1", "plus");
});

$(".offer-popup.mode-expand .fa").click(function () {
    localStorage.clear();
    $(".offer-popup.mode-compress").show();
    $(".offer-popup.mode-expand").hide();
    localStorage.setItem("p1", "minus");
          
});

       
      
if(localStorage.getItem('p1')=='plus'){
    $(".offer-popup.mode-compress").hide();
    $(".offer-popup.mode-expand").show();
}else if(localStorage.getItem('p1')=='minus'){
    $(".offer-popup.mode-compress").show();
    $(".offer-popup.mode-expand").hide();
}
  </script>



<script type="text/javascript">
var tab = ""
var staged_at = ""
$("document").ready(function() {


    if(tab=='stream' || staged_at==1){
      setTimeout(function() { 
          $(".pricing-tab .drop-down #tab-8-9").trigger('click');
      },100);
    }else if(tab=='career' || staged_at==2){
      setTimeout(function() { 
          $(".pricing-tab .drop-down #tab-10-12").trigger('click');
      },100);
    }
    else if(tab=='college' || staged_at==3){
      setTimeout(function() { 
          $(".pricing-tab .drop-down #tab-gratuates").trigger('click');
      },100);
    }
});

</script>
</body>
</html>