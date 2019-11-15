<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
?>


 
<!--SECTION START-->
    <section style="background:#f6f6f6;">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Success<span> Stories</span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <!--First stories-->
                          <?php
                          if(!empty($success)){
                            foreach($success as $val){
                            ?>
                         
                        <div class="row">
                          <div class="col-md-1"></div>
                            <div class="col-md-10">
                              <div class="col-md-5" style="padding: 0">
                                <img src="<?php echo base_url()?>admin/upload/storyimage/<?php echo $val->story_img?>" class="img-responsive">
                              </div>
                              <div class="col-md-7" style="padding: 0">
                                <div class="content-box" style="background-color: #fff">
                                <h5><?php echo $val->story_title?></h5>
                                <p><?php echo $val->story_desc?></p>
                                <a href="<?php echo base_url()?>Home/success_detail/<?php echo $val->story_id?>" class="custom-btn">Read More  <i class="fa fa-angle-double-right"></i></a>
                                </div>
                              </div>
                            </div>
                          <div class="col-md-1"></div>
                        </div>
                        <br><br>
                        <?php
                      }
                      }
                        ?>
                       

                    </div>
                    <div class="row text-center">

                   
<?php echo $links; ?>

</div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->
</div>
<!-- <input type="hidden" id="csrf_mindler_token" name="ci_csrf_token" value=""> -->
<?php 
 $this->load->view('common/footer');
?>