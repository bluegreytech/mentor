<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>

<section class="header-layer login-bg">
   <div class="black-sheet">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h6>News & Update</h6>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-12 bg-sec">
         </div>
      </div>
   </div>
</section>
<section class="text-center about custom-blog">

   <div class="container">
      <div class="row">
          <div class="text-center" id="posts">

               <?php $blogresult= get_all_records('tblblog');
                  foreach ($blogresult as $row) { ?>
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
                            <a href="#">Academic Vs. Professional Degree After Class 12th: Which One is Better?</a>
                          </h5>
                        </div>
                        <div class="post-header">
                          <p>When you completed Class 10, you had a relatively simple choice of 3 streams, but now when you pass out of Class 12, you...</p>
                          <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>
                 <?php  } ?>


         </div>
      </div>
  </div>
</section>

<?php 
 $this->load->view('common/footer');
?>