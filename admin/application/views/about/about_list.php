<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');

	  $about_id=(isset($result[0]->about_id)!='')?$result[0]->about_id:"";
	   $about_title=(isset($result[0]->about_title)!='')?$result[0]->about_title:"";
	    $about_desc=(isset($result[0]->about_desc)!='')?$result[0]->about_desc:"";
	     $about_img=(isset($result[0]->about_img)!='')?$result[0]->about_img:"";
?>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
		<?php if(($this->session->flashdata('successmsg'))){ ?>
        <div class="alert alert-success" id="successMessage">
        <strong><?php echo $this->session->flashdata('successmsg'); ?></strong> 
        </div>
   		<?php } ?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">About us
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				</div></h4>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="form_about" action="<?php echo base_url();?>About/addabout/" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i>Requirements</h4>
								<input type="hidden" class="form-control" value="<?php echo $about_id; ?>" placeholder="" name="about_id" id="about_id" >
								<div class="form-group">
									<label>About title</label>
									<input type="text" class="form-control" name="about_title" id="about_title" value="<?php echo $about_title;?>">
								</div>
								<div class="form-group">
									<label>About description</label>
									<textarea id="editor1" rows="5" class="form-control"  required name="about_desc"  placeholder=" Description"><?php echo $about_desc; ?></textarea> 
								</div>								
								<div class="form-group">
									<label>Image</label>
									<input type="hidden" name="pre_about_img" value="<?php echo $about_img;?>">
									<input type="file" class="form-control" placeholder=" Image" value="<?php echo $about_img; ?>" name="about_img" onchange="readURLimg(this);">
								</div>
								<div class="preview">									
									<?php if($about_img){ ?>
									<img id="blahimg" src="<?php echo base_url()?>upload/helpimg/<?php echo $about_img;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">
									<?php } else{?>
									<img id="blahimg" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>
								</div>
									<hr>
                              <div class="form-group">								
									<input type="submit" class="btn btn-black" value="Update" name="btnupdate" minlength="2" maxlength="50">
								</div>
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
<?php  $this->load->view('common/footer'); ?>
		
		<script>

$(document).ready(function()
{
		$("#form_about").validate(
		{
			rules:{	
					about_title: {
							required: true,
							},
					
					about_desc: {
					required: true,
				},
				
				about_img: {
					required:function(){
						about_img='<?php echo $about_img; ?>';
						if(about_img){
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
</script>


    </body>
</html>