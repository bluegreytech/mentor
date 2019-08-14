<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Questionanswer extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
				$this->load->model('Questionanswer_model');
		}

		function Questionanswerlist()
		{	
			if(!check_admin_authentication()){ 
				redirect(base_url());
			}else{	
				$data['questionanswerData']=$this->Questionanswer_model->getquestionanswer();
				$this->load->view('Questionanswer/QuestionanswerList',$data);
			}
		}

	public function Questionansweradd()
	{          
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$data['QuestionAnswerId']=$this->input->post('QuestionAnswerId');
			$data['QuestionId']=$this->input->post('QuestionId');
			$data['QuestionAnswer']=$this->input->post('QuestionAnswer');
			$data['QuestionAnswerRateId']=$this->input->post('QuestionAnswerRateId');
			$data['IsActive']=$this->input->post('IsActive');
			 if($_POST){
				if($this->input->post('QuestionAnswerId')==''){
							
					$result=$this->Questionanswer_model->insertdata();	
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						redirect('Questionanswer/Questionanswerlist');
					}
				}
				else
				{
					$result=$this->Questionanswer_model->updatedata();
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('Questionanswer/Questionanswerlist');
					} 

				}
			}
			$data['questionrateData']=$this->Questionanswer_model->getquestionrate();
			$data['questionData']=$this->Questionanswer_model->getquestion();
			$this->load->view('Questionanswer/QuestionanswerAdd',$data);	
		}		
	}

	
	function Editquestionanswer($QuestionAnswerId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$data['questionrateData']=$this->Questionanswer_model->getquestionrate();
			$data['questionData']=$this->Questionanswer_model->getquestion();
			$result=$this->Questionanswer_model->getdata($QuestionAnswerId);	
			$data['QuestionAnswerId']=$result['QuestionAnswerId'];
			$data['QuestionId']=$result['QuestionId'];	
			$data['QuestionAnswer']=$result['QuestionAnswer'];
			$data['QuestionAnswerRateId']=$result['QuestionAnswerRateId'];	
			$data['IsActive']=$result['IsActive'];			
			$this->load->view('Questionanswer/QuestionanswerAdd',$data);
		}	
	}

	function updatedata($QuestionAnswerId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
			}else{
			$result=$this->Questionanswer_model->updatedata($QuestionAnswerId);	
			if($result=='1'){
			$this->session->set_flashdata('success', 'Record has been updated Succesfully!');
				redirect('Questionanswer/Questionanswerlist');	
				}
				redirect('Questionanswer/Questionanswerlist');
			}
	}

	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("QuestionAnswerId",$id);
			$res=$this->db->delete('tblquestion');
			echo json_encode($res);
		}
	}
	

}

