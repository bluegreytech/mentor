<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
$program_title=(isset($pro_det[0]->program_title)!='')?$pro_det[0]->program_title:"";
$short_desc=(isset($pro_det[0]->short_desc)!='')?$pro_det[0]->short_desc:"";
?>
  <section>
        <div class="head-2 default">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                	<div class="col-md-12">
                    <h1 class="mgccap">Mentor  Certified Career Analyst Programme for <?php echo $program_title?> </h1>
                    
                    <p><?php echo $short_desc?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--SECTION START-->
    <?php
    if(!empty($key)){
        ?>
    
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Key <span>Highlights</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	    <div class="ed-about-sec1">
                        <div class="ed-advan">
                            <ul>
                                <?php
                                foreach($key as $val){
                                    ?>
                                
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="<?php echo base_url()?>admin/upload/helpimg/<?php echo $val->key_img?>" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4><?php echo $val->key_title?></h4>
                                        <?php echo $val->key_desc?>
                                    </div>
                                </li>
                               <?php
                           }
                           ?>
                            </ul>
                        </div>
                    </div>
                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
            </div>
        </div>
    </section>
    <?php
}
?>
    <!--SECTION END-->

  <?php
    if(!empty($learn)){
        ?>
    <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>What will you learn</span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                      <div>
               <div class="featurette">
                <!------------------------code---------------start---------------->
                <div>
                    <div id="custom_carousel" class="carousel slide mgccap" data-ride="carousel" data-interval="3500">
                      <!-- End Carousel Inner -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php
                            $l=0;
                                foreach($learn as $val){
                                    $cls='';
                                    if($l==0){
                                         $cls='active';
                                    }else{
                                        $cls=''; 
                                    }
                                    ?>
                                
                            <div class="item <?php echo $cls?>">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6" style="padding:80px 30px">
                                            <h4><?php echo $val->learn_title?> </h4>
                                           <?php echo $val->learn_desc?>
                                        </div>
                                        <div class="col-md-6"><img src="<?php echo base_url()?>admin/upload/helpimg/<?php echo $val->learn_img?>" class="img-responsive"></div>
                                        
                                    </div>
                                </div>
                            </div>
                          <?php
                          $l++;
                      }
                      ?>
                            <!-- End Item -->
                        </div>
                        
                    </div>
                    <!-- End Carousel -->
                
            <!----Code------end----------------------------------->
        </div>
  </div>
</div>
                      </div>
                      


                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
    <!--SECTION END-->

<?php
$site_choosementor=(isset($setting[0]->site_choosementor)!='')?$setting[0]->site_choosementor:"";
?>

   

    <div class="who-choose-banner" id="scroll-why">
      <h3 class="h3-title">Why Choose Mentor?</h3>
      <p class="p-title"><?php echo $site_choosementor?>
      </p>
      <a class="custom-btn" href="<?php echo base_url(); ?>home/about_us">Read More <i class="fa fa-angle-double-right"></i></a>
   </div>

<?php 
 $this->load->view('common/footer');
?>
<script>
            $(document).ready(function (ev) {
                $('#custom_carousel').on('slide.bs.carousel', function (evt) {
                    $('#custom_carousel .controls li.active').removeClass('active');
                    $('#custom_carousel .controls li:eq(' + $(evt.relatedTarget).index() + ')').addClass('active');
                })
            });
        </script>