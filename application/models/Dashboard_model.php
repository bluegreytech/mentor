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
		$IsActive=1;
		$query=$this->db->get_where('tblgraduationsubject',array('UserId'=>$UserId,
																'IsActive'=>$IsActive
																));
		if($query->num_rows()>0)
		{ 
			return $query->result(); 	
		}else{
			return '';
		}
	}
	

	function updatedata(){
		$id=$this->input->post('UserId');
		$EducationId=$this->input->post('EducationId');
		$UserFamilyId=$this->input->post('UserFamilyId');
		$GraduateScoreId=$this->input->post('GraduateScoreId');
		 $data2=array(
			'EducationId'=>$this->input->post('EducationId'),
			'UserId'=>$this->input->post('UserId'),
			'EducationName'=>$this->input->post('EducationName'),
			'UnivesityName'=>$this->input->post('UnivesityName'),
			'Course'=>$this->input->post('Course'),
			'YearofGraduation'=>$this->input->post('YearofGraduation'),
			);
			//print_r($data2);die;
		$this->db->where("EducationId",$EducationId);
		$this->db->update('tblgraduation',$data2);	
	
		if($EducationId!=''){
			$data=array(
				'UserId'=>$this->input->post('UserId'),
				'FirstName'=>$this->input->post('FirstName'),
				'LastName'=>$this->input->post('LastName'),
				'EmailAddress'=>$this->input->post('EmailAddress'),
				'DateofBirth'=>$this->input->post('DateofBirth'),
				'PhoneNumber'=>$this->input->post('PhoneNumber'),
				'Gender'=>$this->input->post('Gender'),
				'DateofBirth'=>$this->input->post('DateofBirth'),
				'PhoneNumber'=>$this->input->post('PhoneNumber'),
				'Gender'=>$this->input->post('Gender')
				  );
				  // print_r($data);die;
				$this->db->where("UserId",$id);
				$this->db->update('tbluser',$data);	
				//return 1;
					
			}

			if($UserFamilyId!=''){
				$data3=array(
					'UserFamilyId'=>$this->input->post('UserFamilyId'),
					'UserId'=>$this->input->post('UserId'),
					'FatherName'=>$this->input->post('FatherName'),
					'FatherProfession'=>$this->input->post('FatherProfession'),
					'MotherName'=>$this->input->post('MotherName'),
					'MotherProfession'=>$this->input->post('MotherProfession')
					  );
					  // print_r($data);die;
					$this->db->where("UserFamilyId",$UserFamilyId);
					$this->db->update('tbluserfamilydetail',$data3);	
					//return 1;
						
				}
				if($GraduateScoreId!=''){
					$data4=array(
						'GraduateScoreId'=>$this->input->post('GraduateScoreId'),
						'UserId'=>$this->input->post('UserId'),
						'ClassX'=>$this->input->post('ClassX'),
						'ClassXII'=>$this->input->post('ClassXII'),
						'College'=>$this->input->post('College')
						  );
						  // print_r($data);die;
						$this->db->where("GraduateScoreId",$GraduateScoreId);
						$this->db->update('tblgraduatescore',$data4);	
						//return 1;
							
					}
			
					if($EducationSubjectId!=''){

						$query=$this->db->select('t1.UserId,t4.EducationSubjectId,t4.EducationSubjectName,t4.SubjectCgpa,t4.MarksheetImage');
						$this->db->from('tbluser as t1');
						$this->db->join('tblgraduationsubject as t4', 't1.UserId = t4.UserId', 'LEFT');
						$this->db->where('t4.EducationSubjectId',$EducationSubjectId);
						foreach($query->result_array() as $row)
						{
							print_r($query->result_array());die;
							echo $row->EducationSubjectId; 
							echo $row->EducationSubjectName;
							echo $row->SubjectCgpa;
						}

						die;

						//$query=$this->db->get();
						//return $query->row();


					
					}
			

		}

}
