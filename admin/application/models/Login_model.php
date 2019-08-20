<?php

class Login_model extends CI_Model
 {
		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}

		 function check_login()
    {
       //echo "vfcgcv";die;
         //$this->load->helper('cookie');
        
    $EmailAddress = trim($this->input->post('EmailAddress'));
    $password = $this->input->post('Password');
            
    $query = $this->db->get_where('tbladmin',array('EmailAddress'=>$EmailAddress,'password'=>md5($password)));
    // echo $this->db->last_query();
    // die;
                //,'status'=>'Active'
    $admin = $query->row_array();
   // echo "<pre>";print_r($admin);die;
    if($query->num_rows()>0)
    {
         $admin_type=$admin['Admin_Type'];
        $admin_status=$admin['IsActive'];
        
        if($admin_status !='Active')
        {
           return "3"; 
        }
                        
                        
      if($admin_type == 1)
      {
          $admin_id = $admin['AdminId'];
      
        //$admin = $query->row_array();
        //$admin_id = $admin['admin_id'];
        $data = array(
           'AdminId' => $admin_id,
            'FullName' => $admin['FullName'],
            'admin_type'=>$admin_type,

            );  
        // echo "<pre>";print_r($data);die;
        $this->session->set_userdata($data);
       
        return "1";
      
      }
      elseif($query->num_rows() > 0)
      {
        //$admin_type=$admin['admin_type'];
      if($admin_type == 2)
      {
        $admin_id   = $admin['AdminId'];
        //$admin_role = $admin['admin_role'];
        //$site_id    = $admin['site_id'];
        $data = array(
              'AdminId' => $admin_id,
              'FullName' => $admin['FullName'],
              'admin_type'=>$admin_type,         
            );  
          
        $this->session->set_userdata($data);

        /*$data1=array(
            'admin_id'=>$admin_id,
            'login_date'=> date('Y-m-d H:i:s'),
            'login_ip'=>$_SERVER['REMOTE_ADDR']
            ); 
        $this->db->insert('admin_login',$data1);*/
        return "2";
      }
      }
    }
    else
    {
      return "0";
    }
    }

}
