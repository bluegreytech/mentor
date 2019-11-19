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
						<?php if($pid!='')
					{
						echo	"Edit partner";
					}
					else{
					echo	"Add partner";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>About/partners/" class="btn btn-primary" style="float:right">Back to partner List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_cat" action="<?php echo base_url();?>About/addpartner">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $pid; ?>" name="pid">
								
							
								<div class="form-group">
									<label>Partner Name</label>
									<input type="text" class="form-control" placeholder="Partner Name" name="partner_nm" value="<?php echo $partner_nm;?>"  minlength="3" maxlength="200">
								</div>

								<div class="form-group">
									<label>Partner Designation</label>
									<input type="text" class="form-control" placeholder="Partner Designation" name="partner_desg" value="<?php echo $partner_desg;?>"  minlength="3" maxlength="200">
								</div>
                           	<div class="form-group">
									<label>Partner Description</label>
									<textarea class="form-control" name="partner_desc" rows="4" cols="6"><?php echo $partner_desc;?></textarea>
								</div>

									<div class="form-group">
									<label>Partner Image</label>
									<input type="hidden" name="pre_partner_img" value="<?php echo $partner_img;?>">
									<input type="file" class="form-control" placeholder="Partner Image" value="<?php echo $partner_img; ?>" name="partner_img" onchange="readURLimg(this);">
								</div>
								<div class="preview">									
									<?php if($partner_img){ ?>
									<img id="blahimg" src="<?php echo base_url()?>upload/partnerimage/<?php echo $partner_img;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
									<?php } else{?>
									<img id="blahimg" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>
								</div>

									<div class="form-group">
									<label>Select partner category</label>
									<select class="form-control" name="cat_id">
									<option value="">Select category</option>
									<?php
									foreach ($partnercat as $val) {
											?>
                                   <option value="<?php echo $val->pcid?>"

                                   	<?php echo ($val->pcid==$cat_id)?'selected':""?>><?php echo $val->cat_title?></option>
											<?php
										}	
										?>
									</select>
								</div>
								
								
								
										<?php if($IsActive!=''){ ?>
											<div class="form-group">
												<label>Status</label>
													<div class="input-group">
															<label class="display-inline-block custom-control custom-radio ml-1">										<?php //echo $IsActive; ?>
															<input type="radio" name="IsActive" value="Active"<?php if($IsActive=='Active') { echo "checked"; } ?> class="custom-control-input">									<span class="custom-control-indicator"></span>	
															<span class="custom-control-description ml-0">Active</span></label>	
															<label class="display-inline-block custom-control custom-radio">											<input type="radio" name="IsActive" value="Inactive"  <?php if($IsActive=='Inactive') { echo "checked"; } ?>  class="custom-control-input">
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
														<input type="radio" name="IsActive" value="Active"  checked="" class="custom-control-input">		
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Active</span>				
													</label>							
													<label class="display-inline-block custom-control custom-radio ml-1"> 										
														<input type="radio" name="IsActive" value="Inactive" class="custom-control-input">		
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Inactive</span>				
													</label>
												</div> 	
											</div>
										 <?php } ?>


							<div class="form-actions">
							<?php if($pid!=''){ ?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>About/partnercatlist" name="CancelBlog" class="btn btn-danger">
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
		$("#form_cat").validate(
		{
			rules:{	
					partner_nm: {
							required: true,
							},
							
					 partner_desg: {
					 	required: true,
					 },
					  partner_desc: {
					 	required: true,
					 },
					 cat_id:{
					 required: true,	
					},
					IsActive:{
					required: true,		
				},
			},
		});
});

CKEDITOR.replace('editor1');

</script>