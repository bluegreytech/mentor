<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rate extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
		$this->load->model('Rate_model');
    }
	
	function Ratelist()
	{		
		$data['rateData']=$this->Rate_model->getstandard();
		$this->load->view('Rate/RateList',$data);
	}
	public function  Rateadd()
	{ 
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
				$data='';
				$data['QuestionAnswerRateId']=$this->input->post('QuestionAnswerRateId');
				$data['AnswerRate']=$this->input->post('AnswerRate');
				$data['IsActive']=$this->input->post('IsActive');
			 	if($_POST){
				if($this->input->post('QuestionAnswerRateId')==''){
					 $result=$this->Rate_model->insertdata();
					 if($result)
					 {
					  $this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						 redirect('Rate/Ratelist');
					 }
				}else{
				
					$result=$this->Rate_model->updatedata();
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('Rate/Ratelist');
					} 
				}
			}
			$this->load->view('Rate/RateAdd' ,$data);	
		}	
	}
	
	function Editrate($QuestionAnswerRateId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$result=$this->Rate_model->getdata($QuestionAnswerRateId);	
			$data['QuestionAnswerRateId']=$result['QuestionAnswerRateId'];
			$data['AnswerRate']=$result['AnswerRate'];
			$data['IsActive']=$result['IsActive'];		
			$this->load->view('Rate/RateAdd',$data);
		}
	}
	
	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("QuestionAnswerRateId",$id);
			$res=$this->db->delete('tblquestionanswerrate');
			echo json_encode($res);
			die;
		}
	}
	

}

