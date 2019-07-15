<?php

class Login_model extends CI_Model
 {
		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}
		function user_insert()
		{  
			//echo "<pre>";print_r($_POST);die;
		
		$data=array(
		'UserName'=>$this->input->post('username'),
		'EmailAddress'=>$this->input->post('email'), 
		'Password'=>$this->input->post('phone'),
		'PhoneNumber'=>$this->input->post('phone'),
		'City'=>$this->input->post('phone'),
		'Desgination'=>$this->input->post('phone'),
		'IsActive'=>1,
		'StreamId'=>$this->input->post('StreamId'),
		'StandardId'=>$this->input->post('StandardId'),
		'CreatedOn'=>date('Y-m-d H:i:s'),
		);
		$res=$this->db->insert('tbluser',$data);	
		return $res;
			
		}
			function getstandard(){
		$this->db->select('*');
		$this->db->from('tblstandard');
		$r = $this->db->get();
		$res = $r->result();
		return $res;

	}

}
