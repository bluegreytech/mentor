<?php

class Story_model extends CI_Model
 {
	
	function getstory(){
		$this->db->select('*');
		$this->db->from('tblstory');
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function getstorydata($stid){
$this->db->select('*');
		$this->db->from('tblstory');
		$this->db->where('story_id',$stid);
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
	function story_insert(){
		$story_img='';
         	//$image_settings=image_setting();
		if(isset($_FILES['story_img']) &&  $_FILES['story_img']['name']!='')
        {
             $this->load->library('upload');
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['story_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['story_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['story_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['story_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['story_img']['size'];
   
			$config['file_name'] = $rand.'storyimage';			
			$config['upload_path'] = base_path().'upload/storyimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();	
			//echo "<pre>";print_r($picture);die;		
			$story_img=$picture['file_name'];
			if($this->input->post('pre_story_img')!='')
				{
					if(file_exists(base_path().'upload/storyimage/'.$this->input->post('pre_story_img')))
					{
						$link=base_path().'upload/storyimage/'.$this->input->post('pre_story_img');
						unlink($link);
					}
				}
			} else {
				if($this->input->post('pre_story_img')!='')
				{
					$story_img=$this->input->post('pre_story_img');
				}
	   		 }
		
			//project logo upload end //

            $data = array(					
			'story_title' => trim($this->input->post('story_title')),
			'story_desc' => trim($this->input->post('story_desc')),
			'story_long_desc' => trim($this->input->post('story_long_desc')),
			'problem_desc' => trim($this->input->post('problem_desc')),
			'solution_desc' => trim($this->input->post('solution_desc')),
			'outcome_desc' => trim($this->input->post('outcome_desc')),
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblstory',$data);		
		return $res;
	}
	function story_update(){
		$story_img='';         	
		if(isset($_FILES['story_img']) &&  $_FILES['story_img']['name']!='')
        {
            $this->load->library('upload');
            $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['story_img']['name'];
			$_FILES['userfile']['type']     =   $_FILES['story_img']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['story_img']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['story_img']['error'];
			$_FILES['userfile']['size']     =   $_FILES['story_img']['size'];
   
			$config['file_name'] = $rand.'storyimage';			
			$config['upload_path'] = base_path().'upload/storyimage/';		
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
             $this->upload->initialize($config); 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				echo "<pre>";print_r($error);
			  } 
			$picture = $this->upload->data();			
			$story_img=$picture['file_name'];
			if($this->input->post('pre_story_img')!='')
				{
					if(file_exists(base_path().'upload/storyimage/'.$this->input->post('pre_story_img')))
					{
						$link=base_path().'upload/storyimage/'.$this->input->post('pre_story_img');
						unlink($link);
					}
				}
			}else{
				if($this->input->post('pre_story_img')!='')
				{
					$story_img=$this->input->post('pre_story_img');
				}
	    	} 
		
			//project logo upload end //
            $data = array(					
			'story_title' => trim($this->input->post('story_title')),
			'story_desc' => trim($this->input->post('story_desc')),
			'story_long_desc' => trim($this->input->post('story_long_desc')),
			'problem_desc' => trim($this->input->post('problem_desc')),
			'solution_desc' => trim($this->input->post('solution_desc')),
			'outcome_desc' => trim($this->input->post('outcome_desc')),
			'story_img'=>$story_img,		
			'IsActive' => $this->input->post('IsActive'),			
					
			);
			// echo "<pre>";print_r($data);die;
		    $this->db->where("story_id",$this->input->post('story_id'));
			$res=$this->db->update('tblstory',$data);		
			return $res;
	}
}