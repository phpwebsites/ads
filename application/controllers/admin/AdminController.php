<?php
  class AdminController extends CI_Controller 
  {
	  function __construct() 
	  { 
         parent::__construct(); 
         $this->load->helper('url');
         $this->load->library('form_validation');
		 $this->load->library('session');
		 $this->load->helper('authenticate_helper');
		 if(is_logged_in() == "false" && $this->uri->segment(1) == "administrator")
		 {
		 	
		 	redirect("home");
		 }
         
      }
	  
	  public function index()
	  {
		  $this->load->view('admin/index');
	  }
	  
	  //public function categories()
	  //{
		  //$this->load->view('admin/categories');
	  //}
	  
	  
  }
?>