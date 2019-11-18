<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
//echo "<pre>";print_r(check_user_authentication());;
//$this->session->userdata('user_id');
 // echo $UserId=$this->session->userdata('user_id');
//error_reporting(E_ALL);
 

   $this->load->view('common/css');
?>
    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>default/images/logo.png" alt="" />
            </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <div style="padding: 6px;"> 
                             <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>default/images/logo.png" alt="" />
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            </div><br>

                            <div class="col-md-12 text-center">
                                <div class="call-link">
                                   <a href="tel:+91 8128738522 " class="contact-link">
                                   <i class="fa fa-phone"></i> Career Helpline: <b>+91 8128738522 </b>
                                   </a>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="display: inline-flex;">
                                <div style="width: 60%;">
                                  <h4><a href="#">Programs</a></h4>
                                  <?php $category=$this->home_model->getcategory();

                                   foreach($category as $val){
                                    $subcat=$this->home_model->getsubcatid($val->cat_id);

                                                                if(!empty( $subcat)){
                                                                 
                                  ?>
                              
                                  <?php
                                   foreach($subcat as $row){
                                    $pro=$this->home_model->getprobyid($row->subcat_id,$val->cat_id);
                                      ?>
                                    <h5><?php echo $row->subcat_title?></h5>
                                    <?php
                                    foreach($pro as $val1){
                                      ?>
                                        <ul>
                                    <li><a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>"><?php echo $val->cat_title?> <?php echo $val1->program_title?></a></li>
                                    </ul>
                                   <?php
                                 }
                                 ?>
                                
                                <hr>
                                <?php
                              }
                            }else{
                                $pro1=$this->home_model->getprobycatid($val->cat_id);
                              ?>
                                
                               
                                <ul>
                                    <?php
                                    foreach($pro1 as $val1){
                                      ?>
                                    <h5><?php echo $val->cat_title?></h5>
                                    <li><a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>"><?php echo $val1->program_title?></a></li>
                                    <?php
                                  }
                                  ?>
                                </ul>
                                <?php
                              }
                            }
                              ?>
                               
                              
                                </div>
                                <div class="col-md-6" style="width: 40%;">
                                    <h4><a href="#">Resources</a></h4>
                                    <h5><a href="<?php echo base_url()?>home/about_us">About Us</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/success">Success Stories</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/career_library">Career Library</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/blog/">Career News</a></h5>
                                    <h5><a href="<?php echo base_url()?>home/contact_us/">Contact Us</a></h5>
                                      
                                    <?php if(check_user_authentication()){   ?>
                                      <h5><a href="<?php echo base_url()?>home/profile" >My Profile</a></h5>
                                       <h5><a href="<?php echo base_url()?>home/logout" >Logout</a></h5>
                                    <?php }else{ ?>
                                    <h5><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a></h5>
                                    <h5><a href="#!" data-toggle="modal" data-target="#modal2">Sign Up</a></h5>
                                    <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Contact: Lake Road, Suite 180 Farmington Hills, U.S.A.</a>
                                </li>
                                <li><a href="#">Phone: +101-1231-1231</a>
                                </li>
                            </ul>
                        </div-->
                        <div class="ed-com-t1-right">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>home/about_us">About Us</a></li>
                                 <?php 
                                 if(check_user_authentication()){  ?>
                                      <li><a href="<?php echo base_url()?>home/profile" >My Profile</a></li>
                                       <li><a href="<?php echo base_url()?>home/logout" >Logout</a></li>
                                    <?php }else{ ?>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a></li>
                                    <li><a href="#!" data-toggle="modal" data-target="#modal2">Sign Up</a></li>
                                    <?php } ?>
                            </ul>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>default/images/logo.png" alt="" />
                            </a>
                        </div>

                        <div class="main-menu">
                            <ul>
<?php $category=$this->home_model->getcategory();?>
                              <li class="cour-menu">
                                  <a href="#!" class="mm-arr">Programs <span class="fa fa-angle-down"></span></a>
                                    
                                    <div class="mm-pos">
                                        <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div id="exTab3" class="container">  
                                                    <ul class="nav nav-tabs">
                                                      <?php
                                                      $c=0;
                                                      $c1=1;
                                                      foreach($category as $val){
                                                        $cls='';
                                                        if($c==0){
                                                          $cls='active';
                                                        }

                                                        ?>
                                                    
                                                        <li class="<?php echo $cls ?>">
                                                        <a  href="#m<?php echo $c1?>" data-toggle="tab">
                                                       <?php echo $val->cat_title?></a>
                                                        </li>
                                                        
                                                        <?php
                                                        $c++;
                                                        $c1++;
                                                      }

                                                      ?>
                                                    </ul>

                                                    <div class="tab-content ">
                                                      <?php
                                                      $x=0;
                                                      $y1=1;
                                                      foreach($category as $val){
                                                        $cls='';
                                                        if($x==0){
                                                          $cls='active';
                                                         
                                                        }else{
                                                          $cls='';
                                                           
                                                        }
                                                        $subcat=$this->home_model->getsubcatid($val->cat_id);
                                                       
                                                        ?>
                                                        <div class="tab-pane <?php echo $cls ?>" id="m<?php echo $y1 ?>">
                                                            
                                                                

                                                                <?php
                                                                if(!empty( $subcat)){
                                                                  foreach($subcat as $row){
                                                                    $pro=$this->home_model->getprobyid($row->subcat_id,$val->cat_id);
                                                                   
                                                               ?>
                                                               <div class="col-md-12">
                                                                <br>
                                                                <h6 style="font-weight:400;font-size: 16px;    margin-bottom: 20px;">   <?php echo $val->cat_title?>
                                                                  <span style="font-weight:600"><?php echo $row->subcat_title?></span>
                                                                </h6>
                                                              </div>
                                                          <?php
                                                               
                                                              $cnt='';
                                                                $cnt=count($pro);
                                                                if($cnt=='1'){
                                                                  $cls2='col-md-12';
                                                                }else if($cnt=='2'){
                                                                   $cls2='col-md-6';
                                                                }
                                                                else if($cnt=='4'){
                                                                   $cls2='col-md-3';
                                                                }
                                                                else if($cnt=='3'){
                                                                   $cls2='col-md-4';
                                                                }
                                                              foreach($pro as $val1){

                                                                  
                                                                ?>
                                                              
                                                              <div class="<?php echo $cls2;?>">
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;"><?php echo $val1->program_title?></h6>
                                                                  <strong><?php echo $val1->short_title?></strong>
                                                                  <p><?php
                                                                   $short_desc= $val1->short_desc;

                                                                echo substr( $short_desc,0,100);
                                                                  ?> <br>
                                                                  <a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                            <?php
                                                          }
                                                          ?>

                                                              <?php
                                                            }

                                                            }else{

                                                              $pro1=$this->home_model->getprobycatid($val->cat_id);
                                                              ?>
                                                             <?php
                                                               
                                                              $cnt='';
                                                                $cnt=count($pro1);
                                                                if($cnt=='1'){
                                                                  $cls2='col-md-12 text-center';
                                                                }else if($cnt=='2'){
                                                                   $cls2='col-md-6';
                                                                }
                                                                else if($cnt=='4'){
                                                                   $cls2='col-md-3';
                                                                }
                                                                else if($cnt=='3'){
                                                                   $cls2='col-md-4';
                                                                }
                                                              foreach($pro1 as $val1){

                                                                  
                                                                ?>
                                                             
                                                              <div class="<?php echo $cls2;?>">
                                                                 <br>
                                                                  <h6 style="margin-bottom: 0px;font-size: 15px;"><?php echo $val1->program_title?></h6>
                                                                  <strong><?php echo $val1->short_title?></strong>
                                                                  <p><?php  $short_desc= $val1->short_desc;

                                                                echo substr( $short_desc,0,100);?> <br>
                                                                  <a href="<?php echo base_url()?>home/program_detail/<?php echo $val1->pid?>">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                  </p>
                                                              </div>
                                                            <?php
                                                          }
                                                          ?>
                                                              <?php
                                                            }
                                                            ?>
                                                            
                                                        </div>
                                                      <?php
                                                        $x++;
                                                        $y1++;
                                                      }
                                                      ?>

                                                         <!-- <div class="tab-pane" id="m2">
                                                            <div class="col-md-12 text-center">
                                                                <br>
                                                                <strong>Overseas Application Program </strong>
                                                                 <p>End-to-end overseas admissions guidance to help you build the perfect applications for your target universities.<br>
                                                                  <a href="#">View More
                                                                      <span class="fa fa-angle-right"></span>
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>  -->
                                                      
                                                        
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="<?php echo base_url()?>home/success">Success Stories</a>
                                <li class="about-menu">
                                    <a href="#" class="waves-effect dropdown-button" href="#" data-activates="top-menu">Knowledge Center <span class="fa fa-angle-down"></span></a>
                                   
                                    <ul id="top-menu" class="dropdown-content top-menu-sty-custom">
                                          <li><a href="<?php echo base_url()?>home/career_library">Career Library</a></li>
                                          <li class="divider"></li>
                                          <li><a href="<?php echo base_url()?>home/blog">Career News</a></li>
                                    </ul>
                                </li>

                                   <li class="about-menu">
                                    <a href="#" class="waves-effect dropdown-button" href="#" data-activates="top-menu2">Contact us <span class="fa fa-angle-down"></span></a>
                                    <!-- MEGA MENU 1 -->
                                    <ul id="top-menu2" class="dropdown-content top-menu-sty-custom">
                                        <li><a href="<?php echo base_url()?>home/corporate_mentor/">Corporate Contact </a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo base_url()?>home/career_counsellor">Career Counsellor </a></li>
                                    </ul>

                            </ul>
                        </div>
                      
                    </div>
                    <div class="all-drop-down-menu">

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->


<style type="text/css">
.sbuttons {
  bottom: 5%;
  position: fixed;
  margin: 1em;
  left: 0;
  z-index: 99999;
}
.sbutton {
  display:none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  text-align: center;
  color: white;
  margin: 20px auto 0;
  box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);
  cursor: pointer;
  -webkit-transition: all .1s ease-out;
  transition: all .1s ease-out;
  position: relative;
}
.sbutton > i {
  font-size: 24px;
  line-height: 50px;
  transition: all .2s ease-in-out;
  transition-delay: 2s;
}
.sbutton:active,
.sbutton:focus,
.sbutton:hover {
  box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
}

.sbuttons:hover .sbutton{
  display: block;
}
.sbutton:not(:last-child) > i {
  font-size: 25px;
  line-height: 50px;
  color: #fff!important;
  transition: all .3s ease-in-out;
}

.sbutton:nth-last-child(1) {
  -webkit-transition-delay: 25ms;
  transition-delay: 25ms;
}
.sbutton:not(:last-child):nth-last-child(2) {
  -webkit-transition-delay: 20ms;
  transition-delay: 20ms;
}
.sbutton:not(:last-child):nth-last-child(3) {
  -webkit-transition-delay: 40ms;
  transition-delay: 40ms;
}
.sbutton:not(:last-child):nth-last-child(4) {
  -webkit-transition-delay: 60ms;
  transition-delay: 60ms;
}
.sbutton:not(:last-child):nth-last-child(5) {
  -webkit-transition-delay: 80ms;
  transition-delay: 80ms;
}
.sbutton:not(:last-child):nth-last-child(6) {
  -webkit-transition-delay: 100ms;
  transition-delay: 100ms;
}
 
[tooltip]:before {
   font-weight: 600;
  border-radius: 2px;
  background-color: #585858;
  color: #fff;
  content: attr(tooltip);
  font-size: 12px;
  visibility: hidden;
  opacity: 0;
  padding: 5px 7px;
  margin-left: 10px;
  position: absolute;
  left: 100%;
  bottom: 20%;
  white-space: nowrap;
}
 
[tooltip]:hover:before,
[tooltip]:hover:after {
  visibility: visible;
  opacity: 1;
}
.sbutton.mainsbutton {
  background: linear-gradient(to right, #b31217, #e52d27);
}
.sbutton.gplus {
  background: #F44336;
}
.sbutton.pinteres {
  background: #e60023;
}
.sbutton.twitt {
  background: #03A9F4;
}
.sbutton.fb {
  background: linear-gradient(to right, #2193b0, #6dd5ed);
}
.sbutton.whatsapp {
  background: linear-gradient(to right, #369b40, #3abe4d);
}
</style>
<div class="sbuttons">
  
  <a href="https://api.whatsapp.com/send?phone=918128738522&text=Hello,%0AMentor" target="_blank" class="sbutton whatsapp" tooltip="WhatsApp"><i class="fa fa-whatsapp"></i></a>  
    
  <a href="tel:+91 8128738522" class="sbutton fb" tooltip="+91 8128738522"><i class="fa fa-phone"></i></a>
  
  <a class="sbutton mainsbutton" style="display: block;"><i class="fa fa-comments"></i></a>
    
</div> 