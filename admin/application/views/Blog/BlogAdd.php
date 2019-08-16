<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">
						<?php if($BlogId==1)
					{
						echo	"Edit Blog";
					}
					else{
					echo	"Add Blog";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Blog/Bloglist/" class="btn btn-primary" style="float:right">Back to Blog List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_blog" action="<?php echo base_url();?>Blog/Blogadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $BlogId; ?>" name="BlogId">
								<div class="form-group">
									<label>Your Name</label>
									<input type="text" class="form-control" placeholder="Your Nam" name="FirstName" value="<?php echo $FirstName;?>"  minlength="5" maxlength="200">
								</div>

								<!-- <div class="form-group">
									<label>Your Image</label>
									<input type="text" class="form-control" placeholder="Your Image" name="UserImage" value="<?php //echo $UserImage;?>" minlength="5" maxlength="200">
								</div> -->

								<!-- <div class="form-group">
									<label>Choose Image</label>
									<label id="projectinput6" class="file center-block">
										<input type="file"  name="UserImage" id="file" required>
										<span class="file-custom"></span>
									</label>
								</div> -->
							
								<div class="form-group">
									<label>Blog Title</label>
									<input type="text" class="form-control" placeholder="Blog Title" name="BlogTitle" value="<?php echo $BlogTitle;?>"  minlength="5" maxlength="200">
								</div>

							

								<div class="form-group">
									<label>Blog Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="BlogDescription"  placeholder="Blog Description"><?php echo $BlogDescription;?></textarea>          
								</div>

								<!-- <div class="form-group">
									<label>Blog Image</label>
									<input type="text" class="form-control" placeholder="Blog Image" value="<?php //echo $BlogImage;?>" name="BlogImage">
								</div> -->

								<!-- <div class="form-group">
									<label>Choose Image</label>
									<label id="projectinput7" class="file center-block">
										<input type="file" name="BlogImage" id="file" required>
										<span class="file-custom"></span>
									</label>
								</div> -->

								<div class="form-group">
									<label for="issueinput5">Blog Status</label>
									<select id="issueinput5" name="BlogStatusId" class="form-control" >
										<option value=""  selected="" disabled="">Select blog status</option>					
											<?php
											foreach($statusBlog as $blogstatus)
											{
											?>
												<option value="<?php echo $blogstatus->BlogStatusId;?>" <?php if($BlogStatusId==$blogstatus->BlogStatusId){ echo "selected";}?>><?php echo $blogstatus->BlogStatus;?></option>
											<?php
											}
											?>
									</select>
								</div>

								<?php  if($IsActive!=''){ ?>
                                
																<div class="form-group">
																												<label>Status</label>
																												<div class="input-group">
																																<label class="display-inline-block custom-control custom-radio ml-1">
																																<?php //echo $IsActive; ?>
																																				<input type="radio" name="IsActive" value="1"
										<?php if($IsActive==1) { echo "checked"; } ?>
										 class="custom-control-input">
																																				<span class="custom-control-indicator"></span>
																																				<span class="custom-control-description ml-0">Active</span>
																																</label>
																																<label class="display-inline-block custom-control custom-radio">
																																				<input type="radio" name="IsActive" value="0"  <?php if($IsActive==0) { echo "checked"; } ?>                                                  
										class="custom-control-input">
																																				<span class="custom-control-indicator"></span>
																																				<span class="custom-control-description ml-0">Inactive</span>
																																</label>
																												</div>
																</div>
												<?php } else { ?>
																<div class="form-group">
																												<label>Status</label>
																												<div class="input-group">
																																<label class="display-inline-block custom-control custom-radio ml-1">                                                                                
																																				<input type="radio" name="IsActive" value="1"
									 checked="" 
										 class="custom-control-input">
																																				<span class="custom-control-indicator"></span>
																																				<span class="custom-control-description ml-0">Active</span>
																																</label>
																																<label class="display-inline-block custom-control custom-radio">
																																				<input type="radio" name="IsActive" value="0"
										class="custom-control-input">
																																				<span class="custom-control-indicator"></span>
																																				<span class="custom-control-description ml-0">Inactive</span>
																																</label>
																												</div>
																</div>

												<?php }?>

							<div class="form-actions">
							<?php if($BlogId!=''){?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>/Blog/Bloglist" name="CancelBlog" class="btn btn-danger">
								Cancel
								</a>
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
	<?php 
 $this->load->view('common/footer');
?>

<script>

$(document).ready(function()
{
		$("#form_blog").validate(
		{
					rules: {

									FirstName: {
											required: true,
																},
									UserImage: {
											required: true,
									
																},
									BlogTitle: {
											required: true,
																},
									BlogImage: {
											required: true,
											pattern: /^.png|.jpg|.gif/,
										//	minlength: 5,
																},

					},

					messages: {

						FirstName: {
							required: "Please enter your name",
								pattern : "Enter only characters and numbers and \"space , \" -",
								minlength: "Please enter at least 5 and maximum to 200 letters!",
								
													},
						UserImage: {
								required: "Please enter your image",
						
													},
						BlogTitle: {
								required: "Please enter blog title",
								pattern : "Enter only characters and numbers and \"space , \" -",
								minlength: "Please enter at least 5 and maximum to 200 letters!",
													},
						BlogImage: {
							required: "Please enter blog image",
													},

									
									}
				
		});
});

 
		CKEDITOR.replace('editor1');
					                

</script>