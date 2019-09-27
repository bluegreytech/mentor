<?php

class Price_model extends CI_Model
 {
	
	function getprice(){
		$this->db->select('*');
		$this->db->from('tblprice');
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function price_insert(){
         	
			//project logo upload end //

            $data = array(					
			'price_title' => trim($this->input->post('pricetitle')),
			'price_amt' => trim($this->input->post('price_amt')),			
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblprice',$data);		
		return $res;
	}
	function price_update(){
       
			//project logo upload end //
            $data = array(					
			'price_title' => trim($this->input->post('pricetitle')),
			'price_amt' => trim($this->input->post('price_amt')),			
			'IsActive' => $this->input->post('IsActive'),			
			'update_date'=>date('Y-m-d')		
			);
			// echo "<pre>";print_r($data);die;
		    $this->db->where("price_id",$this->input->post('priceid'));
			$res=$this->db->update('tblprice',$data);		
			return $res;
	}

	function getpricedata($id){
		$this->db->select("*");
		$this->db->from("tblprice");
		$this->db->where("price_id",$id);
		$query=$this->db->get();
		return $query->row_array();
	}
	

	function getplan(){
		$this->db->select('*');
		$this->db->from('tblpriceplaning');
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

	}
	function plan_insert(){        	
			
        $data = array(		
        	'price_id' => trim($this->input->post('priceid')),			
			'plan_title' => trim($this->input->post('plantitle')),
			'plan_desc' => trim($this->input->post('plan_desc')),			
			'priceplan_status' => $this->input->post('priceplan_status'),			
			'created_date'=>date('Y-m-d')		
		); 
		$res=$this->db->insert('tblpriceplaning',$data);		
		return $res;
	}
	function plan_update(){
       
			//project logo upload end //
            $data = array(		
	        	'price_id' => trim($this->input->post('priceid')),			
				'plan_title' => trim($this->input->post('plantitle')),
				'plan_desc' => trim($this->input->post('plan_desc')),			
				'priceplan_status' => $this->input->post('priceplan_status'),			
				'Updated_date'=>date('Y-m-d')		
			); 
			// echo "<pre>";print_r($data);die;
		    $this->db->where("priceplan_id",$this->input->post('planid'));
			$res=$this->db->update('tblpriceplaning',$data);		
			return $res;
	}

	function getplandata($id){
		$this->db->select("*");
		$this->db->from("tblpriceplaning");
		$this->db->where("priceplan_id",$id);
		$query=$this->db->get();
		return $query->row_array();
	}

}
