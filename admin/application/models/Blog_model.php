<?php

class Blog_model extends CI_Model
 {
	
	function getblog(){
		$this->db->select('*');
		$this->db->from('tblblog');
		$this->db->where('is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function blog_insert(){
		//echo "<pre>";print_r($_FILES);die;
		
         	$blog_image='';
         	//$image_settings=image_setting();
		if(isset($_FILES['blogimage']) &&  $_FILES['blogimage']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['blogimage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['blogimage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['blogimage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['blogimage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['blogimage']['size'];
   
			$config['file_name'] = $rand.'blogimage';			
			$config['upload_path'] = base_path().'upload/blogimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
				$picture = $this->upload->data();	
              $this->load->library('image_lib');		   
              $this->image_lib->clear();
			  $gd_var='gd2';

              $this->image_lib->initialize(array(
				'image_library' => $gd_var,
				'source_image' => base_path().'upload/blogimage_orig/'.$picture['file_name'],
				'new_image' => base_path().'upload/blogimage_orig/'.$picture['file_name'],
				'maintain_ratio' => FALSE,
				'quality' => '100%',
				'width' => 300,
				'height' => 300
			 ));
			if(!$this->image_lib->resize())
			{
				$error = $this->image_lib->display_errors();
				echo "<pre>";print_r($error);die;	
			}
			
				
			$blog_image=$picture['file_name'];
			if($this->input->post('pre_blog_image')!='')
				{
					if(file_exists(base_path().'upload/blogimage/'.$this->input->post('pre_blog_image')))
					{
						$link=base_path().'upload/blogimage/'.$this->input->post('pre_blog_image');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_blog_image')!='')
				{
					$blog_image=$this->input->post('pre_blog_image');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'blog_title' => trim($this->input->post('blogtitle')),
			'blog_desc' => trim($this->input->post('blogdesc')),
			'blog_image'=>$blog_image,		
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d  H:i:s')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblblog',$data);		
		return $res;
	}
	function blog_update(){
        $blog_image='';         	
		if(isset($_FILES['blogimage']) &&  $_FILES['blogimage']['name']!='')
        {
            $this->load->library('upload');
            $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['blogimage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['blogimage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['blogimage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['blogimage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['blogimage']['size'];
   
			$config['file_name'] = $rand.'blogimage';			
			$config['upload_path'] = base_path().'upload/blogimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config); 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				
			  } 
				$picture = $this->upload->data();
              $this->load->library('image_lib');		   
              $this->image_lib->clear();
			  $gd_var='gd2';

              $this->image_lib->initialize(array(
				'image_library' => $gd_var,
				'source_image' => base_path().'upload/blogimage_orig/'.$picture['file_name'],
				'new_image' => base_path().'upload/blogimage_orig/'.$picture['file_name'],
				'maintain_ratio' => FALSE,
				'quality' => '100%',
				'width' => 300,
				'height' => 300
			 ));
			if(!$this->image_lib->resize())
			{
				$error = $this->image_lib->display_errors();
				//echo "<pre>";print_r($error);die;	
			}
				//echo "<pre>";print_r($picture['file_name']);die;	
			$blog_image=$picture['file_name'];
			if($this->input->post('pre_blog_image')!='')
				{
					if(file_exists(base_path().'upload/blogimage/'.$this->input->post('pre_blog_image')))
					{
						$link=base_path().'upload/blogimage/'.$this->input->post('pre_blog_image');
						unlink($link);
					}
				}
			}else{
				if($this->input->post('pre_blog_image')!='')
				{
					$blog_image=$this->input->post('pre_blog_image');
				}
	    	} 
		
			//project logo upload end //
            $data = array(					
			'blog_title' => trim($this->input->post('blogtitle')),
			'blog_desc' => trim($this->input->post('blogdesc')),
			'blog_image'=>$blog_image,		
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d H:i:s')		
			);
			// echo "<pre>";print_r($data);die;
		    $this->db->where("blog_id",$this->input->post('blogid'));
			$res=$this->db->update('tblblog',$data);		
			return $res;
	}

	function getblogdata($id){
		$this->db->select("*");
		$this->db->from("tblblog");
		$this->db->where("blog_id",$id);
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
