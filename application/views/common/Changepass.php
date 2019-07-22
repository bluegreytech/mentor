<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');

$this->load->view('common/sidebar_second');
echo $UserId=$this->session->userdata('UserId');
?>


 <br><br><br><br><br><br><br><br><br>
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
                  <form method="post" action="<?php echo base_url();?>Dashboard/Userpass/<?php echo $UserId;?>">
                    <table align="center">
                        <tr> 
                            <td>Enter old password</td>
                            <td> 
                                <input type="text"   value="<?php echo $UserId; ?>" name="UserId">
                                <input type="text" name="Password" placeholder="Enter new password">
                            </td>
                            <tr>
                           
                            <td>Enter new password</td>
                          
                            <td>
                               <input type="text" name="CPassword" placeholder="Enter new password">
                            </td>
                       </tr>
                        </tr>
                        <tr>
                            <td clospan="2"><input type="submit" name="Submit" balue="Submit"></td>
                        </tr>
                       

                    </table>
                    
                  </form>
              

<?php 
 $this->load->view('common/footer_second');
?>