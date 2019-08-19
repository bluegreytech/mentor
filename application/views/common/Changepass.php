<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');
$this->load->view('common/sidebar_second');
echo $UserId=$this->session->userdata('UserId');
?>

<section id="main-content" class="my-profile-details-page">
     <section class="wrapper">
        <?php if(($this->session->flashdata('error'))){ ?>
                     <div class="alert alert-danger" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
                     </div>
               <?php } ?>
                   <?php if(($this->session->flashdata('success'))){ ?>
                     <div class="alert alert-success" id="successMessage">
                     <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                     </div>
               <?php } ?>

               <div class="c_title">
                 <h2> Change Password</h2>
                 <div class="clearfix"></div>
               </div>

               <div class="c_panel panel-blank">
                  <div class="c_content">
                    <div class="row">
                     <div class="col-md-12 password-change">

                        <form method="post" action="<?php echo base_url();?>home/change_password/<?php echo $UserId;?>" id="form_changepassword">
                         <div class="col-md-12">
                          <div style="border: 1px solid #e9e9e9;padding: 20px 10px;background: #fff;">
                              <div class="form-group height-min">
                                 <label>Enter Old Password</label>
                                 <br>
                                  <input type="hidden"   value="<?php echo $UserId; ?>" name="UserId" class="form-control">
                                  <input type="password" name="old_password" class="form-control"  placeholder="Old Password"  id="old_password">
                              </div>
                              <div class="form-group height-min">
                                 <label>Enter New Password</label>
                                 <br>
                                  <input type="password" name="password" class="form-control"  placeholder="New Password" id="password">
                              </div>
                                <div class="form-group height-min">
                                 <label>Enter New Password</label>
                                 <br>
                                  <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                              </div>
                              <div class="form-group height-min">
                              <input value="Submit" class="btn btn-primary next-profile-btn pull-right" type="submit" name="Submit">
                              </div>
                          </div>
                        </div>
                  </form>
                     </div>
                    </div>
                  </div>
              </div>
        </section>
      </section>
<?php 
 $this->load->view('common/footer_second');
?>

<script>
$(document).ready(function()
{
 
  $("#form_changepassword").validate(
  {
  rules: {
  old_password:{
    required: true,
    //password_check:true,
  },
  password:{
    required: true,
  },
  cpassword:{
    required: true,
    equalTo:"#password",
  },
  },

  });
});
$.validator.addMethod("password_check", function(value, element) {

        var response;
        var user_id=$("#old_password").val();
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('home/oldpassword_check'); ?>",
      data:{password:value},  
      async:false,
      success:function(data) {
        console.log()
          response = data;
      }
    });
    if(response == 0) {
      alert();
      return false;
    } else if(response == 1) {
      return true;
    }
  }, "The old password you have entered is incorrect.");
</script>
