<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
      	parent::__construct();
		//$this->load->model('Login_model');
      
	}
	
	 public function index(){
		$this->load->view('Dashboard/Dashboard');
	 }

	 public function Profile(){
		$this->load->view('Dashboard/Profileview');
	 }

	 public function Profileedit(){
		$this->load->view('Dashboard/Editprofile');
	 }

	
}




