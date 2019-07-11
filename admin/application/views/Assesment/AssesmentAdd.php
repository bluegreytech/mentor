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
					<h4 class="card-title" id="basic-layout-form"><?php if($AssesmentTypeId==1)
					{
						echo	"Edit Assesment";
					}
					else{
					echo	"Add Assesment";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Assesment/Assesmentlist/" class="btn btn-primary" style="float:right">Back to Assesment List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_assesment" action="<?php echo base_url();?>Assesment/Assesmentadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

							
								<div class="form-group">
								<input type="hidden"   value="<?php echo $AssesmentTypeId; ?>" name="AssesmentTypeId">
									<label for="issueinput5">Stream Type</label>
								

									<select id="issueinput5" name="StreamTypeId" class="form-control" >
										<option value=""  selected="" disabled="">Select Stream Type</option>					
											<?php
											foreach($streamData as $str)
											{
											?>
												<option value="<?php echo $str->StreamTypeId;?>" <?php if($StreamTypeId==$str->StreamTypeId){ echo "selected";}?>><?php echo $str->StreamName;?></option>
											<?php
											}
											?>
									</select>
								</div>

								<div class="form-group">
									<label for="issueinput6">Program Type</label>
									<select id="issueinput6" name="ProgramId" class="form-control" >
										<option value=""  selected="" disabled="">Select Program Type</option>					
											<?php
											foreach($programData as $program)
											{
											?>
												<option value="<?php echo $program->ProgramId;?>" <?php if($ProgramId==$program->ProgramId){ echo "selected";}?>><?php echo $program->ProgramName;?></option>
											<?php
											}
											?>
									</select>
								</div>
							
								<div class="form-group">
									<label>Assesment Name</label>
									<input type="text" class="form-control" placeholder="Assesment Name" value="<?php echo $AssesmentName;?>" name="AssesmentName" minlength="5" maxlength="200">
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

							</div>

							<div class="form-actions">
							<?php if($AssesmentTypeId!=''){?>
								<button type="submit" name="updateAssesment" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addAssesment" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>/Assesment/Assesmentlist" name="CancelAssesment" class="btn btn-danger">
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
						required: "Plesae select stream",

										},
						ProgramId: {
						required: "Plesae select program",

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