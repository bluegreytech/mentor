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
						<?php if($servicesid==1)
					{
						echo	"Edit Services";
					}
					else{
					echo	"Add Services";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Services/Serviceslist/" class="btn btn-primary" style="float:right">Back to Services List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_services" action="<?php echo base_url();?>services/addservices">
					             
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
								<input type="hidden"   value="<?php echo $servicesid; ?>" name="servicesid">
								<div class="form-group">
									<label>Please Select Page</label>
									<select name="servicespage" id="servicespage" class="form-control"> 
										<option value="">Please Select</option>
										<option value="home" <?php if($servicespage=='home'){ echo "selected";}?>>Home</option>
										<option value="about_us" <?php if($servicespage=='about_us'){ echo "selected";}?>>About us</option>
										<option value="career_counsellor" <?php if($servicespage=='career_counsellor'){ echo "selected";}?>>Career Counsellor</option>
									</select>
								</div>
								<div class="form-group">
									<label>Services Title</label>
									<input type="text" class="form-control" placeholder="Services Title" name="servicestitle" value="<?php echo $servicestitle;?>"  >
								</div>
								<div class="form-group">
									<label>Services Short Description</label>
									<textarea  rows="5" class="form-control"  required name="services_sdesc"  placeholder="Services Short Description"><?php echo $servicesdesc; ?></textarea>          
								</div>
								<div class="form-group">
									<label>Services Long Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="servicesldesc"  placeholder="Services Long Description"><?php echo $serviceldesc; ?></textarea>          
								</div>
								<div class="form-group">
									<label>Services Image</label>
									<input type="hidden" name="pre_Services_image" value="<?php echo $servicesimage; ?> ">
									<input type="file" class="form-control" placeholder="Testimonial Image" value="<?php echo $servicesimage; ?>" name="servicesimage" onchange="readURLimg(this);">
								</div>
								<div class="preview">									
									<?php if($servicesimage){ ?>
									<img id="blahimg" src="<?php echo base_url()?>upload/Servicesimage/<?php echo $servicesimage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
									<?php } else{?>
									<img id="blahimg" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>
								</div>
							<div class="form-actions">
							<?php if($servicesid!=''){ ?>
								<button type="submit" name="updateservices" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addservices" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<button type="submit" name="cancelservices" class="btn btn-default" onClick="location.href='<?php echo base_url(); ?>services/<?php echo $redirect_page?>'">
									 Cancel
								</button>								
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
	$("#form_services").validate(
	{
		rules:{	
				servicespage:{
						required: true,
			    },
				servicestitle:{
						required: true,
			    },
				servicesdesc:{
						required: true,
				},
				serviceldesc:{
						required: true,
				},
				servicesimage: {
				// required:function(){
				// 	servicesimage='<?php //echo $servicesimage; ?>';
				// 	if(servicesimage){
				// 		return false;
				// 	}else{
				// 		return true;
				// 	}
				// },
				extension: "JPG|jpeg|png|bmp",
				filesize: 2097152,
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