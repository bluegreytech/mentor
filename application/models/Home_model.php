<?php

class Home_model extends CI_Model
 {

 public function __construct()
  {
        parent::__construct();
    
    }

    function user_insert(){
    	
    	$data=array('username' =>$this->input->post('username'),
    		'email' =>trim($this->input->post('email')),
    		'password' =>md5($this->input->post('password')),
    		'choicecareerassess' =>implode(',',$this->input->post('careerchoiceassess')),
    		'assessment' =>trim($this->input->post('assessment')),
    		'choicecareer' =>trim($this->input->post('careerchoice')),   
    		'created_date'=>date("y-m-d H:i:s"),       
    	 );
    	$res=$this->db->insert('tblusers',$data);
    	return $res;
    }

	function check_login()
	{
	
	$email = trim($this->input->post('email'));
	$password = $this->input->post('password');
	$query = $this->db->get_where('tblusers',array('email'=>$email,'password'=>md5($password)));
	$admin = $query->row_array();
	if($query->num_rows()>0)
	{
	
	$admin_status=$admin['status'];

		if($admin_status !='Active')
		{
			return "3"; 
		}


		if($query->num_rows() > 0)
		{
					
			
			$user_id   = $admin['user_id'];
			
			$data = array(
			'user_id' => $user_id,
			'username' => $admin['username'],			     
			);
			$this->session->set_userdata($data);
			return "2";
			
		}
	}
	else
	{
	return "0";
	}
	}

	 // forget password
    function forgot_email()
    {
      $email = trim($this->input->post('email'));
      $rnd=randomCode();
    
       $query = $this->db->get_where('tblusers',array('email'=>$email));
    //  echo $this->db->last_query(); die;
    if($query->num_rows()>0)
    {
      $row = $query->row();
      $admin_status=$row->status;
     // echo $admin_status;die;
       if($admin_status =='Inactive')
      {
         return "3"; 
      }elseif($admin_status =='Active'){

                  if(!empty($row) && $row->email != "")
                  {
                    $rpass= randomCode();
                    $ud=array('ResetPasswordCode'=>$rnd,
                      //s'password' => MD5($rpass)
                    );
                    $this->db->where('user_id',$row->user_id);
                    $this->db->update('tblusers',$ud);
                    
                    $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Forgot Password by admin'");
                            $email_temp=$email_template->row();
                         //   echo "<pre>";print_r($email_temp);die;
                            $email_address_from=$email_temp->from_address;
                            $email_address_reply=$email_temp->reply_address;
                            $email_subject=$email_temp->subject;        
                            $email_message=$email_temp->message;
                            $username =$row->username;
                            $password = $rpass;
                            $email = $row->email;
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
                      //   echo $str;
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