<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserSession extends CI_Controller 
{ 
	public function __construct() {
        parent::__construct();
		$this->load->model('usersession_model');
		$this->load->model('Standard_model');
		$this->load->model('Stream_model');
    }
	
	function ListUsersession()
	{		
		$data['usersessiosData']=$this->usersession_model->getusersession();		
		$this->load->view('UserSession/UsersessionList',$data);
	}
	public function  AddUsersession()
	{ 
			$data=array();
			$data['standardData']=$this->Standard_model->getstandard();
			$data['streamData']=$this->Stream_model->getstream();
			$data['user_id']=$this->input->post('user_id');
			$data['UserSessionId']=$this->input->post('UserSessionId');
			$data['streamid']=$this->input->post('streamid');
			$data['standard_id']=$this->input->post('StandardId');
			$data['Usersession_name']=$this->input->post('Usersession_name');			
			$data['location']=$this->input->post('location');
			$data['status']=$this->input->post('status');
			$data['StartDate']=$this->input->post('StartDate');
			$data['Timeing']=$this->input->post('Timeing');
			$data['UserId']=$this->input->post('UserId');
			$data['IsActive']=$this->input->post('IsActive');
			if($_POST){
				if($this->input->post('UserSessionId')==''){
				//	echo "fgfd";die;
					 $result=$this->usersession_model->insertdata();
					 if($result)
					 {
					  	$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						redirect('UserSession/ListUsersession');
					 }
				}else{
					//echo "else";die;
					$result=$this->usersession_model->updatedata();
					if($result)
					{
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('UserSession/ListUsersession');
					} 
				}
			}
			$this->load->view('UserSession/UsersessionAdd' ,$data);	
				
	}
	
	function EditUsersession($UserSessionId){
		$data=array();
		$data['streamData']=$this->Stream_model->getstream();
		$data['standardData']=$this->Standard_model->getstandard();
		$result=$this->usersession_model->get_single_usersession($UserSessionId);
		
		$data['UserSessionId']=$result['UserSessionId'];
		$data['standard_id']=$result['standard_id'];
		$data['streamid']=$result['stream_id'];
		$data['user_id']=$result['user_id'];
		$data['Usersession_name']=$result['Usersession_name'];
		$data['StartDate']=$result['StartDate'];
		$data['Timeing']=$result['Timeing'];
		$data['location']=$result['location'];
		$data['status']=$result['status'];		
		$data['IsActive']=$result['IsActive'];		
    	$this->load->view('UserSession/UsersessionAdd',$data);
	}
	
	function deleteUsersession(){
		$id=$this->input->post('id');
		$this->db->where("UserSessionId",$id);
		$res=$this->db->delete('tblusersession');		
		echo json_encode($res);
		die;
	}

	function getstandard(){
		$id=$this->input->post('id');
		$query = $this->db->get_where('tblstandard', array('streamid' => $id));     
        echo json_encode($query->result());
	}

	function getuser(){
		$id=$this->input->post('id');
		$query = $this->db->get_where('tbluser', array('StandardId' => $id));  
        echo json_encode($query->result());
	}
	

}

