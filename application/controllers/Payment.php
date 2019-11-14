<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
	    //$this->load->model('blog_model');
		}

		
	function make_payment()
	{	
	  
		if(!check_user_authentication()){			
			redirect(base_url());
		}	
		$data=array();
		$this->load->view('payment/make_payment',$data);
		
	}
	
	public function razorPaySuccess()
    { 
     $data = array('user_id' => '1',
               'payment_id' => $this->input->post('razorpay_payment_id'),
               'amount' => $this->input->post('totalAmount'),
               'product_id' => $this->input->post('product_id')
           );
              
           
     $insert = $this->db->insert('payments', $data);
     $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
    }
    public function RazorThankYou()
    {
     $this->load->view('razorthankyou');
    }
    
	

}

