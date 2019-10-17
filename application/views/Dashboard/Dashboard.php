<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');
$this->load->view('common/sidebar_second');
$UserId=$this->session->userdata('user_id');
?>
   <style>
    .con-title h2 {
    font-size: 28px;
    margin-top: 0px;
    margin-bottom: 15px;
    line-height: 40px;
    text-align: center;
    margin-bottom: 40px;
}
.blog-post{
border: solid 1px #eee;
    margin-bottom: 30px;
display: inline-block;
    width: 100%;
    background: #fff;
    border-radius: 4px;
    overflow: hidden;
    transition: all .8s cubic-bezier(.165,.84,.44,1);
}
.blog-post .post-media {
    position: relative;
    overflow: hidden;
    margin-bottom: 25px;
}
.blog-post .post-media img {
    width: 100%;
}
.blog-post .post-header {
    padding: 0 20px 15px;
}
.blog-post .post-header p {
    color: #151515;
}
a.custom-btn{
    padding: 10px 20px;
    border: solid 1px #bb342f;
    transition: 1s;
}
   </style>
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
                           <a href="<?php echo base_url();?>home/profile/" class="btn-status">Update</a>
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
                          <div class="btn-row"><a href="<?php echo base_url();?>Mytest" >
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

 
    
        <div class="container">
            <div class="row">
                <div class="con-title">
                    <h2>News & Updates</h2>
                </div>
            </div>
            <div class="row">
         <?php
         foreach($latest_blog as $row){
          ?>
         
           <div class="col-md-4 text-center">
                    <div class="blog-post">
                        <div class="post-media">
                                                          <?php  
                             if(($row->blog_image!='' && file_exists(base_path().'/admin/upload/blogimage/'.$row->blog_image))){ ?>
                                 <a href="#">
                                <img  src="<?php echo base_url(); ?>admin/upload/blogimage/<?php echo $row->blog_image; ?>" alt="" class="img-responsive" style="height: 226px;">
                                  </a>
                            <?php } else{ ?>
                                <a href="#">
                                 <img src="<?php echo base_url(); ?>default/images/pricing.jpg" class="img-responsive">
                                  </a>
                            <?php } ?>
                                                    
                        </div>
                        <div class="post-header">
                          <h5 style="margin-bottom: 0;">
                            <a href="#"><?php echo $row->blog_title;?></a>
                          </h5>
                        </div>
                        <div class="post-header">
                           <p><?php $rr=$row->blog_desc;
                                                   echo substr("$rr",0,150).'...';
                         ?></p>
                          
                        </div>
                    </div>
                </div>
<?php
}
?>
                                  
                                 
            </div>
            <div class="text-center pad-top-20">  
                <a href="<?php echo base_url()?>/home/blog" class="custom-btn">View All  <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
 
</section>

</section>
<!-- test page code -->
<?php 
 $this->load->view('common/footer_second');
?>