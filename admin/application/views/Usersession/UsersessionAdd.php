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
					<h4 class="card-title" id="basic-layout-form"><?php if($UserSessionId==1)
					{
						echo	"Edit  Usersession";
					}
					else{
					echo	"Add  Usersession";
					}
						?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>UserSession/ListUsersession/" class="btn btn-primary" style="float:right">Back to Usersession List</a>
				</div></h4>
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" id="form_standard" action="<?php echo base_url();?>UserSession/AddUsersession/">
                       
                        
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
                               
                              <div class="form-group">
                              	<input type="hidden" name="UserSessionId" value="<?php echo $UserSessionId;?>">
									<label>Stream Type </label>
									<select name="streamid" class="form-control" id="streamid" >
										<option value="" selected="" disabled="">Please Select</option>

										<?php
											foreach($streamData as $str)
											{
											?>
												<option value="<?php echo $str->StreamTypeId;?>" <?php if($streamid==$str->StreamTypeId){ echo "selected";}?>><?php echo $str->StreamName;?></option>
											<?php
											}
											?>
									</select>
								</div>
								   <div class="form-group">
									<label>Standard Type</label>
								
									<select name="StandardId" class="form-control" id="StandardId">
										<option value="" selected="" disabled="">Please Select</option>										
									</select>
								</div>
								
								<div class="form-group">
									<label>Choose User</label>								
									<select name="UserId" id="UserId" class="form-control">
										<option selected="" disabled="">Please Select</option>
									</select>
								</div>
								<div class="form-group">
									<label>No of Session</label>							
									<input id="nousersession" name="nousersession" type="text" size="50" class="form-control"  placeholder="Enter session no."  value="<?php echo $Usersession_name;?>">
								</div>

								<div class="form-group">
									<label>Choose Location</label>							
									<input id="location" name="location" type="text" size="50" class="form-control"  placeholder="Enter Location"  value="<?php echo $location;?>">
								</div>
								
								<div class="form-group">
									<label>Timeing</label>	
									<div class='input-group date' id='datetimepicker1'>
										<span class="input-group-addon" id="">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
										<input type='text' class="form-control" name="timeing"  value="<?php  if( $StartDate!=''){ echo date('m/d/Y H:i A',strtotime($StartDate.' '. $Timeing)) ;}?>"/>
									
									</div>
										<span id="errordate"></span>
								</div>

								<div class="form-group">
									<label> Status</label>	
									<select name="workingstatus" class="form-control">
										<option value="" disabled="" selected="">Please Select </option>
										<option value="Pending" <?php if($status=="Pending"){echo "selected"; }?>>Pending</option>
										<option value="Reshedule" <?php if($status=='Reshedule'){ echo "selected";}?>>Reshedule</option>
										<option value="Complete" <?php if($status=='Complete'){ echo "selected"; }?>>Complete</option>
									</select>
									
								</div>
                                <?php  if($IsActive!=''){ ?>
                                
								<div class="form-group">
											<label>Session Status</label>
											<div class="input-group">
												<label class="display-inline-block custom-control custom-radio ml-1">
												<?php //echo $IsActive; ?>
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

							<?php } ?>

							</div>

							<div class="form-actions">
							<?php if($UserSessionId!=''){?>
								<button type="submit" name="updateStandard" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
							<?php }else{ ?>
								<button type="submit" name="addstandard" class="btn btn-primary">
									<i class="icon-check2"></i> Add
								</button>
							<?php } ?>
								<a href="<?php echo base_url(); ?>/Standard/Standardlist" name="CancelStandard" class=	"btn btn-danger">
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
	<?php $this->load->view('common/footer'); ?>

 <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfbGcMkZkG8YvL3iHFHFv5oP0wR-8pZGI&libraries=places&callback=initAutocomplete"
        async defer></script> -->
 <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuf4sk7IRu58djPrIHVZptfSQmHOisC38 &libraries=places"></script> -->
  
	 <script>
	

//});
       // stid= $('#Standardid').val('ddsd'); 
        //  StandardId="<?php //echo $standard_id;?>";
	         // alert(stid);
 function loadstream(){
		var $option = $('#streamid').find('option:selected'); 
		var streamid = $option.val();  
		//alert(streamid);
		url= '<?php echo base_url(); ?>'
	    if(streamid){
	    	$.ajax({
	        url: url+'usersession/getstandard',
	        type: 'POST',
	        data: {id : streamid},
	        success: function(data) {        	
	        	  $('#StandardId').html('<option value="" disabled="" selected="">Select Standard</option>'); 
	                    var dataObj = jQuery.parseJSON(data);
	                    if(dataObj){
	                        $(dataObj).each(function(){
	                        	
	                            var option = $('<option />');
	                            option.attr('value', this.StandardId).text(this.Standard);

	                            $('#StandardId').append(option);
	                           
	                            	  $("#StandardId option[value='<?php echo $standard_id ;?>']").attr('selected','true');
	                          

	                             
	                           
	                        });
	                         loadStandard();
	                    }else{
	                        $('#StandardId').html('<option value="">Standard not available</option>');
	                    }       	

	            console.log("Data sent!");
	        }
	    });   

	    }else{
	    	 $('#StandardId').html('<option value="">Please Select </option>');
	           // $('#city').html('<option value="">Select state first</option>'); 

	    }
}
function loadStandard(){
	
       var $option = $('#StandardId').find('option:selected'); 
		var StandardId = $option.val();  
		//alert(StandardId);
		url= '<?php echo base_url(); ?>'
    if(StandardId){
    	$.ajax({
        url: url+'usersession/getuser',
        type: 'POST',
        data: {id : StandardId},
        success: function(data) {
       // console.log(data);
        	  $('#UserId').html('<option value="" disabled="" selected="">Select User</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                        	//alert("fgfgf"+'<?php //echo $user_id ;?>');
                        	
                            var option = $('<option />');
                            option.attr('value', this.UserId).text(this.Email);           
                            $('#UserId').append(option);
                             $("#UserId option[value='<?php echo $user_id ;?>']").prop('selected','true');
                        });
                    }else{
                        $('#UserId').html('<option value="">User not available</option>');
                    }       	

            console.log("Data send!");
        }
    });   

    }else{
    	 $('#UserId').html('<option value="">Please Select </option>');
           // $('#city').html('<option value="">Select state first</option>'); 

    }

      
}

// init the countries
loadstream();



$('#streamid').change(function() {
   
    var $option = $(this).find('option:selected');   
    var streamid = $option.val();
    url= '<?php echo base_url(); ?>'
    if(streamid){
    	$.ajax({
        url: url+'usersession/getstandard',
        type: 'POST',
        data: {id : streamid},
        success: function(data) {
        	//console.log(data);
        	  $('#StandardId').html('<option value="" disabled="" selected="">Select Standard</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.StandardId).text(this.Standard);           
                            $('#StandardId').append(option);
                        });
                    }else{
                        $('#StandardId').html('<option value="">State not available</option>');
                    }       	

            console.log("Data sent!");
        }
    });   

    }else{
    	 $('#StandardId').html('<option value="">Please Select </option>');
           // $('#city').html('<option value="">Select state first</option>'); 

    }

});

///standard start ////

$('#StandardId').change(function() {
   
    var $option = $(this).find('option:selected');   
    var StandardId = $option.val();
   // alert(StandardId);
    url= '<?php echo base_url(); ?>'
    if(StandardId){
    	$.ajax({
        url: url+'usersession/getuser',
        type: 'POST',
        data: {id : StandardId},
        success: function(data) {
        
        	  $('#UserId').html('<option value="" disabled="" selected="">Select User</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.UserId).text(this.Email);           
                            $('#UserId').append(option);
                        });
                    }else{
                        $('#UserId').html('<option value="">User not available</option>');
                    }       	

            console.log("Data send!");
        }
    });   

    }else{
    	 $('#UserId').html('<option value="">Please Select </option>');
           // $('#city').html('<option value="">Select state first</option>'); 

    }

});
$(document).ready(function()
{
  	$(function () {
            $('#datetimepicker1').datetimepicker({
               
            });
    });
	$("#form_standard").validate(
	{
	rules: {
		nousersession:{
			required: true,
		},
		streamid:{
			required: true,	
		},
		UserId:{
			required: true,
		},
		Standard: {
			required: true,			
		},
		StandardId:{
			required:true,
		},
		timeing:{
			required:true,
		},
		location:{
			required:true,
		}
	},
	Standard: {
	StreamName: {
	required: "The stndard is mandatory!",
	pattern : "Enter only characters and numbers and \"space , \" -",
	minlength: "Please enter at least 2 and maximum to 50 letters!",
	},
	},
	errorPlacement: function(error, element) {
		console.log(element.attr("name"));
		  if (element.attr("name") == "timeing" ) {
                //$("#errordate").text(error);
                 error.appendTo("#errordate");  
            }else{
            	error.insertAfter(element);
            }
    
    }
	});
});
</script>
