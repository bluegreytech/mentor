<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mytest extends CI_Controller {
	public function __construct()
	{
      	parent::__construct();
		//$this->load->model('Login_model');
      
	}
	
	 public function index(){
		$this->load->view('mytest/mytest');
	 }

	
}




