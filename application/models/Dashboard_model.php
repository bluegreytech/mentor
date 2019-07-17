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

	// function getdata($id){
	// 	$this->db->select('t1.UserId,t1.RoleId,t1.StreamTypeId,t1.FirstName,t1.LastName,t1.EmailAddress,t1.DateofBirth,t1.PhoneNumber,t1.Address,t1.ProfileImage,t1.Gender,t1.City,t1.IsActive,t2.EducationId,t2.EducationName,t2.UnivesityName,t2.BoardName,t2.ClassStream,t2.Course,t2.YearofGraduation,t3.UserFamilyId,t3.FatherName,t3.FatherProfession,t3.MotherName,t3.MotherProfession,t4.EducationSubjectId,t4.EducationSubjectName,t4.SubjectCgpa,t4.MarksheetImage,t5.GraduateScoreId,t5.ClassX,t5.ClassXII,t5.College,t6.StreamName');
	// 		$this->db->from('tbluser as t1');
	// 		$this->db->join('tblgraduation as t2', 't1.UserId = t2.UserId', 'LEFT');
	// 		$this->db->join('tbluserfamilydetail as t3', 't1.UserId = t3.UserId', 'LEFT');
	// 		$this->db->join('tblgraduationsubject as t4', 't1.UserId = t4.UserId', 'LEFT');
	// 		$this->db->join('tblgraduatescore as t5', 't1.UserId = t5.UserId', 'LEFT');
	// 		$this->db->join('tblstreamtype as t6', 't1.StreamTypeId = t6.StreamTypeId', 'LEFT');
	// 		$this->db->where('t1.UserId',$id);
	// 		$query=$this->db->get();
	// 		return $query->row_array();
	// }

	function getdata($id){
		$query=$this->db->select('t1.UserId,t1.RoleId,t1.StreamTypeId,t1.FirstName,t1.LastName,t1.EmailAddress,t1.DateofBirth,t1.PhoneNumber,t1.Address,t1.ProfileImage,t1.Gender,t1.City,t1.IsActive,t2.EducationId,t2.EducationName,t2.UnivesityName,t2.BoardName,t2.ClassStream,t2.Course,t2.YearofGraduation,t3.UserFamilyId,t3.FatherName,t3.FatherProfession,t3.MotherName,t3.MotherProfession,t4.EducationSubjectId,t4.EducationSubjectName,t4.SubjectCgpa,t4.MarksheetImage,t5.GraduateScoreId,t5.ClassX,t5.ClassXII,t5.College,t6.StreamName,t6.StreamStatus')
			->from('tbluser as t1')
			->join('tblgraduation as t2', 't1.UserId = t2.UserId', 'LEFT')
			->join('tbluserfamilydetail as t3', 't1.UserId = t3.UserId', 'LEFT')
			->join('tblgraduationsubject as t4', 't1.UserId = t4.UserId', 'LEFT')
			->join('tblgraduatescore as t5', 't1.UserId = t5.UserId', 'LEFT')
			->join('tblstreamtype as t6', 't1.StreamTypeId = t6.StreamTypeId', 'LEFT')
			->where('t1.UserId',$id)
			->get();
			return $query->row_array();
	}

	function getsubject($UserId)
	{
		//echo $UserId;die;
		$IsActive=1;
		$query=$this->db->get_where('tblgraduationsubject',array('UserId'=>$UserId,
																'IsActive'=>$IsActive
																));
	    //echo $this->db->last_query();die; 
		if($query->num_rows()>0)
		{ 
			//echo "<pre>";print_r($query->result());die;
			return $query->result(); 	
		}else{
			return '';
		}
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
