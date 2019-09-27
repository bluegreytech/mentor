<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>


   <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                          <h2>News & Updates</h2>
                           <!--  <h2>Mentor's <span> Blog</span></h2> -->
                        </div>
                    </div>
                    <div class="pg-contact">
                        <!--First Blog-->
                        <?php $blogresult= get_all_records('tblblog');
                  foreach ($blogresult as $row) { ?>
                   <div class="col-md-4 text-center">
                    <div class="blog-post">
                        <div class="post-media">
                             <?php  
                             if(($row->blog_image!='' && file_exists(base_path().'/admin/upload/blogimage/'.$row->blog_image))){ ?>
                                 <a href="<?php echo base_url()?>home/blog_detail/<?php echo $row->blog_id;?>">
                                <img  src="<?php echo base_url(); ?>admin/upload/blogimage/<?php echo $row->blog_image; ?>" alt="" class="img-responsive" style="height: 226px;">
                                  </a>
                            <?php } else{ ?>
                                <a href="<?php echo base_url()?>home/blog_detail/<?php echo $row->blog_id;?>">
                                 <img src="<?php echo base_url(); ?>default/images/pricing.jpg" class="img-responsive">
                                  </a>
                            <?php } ?>
                        
                        </div>
                        <div class="post-header">
                          <h5 style="margin-bottom: 0;">
                            <a href="<?php echo base_url()?>home/blog_detail/<?php echo $row->blog_id;?>">Academic Vs. Professional Degree After Class 12th: Which One is Better?</a>
                          </h5>
                        </div>
                        <div class="post-header">
                          <p>When you completed Class 10, you had a relatively simple choice of 3 streams, but now when you pass out of Class 12, you...</p>
                          <p><a href="<?php echo base_url()?>home/blog_detail/<?php echo $row->blog_id;?>">Read More</a></p>
                        </div>
                    </div>
                </div>
                 <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->



<?php 
 $this->load->view('common/footer');
?>