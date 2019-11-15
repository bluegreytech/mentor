<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_second');

$this->load->view('common/sidebar_second');
?>
      
<section id="main-content" class="my-profile-page">
   <section class="wrapper">
   <?php if(($this->session->flashdata('error'))){ ?>
                     <div class="alert alert-danger" id="errorMessage">
                     <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
                     </div>
               <?php } ?>
                   <?php if(($this->session->flashdata('success'))){ ?>
                     <div class="alert alert-success" id="successMessage">
                     <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
                     </div>
               <?php } ?>
      <div class="c_title">
         <h2>My Test</h2>
         <div class="clearfix"></div>
      </div>
      <div class="c_panel panel-blank">
            <div id="exTab1">              
              <div class="col-md-12 nopadd">
               <div class="tab-content clearfix">
                <p>Elemantary Career Profiler consists of Learnig style, Multiple intelligence and Abilities Questions. </p>
                <h4>Instructions:</h4>
                <p>Your assessment takes approximately 20 minutes. Choose the answers you identify with most. Go with your first instinct rather than thinking too hard. This is a self-discovery tool, so there are no wrong answers.</p>
                <p>( 1 ) THIS IS NOT A TEST! There are no right or wrong answers to the questions.</p>
                The goal is for you to learn more about your personal work-related interests.
                <p>( 2 ) THERE IS NO TIME LIMIT for Multiple intelligence and Learning style for completing the questions. Take your time.</p>
                <p>( 3 ) Make your choice carefully and then move to the next page; you cannot return to the previous screen to change your answer.</p>
                <div class="row text-center">   
                  <a href="http://assessment.togethermentor.com/access-login-api1.php?category=&channel_id=647&cd='.<?php echo urlencode($userdata->choicecareerassess).'&age=647&access_code='.urlencode($userdata->access_code).'&name='.trim($userdata->username).'&location='.$userdata->location.'&person_age='.$userdata->age.'&amp;current_stage='.$userdata->current_stage?>"  class="btn btn-lg btn-success" target="_blank">Start Test</a>                
                </div>
                  </div>
                </div>
            </div>
         </div>
      </div>
   </section>
</section>
</section>

<?php 
 $this->load->view('common/footer_second');
?>

<!-- <script>
$(function() { 
    setTimeout(function() {
  $('#errorMessage').fadeOut('fast');
}, 3000);
   
});
$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 3000);
   
});

</script> -->
<script>
              					               
</script>