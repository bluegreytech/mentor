<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Userrole extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
		$this->load->model('Userrole_model');
    }
	
	function Userrolelist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['userroleData']=$this->Userrole_model->getuserrole();
			$this->load->view('Userrole/UserroleList',$data);
		}
	}
	public function Userroleadd()
	{ 
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
				$data='';
				$data['RoleId']=$this->input->post('RoleId');
				$data['RoleName']=$this->input->post('RoleName');
				$data['IsActive']=$this->input->post('IsActive');
			 	if($_POST){
				if($this->input->post('RoleId')==''){
			
					 $result=$this->Userrole_model->insertdata();
					 if($result)
					 {
						$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						 redirect('Userrole/Userrolelist');
					 }
				}else{
					$result=$this->Userrole_model->updatedata();
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('Userrole/Userrolelist');
					} 
				
				}
			}
			$this->load->view('Userrole/UserroleAdd',$data);	
		}	
	}

	
	function Userroleedit($RoleId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data='';
			$result=$this->Userrole_model->getdata($RoleId);	
			$data['RoleId']=$result['RoleId'];
			$data['RoleName']=$result['RoleName'];
			$data['IsActive']=$result['IsActive'];		
			$this->load->view('Userrole/Userroleadd',$data);
		}
	}
	function updatedata($RoleId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$result=$this->Userrole_model->updatedata($RoleId);	
			if($result=='1'){
			$this->session->set_flashdata('success', 'Record has been updated Succesfully!');
				redirect('Userrole/Userrolelist');	
				}
				redirect('Userrole/Userrolelist');
		}
	}
	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("RoleId",$id);
			$res=$this->db->delete('tbluserrole');
			echo json_encode($res);
			die;
		}
	}
	

}

