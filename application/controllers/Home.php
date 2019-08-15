<?php
//echo "hhhhhh";die;
defined('BASEPATH') OR exit('No direct script access allowed');
//echo APPPATH;die;
//require_once(APPPATH . 'libraries/facebook.php'); 

class Home extends CI_Controller
{
	public function __construct()
	{
      	parent::__construct();
		
    }
	
	public function home() 
	{	
		$this->load->view('common/home');
	}
	public function contact_us()
	{	
		$this->load->view('common/Contactus');
	}
	public function Page()
	{	
		$this->load->view('PrivacyPolicy');
	}
	public function About_us()
	{	
		$this->load->view('common/Aboutus');
	}
	function success(){
		$this->load->view('common/success');
	}
	function career_library(){
		echo "not yet";die;
		$this->load->view('common/career_library');
	}
	function pricing_plan(){
		$this->load->view('common/Packprice');
	}
	function class_2_to_7(){

		$this->load->view('classes/class_2_to_7');
	}
	function class_8(){
		$this->load->view('classes/class_8');
	}
	function class_9_to_10(){
		$this->load->view('classes/class_9_to_10');
	}
	function class_11_to_12(){
		$this->load->view('classes/class_11_to_12');
	}
	function Graduates(){
		$this->load->view('classes/graduates');
	}
	function Professionals(){
		$this->load->view('classes/Professionals');
	}

	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
 }




