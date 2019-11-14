<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stories extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Story_model');
      
    }
    public function index(){
    	$data['result']=$this->Story_model->getstory();
    	$this->load->view('stories/story_list',$data);
    }
    public function addstory()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addstory";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('story_title', 'story title', 'required');			
			
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='index';
				$data['story_id']=$this->input->post('story_id');
				$data['story_title']=$this->input->post('story_title');
				$data['story_long_desc']=$this->input->post('story_long_desc');
				$data['problem_desc']=$this->input->post('problem_desc');
				$data['solution_desc']=$this->input->post('solution_desc');
				$data['outcome_desc']=$this->input->post('outcome_desc');
				$data['story_desc']=$this->input->post('story_desc');
				$data['story_img']=$this->input->post('story_img');
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("story_id")!="")
				{ //echo "hjjhgj";die;
					$this->Story_model->story_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Stories');					
				}
				else
				{ 
					$this->Story_model->story_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Stories');				
				}				
			}
			$this->load->view('Stories/addstory',$data);
				
	}
	function editstory($story_id){
    if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();				
		$data['result']=$this->Story_model->getstorydata($story_id);	
		//echo "<pre>";print_r($result);die;
	       
      	$this->load->view('Stories/addstory',$data); 
	}
function story_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("story_id",$id);			
			$res=$this->db->update('tblstory',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

}