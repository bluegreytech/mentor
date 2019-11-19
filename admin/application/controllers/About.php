<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('about_model');
	
      
    }
    function index(){

		$data['redirect_page']='index';

    	$data['result']=$this->about_model->getabout();

    	$this->load->view('about/about_list',$data);

	}

    public function addabout(){

    	if(!check_admin_authentication())
		{
			redirect('login');
		}                
		
		$about_id=$this->input->post('about_id');
		
		//$data['gstnumber']=$result->gstnumber;
		if($this->input->post("about_id")!="")
				{ //echo "hjjhgj";die;
					$this->about_model->about_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('About');					
				}
				else
				{ 
					$this->about_model->about_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('About');				
				}	
        
    	//$this->load->view('about/about_list',$data);

    }
    function contact_list(){
         $data['result']=$this->about_model->getcontacts();

    	$this->load->view('about/contact_list',$data);
    }
    function addcontact(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules('contact_title', 'contact title', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='contact_list';
				$data['cid']=$this->input->post('cid');
				$data['contact_title']=$this->input->post('contact_title');
				$data['contact_desc']=$this->input->post('contact_desc');
			
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("cid")!="")
				{ //echo "hjjhgj";die;
					$this->about_model->contact_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('About/contact_list');					
				}
				else
				{ 
					$this->about_model->contact_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('About/contact_list');				
				}				
			}
			$this->load->view('about/addcontact',$data);
    }
     public function editcontact($cid){
       if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();				
		$result=$this->about_model->getcontactbyid($cid);	
		//echo "<pre>";print_r($result);die;
	    $data["cid"] 	= $result["cid"]; 
		$data["contact_title"] 	= $result["contact_title"];
		$data["contact_desc"] 	= $result["contact_desc"];	
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('about/addcontact',$data);   
    }
    function contact_delete(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("cid",$id);			
			$res=$this->db->update('tblcontact',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
    }
    function partnercatlist(){

        $data['result']=$this->about_model->getpcat();

    	$this->load->view('about/partner_cat',$data);
    }
    function addcategory(){
         if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules('cat_title', 'contact title', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='partnercatlist';
				$data['pcid']=$this->input->post('pcid');
				$data['cat_title']=$this->input->post('cat_title');
				
			
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("pcid")!="")
				{ //echo "hjjhgj";die;
					$this->about_model->pc_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('About/partnercatlist');					
				}
				else
				{ 
					$this->about_model->pc_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('About/partnercatlist');				
				}				
			}
			$this->load->view('about/add_cat',$data);
    }
    public function editpartnercat($cid){
       if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();				
		$result=$this->about_model->getpcbyid($cid);	
		//echo "<pre>";print_r($result);die;
	    $data["pcid"] 	= $result["pcid"]; 
		$data["cat_title"] 	= $result["cat_title"];
	
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('about/add_cat',$data);   
    }
    function partnercat_delete(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("pcid",$id);			
			$res=$this->db->update('tblpartnercat',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
    }
    function partners(){
    	$data['result']=$this->about_model->getpartner();

    	$this->load->view('about/partners',$data);
    }
    function addpartner(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules('partner_nm', 'partner title', 'required');			
			
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='partners';
				$data['pid']=$this->input->post('pid');
				$data['partner_nm']=$this->input->post('partner_nm');
				$data['partner_desc']=$this->input->post('partner_desc');
				$data['partner_desg']=$this->input->post('partner_desg');
			    $data['cat_id']=$this->input->post('cat_id');
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("pid")!="")
				{ //echo "hjjhgj";die;
					$this->about_model->partner_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('About/partners');					
				}
				else
				{ 
					$this->about_model->partner_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('About/partners');				
				}				
			}
			$data['partnercat']=$this->about_model->getpartnercatactive();
			$this->load->view('about/addpartner',$data);
    }
     public function editpartner($cid){
       if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();				
		$result=$this->about_model->getpartnerbyid($cid);	
		
	    $data["pid"] 	= $result["pid"]; 
		$data["partner_nm"] 	= $result["partner_nm"];
	    $data["partner_desg"] 	= $result["partner_desg"];
	    $data["partner_desc"] 	= $result["partner_desc"];
	     $data["cat_id"] 	= $result["cat_id"];
       	$data['IsActive']=$result["IsActive"]; 
       	$data['partnercat']=$this->about_model->getpartnercatactive();         
      	$this->load->view('about/addpartner',$data);   
    }
    function partner_delete(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("pid",$id);			
			$res=$this->db->update('tblpartner',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
    }
}