<?php

class Student_model extends CI_Model
 {

    function getstudent(){
      //echo"ghgh";die;
      $this->db->select("*");
      $this->db->from("tblusers");
      //$this->db->where("Admin_Type!=",'1');
      $r=$this->db->get();
      
      //echo $this->db->last_query(); die;
      $res = $r->result();
      return $res;

    }
    function getdata($id){
      $this->db->select("*");
      $this->db->from("tblusers");
   
      $this->db->where("user_id",$id);
      $query=$this->db->get(); 
      return $query->row_array();
    }
    function updateStudent(){

      $user_image='';
         //$image_settings=image_setting();

                    
    $id=$this->input->post('user_id');
    $data=array(      
      'username'=>$this->input->post('username'),
      'email'=>$this->input->post('email'),
      'phone'=>$this->input->post('phone'),     
      'location'=>$this->input->post('location'),
      'status'=>$this->input->post('status'),
        );
   // echo "<pre>";print_r($data);die;  
      $this->db->where("user_id",$id);
    $this->db->update('tblusers',$data);   
    
  }


}
