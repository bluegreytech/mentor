<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stream extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
		$this->load->model('Stream_model');
		}

		function Streamlist()
		{	
			if(!check_admin_authentication()){ 
				redirect(base_url());
			}else{	
				$data['streamData']=$this->Stream_model->getstream();
				$this->load->view('Stream/StreamList',$data);
			}
		}

		public function Streamadd()
		{ 
			if(!check_admin_authentication()){ 
				redirect(base_url());
			}else{
						$data='';
					$data['StreamTypeId']=$this->input->post('StreamTypeId');
					$data['StreamName']=$this->input->post('StreamName');
					$data['IsActive']=$this->input->post('IsActive');
				 	if($_POST){
					if($this->input->post('StreamTypeId')==''){
				
						 $result=$this->Stream_model->insertdata();
						 if($result)
						 {
							$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
							 redirect('Stream/Streamlist');
						 }
					}else{
						$result=$this->Stream_model->updatedata();
						if($result)
						{
						
							$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
							redirect('Stream/Streamlist');
						} 
					
					}
				}
				$this->load->view('Stream/StreamAdd',$data);	
			}		
		}
	
		function Streamedit($StreamTypeId){
			if(!check_admin_authentication()){ 
				redirect(base_url());
			}else{
				$data='';
				$result=$this->Stream_model->getdata($StreamTypeId);	
				$data['StreamTypeId']=$result['StreamTypeId'];
				$data['StreamName']=$result['StreamName'];
				$data['IsActive']=$result['IsActive'];		
				$this->load->view('Stream/StreamAdd',$data);
			}
		}

	
	function getdata($StreamTypeId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$result=$this->Stream_model->getdata($StreamTypeId);	
			$data['StreamTypeId']=$result['StreamTypeId'];
			$data['StreamName']=$result['StreamName'];
			$data['IsActive']=$result['IsActive'];		
			$this->load->view('Stream/StreamEdit',$data);
		}
	}

	function updatedata($StreamTypeId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$result=$this->Stream_model->updatedata($StreamTypeId);	
			if($result=='1'){
			$this->session->set_flashdata('success', 'Record has been updated Succesfully!');
				redirect('Stream/Streamlist');	
				}
				redirect('Stream/Streamlist');
		}

	}
	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("StreamTypeId",$id);
			$res=$this->db->delete('tblstreamtype');
			echo json_encode($res);
			die;
		}
	}
	

}

