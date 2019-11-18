<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body"><!-- Basic Tables start -->
  
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
    <?php if(($this->session->flashdata('success'))){ ?>
        <div class="alert alert-success" id="successMessage">
        <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
        </div>
    <?php } ?>
       
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List of help
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <a href="<?php echo base_url();?>Help/addhelp/" class="btn btn-primary" style="float:right">Add help</a>
                </h4>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                <th>Help Title</th>
                                <th>Program Title</th>
                                <th>Help Image</th>
                                <th>Help Subtitle</th>
                             
								<th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
						<tbody>
                        <?php
                                $i=1;
                                if(!empty($result)){                             
                                foreach($result as $row)
                                {
                            ?>
                            <tr>
                            
                                    <td><?php echo $i; ?></td>                                   
                                    <td><?php echo $row->help_title; ?></td>
                                    <td><?php echo $row->program_title; ?></td>
                                   <td>
                                        <img src="<?php echo base_url();?>upload/helpimg/<?php echo $row->help_image;?>" class="img-thumbnail border-0" style="height: 50px;width:50px;">
                                    </td>
                                    <td><?php echo $row->help_subtitle;
                                        ?></td>
                                    <!-- <td><?php// echo $row->BlogDescription; ?></td> -->
                                  
                                    <td>
                                        <?php if($row->IsActive=='Active')
                                            {
                                                echo "Active";
                                            } 
                                            else
                                            {
                                                echo "Inactive";
                                            } 
                                        ?>
                                    </td>
                                    <td>
                                      <?php echo anchor('Help/edithelp/'.$row->help_id,'<i class="ficon icon-pencil2"></i>'); ?>
                                        <a href="javascript:void(0)" onclick="deletedata('<?php echo $row->help_id; ?>')" ><i class="ficon icon-bin"></i></a>     
                                    </td>  
                                </tr>      
                                <?php
                                $i++;
                                    } }
                                ?>           
                        </tbody>

                    </table>
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
$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 3000);
   
});

function deletedata(id,image){  
    $('#myModal').modal('show')
   
        $('#yes_btn').click(function(){
           
                url="<?php echo base_url();?>"
                $.ajax({
                url: url+"Help/help_delete/",
                type: "post",
                data: {id:id} ,
                success: function (response) {   
                   
               // document.location.href = url+'blog/bloglist/';                  

            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }
            })
           

        });
    
   

}
</script>

