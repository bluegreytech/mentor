<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>


<section class="header-layer contact-bg">
  <div class="black-sheet">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <h6>Contact Us</h6>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">

      <div class="col-md-12 bg-sec">


      </div>
    </div>
  </div>
</section>



			<!-- Contact Section -->
			<section class="contactus-page">
				<div class="container">
					<div class="row">
						<div class="col-md-6">

							<p style="">
								<i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;21/35 West Punjabi Bagh New Delhi - 110026.
							</p>
							<p style="">
								<i class="fa fa-envelope"></i><a onclick="ga('send', 'event', 'Hello Email', 'Contact Us Page', 'Contact Details');" href="mailto:hello@mindler.com" style="">&nbsp;&nbsp;&nbsp;hello@mindler.com</a>
							</p>

							<p style="">
								<i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;+91-87449 87449
							</p>

							<br>
							<br>
							<br>
							<h4 style="color:#000;">Ask Us Anything</h4>
							<!-- Contact FORM -->
							<form class="contact-form" id="contact" role="form">

								<!-- IF MAIL SENT SUCCESSFULLY -->
								<h6 class="successContent"><i class="fa fa-check left" style=""></i>Your message has been sent successfully. </h6>
								<!-- END IF MAIL SENT SUCCESSFULLY -->

								<!-- MAIL SENDING UNSUCCESSFULL -->
								<h6 class="errorContent"><i class="fa fa-exclamation-circle left" style="color: #e1534f;"></i>There was a problem validating the form please check! </h6>
								<!-- END MAIL SENDING UNSUCCESSFULL -->

								<div class="form-field-wrapper">
									<input class="input-sm form-full" id="form-name" type="text" name="name" placeholder="Your Name" required>
								</div>

								<div class="form-field-wrapper">
									<input class="input-sm form-full" id="form-email" type="email" name="email" placeholder="Email" required>
								</div>

								<div class="form-field-wrapper">
									<input class="input-sm form-full" id="form-subject" type="text" name="contact" placeholder="Phone">
								</div>

								<div class="form-field-wrapper">
									<textarea class="form-full" id="form-message" rows="7" name="comment" placeholder="Your Message" required></textarea>
								</div>

								<button onclick="ga('send', 'event', 'Contact Us', 'Contact Us Page', 'Contact Us Page');" class="btn btn-md btn-contact-page" type="submit" id="form-submit" name="submit">
									Send Message
								</button>
							</form>
							<!-- END Contact FORM -->
							<br>
							<br>

						</div>

						<div class="col-md-6">
							<div class="contact-box-left mb-45">
								<section class="full-screen-intro">
									<div id="map"></div>
								</section>

							</div>

						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			
<?php 
 $this->load->view('common/footer');
?>