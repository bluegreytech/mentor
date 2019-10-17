
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

     function insertcontact(){
      
      $data=array('name' =>$this->input->post('username'),
        'email' =>trim($this->input->post('email')),
        'phone' =>trim($this->input->post('phone')),   
        'subject' =>trim($this->input->post('subject')),   
        'message' =>trim($this->input->post('message')),
        'create_date'=>date("y-m-d H:i:s"),          
             
       );
      $res=$this->db->insert('tblinquery',$data);
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
                            $login_link=  '<a href="'.site_url('home/reset_password/'.$rnd).'" target="_blank">Click Here</a>';
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
                    $str=$email_message; 
                    echo "<pre>";print_r($str);die;
                     $email_config = Array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => '465',
                    'smtp_user' => 'bluegreyindia@gmail.com',
                    'smtp_pass' => 'Test@123',
                    'mailtype'  => 'html',
                    'starttls'  => true,
                    'newline'   => "\r\n",
                    'charset'=>'utf-8',
                    'header'=> 'MIME-Version: 1.0',
                    'header'=> 'Content-type:text/html;charset=UTF-8',
                   
                    );

                        
                     $this->load->library('email', $email_config);
                   
                     $this->email->from("binny@bluegreytech.co.in", "Mentor");
                     $this->email->to( $email_to);
                     $this->email->subject($email_subject);
                     $this->email->message($str);

                    
                    if($this->email->send()){ 
                   
                     //echo "send"; die;
                       return '1';
                    }else{
                     echo $this->email->print_debugger();die;
                    }
                     // echo $str;die;
                    /** custom_helper email function **/

                    
                     //email_send($email_address_from,$email_address_reply,$email_to,$email_subject,$str);
                    
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

       //reset password
  function checkResetCode($code='')
  {
    $query=$this->db->get_where('tblusers',array('ResetPasswordCode'=>$code));
    if($query->num_rows()>0)
    {
      return $query->row()->user_id; 
      
    }else{
      return '';
    }
  }
        
 

  function updatePassword()
    {
        $code=$this->input->post('code');
        $query=$this->db->get_where('tblusers',array('ResetPasswordCode '=>$code));
        if($query->num_rows()>0)
        {
          $data=array('Password'=>md5(trim($this->input->post('Password'))),'ResetPasswordCode'=>'');
            $this->db->where(array('user_id'=>$this->input->post('user_id'),'ResetPasswordCode'=>trim($this->input->post('code'))));
           // print_r($data);die;
            $d=$this->db->update('tblusers',$data);
            return $d;
          
        }else
        {
          return '';
        }
      }


       function updateProfile(){

        // echo "hjhg";die;
    //  echo "<pre>";print_r($_POST);die;
      $user_image='';
      //$image_settings=image_setting();
      if(isset($_FILES['profile_image']) &&  $_FILES['profile_image']['name']!='')
      {
        $this->load->library('upload');
        $rand=rand(0,100000); 

        $_FILES['userfile']['name']     =   $_FILES['profile_image']['name'];
        $_FILES['userfile']['type']     =   $_FILES['profile_image']['type'];
        $_FILES['userfile']['tmp_name'] =   $_FILES['profile_image']['tmp_name'];
        $_FILES['userfile']['error']    =   $_FILES['profile_image']['error'];
        $_FILES['userfile']['size']     =   $_FILES['profile_image']['size'];   
        $config['file_name'] = $rand.'user';      
        $config['upload_path'] = base_path().'upload/user_orig/';      
        $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload())
        {
        $error =  $this->upload->display_errors();
        echo "<pre>"; print_r($error);die; 
        }        

        $picture = $this->upload->data();       
        $this->load->library('image_lib');       
        $this->image_lib->clear();       

        $gd_var='gd2';
        $this->image_lib->initialize(array(
          'image_library' => $gd_var,
          'source_image' => base_path().'upload/user_orig/'.$picture['file_name'],
          'new_image' => base_path().'upload/user/'.$picture['file_name'],
          'maintain_ratio' => FALSE,
          'quality' => '100%',
          'width' => 300,
          'height' => 300
        ));


        if(!$this->image_lib->resize())
        {
        $error = $this->image_lib->display_errors();
        }

       echo  $user_image=$picture['file_name'];
       
        if($this->input->post('pre_profile_image')!='')
        {
        if(file_exists(base_path().'upload/user/'.$this->input->post('pre_profile_image')))
        {
        $link=base_path().'upload/user/'.$this->input->post('pre_profile_image');
        unlink($link);
        }

        if(file_exists(base_path().'upload/user_orig/'.$this->input->post('pre_profile_image')))
        {
        $link2=base_path().'upload/user_orig/'.$this->input->post('pre_profile_image');
        unlink($link2);
        }
        }
      }else{
        if($this->input->post('pre_profile_image')!='')
        {
        $user_image=$this->input->post('pre_profile_image');
        }
      }
        //$full_name=trim($this->input->post('full_name'));
        $data = array(
        'email' =>trim($this->input->post('email')),
        'username' =>trim($this->input->post('Username')),     
        'phone' => trim($this->input->post('PhoneNumber')),
        'location' => trim($this->input->post('location')), 
        'age' => trim($this->input->post('age')), 
        'choicecareerassess' => trim($this->input->post('choicecareerassess')),
        'current_stage' => trim($this->input->post('current_stage')),       
        'profile_image'=>$user_image,
        );  
        //echo "<pre>";print_r($data);die;
          $this->db->where('user_id',$this->session->userdata('user_id'));
          $this->db->update('tblusers',$data);
          
    }


  function updateUserPassword(){
    //echo "gfgfd";die;
    $id=$this->session->userdata('user_id'); 

    $data = array('password' => md5($this->input->post('password')));
    $query=$this->db->where(array('user_id'=>$id))->get_where('tblusers');
    if($query->num_rows()>0){
      $this->db->where(array('user_id'=>$id));
      $this->db->update('tblusers',$data);
      $query2 = $this->db->get_where('tblusers',array('user_id'=>$id));
      $row = $query2->row();
      return true;
    }else{
      return false;
    }
  } 
  function getcareerdata(){
    $this->db->select('*');
    $this->db->from('tblcareer_library');
    $this->db->where('Is_deleted','0');
    $query=$this->db->get();
    return $query->result();

  }
  function latest_blog(){
    $this->db->select('*');
    $this->db->from('tblblog');
    $this->db->where('is_deleted','0');
    $this->db->where('IsActive','Active');
    $this->db->order_by('blog_id' ,'DESC');
    $this->db->limit('3'); 
    $query=$this->db->get();
    return $query->result();
  }
 }
 