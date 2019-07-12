<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model');
      
    }
	 public function index(){
		$this->load->view('Home/Home');
	 }

	 public function Register(){
		$this->load->view('Register/Registeradd');
	 }
	public function login()
	{
		if($this->input->post('logins'))
			{   
					$EmailAddress = $this->input->post('EmailAddress');
					$Password = $this->input->post('Password');
					$IsActive = 1;
					$where = array(
					"EmailAddress"=>$EmailAddress,
					"Password"=>$Password,
					"IsActive"=>$IsActive
					);
					$log = $this->Login_model->login_where('tbluser',$where);           
					$cnt = count($log);
					if($cnt>0)
					{
						$session= array(
								'EmailAddress'=> $log->EmailAddress,
								'UserId'=> $log->UserId,
								'FirstName'=> $log->FirstName,
								'LastName'=> $log->LastName,
								'RoleId'=> $log->RoleId,
							);
							
						$this->session->set_userdata($session);
						$this->session->set_flashdata('success','User Login successfully');
						redirect('Welcome2');
					}
					else
					{
						$this->session->set_userdata($session);
						$this->session->set_flashdata('error', 'Invalid Username Or Password');
						redirect('home/login');	
					} 
				}

		$this->load->view('common/login');
	}
	public function Page()
	{
		
		$this->load->view('PrivacyPolicy');

	}
	public function logout()
	{
		
			$this->session->sess_destroy();
			redirect('home/login');
	

	}
}




