<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
				$this->load->model('Blog_model');
		}

		function Bloglist()
		{	
			if(!check_admin_authentication()){ 
				redirect(base_url());
			}else{	
				$data['programData']=$this->Blog_model->getblog();
				$this->load->view('Blog/BlogList',$data);
			}	
		}

	public function Blogadd()
	{        
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{  
				$data=array();
				$data['BlogId']=$this->input->post('BlogId');
				$data['FirstName']=$this->input->post('FirstName');
				$data['UserImage']=$this->input->post('UserImage');
				$data['BlogTitle']=$this->input->post('BlogTitle');
				$data['BlogImage']=$this->input->post('BlogImage');
				$data['BlogDescription']=$this->input->post('BlogDescription');
				$data['BlogStatusId']=$this->input->post('BlogStatusId');
				$data['IsActive']=$this->input->post('IsActive');
				if($_POST){
					if($this->input->post('BlogId')==''){
								
						$result=$this->Blog_model->insertdata();	
						if($result)
						{
							$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
							redirect('Blog/Bloglist');
						}
					}
					else
					{
						$result=$this->Blog_model->updatedata();
						if($result)
						{
							$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
							redirect('Blog/Bloglist');
						} 

					}
			}
			$data['statusBlog']=$this->Blog_model->getblogStatus();
			$this->load->view('Blog/BlogAdd',$data);	
		}	
	}

	
	function Editblog($BlogId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data=array();
			$data['statusBlog']=$this->Blog_model->getblogStatus();
			$result=$this->Blog_model->getdata($BlogId);	
			$data['BlogId']=$result['BlogId'];
			$data['FirstName']=$result['FirstName'];	
			$data['UserImage']=$result['UserImage'];	
			$data['BlogTitle']=$result['BlogTitle'];
			$data['BlogImage']=$result['BlogImage'];
			$data['BlogDescription']=$result['BlogDescription'];
			$data['BlogStatusId']=$result['BlogStatusId'];
			$data['IsActive']=$result['IsActive'];			
			$this->load->view('Blog/BlogAdd' ,$data);	
		}
	}

	function updatedata($BlogId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->Blog_model->updatedata($BlogId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('Blog/Bloglist');	
			}
			redirect('Blog/Bloglist');
		}
	}

	function deletedata(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$id=$this->input->post('id');
			$this->db->where("BlogId",$id);
			$res=$this->db->delete('tblblogs');
			echo json_encode($res);
			die;
		}
	}
	

}

