<?php 
defined('BASEPATH') OR exit('no direct access alolowed! ');
class MY_Controller extends CI_Controller {

    public function isValidated() {
        $CI =& get_instance(); 
        if( !$CI->session->userdata('isLogin') ){
            redirect(base_url().'login');
        }   
    }
     
    public function hasAccess() {
         
        /* 1=> 'super admin'
         2 => "user admnin"
         3 => Sales Admin  
        */
       

        $accessArray["1"] = array("home"=>array("index","dashboard","logout"),"user"=>array("add_edit","save","delete_row","index")); 
        $accessArray["2"] = array("user"=>array("add_edit","save","delete_row","index","export_user_csv"),"home"=>array("logout"));
        $accessArray["3"] = array("product"=>array("index","category","add_edit_category","save_category","delete_category","index","add_edit","save","delete_product"),"user"=>array("index","export_user_csv"),"home"=>array("logout"));     
          
        $CI         =   & get_instance(); 
        $role       =   $CI->session->role;
        $class      =   $CI->router->fetch_class();
        $method     =   $CI->router->fetch_method(); 
        $method     = ($method != "") ? $method : "index"; 
         
      
       
        //echo "Role: $role; class $class; method $method "; 
         
        
        $myAccess =  $accessArray[$role];  
        //ECHO "<pre>";print_r($myAccess);  
        //exit; 
         
        if(!array_key_exists($class, $myAccess)){
             
            redirect(base_url('custom'));
        } 
        
        if(array_key_exists($class, $myAccess)) {
            $allowed_methods = $myAccess[$class];
            
            if(!in_array($method, $allowed_methods )) {
                 
                redirect(base_url('custom'));    
            } 
        }
         
         
         
    
    } 
     
   
     
    
     

}

?>