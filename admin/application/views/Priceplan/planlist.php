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
                <h4 class="card-title">List of Plan
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <a href="<?php echo base_url();?>Price/addplan/" class="btn btn-primary" style="float:right">Add Plan</a>
                </h4>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                <th>Price Scheme</th>                                
                                <th>Plan Title</th>                                
                                <th>Plan Desc</th>                              
                                <th>Plan Status</th>								
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
                                    <td><?php  echo get_price_name($row->price_id); ?></td>                                  
                                    <td><?php echo $row->plan_title; ?></td>                                    
                                    <td><?php $rr=$row->plan_desc;
                                                   echo substr("$rr",0,30).'...';?></td>
                                    <!-- <td><?php// echo $row->BlogDescription; ?></td> -->
                                   
                                    <td>
                                        <?php if($row->priceplan_status=='Active')
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
                                        <?php echo anchor('price/editplan/'.$row->priceplan_id,'<i class="ficon icon-pencil2"></i>'); ?>
                                        <a href="javascript:void(0)"  onclick="deletedata('<?php echo $row->priceplan_id; ?>')" ><i class="ficon icon-bin"></i></a>    
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

function deletedata(id){ 
    $('#myModal').modal('show');
   
        $('#yes_btn').click(function(){           
                url="<?php echo base_url();?>"
                $.ajax({
                url: url+"price/plan_delete/",
                type: "post",
                data: {id:id} ,
                success: function (response) {  
                        alert(response);   
                        return false;
               // document.location.href = url+'price/planlist/';                  

            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }
            })
           

        });
    
   

}
</script>

