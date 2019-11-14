<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>
 <div class="app-content content container-fluid">
    <div class="content-wrapper">
        <?php
        $story_id=(isset($result[0]->story_id)!='')?$result[0]->story_id:"";
        $story_title=(isset($result[0]->story_title)!='')?$result[0]->story_title:"";
        $story_desc=(isset($result[0]->story_desc)!='')?$result[0]->story_desc:"";
        $story_long_desc=(isset($result[0]->story_long_desc)!='')?$result[0]->story_long_desc:"";
         $problem_desc=(isset($result[0]->problem_desc)!='')?$result[0]->problem_desc:"";
          $solution_desc=(isset($result[0]->solution_desc)!='')?$result[0]->solution_desc:"";
           $outcome_desc=(isset($result[0]->outcome_desc)!='')?$result[0]->outcome_desc:"";
         $story_img=(isset($result[0]->story_img)!='')?$result[0]->story_img:"";
         $IsActive=(isset($result[0]->IsActive)!='')?$result[0]->IsActive:"";
        ?>
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">
						<?php if($story_id!='')
					{
						echo	"Edit Success story";
					}
					else{
					echo	"Add Success story";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Stories/" class="btn btn-primary" style="float:right">Back to Success story List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_story" action="<?php echo base_url();?>Stories/addstory">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $story_id; ?>" name="story_id">
								
							
								<div class="form-group">
									<label>Story Title</label>
									<input type="text" class="form-control" placeholder="Story Title" name="story_title" value="<?php echo $story_title;?>"  minlength="5" maxlength="200">
								</div>
								<div class="form-group">
									<label>Story  Description</label>
									<textarea  rows="5" class="form-control" cols="3"  name="story_desc"  placeholder="Story  Description"><?php echo $story_desc; ?></textarea>          
								</div>
								<div class="form-group">
									<label>Story Long Description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="story_long_desc"  placeholder="Story Long Description"><?php echo $story_long_desc; ?></textarea>          
								</div>

								<div class="form-group">
									<label>IDENTIFYING PROBLEM  Description</label>
									<textarea id="editor2" rows="5" class="form-control"  required name="problem_desc"  placeholder="Identifying Problem Description"><?php echo $problem_desc; ?></textarea>          
								</div>

								<div class="form-group">
									<label>Solution Description</label>
									<textarea id="editor3" rows="5" class="form-control"  required name="solution_desc"  placeholder="solution Description"><?php echo $solution_desc; ?></textarea>          
								</div>
								<div class="form-group">
									<label>Outcome Description</label>
									<textarea id="editor4" rows="5" class="form-control"  required name="outcome_desc"  placeholder="Outcome  Description"><?php echo $outcome_desc; ?></textarea>          
								</div>
								<div class="form-group">
									<label>Story Image</label>
									<input type="hidden" name="pre_story_img" value="<?php echo $story_img;?>">
									<input type="file" class="form-control" placeholder="Story Image" value="<?php echo $story_img; ?>" name="story_img" onchange="readURLimg(this);">
								</div>
								<div class="preview">									
									<?php if($story_img){ ?>
									<img id="blahimg" src="<?php echo base_url()?>upload/storyimage/<?php echo $story_img;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
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
							<?php if($story_id!=''){ ?>
								<button type="submit" name="updatestory" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addstory" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>Stories" name="CancelBlog" class="btn btn-danger">
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
		$("#form_story").validate(
		{
			rules:{	
					story_title: {
							required: true,
							},
					story_desc: {
							required: true,
							},
					story_img: {
					required:function(){
						story_img='<?php echo $story_img; ?>';
						if(story_img){
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
CKEDITOR.replace('editor2');
CKEDITOR.replace('editor3');
CKEDITOR.replace('editor4');
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