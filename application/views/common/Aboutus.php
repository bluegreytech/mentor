<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');
$about_desc=(isset($about[0]->about_desc)!='')?$about[0]->about_desc:"";
//echo $about_desc;
?>



   <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>About <span> Us</span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <div class="col-md-12 text-justify">
                            <p><?php echo $about_desc?></p>
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
                        <li class="active">
                         <a  href="#1" data-toggle="tab">Team MENTOR</a>
                        </li>
                        <li><a href="#2" data-toggle="tab">Career Ambassador</a>
                        </li>
                        <li><a href="#3" data-toggle="tab">Career Counsellors</a>
                        </li>
                        <li><a href="#5" data-toggle="tab">Employability Experts</a>
                        </li>
                        <li><a href="#5" data-toggle="tab">Academic Experts</a>
                        </li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                        <div class="ed-rsear-img">
                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ed-rsear-dec pull-right">
                          <h4>Abc1</h4>
                          <p>Founder</p>
                          <a href="#" data-toggle="modal" data-target="#myModal">more</a>
                        </div>
                    </div>
                  </div>
                                </div>
                                <!-- Modal -->
                                  <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-body text-center">
                                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                                          <h4>Abc1</h4>
                        <p>Founder</p>
                                          <p align="center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
  
  
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                        <div class="ed-rsear-img">
                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ed-rsear-dec pull-right">
                          <h4>Abc1</h4>
                          <p>Founder</p>
                          <a href="#">more</a>
                        </div>
                    </div>
                  </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane" id="2">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                        <div class="ed-rsear-img">
                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ed-rsear-dec pull-right">
                          <h4>Abc2</h4>
                          <p>Founder</p>
                          <a href="#">more</a>
                        </div>
                    </div>
                  </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane" id="3">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                        <div class="ed-rsear-img">
                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ed-rsear-dec pull-right">
                          <h4>Abc3</h4>
                          <p>Founder</p>
                          <a href="#">more</a>
                        </div>
                    </div>
                  </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane" id="4">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                        <div class="ed-rsear-img">
                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ed-rsear-dec pull-right">
                          <h4>Abc4</h4>
                          <p>Founder</p>
                          <a href="#">more</a>
                        </div>
                    </div>
                  </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="tab-pane" id="5">
                            <bR><bR>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ed-rese-grid">
                                        <div class="col-md-4">
                        <div class="ed-rsear-img">
                          <img src="<?php echo base_url(); ?>default/images/a6.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ed-rsear-dec pull-right">
                          <h4>Abc5</h4>
                          <p>Founder</p>
                          <a href="#">more</a>
                        </div>
                    </div>
                  </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
 

<?php 
 $this->load->view('common/footer');
?>