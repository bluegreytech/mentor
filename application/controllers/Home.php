<?php
//echo "hhhhhh";die;
defined('BASEPATH') OR exit('No direct script access allowed');
//echo APPPATH;die;
require_once(APPPATH . 'libraries/facebook.php'); 
class Home extends CI_Controller
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model'); 
		$this->load->model('Stream_model'); 	
    }
	
	public function index() 
	{	
		$this->load->view('Home/Home');
	}
	

	public function Register()
	{
	 	$data =array();
	 	$data['standardlist']=$this->Login_model->getstandard();
	 	$data['streamlist']=$this->Stream_model->getstream();

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
				redirect('Home/login');
	
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
						redirect('Home/login');	
					} 
				}

		$this->load->view('common/login');
	}


	public function Fblogin()
	{
		if($_POST)
			{   		
			 	$result = $this->Login_model->getfblogin();     
				if($result!='0')
				{
					$cnt = count($result);	   
					if($cnt>0)
					{
						$datasession= array(
								'EmailAddress'=> $result->EmailAddress,
								'UserId'=> $result->UserId,
								'FirstName'=> $result->FirstName,
								'LastName'=> $result->LastName,
								'RoleId'=> $result->RoleId,
							);		
							$st=$this->session->set_userdata($datasession);						
							$this->session->set_flashdata('success','User Login successfully');
					 		redirect('index.php/Program/Programlist');
					
					}
					else
					{
							
						$this->session->set_userdata($session);
						$this->session->set_flashdata('error', 'Invalid Username Or Password');
						redirect('index.php/Login');	
					} 
				
                    
				  }else{
					  
						$result=$this->Login_model->insertdata();
						if($result){

							redirect('index.php/Program/Programlist');
						}
				  }
					 
		    }
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
				//echo "<pre>";print_r($chk_mail); die;
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
				//echo "hjhgjh";die;			
					$forget=FORGET_SUCCESS;
					$this->session->set_flashdata('success','Please check your email for reset the password!');
					redirect('Home/login');
				}
			}
			$this->load->view('common/ForgotPassword');
	}

	function reset_password($code='')
	{

			$user_id=$this->Login_model->checkResetCode($code);
			$data = array();
			$data['errorfail']=($code=='' || $user_id=='')?'fail':'';
			$data['UserId']=$user_id;
			$data['code']=$code;
	        
            if($user_id){
            	if($_POST){
                // echo "<pre>";print_r($_POST);die;
				//echo "hjkj";die;
				if($this->input->post('UserId') != ''){
					$this->form_validation->set_rules('Password', 'Password', 'required');
					$this->form_validation->set_rules('ConfirmPassword', 'Re-type Password', 'required|matches[Password]');
				
					if($this->form_validation->run() == FALSE){			
						if(validation_errors()){
							echo json_encode(array("status"=>"error","msg"=>validation_errors()));
						}
					}else{
							$up=$this->Login_model->updatePassword();
							// echo "<pre>";print_r($up);die;
						if($up>0){
							$this->session->set_flashdata('success',RESET_SUCCESS); 
							redirect('home/login');
						}elseif($up=='') {
							
							$error = EXPIRED_RESET_LINK;
					      $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
						}
						else{
							
							$error = PASS_RESET_FAIL;
		                    $this->session->set_flashdata('error',PASS_RESET_FAIL); die; 
						}	
					}
				}else{
					$error = EXPIRED_RESET_LINK;	
	              $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
				}
				echo "jhjh";die;
				 $this->load->view('common/ResestPassword',$data);
		    }else{
		    	//echo "<pre>";print_r($data);die;
		    	$this->load->view('common/ResestPassword',$data);
		    }

            }else{
					$error = EXPIRED_RESET_LINK;
					 $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
					 redirect();
		    }
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
		$this->load->view('Successstory/Successstories');
	}
	function career_library(){
		echo "not yet";die;
		$this->load->view('common/career_library');
	}
	function pricing_plan(){
		$this->load->view('common/Packprice');
	}
	function class_two_to_seven(){

		$this->load->view('classes/class_2_to_7');
	}
	function class_eight(){
		$this->load->view('classes/class_8');
	}
	function class_nine_to_ten(){
		$this->load->view('classes/class_9_to_10');
	}
	function class_eleven_to_tweleve(){
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




