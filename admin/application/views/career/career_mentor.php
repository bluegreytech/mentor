<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
		<?php if(($this->session->flashdata('successmsg'))){ ?>
        <div class="alert alert-success" id="successMessage">
        <strong><?php echo $this->session->flashdata('successmsg'); ?></strong> 
        </div>
   		<?php } ?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Site Setting
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				</div></h4>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="form_importdata" action="<?php echo base_url();?>home/career_mentor/" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i>Requirements</h4>
								<input type="hidden" class="form-control" value="<?php echo $sitesetting_id; ?>" placeholder="Enter Facebook" name="sitesetting_id" id="sitesetting_id" >
								<h4 class="form-section"><i class="icon-link4"></i>For Personal Career Counselling of Students / Working Professionals</h4>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<h4 class="form-section"><i class="icon-link4"></i>For Becoming An Independent Career Counsellor in your Location</h4>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>

								<h4 class="form-section"><i class="icon-link4"></i>For WorldWide Higher Education / Study Abroad & Scholarships Applications</h4>
							    <br>
								
									<div class="form-group">
									<label>Phone1</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email 1</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Phone 2</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email 2</label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<h4 class="form-section"><i class="icon-link4"></i>For MBBS, Post Graduation in Medicine, FMGE, USMLE, AMC</h4>
								<div class="form-group">
									<label>Phone </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<h4 class="form-section"><i class="icon-link4"></i>To Know More About Our Specialised Seminars or Workshops For School / College / University</h4>
								<div class="form-group">
									<label>Phone </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<h4 class="form-section"><i class="icon-link4"></i>For Getting Touch with Accounts Department</h4>
								<div class="form-group">
									<label>Phone </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
									<h4 class="form-section"><i class="icon-link4"></i>For Getting Your Article Published In Our Career Magazine & Our Blogs</h4>
								<div class="form-group">
									<label>Phone </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>
								<div class="form-group">
									<label>Email </label>
									<input type="text" class="form-control" name="student_payment" id="student_payment" value="<?php //echo $student_payment;?>">
								</div>

								
									<hr>
                              	<div class="form-group">								
									<input type="submit" class="btn btn-black" value="Update" name="btnupdate" minlength="2" maxlength="50">
								</div>
							</div>								
						</form>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</section>
<!-- // Basic form layout section end -->
    </div>
  </div>
</div>
<?php  $this->load->view('common/footer'); ?>
		
		

<script>
	$(function() { 
    setTimeout(function() {
  $('#errorMessage').fadeOut('fast');
}, 5000);  
});

$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 5000);  
});

$(function() { 
    setTimeout(function() {
  $('#warningMessage').fadeOut('fast');
}, 5000);  
});

$("#PhoneNumber").on("input", function(evt) {

var self = $(this);

self.val(self.val().replace(/[^\d].+/, ""));

if ((evt.which < 48 || evt.which > 57)) 

{

	evt.preventDefault();

}

});

		$("#Accountnumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}
		});

		$("#Mobilenumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}
		});

		$("#Gstnumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}
		});

		

$(document).ready(function()
{
		// 		$("#form_valid").validate(
		// 		{
		// 			rules: {	
		// 				Accountnumber: {
		// 					required: true,
		// 						},
		// 				Branch: {
		// 					required: true,
		// 						},
		// 				Bankname: {
		// 					required: true,
		// 						},		
		// 				Ifsccode: {
		// 					required: true,
		// 						},
		// 				Adminname: {
		// 					required: true,
		// 						},
		// 				Emailaddress: {
		// 					required: true,
		// 						},
		// 				Mobilenumber: {
		// 					required: true,
		// 						},		
		// 				Officeaddress: {
		// 					required: true,
		// 						},
		// 				Gstnumber: {
		// 					required: true,
		// 						},
		// 					},
		// 			messages:{		
	
		// 				Accountnumber: {
		// 						required: "Please enter a bank account number",	
		// 							},
		// 				Branch: {
		// 						required: "Please enter a branch name",
		// 						},
		// 				Bankname: {
		// 					required: "Please enter a bank name",
		// 						},
		// 				Ifsccode: {
		// 					required: "Please enter a ifsc code",
		// 						},
		// 				Adminname: {
		// 					required: "Please enter a full name",	
		// 					},
		// 				Emailaddress: {
		// 						required: "Please enter a email address",
		// 						},
		// 				Mobilenumber: {
		// 					required: "Please enter a mobile number",
		// 						},
		// 				Officeaddress: {
		// 					required: "Please enter a office address",
		// 						},
		// 				Gstnumber: {
		// 					required: "Please enter a gst number",
		// 						},
		// 			}					



		// 		});	


		// });	


</script>

    </body>
</html>