<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
       <div class="content-body">
        <!-- Basic Tables start -->
  
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
   <?php //echo $this->session->flashdata('success');?>
    <?php if(($this->session->flashdata('success'))){ ?>
        <div class="alert alert-success" id="successMessage">
        <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
        </div>
    <?php } ?>
       
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">View <?php echo $name;?> Inquiry
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              
                </h4>
            </div>
            <div class="card-body collapse in">
                <div class="card-block center">
                 
                       <label><b>Name:</b></label>
                         <span><?php echo $name;?></span>
                         <br>

                          <label><b>Email:</b></label>
                         <span><?php echo $email;?></span>
                         <br>
                         <label><b>Message:</b></label>
                         <span><?php echo $subject;?></span>
                         <br>
                          <label><b>Send Date:</b></label>
                         <span><?php echo  date("d-m-Y", strtotime($create_date));
                         ?></span>

                
                        <hr>
                    <div class="form-actions">


                    <input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>home/<?php echo $redirect_page; ?>'">
                    </div>
                    </div>
             
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->



        </div>
      </div>
    </div>
<!---start Delete menu--->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document" style="margin:20% auto;">
        <div class="modal-content">
            <div class="modal-body" >
              	<p>Are you sure you want to delete this record?</p>
              </div>
              <div class="modal-footer text-center">
              	<!--<button type="button" class="next_btn" id="yes_btn" name="update">Yes</button>-->
				<center><button type="button" class="btn-md btn-icon btn-link p4" id="yes_btn" ><a href="" id="deleteYes" value="Yes"  class="btn btn-success">Yes</a></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
            </div>
        </div>
    </div>
</div>
<!---End Delete menu--->
<?php 
$this->load->view('common/footer');
?>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 3000);
   
});

function deletedata(id,image){  
    $('#myModal').modal('show');
   //alert(image);
        $('#yes_btn').click(function(){
           
                url="<?php echo base_url();?>home/page_delete/";
               // alert(url);
                $.ajax({
                url: url,
                type: "post",
                data: {id:id,pageimage:image} ,
                success: function (response) { 
                    console.log(response);  
                  return false;   
                //document.location.href = url+'project/projectlist';                  

            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }
            })
           

        });
    
   

}
</script>

