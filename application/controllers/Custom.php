<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller {

	public function __Construct() {
		parent::__Construct();
		 
	}
	public function index()
	{
		$data["heading"] = "Error"; 
		$this->load->view("header", $data);
		$this->load->view("error", $data); 
		$this->load->view("footer");   
	}
}
