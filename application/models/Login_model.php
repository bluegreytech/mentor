<?php

class Login_model extends CI_Model
 {
		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}

		function checkResetCode($code='')
		{
			$query=$this->db->get_where('tbluser',array('PasswordResetCode'=>$code));
			print_r($query);die;
			if($query->num_rows()>0)
			{
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
			$EmailAddress=$this->input->post('EmailAddress'); 
			$query = $this->db->get_where('tbluser',array('EmailAddress'=>$EmailAddress));
			if($query->num_rows()>0)
			{
				$row = $query->row();
				$admin_status=$row->IsActive;
				if($admin_status =='Inactive')
				{
				return "3"; 
				}
				else if($admin_status =='Active')
				{
					if(!empty($row) && $row->EmailAddress!="")
					{
						$rpass= randomCode();
						$passdata=array(
						'ResetPasswordCode'=>$rpass
						);
						$this->db->where('UserId',$row->UserId);
						$this->db->update('tbluser',$passdata);            
					
						$config['protocol']  = 'smtp';
						$config['smtp_host'] = 'ssl://smtp.googlemail.com';
						$config['smtp_port'] = '465';
						$config['smtp_user']='bluegreyindia@gmail.com';
						$config['smtp_pass']='Test@123'; 
						$config['charset']='utf-8';
						$config['newline']="\r\n";
						$config['mailtype'] = 'html';	
						$body = base_url().'Home/Resetpassword/'.$rpass;						
						$this->email->initialize($config);
						$this->email->from('bluegreyindia@gmail.com', 'Admin');
						$this->email->to('bluegreyindia@gmail.com');		
						$this->email->subject('FG Password');
						$this->email->message($body);
						if($this->email->send())
						{
							return '1';
						}
								
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
