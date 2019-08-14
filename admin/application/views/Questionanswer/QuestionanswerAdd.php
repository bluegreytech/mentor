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
					<?php if($QuestionAnswerId==1)
					{
						echo	"Edit Question";
					}
					else{
					echo	"Add Question";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Questionanswer/Questionanswerlist/" class="btn btn-primary" style="float:right">Back to Question List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_program" action="<?php echo base_url();?>Questionanswer/Questionansweradd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>							
								<div class="form-group">
									<label for="issueinput5">Question</label>
									<input type="hidden"   value="<?php echo $QuestionAnswerId; ?>" name="QuestionAnswerId">
									<select id="issueinput5" name="QuestionId" class="form-control" >
										<option value=""  selected="" disabled="">Select Question</option>					
											<?php
											foreach($questionData as $question)
											{
											?>
												<option value="<?php echo $question->QuestionId;?>" <?php if($QuestionId==$question->QuestionId){ echo "selected";}?>><?php echo $question->QuestionName;?></option>
											<?php
											}
											?>
									</select>
								</div>
							
								<div class="form-group">
									<label>Question Answer</label>
									<input type="text" class="form-control" placeholder="Question Answer" value="<?php echo $QuestionAnswer; ?>" name="QuestionAnswer"  minlength="5" maxlength="200">
								</div>
								<div class="form-group">
									<label >Questionanswer Rate</label>
								
									<select  name="QuestionAnswerRateid" class="form-control" >
										<option value=""  selected="" disabled="">Select Question</option>					
											<?php
											foreach($questionData as $question)
											{
											?>
												<option value="<?php echo $question->QuestionId;?>" <?php if($QuestionId==$question->QuestionId){ echo "selected";}?>><?php echo $question->QuestionName;?></option>
											<?php
											}
											?>
									</select>
								</div>
							



								<?php  if($IsActive!=''){ ?>
                                
											<div class="form-group">
											<label>Status</label>
												<div class="input-group">
														<label class="display-inline-block custom-control custom-radio ml-1">

														<input type="radio" name="IsActive" value="1"
														<?php if($IsActive==1) { echo "checked"; } ?>
														class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description ml-0">Active</span>
														</label>
														<label class="display-inline-block custom-control custom-radio">
														<input type="radio" name="IsActive" value="0"  <?php if($IsActive==0) { echo "checked"; } ?>                                                  
														class="custom-control-input">
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
													<input type="radio" name="IsActive" value="1"
													checked="" 
													class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Active</span>
													</label>
													<label class="display-inline-block custom-control custom-radio">
													<input type="radio" name="IsActive" value="0"
													class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Inactive</span>
													</label>
												</div>
											</div>
										<?php }?>


							

							<div class="form-actions">
							<?php if($QuestionAnswerId!=''){?>
								<button type="submit" name="updateQuestion" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addQuestion" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>Questionanswer/Questionanswerlist" name="CancelQuestionanswer" class="btn btn-danger">
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
					rules: {

									QuestionId: {
											required: true,
																},
									QuestionAnswerRateid:{
										required:true
									},
									QuestionAnswer: {
											required: true,
																},
		
					},

					messages: {

							QuestionId: {
								required: "Plesae select question",
								
													},
							QuestionAnswer: {
								required: "Please enter question answer",
								pattern : "Enter only characters and numbers and \"space , \" -",
								minlength: "Please enter at least 5 and maximum to 200 letters!",
													},
							QuestionAnswerRateid:{
								required: "Plesae select rate",								
													},
									
									}
				
		});
});

 
					        

</script>