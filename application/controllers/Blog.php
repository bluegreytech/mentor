<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Blog_model'); 
	}
	
	 public function index()
	 {

		$data['programData']=$this->Blog_model->getblog();
		//$data['proData']=$this->Blog_model->getblog_all();
		$this->load->view('Blog/Blog',$data);
	 }

	
	
}




