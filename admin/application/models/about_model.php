<?php

class about_model extends CI_Model
 {
	
	function getabout(){
		$this->db->select('*');
		$this->db->from('tblabout');
		$this->db->order_by('about_id','DESC');
		$this->db->limit('1');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function about_insert(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$about_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['about_img']) &&  $_FILES['about_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['about_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['about_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['about_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['about_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['about_img']['size'];
   
			$config['file_name'] = $rand.'aboutimg';			
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
			$about_img=$picture['file_name'];
			if($this->input->post('pre_about_img')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_about_img')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_about_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_about_img')!='')
				{
					$about_img=$this->input->post('pre_about_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'about_title' => trim($this->input->post('about_title')),
			'about_desc' => trim($this->input->post('about_desc')),
			'about_img'=>$about_img		
					
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblabout',$data);		
		return $res;
	}
	function about_update(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$about_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['about_img']) &&  $_FILES['about_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['about_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['about_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['about_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['about_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['about_img']['size'];
   
			$config['file_name'] = $rand.'aboutimg';			
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
			$about_img=$picture['file_name'];
			if($this->input->post('pre_about_img')!='')
				{
					if(file_exists(base_path().'upload/helpimg/'.$this->input->post('pre_about_img')))
					{
						$link=base_path().'upload/helpimg/'.$this->input->post('pre_about_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_about_img')!='')
				{
					$about_img=$this->input->post('pre_about_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'about_title' => trim($this->input->post('about_title')),
			'about_desc' => trim($this->input->post('about_desc')),
			'about_img'=>$about_img		
					
			);
		  // echo "<pre>";print_r($data);die;	
	    $this->db->where('about_id',($this->input->post('about_id')));
		$res=$this->db->update('tblabout',$data);		
		return $res;
	}
	function getcontacts(){
		$this->db->select('*');
		$this->db->from('tblcontact');
		$this->db->order_by('cid','DESC');
		
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function contact_update(){
		  $data = array(					
			'contact_title' => trim($this->input->post('contact_title')),
			'contact_desc' => trim($this->input->post('contact_desc')),
			'IsActive'=>$this->input->post('IsActive')
					
			);
		  // echo "<pre>";print_r($data);die;	
	    $this->db->where('cid',($this->input->post('cid')));
		$res=$this->db->update('tblcontact',$data);		
		return $res;
	}
	function contact_insert(){
		  $data = array(					
			'contact_title' => trim($this->input->post('contact_title')),
			'contact_desc' => trim($this->input->post('contact_desc')),
			'IsActive'=>$this->input->post('IsActive')	
					
			);
		  // echo "<pre>";print_r($data);die;	
	    //$this->db->where('cid',($this->input->post('cid')));
		$res=$this->db->insert('tblcontact',$data);		
		return $res;
	}
	function getcontactbyid($cid){
		$this->db->select('*');
		$this->db->from('tblcontact');
		
		
		$this->db->where('cid',$cid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
	}
	function getpcat(){
		$this->db->select('*');
		$this->db->from('tblpartnercat');
		$this->db->order_by('pcid','DESC');
		
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function getpartnercatactive(){
		$this->db->select('*');
		$this->db->from('tblpartnercat');
		$this->db->order_by('pcid','DESC');
		
		$this->db->where('IsActive','Active');
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function pc_update(){
		$data = array(					
			'cat_title' => trim($this->input->post('cat_title')),
			
			'IsActive'=>$this->input->post('IsActive')
					
			);
		  // echo "<pre>";print_r($data);die;	
	    $this->db->where('pcid',($this->input->post('pcid')));
		$res=$this->db->update('tblpartnercat',$data);		
		return $res;
	}
	function pc_insert(){
	$data = array(					
			'cat_title' => trim($this->input->post('cat_title')),
			
			'IsActive'=>$this->input->post('IsActive')
					
			);
		  // echo "<pre>";print_r($data);die;	

		$res=$this->db->insert('tblpartnercat',$data);		
		return $res;	
	}
	function getpcbyid($id){
         $this->db->select('*');
		$this->db->from('tblpartnercat');
		
		
		$this->db->where('pcid',$id);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
	}
	function getpartner(){
		$this->db->select('p.*,c.cat_title');
		$this->db->from('tblpartner as p');
		 $this->db->join("tblpartnercat as c",'c.pcid=p.cat_id','left');
		$this->db->order_by('p.pid','DESC');
		
		$this->db->where('p.Is_deleted','0');
		
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function partner_insert(){

			$partner_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['partner_img']) &&  $_FILES['partner_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['partner_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['partner_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['partner_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['partner_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['partner_img']['size'];
   
			$config['file_name'] = $rand.'partnerimage';			
			$config['upload_path'] = base_path().'upload/partnerimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$partner_img=$picture['file_name'];
			if($this->input->post('pre_partner_img')!='')
				{
					if(file_exists(base_path().'upload/partnerimage/'.$this->input->post('pre_partner_img')))
					{
						$link=base_path().'upload/partnerimage/'.$this->input->post('pre_partner_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_partner_img')!='')
				{
					$partner_img=$this->input->post('pre_partner_img');
				}
	   		 }

		$data = array(					
			'partner_nm' => trim($this->input->post('partner_nm')),
			'partner_desg' => trim($this->input->post('partner_desg')),
			'partner_desc' => trim($this->input->post('partner_desc')),
			'partner_img' => $partner_img,
			'cat_id' => trim($this->input->post('cat_id')),
			'IsActive'=>$this->input->post('IsActive')
					
			);
		  // echo "<pre>";print_r($data);die;	

		$res=$this->db->insert('tblpartner',$data);		
		return $res;	
	}
	function partner_update(){
			$partner_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['partner_img']) &&  $_FILES['partner_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['partner_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['partner_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['partner_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['partner_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['partner_img']['size'];
   
			$config['file_name'] = $rand.'partnerimage';			
			$config['upload_path'] = base_path().'upload/partnerimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$partner_img=$picture['file_name'];
			if($this->input->post('pre_partner_img')!='')
				{
					if(file_exists(base_path().'upload/partnerimage/'.$this->input->post('pre_partner_img')))
					{
						$link=base_path().'upload/partnerimage/'.$this->input->post('pre_partner_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_partner_img')!='')
				{
					$partner_img=$this->input->post('pre_partner_img');
				}
	   		 }

		$data = array(					
			'partner_nm' => trim($this->input->post('partner_nm')),
			'partner_desg' => trim($this->input->post('partner_desg')),
			'partner_desc' => trim($this->input->post('partner_desc')),
			'partner_img' => $partner_img,
			'cat_id' => trim($this->input->post('cat_id')),
			'IsActive'=>$this->input->post('IsActive')
					
			);
		  // echo "<pre>";print_r($data);die;	
	    $this->db->where('pid',($this->input->post('pid')));
		$res=$this->db->update('tblpartner',$data);		
		return $res;
	}
	function getpartnerbyid($pid){
      $this->db->select('*');
		$this->db->from('tblpartner');
		
		
		
		$this->db->where('pid',$pid);
		
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
	}
}