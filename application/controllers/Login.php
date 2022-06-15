<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __Construct() {
		parent::__Construct();
		$this->load->model("home_model"); 
		$this->load->helper(array('form'));  
		  
		 
	}
	 
	 
	public function index()
	{
		$this->load->view('login');
	}
	 
	/* 
	#############################
	## Login 
	 @params : email, password 
	 @return : array with status and message   
	#############################   
	*/ 
	public function dologin() {
		
	   	$this->load->library('form_validation');    
	   
	   $this->form_validation->set_rules('email', 'Email', 'required');
	   $this->form_validation->set_rules('password', 'Password', 'required',
			   array('required' => 'You must provide a %s.')
	   );

	   if ($this->form_validation->run() == FALSE)
	   {
		   $this->session->set_flashdata("error","All fileds are required");
		    redirect(base_url('login'));	
		    
	   }
		
	   $loginRes = $this->home_model->dologin();  
	   //print_r($loginRes);exit;
	   if($loginRes['status'] == 200) {
		   $this->session->set_flashdata("success","You havbe loged in successfully!");
		  	$role = $this->session->role; 
			   
		   if($role == 1) {
			    /*super admin */
			redirect(base_url('home'));
		   }else if($role == 2) {
			     /*user admin */ 
			    redirect(base_url("user"));
		   }else if($role == 3) {
			     /*sales admin */ 
				redirect(base_url("product"));
		   }
		    	
	   }else {
			$this->session->set_flashdata("error",$loginRes["msg"]); 
			redirect(base_url("login"));
	   }  
	
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
		  redirect(base_url('home'));
   }
    
    
   public function new_theme() {
	    $this->load->view("header_new");
		$this->load->view("footer_new");  
   } 
    
}
