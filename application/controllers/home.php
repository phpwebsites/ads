<?php
class Home extends CI_Controller {
	
	function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
		 $this->load->helper('form');
		 $this->load->library('session');
		 $this->load->model('usermodel');
		 $this->load->model('countrymodel');
		 $this->load->model('categoriesmodel');
		 $this->load->model('subcategoriesmodel');
		 $this->load->model('adsmodel');
         
    }

	public function index()
	{
         $this->load->view('home');
		
	}
	
	public function userProfile()
	{
		$id = $this->session->userdata('user_id');
		$data['user_data'] = $this->usermodel->get_userdata($id);
		$this->load->view('userprofile',$data);
	}

	public function getCountry()
	{
		$result = $this->countrymodel->getAll();
		return $result;
	}

	public function getcategories()
	{
		$data = $this->categoriesmodel->getAllcategories();
		return $data;

	
    }

    public function subcategories($id)
    {
    	$subcategoriesdata = $this->subcategoriesmodel->getAllSubcategories($id);
    	return $subcategoriesdata;
    }

    public function viewall()
    {
    	$this->load->view('viewall.php');
    }

    public function adCount($id)
    {
        return $this->adsmodel->getadscount($id);

    }

    public function latestads()
    {
    	return $this->adsmodel->getlatestads();
    }
 }
?>