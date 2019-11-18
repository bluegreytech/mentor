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
		//echo "<pre>";print_r($userdata);die;
		echo 'http://assessment.togethermentor.com/access-login-api1.php?category=&channel_id=647&cd='.urlencode($userdata->choicecareerassess).'&age=647&access_code='.trim(urlencode($userdata->access_code)).'&name='.trim($userdata->username).'&location='.$userdata->location.'&person_age='.$userdata->age.'&amp;current_stage='.$userdata->current_stage; die;
		echo  $checkmsg = file_get_contents('http://assessment.togethermentor.com/access-login-api1.php?category=&channel_id=647&cd='.urlencode($userdata->choicecareerassess).'&age=647&access_code='.urlencode($userdata->access_code).'&name='.trim($userdata->username).'&location='.$userdata->location.'&person_age='.$userdata->age.'&current_stage='.$userdata->current_stage);

		//$checkmsg = file_get_contents('https://opentdb.com/api.php?amount=10');
		// echo "<pre>";print_r($checkmsg);die;

		//     	 $json = json_decode($checkmsg, true);
		//     	 	echo "<pre>";print_r($json);die;
		// die;

	}
    
    function Test_complete(){
    	if(!check_user_authentication()){			
			redirect(base_url());
		}	
		$data=array();
		$sitedata=site_setting();
		$data['student_payment']=$sitedata->student_payment;
		//echo $sitedata->student_payment; die;
		$this->load->view('payment/make_payment',$data);		
    }

    
	
	
}




