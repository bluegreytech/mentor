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
						<?php if($testimonialid==1)
					{
						echo	"Edit testimonial";
					}
					else{
					echo	"Add testimonial";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>testimonial/testimoniallist/" class="btn btn-primary" style="float:right">Back to Testimonial List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">				
						<form class="form" method="post" enctype="multipart/form-data" id="form_testimonial" action="<?php echo base_url();?>testimonial/addtestimonial">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $testimonialid; ?>" name="testimonialid">
								
								<div class="form-group">
									<label>Testimonial Title</label>
									<input type="text" class="form-control" placeholder="Testimonial Title" name="testimonialtitle" value="<?php echo $testimonialtitle; ?>" maxlength="200">
								</div>
								<div class="form-group">
									<label>Testimonial Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="testimonialdesc"  placeholder="Testimonial Description"><?php echo $testimonialdesc ;?></textarea>          
								</div>
								<div class="form-group">
									<label>Testimonial Image</label>
									<input type="hidden" name="pre_testimonial_image" value="<?php echo $testimonialimage;?>">
									<input type="file" class="form-control" placeholder="Testimonial Image" value="<?php echo $testimonialimage;?>" name="testimonialimage" onchange="readURLimg(this);">
								</div>
								<div class="preview">									
									<?php if($testimonialimage){ ?>
									<img id="blahimg" src="<?php echo base_url()?>upload/testimonialimage/<?php echo $testimonialimage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
									<?php } else{?>
									<img id="blahimg" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>
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
							<?php if($testimonialid!=''){?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>testimonial/testimoniallist" name="CancelBlog" class="btn btn-danger">
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