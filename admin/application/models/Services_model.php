<?php

class Services_model extends CI_Model
 {
	
	function getservices(){
		$this->db->select('*');
		$this->db->from('tblservices');
		$this->db->where('is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function services_insert(){
		//echo "<pre>";print_r($_POST);die;
		
         	$services_image='';
         	//$image_settings=image_setting();
		if(isset($_FILES['servicesimage']) &&  $_FILES['servicesimage']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['servicesimage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['servicesimage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['servicesimage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['servicesimage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['servicesimage']['size'];
   
			$config['file_name'] = $rand.'servicesimage';			
			$config['upload_path'] = base_path().'upload/servicesimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$services_image=$picture['file_name'];
			if($this->input->post('pre_services_image')!='')
				{
					if(file_exists(base_path().'upload/servicesimage/'.$this->input->post('pre_services_image')))
					{
						$link=base_path().'upload/servicesimage/'.$this->input->post('pre_services_image');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_services_image')!='')
				{
					$services_image=$this->input->post('pre_services_image');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'services_title' => trim($this->input->post('servicestitle')),
			'servicespage' => trim($this->input->post('servicespage')),			
			'services_sdesc' => trim($this->input->post('services_sdesc')),
			'services_ldesc' => trim($this->input->post('servicesldesc')),
			'services_image'=>$services_image,					
			'created_date'=>date('Y-m-d H:i:s')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblservices',$data);		
		return $res;
	}
	function services_update(){
        $services_image='';         	
		if(isset($_FILES['servicesimage']) &&  $_FILES['servicesimage']['name']!='')
        {
            $this->load->library('upload');
            $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['servicesimage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['servicesimage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['servicesimage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['servicesimage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['servicesimage']['size'];
   
			$config['file_name'] = $rand.'servicesimage';			
			$config['upload_path'] = base_path().'upload/servicesimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config); 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();			
			$services_image=$picture['file_name'];
			if($this->input->post('pre_services_image')!='')
				{
					if(file_exists(base_path().'upload/servicesimage/'.$this->input->post('pre_services_image')))
					{
						$link=base_path().'upload/servicesimage/'.$this->input->post('pre_services_image');
						unlink($link);
					}
				}
			}else{
				if($this->input->post('pre_services_image')!='')
				{
					$services_image=$this->input->post('pre_services_image');
				}
	    	} 
		
			//project logo upload end //
           $data = array(					
			'services_title' => trim($this->input->post('servicestitle')),
			'servicespage' => trim($this->input->post('servicespage')),			
			'services_sdesc' => trim($this->input->post('services_sdesc')),
			'services_ldesc' => trim($this->input->post('servicesldesc')),
			'services_image'=>$services_image,	
			);
			// echo "<pre>";print_r($data);die;
		    $this->db->where("services_id",$this->input->post('servicesid'));
			$res=$this->db->update('tblservices',$data);		
			return $res;
	}

	function getservicesdata($id){
		$this->db->select("*");
		$this->db->from("tblservices");
		$this->db->where("services_id",$id);
		$query=$this->db->get();
		return $query->row_array();
	}
	function gettestimonial(){
		$this->db->select('*');
			$this->db->from('tbltestimonial');	
			$this->db->where("is_deleted",'0');		
			$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function gettestimonialdata($id){
		$this->db->select("*");
		$this->db->from("tbltestimonial");
		$this->db->where("testimonial_id",$id);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	
    function testimonial_insert(){
		//echo "<pre>";print_r($_POST);die;
		
         	$testimonial_image='';
         	//$image_settings=image_setting();
		if(isset($_FILES['testimonialimage']) &&  $_FILES['testimonialimage']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['testimonialimage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['testimonialimage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['testimonialimage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['testimonialimage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['testimonialimage']['size'];
   
			$config['file_name'] = $rand.'testimonialimage';			
			$config['upload_path'] = base_path().'upload/testimonialimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$testimonial_image=$picture['file_name'];
			if($this->input->post('pre_testimonial_image')!='')
				{
					if(file_exists(base_path().'upload/testimonialimage/'.$this->input->post('pre_testimonial_image')))
					{
						$link=base_path().'upload/testimonialimage/'.$this->input->post('pre_testimonial_image');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_testimonial_image')!='')
				{
					$testimonial_image=$this->input->post('pre_testimonial_image');
				}
	    }
   
		
			//project logo upload end //

            $data = array(					
			'testimonial_title' => trim($this->input->post('testimonialtitle')),
			'testimonial_desc' => trim($this->input->post('testimonialdesc')),
			'testimonial_image'=>$testimonial_image,		
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d  H:i:s')		
			);
		  // echo "<pre>";print_r($data);die;	
          
	    
		$res=$this->db->insert('tbltestimonial',$data);		
		return $res;
	}
	function testimonial_update(){
        $testimonial_image='';         	
		if(isset($_FILES['testimonialimage']) &&  $_FILES['testimonialimage']['name']!='')
        {
            $this->load->library('upload');
            $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['testimonialimage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['testimonialimage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['testimonialimage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['testimonialimage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['testimonialimage']['size'];
   
			$config['file_name'] = $rand.'testimonialimage';			
			$config['upload_path'] = base_path().'upload/testimonialimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config); 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();			
			$testimonial_image=$picture['file_name'];
			if($this->input->post('pre_testimonial_image')!='')
				{
					if(file_exists(base_path().'upload/testimonialimage/'.$this->input->post('pre_testimonial_image')))
					{
						$link=base_path().'upload/testimonialimage/'.$this->input->post('pre_testimonial_image');
						unlink($link);
					}
				}
			}else{
				if($this->input->post('pre_testimonial_image')!='')
				{
					$testimonial_image=$this->input->post('pre_testimonial_image');
				}
	    	} 
		
			//project logo upload end //
            $data = array(					
			'testimonial_title' => trim($this->input->post('testimonialtitle')),
			'testimonial_desc' => trim($this->input->post('testimonialdesc')),
			'testimonial_image'=>$testimonial_image,		
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d  H:i:s')		
			);
			// echo "<pre>";print_r($data);die;
		    $this->db->where("testimonial_id",$this->input->post('testimonialid'));
			$res=$this->db->update('tbltestimonial',$data);		
			return $res;
	}

	

		

}
