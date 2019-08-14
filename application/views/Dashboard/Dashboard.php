<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');
$this->load->view('common/sidebar_second');
$UserId=$this->session->userdata('UserId');
?>
   
<section id="main-content"  class="dashboard-page dashboard-mobile">
   <section class="wrapper">
     
     <div class="row dashboard-post-section" >
       <div class="col-md-7 blog-cards">
     
      <div class="row dashborad-box-section desktop-status">

      <!-- free user use case -->

        <!-- my profile and os test completed -->
         <div class="col-md-3 widget">
            <div class="widget-content for-upgrade">
               <div class="status-box">
                  <div class="row">
                     <div class="col-xs-4 text-center">
                        <p class="dash-s-icon">
                          <span class="dashboard-icon-circle"><span class="fa fa-user icons"></span></span>Update Profile
                        </p>
                     </div>
                     <div class="col-xs-8">
                        <div class="right-fixed-box">
                           <p class="dashboard-squre-title">Update your profile.</p>
                           <div class="btn-row">
                           <a href="<?php echo base_url();?>Dashboard/Profileedit/<?php echo $UserId ;?>" class="btn-status">Update</a>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

               <!-- my tests -->
         <div class="col-md-3 widget">
            <div class="widget-content
               for-completed"  id="tourclose">
               <div class="status-box">
                  <div class="row">
                     <div class="col-xs-4 text-center">
                        <p class="dash-s-icon">
                          <span class="dashboard-icon-circle"><span class="fa fa-list icons"></span></span>
                         My Tests
                        </p>
                     </div>
                     <div class="col-xs-8">
                        <div class="right-fixed-box">
                           <p class="dashboard-squre-title">
                              Next: Interest Assessment                           </p>
                                                      <p>10/11 Remaining</p>
                           <div class="progress progress-xs">
                              <div class="progress-bar" role="progressbar" data-transitiongoal="9.0909090909091" aria-valuenow="59" style="width: 9.0909090909091%;"></div>
                           </div>
                          <div class="btn-row"><a href="#" >
                           View Result </a>
                           
                         
                          </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    
      
   </section>

 
</section>

</section>
<!-- test page code -->
<?php 
 $this->load->view('common/footer_second');
?>