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
						<?php if($planid==1)
					{
						echo "Edit plan";
					}
					else{
					echo	"Add plan";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>price/planlist/" class="btn btn-primary" style="float:right">Back to plan List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">				
						<form class="form" method="post" enctype="multipart/form-data" id="form_plan" action="<?php echo base_url();?>price/addplan">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden" value="<?php echo $planid; ?>" name="planid">
								<div class="form-group">
									<select class="form-control" name="priceid">
										<option value="" disabled="" selected="">Please Select</option>
										<?php foreach($priceresult as $row){ ?>
										<option value="<?php echo $row->price_id; ?>" <?php if($row->price_id==$price_id){ echo "selected";} ?>><?php echo $row->price_title; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Plan Title</label>
									<input type="text" class="form-control" placeholder="Plan Title" name="plantitle" value="<?php echo $plantitle; ?>" maxlength="200">
								</div>
								<div class="form-group">
									<label>Plan Description</label>
									<textarea  rows="5" class="form-control" required name="plan_desc"  placeholder="Plan Description"><?php echo $plandesc ;?></textarea>          
								</div>
								
								<?php if($priceplan_status!=''){ ?>
											<div class="form-group">
												<label>Status</label>
													<div class="input-group">
															<label class="display-inline-block custom-control custom-radio ml-1">										<?php //echo $priceplan_status; ?>
															<input type="radio" name="priceplan_status" value="Active"<?php if($priceplan_status=='Active') { echo "checked"; } ?> class="custom-control-input">									<span class="custom-control-indicator"></span>	
															<span class="custom-control-description ml-0">Active</span></label>	
															<label class="display-inline-block custom-control custom-radio">											<input type="radio" name="priceplan_status" value="Inactive"  <?php if($priceplan_status=='Inactive') { echo "checked"; } ?>  class="custom-control-input">
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
														<input type="radio" name="priceplan_status" value="Active"  checked="" class="custom-control-input">		
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Active</span>				
													</label>							
													<label class="display-inline-block custom-control custom-radio ml-1"> 										
														<input type="radio" name="priceplan_status" value="Inactive" class="custom-control-input">		
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Inactive</span>				
													</label>
												</div> 	
											</div>
										 <?php } ?>
							<div class="form-actions">
							<?php if($planid!=''){?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>price/pricelist" name="CancelBlog" class="btn btn-danger">
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
	$.validator.addMethod('filesize', function (value, element, param) {
	return this.optional(element) || (element.files[0].size <= param)
	} ,'File size must be equal to or less then 2MB');
		$("#form_testimonial").validate(
		{
					rules: {
						testimonialtitle: {
						required: true,
						},
						testimonialimage: {
							required:function(){
								testimonialimage='<?php echo $testimonialimage; ?>';
								if(testimonialimage){
								return false;
								}else{
								return true;
								}

							},
							extension: "JPG|jpeg|png|bmp",
							filesize: 2097152,
						},
						testimonialdesc: {
							required: true,
						},
					},
		});
});

		CKEDITOR.replace('editor1');
function readURLimg(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blahimg').css('display', 'block');
            $('#blahimg').attr('src', e.target.result);
        };
     reader.readAsDataURL(input.files[0]);
    }
}
</script>