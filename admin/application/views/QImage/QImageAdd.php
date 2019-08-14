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
					<!-- <h4 class="card-title" id="basic-layout-form"><?php if($QuestionImageId==1)
					// {
					// 	echo	"Edit a Question Image";
					// }
					// else{ -->
					echo	"Add a Question Image";
					// }
					// 	?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>QImage/QImagelist/" class="btn btn-primary" style="float:right">Back to Question Image List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_assesment" action="<?php echo base_url();?>QImage/QImageadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

							
								<div class="form-group">
								<!-- <input type="hidden"   value="<?php //echo $QuestionImageId; ?>" name="QuestionImageId"> -->
									<label for="issueinput5">Assesment Type</label>
								

									<select id="issueinput5" name="AssesmentTypeId" class="form-control" >
										<option value=""  selected="" disabled="">Select Assesment Type</option>					
											<?php
											foreach($streamData as $str)
											{
											?>
												<!-- <option value="<?php //echo $str->AssesmentTypeId;?>" <?php //if($AssesmentTypeId==$str->AssesmentTypeId){ echo "selected";}?>><?php //echo $str->AssesmentName;?></option> -->
												<option value="<?php echo $str->AssesmentTypeId;?>"><?php echo $str->AssesmentName;?></option>
											<?php
											}
											?>
									</select>
								</div>

							
								<div class="form-group">
									<label>Question Image Type</label>
									<input type="text" class="form-control" placeholder="Question Image Type" name="QuestionImageType" minlength="3" maxlength="200">
								</div>

								<div class="form-group">
									<label>Question Image Name</label>
									<input type="text" class="form-control" placeholder="Question Image Name"  name="QuestionImageName" minlength="3" maxlength="200">
								</div>

								<div class="form-group">
											<label>Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
													<input type="radio" name="IsActive" value="1" checked="" 
													<?php //if($IsActive==1) { echo "checked"; } ?>
													class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Active</span>
												</label>
												<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="IsActive" value="0" 
													<?php //if($IsActive==0) { echo "checked"; } ?>
													class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Inactive</span>
												</label>
											</div>
								</div>

							</div>

							<div class="form-actions">
							<!-- <?php //if($QuestionImageId!=''){?>
								<button type="submit" name="updateQImage" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php //}else{ ?> -->
								<button type="submit" name="addQImage" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<!-- <?php //} ?> -->
								<a href="<?php echo base_url(); ?>QImage/QImagelist" name="CancelQImage" class="btn btn-danger">
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
		$("#form_assesment").validate(
		{
			rules: {

						StreamTypeId: {
								required: true,
													},
						ProgramId: {
								required: true,
													},
						AssesmentName: {
								required: true,
							//	pattern: /^[a-zA-Z0-9\s\-\ ]+$/,
							//	minlength: 5,
													},

						},

						messages: {

						StreamTypeId: {
						required: "Plesae select stream name",

										},
						ProgramId: {
						required: "Plesae select program name",

										},
						AssesmentName: {
						required: "Please enter assesment name",
						pattern : "Enter only characters and numbers and \"space , \" -",
						minlength: "Please enter at least 5 and maximum to 200 letters!",
										},
					
					
						}
				
		});
});

 
					                    CKEDITOR.replace('editor1');
					                

</script>