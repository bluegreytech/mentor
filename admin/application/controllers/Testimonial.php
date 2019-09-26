<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('blog_model');
      
    }
	function testimoniallist()
	{	
	
		if(!check_admin_authentication()){ 
			
			redirect(base_url());
		}else{	
		
			$data['result']=$this->blog_model->gettestimonial();
			$this->load->view('Testimonial/testimoniallist',$data);
		}
	}
	public function addtestimonial()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addtestimonial";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('testimonialtitle', 'Testimonial title', 'required');			
			$this->form_validation->set_rules('testimonialdesc', 'Testimonial Description', 'required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='testimoniallist';
				$data['testimonialid']=$this->input->post('testimonialid');
				$data['testimonialtitle']=$this->input->post('testimonialtitle');
				$data['testimonialdesc']=$this->input->post('testimonialdesc');
				$data['testimonialimage']=$this->input->post('testimonialimage');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("testimonialid")!="")
			{
			// echo "fddgfd";die;	
				$this->blog_model->testimonial_update();
				$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
				redirect('testimonial/testimoniallist');
				
			}
			else
			{  //echo "<pre>";print_r($_POST);die;
				$this->blog_model->testimonial_insert();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('testimonial/testimoniallist');
			
			}
				
			}
			$this->load->view('Testimonial/testimonialadd',$data);
				
	}


	public function edittestimonial($testimonial_id)
    {  //echo "fdsf";die;
            
		if(!check_admin_authentication())
		{
		redirect('login');
		}
                
		$data = array();				
		$result=$this->blog_model->gettestimonialdata($testimonial_id);	
		//echo "<pre>";print_r($result);die;
	    $data["testimonialid"] 	= $result["testimonial_id"]; 
		$data["testimonialtitle"] 	= $result["testimonial_title"];
		$data["testimonialdesc"] 		= $result["testimonial_desc"];				
		$data["testimonialimage"]      = $result["testimonial_image"];			
       	$data['IsActive']=$result["IsActive"];
          
      $this->load->view('Testimonial/testimonialadd',$data);
            
    }

  

    function testimonial_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('testimonial_image')!='')
			{
				if(file_exists(base_path().'upload/testimonialimage/'.$this->input->post('testimonial_image')))
				{
					$link=base_path().'upload/testimonialimage/'.$this->input->post('testimonial_image');
					unlink($link);
				}
			}
			$data= array('Is_deleted' =>'1','testimonial_image'=>'');
			$id=$this->input->post('id');
			$this->db->where("testimonial_id",$id);			
			$res=$this->db->update('tbltestimonial',$data);
		echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}
    
	

	
}
