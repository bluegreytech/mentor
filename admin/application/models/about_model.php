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
}