<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
 
     
	 $this->load->view('common/header');


?>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>default/css/owl.carousel.min.css">

  <section class="mob-slider">
        <!-- SLIDER -->
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1349px;height:560px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo base_url(); ?>default/images/slider/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1349px;height:560px;overflow:hidden;">
                <div>
                    <img data-u="image" src="<?php echo base_url(); ?>default/images/slider/1.jpg" />
                    <div style="position:absolute;top:150px;left:485px;height:40px;font-size:32px;color:#000;line-height:1.2;text-align:center;">
                        <h2>Explore</h2>
                        <h3>Give your exploration a direction.</h3>

                        <select name="cars" style="width: 400px;">
                            <option value="1">Career Assessment for 2nd - 7th class</option>
                            <option value="2">Career Assessment for 8th class</option>
                            <option value="3">Career Assessment for 9th - 12th class</option>
                            <option value="4">Career Assessment for Graduates</option>
                            <option value="4">Career Assessment for Professionals</option>
                        </select>
                    </div>
                       <?php if(!check_user_authentication()){ ?>
                    <a style="position:absolute;top:350px;left:585px;width:170px;height:49px;max-width:170px;" href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1">Start Assessment </a>
                    <?php } else{ ?>
                           <a style="position:absolute;top:350px;left:585px;width:170px;height:49px;max-width:170px;" href="<?php echo base_url()?>Mytest" class="bann-btn-1">Start Assessment </a>
                    <?php } ?>

                    <!-- div class="event-picker wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                      <h3>Give your exploration a direction.<br><br></h3>
                      <p>Connect With Us</p>
                      <a href="#!" data-toggle="modal" data-target="#modal2" class="link">Register here <i class="ti-angle-right"></i></a>
                    </div> -->
                </div>
                <div>
                    <img data-u="image" src="<?php echo base_url(); ?>default/images/slider/2.jpg" />
                    <div style="position:absolute;top:150px;left:290px;height:40px;font-size:32px;color:#fff;line-height:1.2;text-align:center;">
                        <h2>Execute</h2>
                        <h3 style="line-height: 1.4">You can’t reach a destination without <br>walking,let’s walk together / No dream can be achieved without action. </h3> 
                        <select name="cars" style="width: 400px;">
                            <option value="1">Career Assessment for 2nd - 7th class</option>
                            <option value="2">Career Assessment for 8th class</option>
                            <option value="3">Career Assessment for 9th - 12th class</option>
                            <option value="4">Career Assessment for Graduates</option>
                            <option value="4">Career Assessment for Professionals</option>
                        </select>
                    </div>
                     <?php if(!check_user_authentication()){ ?>
                    <a style="position:absolute;top:390px;left:586px;width:170px;height:49px;max-width:170px;" href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1">Start Assessment </a>
                    <?php } else{ ?>
                           <a style="position:absolute;top:370px;left:560px;width:170px;height:49px;max-width:170px;" href="<?php echo base_url()?>Mytest" class="bann-btn-1">Start Assessment </a>
                    <?php } ?>

                </div>
                <div>
                    <img data-u="image" src="<?php echo base_url(); ?>default/images/slider/3.jpg" />
                    <div style="position:absolute;top:150px;left:450px;height:40px;font-size:32px;color:#000;line-height:1.2;text-align:center;">
                        <h2>Emerge</h2>
                        <h3>Emerge into the best version of yourself.</h3>
                        <select name="cars" style="width: 400px;">
                            <option value="1">Career Assessment for 2nd - 7th class</option>
                            <option value="2">Career Assessment for 8th class</option>
                            <option value="3">Career Assessment for 9th - 12th class</option>
                            <option value="4">Career Assessment for Graduates</option>
                            <option value="4">Career Assessment for Professionals</option>
                        </select>
                    </div>
                    <?php if(!check_user_authentication()){ ?>
                    <a style="position:absolute;top:350px;left:580px;width:170px;height:49px;max-width:170px;" href="#!" data-toggle="modal" data-target="#modal1" class="bann-btn-1">Start Assessment </a>
                    <?php } else{ ?>
                           <a style="position:absolute;top:350px;left:580px;width:170px;height:49px;max-width:170px;" href="<?php echo base_url()?>Mytest" class="bann-btn-1">Start Assessment </a>
                    <?php } ?>

                 </div>
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb110" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <rect class="b" x="2200" y="2200" width="11600" height="11600"></rect>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora101" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6080"></circle>
                    <polygon class="a" points="8789.5,4902.8 8789.5,5846.4 6801.7,8000 8789.5,10153.6 8789.5,11097.2 5930.5,8000 "></polygon>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora101" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6080"></circle>
                    <polygon class="a" points="7210.5,4902.8 7210.5,5846.4 9198.3,8000 7210.5,10153.6 7210.5,11097.2 10069.5,8000 "></polygon>
                </svg>
            </div>
        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>
        <!-- #endregion Jssor Slider End -->
    </section>

      <!-- POPULAR COURSES -->
    <section class="pop-cour">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>Our <span>Programs</span></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
              <div id="exTab2">  
                    <ul class="nav nav-tabs">
                        <?php
                          $c=0;
                          $c1=1;
                         
                        foreach($category1 as $val){
                            $cls='';
                            if($c==0){
                              $cls='active';
                              }
                            ?>
                        

                        <li class="<?php echo $cls ?>">
                         <a  href="#<?php echo $c1?>" data-toggle="tab"><?php echo $val->cat_title?></a>
                        </li>
                        <?php
                         $c++;
                          $c1++;
                    }
                    ?>
                       
                    </ul>

                    <div class="tab-content">
              <?php
            
                $x=0;
                $y1=1;
              foreach($category1 as $val){
                 $cls='';
                  if($x==0){
                    $cls='active';
                   }else{
                  $cls='';
                 }
                $subcat=$this->home_model->getsubcatid($val->cat_id);
                             
                ?>
               <div class="tab-pane <?php echo $cls ?>" id="<?php echo $y1 ?>">

                             <?php
                               if(!empty( $subcat)){
                                                                
                                                                   
                                ?>
                             <div id="exTab2" class="sub-tab">  
                                <ul class="nav nav-tabs">
                                    <?php
                                    $x=0;
                                    foreach($subcat as $row){
                                    $pro=$this->home_model->getprobyid($row->subcat_id,$val->cat_id);
                                    $cls='';
                               if($x==0){
                                  $cls='active';
                                }else{
                                     $cls='';
                                                           
                                    }
                                    ?>
                                    <li class="<?php echo $cls ?>">
                                    <a  href="#S<?PHP echo $x?>" data-toggle="tab"><?php echo $row->subcat_title?></a>
                                    </li>
                                  <?php
                                  $x++;
                              }
                                  ?>
                                </ul>

                        <div class="tab-content">
                            <?php
                                     $x=0;
                                    foreach($subcat as $row){
                                    $pro=$this->home_model->getprobyid($row->subcat_id,$val->cat_id);
                                    $cls='';
                               if($x==0){
                                  $cls='active';
                                }else{
                                     $cls='';
                                                           
                                    }
                                    ?>
                                 <div class="tab-pane <?php echo $cls ?>" id="S<?PHP echo $x?>">
                                        <br><Br>
                                        <div class="row">
                                   <?php
                                       
                                      
                                          foreach($pro as $val1){ 

                                         


                                          ?> 
                                
                               
                                            <div class="col-md-6">
                                                <div>
                                                   
                                                    <div class="home-top-cour">
                                                       
                                                        <div class="col-md-12 home-top-cour-desc">
                                                            <a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>">
                                                                <h3><?php echo $val1->program_title?></h3>
                                                            </a>
                                                            <h4><?php echo $val1->short_title?></h4>
                                                              <p class="bold"><?php
                                                                  echo   $val1->short_desc;?></p>
                                                          
                                                                  <p><?php
                                                                    $ldesc =  $val1->long_desc;
                                                                    echo substr($ldesc,0,100);?>
                                                                  </p> 
                                                            <div class="hom-list-share">
                                                                <ul>
                                                                    <li><a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                                                </ul>
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
                                    <?php
                                  $x++;
                                 }
                                      ?>

                        </div>
                      </div>
                        <?php
                    }else{
                      ?>
             <div class="row">
  <?php
                        $pro1=$this->home_model->getprobycatid($val->cat_id);

                        $cnt='';
                        $cnt=count($pro1);
                        if($cnt=='1'){
                              $cls2='col-md-12';
                         }else if($cnt=='2'){
                                      $cls2='col-md-6';
                             }
                            else if($cnt=='4'){
                               $cls2='col-md-6';
                              }
                              else if($cnt=='3'){
                                     $cls2='col-md-4';
                               }
                         foreach($pro1 as $val1){

                      ?>
                         
                       
                           
                                <div class="<?php echo $cls2?>">
                                <div class="home-top-cour">
                                    
                                    <div class="col-md-12 home-top-cour-desc">
                                        <a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>">
                                            <h3><?php echo $val1->program_title?></h3>
                                        </a>
                                         <p><?php echo $val1->short_desc;?></p><br>
                                        <div class="hom-list-share">
                                            <ul>
                                                <li><a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>"><i class="fa fa-bar-chart" aria-hidden="true"></i> View More </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                            
                            <?php
                        }
                        ?>
                      </div>
                      <?php
                    }
                        ?>
                        </div>
                        <?php
                         $x++;
                          $y1++;
                    }
                    ?>
                      
                       
                    </div>
                </div>
            </div>
            
        </div>
    </section>
     <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">

                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>Mentor's: 6 Steps Effective Assessment To Find Best Fit Carrer</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="s18-age-event l-info-pack-days">
                        <ul>
                          <?php
                          $x=1;
                          $y=11;

                          foreach($service as $val){

                           


                              ?>

                            <li>
                                <div class="age-eve-com age-eve-1">
                                    <img src="<?php echo base_url()?>/admin/upload/Servicesimage/<?php echo $val->services_image?>" alt="">
                                </div>
                                <div class="s17-eve-time">
                                    <div class="s17-eve-time-tim">
                                        <span>Step <?php echo $x?></span>
                                    </div>
                                    <div class="s17-eve-time-msg">
                                        <h4><?php echo $val->services_title?></h4>
                                        <p class="program-title"><?php echo $val->services_sdesc?></p>
                                        <div class="time-hide time-hide-<?php echo $x?>" style="display: none;">
                                            <p> <?php echo $val->services_ldesc?></p>
                                        </div>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-<?php echo $x?>-btn" style="display: block;">
                                        <i class="fa fa-angle-down"></i>
                                        </a>
                                        <a href="#!" class="s17-sprit age-dwarr-btn time-hide-<?php echo $y?>-btn hb-com" style="display: none;">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    </div>
                                </div>
                            </li>
                          <?php
                          $x++;
                          $y++;
                        }
                        ?>
                            
                        </ul>
                    </div>
                    </div>
                    <?php 
                    $mentor_step_link=(isset($setting[0]->mentor_step_link)!='')?$setting[0]->mentor_step_link:"";
                    ?>
                    <div class="col-md-6" style="padding:20px 0px">
                        <iframe width="100%" height="450" src="<?php echo $mentor_step_link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->
    
    <section style="background-color: #f5f5f5;">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2>News & Updates</h2>
                </div>
            </div>
            <div class="row">
                <?php 
                  foreach ($latest_blog as $row) { ?>
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
                          <p><a href="<?php echo base_url()?>home/blog_detail/<?php echo $row->blog_id; ?>">Read More</a></p>
                        </div>
                    </div>
                </div>
                 <?php  } ?>                
            </div>
            <div class="text-center pad-top-20">  
                <a href="<?php echo base_url()?>home/blog" class="custom-btn">View All  <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </section>

    <section style="background: linear-gradient(to right, #b31217, #e52d27);">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2 style="color: #fff">Testimonials</h2>
                </div>
            </div>
            <div class="row">
        <div class="col-md-10 col-center m-auto">
            <div id="myCarousel" class="carousel slide" >
                <!-- Carousel indicators -->

                <ol class="carousel-indicators">
                    <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li> -->
                </ol>   
                <!-- Wrapper for carousel items -->

               <!-- Wrapper for carousel items -->

                <div class="carousel-inner">
                         
                    <?php $testresult= get_all_records('tbltestimonial');
                     $i=1;
                    foreach ($testresult as $row) {  //echo $row->testimonial_image ;?>
                        <?php $item_class = ($i == 1) ? 'active' : ''; ?>
                         <div class="item carousel-item <?php echo  $item_class; ?>">
                            <?php  
                             if(($row->testimonial_image!='' && file_exists(base_path().'/admin/upload/testimonialimage/'.$row->testimonial_image))){ ?>
                                 <div class="img-box"><img  src="<?php echo base_url(); ?>admin/upload/testimonialimage/<?php echo $row->testimonial_image; ?>" alt=""></div>
                                
                            <?php } else{ ?>
                                <div class="img-box"><img src="<?php echo base_url(); ?>default/images/a6.png" alt=""></div>
                            <?php }?>
                      
                        <p class="testimonial"><?php echo $row->testimonial_desc; ?></p>
                        <p class="overview"><b><?php echo $row->testimonial_title;?></b></p>
                    </div>
                    
                    <?php $i++;} ?>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
        </div>
    </section>
<?php
$about_title=(isset($about[0]->about_title)!='')?$about[0]->about_title:"";
$about_desc=(isset($about[0]->about_desc)!='')?$about[0]->about_desc:"";
$about_img=(isset($about[0]->about_img)!='')?$about[0]->about_img:"";
?>
    <section style="background-color: #f5f5f5;">
        <div class="container com-sp">
            <div class="row">
                <div class="con-title">
                    <h2><?php echo $about_title  ?></h2>
                </div>
            </div>
            <div class="row">
                <!--First Blog-->
                <div class="col-md-6 text-justify">
                   <?php echo $about_desc  ?>
                </div>
                <div class="col-md-6">
                    <img src="<?php base_url(); ?>admin/upload/helpimg/<?php echo  $about_img?>" class="img-responsive">
                </div>
                <!--Second Blog-->
            </div>
            <div class="text-center pad-top-20">  
                <br>
                    <a href="<?php base_url(); ?>home/about_us" class="custom-btn">Read More <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </section>

   


<?php 
 $this->load->view('common/footer');
?>
