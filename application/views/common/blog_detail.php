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
                            <h2><?php echo ucfirst($blog_title);?></span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                          <div>
                            <div class="ho-event pg-eve-main pg-blog">
                                  <?php  
                             if(($blog_image!='' && file_exists(base_path().'/admin/upload/blogimage/'.$blog_image))){ ?>
                                 <a href="<?php echo base_url()?>home/blog_detail/<?php echo $blog_id;?>">
                                <img  src="<?php echo base_url(); ?>admin/upload/blogimage/<?php echo $blog_image; ?>" alt="" class="img-responsive" >
                                  </a>
                            <?php } else{ ?>
                                <a href="<?php echo base_url()?>home/blog_detail/<?php echo $blog_id;?>">
                                 <img src="<?php echo base_url(); ?>default/images/pricing.jpg" class="img-responsive">
                                  </a>
                            <?php } ?>
                                <p><?php echo ucfirst($blog_desc);?></p>
                            </div>
                          </div>
                          <div class="text-center pad-top-20">  
                            <a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank"><img src="ADD_IMAGE_URL_HERE" alt="Share on Facebook" /></a>
                          <a href="<?php echo base_url()?>" class="custom-btn"><i class="fa fa-angle-double-left"></i> Back </a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


<?php include 'footer.php';?>
<script>
  function fbs_click() {
    u=location.href;t=document.title;
    window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
    return false;
  }
</script>