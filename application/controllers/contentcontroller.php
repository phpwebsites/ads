<?php
  class ContentController extends CI_Controller
 {
 	
 	function __construct() 
   	{ 
            parent::__construct(); 
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->helper('form'); 
   }

 	public function contactus()
 	{
 		$this->load->view('contactus');
 	}

 	public function blog()
 	{
 		$this->load->view('blog');
 	}

 	public function blogdesc()
 	{
 		$this->load->view('blogdesc');
 	}
 }

?>