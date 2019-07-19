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
	
	function updatedata()
	{	
		///echo "<pre>";print_r($_FILES);die;	
  		//echo base_path();die;
		 $ProfileImage='';
		 //$image_settings=image_setting();
		 $this->load->library('upload');
		  if(isset($_FILES['ProfileImage']) &&  $_FILES['ProfileImage']['name']!='')
         { 
           
             $rand=rand(0,100000); 
			  
			$_FILES['userfile']['name']     =   $_FILES['ProfileImage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['ProfileImage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['ProfileImage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['ProfileImage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['ProfileImage']['size'];
   
			$config['file_name'] = $rand.'UserImage';			
			$config['upload_path'] = base_path().'upload/UserImage_orig/';	
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  
 
           $this->upload->initialize($config);
 
              if (!$this->upload->do_upload())
			  {
				$error =  $this->upload->display_errors();
				//echo "<pre>";print_r($error);die;
				
			  } 
				 $picture = $this->upload->data();	   
				// echo "<pre>";print_r($picture);die;
            //   $this->load->library('image_lib');		   
            //   $this->image_lib->clear();
			//   $gd_var='gd2';

            //   $this->image_lib->initialize(array(
			// 	'image_library' => $gd_var,
			// 	'source_image' => base_path().'Upload/UserImage_orig/'.$picture['file_name'],
			// 	'new_image' => base_path().'Upload/UserImage/'.$picture['file_name'],
			// 	'maintain_ratio' => FALSE,
			// 	'quality' => '100%',
			// 	'width' => 300,
			// 	'height' => 300
			//  ));
			
			
			// if(!$this->image_lib->resize())
			// {
			// 	$error = $this->image_lib->display_errors();
			// }
			
			$ProfileImage=$picture['file_name'];
			if($this->input->post('Pre_ProfileImage')!='')
				{
					if(file_exists(base_path().'Upload/UserImage/'.$this->input->post('Pre_ProfileImage')))
					{
						$link=base_path().'Upload/UserImage/'.$this->input->post('ProfilPre_ProfileImageeImage');
						unlink($link);
					}
					
					if(file_exists(base_path().'Upload/UserImage_orig/'.$this->input->post('Pre_ProfileImage')))
					{
						$link2=base_path().'Upload/UserImage_orig/'.$this->input->post('Pre_ProfileImage');
						unlink($link2);
					}
				}
			} else {
				if($this->input->post('Pre_ProfileImage')!='')
				{
					$ProfileImage=$this->input->post('Pre_ProfileImage');
				}
			}
           
			$id=$this->input->post('UserId');
			$EducationId=$this->input->post('EducationId');
			$UserFamilyId=$this->input->post('UserFamilyId');
			$GraduateScoreId=$this->input->post('GraduateScoreId');
			$EducationSubjectId=$this->input->post('EducationSubjectId'); 
	
					 $data2=array(
						'EducationId'=>$this->input->post('EducationId'),
						'UserId'=>$this->input->post('UserId'),
						'EducationName'=>$this->input->post('EducationName'),
						'UnivesityName'=>$this->input->post('UnivesityName'),
						'Course'=>$this->input->post('Course'),
						'YearofGraduation'=>$this->input->post('YearofGraduation'),
						);
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
							//'ProfileImage'=>$this->input->post('ProfileImage'),
							'ProfileImage'=>$ProfileImage,
							'Gender'=>$this->input->post('Gender')
							  );
							$this->db->where("UserId",$id);
							$this->db->update('tbluser',$data);		
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
							 
							$this->db->where("UserFamilyId",$UserFamilyId);
							$this->db->update('tbluserfamilydetail',$data3);	
						}
	
					if($EducationSubjectId=='')
					{
						if($GraduateScoreId!=''){
							$data4=array(
								'GraduateScoreId'=>$this->input->post('GraduateScoreId'),
								'UserId'=>$this->input->post('UserId'),
								'ClassX'=>$this->input->post('ClassX'),
								'ClassXII'=>$this->input->post('ClassXII'),
								'College'=>$this->input->post('College')
								);
								$this->db->where("GraduateScoreId",$GraduateScoreId);
								$this->db->update('tblgraduatescore',$data4);	
								return 1;
									
							}
					}
					
				
					if($GraduateScoreId=='')
					{
						if($EducationSubjectId!='')
						{
							$count=count($this->input->post('SubjectCgpa'));
							$SubjectCgpa=$this->input->post('SubjectCgpa');
							$EducationSubjectName=$this->input->post('EducationSubjectName');
							$EducationSubjectId=$this->input->post('EducationSubjectId'); 
							for($i=0; $i<$count; $i++)
							{
								$data5 = array(
										'EducationSubjectName' =>$EducationSubjectName[$i],
										'SubjectCgpa' => $SubjectCgpa[$i]
									);
								$this->db->where('EducationSubjectId',$EducationSubjectId[$i]);
								$this->db->where('UserId',$id);
								$this->db->update('tblgraduationsubject', $data5); 
								return 1;
							}
						}
					}
					
		
           
            
	}


	// function updatedata()
	// {
	// 	$id=$this->input->post('UserId');
	// 	$EducationId=$this->input->post('EducationId');
	// 	$UserFamilyId=$this->input->post('UserFamilyId');
	// 	$GraduateScoreId=$this->input->post('GraduateScoreId');
	// 	$EducationSubjectId=$this->input->post('EducationSubjectId'); 

	// 			 $data2=array(
	// 				'EducationId'=>$this->input->post('EducationId'),
	// 				'UserId'=>$this->input->post('UserId'),
	// 				'EducationName'=>$this->input->post('EducationName'),
	// 				'UnivesityName'=>$this->input->post('UnivesityName'),
	// 				'Course'=>$this->input->post('Course'),
	// 				'YearofGraduation'=>$this->input->post('YearofGraduation'),
	// 				);
	// 			$this->db->where("EducationId",$EducationId);
	// 			$this->db->update('tblgraduation',$data2);	
	
	// 			if($EducationId!=''){
	// 				$data=array(
	// 					'UserId'=>$this->input->post('UserId'),
	// 					'FirstName'=>$this->input->post('FirstName'),
	// 					'LastName'=>$this->input->post('LastName'),
	// 					'EmailAddress'=>$this->input->post('EmailAddress'),
	// 					'DateofBirth'=>$this->input->post('DateofBirth'),
	// 					'PhoneNumber'=>$this->input->post('PhoneNumber'),
	// 					'Gender'=>$this->input->post('Gender'),
	// 					'DateofBirth'=>$this->input->post('DateofBirth'),
	// 					'PhoneNumber'=>$this->input->post('PhoneNumber'),
	// 					'Gender'=>$this->input->post('Gender')
	// 					  );
	// 					$this->db->where("UserId",$id);
	// 					$this->db->update('tbluser',$data);		
	// 				}

	// 			if($UserFamilyId!=''){
	// 				$data3=array(
	// 					'UserFamilyId'=>$this->input->post('UserFamilyId'),
	// 					'UserId'=>$this->input->post('UserId'),
	// 					'FatherName'=>$this->input->post('FatherName'),
	// 					'FatherProfession'=>$this->input->post('FatherProfession'),
	// 					'MotherName'=>$this->input->post('MotherName'),
	// 					'MotherProfession'=>$this->input->post('MotherProfession')
	// 					  );
						 
	// 					$this->db->where("UserFamilyId",$UserFamilyId);
	// 					$this->db->update('tbluserfamilydetail',$data3);	
	// 				}

	// 			if($EducationSubjectId=='')
	// 			{
	// 				if($GraduateScoreId!=''){
	// 					$data4=array(
	// 						'GraduateScoreId'=>$this->input->post('GraduateScoreId'),
	// 						'UserId'=>$this->input->post('UserId'),
	// 						'ClassX'=>$this->input->post('ClassX'),
	// 						'ClassXII'=>$this->input->post('ClassXII'),
	// 						'College'=>$this->input->post('College')
	// 						);
	// 						$this->db->where("GraduateScoreId",$GraduateScoreId);
	// 						$this->db->update('tblgraduatescore',$data4);	
	// 						return 1;
								
	// 					}
	// 			}
				
			
	// 			if($GraduateScoreId=='')
	// 			{
	// 				if($EducationSubjectId!='')
	// 				{
	// 					$count=count($this->input->post('SubjectCgpa'));
	// 					$SubjectCgpa=$this->input->post('SubjectCgpa');
	// 					$EducationSubjectName=$this->input->post('EducationSubjectName');
	// 					$EducationSubjectId=$this->input->post('EducationSubjectId'); 
	// 					for($i=0; $i<$count; $i++)
	// 					{
	// 						$data5 = array(
	// 								'EducationSubjectName' =>$EducationSubjectName[$i],
	// 								'SubjectCgpa' => $SubjectCgpa[$i]
	// 							);
	// 						$this->db->where('EducationSubjectId',$EducationSubjectId[$i]);
	// 						$this->db->where('UserId',$id);
	// 						$this->db->update('tblgraduationsubject', $data5); 
	// 						return 1;
	// 					}
	// 				}
	// 			}
				
					
			

	// 	}

}
