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
						<?php if($faq_id!='')
					{
						echo	"Edit Faq";
					}
					else{
					echo	"Add Faq";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Programs/faqlist/" class="btn btn-primary" style="float:right">Back to faq List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_cat" action="<?php echo base_url();?>Programs/addfaq">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $faq_id; ?>" name="faq_id">
								
							
								<div class="form-group">
									<label>Faq Title</label>
									<input type="text" class="form-control" placeholder="Faq Title" name="faq_title" value="<?php echo $faq_title;?>"  minlength="3" maxlength="200">
								</div>

								<div class="form-group">
									<label>Faq Description</label>
									<textarea class="form-control" rows="4" cols="5" name="faq_desc"><?php echo $faq_desc;?></textarea>
								</div>
								
								
										<?php if($Isactive!=''){ ?>
											<div class="form-group">
												<label>Status</label>
													<div class="input-group">
															<label class="display-inline-block custom-control custom-radio ml-1">										<?php //echo $IsActive; ?>
															<input type="radio" name="Isactive" value="Active"<?php if($Isactive=='Active') { echo "checked"; } ?> class="custom-control-input">									<span class="custom-control-indicator"></span>	
															<span class="custom-control-description ml-0">Active</span></label>	
															<label class="display-inline-block custom-control custom-radio">											<input type="radio" name="Isactive" value="Inactive"  <?php if($Isactive=='Inactive') { echo "checked"; } ?>  class="custom-control-input">
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
														<input type="radio" name="Isactive" value="Active"  checked="" class="custom-control-input">		
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Active</span>				
													</label>							
													<label class="display-inline-block custom-control custom-radio ml-1"> 										
														<input type="radio" name="Isactive" value="Inactive" class="custom-control-input">		
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Inactive</span>				
													</label>
												</div> 	
											</div>
										 <?php } ?>


							<div class="form-actions">
							<?php if($faq_id!=''){ ?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>Programs/faqlist" name="CancelBlog" class="btn btn-danger">
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
					faq_title: {
							required: true,
							},
							faq_desc: {
							required: true,
							},
					 Isactive: {
					 	required: true,
					 },
			},
		});
});

CKEDITOR.replace('editor1');

</script>