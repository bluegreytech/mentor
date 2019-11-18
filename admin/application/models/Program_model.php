<?php

class Program_model extends CI_Model
 {
   function getcategory(){
   	$this->db->select('*');
		$this->db->from('tblprocategory');
		$this->db->where('Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
   }
   function cat_insert(){
   	  $data = array(					
			'cat_title' => $this->input->post('cat_title'),
			
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblprocategory',$data);		
		return $res;
   }
   function cat_update(){
   	  $data = array(					
			'cat_title' => $this->input->post('cat_title'),
			
			'IsActive' => $this->input->post('IsActive')		
				
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$this->db->where("cat_id",$this->input->post('cat_id'));
			$res=$this->db->update('tblprocategory',$data);		
			return $res;
   }
   function getcategorybyid($cid){
        $this->db->select('*');
		$this->db->from('tblprocategory');
		$this->db->where('cat_id',$cid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
   }
   function getsubcategory(){
   	$this->db->select('s.*,c.cat_title,c.cat_id');
		$this->db->from('tblprosubcategory as s');
		 $this->db->join("tblprocategory as c",'c.cat_id=s.cat_id','left');
		$this->db->where('s.Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
   }
   function getactivecategory(){
   	$this->db->select('*');
		$this->db->from('tblprocategory');
		$this->db->where('Is_deleted','0');
		$this->db->where('IsActive','Active');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
   }
   function subcat_insert(){
   	 $data = array(					
			'subcat_title' => $this->input->post('subcat_title'),
			'cat_id' => $this->input->post('cat_id'),
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	    
		$res=$this->db->insert('tblprosubcategory',$data);		
		return $res;
   }

   function subcat_update(){
   	 $data = array(					
			'subcat_title' => $this->input->post('subcat_title'),
			'cat_id' => $this->input->post('cat_id'),
			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	      
		$this->db->where("subcat_id",$this->input->post('subcat_id'));
		$res=$this->db->update('tblprosubcategory',$data);		
		return $res;
   }

   function getsubcategorybyid($subcat_id){
   	 $this->db->select('*');
		$this->db->from('tblprosubcategory');
		$this->db->where('subcat_id',$subcat_id);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
   }
   function getprogramme(){
   	$this->db->select('p.*,c.cat_title,c.cat_id,s.subcat_title,s.subcat_id');
		$this->db->from('tblprogram as p');
		 $this->db->join("tblprocategory as c",'p.cat_id=c.cat_id','left');
		  $this->db->join("tblprosubcategory as s",'s.subcat_id=p.subcat_id','left');
		$this->db->where('p.Is_deleted','0');
		$r=$this->db->get();
		$res = $r->result();
		return $res;

   }
   function program_update(){
   	if(!empty($_POST['subcat_id'])){

			$subcat_id=$this->input->post('subcat_id');
		}else{
			$subcat_id='';
		}
   	$data = array(					
			'program_title' => $this->input->post('program_title'),
			'cat_id' => $this->input->post('cat_id'),
			
			'subcat_id' => $subcat_id,
			'short_desc' => $this->input->post('short_desc'),
			'short_title' => $this->input->post('short_title'),
			
			'IsActive' => $this->input->post('IsActive')			
					
			);
		  // echo "<pre>";print_r($data);die;	
	      
		$this->db->where("pid",$this->input->post('pid'));
		$res=$this->db->update('tblprogram',$data);		
		return $res;
   }
    function program_insert(){

    	if(!empty($_POST['subcat_id'])){

			$subcat_id=$this->input->post('subcat_id');
		}else{
			$subcat_id='';
		}
   	$data = array(					
			'program_title' => $this->input->post('program_title'),
			'cat_id' => $this->input->post('cat_id'),
			
			'subcat_id' => $subcat_id,
			'short_desc' => $this->input->post('short_desc'),
			'short_title' => $this->input->post('short_title'),

			'IsActive' => $this->input->post('IsActive'),			
			'created_date'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
	      
		
		$res=$this->db->insert('tblprogram',$data);		
		return $res;
   }
   function getactivesubcategory(){
   		$this->db->select('*');
		$this->db->from('tblprosubcategory');
		$this->db->where('Is_deleted','0');
		$this->db->where('IsActive','Active');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
   }
   function getsubcatbyid($cid){
   	$this->db->select('*');
		$this->db->from('tblprosubcategory');
		$this->db->where('Is_deleted','0');
		$this->db->where('IsActive','Active');
		$this->db->where('cat_id',$cid);
		$r=$this->db->get();
		$res = $r->result();
		return $res;
   }
   function getprobyid($pid){
$this->db->select('p.*,c.cat_title,c.cat_id,s.subcat_title,s.subcat_id');
		$this->db->from('tblprogram as p');
		 $this->db->join("tblprocategory as c",'p.cat_id=c.cat_id','left');
		  $this->db->join("tblprosubcategory as s",'s.subcat_id=p.subcat_id','left');
		$this->db->where('p.Is_deleted','0');
		$this->db->where('p.pid',$pid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
   }
   function getfaq(){
   	$this->db->select('*');
		$this->db->from('tblfaq');
		$this->db->where('Is_deleted','0');
		//$this->db->where('Isactive','Active');
		$r=$this->db->get();
		$res = $r->result();
		return $res;
   }
   function faq_insert(){

   	$data = array(					
			'faq_title' => $this->input->post('faq_title'),
			'faq_desc' => $this->input->post('faq_desc'),
			'Isactive' => $this->input->post('Isactive'),			
			'created_date'=>date('Y-m-d')		
			);
		  
	      
		
		$res=$this->db->insert('tblfaq',$data);		
		return $res;
   }
   function faq_update(){
   	$data = array(					
			'faq_title' => $this->input->post('faq_title'),
			'faq_desc' => $this->input->post('faq_desc'),
			'Isactive' => $this->input->post('Isactive'),			
			'created_date'=>date('Y-m-d')		
			);
		  
	      
		$this->db->where("faq_id",$this->input->post('faq_id'));
		$res=$this->db->update('tblfaq',$data);		
		return $res;
   }
   function getfaqbyid($pid){
   	$this->db->select('*');
		$this->db->from('tblfaq');
		
		$this->db->where('faq_id',$pid);
		$r=$this->db->get();
		$res = $r->row_array();
		return $res;
   }
 }