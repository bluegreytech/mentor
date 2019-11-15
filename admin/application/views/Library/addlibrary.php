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
      $id=(isset($result[0]->id)!='')?$result[0]->id:"";
      $video_url=(isset($result[0]->video_url)!='')?$result[0]->video_url:"";
      $video_title=(isset($result[0]->video_title)!='')?$result[0]->video_title:"";
      $video_desc=(isset($result[0]->video_desc)!='')?$result[0]->video_desc:"";
     
        ?>
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">
					
					
					
				<?php if($id!='')
					{
						echo	"Edit Library";
					}
					else{
					echo	"Add Library";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Library/" class="btn btn-primary" style="float:right">Back to Library List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">				
						<form class="form" method="post" enctype="multipart/form-data" id="form_lib" action="<?php echo base_url();?>Library/addlibrary">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
<input type="hidden" class="form-control" name="id" value="<?php echo $id?>">
							<div class="form-group">
									<label> Video title</label>
									<input type="text" class="form-control" placeholder="Video title" name="video_title" value="<?php echo $video_title?>" maxlength="200">
								</div>
								<div class="form-group">
									<label> Video description</label>
									
									<textarea class="form-control" name="video_desc" rows="4" cols="4"><?php echo $video_desc?></textarea>
								</div>
								<div class="form-group">
									<label> Embeded video url</label>
									<input type="text" class="form-control" placeholder="Embeded video url" name="video_url" value="<?php echo $video_url?>" maxlength="200">
								</div>
							
							<div class="form-actions">
							<?php if($id!=''){ ?>
								<button type="submit" name="updateBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addBlog" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								
							
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
	
		$("#form_lib").validate(
		{
					rules: {
						video_url: {
						required: true,
						},
						video_title: {
						required: true,
						},
						
					},
		});
});

		
</script>