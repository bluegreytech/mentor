<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Program_model');
      
    }
    public function index(){
    	$data['result']=$this->Program_model->getprogramme();
    	$this->load->view('programme/programme_list',$data);
    }
    public function addcat(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addcat";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('cat_title', 'category title', 'required');			
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='category';
				$data['cat_id']=$this->input->post('cat_id');
				$data['cat_title']=$this->input->post('cat_title');
				
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("cat_id")!="")
				{ //echo "hjjhgj";die;
					$this->Program_model->cat_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Programs/category');					
				}
				else
				{ 
					$this->Program_model->cat_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Programs/category');				
				}				
			}
			
       $this->load->view('programme/addcat',$data);
    }
    public function category(){
    	$data['result']=$this->Program_model->getcategory();
    	$this->load->view('programme/cat_list',$data);
    }
    public function editcat($cid){
       if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();				
		$result=$this->Program_model->getcategorybyid($cid);	
		//echo "<pre>";print_r($result);die;
	    $data["cat_id"] 	= $result["cat_id"]; 
		$data["cat_title"] 	= $result["cat_title"];
			
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('programme/addcat',$data);   
    }
    public function cat_delete(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("cat_id",$id);			
			$res=$this->db->update('tblprocategory',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;

    }
    public function subcategory(){
       $data['result']=$this->Program_model->getsubcategory();
    	$this->load->view('programme/subcat_list',$data);
    }
    public function addsubcat(){
         if(!check_admin_authentication()){ 
			redirect('login');
		}   
			
			$data=array();	
			$data['activeTab']="addsubcat";	
			$data['cat']=$this->Program_model->getactivecategory();
			$this->load->library("form_validation");
			$this->form_validation->set_rules('subcat_title', 'Subcategory title', 'required');			
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='subcategory';
				$data['subcat_id']=$this->input->post('subcat_id');
				$data['cat_id']=$this->input->post('cat_id');
				$data['subcat_title']=$this->input->post('subcat_title');
				
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("subcat_id")!="")
				{ //echo "hjjhgj";die;
					$this->Program_model->subcat_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Programs/subcategory');					
				}
				else
				{ 
					$this->Program_model->subcat_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Programs/subcategory');				
				}				
			}
			
       $this->load->view('programme/addsubcat',$data);
    }
    function editsubcat($subid){
    	if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();	
		$data['cat']=$this->Program_model->getactivecategory();			
		$result=$this->Program_model->getsubcategorybyid($subid);	
		//echo "<pre>";print_r($result);die;
	    $data["subcat_id"] 	= $result["subcat_id"]; 
	     $data["cat_id"] 	= $result["cat_id"]; 
		$data["subcat_title"] 	= $result["subcat_title"];
			
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('programme/addsubcat',$data);   
    }
    function subcat_delete(){
         if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("subcat_id",$id);			
			$res=$this->db->update('tblprosubcategory',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
    }
    function addprogram(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['cat']=$this->Program_model->getactivecategory();		
            $data['subcat']=$this->Program_model->getactivesubcategory();		
			$data['activeTab']="addprogram";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('program_title', 'Program title', 'required');			
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='index';

				$data['pid']=$this->input->post('pid');
				$data['program_title']=$this->input->post('program_title');
				$data['cat_id']=$this->input->post('cat_id');
				$data['subcat_id']=$this->input->post('subcat_id');
				$data['short_title']=$this->input->post('short_title');
				$data['short_desc']=$this->input->post('short_desc');
				$data['long_desc']=$this->input->post('long_desc');
				$data['IsActive']=$this->input->post('IsActive');			
			}
			else
			{
				if($this->input->post("pid")!="")
				{ //echo "hjjhgj";die;
					$this->Program_model->program_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Programs');					
				}
				else
				{ 
					$this->Program_model->program_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Programs');				
				}				
			}
			
       $this->load->view('programme/addprogram',$data);
    }
    function editprogram($pid){
    	if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();	
		$data['cat']=$this->Program_model->getactivecategory();		
       $data['subcat']=$this->Program_model->getactivesubcategory();		
		$result=$this->Program_model->getprobyid($pid);	
		//echo "<pre>";print_r($result);die;
	    $data["program_title"] 	= $result["program_title"]; 
	     $data["pid"] 	= $result["pid"]; 
	     $data["cat_id"] 	= $result["cat_id"]; 
	     $data["subcat_id"] 	= $result["subcat_id"]; 
	     $data["short_title"] 	= $result["short_title"]; 
	      $data["short_desc"] 	= $result["short_desc"]; 
		
			$data['long_desc']=$result["long_desc"]; 
       	$data['IsActive']=$result["IsActive"];          
      	$this->load->view('programme/addprogram',$data);
    }
    function getsubcatbycatid(){
    	$cat_id =$this->input->post('cat_id');
    	 $subcatname= $this->Program_model->getsubcatbyid($cat_id);

    	 if(!empty($subcatname)){
    	 	foreach($subcatname as $val){
    	 		?>
            <option value="<?php echo $val->subcat_id?>" ><?php echo $val->subcat_title?></option>
    	 		<?php
    	 	}
    	 }

       

      
    }
    public function pro_delete(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("pid",$id);			
			$res=$this->db->update('tblprogram',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;

    }
    function faqlist(){
    	 $data['result']=$this->Program_model->getfaq();
    	$this->load->view('programme/faq_list',$data);
    }
    function addfaq(){
    	if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
			$data=array();	
			$data['activeTab']="addfaq";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('faq_title', 'Faq title', 'required');			
		
		
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();				
			}else{
				$data["error"] = "";
			}
         		$data['redirect_page']='faqlist';
				$data['faq_id']=$this->input->post('faq_id');
				$data['faq_title']=$this->input->post('faq_title');
				$data['faq_desc']=$this->input->post('faq_desc');
				$data['Isactive']=$this->input->post('Isactive');			
			}
			else
			{
				if($this->input->post("faq_id")!="")
				{ //echo "hjjhgj";die;
					$this->Program_model->faq_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Programs/faqlist');					
				}
				else
				{ 
					$this->Program_model->faq_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Programs/faqlist');				
				}				
			}
			
       $this->load->view('programme/addfaq',$data);
    }
    function editfaq($id){
    	if(!check_admin_authentication())
		{
		redirect('login');
		}

		$data = array();	
				
		$result=$this->Program_model->getfaqbyid($id);	
		//echo "<pre>";print_r($result);die;
	  
	     $data["faq_id"] 	= $result["faq_id"]; 
	     $data["faq_title"] 	= $result["faq_title"]; 
	     $data["faq_desc"] 	= $result["faq_desc"]; 

       	$data['Isactive']=$result["Isactive"];          
      	$this->load->view('programme/addfaq',$data);
    }
    function faq_delete(){
    		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			
			$data= array('Is_deleted' =>'1');
			$id=$this->input->post('id');
			$this->db->where("faq_id",$id);			
			$res=$this->db->update('tblfaq',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
    }
}