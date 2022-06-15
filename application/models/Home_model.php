<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Home_model extends CI_Model {
		/* Login */ 
		public function dologin() {
			
			$email 			= 		$this->input->post('email');   
			$password 			= 		$this->input->post('password'); 
			 
			$erroData = [];
			$validateUsername = $this->db->where(["email"=>$email])->get("tbl_users");
			if($validateUsername->num_rows() == 0  )  {
				$erroData = ['status'=>100,"msg"=>"Invalid Email"];
				return $erroData; 
			}
			 
			$validatePassword = $this->db->where(["email"=>$email, "password"=>md5($password)] )->get("tbl_users");
			if($validatePassword ->num_rows() == 0  )  {
				$erroData = ['status'=>300,"msg"=>"Incorrect pssword"];
				return $erroData;
			}  
			
			$this->db->select("tbl_users.*, tbl_roles.role as user_role");
			$this->db->join("tbl_roles","tbl_roles.id = tbl_users.role","LEFT"); 
			$this->db->where(["email"=>$email, "password"=>md5($password)]); 
			$queryExe = $this->db->get("tbl_users");   
			//echo $this->db->last_query(); 
			if($queryExe->num_rows() > 0 ) {
				 $row = $queryExe->result_array();
				 unset($row[0]['password']);   
				 $this->session->set_userdata($row[0]);
				 $this->session->set_userdata("isLogin",1); 
				    
				 $role = $row[0]['role']; 
				 $erroData = ['status'=>200,"msg"=>"Validated, Login","role"=>$role];
				 return $erroData; 
				   
			}else{
				$erroData = ['status'=>400,"msg"=>"Somnething went wrong"];
				 return $erroData; 
			 }  
		}
		 
		/*
		Return total count (where status is not 5) (Not deleted)
		*/ 
		public function getTotalCount($table) {
			$userQuery = $this->db->where("status != 5")->get($table);
			return $userQuery->num_rows(); 
		}
		 
		 
		  
		 
		 
		 
		 
		   
		 
		 
		 
	 
		 
		 
		 
		 
	}

   ?>