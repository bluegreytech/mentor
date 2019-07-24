<?php
//echo "kjkhj";die;
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{

      	parent::__construct();

		$this->load->model('Login_model'); 
		$this->load->model('stream_model'); 
		
    }
	
	public function index() 
	{	
		$this->load->view('Home/Home');
	}

// 	 public function adduser(){
	  	
// 		$this->load->view('register/register',$data);
// 	 }

	public function Register()
	{
		//echo "hello ";die;
	 	$data =array();
	 	$data['standardlist']=$this->Login_model->getstandard();
	 	$data['streamlist']=$this->stream_model->getstream();
       	// echo "<pre>";print_r($data['streamlist']);die;

		
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
				$this->Login_model->user_insert();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('home/login');

				
			// 	if($this->input->post("UserId")!="")
			// {	
			// 	$this->Login_model->user_update();
			// 	$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
			// 	redirect('home/login');
				
			// }
			// else
			// {  echo "dsfdf";die;
				
			
			// }
				
			}
		$this->load->view('Register/Register',$data);
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
						redirect('Dashboard');
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


	public function getstandard()
	{
		$id=$this->input->post('id');
		$data['standard']=getstandard($id);
		//echo "<pre>";print_r($data['standard']);die;
	    echo json_encode($data['standard']);
	}

	
	public function dashboard()
	{
		if(!check_user_authentication()){			
			redirect(base_url());
		}
	    $this->load->view('Dashboard/Dashboard');

	 }
	

	public function Forgotpassword($msg='')
	{
			$this->form_validation->set_rules('EmailAddress', 'Email', 'required|valid_email');
			if($this->form_validation->run() == FALSE)
			{			
				if(validation_errors())
				{ 
					echo json_encode(array("status"=>"error","msg"=>validation_errors()));
				}
			}
			else
			{ 
				$chk_mail=$this->Login_model->forgotpass_check();
				if($chk_mail==0)
				{
					$error=EMAIL_NOT_FOUND;
					$this->session->set_flashdata('error',EMAIL_NOT_FOUND);  
				}
				elseif($chk_mail==2)
				{
				 	$error=EMAIL_NOT_FOUND;
					$this->session->set_flashdata('error',EMAIL_NOT_FOUND);   
				}elseif($chk_mail==3)
				{
					$error=ACCOUNT_INACTIVE;
					$this->session->set_flashdata('error',ACCOUNT_INACTIVE);	 
				}
				else
				{				
					$forget=FORGET_SUCCESS;
					
					 $this->session->set_flashdata('success','Please check your email for reset the password!');
					redirect('Home/login');
				}
			}
		$this->load->view('common/ForgotPassword');
	}


	// function reset_password($code='')
	// {
	// 	echo "cfcv";die;

	// 	if(check_user_authentication())
	// 	$UserId=$this->Login_model->checkResetCode($code);
	// 	$data = array();
	// 	 if($UserId!='')
	// 	 {
	// 		if($_POST)
	// 		{
	// 			redirect('home/dashbord');
	// 		}
			
	// 		$user_id=$this->Login_model->checkResetCode($code);
	// 		//print_r($admin_id);die;

	// 		$data = array();
	// 		$data['errorfail']=($code=='' || $user_id=='')?'fail':'';
	// 		$data['UserId']=$user_id;
	// 		$data['code']=$code;
	        
 //            if($user_id){
 //            	if($_POST){
				
	// 				if($this->input->post('UserId') != ''){
	// 					$this->form_validation->set_rules('Password', 'Password', 'required');
	// 					$this->form_validation->set_rules('ConfirmPassword', 'Re-type Password', 'required|matches[Password]');
					
	// 					if($this->form_validation->run() == FALSE){			
	// 						if(validation_errors()){
	// 							//echo "<PRE>";print_r(validation_errors());die;
	// 							echo json_encode(array("status"=>"error","msg"=>validation_errors()));
	// 						}
	// 					}else{
							
	// 							$up=$this->Login_model->updatePassword();
	// 							//echo "<pre>";print_r($up);die;
	// 						if($up>0){
	// 							$this->session->set_flashdata('success',RESET_SUCCESS); 
	// 							redirect('home/login');
	// 						}elseif($up=='') {
	// 							// /echo "up";die;
	// 							$error = EXPIRED_RESET_LINK;
	// 					      $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
	// 						}
	// 						else{
	// 							//echo "gfgfdg";die;
	// 							$error = PASS_RESET_FAIL;
	// 		                    $this->session->set_flashdata('error',PASS_RESET_FAIL); die; 
	// 						}
							
	// 					}
	// 				}else{
	// 					//echo "hii";die;
	// 					$error = EXPIRED_RESET_LINK;
	// 					// $redirect=site_url('home/index');
	// 					//$redirect=site_url();
	// 	              $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
	// 				}
	// 			 $this->load->view('common/ResestPassword',$data);
	// 	    }else{
	// 	    	//echo 'dfdfds';die;
	// 	    	$this->load->view('common/ResestPassword',$data);
	// 	    	//die;
	// 	    }

 //            }else{

 //            		  //echo "hii";die;
	// 				$error = EXPIRED_RESET_LINK;
	// 				 $this->session->set_flashdata('error',EXPIRED_RESET_LINK);
	// 				 redirect('home/login');
	// 	    }
	// }



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




