<?php

class Dashboard_model extends CI_Model
 {
	function insertdata()
	{		
			$FullName=$this->input->post('FullName');
			$EmailAddress=$this->input->post('EmailAddress');
			$Addresses=$this->input->post('Addresses');
			$ProfileImage=$this->input->post('ProfileImage');
			$AdminContact=$this->input->post('AdminContact');
			$IsActive=$this->input->post('IsActive');
			$data=array( 
			'FullName'=>$FullName,
			'EmailAddress'=>$EmailAddress,
			'Addresses'=>$Addresses, 
			'ProfileImage'=>$ProfileImage,
			'AdminContact'=>$AdminContact, 
			'IsActive'=>$IsActive,
			'CreatedOn'=>date('Y-m-d')
			);
			$res=$this->db->insert('tbluser',$data);	
			return $res;
	}

	function getuser(){
		$r=$this->db->select('*')
					->from('tbluser')
					->get();
		$res = $r->result();
		return $res;
	}

	function getdata($id){
		$query=$this->db->select('t1.UserId,t1.RoleId,t1.StreamId,t1.FirstName,t1.LastName,t1.EmailAddress,t1.DateofBirth,t1.PhoneNumber,t1.Address,t1.ProfileImage,t1.Gender,t1.City,t1.IsActive,t2.EducationId,t2.EducationName,t2.UnivesityName,t2.BoardName,t2.ClassStream,t2.Course,t2.YearofGraduation,t3.UserFamilyId,t3.FatherName,t3.FatherProfession,t3.MotherName,t3.MotherProfession')
			->from('tbluser as t1')
			->join('tblgraduation as t2', 't1.UserId = t2.UserId', 'LEFT')
			->join('tbluserfamilydetail as t3', 't1.UserId = t3.UserId', 'LEFT')
			->where('t1.UserId',$id)
			->get();
			return $query->row_array();
	}

	function updatedata(){
		$id=$this->input->post('UserId');
		$data=array(
			'UserId'=>$this->input->post('UserId'),
			'FullName'=>$this->input->post('FullName'),
			'EmailAddress'=>$this->input->post('EmailAddress'),
			'Addresses'=>$this->input->post('Addresses'),
			'ProfileImage'=>$this->input->post('ProfileImage'),
			'AdminContact'=>$this->input->post('AdminContact'),
			'IsActive'=>$this->input->post('IsActive'),
			  );
	    $this->db->where("UserId",$id);
		$this->db->update('tbluser',$data);		
		return 1;
	}

}
