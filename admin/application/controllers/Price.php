<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Price extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
				$this->load->model('price_model');
		}

		
	function pricelist()
	{	
	
		if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->price_model->getprice();
		$this->load->view('Priceplan/pricelist',$data);
		
	}
	public function addprice()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addprice";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('pricetitle', 'price title', 'required');			
			$this->form_validation->set_rules('price_amt', 'price Amount', 'required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();	
				echo "<pre>";print_r($data['error']);die;			
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='pricelist';
				$data['priceid']=$this->input->post('priceid');
				$data['pricetitle']=$this->input->post('pricetitle');
				$data['price_amt']=$this->input->post('price_amt');				
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("priceid")!="")
				{ 	//echo "hjjhgj";die;
					$this->price_model->price_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('price/pricelist');					
				}
				else
				{ 
				   //echo "hjjhgj";die;
					$this->price_model->price_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('price/pricelist');				
				}				
			}
			$this->load->view('Priceplan/priceadd',$data);
				
	}


	public function editprice($price_id)
    {  
		if(!check_admin_authentication())
		{
			redirect('login');
		}

		$data = array();				
		$result=$this->price_model->getpricedata($price_id);	
		//echo "<pre>";print_r($result);die;
	    $data["priceid"] 		= $result["price_id"]; 
		$data["pricetitle"] 	= $result["price_title"];
		$data["price_amt"] 		= $result["price_amt"];
       	$data['IsActive']       = $result["Isactive"];          
      	$this->load->view('Priceplan/priceadd',$data);            
    }

  

    function price_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("price_id",$id);			
			$res=$this->db->update('tblprice',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}



	function planlist()
	{	
	
		if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->price_model->getplan();
	    $data['priceresult']=$this->price_model->getprice();
		$this->load->view('Priceplan/planlist',$data);
		
	}
	public function addplan()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addplan";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('plantitle', 'Plan title', 'required');			
			$this->form_validation->set_rules('priceid','Price id', 'required');
			$this->form_validation->set_rules('priceplan_status', 'priceplan_status', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();	
				echo "<pre>";print_r($data['error']);die;			
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='palnlist';
				$data['planid']=$this->input->post('planid');
				$data['price_id']=$this->input->post('price_id');
				$data['plantitle']=$this->input->post('plantitle');
				$data['plandesc']=$this->input->post('plan_desc');
				$data['priceid']=$this->input->post('priceid');				
				$data['priceplan_status']=$this->input->post('priceplan_status');			
			}
			else
			{
				if($this->input->post("planid")!="")
				{ //	echo "if ";die;
					$this->price_model->plan_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('price/planlist');					
				}
				else
				{ 
				   //echo "else";die;
					$this->price_model->plan_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('price/planlist');				
				}				
			}
			$data['priceresult']=$this->price_model->getprice();
			$this->load->view('Priceplan/planadd',$data);
				
	}


	public function editplan($paln_id)
    {  
		if(!check_admin_authentication())
		{
			redirect('login');
		}
    
		$data = array();	
		   $data['priceresult']=$this->price_model->getprice();			
		$result=$this->price_model->getplandata($paln_id);	
		//	echo "<pre>";print_r($result);die;
	    $data["planid"] 		= $result["priceplan_id"]; 
		$data["plantitle"] 	= $result["plan_title"];
		$data["plandesc"] 	= $result["plan_desc"];
		$data["price_id"] 		= $result["price_id"];
       	$data['priceplan_status']       = $result["priceplan_status"];          
      	$this->load->view('Priceplan/planadd',$data);            
    }

  

    function plan_delete(){
	    echo "ghgfhg";die;
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
		echo 	$id=$this->input->post('id');
			$this->db->where("tblpriceplaning",$id);			
			$res=$this->db->update('priceplan_id',$data);
			echo $this->db->last_query();die;
			//echo json_encode($res);
			die;
		
	}
    
	

}

