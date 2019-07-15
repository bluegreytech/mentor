<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		//$this->load->model('Login_model');
      
	}
	
	 
	 public function Profile(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else
		{
			$this->load->view('Dashboard/Profileview');
		}
		
	 }

	 public function Profileedit(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else
		{
			$this->load->view('Dashboard/Editprofile');
		}
		
	 }

	
}




