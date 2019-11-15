<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header');

$story_title=(isset($sucess_det[0]->story_title)!='')?$sucess_det[0]->story_title:"";
$story_desc=(isset($sucess_det[0]->story_desc)!='')?$sucess_det[0]->story_desc:"";
$story_long_desc=(isset($sucess_det[0]->story_long_desc)!='')?$sucess_det[0]->story_long_desc:"";
$problem_desc=(isset($sucess_det[0]->problem_desc)!='')?$sucess_det[0]->problem_desc:"";
$solution_desc=(isset($sucess_det[0]->solution_desc)!='')?$sucess_det[0]->solution_desc:"";
$outcome_desc=(isset($sucess_det[0]->outcome_desc)!='')?$sucess_det[0]->outcome_desc:"";
$story_img=(isset($sucess_det[0]->story_img)!='')?$sucess_det[0]->story_img:"";
?>
  <!--SECTION START-->
    <section style="background:#f6f6f6;">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2><span> <?php echo $story_title ?></span></h2>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <!--First stories-->
                        <div class="row">
                          <div class="col-md-3"></div>
                            <div class="col-md-6">
                              <img src="<?php echo base_url()?>admin/upload/storyimage/<?php echo $story_img?>" class="img-responsive">
                            </div>
                          <div class="col-md-3"></div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <h4>Background</h4>
                                   <?php echo $story_long_desc ?>
                      
                                <div id="careertab" class="abouttab">  
                                    <ul class="nav nav-tabs">
                                      <li class="active">
                                       <a href="#Question1" data-toggle="tab">IDENTIFYING PROBLEM</a>
                                      </li>
                                      <li><a href="#Question2" data-toggle="tab">SOLUTION</a>
                                      </li>
                                      <li><a href="#Question3" data-toggle="tab">OUTCOME</a>
                                      </li>
                                    </ul>
        
                                    <div class="tab-content ">
                                      <div class="tab-pane active" id="Question1">
                                          <br>
                                          <div class="row">
                                                <div class="col-md-12">
                                                  <p><?php echo $problem_desc ?></p>
                                                </div>
                                             <br>
                                          </div>
                                      </div>
                                      <div class="tab-pane" id="Question2">
                                          <br>
                                          <div class="row">
                                              <div class="col-md-12">
                                                <p><?php echo $solution_desc ?></p>
                                              </div>
                                              <br>
                                          </div>
                                      </div>
                                      <div class="tab-pane" id="Question3">
                                          <br>
                                          <div class="row">
                                              <div class="col-md-12">
                                                <p><?php echo $outcome_desc ?></p>
                                              </div>
                                          </div>
                                          <br>
                                      </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->
</div>
<?php 
 $this->load->view('common/footer');
?>