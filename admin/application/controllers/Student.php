<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('student_model');
      
    }
	function studentlist()
	{	
	
		if(!check_admin_authentication()){ 
			
			redirect(base_url());
		}else{	
		
			$data['result']=$this->student_model->getstudent();
			$this->load->view('student/studentlist',$data);
		}
	}

	 public function edit_student($user_id)
    {  //echo "fdsf";die;
            
		if(!check_admin_authentication())
		{
		redirect('login');
		}
                
		$data = array();
		//echo "<pre>";print_r($_POST);die;
        $this->load->library('form_validation');
	
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');		
		
		if($this->form_validation->run() == FALSE){	
		
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data);die;
			}else{
				$data["error"] = "";
			}
			if($_POST){			
				$data["PageTitle"] = $this->input->post('PageTitle');
				$data["PageDescription"]   = $this->input->post('PageDescription');
				
              
			
			}else{
				//echo $user_id;
			$result=$this->student_model->getdata($user_id);	
			//echo "<pre>";print_r($result);die;
		    $data["user_id"] 	= $result["user_id"]; 
			$data["username"] 	= $result["username"];
			$data["email"] 		= $result["email"];				
			$data["phone"]      = $result["phone"];			
           	$data['age']=$result["age"];
           	$data['location']=$result["location"];
			$data['assessment']=$result["assessment"];
			$data['status']=$result["status"];
			$data['profile_image']=$result["profile_image"];
			

			}
		}else{
		
         	   $this->session->set_flashdata('successmsg', 'Student record has been updated successfully');				
			$res=$this->student_model->updateStudent();
			redirect('student/studentlist/');
		}
		$data['redirect_page']="studentlist";
        $this->load->view('student/studentadd',$data);    
            
    }

    
	

	
}
