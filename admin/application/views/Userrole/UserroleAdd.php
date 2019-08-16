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
					<h4 class="card-title" id="basic-layout-form"><?php if($RoleId==1)
					{
						echo	"Edit User Role";
					}
					else{
					echo	"Add User Role";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Userrole/Userrolelist/" class="btn btn-primary" style="float:right">Back to User Role List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" action="<?php echo base_url();?>Userrole/Userroleadd" id="form_userrole">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<div class="form-group">
									<label>User Role</label>
									<input type="hidden"   value="<?php echo $RoleId; ?>" name="RoleId">
									<input type="text" class="form-control" placeholder="Role Name" name="RoleName" value="<?php echo $RoleName; ?>">
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
								<?php
								if($RoleId!='')
									{
										?>
													<button type="submit" name="editUseerole" class="btn btn-primary">
												<i class="icon-check2"></i> Update
											</button>
											<?php }else{ ?>
												<button type="submit" name="addUserrole" class="btn btn-primary">
													<i class="icon-check2"></i> Add
												</button>
											<?php } ?>
                <a href="<?php echo base_url(); ?>Userrole/Userrolelist" name="CancelUserrole" class="btn btn-danger">
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
		$("#form_userrole").validate(
		{
					rules: {

						RoleName: {
						required: true,
						},
					},

					messages: {

						RoleName: {
								required: "Please enter role type",
								pattern : "Enter only characters and numbers and \"space , \" -",
								minlength: "Please enter at least 5 and maximum to 50 letters!",
													},

									
									}
				
		});
});
</script>