<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model'); 
    }
	
	public function index() 
	{	
		$this->load->view('Home/Home');
	}

	 public function adduser(){
	  	//echo "hello ";die;
	 	$data =array();
	 	$data['standardlist']=$this->Login_model->getstandard();
	 	 	
		
			$this->load->library("form_validation");
			$this->form_validation->set_rules('username', 'User Name', 'required');			
			$this->form_validation->set_rules('phone', 'Phone','required');
			$this->form_validation->set_rules('email', 'EmailAddress','required|valid_email');
			$this->form_validation->set_rules('city', 'city', 'required');
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
          
			
			$data['username']=$this->input->post('username');
			$data['password']=$this->input->post('password');
			$data['email']=$this->input->post('email');
		
			
			}
			else
			{
				//echo "hghg";die;

				//$this->Login_model->user_insert();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('home/login');
			// 	if($this->input->post("UserId")!="")
			// {	
			// 	$this->Login_model->admin_update();
			// 	$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
			// 	redirect('home/login');
				
			// }
			// else
			// {  echo "dsfdf";die;
			// 	$this->Login_model->user_insert();
			// 	$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
			// 	redirect('home/login');
			
			// }
				
			}
		$this->load->view('register/register',$data);
	 }

	public function Register()
	{
		$this->load->view('Register/Registeradd');
	}

	public function login()
	{
		if($this->input->post('logins'))
			{   
					$EmailAddress = $this->input->post('EmailAddress');
					$Password = md5($this->input->post('Password'));
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
						redirect('home/dashboard');
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

	
	public function dashboard()
	{
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$this->load->view('Dashboard/Dashboard');

		
	 }
	

	public function Forgotpassword()
	{
		if($_POST){
				if($this->input->post('UserId')==''){		
					$result=$this->Login_model->forgotpass_check();	
					//print_r($result);die;
					if($result=='1')
					{
						$this->session->set_flashdata('success', 'Please check your email address!');
						//redirect('Home/Forgotpassword');
					}
					else
					{
						if($result==2)
						{
							//echo "hgh";die;
							$this->session->set_flashdata('error', 'Your emai address was not found!');
						}
						elseif($result==3)
						{
							$this->session->set_flashdata('warning', 'Please contact to admin!');
						}
						// elseif($result==4)
						// {
						// 	$this->session->set_flashdata('error', 'Could not send email beacuse connectivity is pooar!');
						// }
					
					}
				}
			}	
		$this->load->view('common/Forgotpass');
	}

	function Resetpassword($code='')
	{
		$UserId=$this->Login_model->checkResetCode($code);
		$data = array();
		 if($UserId!='')
		 {
			if($_POST)
			{
				//echo "<pre>";print_r($_POST); die;
				if($this->input->post('UserId') != '')
				{
						$up=$this->Login_model->updatePassword();
						if($up>0)
						{
							$redirect=site_url('Home/Login');
						
						}		
					}
				}
			
		}
		$data['UserId']=$UserId;
		$data['code']=$code;
		$this->load->view('common/Resestpass',$data);
	}

	public function Contact()
	{	
		$this->load->view('Contact/Contactus');
	}
	public function Page()
	{	
		$this->load->view('PrivacyPolicy');
	}
	public function logout()
	{
			$this->session->sess_destroy();
			redirect('home');
	}
}




