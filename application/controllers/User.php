<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __Construct() {
		parent::__Construct();
		$this->load->model(["home_model","user_model"]); 
		$this->load->helper(array('form'));  
		$this->load->library("pagination");   
		$this->isValidated(); 
		$this->hasAccess();  
		 
	}
	 
   /*
  #######################
  ## Load USer List 
  ######################    
   */
    public function index() {
	    $data["heading"] = "User Listing";
	    $this->load->view("header",$data);
		 
		
		 
		   
	    
	    $data['page'] = 0;
	    $data["pagination"] = $this->pagination->create_links();
	    $data['records'] = $this->user_model->getUserRecords($per_page=10, $page=0);   	 
		$this->load->view("user_list",$data); 
		$this->load->view("footer"); 
   }
    
	 
   public function add_edit($id ="") {
	    $data["row"] = false;
		$data["heading"] = "Add User";
		if(!empty($id)) {
			$data["heading"] = "Edit USer";  
			$data["row"] = $this->user_model->getRecordById($id);
		}
		$data['roles'] = $this->user_model->getRoleRecords(); 
		//echo "<pre>";print_r($data); exit; 
		$this->load->view("header",$data); 
		$this->load->view("add_edit_user",$data);  
		$this->load->view("footer");     
   }
    
    
   /*Save userdata with post request*/ 
   public function save() {
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('first_name', 'First Name', 'required'); 
	$this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
	$this->form_validation->set_rules('email', 'Email', 'required');  
	$this->form_validation->set_rules('role', 'Role', 'required');   

	 
	$id = $this->input->post("id");
	if ($this->form_validation->run() == FALSE)
	{
		$this->session->set_flashdata("error","All fileds are required");
		redirect(base_url('user/add_edit/'.$id));	
	} 
	 
	$save_res = $this->user_model->save();
	
	if($save_res["status"] == 200) {
		$this->session->set_flashdata("success",$save_res["msg"]);
		redirect(base_url('user'));
	}else{
		$this->session->set_flashdata("error",$save_res["msg"]);
		redirect(base_url('user/add_edit/'.$id));	  
	}  		  
}  
 
/*Delete User Record by id 
 @paramn : post row_id
 */
 
public function  delete_row() {
 $resArr =  $this->user_model->delete_row();
 echo json_encode($resArr); 
}
 
 
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
