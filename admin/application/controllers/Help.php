<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Help extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
				$this->load->model('help_model');
		}

		
	function helplist()
	{	
	
		if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->help_model->getlist();
		$this->load->view('help/helplist',$data);
		
	}
	public function addhelp()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addhelp";	
			$data['pro']=$this->help_model->getpro();
			$this->load->library("form_validation");
			$this->form_validation->set_rules('help_title', 'Help title', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='helplist';
				$data['help_id']=$this->input->post('help_id');
				$data['pid']=$this->input->post('pid');
				$data['help_title']=$this->input->post('help_title');
				$data['help_subtitle']=$this->input->post('help_subtitle');
				$data['help_desc']=$this->input->post('help_desc');
				$data['help_image']=$this->input->post('help_image');
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("help_id")!="")
				{ //echo "hjjhgj";die;
					$this->help_model->help_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Help/helplist');					
				}
				else
				{ 
					$this->help_model->help_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Help/helplist');				
				}				
			}
			$this->load->view('Help/addhelp',$data);
				
	}
     public function addkey(){
     	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addkey";	
			$data['pro']=$this->help_model->getprocat();
			$this->load->library("form_validation");
			$this->form_validation->set_rules('key_title', 'Key title', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='keylist';
				$data['key_id']=$this->input->post('key_id');
				$data['pid']=$this->input->post('pid');
				$data['key_title']=$this->input->post('key_title');
				$data['key_img']=$this->input->post('key_img');
				$data['key_desc']=$this->input->post('key_desc');
				
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("key_id")!="")
				{ //echo "hjjhgj";die;
					$this->help_model->key_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Help/keylist');					
				}
				else
				{ 
					$this->help_model->key_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Help/keylist');				
				}				
			}
			$this->load->view('Help/addkey',$data);
     }
     public function addlearn(){
     	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addlearn";	
			$data['pro']=$this->help_model->getprocat();
			$this->load->library("form_validation");
			$this->form_validation->set_rules('learn_title', 'title', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='learnlist';
				$data['lid']=$this->input->post('lid');
				$data['pid']=$this->input->post('pid');
				$data['learn_title']=$this->input->post('learn_title');
				$data['learn_desc']=$this->input->post('learn_desc');
				$data['learn_img']=$this->input->post('learn_img');
				
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("lid")!="")
				{ //echo "hjjhgj";die;
					$this->help_model->learn_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Help/learnlist');					
				}
				else
				{ 
					$this->help_model->learn_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Help/learnlist');				
				}				
			}
			$this->load->view('Help/addlearn',$data);
     }
public function editkey($id)
    {  
		if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();
		$data['pro']=$this->help_model->getprocat();				
		$result=$this->help_model->getkeydatabyid($id);	
		//echo "<pre>";print_r($result);die;
	    $data["key_id"] 	= $result["key_id"]; 
		$data["pid"] 	= $result["pid"];
		$data["key_title"] 	= $result["key_title"];
		$data["key_desc"] 		= $result["key_desc"];				
		$data["key_img"]      = $result["key_img"];	
					
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('Help/addkey',$data);            
    }
    public function editlearn($id){
    	if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();
		$data['pro']=$this->help_model->getprocat();				
		$result=$this->help_model->getlearndatabyid($id);	
		//echo "<pre>";print_r($result);die;
	    $data["lid"] 	= $result["lid"]; 
		$data["pid"] 	= $result["pid"];
		$data["learn_title"] 	= $result["learn_title"];
		$data["learn_desc"] 		= $result["learn_desc"];				
		$data["learn_img"]      = $result["learn_img"];	
					
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('Help/addlearn',$data);
    }
	public function edithelp($id)
    {  
		if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();
		$data['pro']=$this->help_model->getpro();				
		$result=$this->help_model->gethelpdatabyid($id);	
		//echo "<pre>";print_r($result);die;
	    $data["help_id"] 	= $result["help_id"]; 
		$data["pid"] 	= $result["pid"];
		$data["help_title"] 	= $result["help_title"];
		$data["help_subtitle"] 		= $result["help_subtitle"];				
		$data["help_desc"]      = $result["help_desc"];	
		$data["help_image"]      = $result["help_image"];			
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('Help/addhelp',$data);            
    }
function learnlist(){
if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->help_model->getlearn();
		$this->load->view('help/learnlist',$data);
}
  function keylist(){
if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->help_model->getkey();
		$this->load->view('help/keylist',$data);
  }

    function help_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("help_id",$id);			
			$res=$this->db->update('tblhelp',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}
	function key_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("key_id",$id);			
			$res=$this->db->update('tblkey',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
	}
	function learn_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("lid",$id);			
			$res=$this->db->update('tbllearn',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
	}
    
	

}

