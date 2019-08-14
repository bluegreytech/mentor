<?php include 'header.php';?>

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
							<h3 style="color:#000;">Interested in discussing?</h3>
							<br><br>
							<!-- Contact FORM -->
							<form class="contact-form" id="contact" role="form">

								<!-- IF MAIL SENT SUCCESSFULLY -->
								<h6 class="successContent"><i class="fa fa-check left" style=""></i>Your message has been sent successfully. </h6>
								<!-- END IF MAIL SENT SUCCESSFULLY -->

								<!-- MAIL SENDING UNSUCCESSFULL -->
								<h6 class="errorContent"><i class="fa fa-exclamation-circle left" style="color: #e1534f;"></i>There was a problem validating the form please check! </h6>
								<!-- END MAIL SENDING UNSUCCESSFULL -->

								<div class="col-sm-6">
				                	<div class="form-group">
					                  <label for="form_name">Name <small>*</small></label>
					                  <input name="form_name" class="form-control" type="text" placeholder="Your Name" required="" aria-required="true">
				                  	</div>
				                </div>
				                <div class="col-sm-6">
				                  <div class="form-group">
				                    <label for="form_email">Email <small>*</small></label>
				                    <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
				                  </div>
				                </div>
				                <div class="col-sm-6">
				                  <div class="form-group">
				                    <label for="form_name">Subject <small>*</small></label>
				                    <input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true">
				                  </div>
				                </div>
				                <div class="col-sm-6">
				                  <div class="form-group">
				                    <label for="form_phone">Phone</label>
				                    <input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
				                  </div>
				                </div>
				                <div class="col-sm-12">
					                <div class="form-group">
						                <label for="form_name">Message</label>
						                <textarea name="form_message" class="form-control required" rows="5" placeholder="Enter Message" aria-required="true"></textarea>
						            </div>
					        	</div>
					        	<div class="col-sm-12">
									<button class="btn btn-md btn-contact-page" type="submit" id="form-submit" name="submit">
										Send Message
									</button>
								</div>
							</form>
							<!-- END Contact FORM -->
							<br>
							<br>

						</div>

						<div class="col-md-6">
							<h3 style="color:#000;">Get In Touch</h3>
							<br><br>
							<div class="col-md-12">
								<div class="box">
								<i class="fa fa-map-o"></i> <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
								</div>
							</div>
							<br>
							<div class="col-md-12">
								<div class="box">
								<i class="fa fa-phone"></i> <span>+91 8128738522 </span>
								</div>
							</div>
							<br>
							<div class="col-md-12">
								<div class="box">
								<i class="fa fa-envelope"></i> <span>mentorcare@gmail.com</span>
								</div>
							</div>
							

						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			
<?php include 'footer.php';?>