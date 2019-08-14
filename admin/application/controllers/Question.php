<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
				$this->load->model('Question_model');
		}

		function Questionlist()
		{		
			$data['questionData']=$this->Question_model->getquestion();
			$this->load->view('Question/QuestionList',$data);
		}

	public function Questionadd()
	{          
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
				$data='';
				$data['QuestionId']=$this->input->post('QuestionId');
				$data['AssesmentTypeId']=$this->input->post('AssesmentTypeId');
				$data['QuestionName']=$this->input->post('QuestionName');
				
				
			
				$data['IsActive']=$this->input->post('IsActive');
				if($_POST){
					if($this->input->post('QuestionId')==''){
								
						$result=$this->Question_model->insertdata();	
						if($result)
						{
							$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
							redirect('Question/Questionlist');
						}
					}
					else
					{
						$result=$this->Question_model->updatedata();
						if($result)
						{
							$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
							redirect('Question/Questionlist');
						} 

					}
			}
			$data['assesmentData']=$this->Question_model->getassesment();
			$this->load->view('Question/QuestionAdd',$data);	
		}			
	}

	
	function Editquestion($QuestionId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$data['assesmentData']=$this->Question_model->getassesment();
			$result=$this->Question_model->getdata($QuestionId);	
			$data['QuestionId']=$result['QuestionId'];
			$data['AssesmentTypeId']=$result['AssesmentTypeId'];	
			$data['QuestionName']=$result['QuestionName'];	
			$data['IsActive']=$result['IsActive'];			
			$this->load->view('Question/QuestionAdd',$data);
		}	
	}

	function updatedata($QuestionId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$result=$this->Question_model->updatedata($QuestionId);	
			if($result=='1'){
			$this->session->set_flashdata('success', 'Record has been updated Succesfully!');
				redirect('Question/Questionlist');	
				}
				redirect('Question/Questionlist');
		}
	}

	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("QuestionId",$id);
			$res=$this->db->delete('tblquestion');
			echo json_encode($res);
		}
	
	}
	

}

