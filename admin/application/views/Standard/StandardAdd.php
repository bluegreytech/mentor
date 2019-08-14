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
					<h4 class="card-title" id="basic-layout-form"><?php if($StandardId==1)
					{
						echo	"Edit  Standard";
					}
					else{
					echo	"Add  Standard";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Standard/Standardlist/" class="btn btn-primary" style="float:right">Back to Standard List</a>
				</div></h4>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="form_standard" action="<?php echo base_url();?>Standard/AddStandard/">                      
                        
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
                              
                               	<div class="form-group">
									<label>Stream Type </label>
									<select name="streamid" class="form-control" id="streamid">
										<option value="" selected="" disabled="">Please Select</option>

										<?php
											foreach($streamData as $str)
											{
											?>
												<option value="<?php echo $str->StreamTypeId;?>" <?php if($StreamId==$str->StreamTypeId){ echo "selected";}?>><?php echo $str->StreamName;?></option>
											<?php
											}
											?>
									</select>
								</div>
								<div class="form-group">
									<label>Standard</label>
									<input type="hidden"   value="<?php echo $StandardId; ?>" name="StandardId">
									<input type="text" class="form-control" value="<?php echo $Standard; ?>" placeholder="Standard" name="Standard" minlength="2" maxlength="50">
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
							<?php if($StandardId!=''){?>
								<button type="submit" name="updateStandard" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addstandard" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>/Standard/Standardlist" name="CancelStandard" class="btn btn-danger">
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
	$("#form_standard").validate(
	{
	rules: {
	Standard: {
		required: true,
		//	pattern: /^[a-zA-Z0-9\s\-\ ]+$/,
		//	minlength: 5,
	},
	streamid:{
		required: true,
	}
	},

	Standard: {
		StreamName: {
		required: "The standard is mandatory!",
		pattern : "Enter only characters and numbers and \"space , \" -",
		minlength: "Please enter at least 2 and maximum to 50 letters!",
		},
	}

	});
});
</script>