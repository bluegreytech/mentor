<?php

class Login_model extends CI_Model
 {
		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}

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
			function getstandard(){
		$this->db->select('*');
		$this->db->from('tblstandard');
		$r = $this->db->get();
		$res = $r->result();
		return $res;

	}

		function checkResetCode($code='')
		{
			$query=$this->db->get_where('tbluser',array('PasswordResetCode'=>$code));
			
			if($query->num_rows()>0)
			{
				// echo print_r($query->row()->UserId);die;
				return $query->row()->UserId; 
			
			}else{
				return '';
			}
		}

		function updatePassword()
		{
			$code=$this->input->post('code');
			$query=$this->db->get_where('tbluser',array('PasswordResetCode'=>$code));
			if($query->num_rows()>0)
			{
			  $data=array('Password'=>md5(trim($this->input->post('Password'))),'PasswordResetCode'=>'');
				$this->db->where(array('UserId'=>$this->input->post('UserId'),'PasswordResetCode'=>trim($this->input->post('code'))));
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
		//echo "jhgj";die;
		$email = trim($this->input->post('EmailAddress'));
       $rnd=randomCode();
    
    $query = $this->db->get_where('tbluser',array('EmailAddress'=>$email));
  // echo $this->db->last_query(); die;
    if($query->num_rows()>0)
    {
    	//echo "jhgjg";die;
      $row = $query->row();
      $admin_status=$row->IsActive;
     	
       if($admin_status =='0')
      {
         return "3"; 
      }elseif($admin_status =='1'){
      	//echo "<pre>";print_r ($admin_status); die;

                  if(!empty($row) && $row->EmailAddress != "")
                  {
                    $rpass= randomCode();
                    $ud=array('PasswordResetCode'=>$rnd,
                      //s'password' => MD5($rpass)
                    );
                    $this->db->where('UserId',$row->UserId);
                    $this->db->update('tbluser',$ud);
                    
                    $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Forgot Password by admin'");
                            $email_temp=$email_template->row();
                            $email_address_from=$email_temp->from_address;
                            $email_address_reply=$email_temp->reply_address;
                            $email_subject=$email_temp->subject;        
                            $email_message=$email_temp->message;
                            $username =$row->UserName.'  '.$row->LastName;
                            $password = $rpass;
                            $email = $row->EmailAddress;
                            $email_to=$email;
                            $login_link=  '<a href="'.site_url('home/reset_password/'.$rnd).'">Click Here</a>';
                    /* Common for All Email Template */
                          //  $site_setting = site_setting();
                           // $site_name=ucwords($site_setting->site_name);       
                    // $theme_url = front_base_url().getThemeName();
                    $base_url=front_base_url();
                    $currentyear=date('Y');
                    /* End of Common All Email Template */
                    /* Common for All Email Template */
                    $email_message=str_replace('{break}','<br/>',$email_message);
                 
                    $email_message=str_replace('{base_url}',$base_url,$email_message);
                    $email_message=str_replace('{year}',$currentyear,$email_message);

                    $email_message=str_replace('{username}',$username,$email_message);
                    // $email_message=str_replace('{password}',$password,$email_message);
                    $email_message=str_replace('{email}',$email,$email_message);
                    $email_message=str_replace('{reset_link}',$login_link,$email_message);
                    $str=$email_message; //die;
                    echo $str;die;
                    /** custom_helper email function **/
                    
                    email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
                    
                      return '1';
                  }
                  else{
                    return '0';
                  }
        }
    }else{
      return 2;
    }

	}
	

}
