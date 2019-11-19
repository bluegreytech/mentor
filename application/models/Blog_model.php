<?php

class Blog_model extends CI_Model
 {

	function getblog(){
		$r=$this->db->select('t1.*,t2.*')
			->from('tblblogs as t1')
			->join('tblblogstatus as t2','t1.BlogStatusId = t2.BlogStatusId', 'LEFT')
			->where('BlogStatus','Most Popular')
			->order_by("t1.BlogId", "DESC")
			->limit('3')
			->get();
			$res = $r->result();
		    return $res;
	}

	
	function getdata($id){
		$this->db->select("*");
		$this->db->from("tblblogs");
		$this->db->where("BlogId",$id);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	
	


		

}
