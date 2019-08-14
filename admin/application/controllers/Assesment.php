<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assesment extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
				$this->load->model('Assesment_model');
		}

		function Assesmentlist()
		{	
			if(!check_admin_authentication()){ 
				redirect(base_url());
			}else{		
				$data['assesmentData']=$this->Assesment_model->getassesment();
				$this->load->view('Assesment/AssesmentList',$data);
			}
		}

	public function Assesmentadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{    
				$data='';
				$data['AssesmentTypeId']=$this->input->post('AssesmentTypeId');
				$data['StreamTypeId']=$this->input->post('StreamTypeId');
				$data['ProgramId']=$this->input->post('ProgramId');
				$data['AssesmentName']=$this->input->post('AssesmentName');
				$data['IsActive']=$this->input->post('IsActive');
				if($_POST){
					if($this->input->post('AssesmentTypeId')==''){
								
						$result=$this->Assesment_model->insertdata();	
						if($result)
						{
							$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
							redirect('Assesment/Assesmentlist');
						}
					}
					else
					{
						$result=$this->Assesment_model->updatedata();
						if($result)
						{
							$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
							redirect('Assesment/Assesmentlist');
						} 

					}
			}
			$data['streamData']=$this->Assesment_model->getstream();
			$data['programData']=$this->Assesment_model->getpro();
			$this->load->view('Assesment/Assesmentadd',$data);	
		}		
	}

	
	function Editassesment($AssesmentTypeId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$data['streamData']=$this->Assesment_model->getstream();
			$data['programData']=$this->Assesment_model->getpro();
			$result=$this->Assesment_model->getdata($AssesmentTypeId);	
			$data['AssesmentTypeId']=$result['AssesmentTypeId'];
			$data['StreamTypeId']=$result['StreamTypeId'];	
			$data['ProgramId']=$result['ProgramId'];	
			$data['AssesmentName']=$result['AssesmentName'];
			$data['IsActive']=$result['IsActive'];			
			$this->load->view('Assesment/AssesmentAdd',$data);	
		}
	}

	function updatedata($AssesmentTypeId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->Assesment_model->updatedata($AssesmentTypeId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('Assesment/Assesmentlist');	
			}
			redirect('Assesment/Assesmentlist');
		}
	}

	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("AssesmentTypeId",$id);
			$res=$this->db->delete('tblassesmenttype');
			echo json_encode($res);
			die;
		}
	}
	

}

