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
						<?php if($lid!='')
					{
						echo	"Edit ";
					}
					else{
					echo	"Add";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Help/learnlist/" class="btn btn-primary" style="float:right">Back to  List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_blog" action="<?php echo base_url();?>Help/addlearn">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $lid; ?>" name="lid">
								
							
								<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control" placeholder=" Title" name="learn_title" value="<?php echo $learn_title;?>"  minlength="5" maxlength="200">
								</div>
								
								<div class="form-group">
									<label>Program </label>
									<select class="form-control" name="pid">
										<option value="">Select program</option>
										<?php
										foreach($pro as $val){
											?>
                                      <option value="<?php echo $val->pid?>"  <?php echo   ($pid==
                                        $val->pid)?'selected':"" ?>><?php echo $val->program_title?></option>
											<?php
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label> Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="learn_desc"  placeholder=" Description"><?php echo $learn_desc; ?></textarea>          
								</div>
								<div class="form-group">
									<label>Image</label>
									<input type="hidden" name="pre_learn_img" value="<?php echo $learn_img;?>">
									<input type="file" class="form-control" placeholder=" Image" value="<?php echo $learn_img; ?>" name="learn_img" onchange="readURLimg(this);">
								</div>
								<div class="preview">									
									<?php if($learn_img){ ?>
									<img id="blahimg" src="<?php echo base_url()?>upload/helpimg/<?php echo $learn_img;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
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
							<?php if($lid!=''){ ?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>Help/learnlist" name="CancelBlog" class="btn btn-danger">
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
		$("#form_blog").validate(
		{
			rules:{	
					learn_title: {
							required: true,
							},
					
					learn_desc: {
					required: true,
				},
				pid:{
				required: true,	
			},
				learn_img: {
					required:function(){
						learn_img='<?php echo $learn_img; ?>';
						if(learn_img){
						return false;
						}else{
						return true;
						}
					},
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