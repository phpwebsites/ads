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
         $this->output->set_content_type('application/json');

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

    public function searchload()
    {
       $this->uri->segment(3);
    }

	  public function loadmore()
	  {
	  	  // $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $result  = $this->adsmodel->gettotalads($offset);
        $data['view'] = $result;
        // print_r($data); exit;
        //$data['offset'] = $offset +10;
        // $data['limit'] = $limit;
        $this->load->view('loadads',$data);
        // echo json_encode($data);
	  }
   }
?>