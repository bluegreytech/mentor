<?php

class help_model extends CI_Model
 {
	
	function getlist(){
		$this->db->select('h.*,p.program_title,p.pid');
		$this->db->from('tblhelp as h');
	    $this->db->join("tblprogram as p",'p.pid=h.pid','left');
		$this->db->where('h.Is_deleted','0');
		$this->db->order_by('h.help_id','DESC');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function getkey(){
		$this->db->select('k.*,p.program_title,p.pid');
		$this->db->from('tblkey as k');
		 $this->db->join("tblprogram as p",'p.pid=k.pid','left');
		$this->db->where('k.Is_deleted','0');
		$this->db->order_by('k.key_id','DESC');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function getlearn(){
		$this->db->select('l.*,p.program_title,p.pid');
		$this->db->from('tbllearn as l');
		 $this->db->join("tblprogram as p",'p.pid=l.pid','left');
		$this->db->where('l.Is_deleted','0');
		$this->db->order_by('l.lid','DESC');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function help_insert(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$help_image='';
         	//$image_settings=image_setting();
		if(isset($_FILES['help_image']) &&  $_FILES['help_image']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['help_image']['name'];
			$_FILES['userfile']['type']     =   $_FILES['help_image']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['help_image']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['help_image']['error'];
			$_FILES['userfile']['size']     =   $_FILES['help_image']['size'];
   
			$config['file_name'] = $rand.'helpimage';			
			$config['upload_path'] = base_path().'upload/helpimg/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$help_image=$picture['file_name'];
			if($this->input->post('pre_help_image')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_help_image')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_help_image');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_help_image')!='')
				{
					$help_image=$this->input->post('pre_help_image');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'help_title' => trim($this->input->post('help_title')),
			'help_subtitle' => trim($this->input->post('help_subtitle')),
			'pid' => $this->input->post('pid'),
			'help_image'=>$help_image,	
			'help_desc' => trim($this->input->post('help_desc')),	
			'IsActive' => $this->input->post('IsActive'),			
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblhelp',$data);		
		return $res;
	}
	function help_update(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$help_image='';
         	//$image_settings=image_setting();
		if(isset($_FILES['help_image']) &&  $_FILES['help_image']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['help_image']['name'];
			$_FILES['userfile']['type']     =   $_FILES['help_image']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['help_image']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['help_image']['error'];
			$_FILES['userfile']['size']     =   $_FILES['help_image']['size'];
   
			$config['file_name'] = $rand.'helpimage';			
			$config['upload_path'] = base_path().'upload/helpimg/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$help_image=$picture['file_name'];
			if($this->input->post('pre_help_image')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_help_image')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_help_image');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_help_image')!='')
				{
					$help_image=$this->input->post('pre_help_image');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'help_title' => trim($this->input->post('help_title')),
			'help_subtitle' => trim($this->input->post('help_subtitle')),
			'pid' => $this->input->post('pid'),
			'help_image'=>$help_image,	
			'help_desc' => trim($this->input->post('help_desc')),	
			'IsActive' => $this->input->post('IsActive')			
					
			);
		  // echo "<pre>";print_r($data);die;	
	     $this->db->where("help_id",$this->input->post('help_id'));
		$res=$this->db->update('tblhelp',$data);		
		return $res;
	}

	function key_insert(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$key_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['key_img']) &&  $_FILES['key_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['key_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['key_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['key_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['key_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['key_img']['size'];
   
			$config['file_name'] = $rand.'keyimage';			
			$config['upload_path'] = base_path().'upload/helpimg/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$key_img=$picture['file_name'];
			if($this->input->post('pre_key_img')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_key_img')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_key_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_key_img')!='')
				{
					$key_img=$this->input->post('pre_key_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'key_title' => trim($this->input->post('key_title')),
			'key_desc' => trim($this->input->post('key_desc')),
			'pid' => $this->input->post('pid'),
			'key_img'=>$key_img,	
			
			'IsActive' => $this->input->post('IsActive'),			
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblkey',$data);		
		return $res;
	}
	function key_update(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$key_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['key_img']) &&  $_FILES['key_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['key_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['key_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['key_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['key_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['key_img']['size'];
   
			$config['file_name'] = $rand.'keyimage';			
			$config['upload_path'] = base_path().'upload/helpimg/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$key_img=$picture['file_name'];
			if($this->input->post('pre_key_img')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_key_img')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_key_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_key_img')!='')
				{
					$key_img=$this->input->post('pre_key_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'key_title' => trim($this->input->post('key_title')),
			'key_desc' => trim($this->input->post('key_desc')),
			'pid' => $this->input->post('pid'),
			'key_img'=>$key_img,	
			
			'IsActive' => $this->input->post('IsActive'),			
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	      $this->db->where("key_id",$this->input->post('key_id'));
		$res=$this->db->update('tblkey',$data);		
		return $res;
	}
	function learn_update(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$learn_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['learn_img']) &&  $_FILES['learn_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['learn_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['learn_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['learn_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['learn_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['learn_img']['size'];
   
			$config['file_name'] = $rand.'learnimg';			
			$config['upload_path'] = base_path().'upload/helpimg/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$learn_img=$picture['file_name'];
			if($this->input->post('pre_learn_img')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_learn_img')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_learn_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_learn_img')!='')
				{
					$learn_img=$this->input->post('pre_learn_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'learn_title' => trim($this->input->post('learn_title')),
			'learn_desc' => trim($this->input->post('learn_desc')),
			'pid' => $this->input->post('pid'),
			'learn_img'=>$learn_img,	
			
			'IsActive' => $this->input->post('IsActive'),			
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	      $this->db->where("lid",$this->input->post('lid'));
		$res=$this->db->update('tbllearn',$data);		
		return $res;
	}
	function learn_insert(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$learn_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['learn_img']) &&  $_FILES['learn_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['learn_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['learn_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['learn_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['learn_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['learn_img']['size'];
   
			$config['file_name'] = $rand.'learnimg';			
			$config['upload_path'] = base_path().'upload/helpimg/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$learn_img=$picture['file_name'];
			if($this->input->post('pre_learn_img')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_learn_img')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_learn_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_learn_img')!='')
				{
					$learn_img=$this->input->post('pre_learn_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'learn_title' => trim($this->input->post('learn_title')),
			'learn_desc' => trim($this->input->post('learn_desc')),
			'pid' => $this->input->post('pid'),
			'learn_img'=>$learn_img,	
			
			'IsActive' => $this->input->post('IsActive'),			
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	     
		$res=$this->db->insert('tbllearn',$data);		
		return $res;
	}
	function getpro(){
		$this->db->select('*');
		$this->db->from('tblprogram');
		$this->db->where('Is_deleted','0');
		$this->db->where('IsActive','Active');
		$this->db->where('cat_id','1');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function getprocat(){
		$this->db->select('*');
		$this->db->from('tblprogram');
		$this->db->where('Is_deleted','0');
		$this->db->where('IsActive','Active');
		$this->db->where('cat_id','5');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function gethelpdatabyid($pid){
       $this->db->select('*');
		$this->db->from('tblhelp');
		$this->db->where('help_id',$pid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
	}
	function getkeydatabyid($pid){
		 $this->db->select('*');
		$this->db->from('tblkey');
		$this->db->where('key_id',$pid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
	}
	function getlearndatabyid($pid){
		 $this->db->select('*');
		$this->db->from('tbllearn');
		$this->db->where('lid',$pid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
	}
}