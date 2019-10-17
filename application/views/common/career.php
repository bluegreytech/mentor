<?php

$this->load->view('common/header');
?>
 <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor">
                    <div class="ed-about-tit">
                        <div class="con-title">
                          <h2>Career <span>Library</span></h2>
                        </div>
                    </div>
                    <div class="pg-contact career-library">
                    	<?php
                    	if(!empty($career)){
                    		foreach($career as $val){
                    			?>
                    		
                        <div class="col-md-4 text-center">
                            <div class="career-post">
                                <div class="post-media">
                                   <iframe width="100%" height="250" src="<?php echo $val->video_url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                </div>
                            </div>
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