<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Blog_model');
      
	}
	
	 public function index(){
	 	//$data['about']=$this->Blog_model->getabout();
		$this->load->view('About/Aboutus');
	 }

	 public function Pricing(){
		$this->load->view('Price/Packprice');
	 }

	
}




