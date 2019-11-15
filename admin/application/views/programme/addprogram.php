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
						echo	"Edit Program";
					}
					else{
					echo	"Add Program";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Programs" class="btn btn-primary" style="float:right">Back to Program List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_program" action="<?php echo base_url();?>Programs/addprogram">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<input type="hidden"   value="<?php echo $pid; ?>" name="pid">
								
							
								<div class="form-group">
									<label>Program  Title</label>
									<input type="text" class="form-control" placeholder="Program  Title" name="program_title" value="<?php echo $program_title;?>"  minlength="3" maxlength="200">
								</div>

								<div class="form-group">
									<label>Short  Title</label>
									<input type="text" class="form-control" placeholder="Short  Title" name="short_title" value="<?php echo $short_title;?>"  minlength="3" maxlength="200">
								</div>


								<div class="form-group">
									<label>Short  Description</label>
									
									<textarea class="form-control" name="short_desc" rows="4" cols='4'><?php echo $short_desc;?></textarea>
								</div>

								<div class="form-group">
									<label>Long  Description</label>
									
									<textarea class="form-control" name="long_desc" rows="7" cols='7'><?php echo $long_desc;?></textarea>
								</div>
								<div class="form-group">
									<label>Category </label>
									<select class="form-control"  id="cat_id" name="cat_id">
										<option value="">Select category</option>
										<?php
										foreach($cat as $val){
											?>
                                         <option value="<?php echo $val->cat_id?>" <?php echo   ($cat_id==
                                         $val->cat_id)?'selected':"" ?>><?php echo $val->cat_title?></option>
											<?php
										}
										?>
										
									</select>
								</div>

								<div class="form-group">
									<label>Subcategory </label>
									<select class="form-control"  id="subcat_id" name="subcat_id">
										<option value="">Select Subcategory</option>
										<?php
										foreach($subcat as $val){
											?>
                                         <option value="<?php echo $val->subcat_id?>" <?php echo   ($subcat_id==
                                         $val->subcat_id)?'selected':"" ?>><?php echo $val->subcat_title?></option>
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
								<a href="<?php echo base_url(); ?>Programs" name="CancelBlog" class="btn btn-danger">
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
		$("#form_program").validate(
		{
			rules:{	
					program_title: {
							required: true,
							},
							
							short_desc: {
							required: true,
							},
							cat_id: {
							required: true,
							},
					 IsActive: {
					 	required: true,
					 },
			},
		});
});

//CKEDITOR.replace('editor1');
 $('#cat_id').change(function(){

      var cat_id =$(this).val();
      
      //alert(cat_id);
       $.ajax({ 
        type: "POST", 
        url: "<?php echo base_url()?>Programs/getsubcatbycatid", 
        data: {cat_id:cat_id}, 
        success: function(response){
            $('#subcat_id').html(response);
        
           //$(".tale_no_" +strae[i] +"").prop('checked',true) ;

     }
 });
   });
</script>