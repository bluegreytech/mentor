<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class QImage extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
				$this->load->model('QImage_model');
		}

		function QImagelist()
		{		
			$data['assesmentData']=$this->QImage_model->getassesment();
			$this->load->view('QImage/QImageList',$data);
		}

	public function QImageadd()
	{          
			$data='';
		//	$data['QuestionImageId']=$this->input->post('QuestionImageId');
			$data['AssesmentTypeId']=$this->input->post('AssesmentTypeId');
			$data['QuestionImageType']=$this->input->post('QuestionImageType');
			$data['QuestionImageName']=$this->input->post('QuestionImageName');
			$data['IsActive']=$this->input->post('IsActive');
			 if($_POST){
				if($this->input->post('QuestionImageId')==''){
							
					$result=$this->QImage_model->insertdata();	
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						redirect('QImage/QImagelist');
					}
				}
				else
				{
					$result=$this->QImage_model->updatedata();
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('QImageQImagelist');
					} 

				}
		}
		$data['streamData']=$this->QImage_model->getstream();
		$data['programData']=$this->QImage_model->getpro();
		$this->load->view('QImage/QImageadd',$data);	
				
	}

	
	function Editassesment($QuestionImageId){
		$data='';
		$data['streamData']=$this->QImage_model->getstream();
		$data['programData']=$this->QImage_model->getpro();
		$result=$this->QImage_model->getdata($QuestionImageId);	
		$data['QuestionImageId']=$result['QuestionImageId'];
		$data['AssesmentTypeId']=$result['AssesmentTypeId'];	
		$data['QuestionImageType']=$result['QuestionImageType'];	
		$data['QuestionImageName']=$result['QuestionImageName'];
		$data['IsActive']=$result['IsActive'];			
		$this->load->view('QImage/QImageAdd',$data);	
	}

	function updatedata($QuestionImageId){
		$result=$this->QImage_model->updatedata($QuestionImageId);	
    if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('QImage/QImagelist');	
			}
			redirect('QImage/QImagelist');
	}

	function deletedata(){
		$id=$this->input->post('id');
		$this->db->where("QuestionImageId",$id);
		$res=$this->db->delete('tblquestionpicture');
		echo json_encode($res);
		die;
	}
	

}

