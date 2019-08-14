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
					<h4 class="card-title" id="basic-layout-form"><?php if($ProgramId==1)
					{
						echo	"Edit Program Type";
					}
					else{
					echo	"Add Program Type";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Program/Programlist/" class="btn btn-primary" style="float:right">Back to Program List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_program" action="<?php echo base_url();?>Program/Programadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

							
								<div class="form-group">
									<label for="issueinput5">Stream Type</label>
									<input type="hidden"   value="<?php echo $ProgramId; ?>" name="ProgramId">
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
									<label>Program Name</label>
									<input type="text" class="form-control" placeholder="Program Name" name="ProgramName"  value="<?php echo $ProgramName; ?>" minlength="5" maxlength="200">
								</div>

								<div class="form-group">
									<label>Program Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="ProgramDescription" placeholder="Program Description"><?php echo $ProgramDescription; ?></textarea>
					                 
								</div>

								<div class="form-group">
									<label>Program Price</label>
									<input type="text" class="form-control" placeholder="Program Price" value="<?php echo $ProgramPrice; ?>" name="ProgramPrice">
								</div>

								<!-- <div class="form-group">
									<label>Choose Image</label>
									<label id="projectinput7" class="file center-block">
										<input type="file" required name="ProgramImage" id="file">
										<span class="file-custom"></span>
									</label>
								</div> -->

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
							<?php if($ProgramId!=''){?>
								<button type="submit" name="updateProgram" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addProgram" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>/Program/Programlist" name="CancelProgram" class="btn btn-danger">
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
		$("#form_program").validate(
		{
					rules: {

									StreamTypeId: {
											required: true,
																},
									ProgramName: {
											required: true,
										//	pattern: /^[a-zA-Z0-9\s\-\ ]+$/,
										//	minlength: 5,
																},
									ProgramDescription: {
											required: true,
										//	pattern: /^[a-zA-Z0-9\s\-\ ]+$/,
										//	minlength: 5,
																},
									ProgramPrice: {
											required: true,
										//	pattern: /^[a-zA-Z0-9\s\-\ ]+$/,
										//	minlength: 5,
																},
									ProgramImage: {
											required: true,
											pattern: /^.png|.jpg|.gif/,
										//	minlength: 5,
																},

					},

					messages: {

							StreamTypeId: {
								required: "Plesae select stream",
								
													},
							ProgramName: {
								required: "Please enter program name",
								pattern : "Enter only characters and numbers and \"space , \" -",
								minlength: "Please enter at least 5 and maximum to 200 letters!",
													},
							ProgramDescription: {
								required: "Please enter program description",
								pattern : "Enter only characters and numbers and \"space , \" -",
													},
							ProgramPrice: {
								required: "Please enter program price",
													},
							ProgramImage: {
								required: "Plesae select program image",
							
													},

									
									}
				
		});
});

 
					                    CKEDITOR.replace('editor1');
					                
// bkLib.onDomLoaded(function () {

// new nicEditor({fullPanel: true, maxHeight: 200}).panelInstance('editor1');
// });

</script>