<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Product_model extends CI_Model {
	
	 	public function __Construct(){
		parent::__Construct();
			 
		}
		 
		 
		  
		/* Return Toal numnber of user */
		public function getTotalCount($table) {
			$this->db->where("status != 5");
			$userQuery =  $this->db->get($table);
			return $userQuery->num_rows(); 
		}
		 
		public function getRecordById($table,$id) {
			$cateQuery = $this->db->where("id",$id)->get($table);
			if($cateQuery->num_rows() > 0 ) {
				return $cateQuery->row();
			}else{
				 return false;
			} 
		}
		 
		 
		 
		 
		 
		 
		###########################
		## Product managemnemnt
		##########################
		 
		/* Return caount of total products for product listing */
		public function getProductTotalCount() {
			$user_id 	= $this->session->id;
			$role 	= $this->session->role;   
			 
			$this->db->where("status != 5");
			$this->db->where("tbl_products.created_by", $user_id);   
			$productCountQuery = $this->db->get("tbl_products");
			return  $productCountQuery->num_rows();   
		}
		 
		public function getProductsRecords($per_page, $page) {
			$user_id 	= $this->session->id;
			$role 		= $this->session->role;
			 
			$this->db->select("tbl_products.*, tbl_category.name as category_name"); 
			$this->db->where("tbl_products.created_by", $user_id); 
			$this->db->where("tbl_category.status != 5");   
			$this->db->join("tbl_category","tbl_category.id = tbl_products.category_id"); 
			//$this->db->limit($per_page, $page);
			$this->db->order_by("id", "desc");    
			$categoryQuery =   $this->db->get("tbl_products");
			//echo $this->db->last_query(); 
			if($categoryQuery->num_rows() > 0 ) {
				return $categoryQuery->result();
			}else{
				return false;
			}  
		}
		 
		/*get category for add product page*/
		public function  getCategories() {
			$user_id 	= $this->session->id;
			$role 	= $this->session->role;   
			$this->db->where("created_by",$user_id); 
			$this->db->where("status != 5");
			$cateQuery = $this->db->get("tbl_category");
			return  ($cateQuery->num_rows() > 0) ? $cateQuery->result() : false  ; 
		}
		 
		  
		 
		/* save product
		@paramns: post formn data 
		@return array with statue and msg 
		*/
		 
		public function save() { 
			$user_id      		= 		$this->session->id; 
			$name 				= 		$this->input->post('name');
			$description 		= 		$this->input->post('description');
			$price 		= 		$this->input->post('price'); 
			$category_id 		= 		$this->input->post('category_id'); 
			$old_image 				= 		$this->input->post('old_image');    
			$id 				= 		$this->input->post('id');
			 
			  
			 
			if($_FILES['image']['error'] == 0) { 
				$config['upload_path']          = './products_images/';
				$config['allowed_types']        = 'jpeg|jpg|png';
				 $config['max_size'] = 20000;
				$config['encrypt_name ']		= true; 
				$new_name = time()."-".$_FILES["image"]['name'];
				$new_name = str_replace(' ', '_', $new_name);  
				$config['file_name'] = $new_name;  


				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('image'))
				{
					$error = $this->upload->display_errors();
					$resultData = ["status"=>300,"msg"=>$error];
					return $resultData; 
				}
				else
				{
						$data = array('upload_data' => $this->upload->data());
						$product_image = $data['upload_data']['file_name'];
				} 
			}else{
				$product_image =  $old_image;
			}	 
		/* Upload resume ended*/ 
			 
			
			$productData = [
				'name' 			=> 	$name,
				'description' 	=> 	$description,
				'price' 	=> 	$price ,
				'category_id' 	=> 	$category_id,
				'image'=> $product_image   
			];
			 
			 
			 
			if(empty($id)) {  
				$productData["created_by"] = $user_id;
				$productData["indate"]  =date("Y-m-d H:i:s"); 
					$insert_query = $this->db->insert("tbl_products", $productData);  
					if($insert_query) {
						$resultData = ["status"=>200,"msg"=>"Product added successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"Product not added "];
						return $resultData;
					}  
				}else{
					 $productData["updated_by"] 	= $user_id;
					 $productData["updated_at"]  = date("Y-m-d H:i:s"); 
					 $updateCategoryQuery = $this->db->where("id",$id)->update("tbl_products",$productData);
					  
					 if($updateCategoryQuery) {
						$resultData = ["status"=>200,"msg"=>"Product updated successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"Prduct not updated"];
						return $resultData;
					}   
				}			  
		} 
		/*Delete product 
		@paramn : post  id 
		@return array  
		*/ 
		public function deleteProduct() {
			$id 	= $this->input->post("row_id");
			$user_id 	= $this->session->id;  // loged in user 
			  
			$productDel = $this->db->where("id",$id)->update("tbl_products",["status"=>5,"updated_by"=>$user_id,"updated_at"=>date("Y-m-d H:i:s")]);  
			return ["status"=>200,"msg"=>"Product deleted successfully"];
		}  
		 
		 
		 
		 
		###########################
		## End Product managemnemnt
		##########################  

		 
		#######################################
		#### Category Listing , add update delete 
		####################################### 
		
		public function getTotalCategoryCount() {
			$user_id 	= $this->session->id;
			$role 		= $this->session->role;
			// if loged user is not superadmnin 
			if($role != 1 ){
				$this->db->where("created_by", $user_id); 
			}  
			$this->db->where("status != 5");
			$userQuery =  $this->db->get("tbl_category");
			return $userQuery->num_rows(); 
		}
		 
		 
		/*
		@paramn : limnit offset  
		@Return category result set */  
		public function getCategoryRecords($per_page, $page){ 
			$user_id 	= $this->session->id;
			$role 		= $this->session->role;
			// if loged user is not superadmnin 
			if($role != 1 ){
				$this->db->where("created_by", $user_id); 
			} 
			 
			$this->db->select("*"); 
			$this->db->where("status != 5");   
			$this->db->limit($per_page, $page);
			$this->db->order_by("id", "desc");    
			$categoryQuery =   $this->db->get("tbl_category");
			//echo $this->db->last_query(); 
			if($categoryQuery->num_rows() > 0 ) {
				return $categoryQuery->result();
			}else{
				return false;
			}  
  		}   
		
		
		

		  
		/* save category
		@paramns: post formn data 
		@return array with statue and msg 
		*/
		 
		public function saveCategory() { 
			$user_id      		= 		$this->session->id; 
			$name 				= 		$this->input->post('name');
			$description 		= 		$this->input->post('description'); 
			$id 				= 		$this->input->post('id');
			
			$categoryData = [
				'name' 	=> 	$name,
				'description' 	=> 	$description
			];
			 
			if(empty($id)) {  
				$categoryData["created_by"] = $user_id;
				$categoryData["indate"]  =date("Y-m-d H:i:s"); 
					$insert_query = $this->db->insert("tbl_category", $categoryData);  
					if($insert_query) {
						$resultData = ["status"=>200,"msg"=>"Category added successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"Category not added "];
						return $resultData;
					}  
				}else{
					 $categoryData["updated_by"] 	= $user_id;
					 $categoryData["updated_at"]  = date("Y-m-d H:i:s"); 
					 $updateCategoryQuery = $this->db->where("id",$id)->update("tbl_category",$categoryData);
					  
					 if($updateCategoryQuery) {
						$resultData = ["status"=>200,"msg"=>"Category updated successfully"];
						return $resultData;  
					}else{
						$resultData = ["status"=>500,"msg"=>"Categoy not updated"];
						return $resultData;
					}   
				}			  
		}
		
		
		/*Delete category
		and delete related product with this category
		return array  
		*/ 
		 
		public function deleteCategory() {
			$id 	= $this->input->post("row_id");
			$user_id 	= $this->session->id;  // loged in user  
			$categoryDel = $this->db->where("id",$id)->update("tbl_category",["status"=>5,"updated_by"=>$user_id,"updated_at"=>date("Y-m-d H:i:s")]);  
			$productDel  = $this->db->where("category_id",$id)->update("tbl_products",["status"=>5,"updated_by"=>$user_id,"updated_at"=>date("Y-m-d H:i:s")]);  
			return ["status"=>200,"msg"=>"Category deleted successfully"];
		} 
		 
		  
		 
		          
	 	#################################
		## End category module
		#################################   	 
		 
		 
		 
		
		
		
		 
		 
		 
		   
		 
		 
		 
	 
		 
		 
		 
		 
	}

   ?>