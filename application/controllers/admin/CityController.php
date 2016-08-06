<?php
  class CityController extends CI_Controller 
  {
	   function __construct() 
	   { 
         	parent::__construct(); 
         	$this->load->model('statemodel');
			$this->load->model('countrymodel');
			$this->load->model('citymodel');
			$this->load->library('form_validation');
			$this->load->helper('authenticate_helper');
		 	if(is_logged_in() == "false" && $this->uri->segment(1) == "city")
		 	{
		 	
		 		redirect("home");
		 	}
			
			
	   }
	   
	   public function index()
	   {
		   $data['result'] = $this->citymodel->getAll();
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/city/index', $data);
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function add()
	   {
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/city/add');
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function insert()
	   {
           $data = array("name" => $this->input->post('name'),"country_id" => $this->input->post('country_id'),"state_id	" => $this->input->post('state_id'));
           //print_r($data);exit;
		   $this->form_validation->set_rules("name", "City Name", "trim|required|xss_clean|is_unique[city.name]");
		   $this->form_validation->set_rules("country_id", "Country", "trim|required");
		   $this->form_validation->set_rules("state_id", "City", "trim|required");
		 if($this->form_validation->run() == FALSE)
		 {
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/city/add');
			$this->load->view('admin/includes/footer');		 
		 }
		 else
		 {
		   $getid = $this->citymodel->add($data);

		   $data['result'] = $this->citymodel->getAll(); 
           $this->load->view('admin/includes/header');
		   $this->load->view('admin/city/index',$data);
		   $this->load->view('admin/includes/footer');
		}
	  }
	  
	  public function delete()
	  {
		  $id = $this->uri->segment(3);
		  $this->citymodel->delete($id);
		  $data['result'] = $this->citymodel->getAll();
		  $this->load->view('admin/includes/header');
		  $this->load->view('admin/city/index',$data);
		  $this->load->view('admin/includes/footer');
	  }

	  public function update()
	  {
	  	$id = $this->uri->segment(3);
	  	$data['result'] = $this->citymodel->getrow($id);
	  	$this->load->view('admin/includes/header');
		$this->load->view('admin/city/update',$data);
		$this->load->view('admin/includes/footer');

	  }

	  public function updateinsert()
	  {

	  		$data = array("name" => $this->input->post('name'),"country_id" => $this->input->post('country_id'),"state_id	" => $this->input->post('state_id'));
	  		$id = $this->input->post('countryid');
	  		
	  		$this->form_validation->set_rules("name", "City Name", "trim|required");
		    $this->form_validation->set_rules("country_id", "Country", "trim|required");
		    $this->form_validation->set_rules("state_id", "City", "trim|required");
	  		if($this->form_validation->run() == FALSE)
		    {
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/city/update');
				$this->load->view('admin/includes/footer');		 
		    }
		    else
		    {
		    	
		    	$this->citymodel->update($data , $id);
		    	$data['result'] = $this->citymodel->getAll(); 
		    	
	  			$this->load->view('admin/includes/header');
		   		$this->load->view('admin/city/index',$data);
		        $this->load->view('admin/includes/footer');	
		    }
	  		
	  }

	   public function getallcountries()
	   {
	  	 $countrydata = $this->countrymodel->getAll();
	  	 return $countrydata;
	   }


	  
  }

?>