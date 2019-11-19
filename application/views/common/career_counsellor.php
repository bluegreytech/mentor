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
                            <h2>Career <span> Counsellor</span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <div class="col-md-12 text-justify">
                            <p>Mentor Education & Career Development Center is an initiative of MENTOR Knowledge Management Pvt Ltd which is creating wonders positively since 2004 by assisting parents and students to improve the way they are taking career decisions and also the way they are implementing them for a better tomorrow. It is associating career life cycle with the fusion of technology and human intervene involving all three stages of career life cycle i.e Career Mentoring, Career Establishing and Career Habitatiating which ensures the better and brighter career of a student and contentment for parents. MENTOR associates includes universities, colleges, schools and educators from various fields in education sector world wide.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12 ">
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
                </div>
            </div>
        </div>
    </section>
    
     <!--SECTION END-->
     
     <!--SECTION END-->
    
    <div class="container">
            <div class="row">
              <div id="careertab">  
                    <ul class="nav nav-tabs">
                        <?php
                        $c=1;
                        $c1=0;
                        foreach($partner_cat as $row){
                            $cls='';
                            if($c1==0){
                                $cls='active'; 
                            }
                            ?>
                        
                        <li class="<?php echo $cls?>">
                         <a  href="#<?php echo $c?>" data-toggle="tab"><?php echo $row->cat_title?></a>
                        </li>
                        <?php
                        $c++;
                        $c1++;
                    }
                    ?>
                    </ul>

                    <div class="tab-content">
                         <?php
                        $c=1;
                        $c1=0;
                        foreach($partner_cat as $row){
                            $partners= $this->home_model->getpartner($row->pcid);
                             $cls='';
                            if($c1==0){
                                $cls='active'; 
                            }
                            ?>
                        <div class="tab-pane <?php echo $cls?>" id="<?php echo $c?>">
                            <bR><bR>
                            <div class="row">
                               <?php
                               foreach($partners as $val){
                                ?>
                               
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                                            <div class="ed-rsear-img">
                                                <img src="<?php echo base_url(); ?>/admin/upload/partnerimage/<?php echo $val->partner_img?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="ed-rsear-dec pull-right">
                                                <h4><?php echo $val->partner_nm?></h4>
                                                <p><?php echo $val->partner_desg?></p>
                                                <a href="#" data-toggle="modal" data-target="#myModal_<?php echo $val->pid?>">more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal_<?php echo $val->pid?>" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-body text-center">
                                          <img src="<?php echo base_url(); ?>/admin/upload/partnerimage/<?php echo $val->partner_img?>" alt="">
                                          <h4><?php echo $val->partner_nm?></h4>
                                          <p><?php echo $val->partner_desg?></p>
                                          <p align="center"><?php echo $val->partner_desc?></p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
  
                                      <?php
                                    }
                                    ?>
                             
                            </div>
                            <br>
                        </div>
                       <?php
                       $c++;
                        $c1++;
                    }
                       ?>
                    </div>
                </div>
            </div>           
        </div>
    </section>
<?php 
 $this->load->view('common/footer');
?>