<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Library extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
				$this->load->model('Library_model');
		}
		public function index(){
			if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->Library_model->getlibrary();
		$this->load->view('Library/library_list',$data);
		}
		function addlibrary(){

			if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addlibrary";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('video_url', 'video url', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='Library';
				$data['video_url']=$this->input->post('video_url');
							
			}
			else
			{
				
					$this->Library_model->data_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Library');				
								
			}
			$this->load->view('Library/addlibrary',$data);
		}
		function deletedata(){
			if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("id",$id);			
			$res=$this->db->update('tblcareer_library',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		}
}

		