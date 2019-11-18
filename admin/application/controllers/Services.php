<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
				$this->load->model('services_model');
		}

		
	function serviceslist()
	{	
	
		if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->services_model->getservices();
		$this->load->view('services/serviceslist',$data);
		
	}
	public function addservices()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addservices";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('servicestitle', 'services title', 'required');		
			$this->form_validation->set_rules('services_sdesc', 'services Description', 'required');
			//$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();	
				echo "<pre>";print_r($data['error']);die;			
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='serviceslist';
				$data['servicesid']=$this->input->post('servicesid');
				$data['servicestitle']=$this->input->post('servicestitle');
				$data["servicespage"] = $this->input->post('servicespage');
				$data['servicesdesc']=$this->input->post('services_sdesc');
				$data['serviceldesc']=$this->input->post('servicesldesc');
				$data['servicesimage']=$this->input->post('servicesimage');
						
			}
			else
			{
				if($this->input->post("servicesid")!="")
				{ 
					$this->services_model->services_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('services/serviceslist');					
				}
				else
				{ 
					//echo "hjjhgj";die;
					$this->services_model->services_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('services/serviceslist');				
				}				
			}
			$this->load->view('services/servicesAdd',$data);
				
	}


	public function editservices($services_id)
    {  
		if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();				
		$result=$this->services_model->getservicesdata($services_id);	
		//echo "<pre>";print_r($result);die;
	    $data["servicesid"] 	= $result["services_id"]; 
		$data["servicestitle"] 	= $result["services_title"];
		$data["servicespage"] 	= $result["servicespage"];
		$data["servicesdesc"]   = $result["services_sdesc"];	
		$data["serviceldesc"] 	= $result["services_ldesc"];				
		$data["servicesimage"]  = $result["services_image"];
		$data['redirect_page']='serviceslist';
      	$this->load->view('services/servicesAdd',$data);            
    }

  

    function services_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('services_image')!='')
			{
					if(file_exists(base_path().'upload/servicesimage/'.$this->input->post('services_image')))
					{
						$link=base_path().'upload/servicesimage/'.$this->input->post('services_image');
						unlink($link);
					}
			}
			$data= array('is_deleted' =>'1','services_image'=>'');
			$id=$this->input->post('id');
			$this->db->where("services_id",$id);			
			$res=$this->db->update('tblservices',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}
    
	

}

