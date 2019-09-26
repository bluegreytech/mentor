<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
				$this->load->model('blog_model');
		}

		
	function bloglist()
	{	
	
		if(!check_admin_authentication()){			
			redirect(base_url());
		}		
		$data['result']=$this->blog_model->getblog();
		$this->load->view('Blog/BlogList',$data);
		
	}
	public function addblog()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addblog";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('blogtitle', 'blog title', 'required');			
			$this->form_validation->set_rules('blogdesc', 'blog Description', 'required');
			$this->form_validation->set_rules('IsActive', 'IsActive', 'required');
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data["error"]);die;
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='bloglist';
				$data['blogid']=$this->input->post('blogid');
				$data['blogtitle']=$this->input->post('blogtitle');
				$data['blogdesc']=$this->input->post('blogdesc');
				$data['blogimage']=$this->input->post('blogimage');
				$data['IsActive']=$this->input->post('IsActive');
			
			}
			else
			{
				if($this->input->post("blogid")!="")
			{
			// echo "fddgfd";die;	
				$this->blog_model->blog_update();
				$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
				redirect('blog/bloglist');
				
			}
			else
			{  //echo "<pre>";print_r($_POST);die;
				$this->blog_model->blog_insert();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('blog/bloglist');
			
			}
				
			}
			$this->load->view('blog/blogadd',$data);
				
	}


	public function editblog($blog_id)
    {  //echo "fdsf";die;
            
		if(!check_admin_authentication())
		{
		redirect('login');
		}
                
		$data = array();				
		$result=$this->blog_model->getblogdata($blog_id);	
		//echo "<pre>";print_r($result);die;
	    $data["blogid"] 	= $result["blog_id"]; 
		$data["blogtitle"] 	= $result["blog_title"];
		$data["blogdesc"] 		= $result["blog_desc"];				
		$data["blogimage"]      = $result["blog_image"];			
       	$data['IsActive']=$result["IsActive"];
          
      $this->load->view('blog/blogadd',$data);
            
    }

  

    function blog_delete(){
	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			if($this->input->post('blog_image')!='')
			{
					if(file_exists(base_path().'upload/blogimage/'.$this->input->post('blog_image')))
					{
						$link=base_path().'upload/blogimage/'.$this->input->post('blog_image');
						unlink($link);
					}
			}
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("gallery_id",$id);			
			$res=$this->db->update('tblgallery',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}
    
	

}

