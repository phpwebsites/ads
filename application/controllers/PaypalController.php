<?php
   class PaypalController extends CI_Controller
   {
   	function __construct() 
   	{ 
            parent::__construct(); 
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->helper('form'); 
            $this->load->library('session');
            
     }

     public function sucess()
     {
        
     }
   }
?>