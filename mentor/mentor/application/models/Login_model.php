<?php

class Login_model extends CI_Model
 {
		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}

		function getfblogin(){
			$data = array(
				'oauth_provider' =>"facebook",				
				"oauth_uid"=>$this->input->post('id'),
			
			);
			 $this->db->select("*");
			 $this->db->from('tbluser');
			 $this->db->where($data);
			 $query=$this->db->get();
			// echo "<pre>gfgf";print_r($query->num_rows());die;
			 if($query->num_rows() > 0){ 
				//echo "fgfd";die;
				return $query->row();
			 }else{
				// echo "else";die;
				 return 0;
			 }
			 
		}


		// public function insertdata()
		// {
		// 	//$id = $this->input->post('id');
		// 	$FirstName = $this->input->post('first_name');
		// 	$LastName = $this->input->post('last_name');
		// 	$EmailAddress = $this->input->post('email');
		// 	//	$Gender = $this->input->post('gender');
		// 	$ProfileImage = $this->input->post('picture');
		// 	$data=array(
		// 			"EmailAddress"=>$EmailAddress,
		// 			"FirstName"=>$FirstName,
		// 			"LastName"=>$LastName,
		// 			"RoleId"=>"2",
		// 			'oauth_provider' =>"facebook",
		// 			'oauth_uid' =>$this->input->post('id'),
		// 			"ProfileImage"=>$ProfileImage
		// 	);
		// 	//echo "<pre>";print_r($data);die;
		// 	$res=$this->db->insert('tbluser',$data);	
		// 	if($res){
		// 		$sdata = array(
		// 			'oauth_provider' =>"facebook",				
		// 			"oauth_uid"=>$this->input->post('id'),
				
		// 		);
		// 		$this->db->select("*");
		// 		$this->db->from('tbluser');
		// 		$this->db->where($sdata);
		// 		$query=$this->db->get();
		// 		echo "<pre>";print_r($query->result());die;

		// 		$sessiondata= array(
		// 			'EmailAddress'=> $log->EmailAddress,
		// 			'UserId'=> $log->UserId,
		// 			'FirstName'=> $log->FirstName,
		// 			'LastName'=> $log->LastName,
		// 			'RoleId'=> $log->RoleId,
		// 		);
				
		// 	return $this->session->set_userdata($sessiondata);
		// 	}
			

		// }

		function getuser(){
			$r=$this->db->select('*')
						->from('tbluser')
						->get();
			$res = $r->result();
			return $res;
	
		}
		function user_insert()
		{  
				$data=array(
				'UserName'=>trim($this->input->post('username')),
				'EmailAddress'=>trim($this->input->post('email')), 
				'Password'=>md5($this->input->post('password')),
				'PhoneNumber'=>$this->input->post('phone'),
				'City'=>$this->input->post('city'),
				'Desgination'=>$this->input->post('desgination'),
				'IsActive'=>'1',
				'StreamId'=>$this->input->post('StreamId'),
				'StandardId'=>$this->input->post('StandardId'),
				'CreatedOn'=>date('Y-m-d H:i:s'),
				);
				//echo "<pre>";print_r($data);die;
				$res=$this->db->insert('tbluser',$data);	
				return $res;		
		}

		function getstandard()
		{
				$this->db->select('*');
				$this->db->from('tblstandard');
				$r = $this->db->get();
				$res = $r->result();
				return $res;
		}

		function checkResetCode($code)
		{
			$query=$this->db->get_where('tbluser',array('ResetPasswordCode'=>$code));
			
			if($query->num_rows()>0)
			{
				return $query->row()->UserId; 
			}else{
				return '';
			}
		}

		function updatePassword()
		{
			//echo "kjkj";die;
			$code=$this->input->post('code');
			$query=$this->db->get_where('tbluser',array('ResetPasswordCode'=>$code));
			if($query->num_rows()>0)
			{
			  $data=array('Password'=>md5(trim($this->input->post('Password'))),'ResetPasswordCode'=>'');
			  $this->db->where(array('UserId'=>$this->input->post('UserId'),'ResetPasswordCode'=>trim($this->input->post('code'))));
			   // print_r($data);die;
				$d=$this->db->update('tbluser',$data);
				return $d;
			  
			}else
			{
			  return '';
			}
		  }

	function forgotpass_check()
	{
		$email = trim($this->input->post('EmailAddress'));
        $rnd=randomCode();
		$query = $this->db->get_where('tbluser',array('EmailAddress'=>$email));
		//echo $this->db->last_query(); die;
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$admin_status=$row->IsActive;	
			if($admin_status =='0')
			{
				return "3"; 
			}
			elseif($admin_status =='1')
			{
				//echo "<pre>";print_r ($admin_status); die;
						if(!empty($row) && $row->EmailAddress != "")
						{
							$rpass= randomCode();
							$ud=array(
								'ResetPasswordCode'=>$rnd,
							);	
							$this->db->where('UserId',$row->UserId);
							$this->db->update('tbluser',$ud);
							//echo $this->db->last_query();die;
							$email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Forgot Password by admin'");
							//print_r($email_template); die;
									$email_temp=$email_template->row();
									$email_address_from=$email_temp->from_address;
									$email_address_reply=$email_temp->reply_address;
									$email_subject=$email_temp->subject;        
									$email_message=$email_temp->message;
									$username =$row->FirstName.'  '.$row->LastName;
									$password = $rpass;
									$email = $row->EmailAddress;
									$email_to=$email;
									$login_link='<a href="'.site_url('home/reset_password/'.$rnd).'">Click Here</a>';
						
									$base_url=front_base_url();
									$currentyear=date('Y');
									$email_message=str_replace('{break}','<br/>',$email_message);
								
									$email_message=str_replace('{base_url}',$base_url,$email_message);
									$email_message=str_replace('{year}',$currentyear,$email_message);

									$email_message=str_replace('{username}',$username,$email_message);
						
									$email_message=str_replace('{email}',$email,$email_message);
									$email_message=str_replace('{reset_link}',$login_link,$email_message);
									$str=$email_message;

									$config = Array(
									'protocol' => 'smtp',
									'smtp_host' => 'ssl://smtp.googlemail.com',
									'smtp_port' => 465,
									'smtp_user' => 'xxx',
									'smtp_pass' => 'xxx',
									'mailtype'  => 'html', 
									'charset'   => 'iso-8859-1'
									);
									$this->load->library('email', $config);
									$this->email->set_newline("\r\n");
								$this->email->from('bluegreyindia@gmail.com', 'admin');
								$this->email->to('binny@yopmail.com,binny@bluegreyindia.co.in');
								$this->email->subject('Registration Verification:');
								$message = "Thanks for signing up! Your account has been created...!";
									// Set to, from, message, etc.

									//$result = $this->email->send();
									if($this->email->send()){
										//echo $CI->email->prin
									   echo "send"; die;
									}else{
											echo$this->email->print_debugger();
									}
									
									//echo "<pre>";print_r($str);die;
									email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
							
							        return '1';
						}
						else
						{
							return '0';
						}
				}
		}
		else
		{
			return 2;
		}

	}
	

}
