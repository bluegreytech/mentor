<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mytest extends CI_Controller {
	public function __construct()
	{
      	parent::__construct();
		//$this->load->model('m'); 
	}
	
	 public function index()
	 {
	 	if(!check_user_authentication()){			
			redirect(base_url());
		}
         $data=array();
        $data['title']="Mytest";
		$data['activeTab'] = "Mytest";
		$id =$this->session->userdata('user_id');
		$data['userdata']=get_one_user($id);
		$this->load->view('mytest/mytestlist',$data);
	 }
	 function addtest(){

	 	if(!check_user_authentication()){			
			redirect(base_url());
		}
		$id =$this->session->userdata('user_id');
		$userdata=get_one_user($id);
		  echo 'http://assess.careeracer.com/access-login-api.php?category=&channel_id=647&cd='.urlencode($userdata->choicecareerassess).'&age=647&access_code='.urlencode($userdata->access_code).'';die;
		 $checkmsg = file_get_contents('http://assess.careeracer.com/access-login-api.php?category=&channel_id=647&cd='.urlencode($userdata->choicecareerassess).'&age=647&access_code=mentordemo8978');

	 	//$checkmsg = file_get_contents('https://opentdb.com/api.php?amount=10');
   			// echo "<pre>";print_r($checkmsg);die;
      
  				//     	 $json = json_decode($checkmsg, true);
  				//     	 	echo "<pre>";print_r($json);die;
		// die;



	 }

	
	
}




