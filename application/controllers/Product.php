<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __Construct() {
		parent::__Construct();
		$this->isValidated();
		$this->load->model(["home_model","product_model"]); 
		$this->load->helper(array('form'));  
		$this->load->library("pagination"); 
		$this->hasAccess();   
		  
		 
	}
	 
	/*
	#######################
	##  Product managemnent
	######################    
	*/
	 
	public function index() {
 
		$data["heading"] = "Product Listing";
	    $this->load->view("header",$data);
		
		$per_page  			= 2; 
	   	$config 				= array();
	   	$config["base_url"] 	= base_url() . "product/index/";
	   	$config["total_rows"] 	= $this->product_model->getProductTotalCount();
	   	$config["per_page"] 	= $per_page;
	   	$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';            
		$config['prev_link'] = '<li class="page-item"><a class="page-link>"Previous';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config["num_links"] = round( $config["total_rows"] / $config["per_page"] );
				  
	   $this->pagination->initialize($config);
	   $page = ($this->uri->segment(3)) ? $this->uri->segment(3)  : 0;    
	    
	    $data['page'] = $page;
	    $data["pagination"] = $this->pagination->create_links();
	    $data['records'] = $this->product_model->getProductsRecords($per_page, $page);   	 
		$this->load->view("product_list",$data); 
		$this->load->view("footer");  
	} 
	 
	 
	
	public function add_edit($id = "") {
		$data['row'] = false;
		$data["heading"] = "Add Product";
		if(!empty($id)) {
			$data["heading"] = "Edit Product";  
			$data['row'] =$this->product_model->getRecordById("tbl_products",$id);
			//print_r($data);exit; 
		} 
		
		$this->load->view("header",$data); 
		 
		$data['category_records'] = $this->product_model->getCategories(); 
		$this->load->view("add_edit_product",$data);  
		$this->load->view("footer");   
	}
	 
	 
	/*Save userdata with post request*/ 
    public function save() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required'); 
		$this->form_validation->set_rules('description', 'Description', 'required'); 
		$this->form_validation->set_rules('price', 'Name', 'required');  
		$this->form_validation->set_rules('category_id', 'Name', 'required');      
		
		$id = $this->input->post("id");
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("error","All fileds are required");
			redirect(base_url('product/add_edit/'.$id));	
		} 
	 

		 
		$queryRes = $this->product_model->save();
		
		
		 
		if($queryRes["status"] == 200) {
			$this->session->set_flashdata("success",$queryRes["msg"]);
			redirect(base_url('product'));
		}else{
			$this->session->set_flashdata("error",$queryRes["msg"]);
			redirect(base_url('product/add_edit/'.$id));	  
		}  		  
	}
	/*Delete product by id  @pramn post row_id */ 
	public function  delete_product() {
		$resArr =  $this->product_model->deleteProduct();
		echo json_encode($resArr); 
	}  
	 
	 
	###########################
	## End Prodcut managemnent
	##########################   
	 
	 
	 
	 
	 
	  
	##########################################
	### Category managemnent
	###########################################  
 
	/* category listing */
    public function category() {
	    $data["heading"] = "Category Listing";
	    $this->load->view("header",$data);
		
		$per_page  			= 2; 
	   	$config 				= array();
	   	$config["base_url"] 	= base_url() . "product/category/";
	   	$config["total_rows"] 	= $this->product_model->getTotalCategoryCount("tbl_users");
	   	$config["per_page"] 	= $per_page;
	   	$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';            
		$config['prev_link'] = '<li class="page-item"><a class="page-link>"Previous';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config["num_links"] = round( $config["total_rows"] / $config["per_page"] );
				  
	   $this->pagination->initialize($config);
	   $page = ($this->uri->segment(3)) ? $this->uri->segment(3)  : 0;    
	    
	    $data['page'] = $page;
	    $data["pagination"] = $this->pagination->create_links();
	    $data['records'] = $this->product_model->getCategoryRecords($per_page, $page); 
		//echo "<pre>";print_r($data);;exit;   	 
		$this->load->view("category_list",$data); 
		$this->load->view("footer"); 
   }
    
	/* @paramn :id optonal*
	 load vbiew for add / edit category
 	*/	 
    public function add_edit_category($id ="") {
	    $data["row"] = false;
		$data["heading"] = "Add Category";
		if(!empty($id)) {
			$data["heading"] = "Edit Category";  
			$data["row"] = $this->product_model->getRecordById("tbl_category",$id);
		}  
		$this->load->view("header",$data); 
		$this->load->view("add_edit_category",$data);  
		$this->load->view("footer");     
    }
    
    
   /*Save userdata with post request*/ 
    public function save_category() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required'); 
		$this->form_validation->set_rules('description', 'Description', 'required'); 
		
		$id = $this->input->post("id");
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("error","All fileds are required");
			redirect(base_url('product/add_edit_category/'.$id));	
		} 
	 
		$queryRes = $this->product_model->saveCategory();
	
		if($queryRes["status"] == 200) {
			$this->session->set_flashdata("success",$queryRes["msg"]);
			redirect(base_url('product/category'));
		}else{
			$this->session->set_flashdata("error",$queryRes["msg"]);
			redirect(base_url('product/add_edit_category/'.$id));	  
		}  		  
	}  
 
	/* Delete User Record by id 
		@paramn : post row_id
	*/

	public function  delete_category() {
		$resArr =  $this->product_model->deleteCategory();
		echo json_encode($resArr); 
	}
	 
	###########################
	## End category management
	###########################   
 
 
 
                  
               
 
 
 
 
 
 
 
 
 
 
 
 
###########
### Download user list csv
##########   
 
 
  
 public function export_user_csv() {
	$resData = $this->user_model->getExportUserRecords();
	$filename = "users.csv"; 
	
	header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Pragmna:no-cache");
	header("Expires: 0");
	 
	$handle = fopen('php://output','w');
	 
	foreach($resData  as $row) {
		 fputcsv($handle,$row);
	}
	fclose($handle);
	
	 
	  
	 
 }
 
 
    
}
