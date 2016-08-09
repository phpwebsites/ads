<?php
  class CountryController extends CI_Controller 
  {
	   function __construct() 
	   { 
         	parent::__construct(); 
			$this->load->model('countrymodel');
			$this->load->model('statemodel');
			$this->load->library('form_validation');
			$this->load->helper('authenticate_helper');
		 	if(is_logged_in() == "false" && $this->uri->segment(1) == "country")
		 	{
		 	
		 		redirect("home");
		 	}
		 	
			
	   }
	   
	   public function index()
	   {
		   $data['result'] = $this->countrymodel->getAll();
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/country/index', $data);
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function add()
	   {
		   $this->load->view('admin/includes/header');
		   $this->load->view('admin/country/add');
		   $this->load->view('admin/includes/footer');
	   }
	   
	   public function insert()
	   {
           $data = array("name" => $this->input->post('name'));
		   $this->form_validation->set_rules("name", "Name", "trim|required|xss_clean|is_unique[country.name]");

		 if($this->form_validation->run() == FALSE)
		 {
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/country/add');
			$this->load->view('admin/includes/footer');		 
		 }
		 else
		 {
		   $getid = $this->countrymodel->add($data);

		   $data['result'] = $this->countrymodel->getAll(); 
           $this->load->view('admin/includes/header');
		   $this->load->view('admin/country/index',$data);
		   $this->load->view('admin/includes/footer');
		}
	  }
	  
	  public function delete()
	  {
		  $id = $this->uri->segment(3);
		  $this->countrymodel->delete($id);
		  $data['result'] = $this->countrymodel->getAll();
		  $this->load->view('admin/includes/header');
		  $this->load->view('admin/country/index',$data);
		  $this->load->view('admin/includes/footer');
	  }

	  public function update()
	  {
	  	$id = $this->uri->segment(3);
	  	$data['result'] = $this->countrymodel->getrow($id);
	  	$this->load->view('admin/includes/header');
		$this->load->view('admin/country/update',$data);
		$this->load->view('admin/includes/footer');

	  }

	  public function updateinsert()
	  {

	  		$data = array("name" => $this->input->post('name'));
	  		$id = $this->input->post('countryid');
	  		
	  		$this->form_validation->set_rules("name", "Name", "trim|required");
	  		if($this->form_validation->run() == FALSE)
		    {
				
				$this->load->view('admin/includes/header');
				$this->load->view('admin/country/update');
				$this->load->view('admin/includes/footer');		 
		    }
		    else
		    {
		    	
		    	$this->countrymodel->update($data , $id);
		    	$data['result'] = $this->countrymodel->getAll(); 
		    	
	  			$this->load->view('admin/includes/header');
		   		$this->load->view('admin/country/index',$data);
		        $this->load->view('admin/includes/footer');	
		    }
	  		
	  }

	  public function getstates()
	  {
	  	  $id = $this->uri->segment(3);
	  	  // echo $id; exit;
	  	  $data['state'] = $this->statemodel->getAllStates($id);
	  	  $this->load->view('admin/country/getstates',$data);

	  }

	  
  }

?>