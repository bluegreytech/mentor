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
			'create_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblcareer_library',$data);		
		return $res;
	}
}