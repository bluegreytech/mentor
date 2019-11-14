<?php

class Library_model extends CI_Model
 {
	
	function getlibrary(){
		$this->db->select('*');
		$this->db->from('tblcareer_library');
		$this->db->where('is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function data_insert(){
		 $data = array(					
			'video_url' => $this->input->post('video_url'),
			'video_title' => $this->input->post('video_title'),
			'video_desc' => $this->input->post('video_desc'),
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblcareer_library',$data);		
		return $res;
	}
	function data_update(){
		 $data = array(					
			'video_url' => $this->input->post('video_url'),
			'video_title' => $this->input->post('video_title'),
			'video_desc' => $this->input->post('video_desc')
			
			);
		  // echo "<pre>";print_r($data);die;	
	    
		 $this->db->where("id",$this->input->post('id'));
			$res=$this->db->update('tblcareer_library',$data);		
			return $res;
	}
	function getlibdata($id){
$this->db->select('*');
		$this->db->from('tblcareer_library');
		$this->db->where('id',$id);
		$r=$this->db->get();
		$res = $r->result();
		return $res;
	}
}