<?php
   class SearchController extends CI_Controller
   {
	  function __construct() 
	  { 
	  	 parent::__construct(); 
         $this->load->helper('url');
         $this->load->library('form_validation');
         $this->load->model('categoriesmodel');
         $this->load->model('subcategoriesmodel');
         $this->load->helper('date');
         $this->load->helper('timeinfo');
         $this->load->model('usermodel');
         $this->load->model('adsmodel');
         $this->load->model('adsimagesmodel');

	  }

	  public function getmaincategories()
      {
          $data = $this->categoriesmodel->getAllcategories();
          //$this->load->view('viewall',$data);
          return $data;
      } 

	  public function searchcreate()
	  {
	  	  $categoryid = $this->input->post('adscategory');
          $data['ads'] = $this->adsmodel->getcategoryads($categoryid);
          $this->load->view('search.php',$data);
	  }
   }
?>