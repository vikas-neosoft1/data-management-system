<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __Construct() {
		parent::__Construct();
		$this->isValidated(); 
		$this->load->model("home_model"); 
		$this->load->helper(array('form'));  
		$this->hasAccess();
		  
		 
	}
	 
	 
	public function index()
	{
		$data["heading"] = "Dashboard";
	$this->load->view("header",$data);
	 
	$data["total_users"] 		= $this->home_model->getTotalCount("tbl_users");
	$data["total_categories"] 	= $this->home_model->getTotalCount("tbl_category"); 
	$data["total_products"] 		= $this->home_model->getTotalCount("tbl_products");     
	 
	$this->load->view("dashboard",$data); 
	$this->load->view("footer"); 
	}
	 
	 /*
  #######################
  ## Load Dashoard 
  ######################    
   */
  public function dashboard() {
	$data["heading"] = "Dashboard";
	$this->load->view("header",$data);
	 
	$data["total_users"] 		= $this->home_model->getTotalCount("tbl_users");
	$data["total_categories"] 	= $this->home_model->getTotalCount("tbl_users"); 
	$data["total_products"] 		= $this->home_model->getTotalCount("tbl_users");     
	 
	$this->load->view("dashboard",$data); 
	$this->load->view("footer"); 
}  

	
    
  
    
    
   public function logout() {
	    $this->session->sess_destroy();
		  redirect(base_url('login'));
   }
    
    
   public function new_theme() {
	    $this->load->view("header_new");
		$this->load->view("footer_new");  
   } 
    
}
