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
		
		$this->load->view('mytest/mytestlist',$data);
	 }
	 function addtest(){

	 	if(!check_user_authentication()){			
			redirect(base_url());
		}
		$id =$this->session->userdata('user_id');
		$data=get_one_user($id);
		echo "<pre>";print_r($data);die;
		die;
      
        $checkmsg = file_get_contents('http://msg.desireinfotech.in/rest/services/sendSMS/sendGroupSms?AUTH_KEY=204644373ece9946d7c65769e75c65ac&message='.urlencode($message).'&senderId=NKGRUP&routeId=1&mobileNos='.urlencode($mobileno).'&smsContentType=english"');



	 }

	
	
}




