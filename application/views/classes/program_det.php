<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');

$program_title=(isset($pro_det[0]->program_title)!='')?$pro_det[0]->program_title:"";
$short_title=(isset($pro_det[0]->short_title)!='')?$pro_det[0]->short_title:"";
$short_desc=(isset($pro_det[0]->short_desc)!='')?$pro_det[0]->short_desc:"";
$long_desc=(isset($pro_det[0]->long_desc)!='')?$pro_det[0]->long_desc:"";
?>
    <section>
        <div class="head-2 std11">
            <div class="container">
                <div class="head-2-inn head-2-inn-padd-top">
                    <h1>Career Counselling Programs for <?php echo $program_title?></h1>
                     <?php if(!check_user_authentication()){ ?>
                    <a  href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1 asets-btn" data-events="auto" data-display="block">Start Assessment </a>
                  <?php } else{ ?>
                     <a  href="<?php echo base_url()?>Mytest" class="bann-btn-1 asets-btn" data-events="auto" data-display="block">Start Assessment </a>
                  <?php } ?>
                    <!--p>Nurturing Minds</p-->
                </div>
            </div>
        </div>
    </section>

    <!--SECTION START-->
   
    
    <section>


        <div class="container com-sp pad-bot-70">

           <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Program <span> Overview</span></h2>
                        </div>
                        <div class="title-des">
                            <h4><?php echo $short_title?></h4>
                            <p class="bold"><?php echo $short_desc?></p>
                            <?php echo $long_desc?>                  
                        </div>
                    </div>
                </div>
            </div>

             <?php
    if(!empty($help)){
      ?>
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Let Us Help</h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                      <div>
               <div class="featurette">
                <!------------------------code---------------start---------------->
                <div>
                    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
                      <!-- End Carousel Inner -->
                        <div class="controls">
                            <ul class="nav">
                              <?php
                              $x=0;
                              foreach($help as $val){
                                $cls='';
                                if($x==0){
                                  $cls='active';
                                }
                                ?>
                              
                                <li data-target="#custom_carousel" data-slide-to="<?php echo $x?>" class="<?php echo $cls?>">
                                    <a href="#"><small><?php echo $val->help_title?></small></a>
                                </li>
                                <?php
                                $x++;
                              }
                              ?>
                               
                            </ul>
                        </div>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                           <?php
                              $x=0;
                              foreach($help as $val){
                                $cls='';
                                if($x==0){
                                  $cls='active';
                                }
                                ?>
                            <div class="item <?php echo $cls?>">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?php echo $val->help_subtitle?> </h4>
                                           <?php echo $val->help_desc?>
                                        </div>
                                        <div class="col-md-6"><img src="<?php echo base_url()?>admin/upload/helpimg/<?php echo $val->help_image?>" class="img-responsive"></div>
                                        
                                    </div>
                                </div>
                            </div>
                         <?php
                                $x++;
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
                 <?php
  }
  ?>
            </div>
            
        </div>
    </section>
   
    <!--SECTION END-->

    <!--SECTION START-->
    <section style="background-color: #f5f5f5;">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Let's help you discover your perfect stream</h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                      <!--Pricing 1-->
                      <?php
                      foreach($discover_plan as $plan){

                        $price_plan=$this->home_model->getpricing($plan->price_id);
                        ?>
                      
                      <div class="col-lg-4 col-sm-6">
                        <div class="price-item text-center">

                            <h3><?php echo $plan->price_title?></h3>
                            <span class="cl">Perfect Choice For Individual</span>
                            <div class="price-tag">
                                <span><i class="fa fa-inr"></i> <?php echo $plan->price_amt?></span>
                            </div>
                            <div class="gap-p">
                                <?php
                                foreach($price_plan as $val){
                                  ?>
                                <?php
                                if($val->priceplan_status=='Active'){
                                  ?>
                                
                                <p>
                                  <i class="fa fa-check"></i>
                                  <?php
                                }else{
                                  ?>
                            <p class="disabled">
                                  <i class="fa fa-close"></i>
                                  <?php
                                }
                                ?>
                                  <b><?php echo $val->plan_title?></b><br>
                                 <?php echo $val->plan_desc?>
                                </p>
                                <?php
                              }
                              ?>
                                
                            </div>
                            <div class="price-btn">
                                <a href="#">Get Started</a>
                            </div>
                        </div>
                      </div>
                     <?php
                   }
                   ?>
                      


                    </div>
                </div>
            </div>
        </div>
    </section>
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

   <!--SECTION START-->
    <section style="background:#f6f6f6;">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                  <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Frequently Asked Questions </h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <!--First stories-->
                        <div class="row">
                            <?php
                            $i=0;
                            foreach($faq as $val){
                               if($i%4==0){
                           ?>
                          <div class="col-md-6">
                            <?php
                          }
                          ?>
                                  <div class="s17-eve-time">
                                      <div>
                                        <h4><?php echo $val->faq_title?></h4>
                                        <p><?php echo $val->faq_desc?></p>
                                      </div>
                                  </div>
                                <?php
                                $i++;
                                if($i%4==0){

                               ?>
                          </div>
                         <?php
                       }
                       }
                       ?>
                      </div>
                     
                          
                  

                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

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