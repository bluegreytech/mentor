<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Standard extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
		$this->load->model('Standard_model');
		$this->load->model('Stream_model');
    }
	
	function Standardlist()
	{		
		$data['standardData']=$this->Standard_model->getstandard();
		$this->load->view('Standard/StandardList',$data);
	}

	function RegisterAdd()
	{		
		
		$this->load->view('Standard/Register');
	}
	public function  AddStandard()
	{ 
			$data=array();
			$data['streamData']=$this->Stream_model->getstream();
			//echo  "<pre>";print_r($data['streamData']);die;
			$data['StreamId']=$this->input->post('streamid');
			$data['StandardId']=$this->input->post('StandardId');
			$data['Standard']=$this->input->post('Standard');
			$data['IsActive']=$this->input->post('IsActive');
			 if($_POST){
				if($this->input->post('StandardId')==''){
					 $result=$this->Standard_model->insertdata();
					 if($result)
					 {
					  $this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						 redirect('Standard/Standardlist');
					 }die;
				}else{
					//echo "else";die;
					$result=$this->Standard_model->updatedata();
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('Standard/Standardlist');
					} 
					//die;
				
				}
			
		
		}
		$this->load->view('Standard/StandardAdd' ,$data);	
				
	}
	
	function Editstandard($StandardId){
		$data=array();
		$result=$this->Standard_model->getdata($StandardId);	
		$data['streamData']=$this->Stream_model->getstream();
		$data['StreamId']=$result['streamid'];
		$data['StandardId']=$result['StandardId'];
		$data['Standard']=$result['Standard'];
		$data['IsActive']=$result['IsActive'];		
    $this->load->view('Standard/StandardAdd',$data);
	}
	
	function deletedata(){
		$id=$this->input->post('id');
		$this->db->where("StandardId",$id);
		$res=$this->db->delete('tblstandard');
		
		echo json_encode($res);
		die;
	}
	

}

