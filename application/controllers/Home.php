<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
      	parent::__construct();
      	$this->load->model('home_model');
		
    }

    function index(){
    	$this->load->view('common/Home');
    }

    function register(){
    	//echo "hghgf"; die;
    	$data =array();
	
	 		

		$this->load->library("form_validation");
		$this->form_validation->set_rules('username', 'User Name', 'required');			
		$this->form_validation->set_rules('assessment', 'Assessment','required');
		$this->form_validation->set_rules('email', 'EmailAddress','required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
			
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
			//	echo "else bhi ";die; 
				$this->home_model->user_insert();
					
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('home');
	
			}
		
		$this->load->view('common/Home');
    }

    function login(){
    	$this->load->library("form_validation");
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$data['email']=$this->input->post('email');
		$data['password']=$this->input->post('password');

		 if($this->form_validation->run() == FALSE){
			if(validation_errors())
			{
				echo json_encode(array("status"=>"error","msg"=>validation_errors()));
			}
			
		}else
		{
               
            $login =$this->home_model->check_login();
		 	//echo $login;die;
		if($login == '1')
		{
			
            $redirect=site_url('home/dashboard');
            echo json_encode(array("status"=>"success","redirect"=> $redirect));
             
		}
		elseif($login == '2')
		{
                   
            // $redirect=site_url('home/dashboard');
            redirect('home/dashboard');
			
		}
        elseif($login == '3')
		{
             echo json_encode(array("status"=>"error","msg"=> "Your account is Inactive. Please contact Administrator!"));
		}
		else{
            echo json_encode(array("status"=>"error","msg"=> "Enter valid email and password."));           
		}
        }


    }
    public function dashboard()
	{
		//echo "hjh";die;
		if(!check_user_authentication()){			
			redirect(base_url());
		}
	    $this->load->view('Dashboard/Dashboard');

	 }
	function profile($msg=''){
	 	if(!check_user_authentication())
		{
		redirect('login');
		}
                
		$data = array();
		//echo "<pre>";print_r($_POST);die;
        $this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_adminmail_check');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('AdminContact', 'Contact', 'required');
		
		
		if($this->form_validation->run() == FALSE){	
		
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data);die;
			}else{
				$data["error"] = "";
			}
			if($_POST){			
				$data["email"] = $this->input->post('email');
				$data["username"]   = $this->input->post('username');			
				$data["email"]        = $this->input->post('email');
				
                //$data['pre_profile_image']=$this->input->post('pre_profile_image');
			
			}else{
			$oneAdmin=get_one_user(get_authenticateadminID());
			//print_r($oneAdmin);die;
			$data["user_id"] 	= $oneAdmin->email;
			$data["email"] 	= $oneAdmin->email;
			$data["username"] = $oneAdmin->username;
           	$data['status']=$oneAdmin->status;
			
			}
		}else{
			//echo "else fdf";die;
            $this->session->set_flashdata('successmsg', 'Profile has been updated successfully');				
			$res=$this->Login_model->updateProfile();
			redirect('home/profile');
		}
		$data['msg'] = $msg; //login success message
		$offset = 0;
		 $limit =10;

        $this->load->view('dashboard/Editprofile',$data);  


	}

	public function Forgotpassword($msg='')
	{
		//echo "hjghjh";die;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					echo "<pre>";print_r(validation_errors());die;
					echo json_encode(array("status"=>"error","msg"=>validation_errors()));
				}
			}
			else
			{ 
			//echo "jhjg";die;
				$chk_mail=$this->home_model->forgot_email();
				echo $chk_mail;die;
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
					//email_send();
					 $this->session->set_flashdata('success','Please check your email for reset the password!');
					redirect('login');

	                // $redirect=site_url('home/index/forget');
	                // echo json_encode(array("status"=>"success","msg"=> $forget,"redirect"=>$redirect));
				}
			}
		$this->load->view('common/ForgotPassword');
	}


	function reset_password($code='')
	{

		if(check_admin_authentication())
			{
				redirect('home/dashbord');
			}
			
			$admin_id=$this->Login_model->checkResetCode($code);
			//print_r($admin_id);die;

			$data = array();
			$data['errorfail']=($code=='' || $admin_id=='')?'fail':'';
			$data['AdminId']=$admin_id;
			$data['code']=$code;
	        
            if($admin_id){
            	if($_POST){
				
				if($this->input->post('AdminId') != ''){
					$this->form_validation->set_rules('Password', 'Password', 'required');
					$this->form_validation->set_rules('Confrim_password', 'Re-type Password', 'required|matches[Password]');
				
					if($this->form_validation->run() == FALSE){			
						if(validation_errors()){
							echo json_encode(array("status"=>"error","msg"=>validation_errors()));
						}
					}else{
						
							$up=$this->Login_model->updatePassword();
						if($up>0){
							$this->session->set_flashdata('success',RESET_SUCCESS); 
							redirect('login');
						}elseif($up=='') {
							
							$error = EXPIRED_RESET_LINK;
					      $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
						}
						else{
							//echo "gfgfdg";die;
							$error = PASS_RESET_FAIL;
		                    $this->session->set_flashdata('error',PASS_RESET_FAIL); die; 
						}

					
						
					}
				}else{
					//echo "hii";die;
					$error = EXPIRED_RESET_LINK;
					// $redirect=site_url('home/index');
					//$redirect=site_url();
	              $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
				}
				 $this->load->view('common/ResestPassword',$data);
		    }else{
		    	//echo 'dfdfds';die;
		    	$this->load->view('common/ResestPassword',$data);
		    }

            }else{

            	  //echo "hii";die;
					$error = EXPIRED_RESET_LINK;
					 $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
					 redirect('home');
		    }
	}




	function change_password(){

	 	if(!check_user_authentication()){
			redirect();
		}
		
            
		$data = array();
        $this->load->library('form_validation');	
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Password Confirm', 'required|min_length[8]');	
	
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($_POST){
				
				$data["password"] = $this->input->post('password');
                $data["cpassword"] = $this->input->post('cpassword');
			}else{
				$data["password"] = '';
                $data["cpassword"] = '';
			}
			
		}else{
			//echo "fghg";die;
            $res=$this->Login_model->updateAdminPassword();
			if($res){
         		$this->session->set_flashdata('success', 'Your password change successfully');
				redirect('home/change_password');
			}
		}
	 	$this->load->view('common/Changepass',$data);  
	}

	function oldpassword_check() {
			$query = $this->db->query("select Password from " . $this->db->dbprefix('tblusers') . " where Password = '".md5($this->input->post('password'))."' and user_id!='" . $this->session->userdata('user_id') . "'");
			//echo $this->db->last_query();die;
			if ($query->num_rows() > 0) {
			echo 1;die;
			} else {
			echo 0;die;
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




