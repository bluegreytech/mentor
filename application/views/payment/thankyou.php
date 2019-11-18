<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$this->load->view('common/header_second');

$this->load->view('common/css');
?>

	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Your Submision has been recevied.</p>
		<a href="<?php echo base_url();?>" class="btn btn-success">Back to home </a>
	</div>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright ©<?php echo date('Y'); ?> | All Rights Reserved</p>
	</footer>


<?php 
    $this->load->view('common/footer_second');
?>