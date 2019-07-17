<?php
//echo "jkhjkjh";die;
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Dashboard_model');
      
	}

	
	public function index()
	{				
		$this->load->view('Dashboard/Dashboard');
	}



	public function Profile($UserId){
		if(!check_user_authentication()){ 
			redirect(base_url());
		}
		$data=array();
		$result=$this->Dashboard_model->getdata($UserId);
		$data['subject']=$this->Dashboard_model->getsubject($UserId);
		//print_r($result);die;	
			$data['UserId']=$result['UserId'];
			$data['FirstName']=$result['FirstName'];
			$data['LastName']=$result['LastName'];	
			$data['EmailAddress']=$result['EmailAddress'];
			$data['DateofBirth']= $result['DateofBirth'];		
			$data['PhoneNumber']=$result['PhoneNumber'];
			$data['Gender']= $result['Gender'];
			$data['EducationId']= $result['EducationId'];
			$data['EducationName']= $result['EducationName'];
			$data['UnivesityName']= $result['UnivesityName'];	
			$data['BoardName']= $result['BoardName'];	
			$data['ClassStream']= $result['ClassStream'];	
			$data['Course']= $result['Course'];
			$data['YearofGraduation']= $result['YearofGraduation'];	
			
			$data['UserFamilyId']= $result['UserFamilyId'];	
			$data['FatherName']= $result['FatherName'];	
			$data['FatherProfession']= $result['FatherProfession'];	
			$data['MotherName']= $result['MotherName'];	
			$data['MotherProfession']= $result['MotherProfession'];
			$data['StreamTypeId']= $result['StreamTypeId'];
			$data['StreamStatus']= $result['StreamStatus'];	
			$data['GraduateScoreId']= $result['GraduateScoreId'];	
			$data['ClassX']= $result['ClassX'];	
			$data['ClassXII']= $result['ClassXII'];
			$data['College']= $result['College'];	
			$data['EducationSubjectId']= $result['EducationSubjectId'];
			//echo "<pre>";print_r($data);die;
		$this->load->view('Dashboard/Profileview',$data);	
	
}




	function list()
	{			
			$data['adminData']=$this->Dashboard_model->getuser();
			$this->load->view('Dashboard/Profilelist',$data);
	}

	public function Useradd()
	{      
				$data=array();
				$data['UserId']=$this->input->post('UserId');
				$data['FirstName']=$this->input->post('FirstName');
				$data['LastName']=$this->input->post('LastName');
				$data['EmailAddress']=$this->input->post('EmailAddress');
				$data['DateofBirth']=$this->input->post('DateofBirth');
				$data['PhoneNumber']=$this->input->post('PhoneNumber');
				$data['Gender']=$this->input->post('Gender');
				$data['DateofBirth']=$this->input->post('DateofBirth');
				$data['PhoneNumber']=$this->input->post('PhoneNumber');
				$data['Gender']=$this->input->post('Gender');
				
				if($_POST){
					if($this->input->post('UserId')!=''){
						$result=$this->Dashboard_model->updatedata();
						if($result)
						{   $UserId =$data['UserId'];
							  
							$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
							redirect('Dashboard/Profile/'.$UserId);
						}
					}
					else
					{
						
						
							$this->session->set_flashdata('error', 'Record was not update Succesfully!');
							redirect('Dashboard/Profileedit');
					

					}
			}
			$this->load->view('Dashboard/Editprofile',$data);
				
	}
	
	function Profileedit($UserId){
			$data=array();
			$result=$this->Dashboard_model->getdata($UserId);
			//echo "<pre>";print_r($result);die;	
			$data['subject']=$this->Dashboard_model->getsubject($UserId);

			//echo "<pre>";print_r($data['subject']);die;
			$data['UserId']=$result['UserId'];
			$data['FirstName']=$result['FirstName'];
			$data['LastName']=$result['LastName'];	
			$data['EmailAddress']=$result['EmailAddress'];
			$data['DateofBirth']= $result['DateofBirth'];		
			$data['PhoneNumber']=$result['PhoneNumber'];
			$data['Gender']= $result['Gender'];	
			$data['EducationId']= $result['EducationId'];
			$data['EducationName']= $result['EducationName'];
			$data['UnivesityName']= $result['UnivesityName'];	
			$data['BoardName']= $result['BoardName'];	
			$data['ClassStream']= $result['ClassStream'];	
			$data['Course']= $result['Course'];
			$data['YearofGraduation']= $result['YearofGraduation'];	
			$data['UserFamilyId']= $result['UserFamilyId'];	
			$data['FatherName']= $result['FatherName'];	
			$data['FatherProfession']= $result['FatherProfession'];	
			$data['MotherName']= $result['MotherName'];	
			$data['MotherProfession']= $result['MotherProfession'];
			$data['StreamTypeId']= $result['StreamTypeId'];	
			$data['StreamStatus']= $result['StreamStatus'];
			$data['GraduateScoreId']= $result['GraduateScoreId'];	
			$data['ClassX']= $result['ClassX'];	
			$data['ClassXII']= $result['ClassXII'];
			$data['College']= $result['College'];
			$data['EducationSubjectId']= $result['EducationSubjectId'];
				
			//echo "<pre>";print_r($data);die;
			$this->load->view('Dashboard/Editprofile',$data);	
		
	}


	function updatedata($UserId){
		
		$result=$this->Dashboard_model->updatedata($UserId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('User/Userlist');	
			}
			redirect('User/Userlist');
		}
	

	
	
}




