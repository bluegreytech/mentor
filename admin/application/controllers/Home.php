<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('login_model');
      
    }
    public function dashboard()
	{

		if(!check_admin_authentication()){ 
				redirect(base_url());
			}
		$this->load->view('dashboard');
	}
}
?>