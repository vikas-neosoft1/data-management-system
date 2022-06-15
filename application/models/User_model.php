<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class User_model extends CI_Model {
	
	 	public function __Construct(){
		parent::__Construct();
			 
		}
		 
		/* Return Toal numnber of user */
		public function getTotalCount($table) {
			$this->db->where("status != 5");
			$userQuery =  $this->db->get($table);
			return $userQuery->num_rows(); 
		}

		/*
		 @paramns : Offset, limit
		 @return result object array or false   
		*/ 
		public function getUserRecords($per_page, $page){ 
			$user_id 	= $this->session->userdata("id");
			$role 		= $this->session->role;
			  
			/*user admnin will see his user other wise superadmnina and sales admnin ca see all users*/
			if($role == 2) {
				$this->db->where("created_by", $user_id); 
			} 
			/* hide super admnin row to fecth*/ 
			$this->db->where("tbl_users.id != 1");  
			$this->db->select("tbl_users.*, tbl_roles.role as user_role"); 
			
			$this->db->where("status != 5"); 
			$this->db->join("tbl_roles","tbl_roles.id = tbl_users.role","LEFT");   
			$this->db->order_by("id", "desc");    
			$userExe =   $this->db->get("tbl_users");
			//echo $this->db->last_query(); 
			if($userExe->num_rows() > 0 ) {
				return $userExe->result();
			}else{
				return false;
			}  
  		}  
		  
		/*
		  @paramn : id
		  $return: user row or false 
		*/ 
		 
		public function getRecordById($id) {
			$userRecordExe = $this->db->where("id",$id)->get("tbl_users");
			//echo $this->db->last_query(); 
			if($userRecordExe->num_rows() > 0) {
				return $userRecordExe->row();
			}else{
				 return false;
			} 
		}
		 
		 
		/*@paramn : email, Role 
		 @return on record found: true , other wise : flase
		 */ 
		protected function validateUserData($email,$role){
			$query = $this->db->where(["email"=>$email,"role"=>$role])->get("tbl_users");  
			if($query->num_rows()  > 0 ) {
				return true;
			}else{
				 return false;
			} 
		}
		  
		 
		/*
		@paramns : set post data formn add edit user 
		return array with status and mnessage
		*/ 
		 
		public function save() {
			 
			$user_id      		= 		$this->session->userdata("id"); 
			$first_name 		= 		$this->input->post('first_name');
			$last_name 			= 		$this->input->post('last_name'); 
			$email 				= 		$this->input->post('email');
			$role 				= 		$this->input->post('role');   
			$password 			= 		$this->input->post('password'); 
			$confirm_password   = 		$this->input->post("confirm_password"); 
			$id  = $this->input->post("id"); 
			
			 
			/* validate email
			on edit with new email != old_email , else on ewn entry check duplicate email  
			*/  
			if(!empty($id)) { 
				$userRow = $this->getRecordById($id); 
				//print_r($userRow);exit;  
				if($userRow->email != $email  ) {
					$emailValidate 		= $this->validateUserData($email, $role);  
					if($emailValidate) {
						$resultData = ["status"=>300,"msg"=>"Email already exist"];
						return $resultData;
					}
				} 
			}else{
				$emailValidate 		= $this->validateUserData($email, $role);  
				if($emailValidate) {
						$resultData = ["status"=>300,"msg"=>"Email already exist"];
						return $resultData;
				} 
			}

			$insert_arr = [
				'first_name' 	=> 	$first_name,
				'last_name' 	=> 	$last_name,  
				'email' 		=> 	$email, 
				'role' 			=> 	$role
			];
			 
			if(!empty($password) && $password == $confirm_password ) {
				 $insert_arr["password"] = md5($password);
			} 
			 
			if(empty($id)) {  
				$insert_arr["created_by"] = $user_id;
				$insert_arr["indate"]  =date("Y-m-d H:i:s"); 
					$insert_query = $this->db->insert("tbl_users", $insert_arr);  
					if($insert_query) {
						$resultData = ["status"=>200,"msg"=>"User detail inserted successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"User not creted"];
						return $resultData;
					}  
				}else{
					 $insert_arr["updated_by"] 	= $user_id;
					 $insert_arr["updated_at"]  = date("Y-m-d H:i:s"); 
					 $updateQuery = $this->db->where("id",$id)->update("tbl_users",$insert_arr);
					  
					 if($updateQuery) {
						$resultData = ["status"=>200,"msg"=>"User updated successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"User not updated"];
						return $resultData;
					}   
				}			  
		}
		 
		 
		 
		/*Return  all roles dynamnically fro ad edit user*/
		public function getRoleRecords() {
			$roleExe = $this->db->where("id != 1")->get("tbl_roles");
			//echo $this->db->last_query(); 
			if($roleExe->num_rows() > 0 ) {
				 return $roleExe->result();
			}else{
				 return false;
			} 
		}
		 
		/* @paramn :id
		retrun array with status 
		*/ 
		public function delete_row(){
			$id   		= $this->input->post("row_id");
			$user_id 	= $this->session->userdata("id");
			
			if(!empty($id)) {  
					$updateRow = ["updated_by"=> $user_id,"updated_at"=>date("Y-m-d H:i:s"),"status"=>5 ];
					$updateQuery = $this->db->where("id",$id)->update("tbl_users",$updateRow);
					
					if($updateQuery) {
						$resultData = ["status"=>200,"msg"=>"User deleted successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"User not deleted"];
						return $resultData;
					}
				}else{
					$resultData = ["status"=>400,"msg"=>"somnething went wrong"];
					return $resultData;
				}		 			          
		}
		 
		#############
		# get user recoed for exxport
		############   
		 
		public function getExportUserRecords() { 
			$user_id 	= $this->session->id;
			$role 		= $this->session->role; 
			/* csvb header*/ 
			$data[] = ["First Name","Last Name","Email","Cretaed at"];  
			/* if user is not super admnin */  
			if($role == 2) {
				 $this->db->where("created_by",$user_id);
			}
			 
			
			
			/* hide super admnin row to fecth*/ 
			$this->db->where("tbl_users.id != 1");  
			 
			$resExe = $this->db->where("status != 5")->order_by("id", "desc")->get("tbl_users"); 
			if($resExe->num_rows() > 0 ) {
				$resRecords = $resExe->result();
				 
				foreach($resRecords as $row) {
					$data[] = [$row->first_name,$row->last_name,$row->email,$row->indate];
				 }
				  return $data; 
			}else{
				 return $data;
			}  
		}  
		
		 
		 
		 
		   
		 
		 
		 
	 
		 
		 
		 
		 
	}

   ?>